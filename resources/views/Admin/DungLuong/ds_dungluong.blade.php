@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Dung Lượng</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/themdungluong') }}" class="btn btn-primary float-right">Thêm Mới</a>
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
                            <th>Mã Dung Lượng</th>
                            <th>Dung Lượng</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ds_dungluong as $dl)
                            <tr>
                                <td>{{ $dl->MaDL }}</td>
                                <td>{{ $dl->SoDL }}</td>
                                <td>
                                    <a href="{{ URL::to('/suadungluong/' . $dl->MaDL) }}" class="btn btn-info">Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $dl->SoDL }} không?')"
                                        href="{{ URL::to('/xoadungluong/' . $dl->MaDL) }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
