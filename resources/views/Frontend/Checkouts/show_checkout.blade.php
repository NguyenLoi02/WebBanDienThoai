@extends('client_layout')
@section('content')
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            @if (session('cart'))
            <div class="col-lg-6 col-12">
                <form action="{{ URL::to('/order-place') }}" method="POST">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Chi tiết thanh toán</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Họ Tên<span class="required">*</span></label>
                                    <input name="customer_name" placeholder="" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ<span class="required">*</span></label>
                                    <input name="shipping_address" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ Email <span class="required">*</span></label>
                                    <input name="customer_email" placeholder="" type="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input name="customer_phone" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="order-notes">
                            <div class="checkout-form-list">
                                <label>Ghi chú đặt hàng</label>
                                <textarea name="shipping_note" id="checkout-mess" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div class="order-button-payment">
                                <button type="submit">Đặt Hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Sản phẩm</th>
                                    <th class="cart-product-total">Giá sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                {{-- @if (session('cart')) --}}
                                    @foreach (session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['qty'] @endphp
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                {{ $details['name'] }}<strong class="product-quantity"> × {{ $details['qty'] }}</strong>
                                            </td>
                                            <td class="cart-product-total">
                                                <span class="amount">{{ number_format($details['price'] * $details['qty']) . ' ' . 'vnđ' }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                {{-- @endif --}}
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Tổng Giá</th>
                                    <td id="total-amount"><span class="amount">{{ number_format($total) . ' ' . 'vnđ' }}</span></td>
                                    <input type="hidden" name="total_amount" value="{{ $total }}">
                                </tr>
                                <tr class="order-total">
                                    <th>Tổng giá trị đơn hàng</th>
                                    <td><strong><span class="amount">{{ number_format($total) . ' ' . 'vnđ' }}</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<script>
    function validateForm() {
        var customerName = document.getElementById("customer_name").value;
        var shippingAddress = document.getElementById("shipping_address").value;
        var customerEmail = document.getElementById("customer_email").value;
        var customerPhone = document.getElementById("customer_phone").value;

        // Reset error messages
        document.getElementById("error_customer_name").innerHTML = "";
        document.getElementById("error_shipping_address").innerHTML = "";
        document.getElementById("error_customer_email").innerHTML = "";
        document.getElementById("error_customer_phone").innerHTML = "";

        // Validate each field
        if (customerName.trim() === "") {
            document.getElementById("error_customer_name").innerHTML = "Vui lòng nhập Họ Tên";
            return false;
        }

        if (shippingAddress.trim() === "") {
            document.getElementById("error_shipping_address").innerHTML = "Vui lòng nhập Địa chỉ";
            return false;
        }

        if (customerEmail.trim() === "") {
            document.getElementById("error_customer_email").innerHTML = "Vui lòng nhập Địa chỉ Email";
            return false;
        }

        if (customerPhone.trim() === "") {
            document.getElementById("error_customer_phone").innerHTML = "Vui lòng nhập Số điện thoại";
            return false;
        }

        // Additional validation logic can be added here if needed

        return true; // Form will be submitted if all validations pass
    }
</script>
<!--Checkout Area End-->
@endsection
