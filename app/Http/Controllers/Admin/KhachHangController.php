<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Support\Facades\DB;


class KhachHangController extends Controller
{
    public function index()
    {
        $dskhachhang = DB::table("khach_hangs")->get();
        return view("admin.khachhang.dskhachhang", compact('dskhachhang'));
    }
    // public function xoafeedback($id)
    // {
    //     DB::table('feedback')->where('MaFB', $id)->delete();
    //     return redirect('danhsachfeedback')->with('message', 'Xoá feedback thành công');
    // }
}
