<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KhachHang;
class HomeController extends Controller
{
    public function trang_chu()
    {
        // $danhsach = DB::select("select san_phams.MaSP, TenSP, AnhDaiDien, min(chi_tiet_san_phams.DonGiaBan) as GiaBan, hangs.TenHang from san_phams join chi_tiet_san_phams
        // on san_phams.MaSP = chi_tiet_san_phams.MaSP join hangs on hangs.MaHang = san_phams.MaHang
        // group by san_phams.MaSP, san_phams.TenSP, san_phams.AnhDaiDien, hangs.TenHang");
        // dd(request()->key);
        $profile = KhachHang::where('Username', session('loggedInUser.Username'))->first();
        $danhsach = DB::table("san_phams")->join('hangs', 'hangs.MaHang', '=', 'san_phams.MaHang')->paginate(8);
        // dd($danhsach);
        if ($key = request()->key) {
            $danhsach = DB::table("san_phams")->join('hangs', 'hangs.MaHang', '=', 'san_phams.MaHang')->where('TenSP', 'like', '%' . $key . '%')->paginate(8);
        }
        return view('pages.home', compact('profile'), ['danhsach' => $danhsach]);
        // Kiểm tra xem người dùng có phải là admin hay không
        // Lấy trong session ra check LoaiTaiKhoan

    }
}
