@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Đơn Hàng Đã Hủy</h3>
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
                            <th>Ngày Bán</th>
                            <th>Trạng Thái</th>
                            <th>Địa Chỉ Giao Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Lý Do Hủy</th>
                            <th>Tổng Tiền</th>
                            <th>Tình Trạng</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dshuydon as $key => $item)
                            <tr>
                                <td>{{ $item->MaHDB }}</td>
                                <td>{{ $item->NgayBan }}</td>
                                <td>{{ $item->TrangThaiHoaDon }}</td>
                                <td>{{ $item->DiaChiGiaoHang }}</td>
                                <td>{{ $item->SoDienThoai }}</td>
                                <td>{{ $item->GhiChu }}</td>
                                <td>{{ $item->TongTien }}</td>
                                <td style="color: red">{{ $item->TinhTrangDonHang }}</td>
                                <td>
                                    <a href="{{URL::to('/chitiethdb/'. $item->MaHDB)}}" class="btn btn-info">Chi Tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
