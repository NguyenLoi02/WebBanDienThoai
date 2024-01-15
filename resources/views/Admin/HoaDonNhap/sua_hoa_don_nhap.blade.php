@extends('admin_layout')
@section('admin_content')
<div class="row">
    <!-- ============================================================== -->
    <!-- valifation types -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Sửa hóa đơn nhập</h5>
            
            {{-- @if($errors->any())
                <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
            @endif  --}}
            <div class="card-body">
                @foreach ($sua_hoa_don_nhap as $tk => $value)
                <form id="validationform" data-parsley-validate="" novalidate="" action="{{URL::to('cap-nhap-hoa-don-nhap/'.$value->MaHDN)}}" method="POST">
                    @csrf
                    
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Mã hóa đơn nhập</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="MaHDN" value="{{ $value->MaHDN }}" readonly required="" placeholder="Nhập mã hóa đơn nhập" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Ngày nhập</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="date" name="ngaynhap" value="{{ $value->NgayNhap }}" required=""  placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Tổng tiền</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="tongtien" value="{{ $value->TongTien }}"  required=""  placeholder="Nhập tổng tiền" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Ghi chú</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea required="" name="ghichu" class="form-control">{{ $value->GhiChu }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Mã nhân viên</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="MaNV" value="{{ $value->MaNV }}" required=""  placeholder="Nhập mã nhân viên" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Mã nhân nhà cung cấp</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="MaNCC" value="{{ $value->MaNCC }}" required=""  placeholder="Nhập mã nhân viên" class="form-control">
                        </div>
                    </div>
                    @endforeach 
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary" >Cập nhập</button>
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