<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tên:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Số điện thoại:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Địa chỉ:') !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Ngày sinh:') !!}
    {!! Form::text('dob', null, ['class' => 'form-control','id'=>'dob']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#dob').datetimepicker({
            format: 'DD-MM-YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
<?php
$menu = \App\Models\Menu::all();
$menu_select = [];
$menu_html = '';
foreach ($menu as $item) {
    $menu_select[$item->id] = $item->name;
    $menu_html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
}
?>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #c33c3c;
    }
</style>
<!-- Favorites Field -->
<div class="form-group col-sm-6">
    {!! Form::label('favorites', 'Sở thích:') !!}
    {!! Form::select('favorites[]',$menu_select,null,['id'=>'favorites','multiple'=>true]) !!}

</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', 'Ghi chú:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>
<script>
    $(function () {
        $("#favorites").select2({
            width:'100%',
        })
    })
</script>
