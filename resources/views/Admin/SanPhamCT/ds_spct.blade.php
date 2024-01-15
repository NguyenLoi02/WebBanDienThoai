@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản Lý Sản Phẩm Chi Tiết</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ URL::to('/createSPCT') }}" class="btn btn-primary float-right">Thêm Mới</a>
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
                            <th>Ảnh Sản Phẩm Chi Tiết</th>
                            <th>Mã Sản Phẩm Chi Tiết</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Đơn Giá Nhập</th>
                            <th>Đơn Giá Bán</th>
                            <th>Số Lượng</th>
                            <th>Mô Tả</th>
                            <th>Trạng Thái</th>
                            <th>Màu</th>
                            <th>Dung Lượng</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ds_sanphamct as $spct)
                            <tr>
                                <td><img src="public/uploads/AnhSPCTs/{{ $spct->AnhCT}}" height="100" width="100"></td>
                                <td>{{ $spct->MaCTSP }}</td>
                                <td>{{ $spct->sp->TenSP}}</td>
                                <td>{{ $spct->DonGiaNhap}}</td>
                                <td>{{ $spct->DonGiaBan}}</td>
                                <td>{{ $spct->SoLuong}}</td>
                                <td>{{ $spct->MoTa}}</td>
                                <td><span class="text-ellipsis">
                                    <?php
                                     if($spct->TrangThai==0){
                                      ?>
                                      <a href="{{URL::to('/unactive-product/'.$spct->TrangThai)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                      <?php
                                       }else{
                                      ?>
                                       <a href="{{URL::to('/active-product/'.$spct->TrangThai)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                      <?php
                                     }
                                    ?>
                                  </span></td>
                                <td>{{ $spct->mau->TenMau}}</td>
                                <td>{{ $spct->dungluong->SoDL}}</td>
                                <td>
                                    <a href="{{ URL::to('/editSPCT/' . $spct->MaCTSP) }}" class="btn btn-info">Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $spct->MaCTSP }} không?')"
                                        href="{{ URL::to('/deleteSPCT/' . $spct->MaCTSP) }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
