<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>THUCHI-SYSTEM</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: OnePage - v4.6.0
    * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<style>
    /*section {*/
    /*    padding: 120px 0;*/
    /*    overflow: hidden;*/
    /*}*/
    #hero .container {
        padding-top: 130px;
    }
</style>
<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    {{--    @if (Route::has('login'))--}}
    {{--        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
    {{--            @auth--}}
    {{--                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>--}}
    {{--            @else--}}
    {{--                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>--}}

    {{--                --}}{{--                        @if (Route::has('register'))--}}
    {{--                --}}{{--                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>--}}
    {{--                --}}{{--                        @endif--}}
    {{--            @endauth--}}
    {{--        </div>--}}
    {{--    @endif--}}
    <div class="container d-flex align-items-center justify-content-between">

        <img src="{{asset('img/overlord.png')}}"
             alt="CULI-SYSTEM"
             class="brand-image" style="width: 150px">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                @if (Route::has('login'))
                    {{--                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Trang chủ</a>
                    @else
                        <a href="{{ route('organization') }}" class="text-sm text-gray-700 underline">Đăng nhập</a>

                    @endauth

                @endif

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 text-center">
                <h1>THUCHI-SYSTEM</h1>
                <h2>Giải pháp quản lí Thu-Chi hiệu quả của bạn!</h2>
                <h3><i>[Nền tảng quản lí tài chính tập trung]</i></h3>
            </div>
        </div>
        <div class="text-center">
            @auth
                <a href="{{ url('/home') }}" class="btn-get-started scrollto">Trang chủ</a>
            @else
                <a href="{{ route('organization') }}" class="btn-get-started scrollto"
                   style="background: green;width: 250px">Đăng nhập</a>
                <a href="{{ route('organization-register') }}" class="btn-get-started scrollto"
                   style="background: blue;width: 250px">Tạo cửa hàng</a>

                {{--                        @if (Route::has('register'))--}}
                {{--                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>--}}
                {{--                        @endif--}}
            @endauth
            {{--            <a href="{{ route('login') }}" class="btn-get-started scrollto">Login now</a>--}}
        </div>

        <div class="row icon-boxes">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                 data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="ri-stack-line"></i></div>
                    <h4 class="title"><a href="">Chào mừng bạn đến với:</a></h4>
                    <p class="description">
                        <?php
                        $organizations = \App\Models\Models_be\Organization::withoutTrashed()->get();
                        ?>
                        {{$organizations->count()}} Cửa hàng
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                 data-aos-delay="300">
                <div class="icon-box">
                    <div class="icon"><i class="ri-palette-line"></i></div>
                    <h4 class="title"><a href="">Doanh số cao nhất:</a></h4>
                    <p class="description">
                        <?php
                        $sum_sale = [];
                        $sum_total = [];
                        foreach ($organizations as $key => $organization) {
                            $checkoutOrders = [];
                            $checkoutOrders[$organization->db_name] = \Illuminate\Support\Facades\DB::connection($organization->db_name)
                                ->table('checkout_order')->where(['deleted_at' => null])->get();

                            $sum_total_done = [];
                            $total = [];
                            $order_total = [];
                            foreach ($checkoutOrders[$organization->db_name] as $c_key => $checkoutOrder) {
                                $quantity = json_decode($checkoutOrder->quantity, true);
                                $price = json_decode($checkoutOrder->price, true);

                                for ($i = 0; $i < count($price); $i++) {
                                    $total[$i] = ($quantity[$i] * $price[$i]) * $checkoutOrder->discount_percent / 100;
                                }
                                $order_total[$c_key] = array_sum($total);
                                //$sum_total[$c_key]= array_sum($order_total);

                            }
                            $sum_sale[$organization->db_name] = array_sum($order_total);
                        }
                        $top_sale_organization = \App\Models\Models_be\Organization::withoutTrashed()
                            ->where(['db_name' => array_keys($sum_sale, max($sum_sale))[0]])->first();
                        ?>
                        <b>{{number_format(max($sum_sale))}}đ</b> thuộc về cửa hàng
                        <b><a href="{{ route('organization-show', [$top_sale_organization->profile_id]) }}">
                                {{$top_sale_organization->name}}
                            </a></b>
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                 data-aos-delay="400">
                <div class="icon-box">
                    <div class="icon"><i class="ri-command-line"></i></div>
                    <h4 class="title"><a href="">Top cửa hàng "khủng":</a></h4>
                    <p class="description">
                    <table class="table table-bordered">

                        <?php

                        arsort($sum_sale);
                        $sum_sale = array_slice($sum_sale, 0, 5);
                        ?>
                        <tr>
                            @foreach($sum_sale as $key=> $top)
                                <td>
                                    <?php
                                    $top_organization = \App\Models\Models_be\Organization::withoutTrashed()->where(['db_name' => $key])->first();
                                    ?>
                                        <a href="{{ route('organization-show', [$top_organization->profile_id]) }}">
                                            {{$top_organization->name}}
                                        </a>
                                </td>
                                <td>
                                    {{\Illuminate\Support\Facades\DB::connection($key)->table('menu')->count()}} Sản phẩm
                                </td>
                        </tr>
                        @endforeach

                    </table>
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                 data-aos-delay="500">
                <div class="icon-box">
                    <div class="icon"><i class="ri-fingerprint-line"></i></div>
                    <h4 class="title"><a href="">Danh sách ngành hàng</a></h4>
                    <p class="description">
                        <table class="table table-bordered">
                        <?php
                        $industries=\App\Models\Models_be\Industry::withoutTrashed()->get();
                        ?>
                        @foreach($industries as $industry)
                            <tr>
                                <td>
                                    {{$industry->name}}
                                </td>
                                <td>
                                    <?php
                                    $profiles_count=\App\Models\Models_be\Profile::withoutTrashed()->where(['industry_id'=>$industry->id])->count();
                                    ?> {{$profiles_count}} Cửa hàng
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    </p>
                </div>
            </div>

        </div>
    </div>
</section><!-- End Hero -->


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>


