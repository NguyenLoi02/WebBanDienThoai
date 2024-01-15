@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm Dung Lượng</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/danhsachdungluong') }}" class="btn btn-primary float-right">Danh Sách Dung
                            Lượng</a>
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
                <form action="{{ URL::to('/save_dl') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Mã Dung Lượng</strong>
                                <input type="text" name="MaDL" class="form-control" value="{{ $nextMaDL }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <strong>Số Dung Lượng</strong>
                                <input type="text" name="SoDL" class="form-control" placeholder="Nhập dung lượng">
                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-success mt-2 float-right">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
