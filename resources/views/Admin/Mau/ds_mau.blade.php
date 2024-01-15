@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Màu Sắc</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/themmau') }}" class="btn btn-primary float-right">Thêm Mới</a>
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
                            <th>Mã Màu</th>
                            <th>Tên Màu</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ds_mau as $key => $item)
                            <tr>
                                <td>{{ $item->MaMau }}</td>
                                <td>{{ $item->TenMau }}</td>
                                <td>
                                    <a href="{{URL::to('/suamau/'.$item->MaMau)}}" class="btn btn-info">Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $item->TenMau }} không?')"
                                        href="{{ URL::to('/xoamau/' . $item->MaMau)}}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
