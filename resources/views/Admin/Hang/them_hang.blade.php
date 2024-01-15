@extends('admin_layout')
@section('admin_content')
<div class="row">
    <!-- ============================================================== -->
    <!-- valifation types -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Thêm hãng</h5>
            <div class="card-body">
                <form id="validationform" data-parsley-validate="" novalidate="" action="{{URL::to('luu-hang')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Mã hãng</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="MaHang" required="" value="{{$nextMaHang}}" readonly placeholder="Nhập mã hãng" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Tên hãng</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="TenHang" required=""  placeholder="Nhập tên hãng" class="form-control">
                        </div>
                    </div>
                   
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Thêm</button>
                            <a class="btn btn-space btn-secondary" href="{{ route('danh_sach_hang') }}">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end valifation types -->
    <!-- ============================================================== -->
</div>
@endsection