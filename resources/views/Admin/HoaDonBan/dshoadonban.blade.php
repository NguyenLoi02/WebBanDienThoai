@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Hóa Đơn Bán</h3>
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
                            <th>Mã Hóa Đơn Bán</th>
                            <th>Ngày Bán</th>
                            <th>Trạng Thái</th>
                            <th>Địa Chỉ Giao Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Ghi Chú</th>
                            <th>Tổng Tiền</th>
                            <th>Tình Trạng</th>
                            <th>Cập Nhật Tình Trạng</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dshdb as $key => $item)
                            <tr>
                                <td>{{ $item->MaHDB }}</td>
                                <td>{{ $item->NgayBan }}</td>
                                <td>{{ $item->TrangThaiHoaDon }}</td>
                                <td>{{ $item->DiaChiGiaoHang }}</td>
                                <td>{{ $item->SoDienThoai }}</td>
                                <td>{{ $item->GhiChu }}</td>
                                <td>{{ $item->TongTien }}</td>
                                <td>{{ $item->TinhTrangDonHang }}</td>
                                <td>
                                @if($item->TinhTrangDonHang == 'Đã xác nhận')
                                    <form action="">
                                        <select class="custom-select tinh_trang" name="TinhTrang" id="TinhTrang">
                                            <option value="" selected disabled style="color: black; font-weight: bold;">--- Tình Trạng Hóa Đơn ---</option>
                                            <option id="{{ $item->MaHDB }}" value="DangGiao" style="color: green; font-weight: bold;">Đang Giao Hàng</option>
                                            <option id="{{ $item->MaHDB }}" value="DaGiao" disabled>Đã Giao Hàng</option>
                                        </select>
                                    </form>

                                @elseif ($item->TinhTrangDonHang == 'Đang giao hàng')
                                    <form action="">
                                        <select class="custom-select tinh_trang" name="TinhTrang" id="TinhTrang">
                                            <option value="" selected disabled style="color: black; font-weight: bold;">--- Tình Trạng Hóa Đơn ---</option>
                                            <option id="{{ $item->MaHDB }}" value="DangGiao" disabled>Đang Giao Hàng</option>
                                            <option id="{{ $item->MaHDB }}" value="DaGiao" style="color: green; font-weight: bold;">Đã Giao Hàng</option>
                                        </select>
                                    </form>
                                @elseif ($item->TinhTrangDonHang == 'Đã giao hàng')
                                    {{-- <form action="">
                                        <select class="custom-select tinh_trang" name="TinhTrang" id="TinhTrang">
                                            <option value="" selected disabled style="" style="color: black; font-weight: bold;">--- Tình Trạng Hóa Đơn ---</option>
                                            <option id="{{ $item->MaHDB }}" value="DangGiao" disabled>Đang Giao Hàng</option>
                                            <option id="{{ $item->MaHDB }}" value="DaGiao" disabled>Đã Giao Hàng</option>
                                        </select>
                                    </form> --}}
                                    <p style="color: red;">Hoàn Thành <img width="20" height="20" src="https://img.icons8.com/water-color/50/check-dollar.png" alt="check-dollar"/></p>
                                @endif

                                </td>
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
