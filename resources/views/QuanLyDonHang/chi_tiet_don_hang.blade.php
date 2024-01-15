@extends('layout')
@section('content')
<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Tên sản phẩm</th>
                                    {{-- <th class="li-product-remove">Mã nhân viên</th>
                                    <th class="li-product-remove">Mã khách hàng</th> --}}
                                    <th class="li-product-thumbnail">Ảnh</th>
                                    <th class="cart-product-name">Mô tả</th>
                                    <th class="li-product-price">Giá bán</th>
                                    <th class="li-product-stock-status">Số lượng mua</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chiTietDonHang as $item)
                                    <tr>
                                            <td class="li-product-price"><span class="amount">{{ $item->TenSP }}</span></td>
                                            <td class="li-product-price"><img src="{{asset('Backend/assets/images/'.$item->AnhDaiDien) }}" alt="{{ $item->TenSP }}" width="100"></td>
                                            <td class="li-product-price"><span class="amount">{{ $item->MoTa }}</span></td>
                                            <td class="li-product-price"><span class="amount">{{ $item->DonGiaBan }}</span></td>
                                            <td class="li-product-price"><span class="amount">{{ $item->SoLuong }}</span></td>

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
