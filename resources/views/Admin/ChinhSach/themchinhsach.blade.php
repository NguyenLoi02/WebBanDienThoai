@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm Chính Sách Bảo Hành</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/danhsachchinhsach') }}" class="btn btn-primary float-right">Danh Sách Chính
                            Sách</a>
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
                <form action="{{ URL::to('/save_cs') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Mã Dung Lượng</strong>
                                <input type="text" name="MaCSBH" class="form-control" value="{{ $nextMaCSBH }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <strong>Thời Gian Bảo Hành</strong>
                                <input type="text" name="ThoiGianBH" class="form-control"
                                    placeholder="Nhập Thời Gian Bảo Hành">
                            </div>
                            @error('ThoiGianBH')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <strong>Nội Dung</strong>
                                <input type="text" name="NoiDung" class="form-control" placeholder="Nhập Nội Dung ">
                            </div>
                            @error('NoiDung')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>
                    <button type="submit" class="btn btn-success mt-2 float-right">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
