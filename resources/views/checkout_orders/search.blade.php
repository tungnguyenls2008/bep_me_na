<?php
?>
<div class="col-md-12 border">
    {!! Form::model($checkoutOrders, ['route' => 'search','method'=>'get']) !!}

    <div class="row">
        <div class="col-sm-4">
            <label for="bill_code">
                Mã hóa đơn
            </label><input type="text" id="bill_code" name="bill_code" placeholder="Tìm mã hóa đơn..." value="{{request()->filled('bill_code')?request()->bill_code:''}}"
                           class="form-control">
            {{--    <input type="date" id="created_at" name="created_at" placeholder="Tìm theo ngày..." class="form-control" style="width: auto" >--}}

        </div>
        <div class="col-sm-4">

            <label for="customer_info">
                Thông tin khách hàng
            </label>
            <input type="text" id="customer_info" name="customer_info" placeholder="Tìm thông tin khách hàng..." value="{{request()->filled('customer_info')?request()->customer_info:''}}"
                   class="form-control">
            {{--<input type="number" id="total_from" name="total_from" placeholder="Từ..." class="form-control"--}}
            {{--                                                   style="width: auto">--}}
            {{--            <input type="number" id="total_to" name="total_to" placeholder="Đến..." class="form-control"--}}
            {{--                   style="width: auto">--}}
            {{--    <input type="date" id="created_at" name="created_at" placeholder="Tìm theo ngày..." class="form-control" style="width: auto" >--}}
        </div>
        <div class="col-sm-4">
            <?php
            $users = \App\Models\User::all();
            $user_arr = '<option></option>';
            foreach ($users as $user) {
                $selected='';
                if (request()->user_id==$user->id){
                    $selected='selected';
                }
                $user_arr .= '<option value="' . $user->id . '" '.$selected.' >' . $user->name . '</option>';
            }
            ?>
            <label for="total_from">
                Người tạo hóa đơn
            </label><select type="number" id="user_id" name="user_id" class="form-control"
                            style="width: auto">
                <?php echo $user_arr; ?>
            </select>

        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="">Ngày tạo</label><br>
            <div style="display: flex">
                <input type="date" name="create_from" id="create_from" placeholder="Từ" class="form-control" style="width: 50%" value="{{request()->filled('create_from')?request()->create_from:''}}">
                <input type="date" name="create_to" id="create_to" placeholder="Đến" class="form-control" style="width: 50%" value="{{request()->filled('create_to')?request()->create_to:''}}">
            </div>

        </div>
        <div class="col-md-4">
            <label for="status">Trạng thái đơn hàng</label>
            <select name="status" id="status" class="form-control">
                <option></option>
                <option value="0" {{request()->status=="0"?'selected':''}}>Chưa thanh toán</option>
                <option value="1" {{request()->status=="1"?'selected':''}}>Đã thanh toán</option>
            </select>
        </div>
    </div>
    <hr>
    <div class="form-group" style="text-align: center">
        <button type="submit" class="btn btn-success">Tìm kiếm</button>
        <a href="{{route('checkoutOrders.index')}}"> Hủy</a>
        <div><?php
            if (isset($count)) {
                echo "<i>Tìm thấy $count kết quả.</i>";
            }
            ?></div>
    </div>
    {!! Form::close() !!}

</div>

