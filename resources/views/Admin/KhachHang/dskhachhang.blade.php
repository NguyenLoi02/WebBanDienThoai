@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Khách Hàng</h3>
                    </div>

                </div>
                {{-- @if (session('message'))
                    <span class="alert alert-success">{{ session('message') }}</span>
                    @php
                        session()->forget('message');
                    @endphp
                @endif --}}
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mã Khách Hàng</th>
                            <th>Họ Tên</th>
                            <th>Ngày Sinh</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Email</th>
                            <th>Giới Tính</th>
                            <th>Tài Khoản</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dskhachhang as $key => $item)
                            <tr>
                                <td>{{ $item->MaKH }}</td>
                                <td>{{ $item->HoTen }}</td>
                                <td>{{ $item->NgaySinh }}</td>
                                <td>{{ $item->SoDienThoai }}</td>
                                <td>{{ $item->DiaChi }}</td>
                                <td>{{ $item->Email }}</td>
                                <td>{{ $item->GioiTinh }}</td>
                                <td>{{ $item->Username }}</td>

                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa  không?')"
                                        href="" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
