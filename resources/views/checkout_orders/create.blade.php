@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tạo đơn hàng mới</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'checkoutOrders.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('checkout_orders.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Tạo đơn', ['class' => 'btn btn-primary','id'=>'submit']) !!}
                <a href="{{ route('checkoutOrders.index') }}" class="btn btn-default">Hủy</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    <script>
        $(function () {

        })
    </script>
@endsection
