@extends('client_layout')
@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ URL::to('/trang_chu') }}">Trang Chủ</a></li>
                    <li class="active">Giỏ Hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width:50%">Sản Phẩm</th>
                                        <th style="width:10%">Giá</th>
                                        <th style="width:8%">Số Lượng</th>
                                        <th style="width:22%" class="text-center">Tổng giá</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0 @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['qty'] @endphp
                                            <tr data-id="{{ $id }}">
                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-3 hidden-xs"><img
                                                                src="{{ asset('fontend/images') }}/{{ $details['options']['image'] }}"
                                                                width="100" height="100" class="img-responsive" />
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-th="Price">
                                                    <p>{{ number_format($details['price']) . ' ' . 'vnđ' }}</p>
                                                </td>
                                                <td data-th="Quantity">
                                                    <input type="number" value={{ $details['qty'] }}
                                                        class="form-control quantity cart_update" min="1" />
                                                </td>
                                                <td data-th="Subtotal" class="text-center">
                                                    {{ number_format($details['price'] * $details['qty']) . ' ' . 'vnđ' }}
                                                </td>
                                                <td class="actions" data-th="">
                                                    <button class="btn btn-danger btn-sm cart_remove"><i
                                                            class="fa fa-trash-o"></i> Xóa</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            <h3><strong>Tổng giá {{ number_format($total) . ' ' . 'vnđ' }}</strong></h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            <a href="{{ url('/trang_chu') }}" class="btn btn-danger"> <i
                                                    class="fa fa-arrow-left"></i>Tiếp tục mua sắm</a>
                                            <?php
                                   $customer_id = session('thongtinkhachhang.MaKH');
                                   if($customer_id!=NULL){
                                 ?>
                                            <a href="{{ url('/checkout') }}" class="btn btn-success"><i
                                                        class="fa fa-money"></i>Thanh toán</a>

                                            <?php
                            }else{
                                 ?>
                                            {{-- <a href="{{ URL::to('/login') }}"><i class="fa fa-lock"></i> Đăng
                                                    nhập</a> --}}
                                                    <a href="{{ url('/login') }}" class="btn btn-success"><i
                                                        class="fa fa-money"></i>Thanh toán</a>
                                            <?php
                             }
                                 ?>
                                            {{-- <a href="{{ url('/login-checkout') }}" class="btn btn-success"><i
                                                    class="fa fa-money"></i>Thanh toán</a> --}}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Shopping Cart Area End-->
@endsection
{{-- @section('scripts')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    qty: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });


        $(document).on("click", ".cart_remove", function(e) {
            console.log(1);
            e.preventDefault();

            var ele = $(this);
            console.log(1);
            if (confirm("Bạn có muốn xóa sản phẩm khỏi giỏ hàng không?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>
@endsection --}}
