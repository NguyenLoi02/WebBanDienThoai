<?php

namespace App\Http\Controllers\QuanLyDonHangController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\KhachHang;

use Illuminate\Http\Request;

class QuanLyDonHangController extends Controller
{


    public function dsdh_cho_xac_nhan($maKH){
        $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
        $maKH = $profile->MaKH;
        $lichSuHDB = DB::table('hoa_don_bans')->where('TinhTrangDonHang','Chờ xác nhận')
        ->where ('MaKH', $maKH)
        ->get();
        return view('QuanLyDonHang.dsdh_cho_xac_nhan',compact('lichSuHDB', 'profile'));
    }
    public function dsdh_da_xac_nhan($maKH){
        $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
        $maKH = $profile->MaKH;
        $lichSuHDB = DB::table('hoa_don_bans')->where('TinhTrangDonHang','Đã xác nhận')
        ->where ('MaKH', $maKH)->get();
        return view('QuanLyDonHang.dsdh_da_xac_nhan',compact('lichSuHDB', 'profile'));
    }
    public function dsdh_da_giao($maKH){
        $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
        $maKH = $profile->MaKH;
        $lichSuHDB = DB::table('hoa_don_bans')->where('TinhTrangDonHang','Giao Thành Công')
        ->where ('MaKH', $maKH)->get();
        return view('QuanLyDonHang.dsdh_da_giao',compact('lichSuHDB', 'profile'));
    }
    public function dsdh_da_huy($maKH){
        $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
        $maKH = $profile->MaKH;
        $lichSuHDB = DB::table('hoa_don_bans')->where('TinhTrangDonHang','Đã hủy')
        ->where ('MaKH', $maKH)->get();
        return view('QuanLyDonHang.dsdh_da_huy',compact('lichSuHDB', 'profile'));
    }

    public function chi_tiet_don_hang($maHDB){
        $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
        $maKH = $profile->MaKH;
        $chiTietDonHang = DB::select('select san_phams.TenSP, san_phams.AnhDaiDien, chi_tiet_san_phams.MoTa, chi_tiet_san_phams.DonGiaBan,
        chi_tiet_h_d_b_s.SoLuong from hoa_don_bans, chi_tiet_h_d_b_s, chi_tiet_san_phams, san_phams
        where hoa_don_bans.MaHDB =chi_tiet_h_d_b_s.MaHDB and chi_tiet_h_d_b_s.MaCTSP = chi_tiet_san_phams.MaCTSP
        and chi_tiet_san_phams.MaSP = san_phams.MaSP and hoa_don_bans.MaHDB = ?',[$maHDB]);
        return view('QuanLyDonHang.chi_tiet_don_hang',compact('chiTietDonHang', 'profile'));

    }

    public function li_do_huy_don_hang($maHDB){
        $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
        $maKH = $profile->MaKH;
        $huy_hoa_don_nhap = DB::table('hoa_don_bans')-> where('MaHDB', $maHDB)->get();
        return view('QuanLyDonHang.li_do_huy_don_hang',compact('huy_hoa_don_nhap', 'profile'));
    }
    public function huy_don_hang(Request $request, $maHDB){
        $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
        $maKH = $profile->MaKH;
        $ly_do = $request->input('options');
        DB::update('update hoa_don_bans set GhiChu = ? where MaHDB = ?', [$ly_do, $maHDB]);
        DB::update('update hoa_don_bans set TinhTrangDonHang = "Đã hủy" where MaHDB = ?', [$maHDB]);
        $lichSuHDB = DB::table('hoa_don_bans')->where('TinhTrangDonHang','Chờ xác nhận')
        ->where('MaKH', $maKH)->get();
        session()->put('message','Hủy đơn hàng thành công');
        return view('QuanLyDonHang.dsdh_cho_xac_nhan',compact('lichSuHDB', 'profile'));
    }
}
