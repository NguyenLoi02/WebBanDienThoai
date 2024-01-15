<?php

namespace App\Http\Controllers\Admin\Hang;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Http\Request;
use App\Models\Hang;
use Illuminate\Support\Facades\DB;

class HangController extends Controller
{
     //hiển thị danh sách hãng
     public function danh_sach_hang(){
        $danh_sach_hang = DB::table('hangs')-> get();
        $manager_category_product = view('Admin.Hang.danh_sach_hang')->with('danh_sach_hang', $danh_sach_hang);
        return view('admin_layout')->with('Admin.Hang.danh_sach_hang', $manager_category_product);
    }

    //thêm hãng
    public function them_hang(){
        $autoID = new AutoIDFunction();
        $nextMaHang = $autoID->AutoID('MH', Hang::class, 'MaHang');
        return view('Admin.Hang.them_hang', compact('nextMaHang'));
    }
    public function luu_hang(Request $request){
        $data = array();
        $data['MaHang'] = $request->MaHang;
        $data['TenHang'] = $request->TenHang;
        DB::table('hangs')->insert($data);
        return redirect('danh-sach-hang')->with('message', 'Thêm thành công');
    }

    //sửa hãng
    public function sua_hang($id){
        $sua_hang = DB::table('hangs')-> where('MaHang', $id)->get();
        return view('Admin.Hang.sua_hang',compact('sua_hang'));
    }
    public function cap_nhap_hang(Request $request,$id){
        $request->validate([
            'TenHang'=>'required'
        ],[
            'TenHang.required'=>'Tên hãng không được để trống'
        ]);
        $data = array();
        $data['TenHang'] = $request->TenHang;
        DB::table('hangs')->where('MaHang', $id)->update($data);
        return redirect('danh-sach-hang')->with('message', 'Sửa thành công');
    }
    //xóa hãng
    public function xoa_hang($id){
        $check = DB::table('san_phams')->where('san_phams.MaHang', $id)->exists();
        if($check){
            return redirect('danh-sach-hang')->with('message', 'Lỗi! không thể xóa');
        }
        else{
            DB::table('hangs')->where('MaHang', $id)->delete();
            return redirect('danh-sach-hang')->with('message', 'Xóa thành công');
        }
    }
}
