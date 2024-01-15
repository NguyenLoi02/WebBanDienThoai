@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Cập Nhật Màu</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/dsmau') }}" class="btn btn-primary float-right">Danh Sách Màu</a>
                    </div>
                </div>
                @if (session('message'))
                    <span class="alert alert-success">{{ session('message') }}</span>
                    @php
                        session()->forget('message');
                    @endphp
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
                @endif

            </div>
            <div class="card-body">
                @foreach ($suamau as $key => $item)
                <form action="{{URL::to('suamau/'.$item->MaMau)}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Mã Màu</strong>
                                <input type="text" name="MaMau" class="form-control" value="{{$item->MaMau}}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <strong>Tên Màu</strong>
                                <input type="text" name="TenMau" class="form-control" placeholder="Nhập màu" value="{{$item->TenMau}}">
                                @error('TenMau')
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-success mt-2 float-right">Cập Nhật</button>
                </form>
                @endforeach

            </div>
        </div>
    </div>
@endsection
