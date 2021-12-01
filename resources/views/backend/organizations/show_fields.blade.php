<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $organization->name }}</p>
</div>

<!-- Ceo Id Field -->
<div class="col-sm-12">
    {!! Form::label('ceo_id', 'Ceo Id:') !!}
    <p>{{ $organization->ceo_id }}</p>
</div>

<!-- Licence Field -->
<div class="col-sm-12">
    {!! Form::label('licence', 'Licence:') !!}
    <p>{{ $organization->licence }}</p>
</div>

<!-- Db Name Field -->
<div class="col-sm-12">
    {!! Form::label('db_name', 'Db Name:') !!}
    <p>{{ $organization->db_name }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $organization->status }}</p>
</div>

