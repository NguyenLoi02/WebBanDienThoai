@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm Chi Tiết Sản Phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/sanphamct') }}" class="btn btn-primary float-right">Danh Sách Chi Tiết Sản
                            Phẩm</a>
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
                <form action="{{ URL::to('/storeSPCT') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Mã Chi Tiết Sản Phẩm</strong>
                                <input type="text" name="MaCTSP" class="form-control" value="{{ $nextMaCTSP }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <strong>Ảnh Đại Diện Chi Tiết</strong>
                                <input type="file" name="AnhCT" class="form-control">
                            </div>
                            <div class="form-group">
                                <strong>Đơn Giá Nhập</strong>
                                <input type="text" name="DonGiaNhap" class="form-control"
                                    placeholder="Nhập đơn giá nhập">
                            </div>
                            <div class="form-group">
                                <strong>Đơn Giá Bán</strong>
                                <input type="text" name="DonGiaBan" class="form-control" placeholder="Nhập đơn giá bán">
                            </div>
                            {{-- <div class="form-group">
                                <strong>Ảnh Liên Quan</strong>
                                <form action="{{ url('/insert-AnhCT/' . $anhct) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3" align="right">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" name="file[]" class="form-control" accept="image/*"
                                                multiple>
                                            <span id="error_anh"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" name="upload" name="taianh" value="Tải Ảnh"
                                                class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                            <div class="form-group">
                                <strong>Số Lượng</strong>
                                {{-- <select name="SPCT_MaHDN" class="form-control input-sm m-bot15" required>
                                    <option value="" disabled selected>Chọn Số Lượng</option>
                                    @foreach ($idHDN as $hdn)
                                        <option value="{{ $hdn->MaHDN }}">{{ $hdn->SoLuong }}</option>
                                    @endforeach
                                </select> --}}
                                <input type="number" name="SoLuong" class="form-control" placeholder="Nhập số lượng">
                            </div>
                            <div class="form-group">
                                <strong>Mô Tả</strong>
                                <textarea style="resize: none"  rows="8" class="form-control" name="MoTa" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                            </div>
                            {{-- <div class="form-group">
                                <strong>Mô Tả</strong>
                                <input type="text" name="MoTa" class="form-control" placeholder="Nhập số lượng">
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng Thái</label>
                                  <select name="TrangThai" class="form-control input-sm m-bot15">
                                     <option value="0">Còn Hàng</option>
                                        <option value="1">Hết Hàng</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Tên Sản Phẩm</strong>
                                <select name="SPCT_MaSP" class="form-control input-sm m-bot15" required>
                                    <option value="" disabled selected>Chọn Sản Phẩm</option>
                                    @foreach ($idSP as $sp)
                                        <option value="{{ $sp->MaSP }}">{{ $sp->TenSP }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Màu Sắc</strong>
                                <select name="SPCT_MaMau" class="form-control input-sm m-bot15" required>
                                    <option value="" disabled selected>Chọn Màu Sắc</option>
                                    @foreach ($idMau as $mau)
                                        <option value="{{ $mau->MaMau }}">{{ $mau->TenMau}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Dung Lượng</strong>
                                <select name="SPCT_MaDL" class="form-control input-sm m-bot15" required>
                                    <option value="" disabled selected>Chọn Dung Lượng</option>
                                    @foreach ($idDL as $dl)
                                        <option value="{{ $dl->MaDL }}">{{ $dl->SoDL }}</option>
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
