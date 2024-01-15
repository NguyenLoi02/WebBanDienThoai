@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Chi Tiết Đơn Hàng</h3>
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
                            <th>Mã Hóa Đơn Bán</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chitiethdb as $key => $item)
                            <tr>
                                <td>{{ $item->MaHDB }}</td>
                                <td>{{ $item->TenSP }}</td>
                                <td>{{ $item->DonGiaBan }}</td>
                                <td>{{ $item->SoLuongBan }}</td>
                                <td>{{ $item->DonGiaBan * $item->SoLuongBan}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <td>
                            <a href="{{URL::to('/dshoadonban')}}" class="btn btn-info">Quay Lại</a>
                        </td>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
