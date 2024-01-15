<?php

use Illuminate\Support\Facades\Route;
//Frontend
use App\Http\Controllers\Frontend\CTSanPhamController;
use App\Http\Controllers\Frontend\CheckoutController;
//Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\NhaCungCapController;
use App\Http\Controllers\Admin\DungLuongController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\MauController;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\HoaDonBanController;
use App\Http\Controllers\Admin\HoaDonNhap\HoaDonNhapController;
use App\Http\Controllers\Admin\Hang\HangController;
use App\Http\Controllers\Admin\ChinhSachBaoHanhController;
use App\Http\Controllers\Admin\PhieuBaoHanhController;
use App\Http\Controllers\Admin\TaiKhoanController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangClientController;
use App\Http\Controllers\QuanLyDonHangController\QuanLyDonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\SanPhamctController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Fontend Lực
Route::get('/chi-tiet-san-pham/{MaSP}', [CTSanPhamController::class,'chitietsp']);
Route::post('/chi-tiet-san-pham', [CTSanPhamController::class,'ctsp']);
Route::get('/chi-tiet-san-pham/{MaSP}/{MaCTSP}/{TenMau}/{SoDL}', [CTSanPhamController::class, 'hienThiChiTiet'])->name('chi-tiet-san-phams');
Route::post('/api/ctspdungluong', [CTSanPhamController::class, 'layDLtheoMau']);

//Frontend Hào
Route::get('/', [HomeController::class, 'trang_chu']);
Route::get('/trang_chu', [HomeController::class, 'trang_chu'])->name('trang_chu');

Route::get('/sanphamtheodanhmuc/{MaDM}', [DanhMucController::class, 'index']);

Route::get('/login', [TaiKhoanController::class, 'login'] )->name('login');
Route::post('/save_login', [TaiKhoanController::class, 'save_login'])->name('save_login');

Route::get('/register', [TaiKhoanController::class, 'register'] )->name('dangky');
Route::post('/save_register', [TaiKhoanController::class, 'save_register'] )->name('save_register');

Route::get('/logout', [TaiKhoanController::class, 'logout'] )->name('logout');

Route::get('/thongtinkhachhang',[KhachHangClientController::class,'showThongTin'] )->name('show');
Route::get('/lichsudonhang',[KhachHangClientController::class,'showLichSu'] )->name('showls');
Route::post('/capnhatthongtin',[KhachHangClientController::class,'capnhat'] )->name('capnhat');

Route::get('/doimatkhau', [TaiKhoanController::class, 'doimatkhau'] )->name('doimatkhau');
Route::post('/save_doimatkhau', [TaiKhoanController::class, 'save_doimatkhau'] )->name('save_doimatkhau');

// Route::get('/QuenMatKhau', [TaiKhoanController::class, 'QuenMatKhau'] )->name('resetPass');

Route::get('/QuenMatKhau', [TaiKhoanController::class, 'QuenMatKhau'])->name('doimatkhau');
Route::post('/QuenMatKhau', [TaiKhoanController::class, 'postQuenMatKhau'])->name('postdoimatkhau');

Route::get('/resetPass/{Token}', [TaiKhoanController::class, 'ResetPass'])->name('resetPass');
Route::post('/postResetPass', [TaiKhoanController::class, 'postResetPass'])->name('postResetPass');

//Frontend Lợi
Route::get('/dsdh-cho-xac-nhan/{MaKH}', [QuanLyDonHangController::class,'dsdh_cho_xac_nhan'])->name('dsdh_cho_xac_nhan');
Route::get('/dsdh-da-xac-nhan/{MaKH}', [QuanLyDonHangController::class,'dsdh_da_xac_nhan'])->name('dsdh_da_xac_nhan');
Route::get('/dsdh-da-giao/{MaKH}', [QuanLyDonHangController::class,'dsdh_da_giao'])->name('dsdh_da_giao');
Route::get('/dsdh-da-huy/{MaKH}', [QuanLyDonHangController::class,'dsdh_da_huy'])->name('dsdh_da_huy');

Route::get('/chi-tiet-don-hang/{maHDB}', [QuanLyDonHangController::class,'chi_tiet_don_hang'])->name('chi_tiet_don_hang');
Route::get('/huy-chi-tiet-don-hang/{id}', [QuanLyDonHangController::class,'huy_chi_tiet_don_hang'])->name('huy_chi_tiet_don_hang');

Route::get('/li-do-huy-don-hang/{maHDB}', [QuanLyDonHangController::class,'li_do_huy_don_hang'])->name('li_do_huy_don_hang');
Route::post('/huy-don-hang/{id}', [QuanLyDonHangController::class,'huy_don_hang'])->name('huy_don_hang');

//Frontend Đạt
//Cart
Route::get('cart', [CTSanPhamController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{MaCTSP}', [CTSanPhamController::class, 'addToCart'])->name('add_to_cart');
Route::patch('/update-cart', [CTSanPhamController::class, 'update'])->name('update_cart');
Route::delete('/remove-from-cart', [CTSanPhamController::class, 'remove'])->name('remove_from_cart');
Route::get('/clear-cart', [CTSanPhamController::class, 'clearCart'])->name('clear.cart');

//Checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);


//BackEnd Lực

Route::get('/admin_login',[AdminController::class,'index']);
// Route::get('/admin',[AdminController::class,'trangchu']);
//NhaCungCap
Route::get('/danhsachnhacungcap',[NhaCungCapController::class,'index']);

Route::get('/themncc',[NhaCungCapController::class,'themncc']);
Route::post('/save_ncc',[NhaCungCapController::class,'save_ncc']);

Route::get('/suancc/{MaNCC}',[NhaCungCapController::class,'suancc']);
Route::post('/update_ncc/{MaNCC}',[NhaCungCapController::class,'update_ncc']);

Route::get('/xoancc/{MaNCC}',[NhaCungCapController::class,'xoancc']);

//DungLuong
Route::get('/danhsachdungluong',[DungLuongController::class,'index']);

Route::get('/themdungluong',[DungLuongController::class,'themdungluong']);
Route::post('/save_dl',[DungLuongController::class,'save_dl']);

Route::get('/suadungluong/{MaDL}',[DungLuongController::class,'suadungluong']);
Route::post('/update_dl/{MaDL}',[DungLuongController::class,'update_dl']);

Route::get('/xoadungluong/{MaDL}',[DungLuongController::class,'xoadungluong']);

//Feedback
Route::get('/danhsachfeedback',[FeedbackController::class,'index']);

Route::get('/xoafeedback/{MaFB}',[FeedbackController::class,'xoafeedback']);

//Mau
Route::get('/dsmau', [MauController::class, 'index']);
Route::get('/themmau', [MauController::class, 'themmau']);
Route::post('/themmau', [MauController::class, 'savethemmau']);

Route::get('/suamau/{mamau}', [MauController::class, 'suamau']);
Route::post('/suamau/{mamau}', [MauController::class, 'savesuamau']);

Route::get('/xoamau/{mamau}',[MauController::class,'xoamau']);


//Khách Hàng
Route::get('/dskhachhang',[KhachHangController::class, 'index']);

//Hóa Đơn Bán
Route::get('/dsdonhang', [HoaDonBanController::class, 'donhang']);
Route::get('/dshoadonban', [HoaDonBanController::class, 'hoadonban']);
Route::get('/dsdonhuy', [HoaDonBanController::class, 'donhanghuy']);
Route::get('/chitiethdb/{mahdb}', [HoaDonBanController::class, 'chitiethdb']);
Route::get('/xacnhan/{mahdb}',[HoaDonBanController::class,'xacnhan']);

Route::post('/updatetinhtrang', [HoaDonBanController::class, 'updateTinhTrang']);
Route::post('/updatetinhtrang1', [HoaDonBanController::class, 'updateTinhTrang1']);
//Lợi
//HoaDonNhapController
Route::get('/danh-sach-hoa-don-nhap', [HoaDonNhapController::class,'danh_sach_hoa_don_nhap'])->name('danh_sach_hoa_don_nhap');

Route::get('/them-hoa-don-nhap', [HoaDonNhapController::class,'them_hoa_don_nhap'])->name('them_hoa_don_nhap');
Route::post('/luu-hoa-don-nhap', [HoaDonNhapController::class,'luu_hoa_don_nhap'])->name('luu_hoa_don_nhap');

Route::get('/them-chi-tiet-hoa-don-nhap/{id}', [HoaDonNhapController::class,'them_chi_tiet_hoa_don_nhap'])->name('them_chi_tiet_hoa_don_nhap');
Route::post('/luu-chi-tiet-hoa-don-nhap', [HoaDonNhapController::class,'luu_chi_tiet_hoa_don_nhap'])->name('luu_chi_tiet_hoa_don_nhap');
Route::get('/chi-tiet-hoa-don-nhap/{id}', [HoaDonNhapController::class,'chi_tiet_hoa_don_nhap'])->name('chi_tiet_hoa_don_nhap');


Route::get('/sua-hoa-don-nhap/{id}', [HoaDonNhapController::class,'sua_hoa_don_nhap'])->name('sua_hoa_don_nhap');
Route::post('/cap-nhap-hoa-don-nhap/{id}', [HoaDonNhapController::class,'cap_nhap_hoa_don_nhap'])->name('cap_nhap_hoa_don_nhap');

//HangController
Route::get('/danh-sach-hang', [HangController::class,'danh_sach_hang'])->name('danh_sach_hang');

Route::get('/them-hang', [HangController::class,'them_hang'])->name('them_hang');
Route::post('/luu-hang', [HangController::class,'luu_hang']);

Route::get('/sua-hang/{id}', [HangController::class,'sua_hang'])->name('sua_hang');
Route::post('/cap-nhap-hang/{id}', [HangController::class,'cap_nhap_hang'])->name('cap_nhap_hang');

Route::get('/xoa-hang/{id}', [HangController::class,'xoa_hang'])->name('xoa_hang');

//Backend Hào
Route::get('/admin',[AdminController::class,'index']);
// Route::get('/admin',[AdminController::class,'trangchu']);

//TaiKhoan
Route::get('/danhsachtknhanvien',[TaiKhoanController::class,'danhsachtknhanvien']);

Route::get('/danhsachtkkhachhang',[TaiKhoanController::class,'danhsachtkkhachhang']);

Route::get('/themtknhanvien',[TaiKhoanController::class,'themtknhanvien']);
Route::post('/save_tknhanvien',[TaiKhoanController::class,'save_tknhanvien']);

Route::get('/suatknhanvien/{Username}',[TaiKhoanController::class,'suatknhanvien']);
Route::post('/update_tknv/{Username}',[TaiKhoanController::class,'update_tknv']);

Route::get('/xoatknhanvien/{Username}',[TaiKhoanController::class,'xoatknhanvien']);

Route::get('/xoatkkhachhang/{Username}',[TaiKhoanController::class,'xoatkkhachhang']);

//Chinh Sach Bao Hanh
Route::get('/danhsachchinhsach',[ChinhSachBaoHanhController::class,'index']);

Route::get('/themchinhsach',[ChinhSachBaoHanhController::class,'themchinhsach']);
Route::post('/save_cs',[ChinhSachBaoHanhController::class,'save_cs']);

Route::get('/suachinhsach/{MaCSBH}',[ChinhSachBaoHanhController::class,'suachinhsach']);
Route::post('/update_cs/{MaCSBH}',[ChinhSachBaoHanhController::class,'update_cs']);

Route::get('/xoachinhsach/{MaCSBH}',[ChinhSachBaoHanhController::class,'xoachinhsach']);

//Phieu Bao Hanh
Route::get('/danhsachphieubaohanh',[PhieuBaoHanhController::class,'index']);


//Backend Đạt
//SanPham
Route::get('/sanpham', [SanPhamController::class, 'index']);
Route::get('/createSP',[SanPhamController::class,'addSP']);
Route::post('/storeSP',[SanPhamController::class,'store']);
Route::get('/editSP/{MaSP}',[SanPhamController::class,'editSP']);
Route::post('/update_sp/{MaSP}',[SanPhamController::class,'update_sp']);
Route::get('/deleteSP/{MaSP}',[SanPhamController::class,'deleteSP']);

//SanPhamChiTiet
Route::get('/sanphamct', [SanPhamctController::class, 'index']);
Route::get('/createSPCT',[SanPhamctController::class,'addSPCT']);
Route::post('/storeSPCT',[SanPhamctController::class,'storeCT']);
Route::get('/editSPCT/{MaCTSP}',[SanPhamctController::class,'editSPCT']);
Route::post('/update_spct/{MaCTSP}',[SanPhamctController::class,'update_spct']);
Route::get('/deleteSPCT/{MaCTSP}',[SanPhamctController::class,'deleteSPCT']);
Route::get('/unactive-product/{MaCTSP}',[SanPhamctController::class,'unactive_product']);
Route::get('/active-product/{MaCTSP}',[SanPhamctController::class,'active-product']);


