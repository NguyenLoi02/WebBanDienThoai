<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoaDonBan;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Support\Facades\DB;


class HoaDonBanController extends Controller
{
    public function donhang()
    {
        $dsdonhang = DB::select('select * from hoa_don_bans where TinhTrangDonHang = ?',['Chờ xác nhận']);
        return view("Admin.HoaDonBan.dsdonhang", compact('dsdonhang'));
    }
    public function hoadonban()
    {
        //$dshdb = DB::select('select * from hoa_don_bans where TinhTrangDonHang != ?',['Chờ xác nhận']);
        $dshdb = DB::select('SELECT * FROM hoa_don_bans WHERE TinhTrangDonHang NOT IN (?, ?)', ['Chờ xác nhận', 'Đã hủy']);
        return view("Admin.HoaDonBan.dshoadonban", compact('dshdb'));
    }
    public function donhanghuy()
    {
        $dshuydon = DB::select('select * from hoa_don_bans where TinhTrangDonHang = ?',['Đã hủy']);
        return view("Admin.HoaDonBan.dshuydon", compact('dshuydon'));
    }
    public function xacnhan($mahdb)
    {
        DB::update('Update hoa_don_bans set TinhTrangDonHang = ? where MaHDB = ?', ['Đã xác nhận', $mahdb]);
        return redirect('dsdonhang')->with('message', 'Xác nhận đơn hàng thành công');
    }
    public function chitiethdb($mahdb)
    {
        $chitiethdb = DB::select('select hoa_don_bans.*, chi_tiet_h_d_b_s.*, chi_tiet_san_phams.*, san_phams.*,
        chi_tiet_san_phams.SoLuong as SoLuongSanPham, chi_tiet_h_d_b_s.SoLuong as SoLuongBan
        from hoa_don_bans, chi_tiet_h_d_b_s, chi_tiet_san_phams, san_phams
        where hoa_don_bans.MaHDB = chi_tiet_h_d_b_s.MaHDB
        and chi_tiet_h_d_b_s.MaCTSP = chi_tiet_san_phams.MaCTSP
        and san_phams.MaSP = chi_tiet_san_phams.MaSP
        and hoa_don_bans.MaHDB =?', [$mahdb]);

        return view("Admin.HoaDonBan.chitiethdb", compact('chitiethdb'));
    }

    public function updateTinhTrang(Request $request)
    {
        $maHDB = $request->input('maHDB');
        $tinhTrang = $request->input('tinhTrang');

        // Cập nhật TinhTrangDonHang trong cơ sở dữ liệu
        //YourModel::where('MaHDB', $maHDB)->update(['TinhTrangDonHang' => $tinhTrang]);
        DB::update('Update hoa_don_bans set TinhTrangDonHang = ? where MaHDB = ?', [$tinhTrang, $maHDB]);

        return response()->json(['message' => 'Cập nhật thành công']);
    }
    public function updateTinhTrang1(Request $request)
    {
        $maHDB = $request->input('maHDB');
        $tinhTrang = $request->input('tinhTrang');
        $trangThai = $request->input('trangThai');

        // Cập nhật TinhTrangDonHang trong cơ sở dữ liệu
        //YourModel::where('MaHDB', $maHDB)->update(['TinhTrangDonHang' => $tinhTrang]);
        DB::update('Update hoa_don_bans set TinhTrangDonHang = ?, TrangThaiHoaDon = ? where MaHDB = ?', [$tinhTrang, $trangThai, $maHDB]);

        return response()->json(['message' => 'Cập nhật thành công']);
    }

}
