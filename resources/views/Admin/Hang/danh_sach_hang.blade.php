@extends('admin_layout')
@section('admin_content')
<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Danh sách hãng</h5>
                <br>
                <a class="btn btn-primary" type="submit" href="{{ route('them_hang') }}">Thêm hãng</a>
            </div>
            @if(session('message'))
                <span class="alert alert-success">{{session('message')}}</span>
                @php
                    session()->forget('message');   
                @endphp
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mã hãng</th>
                                <th>Tên Hãng</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danh_sach_hang as $key => $value)
                            <tr>
                                <td>{{$value->MaHang}}</td>
                                <td>{{$value->TenHang}}</td>
                                
                                <td>
                                    <a class="btn btn-warning me-2" href="{{ route('sua_hang',[$value->MaHang]) }}">Sửa</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger me-2" href="{{ route('xoa_hang',[$value->MaHang]) }}">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>
@endsection