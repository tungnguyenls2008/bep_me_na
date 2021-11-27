@extends('layouts.app')

@section('content')
    <style>
        .col-md-3.col-xl-3 {
            display: inline-grid;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    Chào mừng bạn quay trở lại, <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}.</strong>
                    <a class="btn btn-primary" href="{{ route('checkoutOrders.create') }}">
                        Tạo doanh thu mới ngay!
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thống kê thực đơn</h3>
                    </div>
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <?php
                            $menu_count = \App\Models\Menu::count();
                            $type_bun_count = \App\Models\Menu::where('name', 'like', '%Bún%')->count();
                            $type_lau_count = \App\Models\Menu::where('name', 'like', '%Lẩu%')->count();
                            ?>
                            <div id="total-revenue-chart">
                                Bạn đang có <b>{{$menu_count}}</b> món ăn, trong đó: <br>
                                <b>{{$type_bun_count}}</b> món Bún. <br>
                                <b>{{$type_lau_count}}</b> món Lẩu.
                            </div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1" style="text-align: center">
                        <span>
                        <h5 id="total_api_calls"></h5>
                            <img src="{{asset('images/api.gif')}}" alt="" style="height: 200px">
                        </span>
                            </h4>

                        </div>

                    </div>
                </div>
            </div> <!-- end col-->
            <div class="col-md-3 col-xl-3">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Thống kê chi phí
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <?php
                            $import_count = \App\Models\RawMaterialImport::where(['deleted_at' => null])->count();
                            $sum_import = \App\Models\RawMaterialImport::where(['deleted_at' => null])->sum('total');
                            ?>
                            <div id="total-revenue-chart">Bạn đã chi <b>{{$import_count}}</b> lần <br>
                                Tổng chi phí là <b>{{number_format($sum_import)}}đ</b>

                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->
            <div class="col-md-3 col-xl-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Thống kê doanh thu</h3>
                    </div>
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <?php
                            $checkout_order_count = \App\Models\CheckoutOrder::where(['deleted_at' => null])->count();
                            $checkoutOrders = \App\Models\CheckoutOrder::where(['deleted_at' => null])->get();
                            $checkoutOrders_done = \App\Models\CheckoutOrder::where(['deleted_at' => null, 'status' => 1])->get();
                            $sum_total = [];
                            $sum_total_done = [];
                            foreach ($checkoutOrders as $key => $checkoutOrder) {
                                $quantity = json_decode($checkoutOrder->quantity, true);
                                $price = json_decode($checkoutOrder->price, true);
                                $total = [];
                                for ($i = 0; $i < count($price); $i++) {
                                    $total[$i] = $quantity[$i] * $price[$i];
                                }
                                $order_total = array_sum($total);
                                array_push($sum_total, $order_total);
                            }
                            $sum_sale = array_sum($sum_total);
                            foreach ($checkoutOrders_done as $key => $checkoutOrder_done) {
                                $quantity_done = json_decode($checkoutOrder_done->quantity, true);
                                $price_done = json_decode($checkoutOrder_done->price, true);
                                $total_done = [];
                                for ($i = 0; $i < count($price_done); $i++) {
                                    $total_done[$i] = $quantity_done[$i] * $price_done[$i];
                                }
                                $order_total_done = array_sum($total_done);
                                array_push($sum_total_done, $order_total_done);
                            }
                            $sum_sale_done = array_sum($sum_total_done);
                            ?>
                            <div id="total-revenue-chart">
                                Bạn đã thực hiện <b>{{$checkout_order_count}}</b> đơn hàng. <br>
                                Tổng doanh số tạm tính là <b>{{number_format($sum_sale)}}đ</b><br>
                                Tổng doanh số thực là <b>{{number_format($sum_sale_done)}}đ</b><br>
                            </div>
                        </div>


                    </div>
                </div>
            </div> <!-- end col-->
            <div class="col-md-3 col-xl-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thống kê khách hàng</h3>
                    </div>
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <?php
                            $customer = \App\Models\Customer::count();
                            ?>
                            <div id="total-revenue-chart">
                                Bạn đã lưu trữ <b>{{$customer}}</b> thông tin khách hàng <br>
                            </div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1" style="text-align: center">
                        <span>
                        <h5 id="total_api_calls"></h5>
                            <img src="{{asset('images/api.gif')}}" alt="" style="height: 200px">
                        </span>
                            </h4>

                        </div>

                    </div>
                </div>
            </div> <!-- end col-->


        </div>
        <div class="row">
            <div class="col-md-12 col-xl-12">

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Thống kê lợi nhuận</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <?php
                            $profit=$sum_sale_done-$sum_import;
                            if ($profit<=0){
                                $state='<b>lỗ</b>';
                            }else{
                                $state='<b>lãi</b>';
                            }
                            echo '<p>Bạn đang '.$state.' <b>'. number_format(intval($profit)).'đ!</b></p>'
                            ?>
{{--                            <button id="profit-button" class="btn btn-outline-success">Hiển thị</button>--}}
                            <div id="profit-display" >
                                @include('charts.order-chart')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xl-12">

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Weather forecast</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $apiKey = "6334eaca94312c6d55c44c89426aec4c";
                        $cityId = "1581130";
                        $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

                        $ch = curl_init();

                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                        curl_setopt($ch, CURLOPT_VERBOSE, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        $response = curl_exec($ch);

                        curl_close($ch);
                        $data = json_decode($response);
                        $currentTime = time();
                        ?>
                        <div class="report-container">
                            <style>
                                .report-container {
                                    border: #E0E0E0 1px solid;
                                    padding: 20px 20px 100px 20px;
                                    border-radius: 2px;
                                    margin: 0 auto;
                                    color: #1f1f1a;
                                    @switch($data->weather[0]->icon)
                                    @case('01d')         background: url({{asset('img/w_clear_sky.gif')}});
                                    @case('01n')         background: url({{asset('img/w_clear_sky.gif')}});
                                    @case('02d')         background: url({{asset('img/w_few_cloud.gif')}});
                                    @case('02n')         background: url({{asset('img/w_few_cloud.gif')}});
                                    @case('03d')         background: url({{asset('img/w_scattered_clouds.gif')}});
                                    @case('03n')         background: url({{asset('img/w_scattered_clouds.gif')}});
                                    @case('04d')         background: url({{asset('img/w_broken_clouds.gif')}});
                                    @case('04n')         background: url({{asset('img/w_broken_clouds.gif')}});
                                    @case('09d')         background: url({{asset('img/w_shower_rain.gif')}});
                                    @case('09n')         background: url({{asset('img/w_shower_rain.gif')}});
                                    @case('10d')         background: url({{asset('img/w_rain.gif')}});
                                    @case('10n')         background: url({{asset('img/w_rain.gif')}});
                                    @case('11d')         background: url({{asset('img/w_thunder_storm.gif')}});
                                    @case('11n')         background: url({{asset('img/w_thunder_storm.gif')}});
                                    @case('13d')         background: url("https://images.techhive.com/images/article/2017/05/cloud_blueprint_schematic-100722515-large.jpg?auto=webp");
                                    @case('13n')         background: url("https://images.techhive.com/images/article/2017/05/cloud_blueprint_schematic-100722515-large.jpg?auto=webp");
                                    @case('50d')         background: url({{asset('img/w_mist.gif')}});
                                    @case('50n')         background: url({{asset('img/w_mist.gif')}});

                                @endswitch








                                }
                            </style>
                            <div class="row" style="color: darkslategrey">
                                <div class="col-md-6">
                                    <h2 style="margin-bottom: 14px"><?php echo $data->name; ?></h2>
                                    <div class="time">
                                        <div><?php echo date("l g:i a", $currentTime); ?></div>
                                        <div><?php echo date("jS F, Y", $currentTime); ?></div>
                                        <div><?php echo ucwords($data->weather[0]->description); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="weather-forecast">
                                        <img
                                            src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                                            class="weather-icon"/><br> <?php echo $data->main->temp_max; ?>°C -
                                        <span
                                            class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
                                    </div>
                                    <div class="time">
                                        <div>Độ ẩm: <?php echo $data->main->humidity; ?> %</div>
                                        <div>Sức gió: <?php echo $data->wind->speed; ?> km/h</div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
