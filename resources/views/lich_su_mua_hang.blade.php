@extends('layout')
@section('layout_content')
<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Mã hóa đơn</th>
                                    {{-- <th class="li-product-remove">Mã nhân viên</th>
                                    <th class="li-product-remove">Mã khách hàng</th> --}}
                                    <th class="li-product-thumbnail">Ngày bán</th>
                                    <th class="cart-product-name">Địa chỉ giao hàng</th>
                                    <th class="li-product-price">Số điện thoại</th>
                                    <th class="li-product-stock-status">Tổng tiền</th>
                                    <th class="li-product-add-cart">Trạng thái hóa đơn</th>
                                    <th class="li-product-add-cart">Tình trạng đơn hàng</th>
                                    <th class="li-product-add-cart">Chi tiết đơn hàng</th>
                                    <th class="li-product-add-cart">Xóa đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lichSuHDB as $item)
                                    <tr>
                                            <td class="li-product-price"><span class="amount">{{ $item->MaHDB }}</span></td>
                                            <td class="li-product-price"><span class="amount">{{ $item->NgayBan }}</span></td>
                                            <td class="li-product-price"><span class="amount">{{ $item->DiaChiGiaoHang }}</span></td>
                                            <td class="li-product-price"><span class="amount">{{ $item->SoDienThoai }}</span></td>
                                            <td class="li-product-price"><span class="amount">{{ $item->TongTien }}</span></td>
                                            <td class="li-product-name"><a href="#">{{ $item->TrangThaiHoaDon }}</a></td>
                                            <td class="li-product-name"><a href="#">{{ $item->TinhTrangDonHang }}</a></td>
                                            <td class="li-product-add-cart"><a href="#">Chi tiết</a></td>
                                            <td class="li-product-add-cart"><a href="#">Xóa</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection