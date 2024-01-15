<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use App\Models\ChiTietSanPham;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

use function Laravel\Prompts\alert;

class CTSanPhamController extends Controller
{
    public function chitietsp($MaSP)
    {
        $chitietsp = DB::select('select * from san_phams, chi_tiet_san_phams, anhs, mau_sacs, dung_luongs
        where san_phams.MaSP = chi_tiet_san_phams.MaSP
        and chi_tiet_san_phams.MaCTSP = anhs.MaCTSP
        and chi_tiet_san_phams.MaMau = mau_sacs.MaMau
        and chi_tiet_san_phams.MaDL = dung_luongs.MaDL
        and san_phams.MaSP = ?', [$MaSP]);
        $mauSP = DB::select('select DISTINCT mau_sacs.MaMau, mau_sacs.TenMau from san_phams, chi_tiet_san_phams, mau_sacs
        where san_phams.MaSP = chi_tiet_san_phams.MaSP
        and chi_tiet_san_phams.MaMau = mau_sacs.MaMau
        and san_phams.MaSP = ?', [$MaSP]);
        $dlSP = DB::select('select DISTINCT dung_luongs.MaDL, dung_luongs.SoDL from san_phams, chi_tiet_san_phams, dung_luongs
        where san_phams.MaSP = chi_tiet_san_phams.MaSP
        and chi_tiet_san_phams.MaDL = dung_luongs.MaDL
        and san_phams.MaSP = ?', [$MaSP]);
        return view('Frontend.ChiTietSanPham', compact('chitietsp', 'mauSP', 'dlSP'));
    }
    public function ctsp(Request $request)
    {
        $mamau = $request->input('MauSacValue');
        $madl = $request->input('DungLuongValue');
        $masp = $request->input('MaSPValue');
        //$chitietsp1 = DB::select('select MaCTSP from chi_tiet_san_phams where MaMau = ? and MaDL = ? and MaSP = ?', [$mamau, $madl, $masp]);
        $chitietsp1 = DB::table('chi_tiet_san_phams')
        ->where('MaMau', $mamau)
        ->where('MaDL', $madl)
        ->where('MaSP', $masp)
        ->first();

    // Kiểm tra nếu có kết quả
    if ($chitietsp1) {
        // Lấy giá trị MaCTSP từ đối tượng
        $maCTSP = $chitietsp1->MaCTSP;

        // Chuyển $maCTSP thành chuỗi
        $maCTSPString = (string)$maCTSP;

    } else {
        // Xử lý trường hợp không có kết quả
        alert('Hiện không có sản phẩm này');
    }

        return response()->json(['maCTSP' => $maCTSPString]);
    }

    public function hienThiChiTiet(Request $request)
    {
        // Thực hiện truy vấn cơ sở dữ liệu để lấy chi tiết sản phẩm dựa trên MaCTSP
        $maCTSP = $request->segment(3);
        $chiTietSanPham = DB::select('select * from san_phams, chi_tiet_san_phams, anhs, mau_sacs, dung_luongs
        where san_phams.MaSP = chi_tiet_san_phams.MaSP
        and chi_tiet_san_phams.MaCTSP = anhs.MaCTSP
        and chi_tiet_san_phams.MaMau = mau_sacs.MaMau
        and chi_tiet_san_phams.MaDL = dung_luongs.MaDL
        and chi_tiet_san_phams.MaCTSP = ?', [$maCTSP]);
        $maSPValue = $request->segment(2);
        $chitietsp = DB::select('select * from san_phams, chi_tiet_san_phams, anhs, mau_sacs, dung_luongs
        where san_phams.MaSP = chi_tiet_san_phams.MaSP
        and chi_tiet_san_phams.MaCTSP = anhs.MaCTSP
        and chi_tiet_san_phams.MaMau = mau_sacs.MaMau
        and chi_tiet_san_phams.MaDL = dung_luongs.MaDL
        and san_phams.MaSP = ?', [$maSPValue]);
        $tenSP = DB::select('select TenSP from san_phams where san_phams.MaSP = ?', [$maSPValue]);
        $maMau = $request->segment(4);
        $mauSP = DB::select('select TenMau from mau_sacs where MaMau = ?', [$maMau]);
        $maDL = $request->segment(5);
        $mauSP = DB::select('select SoDL from dung_luongs where MaDL = ?', [$maDL]);

        $mauSP = DB::select('select DISTINCT mau_sacs.MaMau, mau_sacs.TenMau from san_phams, chi_tiet_san_phams, mau_sacs
        where san_phams.MaSP = chi_tiet_san_phams.MaSP
        and chi_tiet_san_phams.MaMau = mau_sacs.MaMau
        and san_phams.MaSP = ?', [$maSPValue]);
        $dlSP = DB::select('select DISTINCT dung_luongs.MaDL, dung_luongs.SoDL from san_phams, chi_tiet_san_phams, dung_luongs
        where san_phams.MaSP = chi_tiet_san_phams.MaSP
        and chi_tiet_san_phams.MaDL = dung_luongs.MaDL
        and san_phams.MaSP = ?', [$maSPValue]);
        // Trả về view hiển thị chi tiết sản phẩm
        return view('Frontend.CTSP', compact('chiTietSanPham', 'chitietsp', 'mauSP', 'dlSP'));
    }

    public function layDLtheoMau(Request $request){
        $maMau = $request->MaMau;
        $maSP = $request ->MaSP;
        return DB::select('select dung_luongs.*, MaSP from chi_tiet_san_phams, dung_luongs where
        chi_tiet_san_phams.MaDL = dung_luongs.MaDL
        and chi_tiet_san_phams.MaMau = ?
        and chi_tiet_san_phams.MaSP = ? and chi_tiet_san_phams.SoLuong > ?', [$maMau, $maSP, 0]);
    }

    public function cart()
    {

        return view('Frontend.cart');
    }

    public function addToCart(Request $request)
    {
        $productId = $request->MaCTSP;
        $product_info = DB::table('chi_tiet_san_phams')->where('MaCTSP', $productId)->first();
        $MaSP = $product_info->MaSP;
        $product_info1 = DB::table('san_phams')->where('MaSP', $MaSP)->first();

        $cart = session()->get('cart', []);
        $id = $product_info->MaCTSP;

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "id" => $product_info->MaCTSP,
                "qty" => 1,
                "name" => $product_info1->TenSP,
                "price" => $product_info->DonGiaBan,
                "options" => [
                    'image' => $product_info1->AnhDaiDien,
                ],
            ];
        }

        session()->put('cart', $cart);
        return redirect()->to('/trang_chu')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->qty) {
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] = $request->qty;
            session()->put('cart', $cart);
            session()->flash('message', 'Cập nhật giỏ hàng thành công!');
        }
    }

    public function remove(Request $request)
    {
        // dd($request);
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('message', 'Xóa sản phẩm thành công!');
        }
    }

    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->back()->with('message', 'Xóa giỏ hàng thành công!');
    }
}
