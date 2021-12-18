<?php
?>
<div class="col-md-12 border">
    {!! Form::model($menus, ['route' => 'menu-search','method'=>'get']) !!}

    <div class="row">
        <div class="col-sm-4">
            <label for="bill_code">
                Tên sản phẩm
            </label>
            <?php
            $menu_select=[];
            foreach ($menus as $menu){
                $menu_select[$menu->id]=$menu->name;
            }
            ?>
            {{--    <input type="date" id="created_at" name="created_at" placeholder="Tìm theo ngày..." class="form-control" style="width: auto" >--}}
            {{Form::select('id',$menu_select,request()->filled('id')?request()->id:null,['class'=>'form-control','placeholder'=>'Chọn...'])}}

        </div>
        <div class="col-md-4">
            <label for="">Giá</label><br>
            <div style="display: flex">
                <input type="number" name="price_from" id="create_from" placeholder="Từ" class="form-control" style="width: 50%" value="{{request()->filled('price_from')?request()->price_from:''}}">
                <input type="number" name="price_to" id="create_to" placeholder="Đến" class="form-control" style="width: 50%" value="{{request()->filled('price_to')?request()->price_to:''}}">
            </div>

        </div>
        <div class="col-md-4">
            <label for="">Số lượng đã bán</label><br>
            <div style="display: flex">
                <input type="number" name="count_from" id="create_from" placeholder="Từ" class="form-control" style="width: 50%" value="{{request()->filled('count_from')?request()->count_from:''}}">
                <input type="number" name="count_to" id="create_to" placeholder="Đến" class="form-control" style="width: 50%" value="{{request()->filled('count_to')?request()->count_to:''}}">
            </div>

        </div>



    </div>
    <div class="row">

        <div class="col-md-4">
            <label for="status">Trạng thái sản phẩm</label>
            <select name="status" id="status" class="form-control">
                <option></option>
                <option value="0" {{request()->status=="0"?'selected':''}}>Đang bán</option>
                <option value="1" {{request()->status=="1"?'selected':''}}>Tạm ngừng</option>
            </select>
        </div>

    </div>
    <hr>
    <div class="form-group" style="text-align: center">
        <button type="submit" class="btn btn-success">Tìm kiếm</button>
        <a href="{{route('menus.index')}}"> Hủy</a>
        <div><?php
            if (isset($count)) {
                echo "<i>Tìm thấy $count kết quả.</i>";
            }
            ?></div>
    </div>
    {!! Form::close() !!}

</div>

