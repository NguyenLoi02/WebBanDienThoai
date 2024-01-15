@extends('admin_layout')
@section('admin_content')
<div class="row">
    <!-- ============================================================== -->
    <!-- valifation types -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Thêm chi tiết hóa đơn nhập</h5>
            <div class="card-body">
                @foreach ($maHDN as $id => $value)
                    <form id="validationform" data-parsley-validate="" novalidate="" action="{{URL::to('luu-chi-tiet-hoa-don-nhap')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mã hóa đơn nhập</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" name="MaHDN" required="" value="{{ $value->MaHDN }}" readonly readonly  class="form-control">
                            </div>
                        </div>

                        <div class="form-group row" style="padding: 10px 27px;">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" >Mã chi tiết sản phẩm</label>
                            <select name="MaCTSP" class="col-12 col-sm-8 col-lg-6 form-control" >
                                @foreach($maCTSP as $key => $value)
                                    <option class="optionss" value="{{ $value->MaCTSP }}">{{ $value->MaCTSP }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Số Lượng</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" name="SoLuong" required=""  placeholder="Nhập số lượng" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                <button type="submit" class="btn btn-space btn-primary">Thêm</button>
                                <a class="btn btn-space btn-secondary" href="{{ route('danh_sach_hoa_don_nhap') }}">Quay lại</a>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end valifation types -->
    <!-- ============================================================== -->
</div>
@endsection
