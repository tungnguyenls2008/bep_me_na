<div class="col-md-6">
    <!-- Name Field -->
    <div class="col-sm-12">
        {!! Form::label('name', 'Tên:') !!}
        <p>{{ $profile->name }}</p>
    </div>

    <!-- Ceo Id Field -->
    <div class="col-sm-12">
        {!! Form::label('ceo_id', 'Tài khoản quản trị cao nhất:') !!}
        <?php
        use Illuminate\Support\Facades\Session;$user = \App\Models\User::where(['is_ceo' => 1])->first();

        ?>
        <p>{{ $user->name }}</p>
    </div>
<?php
$industry = \App\Models\Models_be\Industry::withoutTrashed()->where(['id' => $profile->industry_id])->first();

?>
<!-- Industry Id Field -->
    <div class="col-sm-12">
        {!! Form::label('industry_id', 'Ngành nghề:') !!}
        <span class="badge badge-success">{{ $industry!=null?$industry->name:'' }}</span>
    </div>
<?php
    if (json_decode($profile->product_ids, true)!=null){
        $products = \App\Models\Models_be\Product::withoutTrashed()->where(['industry_id' => $profile->industry_id])->whereIn('id', json_decode($profile->product_ids, true))->get();
    }
else{
    $products=null;
}
?>
@if($products!=null)
    <!-- Product Ids Field -->
        <div class="col-sm-12">
            {!! Form::label('product_ids', 'Sản phẩm chính:') !!}
            @foreach($products as $product)
                <span class="badge badge-primary">{{ $product->name }}</span>
            @endforeach
        </div>
    @else
        <div class="col-sm-12">
            {!! Form::label('product_ids', 'Sản phẩm chính:') !!}
        </div>
@endif
<!-- Tax Number Field -->
    <div class="col-sm-12">
        {!! Form::label('tax_number', 'Mã số thuế:') !!}
        <p>{{ $profile->tax_number }}</p>
    </div>

    <!-- Address Field -->
    <div class="col-sm-12">
        {!! Form::label('address', 'Địa chỉ:') !!}
        <p>{{ $profile->address }}</p>
    </div>
<?php
if ($profile->dob!=null){
    $dob=date('d-m-Y',strtotime($profile->dob));
}else{
    $dob=null;
}
?>
    <!-- Dob Field -->
    <div class="col-sm-12">
        {!! Form::label('dob', 'Ngày thành lập:') !!}
        <p>{{ $dob }}</p>
    </div>

    <!-- Phone Field -->
    <div class="col-sm-12">
        {!! Form::label('phone', 'Số điện thoại:') !!}
        <p>{{ $profile->phone }}</p>
    </div>

</div>
<div class="col-md-6" style="text-align: center">
    <?php
    if (file_exists(realpath('img/organization_logos/'.Session::get('connection')['db_name'].'.png'))){
        $src=(asset('img/organization_logos/'.(Session::get('connection')['db_name']).'.png')); // put your path and image here
    }
    else{
        $src=(asset('img/organization_logos/default-company-logo.png')); // put your path and image here
    }
    ?>
    <img
        src="{{$src}}"
        alt=""
        width="500px"
        class="elevation-3"
    >
</div>
