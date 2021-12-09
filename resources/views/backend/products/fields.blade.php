<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 120,'maxlength' => 120]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>
<?php
$industries=\App\Models\Models_be\Industry::withoutTrashed()->get();
$industry_select=[];
foreach ($industries as $industry){
    $industry_select[$industry->id]=$industry['name'];
}
?>
<!-- Industry Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('industry_id', 'Industry Id:') !!}
    {!! Form::select('industry_id',$industry_select, null, ['class' => 'form-control','placeholder'=>true]) !!}
</div>
