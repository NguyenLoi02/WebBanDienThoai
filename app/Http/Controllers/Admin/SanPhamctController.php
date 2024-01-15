<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChiTietSanPham;
use Datatables;
use App\Models\ChinhSachBaoHanh;
use App\Models\DanhMuc;
use App\Models\Hang;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Support\Facades\DB;

class SanPhamctController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ds_sanphamct = ChiTietSanPham::with('sp', 'hoadonnhap', 'mau', 'dungluong')->get();
        return view("admin.sanphamct.ds_spct", compact('ds_sanphamct'));
    }

    public function addSPCT()
    {
        $autoID = new AutoIDFunction();
        $nextMaCTSP = $autoID->AutoID('CTSP', ChiTietSanPham::class, 'MaCTSP');
        $idHDN = DB::table("chi_tiet_h_d_n_s")->orderBy('MaHDN', 'desc')->get();
        $idSP = DB::table("san_phams")->orderBy('MaSP', 'desc')->get();
        $idMau = DB::table("mau_sacs")->orderBy('MaMau', 'desc')->get();
        $idDL = DB::table("dung_luongs")->orderBy('MaDL', 'desc')->get();
        return view('admin.sanphamct.create_spct')
            ->with('nextMaCTSP', $nextMaCTSP)
            ->with('idHDN', $idHDN)
            ->with('idSP', $idSP)
            ->with('idMau', $idMau)
            ->with('idDL', $idDL);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCT(Request $request)
    {
        $data  = array();
        $data['MaCTSP'] = $request->MaCTSP;
        $data['AnhCT'] = $request->AnhCT;
        $data['DonGiaNhap'] = $request->DonGiaNhap;
        $data['DonGiaBan'] = $request->DonGiaBan;
        $data['SoLuong'] = $request->SoLuong;
        //$data['MaHDN'] = $request->SPCT_MaHDN;
        $data['MoTa'] = $request->MoTa;
        $data['TrangThai'] = $request->TrangThai;
        $data['MaSP'] = $request->SPCT_MaSP;
        $data['MaMau'] = $request->SPCT_MaMau;
        $data['MaDL'] = $request->SPCT_MaDL;
        $get_anh = $request->file('AnhCT');
        if ($get_anh) {
            $get_nameAnh = $get_anh->getClientOriginalName();
            $name_anh = current(explode('.', $get_nameAnh));
            $new_anh = $name_anh . rand(0, 99) . '.' . $get_anh->getClientOriginalExtension();
            $get_anh->move('public/uploads/AnhSPCTs', $new_anh);
            $data['AnhCT'] = $new_anh;
            //DB::table('chi_tiet_san_phams')->insert($data);
            //return redirect('createSPCT')->with('message', 'Thêm chi tiết sản phẩm thành công');
        }
        DB::table('chi_tiet_san_phams')->insert($data);
        return redirect('createSPCT')->with('message', 'Thêm chi tiết sản phẩm thành công');
    }

    public function unactive_product($id)
    {
        DB::table('chi_tiet_san_phams')->where('MaCTSP', $id)->update(['TrangThai' => 1]);
        return redirect('sanphamct')->with('message', 'Hết Hàng');
    }
    public function active_product($id)
    {
        DB::table('chi_tiet_san_phams')->where('MaCTSP', $id)->update(['TrangThai' => 0]);
        return redirect('sanphamct')->with('message', 'Hết Hàng');
    }

    /**
     * Display the specified resource.
     */
    public function editSPCT($id)
    {
        $idHDN = DB::table("chi_tiet_h_d_n_s")->orderBy('MaHDN', 'desc')->get();
        $idSP = DB::table("san_phams")->orderBy('MaSP', 'desc')->get();
        $idMau = DB::table("mau_sacs")->orderBy('MaMau', 'desc')->get();
        $idDL = DB::table("dung_luongs")->orderBy('MaDL', 'desc')->get();
        $editSPCT = DB::table("chi_tiet_san_phams")->where('MaCTSP', $id)->get();

        return view('admin.sanphamct.edit_spct', compact('editSPCT', 'idHDN', 'idSP', 'idMau', 'idDL'));
    }

    public function update_spct(Request $request, $id)
    {
        $data  = array();
        $data['MaCTSP'] = $request->MaCTSP;
        $data['AnhCT'] = $request->AnhCT;
        $data['DonGiaNhap'] = $request->DonGiaNhap;
        $data['DonGiaBan'] = $request->DonGiaBan;
        //$data['MaHDN'] = $request->SPCT_MaHDN;
        $data['MoTa'] = $request->MoTa;
        $data['TrangThai'] = $request->TrangThai;
        $data['MaSP'] = $request->SPCT_MaSP;
        $data['MaMau'] = $request->SPCT_MaMau;
        $data['MaDL'] = $request->SPCT_MaDL;
        $get_anh = $request->file('AnhCT');
        if ($get_anh) {
            $get_nameAnh = $get_anh->getClientOriginalName();
            $name_anh = current(explode('.', $get_nameAnh));
            $new_anh = $name_anh . rand(0, 99) . '.' . $get_anh->getClientOriginalExtension();
            $get_anh->move('public/uploads/AnhSPCTs', $new_anh);
            $data['AnhCT'] = $new_anh;
            DB::table('chi_tiet_san_phams')->where('MaCTSP', $id)->update($data);
            return redirect('sanphamct')->with('message', 'Cập nhật chi tiết sản phẩm thành công');
        }
        DB::table('chi_tiet_san_phams')->where('MaCTSP', $id)->update($data);
        return redirect('sanphamct')->with('message', 'Cập nhật chi tiết sản phẩm thành công');
    }

    public function deleteSPCT($id)
    {
        DB::table('chi_tiet_san_phams')->where('MaCTSP', $id)->delete();
        return redirect('sanphamct')->with('message', 'Xóa chi tiết sản phẩm thành công');
    }
}
