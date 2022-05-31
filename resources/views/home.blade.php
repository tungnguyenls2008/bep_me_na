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
                @include('flash::message')
            </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-12 " data-aos="zoom-in" data-aos-delay="300">
                <div class="alert alert-info">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    Chào mừng bạn quay trở lại, <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}.</strong>
                    <a class="btn btn-primary" href="{{ route('checkoutOrders.create') }}">
                        Tạo doanh thu mới ngay!
                    </a>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-3 col-xl-3" data-aos="zoom-out-right" data-aos-delay="300">
                <div class="card card-primary">
                    <div class="card-header">
                        <a href="{{route('menus.index')}}"><h3 class="card-title text-white">Thống kê sản phẩm</h3></a>
                    </div>
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <?php
                            $menu_count = \App\Models\Menu::count();
                            $sold_count = \App\Models\Menu::sum('count');
                            $max_sold_menu = \App\Models\Menu::orderBy('count', 'desc')->get()->take(5);
                            ?>
                            @if($menu_count==0)
                                Bạn chưa tạo dữ liệu sản phẩm.
                                <a href="{{route('menus.create')}}" class="btn btn-outline-primary">Tạo ngay</a>
                            @else
                                <div id="total-revenue-chart">
                                    Bạn đang có <b>{{$menu_count}}</b> mặt hàng, trong đó: <br>
                                    Top sản phẩm được yêu thích: <br>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Đã bán</th>
                                        </tr>
                                        </thead>
                                        @foreach($max_sold_menu as $max_sold)
                                            <tr>
                                                <td><a href="{{ route('menus.show', [$max_sold->id]) }}" >
                                                        {{$max_sold->name}}
                                                    </a></td>
                                                <td>{{$max_sold->count}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div> <!-- end col-->
            <div class="col-md-3 col-xl-3" data-aos="zoom-out-right" data-aos-delay="500">

                <div class="card card-warning">
                    <div class="card-header ">
                        <a href="{{route('checkoutOrders.index')}}"><h3 class="card-title text-white">Thống kê doanh
                                thu</h3></a>
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
                                    if (isset($quantity[$i])){
                                        $total[$i] = $quantity[$i] * $price[$i];
                                        if ($checkoutOrder->discount_percent != null) {
                                            $total[$i] = ($total[$i]) - ($total[$i] * $checkoutOrder->discount_percent / 100);
                                        }
                                    }
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

                                    if ($checkoutOrder_done->discount_percent != null) {
                                        $total_done[$i] = ($total_done[$i]) - ($total_done[$i] * $checkoutOrder_done->discount_percent / 100);
                                    }
                                }
                                $order_total_done = array_sum($total_done);
                                array_push($sum_total_done, $order_total_done);
                            }
                            $sum_sale_done = array_sum($sum_total_done);
                            ?>
                            @if($checkout_order_count==0)
                                Bạn chưa tạo đơn hàng.
                                <a href="{{route('checkoutOrders.create')}}" class="btn btn-outline-warning">Tạo
                                    ngay</a>
                            @else
                                <div id="total-revenue-chart">
                                    Bạn đã thực hiện <b>{{$checkout_order_count}}</b> đơn hàng. <br>
                                    Tổng doanh số tạm tính là <b>{{number_format($sum_sale)}}đ</b><br>
                                    <a href="{{ route('checkoutOrders.index') }}">
                                        Tổng doanh số thực là
                                    </a><br><b>{{number_format($sum_sale_done)}}đ</b><br>
                                </div>
                            @endif
                        </div>


                    </div>
                </div>
            </div> <!-- end col-->
            <div class="col-md-3 col-xl-3" data-aos="zoom-out-left" data-aos-delay="700">
                <div class="card card-info">
                    <div class="card-header">
                        <a href="{{route('expending.index')}}"><h3 class="card-title text-white">
                                Thống kê chi phí
                            </h3></a>
                    </div>
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <?php
                            $import_count = \App\Models\RawMaterialImport::where(['deleted_at' => null])->count();
                            $sum_import = \App\Models\RawMaterialImport::where(['deleted_at' => null])->sum('total');
                            $sum_paid_import = \App\Models\RawMaterialImport::where(['deleted_at' => null, 'status' => 1])->sum('total');
                            ?>
                            @if($import_count==0)
                                Bạn chưa tạo dữ liệu chi phí.
                                <a href="{{route('expending.create')}}" class="btn btn-outline-secondary">Tạo
                                    ngay</a>
                            @else
                                <div id="total-revenue-chart">Bạn có <b>{{$import_count}}</b> khoản chi <br>
                                    Tổng chi phí tạm tính là <b>{{number_format($sum_import)}}đ</b><br>
                                    <a href="{{route('expending.index')}}">
                                            Tổng chi phí thực là
                                        </a><br>
                                     <b>{{number_format($sum_paid_import)}}đ</b><br>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->
            <div class="col-md-3 col-xl-3" data-aos="zoom-out-left" data-aos-delay="900">
                <div class="card card-primary ">
                    <div class="card-header ">
                        <a href="{{route('customers.index')}}"><h3 class="card-title text-white">Thống kê khách
                                hàng</h3></a>
                    </div>
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <?php
                            $customer = \App\Models\Customer::count();
                            $buy_count = \App\Models\Customer::sum('order_count');
                            $max_buy_customer = \App\Models\Customer::orderBy('order_count', 'desc')->get()->take(5);
                            ?>
                            <div id="total-revenue-chart">
                                @if($customer==0)
                                    Bạn chưa tạo dữ liệu khách hàng thân thiết.
                                    <a href="{{route('customers.create')}}" class="btn btn-outline-primary">Tạo ngay</a>
                                @else
                                    Bạn đã lưu trữ <b>{{$customer}}</b> thông tin khách hàng, trong đó: <br>
                                    Top khách hàng thân thiết:<br>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Khách hàng</th>
                                            <th>Số lần mua hàng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($max_buy_customer as $customer)
                                            <tr>
                                                <td><a href="{{ route('customers.show', [$customer->id]) }}">
                                                        {{$customer->name}}
                                                    </a></td>
                                                <td>{{$customer->order_count}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1" style="text-align: center">
                        <span>
                        <h5 id="total_api_calls"></h5>
{{--                            <img src="{{asset('images/api.gif')}}" alt="" style="height: 200px">--}}
                        </span>
                            </h4>

                        </div>

                    </div>
                </div>
            </div> <!-- end col-->


        </div>
        <div class="row" data-aos="zoom-out-up" data-aos-delay="1100">
            <div class="col-md-6 col-xl-6">

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title text-white">Thống kê lợi nhuận</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <?php
                            $profit = $sum_sale_done - $sum_import;
                            if ($profit <= 0) {
                                $state = '<b style="color: red">tạm lỗ</b>' . ' <b style="color: red">' . number_format(($profit)) . 'đ!</b>';
                            } else {
                                $state = '<b style="color: darkgreen">tạm lãi</b>' . ' <b style="color: darkgreen">' . number_format(($profit)) . 'đ!</b>';
                            }
                            echo '<p>Sau trừ tất cả chi phí, bạn đang ' . $state . '</p>'
                            ?>
                            <br>
                            <p>Bạn còn
                                <b>{{\App\Models\RawMaterialImport::where(['deleted_at' => null,'status'=>0])->count()}}</b>
                                <a href="{{route('expending.index')}}">khoản chi</a> chưa thanh toán!</p><br>
                            <p>Bạn còn
                                <b>{{\App\Models\CheckoutOrder::where(['deleted_at' => null,'status'=>0])->count()}}</b>
                                <a href="{{route('checkoutOrders.index')}}">đơn hàng</a> chưa thu tiền!</p><br>
                            {{--                            <button id="profit-button" class="btn btn-outline-success">Hiển thị</button>--}}

                            <div id="profit-display">
                                @include('charts.order-chart')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xl-3">
                <?php
                $check_attended = \App\Models\Attendance::whereDate('date', \Carbon\Carbon::today())->get();
                ?>
                @if(!$check_attended->isEmpty())
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title text-white">Trạng thái chấm công</h3>
                        </div>
                        <div class="card-body">
                            <div class="container" style="text-align: center">
                                <img src="{{asset('img/success.gif')}}" alt="" width="200px"><br>
                                ĐÃ chấm công nhân viên <a href="{{route('attendances.index')}}"
                                                          class="btn btn-sm btn-outline-success">Kiểm tra</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title text-white">Trạng thái chấm công</h3>
                        </div>
                        <div class="card-body">
                            <div class="container" style="text-align: center">
                                <img src="{{asset('img/failed.gif')}}" alt="" width="200px"><br>
                                CHƯA chấm công nhân viên <a href="{{route('attendances.create')}}"
                                                            class="btn btn-sm btn-outline-success">Chấm công ngay</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-3 col-xl-3">

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title text-white">Sử dụng sau</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-aos="zoom-out-up" data-aos-delay="200">
            <div class="col-md-12 col-xl-12">

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title text-white">Thời tiết hôm nay</h3>
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
                                    @case('01d')            background: url({{asset('img/w_clear_sky.gif')}});
                                    @case('01n')            background: url({{asset('img/w_clear_sky.gif')}});
                                    @case('02d')            background: url({{asset('img/w_few_cloud.gif')}});
                                    @case('02n')            background: url({{asset('img/w_few_cloud.gif')}});
                                    @case('03d')            background: url({{asset('img/w_scattered_clouds.gif')}});
                                    @case('03n')            background: url({{asset('img/w_scattered_clouds.gif')}});
                                    @case('04d')            background: url({{asset('img/w_broken_clouds.gif')}});
                                    @case('04n')            background: url({{asset('img/w_broken_clouds.gif')}});
                                    @case('09d')            background: url({{asset('img/w_shower_rain.gif')}});
                                    @case('09n')            background: url({{asset('img/w_shower_rain.gif')}});
                                    @case('10d')            background: url({{asset('img/w_rain.gif')}});
                                    @case('10n')            background: url({{asset('img/w_rain.gif')}});
                                    @case('11d')            background: url({{asset('img/w_thunder_storm.gif')}});
                                    @case('11n')            background: url({{asset('img/w_thunder_storm.gif')}});
                                    @case('13d')            background: url("https://images.techhive.com/images/article/2017/05/cloud_blueprint_schematic-100722515-large.jpg?auto=webp");
                                    @case('13n')            background: url("https://images.techhive.com/images/article/2017/05/cloud_blueprint_schematic-100722515-large.jpg?auto=webp");
                                    @case('50d')            background: url({{asset('img/w_mist.gif')}});
                                    @case('50n')            background: url({{asset('img/w_mist.gif')}});

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
