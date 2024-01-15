<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use App\Models\ChiTietSanPham;
use App\Models\HoaDonBan;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Frontend\SanPhamController;


class CheckoutController extends Controller
{
    public function login_checkout()
    {
        return view('frontend.checkouts.login_checkout');
    }

    public function add_customer(Request $request)
    {
        $autoID = new AutoIDFunction();
        $nextMaKH = $autoID->AutoID('KH', KhachHang::class, 'MaKH');
        $autoid = new AutoIDFunction();
        $nextMaTK = $autoid->AutoID('TK', TaiKhoan::class, 'Username');

        // Bắt đầu transaction
        DB::beginTransaction();

        try {
            // Insert vào bảng tai_khoans
            $dataTaiKhoan = array(
                'Username' => $nextMaTK,
                'Password' => md5($request->customer_pass),
                'LoaiTaiKhoan' => 1, // Giả sử LoaiTaiKhoan là 1 cho tài khoản khách hàng
            );

            DB::table('tai_khoans')->insert($dataTaiKhoan);

            // Insert vào bảng khach_hangs
            $dataKhachHang = array(
                'MaKH' => $nextMaKH,
                'HoTen' => $request->customer_name,
                'SoDienThoai' => $request->customer_phone,
                'DiaChi' => $request->customer_address,
                'Email' => $request->customer_email,
                'Username' => $nextMaTK,
            );

            $customer_id = DB::table('khach_hangs')->insertGetId($dataKhachHang);

            DB::commit();

            Session::put('MaKH', $customer_id);
            Session::put('HoTen', $request->customer_name);
            return Redirect::to('/checkout');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Đã có lỗi xảy ra']);
        }
    }

    public function checkout(Request $request)
    {
        // dd(session('MaKH'));
        return view('frontend.checkouts.show_checkout');
    }

    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/trang_chu');
    }

    public function login_customer(Request $request)
    {
        $hoten = $request->HoTen;
        $password = md5($request->Pass);
        $result = DB::table('khach_hangs as kh')
            ->join('tai_khoans as tk', 'kh.Username', '=', 'tk.Username')
            ->select('kh.HoTen', 'tk.Password', 'kh.MaKH')
            ->where('kh.HoTen', $hoten)
            ->where('tk.Password', $password)
            ->first();
        if ($result) {

            Session::put('MaKH', $result->MaKH);
            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/login-checkout');
        }
    }

    public function order_place(Request $request)
    {
        $autoHDB = new AutoIDFunction();
        $nextMaHDB = $autoHDB->AutoID('MaHDB', HoaDonBan::class, 'MaHDB');
        $order_data = array();
        $order_data['MaHDB'] = $nextMaHDB;
        $order_data['NgayBan'] = now();
        $order_data['TrangThaiHoaDon'] = 'Chưa thanh toán';
        $order_data['DiaChiGiaoHang'] = $request->shipping_address;
        $order_data['SoDienThoai'] = $request->customer_phone;
        // if ($request->has('shipping_note')) {
        //     $order_data['GhiChu'] = $request->shipping_note;
        // } else {
        //     $order_data['GhiChu'] = 'Không có ghi chú';
        // }
        $order_data['GhiChu'] = $request->shipping_note;
        $total = 0;
        foreach (session('cart') as $id => $details) {
            $total += $details['price'] * $details['qty'];
            $maCTSP = $details['id'];
            $sl = $details['qty'];
        }
        $order_data['TongTien'] = $total;
        $order_data['TinhTrangDonHang'] = 'Chờ xác nhận';
        $order_data['MaNV'] = 'NV01';
        $order_data['MaKH'] = session('thongtinkhachhang.MaKH');

        $order_ct = array();
        $order_ct['MaHDB'] = $nextMaHDB;
        $order_ct['MaCTSP'] = $maCTSP;
        $order_ct['SoLuong'] = $sl;
        $order_id = DB::table('hoa_don_bans')->insertGetId($order_data);
        DB::table('chi_tiet_h_d_b_s')->insertGetId($order_ct);
        $sanPhamController = new CTSanPhamController();
        $sanPhamController->clearCart();
        return redirect::to('/trang_chu')->with('order_id', $order_id);
    }
}
