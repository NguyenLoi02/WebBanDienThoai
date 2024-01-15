@extends('admin_layout')
@section('admin_content')
<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Chi tiết hóa đơn nhập</h5>
                @foreach ($chiTietHDN as $item)
                    <h3 >Mã: {{ $item->MaHDN }}</h3>
                    @break
                @endforeach
                <br>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh đại diện</th>
                                <th>Đơn giá nhập</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chiTietHDN as $item)
                            <tr>
                                <td>{{ $item->MaCTSP }}</td>
                                <td>{{ $item->TenSP }}</td>
                                <td>
                                    <img src="{{asset('backend/assets/images/'.$item->AnhDaiDien) }}" alt="{{ $item->TenSP }}" width="100">
                                </td>
                                <td>{{ $item->DonGiaNhap }}</td>
                                <td>{{ $item->SoLuong }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="form-group row text-right">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <a class="btn btn-space btn-secondary" href="{{ route('danh_sach_hoa_don_nhap') }}">Quay lại</a>
                </div>
            </div>
        </div>

    </div>

    <!-- ============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>
@endsection
