<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Version One || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('fontend/images/favicon.png') }}">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="{{ asset('fontend/css/material-design-iconic-font.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontend/css/font-awesome.min.css') }}">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="{{ asset('fontend/css/fontawesome-stars.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/meanmenu.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/owl.carousel.min.css') }}">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/slick.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/animate.css') }}">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/jquery-ui.min.css') }}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/venobox.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/nice-select.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/magnific-popup.css') }}">
    <!-- Bootstrap V4.1.3 Femwork CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/bootstrap.min.css') }}">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/helper.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/responsive.css') }}">
    <!-- Modernizr js -->
    <script src="{{ asset('fontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <header>
            <!-- Begin Header Top Area -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Top Left Area -->
                        <div class="col-lg-3 col-md-4">
                            <div class="header-top-left">
                                <ul class="phone-wrap">
                                    <li><span>Liên hệ:</span><a href="#">(+84) 123 456 789</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Left Area End Here -->
                        <!-- Begin Header Top Right Area -->
                        <div class="col-lg-9 col-md-8">
                            <div class="header-top-right">
                                <ul class="ht-menu">
                                    <!-- Begin Setting Area -->
                                    <li>
                                        <div class="ht-setting-trigger"><span>Cài đặt</span></div>
                                        <div class="setting ht-setting">
                                            <ul class="ht-setting-list">
                                                @if (session('isLoggedIn'))
                                                    <li><a href="{{route('show')}}">Tài Khoản</a></li>
                                                    <li><a href="{{route('showls')}}">Lịch Sử Đơn Hàng</a></li>
                                                    <li><a href="{{ route('doimatkhau') }}">Đổi Mật Khẩu</a></li>
                                                    <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                                @else
                                                    <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                                    <li><a href="{{ route('dangky') }}">Đăng ký</a></li>
                                                @endif
                                                {{-- <li><a href="{{ route('logout') }}">Tài khoản</a></li>
                                                <li><a href="{{ route('login') }}">Đăng Nhập</a></li>
                                                <li><a href="{{ route('dangky') }}">Đăng ký</a></li> --}}
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- Setting Area End Here -->
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Right Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Header Top Area End Here -->
            <!-- Begin Header Middle Area -->
            <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Logo Area -->
                        <div class="col-lg-3">
                            <div class="logo pb-sm-30 pb-xs-30">
                                <a href="index.html">
                                    <img src="{{ asset('fontend/images/menu/logo/1.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Header Logo Area End Here -->
                        <!-- Begin Header Middle Right Area -->
                        <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                            <!-- Begin Header Middle Searchbox Area -->
                            <form action="" class="hm-searchbox">
                                {{-- <select class="nice-select select-search-category">
                                    <option value="0">Tất cả</option>
                                    <option value="10">Laptops</option>
                                    <option value="17">- - Prime Video</option>
                                    <option value="20">- - - - All Videos</option>
                                    <option value="21">- - - - Blouses</option>
                                    <option value="22">- - - - Evening Dresses</option>
                                    <option value="23">- - - - Summer Dresses</option>
                                    <option value="24">- - - - T-shirts</option>
                                    <option value="25">- - - - Rent or Buy</option>
                                    <option value="26">- - - - Your Watchlist</option>
                                    <option value="27">- - - - Watch Anywhere</option>
                                    <option value="28">- - - - Getting Started</option>
                                    <option value="18">- - - - Computers</option>
                                    <option value="29">- - - - More to Explore</option>
                                    <option value="30">- - - - TV &amp; Video</option>
                                    <option value="31">- - - - Audio &amp; Theater</option>
                                    <option value="32">- - - - Camera, Photo </option>
                                    <option value="33">- - - - Cell Phones</option>
                                    <option value="34">- - - - Headphones</option>
                                    <option value="35">- - - - Video Games</option>
                                    <option value="36">- - - - Wireless Speakers</option>
                                    <option value="19">- - - - Electronics</option>
                                    <option value="37">- - - - Amazon Home</option>
                                    <option value="38">- - - - Kitchen &amp; Dining</option>
                                    <option value="39">- - - - Furniture</option>
                                    <option value="40">- - - - Bed &amp; Bath</option>
                                    <option value="41">- - - - Appliances</option>
                                    <option value="11">TV &amp; Audio</option>
                                    <option value="42">- - Chamcham</option>
                                    <option value="45">- - - - Office</option>
                                    <option value="47">- - - - Gaming</option>
                                    <option value="48">- - - - Chromebook</option>
                                    <option value="49">- - - - Refurbished</option>
                                    <option value="50">- - - - Touchscreen</option>
                                    <option value="51">- - - - Ultrabooks</option>
                                    <option value="52">- - - - Blouses</option>
                                    <option value="43">- - Sanai</option>
                                    <option value="53">- - - - Hard Drives</option>
                                    <option value="54">- - - - Graphic Cards</option>
                                    <option value="55">- - - - Processors (CPU)</option>
                                    <option value="56">- - - - Memory</option>
                                    <option value="57">- - - - Motherboards</option>
                                    <option value="58">- - - - Fans &amp; Cooling</option>
                                    <option value="59">- - - - CD/DVD Drives</option>
                                    <option value="44">- - Meito</option>
                                    <option value="60">- - - - Sound Cards</option>
                                    <option value="61">- - - - Cases &amp; Towers</option>
                                    <option value="62">- - - - Casual Dresses</option>
                                    <option value="63">- - - - Evening Dresses</option>
                                    <option value="64">- - - - T-shirts</option>
                                    <option value="65">- - - - Tops</option>
                                    <option value="12">Smartphone</option>
                                    <option value="66">- - Camera Accessories</option>
                                    <option value="68">- - - - Octa Core</option>
                                    <option value="69">- - - - Quad Core</option>
                                    <option value="70">- - - - Dual Core</option>
                                    <option value="71">- - - - 7.0 Screen</option>
                                    <option value="72">- - - - 9.0 Screen</option>
                                    <option value="73">- - - - Bags &amp; Cases</option>
                                    <option value="67">- - XailStation</option>
                                    <option value="74">- - - - Batteries</option>
                                    <option value="75">- - - - Microphones</option>
                                    <option value="76">- - - - Stabilizers</option>
                                    <option value="77">- - - - Video Tapes</option>
                                    <option value="78">- - - - Memory Card Readers</option>
                                    <option value="79">- - - - Tripods</option>
                                    <option value="13">Cameras</option>
                                    <option value="14">headphone</option>
                                    <option value="15">Smartwatch</option>
                                    <option value="16">Accessories</option>
                                </select> --}}
                                <input type="text" name="key" placeholder="Nhập từ khóa cần tìm ...">
                                <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <!-- Header Middle Searchbox Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <!-- Begin Header Middle Wishlist Area -->
                                    <li class="hm-wishlist">
                                        <a href="wishlist.html">
                                            <span class="cart-item-count wishlist-item-count">0</span>
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    </li>
                                    <!-- Header Middle Wishlist Area End Here -->
                                    <!-- Begin Header Mini Cart Area -->
                                    <li class="hm-minicart">
                                        <div class="hm-minicart-trigger">
                                            <span class="item-icon"></span>
                                            <span class="item-text">Giỏ Hàng
                                                <span
                                                    class="cart-item-count">{{ count((array) session('cart')) }}</span>
                                            </span>
                                        </div>
                                        <span></span>
                                        <div class="minicart">
                                            <div class="dropdown-menu">
                                                <div class="row total-header-section">
                                                    @php $total = 0 @endphp
                                                    @foreach ((array) session('cart') as $id => $details)
                                                        @php $total += $details['price'] * $details['qty'] @endphp
                                                    @endforeach
                                                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                                        <p>Tổng cộng: <span
                                                                class="text-info">${{ number_format($total, 2) }}</span>
                                                        </p>
                                                    </div>

                                                </div>
                                                @if (session('cart'))
                                                    @foreach (session('cart') as $id => $details)
                                                        <div class="row cart-detail">
                                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                                <img
                                                                    src="{{ asset('img') }}/{{ $details['options']['image'] }}" />
                                                            </div>
                                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                                <p>{{ $details['name'] }}</p>
                                                                <span
                                                                    class="price text-info">${{ $details['price'] }}</span>
                                                                <span class="count"> Số
                                                                    lượng:{{ $details['qty'] }}</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                            <p class="minicart-total">Tổng Tiền: </p>
                                            <div class="minicart-button">
                                                <a href="{{ route('cart') }}"
                                                    class="li-button li-button-fullwidth li-button-dark">
                                                    <span>Xem Chi Tiết Giỏ Hàng</span>
                                                </a>
                                                <?php
                                                $customer_id = session('thongtinkhachhang.MaKH');
                                                if($customer_id!=NULL){
                                                  ?>
                                                <a href="{{ url('/checkout') }}"
                                                    class="li-button li-button-fullwidth"><span>Thanh toán</span>
                                                </a>
                                                <?php
                                                 }else{
                                                 ?>
                                                <a href="{{ URL::to('/login') }}"
                                                    class="li-button li-button-fullwidth"><span>Đăng
                                                        nhập</span> </a>
                                                <?php
                                                }
                                                 ?>
                                            </div>

                                        </div>
                                    </li>
                                    <!-- Header Mini Cart Area End Here -->
                                </ul>
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                        <!-- Header Middle Right Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Header Middle Area End Here -->
            <!-- Begin Header Bottom Area -->
            <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Header Bottom Menu Area -->
                            <div class="hb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ URL::to('/trang_chu') }}">Trang Chủ</a></li>
                                        {{-- <li class="dropdown-holder"><a href="">Trang Chủ</a>
                                                <ul class="hb-dropdown">
                                                    <li class="active"><a href="index.html">Home One</a></li>
                                                    <li><a href="index-2.html">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                    <li><a href="index-4.html">Home Four</a></li>
                                                </ul>
                                            </li> --}}
                                        <li class="dropdown-holder"><a>Danh Mục</a>

                                            <ul class="hb-dropdown">
                                                @foreach ($danhmuc as $dm)
                                                    <li><a
                                                            href="{{ URL::to('/sanphamtheodanhmuc/' . $dm->MaDM) }}">{{ $dm->TenDM }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            {{-- <ul class="megamenu hb-megamenu">
                                                    @foreach ($danhmuc as $dm)
                                                    <li><a href="shop-left-sidebar.html">{{$dm->TenDM}}</a>
                                                    </li>
                                                    @endforeach
                                                    <li><a href="shop-left-sidebar.html">Shop Page Layout</a>
                                                    </li>
                                                    <li><a href="single-product-gallery-left.html">Single Product Style</a>
                                                        <ul>
                                                            <li><a href="single-product-carousel.html">Single Product Carousel</a></li>
                                                            <li><a href="single-product-gallery-left.html">Single Product Gallery Left</a></li>
                                                            <li><a href="single-product-gallery-right.html">Single Product Gallery Right</a></li>
                                                            <li><a href="single-product-tab-style-top.html">Single Product Tab Style Top</a></li>
                                                            <li><a href="single-product-tab-style-left.html">Single Product Tab Style Left</a></li>
                                                            <li><a href="single-product-tab-style-right.html">Single Product Tab Style Right</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="single-product.html">Single Products</a>
                                                        <ul>
                                                            <li><a href="single-product.html">Single Product</a></li>
                                                            <li><a href="single-product-sale.html">Single Product Sale</a></li>
                                                            <li><a href="single-product-group.html">Single Product Group</a></li>
                                                            <li><a href="single-product-normal.html">Single Product Normal</a></li>
                                                            <li><a href="single-product-affiliate.html">Single Product Affiliate</a></li>
                                                        </ul>
                                                    </li>
                                                </ul> --}}
                                        </li>
                                        <li class="dropdown-holder"><a href="blog-left-sidebar.html">Dịch Vụ</a>
                                            <ul class="hb-dropdown">
                                                <li class="sub-dropdown-holder"><a href="blog-left-sidebar.html">Blog
                                                        Grid View</a>
                                                    <ul class="hb-dropdown hb-sub-dropdown">
                                                        <li><a href="blog-2-column.html">Blog 2 Column</a></li>
                                                        <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                                        <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                                        <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="sub-dropdown-holder"><a
                                                        href="blog-list-left-sidebar.html">Blog List View</a>
                                                    <ul class="hb-dropdown hb-sub-dropdown">
                                                        <li><a href="blog-list.html">Blog List</a></li>
                                                        <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-list-right-sidebar.html">List Right
                                                                Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sub-dropdown-holder"><a
                                                        href="blog-details-left-sidebar.html">Blog Details</a>
                                                    <ul class="hb-dropdown hb-sub-dropdown">
                                                        <li><a href="blog-details-left-sidebar.html">Left Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-details-right-sidebar.html">Right Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="sub-dropdown-holder"><a
                                                        href="blog-gallery-format.html">Blog Format</a>
                                                    <ul class="hb-dropdown hb-sub-dropdown">
                                                        <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                        <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                        <li><a href="blog-gallery-format.html">Blog Gallery Format</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="megamenu-static-holder"><a href="index.html">Phụ Kiện</a>
                                            <ul class="megamenu hb-megamenu">
                                                <li><a href="blog-left-sidebar.html">Blog Layouts</a>
                                                    <ul>
                                                        <li><a href="blog-2-column.html">Blog 2 Column</a></li>
                                                        <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                                        <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                                        <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-list.html">Blog List</a></li>
                                                        <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-list-right-sidebar.html">List Right
                                                                Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-details-left-sidebar.html">Blog Details Pages</a>
                                                    <ul>
                                                        <li><a href="blog-details-left-sidebar.html">Left Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-details-right-sidebar.html">Right Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                        <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                        <li><a href="blog-gallery-format.html">Blog Gallery Format</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="index.html">Other Pages</a>
                                                    <ul>
                                                        <li><a href="login-register.html">My Account</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="compare.html">Compare</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="index.html">Other Pages 2</a>
                                                    <ul>
                                                        <li><a href="contact.html">Liên Hệ</a></li>
                                                        <li><a href="about-us.html">Giới Thiệu</a></li>
                                                        <li><a href="faq.html">FAQ</a></li>
                                                        <li><a href="404.html">404 Error</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                        <li><a href="shop-left-sidebar.html">Bài Viết</a></li>
                                        <li><a href="about-us.html">Giới Thiệu</a></li>
                                        <li><a href="contact.html">Liên Hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header Bottom Menu Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Bottom Area End Here -->
            <!-- Begin Mobile Menu Area -->
            <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                <div class="container">
                    <div class="row">
                        <div class="mobile-menu">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area End Here -->
        </header>
        <!-- Header Area End Here -->
        <!-- Begin Slider With Banner Area -->

        <!-- Slider With Banner Area End Here -->
        <!-- Begin Product Area -->
        <br>
        <br>
        <!-- Product Area End Here -->
        <!-- Begin Li's Static Banner Area -->
        <br>
        <br>
        <!-- Li's Static Banner Area End Here -->
        <!-- Begin Li's Laptop Product Area -->
        @yield('content')
        <!-- Li's Laptop Product Area End Here -->
        <!-- Begin Li's TV & Audio Product Area -->
        <div class="li-static-banner">
            <div class="container">
                <div class="row">
                    <!-- Begin Single Banner Area -->
                    <div class="col-lg-4 col-md-4 text-center">
                        <div class="single-banner">
                            <a href="#">
                                <img src="{{ asset('fontend/images/banner1.jpg') }}" alt="Li's Static Banner">
                            </a>
                        </div>
                    </div>
                    <!-- Single Banner Area End Here -->
                    <!-- Begin Single Banner Area -->
                    <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                        <div class="single-banner">
                            <a href="#">
                                <img src="{{ asset('fontend/images/banner2.jfif') }}" alt="Li's Static Banner">
                            </a>
                        </div>
                    </div>
                    <!-- Single Banner Area End Here -->
                    <!-- Begin Single Banner Area -->
                    <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                        <div class="single-banner">
                            <a href="#">
                                <img src="{{ asset('fontend/images/banner3.jpg') }}" alt="Li's Static Banner">
                            </a>
                        </div>
                    </div>
                    <!-- Single Banner Area End Here -->
                </div>
            </div>
        </div>
        <br>
        <br>
        <!-- Li's TV & Audio Product Area End Here -->
        <!-- Begin Li's Static Home Area -->
        <div class="li-static-home">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Begin Li's Static Home Image Area -->
                        <div class="li-static-home-image"></div>
                        <!-- Li's Static Home Image Area End Here -->
                        <!-- Begin Li's Static Home Content Area -->
                        <div class="li-static-home-content">
                            <p>Sale Offer<span>-20% Off</span>This Week</p>
                            <h2>Featured Product</h2>
                            <h2>Meito Accessories 2018</h2>
                            <p class="schedule">
                                Starting at
                                <span> $1209.00</span>
                            </p>
                            <div class="default-btn">
                                <a href="shop-left-sidebar.html" class="links">Shopping Now</a>
                            </div>
                        </div>
                        <!-- Li's Static Home Content Area End Here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Li's Static Home Area End Here -->
        <!-- Begin Li's Trending Product Area -->

        <!-- Li's Trending Product Area End Here -->
        <!-- Begin Li's Trendding Products Area -->

        <!-- Li's Trendding Products Area End Here -->
        <!-- Begin Footer Area -->
        <div class="footer">
            <!-- Begin Footer Static Top Area -->
            <div class="footer-static-top">
                <div class="container">
                    <!-- Begin Footer Shipping Area -->

                    <!-- Footer Shipping Area End Here -->
                </div>
            </div>
            <!-- Footer Static Top Area End Here -->
            <!-- Begin Footer Static Middle Area -->
            <div class="footer-static-middle">
                <div class="container">
                    <div class="footer-logo-wrap pt-50 pb-35">
                        <div class="row">
                            <!-- Begin Footer Logo Area -->
                            <div class="col-lg-4 col-md-6">
                                <div class="footer-logo">
                                    <img src="{{ asset('fontend/images/menu/logo/1.jpg') }}" alt="Footer Logo">
                                    <p class="info">
                                        Chúng tôi luôn cố gắng mang lại những giá trị tốt nhất cho bạn
                                    </p>
                                </div>
                                <ul class="des">
                                    <li>
                                        <span>Địa chỉ: </span>
                                        Số 3 Đường Cầu Giấy, Láng Thượng, Đống Đa, Hà Nội
                                    </li>
                                    <li>
                                        <span>Điện thoại: </span>
                                        <a href="#">(+84) 123 456 789</a>
                                    </li>
                                    <li>
                                        <span>Email: </span>
                                        <a href="mailto://info@yourdomain.com">lucnguyen@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Footer Logo Area End Here -->
                            <!-- Begin Footer Block Area -->
                            <div class="col-lg-2 col-md-3 col-sm-6">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">Sản Phẩm</h3>
                                    <ul>
                                        <li><a href="#">Bán Chạy</a></li>
                                        <li><a href="#">Sản Phẩm Mới</a></li>
                                        <li><a href="#">Giảm Giá</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Block Area End Here -->
                            <!-- Begin Footer Block Area -->
                            <div class="col-lg-2 col-md-3 col-sm-6">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">Về Chúng Tôi</h3>
                                    <ul>
                                        <li><a href="#">Giới Thiệu</a></li>
                                        <li><a href="#">Liên Hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Block Area End Here -->
                            <!-- Begin Footer Block Area -->
                            <div class="col-lg-4">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">Theo Dõi</h3>
                                    <ul class="social-link">
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank"
                                                title="Twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="rss">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank"
                                                title="RSS">
                                                <i class="fa fa-rss"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip"
                                                target="_blank" title="Google Plus">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank"
                                                title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank"
                                                title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://www.instagram.com/" data-toggle="tooltip"
                                                target="_blank" title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Begin Footer Newsletter Area -->
                                <div class="footer-newsletter">
                                    <h4>Đăng Ký Nhận Tin Mới</h4>
                                    <form action="#" method="post" id="mc-embedded-subscribe-form"
                                        name="mc-embedded-subscribe-form" class="footer-subscribe-form validate"
                                        target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll">
                                            <div id="mc-form" class="mc-form subscribe-form form-group">
                                                <input id="mc-email" type="email" autocomplete="off"
                                                    placeholder="Nhập email của bạn" />
                                                <button class="btn" id="mc-submit">Đăng Ký</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Footer Newsletter Area End Here -->
                            </div>
                            <!-- Footer Block Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Static Middle Area End Here -->
            <!-- Begin Footer Static Bottom Area -->
            <div class="footer-static-bottom pt-55 pb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Footer Links Area -->

                            <!-- Footer Links Area End Here -->
                            <!-- Begin Footer Payment Area -->
                            <div class="copyright text-center">
                                <a href="#">
                                    <img src="{{ asset('fontend/images/payment/1.png') }}" alt="">
                                </a>
                            </div>
                            <!-- Footer Payment Area End Here -->
                            <!-- Begin Copyright Area -->
                            <div class="copyright text-center pt-25">
                                <span><a href="https://www.templatespoint.net" target="_blank">Templates
                                        Point</a></span>
                            </div>
                            <!-- Copyright Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Static Bottom Area End Here -->
        </div>
        <!-- Footer Area End Here -->
        <!-- Begin Quick View | Modal Area -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area row">
                            <div class="col-lg-5 col-md-6 col-sm-6">
                                <!-- Product Details Left -->
                                <div class="product-details-left">
                                    <div class="product-details-images slider-navigation-1">
                                        <div class="lg-image">
                                            <img src="{{ asset('fontend/images/product/large-size/1.jpg') }}"
                                                alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="{{ asset('fontend/images/product/large-size/2.jpg') }}"
                                                alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="{{ asset('fontend/images/product/large-size/3.jpg') }}"
                                                alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="{{ asset('fontend/images/product/large-size/4.jpg') }}"
                                                alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="{{ asset('fontend/images/product/large-size/5.jpg') }}"
                                                alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="{{ asset('fontend/images/product/large-size/6.jpg') }}"
                                                alt="product image">
                                        </div>
                                    </div>
                                    <div class="product-details-thumbs slider-thumbs-1">
                                        <div class="sm-image"><img
                                                src="{{ asset('fontend/images/product/small-size/1.jpg') }}"
                                                alt="product image thumb"></div>
                                        <div class="sm-image"><img
                                                src="{{ asset('fontend/images/product/small-size/2.jpg') }}"
                                                alt="product image thumb"></div>
                                        <div class="sm-image"><img
                                                src="{{ asset('fontend/images/product/small-size/3.jpg') }}"
                                                alt="product image thumb"></div>
                                        <div class="sm-image"><img
                                                src="{{ asset('fontend/images/product/small-size/4.jpg') }}"
                                                alt="product image thumb"></div>
                                        <div class="sm-image"><img
                                                src="{{ asset('fontend/images/product/small-size/5.jpg') }}"
                                                alt="product image thumb"></div>
                                        <div class="sm-image"><img
                                                src="{{ asset('fontend/images/product/small-size/6.jpg') }}"
                                                alt="product image thumb"></div>
                                    </div>
                                </div>
                                <!--// Product Details Left -->
                            </div>

                            <div class="col-lg-7 col-md-6 col-sm-6">
                                <div class="product-details-view-content pt-60">
                                    <div class="product-info">
                                        <h2>Today is a good day Framed poster</h2>
                                        <span class="product-details-ref">Reference: demo_15</span>
                                        <div class="rating-box pt-20">
                                            <ul class="rating rating-with-review-item">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="review-item"><a href="#">Read Review</a></li>
                                                <li class="review-item"><a href="#">Write Review</a></li>
                                            </ul>
                                        </div>
                                        <div class="price-box pt-20">
                                            <span class="new-price new-price-2">$57.98</span>
                                        </div>
                                        <div class="product-desc">
                                            <p>
                                                <span>100% cotton double printed dress. Black and white striped top and
                                                    orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit. quibusdam corporis, earum facilis et
                                                    nostrum dolorum accusamus similique eveniet quia pariatur.
                                                </span>
                                            </p>
                                        </div>
                                        <div class="product-variants">
                                            <div class="produt-variants-size">
                                                <label>Dimension</label>
                                                <select class="nice-select">
                                                    <option value="1" title="S" selected="selected">40x60cm
                                                    </option>
                                                    <option value="2" title="M">60x90cm</option>
                                                    <option value="3" title="L">80x120cm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="single-add-to-cart">
                                            <form action="#" class="cart-quantity">
                                                <div class="quantity">
                                                    <label>Quantity</label>
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" value="1"
                                                            type="text">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i>
                                                        </div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="add-to-cart" type="submit">Add to cart</button>
                                            </form>
                                        </div>
                                        <div class="product-additional-info pt-25">
                                            <a class="wishlist-btn" href="wishlist.html"><i
                                                    class="fa fa-heart-o"></i>Add to wishlist</a>
                                            <div class="product-social-sharing pt-25">
                                                <ul>
                                                    <li class="facebook"><a href="#"><i
                                                                class="fa fa-facebook"></i>Facebook</a></li>
                                                    <li class="twitter"><a href="#"><i
                                                                class="fa fa-twitter"></i>Twitter</a></li>
                                                    <li class="google-plus"><a href="#"><i
                                                                class="fa fa-google-plus"></i>Google +</a></li>
                                                    <li class="instagram"><a href="#"><i
                                                                class="fa fa-instagram"></i>Instagram</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick View | Modal Area End Here -->
    </div>
    {{-- <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    @yield('scripts') --}}
    <!-- Body Wrapper End Here -->
    <!-- jQuery-V1.12.4 -->
    <script src="{{ asset('fontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('fontend/js/vendor/popper.min.js') }}"></script>
    <!-- Bootstrap V4.1.3 Femwork js -->
    <script src="{{ asset('fontend/js/bootstrap.min.js') }}"></script>
    <!-- Ajax Mail js -->
    <script src="{{ asset('fontend/js/ajax-mail.js') }}"></script>
    <!-- Meanmenu js -->
    <script src="{{ asset('fontend/js/jquery.meanmenu.min.js') }}"></script>
    <!-- Wow.min js -->
    <script src="{{ asset('fontend/js/wow.min.js') }}"></script>
    <!-- Slick Carousel js -->
    <script src="{{ asset('fontend/js/slick.min.js') }}"></script>
    <!-- Owl Carousel-2 js -->
    <script src="{{ asset('fontend/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific popup js -->
    <script src="{{ asset('fontend/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Isotope js -->
    <script src="{{ asset('fontend/js/isotope.pkgd.min.js') }}"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('fontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Mixitup js -->
    <script src="{{ asset('fontend/js/jquery.mixitup.min.js') }}"></script>
    <!-- Countdown -->
    <script src="{{ asset('fontend/js/jquery.countdown.min.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('fontend/js/jquery.counterup.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('fontend/js/waypoints.min.js') }}"></script>
    <!-- Barrating -->
    <script src="{{ asset('fontend/js/jquery.barrating.min.js') }}"></script>
    <!-- Jquery-ui -->
    <script src="{{ asset('fontend/js/jquery-ui.min.js') }}"></script>
    <!-- Venobox -->
    <script src="{{ asset('fontend/js/venobox.min.js') }}"></script>
    <!-- Nice Select js -->
    {{-- <script src="{{ asset('fontend/js/jquery.nice-select.min.js') }}"></script> --}}
    <!-- ScrollUp js -->
    <script src="{{ asset('fontend/js/scrollUp.min.js') }}"></script>
    <!-- Main/Activator js -->
    <script src="{{ asset('fontend/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> --}}
        <script>
            var mauSacChanged = false;
            var dungLuongChanged = false;

    $('.nice-select').change(function(){
        if ($(this).attr('id') === 'mauSacSelect') {
            // Nếu là select Màu Sắc thay đổi
            //console.log(1);
            var mauSacValue = $('#mauSacSelect').val();
            var maSP = $('#mauSacSelect').children(":selected").attr("id");
            console.log(mauSacValue+ ' '+maSP);
            innerDL(maSP, mauSacValue);
            mauSacChanged = true;
        } else if ($(this).attr('id') === 'dungLuongSelect') {
            // Nếu là select Dung Lượng thay đổi
            dungLuongChanged = true;
        }
        // Kiểm tra nếu cả hai đã thay đổi
        if (mauSacChanged && dungLuongChanged) {
            // Lấy giá trị của Màu Sắc
            var mauSacValue = $('#mauSacSelect').val();

            // Lấy giá trị của Dung Lượng
            var dungLuongValue = $('#dungLuongSelect').val();

            var maSP = $('#mauSacSelect').children(":selected").attr("id");

            // Hiển thị giá trị

            axios.post('/chi-tiet-san-pham', {
                MauSacValue: mauSacValue,
                DungLuongValue: dungLuongValue,
                MaSPValue: maSP,
            })
            .then(function (response) {
    // Lấy MaCTSP từ response
    var maCTSP = response.data.maCTSP;
                //alert(maCTSP);
    // Chuyển hướng đến trang chi tiết sản phẩm mới
    window.location.href = '/chi-tiet-san-pham/' + maSP + '/' + maCTSP + '/' + mauSacValue + '/' + dungLuongValue;
    })
    .catch(function (error) {
        console.error(error);
    });

            //alert(mauSacValue);
            //alert(dungLuongValue);
            //alert(maSP);
            //window.location.href = '/chi-tiet-san-pham/CTSP05';
            // Đặt lại trạng thái đã thay đổi
            mauSacChanged = false;
            dungLuongChanged = false;
        }
    });
    function innerDL(MaSP, MaMau) {
    console.log('Đã vào inner');
    let strDL = '';
    const data = {
        MaMau: MaMau,
        MaSP: MaSP
    };
    $.ajax({
        url: 'http://127.0.0.1:8000/api/ctspdungluong',
        type: 'POST',
        data: data,
        dataType: 'json',
        // contentType: 'application/json',
        success: function(data) {
            //console.log(data);
            $.each(data, function (key, value) {
                strDL += `<option id="${value.MaSP}" value="${value.MaDL}" title="S">${value.SoDL}</option>`;
            });
            //console.log(strDL);
            document.getElementById('dungLuongSelect').innerHTML = strDL;
            //$('#dungLuongSelect').html(strDL);
        },
        error: function(error) {
            console.log(error);
        }
    });
}
        </script>

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
</body>

<!-- index30:23-->

</html>
