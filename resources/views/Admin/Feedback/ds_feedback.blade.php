@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Feedback</h3>
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
                            <th>Mã Feedback</th>
                            <th>Họ Tên</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Nội Dung</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ds_feedback as $fb)
                            <tr>
                                <td>{{ $fb->MaFB }}</td>
                                <td>{{ $fb->Hoten }}</td>
                                <td>{{ $fb->Email }}</td>
                                <td>{{ $fb->SoDienThoai}}</td>
                                <td>{{ $fb->NoiDung}}</td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $fb->MaFB }} không?')"
                                        href="{{ URL::to('/xoafeedback/' . $fb->MaFB) }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
