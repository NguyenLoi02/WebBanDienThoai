<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use Datatables;
use App\Models\ChinhSachBaoHanh;
use App\Models\DanhMuc;
use App\Models\Hang;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ds_sanpham = SanPham::with('hang', 'danhMuc')->get();
        return view("admin.sanpham.ds_sanpham", compact('ds_sanpham'));
    }

    public function addSP()
    {
        $autoID = new AutoIDFunction();
        $nextMaSP = $autoID->AutoID('SP', SanPham::class, 'MaSP');
        $idCSBH = DB::table("chinh_sach_bao_hanhs")->orderBy('MaCSBH', 'desc')->get();
        $idDM = DB::table("danh_mucs")->orderBy('MaDM', 'desc')->get();
        $idHang = DB::table("hangs")->orderBy('MaHang', 'desc')->get();
        return view('admin.sanpham.create_sp')->with('nextMaSP', $nextMaSP)->with('idCSBH', $idCSBH)->with('idDM', $idDM)->with('idHang', $idHang);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data  = array();
        $data['MaSP'] = $request->MaSP;
        $data['TenSP'] = $request->TenSP;
        $data['AnhDaiDien'] = $request->AnhDaiDien;
        $data['NamSX'] = $request->NamSX;
        $data['MaCSBH'] = $request->SP_MaCSBH;
        $data['MaDM'] = $request->SP_MaDM;
        $data['MaHang'] = $request->SP_MaHang;
        $get_anh = $request->file('AnhDaiDien');
        if ($get_anh) {
            $get_nameAnh = $get_anh->getClientOriginalName();
            $name_anh = current(explode('.', $get_nameAnh));
            $new_anh = $name_anh . rand(0, 99) . '.' . $get_anh->getClientOriginalExtension();
            $get_anh->move('public/uploads/AnhDaiDiens', $new_anh);
            $data['AnhDaiDien'] = $new_anh;
            DB::table('san_phams')->insert($data);
            return redirect('createSP')->with('message', 'Thêm sản phẩm thành công');
        }
        DB::table('san_phams')->insert($data);
        return redirect('createSP')->with('message', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function editSP($id)
    {
        $idCSBH = DB::table("chinh_sach_bao_hanhs")->orderBy('MaCSBH', 'desc')->get();
        $idDM = DB::table("danh_mucs")->orderBy('MaDM', 'desc')->get();
        $idHang = DB::table("hangs")->orderBy('MaHang', 'desc')->get();
        $editSP = DB::table("san_phams")->where('MaSP', $id)->get();

        return view('admin.sanpham.edit_sp', compact('editSP', 'idCSBH', 'idDM', 'idHang'));
    }

    public function update_sp(Request $request, $id)
    {
        $data  = array();
        $data['TenSP'] = $request->TenSP;
        $data['NamSX'] = $request->NamSX;
        $data['MaCSBH'] = $request->SP_MaCSBH;
        $data['MaDM'] = $request->SP_MaDM;
        $data['MaHang'] = $request->SP_MaHang;
        $get_anh = $request->file('AnhDaiDien');
        if ($get_anh) {
            $get_nameAnh = $get_anh->getClientOriginalName();
            $name_anh = current(explode('.', $get_nameAnh));
            $new_anh = $name_anh . rand(0, 99) . '.' . $get_anh->getClientOriginalExtension();
            $get_anh->move('public/uploads/AnhDaiDiens', $new_anh);
            $data['AnhDaiDien'] = $new_anh;
            DB::table('san_phams')->where('MaSP',$id)->update($data);
            return redirect('sanpham')->with('message', 'Cập nhật sản phẩm thành công');
        }
        DB::table('san_phams')->where('MaSP',$id)->update($data);
        return redirect('sanpham')->with('message', 'Cập nhật sản phẩm thành công');
    }

    public function deleteSP($id)
    {
        // $check = DB::table('chinh_sach_bao_hanhs')->where('chinh_sach_bao_hanhs.MaCSBH', $id)->exists();
        // $check = DB::table('san_phams')->where('san_phams.MaDM', $id)->exists();
        // $check = DB::table('san_phams')->where('san_phams.MaDM', $id)->exists();
        // if ($check) {
        //     return redirect('danhmuc')->with('message', 'Không thể xóa danh mục vì có dữ liệu liên quan.');
        // } else {
        //     DB::table('danh_mucs')->where('MaDM', $id)->delete();
        //     return redirect('danhmuc')->with('message', 'Xoá danh mục thành công');
        // }
        DB::table('san_phams')->where('MaSP',$id)->delete();
        return redirect('sanpham')->with('message', 'Xóa sản phẩm thành công');
    }
}
