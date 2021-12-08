@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chấm công</h1>
                </div>
                <div class="col-sm-6">

                    <?php
                    $check_attended=\App\Models\Attendance::whereDate('date',\Carbon\Carbon::today())->get();
                    ?>
                    @if($check_attended->isEmpty())
                    <a class="btn btn-primary float-right"
                       href="{{ route('attendances.create') }}">
                        Chấm công hôm nay
                    </a>
                        @else
                        <div class="float-right">
                            <button class="btn btn-secondary"
                                    disabled>
                                <i class="fa fa-check"></i>
                                Đã chấm công hôm nay
                            </button>
                            <a class="btn btn-primary"
                               href="{{ route('attendance-create-additional') }}">
                                Chấm công bổ sung
                            </a>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
        <ul class="nav-justified tabs-animated nav">
            <li class="nav-item ">
                <a role="tab" class="nav-link show active" id="tab-c1-0" data-toggle="tab" href="#tab-animated1-0"
                   aria-selected="true">
                    <span class="nav-text">Hiển thị theo danh sách</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link show" id="tab-c1-1" data-toggle="tab" href="#tab-animated1-1"
                   aria-selected="false">
                    <span class="nav-text">Hiển thị theo lịch</span>
                </a>
            </li>
        </ul>

        <div class="card">

            <div class="card-body p-0">
                <div class="tab-content">
                    <div class="tab-pane show active" id="tab-animated1-0" role="tabpanel">
                        @include('attendances.search')
                        @include('attendances.table')

                    </div>
                    <div class="tab-pane show" id="tab-animated1-1" role="tabpanel">
                        @include('attendances.calendar')


                    </div>
                </div>
                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>

@endsection

