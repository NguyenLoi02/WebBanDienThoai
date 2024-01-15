@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 order-2 order-lg-1">
            <div class="contact-page-side-content contact-form-content pt-sm-55 pt-xs-55" style="padding: 69px 0; margin: 50px 0;">
                <h3 class="contact-page-title" style="text-align: center;">Lý do hủy đơn</h3>
                @foreach ($huy_hoa_don_nhap  as  $value)
                <div class="contact-form" style="margin-left: -56px;" >
                    <form class="formradio" action="{{URL::to('huy-don-hang/'.$value->MaHDB)}}" method="post">
                        @csrf
                        <div style="display: flex; justify-content: center">
                            <input type="radio"  name="options" value="Tôi muốn cập nhập địa chỉ/sđt nhận hàng." style="width: 24px">
                            <label style="margin-top: 11px; padding: 0 9px;"  label for="option1">Tôi muốn cập nhập địa chỉ/sđt nhận hàng.</label>
                        </div>
                        <div style="display: flex; justify-content: center">
                            <input type="radio"  name="options" value="Tôi muốn thêm/thay đổi mã giảm giám." style="width: 24px; margin-left: -21px;" >
                            <label style="margin-top: 11px; padding: 0 9px;"  for="option2">Tôi muốn thêm/thay đổi mã giảm giám.</label>
                        </div>
                        <div style="display: flex; justify-content: center">
                            <input type="radio"  name="options" value="Tôi muốn thay đổi sản phẩm(màu sắc, dung lượng...)." style="width: 24px; margin-left: 73px;" >
                            <label style="margin-top: 11px; padding: 0 9px;"  for="option2">Tôi muốn thay đổi sản phẩm(màu sắc, dung lượng...).</label>
                        </div>
                        <div style="display: flex; justify-content: center">
                            <input type="radio"  name="options" value="Tôi tìm thấy chỗ mua khác tốt hơn(rẻ hơn,uy tín hơn..)." style="width: 24px; margin-left: 82px;" >
                            <label style="margin-top: 11px; padding: 0 9px;"  for="option2">Tôi tìm thấy chỗ mua khác tốt hơn(rẻ hơn,uy tín hơn..).</label>
                        </div>
                        <div style="display: flex; justify-content: center">
                            <input type="radio"  name="options" value="Thủ tục thanh toán rắc rối." style="width: 24px; margin-left: -112px;" >
                            <label style="margin-top: 11px; padding: 0 9px;"  for="option2">Thủ tục thanh toán rắc rối.</label>
                        </div>
                            <div class="form-group">
                            <button style="float: right; margin-right: 74px" type="submit" value="submit" id="submit" class="li-btn-3" name="submit">GỬI</button>
                        </div>
                    </form>
                @endforeach
                </div>
                <p class="form-messege"></p>
            </div>
        </div>
    </div>
</div>
@endsection
