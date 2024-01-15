@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm Sản Phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/sanpham') }}" class="btn btn-primary float-right">Danh Sách Sản Phẩm</a>
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
                <form action="{{ URL::to('/storeSP') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Mã Sản Phẩm</strong>
                                <input type="text" name="MaSP" class="form-control" value="{{ $nextMaSP }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <strong>Tên Sản Phẩm</strong>
                                <input type="text" name="TenSP" class="form-control" placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <strong>Ảnh Đại Diện</strong>
                                <input type="file" name="AnhDaiDien" class="form-control">
                            </div>
                            <div class="form-group">
                                <strong>Năm Sản Xuất</strong>
                                <input type="text" name="NamSX" class="form-control" placeholder="Nhập năm sản xuất">
                            </div>
                            <div class="form-group">
                                <strong>Thời Gian Bảo Hành</strong>
                                <select name="SP_MaCSBH" class="form-control input-sm m-bot15" required>
                                    <option value="" disabled selected>Chọn Thời Gian Bảo Hành</option>
                                    @foreach ($idCSBH as $csbh)
                                        <option value="{{$csbh->MaCSBH}}">{{$csbh->ThoiGianBH}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Tên Danh Mục</strong>
                                <select name="SP_MaDM" class="form-control input-sm m-bot15" required>
                                    <option value="" disabled selected>Chọn Tên Danh Mục</option>
                                    @foreach ($idDM as $dm)
                                        <option value="{{$dm->MaDM}}">{{$dm->TenDM}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <strong>Tên Hãng</strong>
                                <select name="SP_MaHang" class="form-control input-sm m-bot15" required>
                                    <option value="" disabled selected>Chọn Tên Hãng</option>
                                    @foreach ($idHang as $hang)
                                        <option value="{{$hang->MaHang}}">{{$hang->TenHang}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2 float-right">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
