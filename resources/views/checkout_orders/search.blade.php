<?php
?>
<div class="col-md-12 border">
    {!! Form::model($checkoutOrders, ['route' => 'search','method'=>'post']) !!}

    <div class="row">
        <div class="col-sm-3">
            <label for="bill_code">
                Mã hóa đơn
            </label><input type="text" id="bill_code" name="bill_code" placeholder="Tìm mã hóa đơn..."
                           class="form-control">
            {{--    <input type="date" id="created_at" name="created_at" placeholder="Tìm theo ngày..." class="form-control" style="width: auto" >--}}

        </div>
        <div class="col-sm-3">

            <label for="customer_info">
                Thông tin khách hàng
            </label>
            <input type="text" id="customer_info" name="customer_info" placeholder="Tìm thông tin khách hàng..."
                   class="form-control">
            {{--<input type="number" id="total_from" name="total_from" placeholder="Từ..." class="form-control"--}}
            {{--                                                   style="width: auto">--}}
            {{--            <input type="number" id="total_to" name="total_to" placeholder="Đến..." class="form-control"--}}
            {{--                   style="width: auto">--}}
            {{--    <input type="date" id="created_at" name="created_at" placeholder="Tìm theo ngày..." class="form-control" style="width: auto" >--}}
        </div>
        <div class="col-sm-3">
            <?php
            $users = \App\Models\User::all();
            $user_arr = '<option></option>';
            foreach ($users as $user) {
                $user_arr .= '<option value="' . $user->id . '">' . $user->name . '</option>';
            }
            ?>
            <label for="total_from">
                Người tạo hóa đơn
            </label><select type="number" id="user_id" name="user_id" class="form-control"
                            style="width: auto">
                <?php echo $user_arr; ?>
            </select>

        </div>
        <div class="col-md-3">
            <label for="">Ngày tạo</label><br>
            <div style="display: inline-flex">
                <input type="date" name="create_from" id="create_from" class="form-control" style="width: 50%">
                <input type="date" name="create_to" id="create_to" class="form-control" style="width: 50%">
            </div>

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

