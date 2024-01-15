<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng Ký</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('backend/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" action="{{ URL::to('/save_register') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Đăng Ký</h3>
                <p>Vui lòng điền thông tin</p>
                <br>
                @if (session('message'))
                    <span class="alert alert-success">{{ session('message') }}</span>
                    @php
                        session()->forget('message');
                    @endphp
                @endif

            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="Username" required=""
                        placeholder="Username" autocomplete="off">
                    @error('Username')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="Email" name="Email" required=""
                        placeholder="E-mail" autocomplete="off">
                    @error('Email')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="Password" type="Password" required=""
                        placeholder="Password">
                    @error('Password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="Comfirmpass" required="" placeholder="Confirm" type="password">
                    @error('Comfirmpass')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" value="1" name="LoaiTaiKhoan" required=""
                        hidden>
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Đăng Ký</button>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label"><a
                                href="#">Nhớ Mật Khẩu</a></span>
                    </label>
                </div>
                <div class="form-group row pt-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <button class="btn btn-block btn-social btn-facebook " type="button">Facebook</button>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn  btn-block btn-social btn-twitter" type="button">Twitter</button>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Quên Mật Khẩu? <a href="{{ route('login') }}" class="text-secondary">Đăng Nhập</a></p>
            </div>
        </div>
    </form>
</body>


</html>
