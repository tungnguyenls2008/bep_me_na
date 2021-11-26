@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thống kê doanh thu </h1>
                    <a href="{{route('bill-export')}}" class="badge badge-pill badge-success">Xuất excel</a>
                </div>

                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('checkoutOrders.create') }}">
                        Tạo mới
                    </a>
                </div>
            </div>
        </div>
{{--        <div>--}}
{{--            @include('checkout_orders.search')--}}
{{--        </div>--}}
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('checkout_orders.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

