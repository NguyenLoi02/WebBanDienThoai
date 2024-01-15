<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MauSac;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Support\Facades\DB;


class MauController extends Controller
{
    public function index()
    {
        $ds_mau = DB::select('select * from mau_sacs');
        return view("Admin.Mau.ds_mau", compact('ds_mau'));
    }
    public function themmau(){
        $autoID = new AutoIDFunction();
        $nextMaMau = $autoID->AutoID('MS', MauSac::class, 'MaMau');
        return view("Admin.Mau.themmau", compact('nextMaMau'));
    }
    public function savethemmau(Request $request){
        $request->validate([
            'MaMau' => 'required',
            'TenMau' => 'required'
        ], [
            'MaMau.required' => 'Mã màu không được để trống',
            'TenMau.required' => 'Tên màu không được để trống'
        ]);
        DB::insert('Insert into mau_sacs (MaMau,TenMau) values (?, ?)',[
            $request->MaMau,
            $request->TenMau
        ]);

        return redirect('dsmau')->with('message', 'Thêm màu thành công');
    }
    public function suamau($mamau){
        $suamau = DB::select('select * from mau_sacs where mamau = ?', [$mamau]);
        return view('admin.mau.suamau', compact('suamau'));

    }

    public function savesuamau(Request $request, $mamau)
    {
        $request->validate([
            'TenMau' => 'required'
        ], [
            'TenMau.required' => 'Tên màu không được để trống'
        ]);
        DB::update('Update mau_sacs set TenMau = ? where MaMau = ? ',[
            $request->TenMau,
            $mamau
        ]);

        return redirect('dsmau')->with('message', 'Cập nhật màu thành công');
    }

    public function xoamau( $mamau){
        $check = DB::table('chi_tiet_san_phams')->where('chi_tiet_san_phams.MaDL',$mamau)->exists();
        if($check){
            return redirect('dsmau')->with('message', 'Không thể xóa màu vì có dữ liệu liên quan.');
        }else{
            DB::table('mau_sacs')->where('MaMau', $mamau)->delete();
            return redirect('dsmau')->with('message', 'Xoá màu thành công');
        }
    }
}
