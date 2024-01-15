<?php

namespace App\Http\Controllers\Admin\HoaDonNhap;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\HoaDonNhap;

class HoaDonNhapController extends Controller
{
    //hiển thị danh sách hóa đơn nhập
    public function danh_sach_hoa_don_nhap(){
        $danh_sach_hoa_don_nhap = DB::table('hoa_don_nhaps')-> get();
        $manager_category_product = view('Admin.HoaDonNhap.danh_sach_hoa_don_nhap')->with('danh_sach_hoa_don_nhap', $danh_sach_hoa_don_nhap);
        return view('admin_layout')->with('Admin.HoaDonNhap.danh_sach_hoa_don_nhap', $manager_category_product);
    }

    //thêm hóa đơn nhập
    public function them_hoa_don_nhap(){
        $autoID = new AutoIDFunction();
        $nextMaHDN = $autoID->AutoID('HDN', HoaDonNhap::class, 'MaHDN');
        $maNV = DB::table('nhan_viens')->orderBy('MaNV', 'DESC')->get();
        $maNCC = DB::table('nha_cung_caps')->orderBy('MaNCC', 'DESC')->get();
        return view('Admin.HoaDonNhap.them_hoa_don_nhap', compact('nextMaHDN'))->with('maNV', $maNV)->with('maNCC', $maNCC);
    }
    public function luu_hoa_don_nhap(Request $request){
        $rules = [
            'ngaynhap' => 'required',
            'ghichu' => 'required',

        ];

        // Định nghĩa messages cho validation errors
        $messages = [
            'required' => 'Vui lòng nhập :attribute.',
        ];
        $data = array();
        $data['MaHDN'] = $request->MaHDN;
        $data['NgayNhap'] = $request->ngaynhap;
        $data['TongTien'] = 0;
        $data['GhiChu'] = $request->ghichu;
        $data['MaNV'] = $request->MaNV;
        $data['MaNCC'] = $request->MaNCC;
        $request->validate($rules,$messages);
        DB::table('hoa_don_nhaps')->insert($data);
        return redirect('danh-sach-hoa-don-nhap')->with('message', 'Thêm thành công');
    }

    //thêm chi tiết hóa đơn nhập
    public function them_chi_tiet_hoa_don_nhap($id){
        $maHDN = DB::table('hoa_don_nhaps')-> where('MaHDN', $id)->get();
        $maCTSP = DB::table('chi_tiet_san_phams')->orderBy('MaCTSP', 'DESC')->get();
        return view('Admin.HoaDonNhap.them_chi_tiet_hoa_don_nhap',compact('maHDN'))->with('maCTSP', $maCTSP);
    }
    public function luu_chi_tiet_hoa_don_nhap(Request $request){
        $data = array();
        $data['MaHDN'] = $request->MaHDN;
        $data['MaCTSP'] = $request->MaCTSP;
        $data['SoLuong'] = $request->SoLuong;
        DB::table('chi_tiet_h_d_n_s')->insert($data);
        return redirect('danh-sach-hoa-don-nhap')->with('message', 'Thêm chi tiết thành công');
    }
    //xem chi tiết hóa đơn nhập
    public function chi_tiet_hoa_don_nhap($maHDN){
        $chiTietHDN = DB::select('select hoa_don_nhaps.MaHDN, chi_tiet_h_d_n_s.MaCTSP, san_phams.TenSP, san_phams.AnhDaiDien,
        chi_tiet_san_phams.DonGiaNhap, chi_tiet_h_d_n_s.SoLuong from hoa_don_nhaps, chi_tiet_h_d_n_s, chi_tiet_san_phams, san_phams
        where hoa_don_nhaps.MaHDN =chi_tiet_h_d_n_s.MaHDN and chi_tiet_h_d_n_s.MaCTSP = chi_tiet_san_phams.MaCTSP
        and chi_tiet_san_phams.MaSP = san_phams.MaSP and chi_tiet_h_d_n_s.MaHDN = ?',[$maHDN]);
        return view('Admin.HoaDonNhap.chi_tiet_hoa_don_nhap',compact('chiTietHDN'));

    }

    //sửa hóa đơn nhập
    public function sua_hoa_don_nhap($id){
        $sua_hoa_don_nhap = DB::table('hoa_don_nhaps')-> where('MaHDN', $id)->get();
        return view('Admin.HoaDonNhap.sua_hoa_don_nhap',compact('sua_hoa_don_nhap'));
    }
    public function cap_nhap_hoa_don_nhap(Request $request,$id){

        $request->validate([
            'ghichu'=>'required'
        ],[
            'ghichu.required'=>'ghi chú không được để trống'
        ]);
        $data = array();
        $data['MaHDN'] = $request->MaHDN;
        $data['NgayNhap'] = $request->ngaynhap;
        $data['TongTien'] = $request->tongtien;
        $data['GhiChu'] = $request->ghichu;
        $data['MaNV'] = $request->MaNV;
        $data['MaNCC'] = $request->MaNCC;
        DB::table('hoa_don_nhaps')->where('MaHDN', $id)->update($data);
        return redirect('danh-sach-hoa-don-nhap')->with('message', 'Sửa thành công');
    }

}
