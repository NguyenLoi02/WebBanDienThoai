@extends('client_layout')
@section('content')
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="{{URL::to('/login-customer')}}" method="POST">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Đăng nhập</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Họ Tên</label>
                                <input name="HoTen" class="mb-0"  placeholder="Họ tên">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Mật Khẩu</label>
                                <input name="Pass" class="mb-0"  placeholder="Mật khẩu">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Ghi nhớ đăng nhập</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                <a href="#"> Quên mật khẩu?</a>
                            </div>
                            <div class="col-md-12">
                                <button class="register-button mt-0">Đăng nhập</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="{{URL::to('/add-customer')}}" method="POST">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Đăng ký</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <label>Họ Tên</label>
                                <input name="customer_name"  class="mb-0" type="text" placeholder="Họ Tên">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Số điện thoại</label>
                                <input name="customer_phone" class="mb-0" type="text" placeholder="Số điện thoại">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Địa Chỉ</label>
                                <input name="customer_address" class="mb-0" type="text" placeholder="Địa chỉ">
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Địa chỉ Email*</label>
                                <input name="customer_email" class="mb-0" type="email" placeholder="Email Address">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Mật khẩu</label>
                                <input name="customer_pass" class="mb-0" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Nhập lại mật khẩu</label>
                                <input class="mb-0" type="password" placeholder="Confirm Password">
                            </div>
                            <div class="col-12">
                                <button class="register-button mt-0">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login Content Area End Here -->
@endsection
