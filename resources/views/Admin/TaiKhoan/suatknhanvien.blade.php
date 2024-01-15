@extends('admin_layout')
@section('admin_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Sửa Tài Khoản Nhân Viên</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{URL::to('/danhsachtknhanvien')}}" class="btn btn-primary float-right">Danh Sách Tài Khoản</a>
                </div>
            </div>


        </div>
        <div class="card-body">
            @foreach ($suataikhoannhanvien as $tk)
            <form action="{{URL::to('/update_tknv/'.$tk->Username)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Tên Tài Khoản</strong>
                            <input type="text" name="Username" class="form-control" value="{{$tk->Username}}" readonly>
                        </div>
                        <div class="form-group">
                            <strong>Mật Khẩu</strong>
                            <input type="text" name="Password" class="form-control" value="{{$tk->Password}}" >
                        </div>
                        <div class="form-group">
                            <strong>Loại Tài Khoản</strong>
                            <input type="text" name="LoaiTaiKhoan" class="form-control" value="{{$tk->LoaiTaiKhoan}}" readonly>
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
