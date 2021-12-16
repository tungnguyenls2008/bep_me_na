<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tên(hiển thị trên hóa đơn):') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'readonly'=>true]) !!}
</div>

<!-- Ceo Id Field -->
<div class="form-group col-sm-6">
    <?php
    $users=\App\Models\User::all();
    $user_select=[];
    foreach ($users as $user){
        $user_select[$user->id]=$user->name;
    }
    ?>
    {!! Form::label('ceo_id', 'Tài khoản quản trị cao nhất:') !!}
    {!! Form::select('ceo_id', $user_select,null, ['class' => 'form-control']) !!}
</div>
<?php
$industries=\App\Models\Models_be\Industry::withoutTrashed()->get();
$industry_select=[];
foreach ($industries as $industry){
    $industry_select[$industry->id]=$industry->name;
}
?>
<!-- Industry Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('industry_id', 'Ngành nghề:') !!}
    {!! Form::select('industry_id',$industry_select, null, ['class' => 'form-control','placeholder'=>true]) !!}
</div>

<!-- Product Ids Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_ids[]', 'Các sản phẩm chính:') !!}
    {!! Form::select('product_ids[]',[], json_decode($profile->product_ids,true), ['class' => 'form-control','maxlength' => 500,'maxlength' => 500,'multiple'=>true,'id'=>'product_ids']) !!}
</div>


<!-- Tax Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_number', 'Mã số thuế:') !!}
    {!! Form::text('tax_number', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Địa chỉ(hiển thị trên hóa đơn):') !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Ngày thành lập:') !!}
    <?php
    if ($profile->dob!=null){
        $dob=date('d-m-Y',strtotime($profile->dob));
    }else{
        $dob=null;
    }
    ?>
    {!! Form::text('dob', $dob, ['class' => 'form-control','id'=>'dob']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#dob').datetimepicker({
            format: 'DD-MM-YYYY',
            useCurrent: true,
            sideBySide: true
        })
        $(function () {
            $("#industry_id").select2({
                placeholder: 'Chọn...',
                allowClear: true
            }).on('change',function () {
                $.ajax({
                    url:'{{route('profiles-get-product-ids')}}',
                    method:'POST',
                    data:{
                        ids:$(this).val(),
                        _token:'{{csrf_token()}}'
                    },
                    //dataType:'json',
                    success:function (data) {

                        $("#product_ids").html(data['product_select'])
                        $("#product_ids").select2().select2('val',data['product_selected']);

                    }
                })
            })
            $.ajax({
                url:'{{route('profiles-get-product-ids')}}',
                method:'POST',
                data:{
                    ids:$("#industry_id").val(),
                    profile_id: '<?php echo $profile->id ?>',
                    _token:'{{csrf_token()}}'
                },
                dataType:'json',
                success:function (data) {
                    $("#product_ids").html(data['product_select'])
                    $("#product_ids").select2().val(data['product_selected']).trigger('change');
                }
            })
        })
    </script>
@endpush

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Số điện thoại(hiển thị trên hóa đơn):') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 16,'maxlength' => 16]) !!}
</div>
<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', 'Logo cửa hàng:') !!}
    {!! Form::file('logo', ['accept'=>'image/jpeg,image/x-png']) !!}
    <?php
    if (file_exists(realpath('img/organization_logos/'.Session::get('connection')['db_name'].'.png'))){
        $src=(asset('img/organization_logos/'.(Session::get('connection')['db_name']).'.png')); // put your path and image here
    }
    else{
        $src=(asset('img/organization_logos/default-company-logo.png')); // put your path and image here
    }
    ?>
    <img src="{{$src}}" alt="" style="width: 200px">
</div>
