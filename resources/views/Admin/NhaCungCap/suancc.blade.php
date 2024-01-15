@extends('admin_layout')
@section('admin_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Sửa Nhà Cung Cấp</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{URL::to('/danhsachnhacungcap')}}" class="btn btn-primary float-right">Danh Sách Nhà Cung Cấp</a>
                </div>
            </div>


        </div>
        <div class="card-body">
            @foreach ($suanhacungcap as $ncc)
            <form action="{{URL::to('/update_ncc/'.$ncc->MaNCC)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Mã Nhà Cung Cấp</strong>
                            <input type="text" name="MaNCC" class="form-control" value="{{$ncc->MaNCC}}" readonly>
                        </div>
                        <div class="form-group">
                            <strong>Tên Nhà Cung Cấp</strong>
                            <input type="text" name="TenNCC" class="form-control" value="{{$ncc->TenNCC}}" placeholder="Nhập tên nhà cung cấp">
                        </div>
                        <div class="form-group">
                            <strong>Số Diện Thoại</strong>
                            <input type="text" name="SoDienThoai" class="form-control" value="{{$ncc->SoDienThoai}}" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <strong>Địa Chỉ</strong>
                            <input type="text" name="DiaChi" class="form-control" value="{{$ncc->DiaChi}}" placeholder="Nhập địa chỉ">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success mt-2 float-right">Lưu</button>
            </form>
            @endforeach
        </div>
    </div>
</div>

@endsection
