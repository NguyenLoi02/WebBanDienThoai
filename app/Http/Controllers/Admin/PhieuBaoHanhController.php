<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AutoGenID\AutoIDFunction;
use App\Http\Controllers\Controller;
use App\Models\PhieuBaoHanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhieuBaoHanhController extends Controller
{

    public function index()
    {
        $ds_phieubaohanh = DB::select("select * from phieu_bao_hanhs join hoa_don_bans on
        phieu_bao_hanhs.MaHDB = hoa_don_bans.MaHDB join chi_tiet_h_d_b_s
        on hoa_don_bans.MaHDB = chi_tiet_h_d_b_s.MaHDB join chi_tiet_san_phams
        on chi_tiet_h_d_b_s.MaCTSP = chi_tiet_san_phams.MaCTSP join san_phams
        on san_phams.MaSP = chi_tiet_san_phams.MaSP join chinh_sach_bao_hanhs
        on san_phams.MaCSBH = chinh_sach_bao_hanhs.MaCSBH");
        //dd($ds_phieubaohanh);
        return view("admin.phieubaohanh.ds_phieubaohanh", compact('ds_phieubaohanh'));
    }
    public function themphieu()
    {
        $autoID = new AutoIDFunction();
        $nextMaPBH = $autoID->AutoID('PBH', PhieuBaoHanh::class, 'MaPBH');
        return view('admin.phieubaohanh.themphieu', compact('nextMaPBH'));
    }
    public function save_phieu(Request $request)
    {
        $validatedData = $request->validate([
            'MaPBH' => 'required',
            'NgayBH' => 'required',
            'TinhTrangBH' => 'required',
            'NVBH' => 'required',
            'NgayHoanThanh' => 'required',
            'MaHDB' => 'required'
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
