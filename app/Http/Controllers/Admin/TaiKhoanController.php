<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\ResetPass;
use App\Models\TaiKhoan;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Mail\VerifyEmail;
use Illuminate\Mail\Mailable;
use App\Mail\ForgotPass;


class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function danhsachtknhanvien()
    {
        $ds_tknhanvien = DB::table("tai_khoans")->where('LoaiTaiKhoan', '2')->get();
        return view("admin.taikhoan.ds_taikhoannhanvien", compact('ds_tknhanvien'));
    }
    public function danhsachtkkhachhang()
    {
        $ds_tkkhachhang = DB::table("tai_khoans")->where('LoaiTaiKhoan', '1')->get();
        return view("admin.taikhoan.ds_taikhoankhachhang", compact('ds_tkkhachhang'));
    }
    public function themtknhanvien()
    {
        $autoID = new AutoIDFunction();
        $nextUsername = $autoID->AutoID('TK', TaiKhoan::class, 'Username');
        return view('admin.taikhoan.themtknhanvien', compact('nextUsername'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save_tknhanvien(Request $request)
    {
        $validatedData = $request->validate([
            'Username' => 'required',
            'Password' => 'required',
            'LoaiTaiKhoan' => 'required'
        ]);

        DB::table('tai_khoans')->insert([
            'Username' => $request->Username,
            'Password' => bcrypt($request->input('Password')),
            'LoaiTaiKhoan' => $request->LoaiTaiKhoan

        ]);

        return redirect('themtknhanvien')->with('message', 'Thêm tài khoản thành công');
    }


    /**
     * Display the specified resource.
     */
    public function suatknhanvien($id)
    {
        $suataikhoannhanvien = DB::table("tai_khoans")->where('Username', $id)->get();

        return view('admin.taikhoan.suatknhanvien', compact('suataikhoannhanvien'));
    }
    public function update_tknv(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Password' => 'required'
        ]);

        DB::table('tai_khoans')->where('Username', $id)->update([
            'Password' => $request->Password
        ]);

        return redirect('danhsachtknhanvien')->with('message', 'Cập nhật tài khoản thành công');
    }

    public function xoatknhanvien($id)
    {
        $check = DB::table('nhan_viens')->where('nhan_viens.Username', $id)->exists();
        if ($check) {
            return redirect('danhsachtknhanvien')->with('message', 'Không thể xóa tài khoản vì có dữ liệu liên quan.');
        } else {
            DB::table('tai_khoans')->where('Username', $id)->delete();
            return redirect('danhsachtknhanvien')->with('message', 'Xoá tài khoản thành công');
        }
    }

    public function xoatkkhachhang($id)
    {
        $check = DB::table('hoa_don_nhaps')->where('hoa_don_nhaps.Username', $id)->exists();
        if ($check) {
            return redirect('danhsachtkkhachhang')->with('message', 'Không thể xóa tài khoản vì có dữ liệu liên quan.');
        } else {
            DB::table('tai_khoans')->where('Username', $id)->delete();
            return redirect('danhsachtkkhachhang')->with('message', 'Xoá tài khoản thành công');
        }
    }
    public function login()
    {
        return view('pages.login');
    }
    public function register()
    {
        return view('pages.dangky');
    }
    public function save_register(Request $request)
    {
        // Kiểm tra tính hợp lệ của dữ liệu đăng ký
        $request->validate([
            'Username' => 'required|unique:tai_khoans',
            'Email' => 'required|email|unique:khach_hangs',
            'Password' => 'required|min:6',
            'Comfirmpass' => 'required|same:Password',
        ],[
            'Username.required'=> 'Bạn phải nhập username',
            'Username.unique'=> 'Username đã tồn tại',
            'Email.required'=> 'Bạn phải nhập email',
            'Email.email'=> 'Bạn phải nhập email đúng định dạng',
            'Email.unique'=> 'Email đã được đăng ký',
            'Password.required'=> 'Bạn phải nhập password và tối thiểu 6 ký tự',
            'Comfirmpass.required'=> 'Bạn phải nhập xác nhận mật khẩu',
            'Comfirmpass.same'=> 'Mật khẩu không khớp',
        ]);

        // Tạo tài khoản người dùng mới
        $taikhoan = new TaiKhoan;
        $taikhoan->Username = $request->input('Username');
        $taikhoan->Password = bcrypt($request->input('Password'));
        $taikhoan->LoaiTaiKhoan = 1; // Loại tài khoản khách hàng
        $taikhoan->save();

        // Tạo khách hàng mới
        $autoID = new AutoIDFunction();
        $nextKH = $autoID->AutoID('KH', KhachHang::class, 'MaKH');
        $khachhang = new KhachHang;
        $khachhang->MaKH = $nextKH;
        $khachhang->Email = $request->input('Email');
        $khachhang->Username = $taikhoan->Username;
        $khachhang->save();

        // Đăng nhập người dùng mới
        // Auth::login($taikhoan);
        // dd($taikhoan);

        // Chuyển hướng người dùng đến trang chủ
        return redirect()->route('login');
    }
    public function save_login(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'Username' => 'required',
        //     'Password' => 'required|min:6',
        // ]);

        // $user = TaiKhoan::where('Username', $request->input('Username'))->first();

        // if ($user && Hash::check($request->input('Password'), $user->Password)) {
        //     $session = session();
        //     // Đăng nhập thành công, thêm thông tin đăng nhập vào session (bây giờ trong session đã có toàn bộ đối tuonwgj $user rồi nhá)
        //     session()->put('loggedInUser', $user);
        //     // dd(session('loggedInUser.Username'));
        //     if (session('loggedInUser.LoaiTaiKhoan') === '2') {
        //         return view('Admin.nhacungcap.ds_nhacungcap');
        //     } else {
        //         $danhsach = DB::table("san_phams")->join('hangs', 'hangs.MaHang', '=', 'san_phams.MaHang')->paginate(8);
        //         // dd($danhsach);
        //         if ($key = request()->key) {
        //             $danhsach = DB::table("san_phams")->join('hangs', 'hangs.MaHang', '=', 'san_phams.MaHang')->where('TenSP', 'like', '%' . $key . '%')->paginate(8);
        //         }
        //         return view('pages.home', ['danhsach' => $danhsach]);
        //     }
        // } else {

        //     return back()->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác.');
        // }
        $request->validate([
            'Username' => 'required',
            'Password' => 'required|min:6',
        ],[
            'Username.required'=> 'Bạn phải nhập tên đăng nhập',
            'Password.required'=> 'Bạn phải nhập mật khẩu',
        ]);

        $user = TaiKhoan::where('Username', $request->input('Username'))->first();
        $khachhang = KhachHang::where('Username', $request->input('Username'))->first();
        if ($user && Hash::check($request->input('Password'), $user->Password)) {
            session()->put('loggedInUser', $user);
            session()->put('isLoggedIn', true);
            session()->put('thongtinkhachhang', $khachhang);

            if (session('loggedInUser.LoaiTaiKhoan') === 2) {
                // Chuyển hướng đến trang quản lý nhà cung cấp
                // dd(session('loggedInUser'));
                $ds_sanpham = SanPham::with('hang', 'danhMuc')->get();
                return view('Admin.SanPham.ds_sanpham', compact('ds_sanpham'));
            } else {
                $danhsach = DB::table('san_phams')
                    ->join('hangs', 'hangs.MaHang', '=', 'san_phams.MaHang')
                    ->paginate(8);

                // Kiểm tra nếu có từ khóa tìm kiếm
                if ($key = request()->key) {
                    $danhsach = DB::table('san_phams')
                        ->join('hangs', 'hangs.MaHang', '=', 'san_phams.MaHang')
                        ->where('TenSP', 'like', '%' . $key . '%')
                        ->paginate(8);
                }

                // Trả về trang chủ với danh sách sản phẩm
                return view('pages.home', ['danhsach' => $danhsach]);
                // dd($khachhang);
                // dd(session('thongtinkhachhang'));
            }
        } else {
            return back()->with('message', 'Tên đăng nhập hoặc mật khẩu không chính xác.');
        }
    }
    public function logout()
    {
        // Xóa thông tin đăng nhập khỏi session
        session()->forget('loggedInUser');
        session()->forget('thongtinkhachhang');
        session()->put('isLoggedIn', false);

        // Chuyển hướng về trang đăng nhập
        return redirect()->route('trang_chu');
    }
    public function doimatkhau(){
        return view('pages.doimatkhau');
    }
    public function save_doimatkhau(Request $request){

        $validate = $request->validate([
            'Password' => 'required',
            'New_Pass' => 'required|min:6',
            'Confirm_Pass' => 'required|same:New_Pass',

        ], [
            'Password.required' => 'Vui lòng nhập mật khẩu cũ',
            'New_Pass.required' => 'Vui lòng nhập mật khẩu mới và tối thiểu 6 ký tự',
            'Confirm_Pass.required' => 'Vui lòng nhập xác nhận mật khẩu',
            'Confirm_Pass.same' => ' Mật khẩu không khớp',

        ]);
        // dd(session('thongtinkhachhang'));
        $userPassword = TaiKhoan::where('Username', session('thongtinkhachhang.Username'))->first()->Password;
        if (!Hash::check($request->Password, $userPassword)) {
            return redirect('doimatkhau')->with('message', 'Mật khẩu cũ không đúng');
        } else {
            $updatePassword = TaiKhoan::where('Username', session('thongtinkhachhang.Username'))->update([
                'Password' => Hash::make($request->New_Pass),
            ]);
            // dd($updatePassword);
            if ($updatePassword) {
                $user = TaiKhoan::select('tai_khoans.*')
                    ->where('tai_khoans.Username', session('thongtinkhachhang.Username'))
                    ->first();

                session()->forget('loggedInUser');
                session()->put('loggedInUser', $user);

                return redirect('doimatkhau')->with('message', 'Cập nhật thành công');
            } else {
                return redirect('doimatkhau')->with('message', 'Cập nhật thất bại');
            }
        }

    }

    public function QuenMatKhau(){
        return view('pages.QuenMatKhau');
    }

    public function postQuenMatKhau(Request $request){
        $validate = $request->validate([
            'Email' => 'required|email'
        ],[
            'Email.required' => 'Bạn phải nhập email',
            'Email.email' => 'Bạn phải nhập email đúng định dạng',
        ]);
        // $user = TaiKhoan::where('tai_khoans.Username', $request->Email)->join('khach_hangs', 'tai_khoans.Username', '=', 'khach_hangs.Username')->first();
        $user = DB::select('select * from tai_khoans join khach_hangs on tai_khoans.Username = khach_hangs.Username where khach_hangs.Email=?',[$request->Email]);
        // dd($user);
        if(!$user){
            return  view('pages.QuenMatKhau')->with('message','Email không tồn tại');
        }else{
            $token = Str::random(64);
            session()->put('Token', $token);
            ResetPass::create([
                'Email'=> $request->Email,
                'Token'=> $token,
            ]);

            $data = [
                'body' => route('resetPass', ['Token' => $token]),
            ];

            Mail::to($request->Email)->send(new ForgotPass($data));
            session()->put('message', 'Đã gửi mail');

            return view('pages.QuenMatKhau');
        }

    }
    public function ResetPass(){
        $token = session('Token');
        $email = ResetPass::where('Token', $token)->first();
        // dd($email);
        if($email){
            return view('pages.resetpass', ['Token'=> session('Token'),'Email'=>$email->Email]);
        }

    }
    public function postResetPass(Request $request){
        $validate = $request->validate([
            'Password' => 'required|min:6',
            'Confirm_Pass' => 'required|same:Password',
        ],[
            'Password.required'=> 'Bạn phải nhập mật khẩu mới',
            'Confirm_Pass.required' => 'Bạn phải xác nhận lại mật khẩu',
            'Confirm_Pass.same' => 'Mật khẩu không khớp',
        ]);
        // dd($request);
        $token = session()->get('Token');
        $updatePass = ResetPass::where('Token', $token)->first();
        if(!$updatePass){
            return view('pages.resetpass')->with('message','Token không tồn tại');
        }
        $updateTaiKhoan = DB::table('tai_khoans')
        ->join('khach_hangs', 'tai_khoans.Username', '=', 'khach_hangs.Username')
        ->where('khach_hangs.Email', '=', $updatePass->Email)
        ->update(['tai_khoans.Password' => Hash::make($request->Password)]);
        $XoaToken = ResetPass::where('Email', $updatePass->Email)->delete();
        // dd($updateTaiKhoan);
        if($updateTaiKhoan){
            session()->put('message','Đặt mật khẩu thành công');
            return view('pages.resetpass');
        }else{
            session()->put('message','Đặt mật khẩu thất bại');
            return view('pages.resetpass');
        }

    }

}
