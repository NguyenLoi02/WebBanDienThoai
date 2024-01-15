@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Sửa Sản Phẩm</h3>
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
                @foreach ($editSP as $sp)
                <form action="{{ URL::to('/update_sp/'.$sp->MaSP) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Mã Sản Phẩm</strong>
                                <input type="text" name="MaSP" class="form-control" value="{{ $sp->MaSP }}" readonly>
                            </div>
                            <div class="form-group">
                                <strong>Tên Sản Phẩm</strong>
                                <input type="text" name="TenSP" class="form-control" value="{{ $sp->TenSP }}">
                            </div>
                            <div class="form-group">
                                <strong>Ảnh Đại Diện</strong>
                                <input type="file" name="AnhDaiDien" class="form-control">
                                <img src="{{URL::to('public/uploads/AnhDaiDiens/'.$sp->AnhDaiDien)}}" height="100" width="100">
                            </div>
                            <div class="form-group">
                                <strong>Năm Sản Xuất</strong>
                                <input type="text" name="NamSX" class="form-control" value="{{ $sp->NamSX }}">
                            </div>
                            <div class="form-group">
                                <strong>Thời Gian Bảo Hành</strong>
                                <select name="SP_MaCSBH" class="form-control input-sm m-bot15" required>
                                    <option value="" disabled selected>Chọn Thời Gian Bảo Hành</option>
                                    @foreach ($idCSBH as $csbh)
                                        @if ($csbh->MaCSBH==$sp->MaCSBH)
                                        <option selected value="{{$csbh->MaCSBH}}">{{$csbh->ThoiGianBH}}</option>
                                        @else
                                        <option value="{{$csbh->MaCSBH}}">{{$csbh->ThoiGianBH}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Tên Danh Mục</strong>
                                <select name="SP_MaDM" class="form-control input-sm m-bot15" required>
                                    <option value="" disabled selected>Chọn Tên Danh Mục</option>
                                    @foreach ($idDM as $dm)
                                        @if ($dm->MaDM==$sp->MaDM)
                                        <option selected value="{{$dm->MaDM}}">{{$dm->TenDM}}</option>
                                        @else
                                        <option value="{{$dm->MaDM}}">{{$dm->TenDM}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <strong>Tên Hãng</strong>
                                <select name="SP_MaHang" class="form-control input-sm m-bot15" required>
                                    <option value="" disabled selected>Chọn Tên Hãng</option>
                                    @foreach ($idHang as $hang)
                                        @if ($hang->MaHang==$sp->MaHang)
                                        <option selected value="{{$hang->MaHang}}">{{$hang->TenHang}}</option>
                                        @else
                                        <option value="{{$hang->MaHang}}">{{$hang->TenHang}}</option>
                                        @endif
                                        
                                    @endforeach
                                </select>
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
