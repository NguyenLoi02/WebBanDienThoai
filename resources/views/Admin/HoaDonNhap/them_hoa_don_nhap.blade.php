@extends('admin_layout')
@section('admin_content')
<div class="row">
    <!-- ============================================================== -->
    <!-- valifation types -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Thêm hóa đơn nhập</h5>
            <div class="card-body">
                <form id="validationform" data-parsley-validate="" novalidate="" action="{{URL::to('luu-hoa-don-nhap')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Mã hóa đơn nhập</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="MaHDN" required="" value="{{$nextMaHDN}}" readonly placeholder="Nhập mã hóa đơn bán" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Ngày nhập</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="date" name="ngaynhap" required=""  placeholder="" class="form-control">
                            @error('ngaynhap')
                                    <div style="color: red;">
                                        {{$message}}
                                    </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Ghi chú</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea required="" name="ghichu" class="form-control"></textarea>
                            @error('ghichu')
                                    <div style="color: red;">
                                        {{$message}}
                                    </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" style="padding: 10px 27px;">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right" >Mã nhân viên</label>
                        <select name="MaNV" class="col-12 col-sm-8 col-lg-6 form-control" >
                            @foreach($maNV as $key => $value)
                                <option value="{{ $value->MaNV }}">{{ $value->MaNV }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group row" style="padding: 10px 27px;">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right" >Mã nhà cung cấp</label>

                        <select name="MaNCC" class="col-12 col-sm-8 col-lg-6 form-control" >
                            @foreach($maNCC as $key => $value)
                                <option value="{{ $value->MaNCC }}">{{$value->MaNCC}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Thêm</button>
                            <a class="btn btn-space btn-secondary" href="{{ route('danh_sach_hoa_don_nhap') }}">Quay lại</a>
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
