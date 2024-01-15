@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Nhà Cung Cấp</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/themncc') }}" class="btn btn-primary float-right">Thêm Mới</a>
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
                            <th>Mã Nhà Cung Cấp</th>
                            <th>Tên Nhà Cung Cấp</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ds_nhacungcap as $ncc)
                            <tr>
                                <td>{{ $ncc->MaNCC }}</td>
                                <td>{{ $ncc->TenNCC }}</td>
                                <td>{{ $ncc->SoDienThoai }}</td>
                                <td>{{ $ncc->DiaChi }}</td>
                                <td>
                                    <a href="{{ URL::to('/suancc/' . $ncc->MaNCC) }}" class="btn btn-info">Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $ncc->TenNCC }} không?')"
                                        href="{{ URL::to('/xoancc/' . $ncc->MaNCC) }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                {{$ds_nhacungcap->links()}}
        </div>
    </div>
@endsection
