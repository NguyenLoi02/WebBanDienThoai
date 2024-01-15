<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DungLuong;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Support\Facades\DB;


class DungLuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ds_dungluong = DB::table("dung_luongs")->get();
        return view("admin.dungluong.ds_dungluong", compact('ds_dungluong'));
    }
    public function themdungluong()
    {
        $autoID = new AutoIDFunction();
        $nextMaDL = $autoID->AutoID('DL', DungLuong::class, 'MaDL');
        return view('admin.dungluong.themdungluong', compact('nextMaDL'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save_dl(Request $request)
    {
        $validatedData = $request->validate([
            'MaDL' => 'required',
            'SoDL' => 'required'
        ]);

        DB::table('dung_luongs')->insert([
            'MaDL' => $request->MaDL,
            'SoDL' => $request->SoDL
        ]);

        return redirect('themdungluong')->with('success', 'Thêm dung lượng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function suadungluong($id)
    {
        $suadungluong = DB::table("dung_luongs")->where('MaDL', $id)->get();

        return view('admin.dungluong.suadungluong', compact('suadungluong'));

    }
    public function update_dl(Request $request, $id)
    {
        $validatedData = $request->validate([
            'SoDL' => 'required'
        ]);

        DB::table('dung_luongs')->where('MaDL', $id)->update([
            'SoDL' => $request->SoDL
        ]);

        return redirect('danhsachdungluong')->with('message', 'Cập nhật dung lượng thành công');
    }

    public function xoadungluong( $id){
        $check = DB::table('chi_tiet_san_phams')->where('chi_tiet_san_phams.MaDL',$id)->exists();
        if($check){
            return redirect('danhsachdungluong')->with('message', 'Không thể xóa dung lượng vì có dữ liệu liên quan.');
        }else{
            DB::table('dung_luongs')->where('MaDL', $id)->delete();
            return redirect('danhsachdungluong')->with('message', 'Xoá dung lượng thành công');
        }
    }
}

