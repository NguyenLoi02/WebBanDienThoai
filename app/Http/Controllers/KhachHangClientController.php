<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KhachHangClientController extends Controller
{
    public function showThongTin()
    {
            $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
            return view('pages.thongtinkhachhang', ['profile' => $profile]);
    }
    public function capnhat(Request $request)
    {
        $validate = $request->validate([
            'HoTen' => 'required',
            'NgaySinh' => 'required|date',
            'SoDienThoai' => 'required|numeric|digits_between:10,11',
            'DiaChi' => 'required',
            'Email' => 'required|email',
            'GioiTinh' => 'required',
        ], [
            'HoTen.required' => 'Bạn phải nhập họ tên',
            'NgaySinh.required' => 'Bạn phải nhập ngày sinh',
            'NgaySinh.date' => 'Bạn phải nhập ngày sinh đúng định dạng',
            'SoDienThoai.required' => 'Bạn phải nhập số điện thoại',
            'SoDienThoai.numeric' => 'Bạn phải nhập số điện thoại đúng định dạng',
            'SoDienThoai.digits_between' => 'Số điện thoại chỉ được nhập 10 hoặc 11 số',
            'DiaChi.required' => 'Bạn phải nhập địa chỉ',
            'Email.required' => 'Bạn phải nhập email',
            'Email.email' => 'Bạn phải nhập email đúng định dạng',
            'GioiTinh.required' => 'Bạn phải chọn giới tính',
        ]);

        $capnhat = KhachHang::where('MaKH', $request->MaKH)->update([
            'HoTen' => $request->HoTen,
            'NgaySinh' => $request->NgaySinh,
            'SoDienThoai' => $request->SoDienThoai,
            'DiaChi' => $request->DiaChi,
            'Email' => $request->Email,
            'GioiTinh' => $request->GioiTinh,
        ]);
        // dd($request);

        $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
        if ($capnhat) {
            session()->pull('thongtinkhachhang');
            session()->put('thongtinkhachhang', $profile);

            return redirect('thongtinkhachhang')->with('message', 'Cập nhật thành công.');
        } else {
            return redirect('thongtinkhachhang')->with('message', 'Cập nhật thất bại');
        }
    }
    public function showLichSu()
    {
            $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
            $maKH = $profile->MaKH;
            $lichSuHDB = DB::table('hoa_don_bans')->where('TinhTrangDonHang','Chờ xác nhận')
            ->where ('MaKH', $maKH)
            ->get();
            return view('pages.lichsu', compact('profile'),['lichSuHDB' => $lichSuHDB]);
    }
}
