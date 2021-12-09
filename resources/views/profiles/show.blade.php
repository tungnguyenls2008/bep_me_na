@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin cửa hàng</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-outline-success float-right"
                       href="{{ route('profiles.edit',$profile->id) }}">
                        Chỉnh sửa
                    </a>
                </div>

            </div>
            @include('flash::message')
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('profiles.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
