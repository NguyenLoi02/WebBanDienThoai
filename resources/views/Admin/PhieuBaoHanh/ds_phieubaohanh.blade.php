@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Phiếu Bảo Hành</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/themPBH') }}" class="btn btn-primary float-right">Thêm Mới</a>
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
                            <th>Mã Phiếu Bảo Hành</th>
                            <th>Ngày Bảo Hành</th>
                            <th>Tình Trạng Bảo Hành</th>
                            <th>Nhân Viên Bảo Hành</th>
                            <th>Ngày Trả</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ds_phieubaohanh as $pbh)
                            <tr>
                                <td>{{ $pbh->MaPBH }}</td>
                                <td>{{ $pbh->NgayBH }}</td>
                                <td>{{ $pbh->TinhTrangBH }}</td>
                                <td>{{ $pbh->NVBH }}</td>
                                <td>{{ $pbh->NgayHoanThanh }}</td>
                                <td>{{ $pbh->TenSP }}</td>
                                <td>
                                    <a href="{{ URL::to('/suaphieubaohanh/' . $pbh->MaPBH) }}" class="btn btn-info">Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $pbh->MaPBH }} không?')"
                                        href="{{ URL::to('/xoaphieubaohanh/' . $pbh->MaPBH) }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
