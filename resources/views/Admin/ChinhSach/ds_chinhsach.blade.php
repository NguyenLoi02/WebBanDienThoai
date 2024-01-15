@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Chính Sách Bảo Hành</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/themchinhsach') }}" class="btn btn-primary float-right">Thêm Mới</a>
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

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mã Chính Sách Bảo Hành</th>
                            <th>Thời Gian Bảo Hành</th>
                            <th>Nội Dung</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ds_chinhsach as $cs)
                            <tr>
                                <td>{{ $cs->MaCSBH }}</td>
                                <td>{{ $cs->ThoiGianBH }}</td>
                                <td>{{$cs->NoiDung}}</td>
                                <td>
                                    <a href="{{ URL::to('/suachinhsach/' . $cs->MaCSBH) }}" class="btn btn-info">Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $cs->MaCSBH }} không?')"
                                        href="{{ URL::to('/xoachinhsach/' . $cs->MaCSBH) }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
