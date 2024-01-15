<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NhaCungCap;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Support\Facades\DB;


class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ds_nhacungcap = DB::table("nha_cung_caps")->paginate(5);
        return view("admin.nhacungcap.ds_nhacungcap", compact('ds_nhacungcap'));
    }
    public function themncc()
    {
        $autoID = new AutoIDFunction();
        $nextMaNCC = $autoID->AutoID('NCC', NhaCungCap::class, 'MaNCC');
        return view('admin.nhacungcap.themncc', compact('nextMaNCC'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save_ncc(Request $request)
    {
        $validatedData = $request->validate([
            'MaNCC' => 'required',
            'TenNCC' => 'required',
            'SoDienThoai' => 'required',
            'DiaChi' => 'required'
        ]);
        $data = [
            'MaNCC' => $request->MaNCC,
            'TenNCC' => $request->TenNCC,
            'SoDienThoai' => $request->SoDienThoai,
            'DiaChi' => $request->DiaChi,
        ];

        DB::table('nha_cung_caps')->insert($data);

        return redirect('themncc')->with('message', 'Thêm nhà cung cấp thành công');
    }

    /**
     * Display the specified resource.
     */
    public function suancc($id)
    {
        $suanhacungcap = DB::table("nha_cung_caps")->where('MaNCC', $id)->get();
        return view('admin.nhacungcap.suancc', compact('suanhacungcap'));
    }

    public function update_ncc(Request $request, $id)
    {
        $validatedData = $request->validate([
            'TenNCC' => 'required',
            'SoDienThoai' => 'required',
            'DiaChi' => 'required'
        ]);
        $data = [
            'TenNCC' => $request->TenNCC,
            'SoDienThoai' => $request->SoDienThoai,
            'DiaChi' => $request->DiaChi,
        ];

        DB::table('nha_cung_caps')->where('MaNCC', $id)->update($data);

        return redirect('danhsachnhacungcap')->with('message', 'Cập nhật nhà cung cấp thành công');
    }

    public function xoancc( $id){
        $check = DB::table('hoa_don_nhaps')->where('hoa_don_nhaps.MaNCC',$id)->exists();
        if($check){
            return redirect('danhsachnhacungcap')->with('message', 'Không thể xóa nhà cung cấp vì có dữ liệu liên quan.');
        }else{
            DB::table('nha_cung_caps')->where('MaNCC', $id)->delete();
            return redirect('danhsachnhacungcap')->with('message', 'Xoá nhà cung cấp thành công');
        }

    }
}
