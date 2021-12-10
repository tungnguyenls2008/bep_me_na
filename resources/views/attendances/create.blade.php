@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Chấm công hôm nay</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'attendances.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('attendances.fields')
                </div>

            </div>
            <?php
            use App\Models\Employee;$disabled = false;
            $employees = Employee::all();
            if ($employees->isEmpty()) {
                $disabled = true;
            }
            ?>
            <div class="card-footer">
                {!! Form::submit('Chấm công', ['class' => 'btn btn-primary','disabled'=>$disabled]) !!}
                <a href="{{ route('attendances.index') }}" class="btn btn-default">Hủy</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
