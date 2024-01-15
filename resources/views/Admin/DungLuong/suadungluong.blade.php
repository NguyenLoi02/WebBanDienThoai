@extends('admin_layout')
@section('admin_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Cập Nhật Dung Lượng</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{URL::to('/danhsachdungluong')}}" class="btn btn-primary float-end">Danh Sách Dung Lượng</a>
                </div>
            </div>


        </div>
        <div class="card-body">
            @foreach ($suadungluong as $dl)
            <form action="{{URL::to('/update_dl/'.$dl->MaDL)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Mã Dung Lượng</strong>
                            <input type="text" name="MaDL" class="form-control" value="{{$dl->MaDL}}" readonly>
                        </div>
                        <div class="form-group">
                            <strong>Số Dung Lượng</strong>
                            <input type="text" name="SoDL" class="form-control" value="{{$dl->SoDL}}">
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
