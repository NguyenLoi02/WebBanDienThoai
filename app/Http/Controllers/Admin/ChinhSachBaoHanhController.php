<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AutoGenID\AutoIDFunction;
use App\Http\Controllers\Controller;
use App\Models\ChinhSachBaoHanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChinhSachBaoHanhController extends Controller
{
    public function index()
    {
        $ds_chinhsach = DB::table("chinh_sach_bao_hanhs")->get();
        return view("admin.chinhsach.ds_chinhsach", compact('ds_chinhsach'));
    }
    public function themchinhsach()
    {
        $autoID = new AutoIDFunction();
        $nextMaCSBH = $autoID->AutoID('CSBH', ChinhSachBaoHanh::class, 'MaCSBH');
        return view('admin.chinhsach.themchinhsach', compact('nextMaCSBH'));
    }
    public function save_cs(Request $request)
    {
        $validatedData = $request->validate([
            'MaCSBH' => 'required',
            'ThoiGianBH' => 'required',
            'NoiDung' => 'required'
        ], [
            'ThoiGianBH.required' => 'Vui lòng nhập thời gian bảo hành.',
            'NoiDung.required' => 'Vui lòng nhập nội dung.'
        ]);

        DB::table('chinh_sach_bao_hanhs')->insert([
            'MaCSBH' => $request->MaCSBH,
            'ThoiGianBH' => $request->ThoiGianBH,
            'NoiDung' => $request->NoiDung
        ]);

        return redirect('themchinhsach')->with('message', 'Thêm chính sách thành công');
    }
    public function suachinhsach($id)
    {
        $suachinhsach = DB::table("chinh_sach_bao_hanhs")->where('MaCSBH', $id)->get();

        return view('admin.chinhsach.suachinhsach', compact('suachinhsach'));

    }
    public function update_cs(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ThoiGianBH' => 'required',
            'NoiDung' => 'required'
        ]);

        DB::table('chinh_sach_bao_hanhs')->where('MaCSBH', $id)->update([
            'ThoiGianBH' => $request->ThoiGianBH,
            'NoiDung' => $request->NoiDung
        ]);

        return redirect('danhsachchinhsach')->with('message', 'Cập nhật chính sách thành công');
    }
    public function xoachinhsach( $id){
        $check = DB::table('san_phams')->where('san_phams.MaCSBH',$id)->exists();
        if($check){
            return redirect('danhsachchinhsach')->with('message', 'Không thể xóa chính sách vì có dữ liệu liên quan.');
        }else{
            DB::table('chinh_sach_bao_hanhs')->where('MaCSBH', $id)->delete();
            return redirect('danhsachchinhsach')->with('message', 'Xoá chính sách thành công');
        }
    }
}
