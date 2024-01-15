<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quên Mật Khẩu</title>
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

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img"
                        src="{{ asset('backend/assets/images/logo.png') }}" alt="logo"></a><span
                    class="splash-description">Quên Mật Khẩu</span></div>


            <div class="card-body">
                <form action="{{route('postdoimatkhau')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="Email" type="text" placeholder="Email"
                            autocomplete="off">
                        @error('Email')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (session('message'))
                    <span class="text-success">{{ session('message') }}</span>
                    @php
                        session()->forget('message');
                    @endphp
                @endif

                    <button type="submit" class="btn btn-primary btn-lg btn-block"> Gửi EMail</button>
                </form>
            </div>
            {{-- <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('dangky') }}" class="footer-link">Tạo Tài Khoản</a>
                </div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Quên mật khẩu</a>
                </div>
            </div> --}}
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ asset('backend/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
