@extends('admin_layout')
@section('admin_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Thêm Tài Khoản Nhân Viên</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{URL::to('/danhsachtknhanvien')}}" class="btn btn-primary float-right">Danh Sách Tài Khoản</a>
                </div>
            </div>
            @if (session('message'))
                    <span class="alert alert-success">{{ session('message') }}</span>
                    @php
                        session()->forget('message');
                    @endphp
                @endif

        </div>
        <div class="card-body">
            <form action="{{URL::to('/save_tknhanvien')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Tên Tài Khoản</strong>
                            <input type="text" name="Username" class="form-control" value="{{$nextUsername}}" readonly>
                        </div>
                        <div class="form-group">
                            <strong>Mật Khẩu</strong>
                            <input type="text" name="Password" class="form-control" placeholder="Nhập Mật Khẩu">
                        </div>
                        <div class="form-group">
                            <strong>Loại Tài Khoản</strong>
                            <input type="text" name="LoaiTaiKhoan" class="form-control" value="2" readonly>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success mt-2 float-right">Lưu</button>
            </form>
        </div>
    </div>
</div>

@endsection
