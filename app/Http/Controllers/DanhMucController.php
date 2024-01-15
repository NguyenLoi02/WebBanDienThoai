<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucController extends Controller
{
    public function index($id){
        $danhsachsp = DB::select('select * from san_phams join danh_mucs on
        san_phams.MaDM = danh_mucs.MaDM join hangs
        on san_phams.MaHang = hangs.MaHang
        where danh_mucs.MaDM=?', [$id]);
        // dd($danhsachsp);
        if($key = request()->key){
            $danhsachsp = DB::table("san_phams")->join('hangs','hangs.MaHang', '=', 'san_phams.MaHang')->where('TenSP','like','%'.$key.'%')->paginate(8);
        }
        return view('pages.sanphamtheodanhmuc', ['danhsachsp' => $danhsachsp]);
    }
}
