<?php
?>
<div class="col-md-12 border">
    {!! Form::model($attendances, ['route' => 'attendance-search','method'=>'get']) !!}

<div class="row">
    <div class="col-sm-4">
        <?php
        $employees = \App\Models\Employee::all();
        $employee_arr = '<option></option>';
        foreach ($employees as $employee) {
            $selected = '';
            if (request()->employee_id == $employee->id) {
                $selected = 'selected';
            }
            $employee_arr .= '<option value="' . $employee->id . '" ' . $selected . ' >' . $employee->name . '</option>';
        }
        ?>
        <label for="total_from">
            Nhân viên
        </label><select type="number" id="employee_id" name="employee_id" class="form-control"
                        style="width: auto">
            <?php echo $employee_arr; ?>
        </select>

    </div>


    <div class="col-md-4">
        <label for="">Khoảng ngày chấm công</label><br>
        <div style="display: flex">
            <input type="date" name="date_from" id="date_from" placeholder="Từ" class="form-control" style="width: 50%"
                   value="{{request()->filled('date_from')?request()->date_from:''}}">
            <input type="date" name="date_to" id="date_to" placeholder="Đến" class="form-control" style="width: 50%"
                   value="{{request()->filled('date_to')?request()->date_to:''}}">
        </div>

    </div>
    <div class="col-md-4">
        <label for="status">Trạng thái chấm công</label>
        <select name="status" id="status" class="form-control">
            <option></option>
            <option value="0" {{request()->status=="0"?'selected':''}}>Đủ công</option>
            <option value="1" {{request()->status=="1"?'selected':''}}>Nửa công</option>
            <option value="2" {{request()->status=="1"?'selected':''}}>Nghỉ phép</option>
            <option value="3" {{request()->status=="1"?'selected':''}}>Nghỉ không lương</option>
        </select>
    </div>
</div>


    <hr>
    <div class="form-group" style="text-align: center">
        <button type="submit" class="btn btn-success">Tìm kiếm</button>
        <a href="{{route('attendances.index')}}"> Hủy</a>
        <div><?php
            if (isset($count)) {
                echo "<i>Tìm thấy $count kết quả.</i>";
            }
            ?></div>
    </div>
    {!! Form::close() !!}

</div>

