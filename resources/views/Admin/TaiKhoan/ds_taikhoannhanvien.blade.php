@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Tài Khoản Nhân Viên</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/themtknhanvien') }}" class="btn btn-primary float-right">Thêm Mới</a>
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

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tài Khoản</th>
                            <th>Mật Khẩu</th>
                            <th>Loại Tài Khoản</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ds_tknhanvien as $tk)
                            <tr>
                                <td>{{ $tk->Username }}</td>
                                <td>{{ $tk->Password }}</td>
                                <td>{{ $tk->LoaiTaiKhoan }}</td>
                                <td>
                                    <a href="{{ URL::to('/suatknhanvien/' . $tk->Username) }}" class="btn btn-info">Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $tk->Username }} không?')"
                                        href="{{ URL::to('/xoatknhanvien/' . $tk->Username) }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
