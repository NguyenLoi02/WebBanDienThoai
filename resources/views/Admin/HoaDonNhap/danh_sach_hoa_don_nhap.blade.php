@extends('admin_layout')
@section('admin_content')
<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Danh sách hóa đơn nhập</h5>
                <br>
                <a class="btn btn-primary" type="submit" href="{{ route('them_hoa_don_nhap') }}">Thêm hóa đơn nhập</a>
            </div>
            @if(session('message'))
                <span class="alert alert-success">{{session('message')}}</span>
                @php
                    session()->forget('message');   
                @endphp
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mã hóa đơn nhập</th>
                                <th>Ngày nhập</th>
                                <th>Tổng tiền</th>
                                <th>Ghi chú</th>
                                <th>Mã nhân viên</th>
                                <th>Mã nhà cung cấp</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danh_sach_hoa_don_nhap as $key => $value)
                            <tr>
                                <td>{{$value->MaHDN}}</td>
                                <td>{{$value->NgayNhap}}</td>
                                <td>{{$value->TongTien}}</td>
                                <td>{{$value->GhiChu}}</td>
                                <td>{{$value->MaNV}}</td>
                                <td>{{$value->MaNCC}}</td>
                                <td>
                                    <a class="btn btn-warning me-2" href="{{ route('sua_hoa_don_nhap',[$value->MaHDN]) }}">Sửa</a>
                                </td>
                                <td>
                                    <a class="btn btn-warning me-2" href="{{ route('them_chi_tiet_hoa_don_nhap',[$value->MaHDN]) }}">Thêm chi tiết</a>
                                </td>
                                <td>
                                    <a class="btn btn-warning me-2" href="{{ route('chi_tiet_hoa_don_nhap',[$value->MaHDN]) }}">Xem chi tiết</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>
@endsection