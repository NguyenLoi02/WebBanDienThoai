@extends('admin_layout')
@section('admin_content')
<div class="row">
    <!-- ============================================================== -->
    <!-- valifation types -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Sửa hãng</h5>
            
            {{-- @if($errors->any())
                <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
            @endif  --}}
            <div class="card-body">
                @foreach ($sua_hang as $tk => $value)  
                    <form id="validationform" data-parsley-validate="" novalidate="" action="{{URL::to('/cap-nhap-hang/'.$value->MaHang)}}" method="POST">
                        @csrf
                        
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Mã hãng</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" name="MaHang" value="{{ $value->MaHang }}" readonly required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Tên hãng</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" name="TenHang" value="{{ $value->TenHang }}" required=""  placeholder="" class="form-control">
                                </div>
                            </div>
                        
                @endforeach 
                        <div class="form-group row text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                <button type="submit" class="btn btn-space btn-primary" >Cập nhập</button>
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