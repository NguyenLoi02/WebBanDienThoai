
@extends('admin_layout')
@section('admin_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Cập Nhật Chính Sách</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{URL::to('/danhsachchinhsach')}}" class="btn btn-primary float-end">Danh Sách Chính Sách</a>
                </div>
            </div>


        </div>
        <div class="card-body">
            @foreach ($suachinhsach as $cs)
            <form action="{{URL::to('/update_cs/'.$cs->MaCSBH)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Mã Chính Sách Bảo Hành</strong>
                            <input type="text" name="MaCSBH" class="form-control" value="{{$cs->MaCSBH}}" readonly>
                        </div>
                        <div class="form-group">
                            <strong>Thời Gian Bảo Hành</strong>
                            <input type="text" name="ThoiGianBH" class="form-control" value="{{$cs->ThoiGianBH}}">
                        </div>
                        <div class="form-group">
                            <strong>Nội Dung</strong>
                            <input type="text" name="NoiDung" class="form-control" value="{{$cs->NoiDung}}">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
            </form>
            @endforeach
        </div>
    </div>
</div>

@endsection
