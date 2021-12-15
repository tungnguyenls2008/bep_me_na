
<!-- Route Field -->
<?php
$routeCollection = Illuminate\Support\Facades\Route::getRoutes();
$routeCollection=$routeCollection->getRoutesByName();
$exceptions=[
    'ignition',
    'api.',
    'backend',
    'industries',
    'ceos',
    'products',
    'roles',
    'organizations.',
    'organization-toggle',
];
foreach ($routeCollection as $name=> $route){
    if (array_in_string($name,$exceptions)){
        unset($routeCollection[$name]);
    }
}
$routeCollection=array_keys($routeCollection);
$routeCollection=array_combine($routeCollection,$routeCollection);

?>
<div class="form-group col-sm-6">
    {!! Form::label('route', 'Route:') !!}
    {!! Form::select('route[]',$routeCollection, null, ['class' => 'form-control','placeholder'=>true,'multiple'=>true]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>
