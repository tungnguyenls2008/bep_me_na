<?php $menu = \App\Models\Menu::where(['status'=>0])->get();
$menu_select = [];
$menu_html = '<option></option>';
foreach ($menu as $item) {
    $menu_select[$item->id] = $item->name;
    $menu_html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
}
$customers=\App\Models\Customer::all();
$customer_select=[];
foreach ($customers as $customer){
    $customer_select[$customer->id]=$customer->name.'-'.$customer->phone.'-'.$customer->address;
}
?>
<div id="checkout-order-div" class="col-md-12">
    <div>
        {!! Form::label('customer_info','Thông tin khách hàng') !!} <label for="is-regular" class="btn btn-outline-success"> <input type="checkbox" id="is-regular" name="regular" class="custom-checkbox">-Thân thiết?</label>

        {!! Form::text('customer_info',null,['id'=>'customer_info','class'=>'form-control','required'=>true,'placeholder'=>'Nhập thông tin khách hàng (hiển thị trên hóa đơn)']) !!}

        {!! Form::select('regular_customer_id',$customer_select,null,['id'=>'regular_customer_id','class'=>'form-control','placeholder'=>'Chọn...','required'=>true]) !!}

    </div>
    <div>

    </div>
    <hr>
    <div class="menu-item-div">
        <div class="menu-item row">
            <!-- Menu Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('menu_id', 'Món') !!}
                {!! Form::select('menu_id[0]',$menu_select,null,['id'=>'menu_id-0','placeholder'=>'Chọn...', 'required'=>true]) !!}

            </div>
            <!-- Quantity Field -->
            <div class="form-group col-sm-2">
                {!! Form::label('quantity', 'Số lượng:') !!}
                {!! Form::number('quantity[0]', null, ['id' => 'quantity-0','class'=>'form-control','min'=>0]) !!}
            </div>

            <!-- Price Field -->
            <div class="form-group col-sm-2">
                {!! Form::label('price', 'Đơn giá:') !!}
                {!! Form::number('price[0]', null, ['id' => 'price-0','readonly'=>true,'class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-2">
                {!! Form::label('total', 'Thành tiền:') !!}
                {!! Form::number('total[0]', null, ['id' => 'total-0','readonly'=>true,'class'=>'form-control total-to-pay']) !!}
            </div>
            <!-- Type Field -->
            <div class="form-group col-sm-2" style="text-align: center">
                {!! Form::label('type', 'Khuyến mãi?') !!}
                {!! Form::checkbox('type[0]',null,null,['class'=>'form-control','id' => 'type-0']) !!}
            </div>
            <div class="form-group col-sm-1">
                <label for=""></label><br>
                <a class="btn btn-danger less" style="color: white"><i class="fas fa-minus-circle"></i></a>
            </div>
        </div>

    </div>

</div>
<hr>
<div class="col-md-12">
    <div class="total-div">
        <div class="menu-item row">
            <!-- Menu Id Field -->
            <div class="form-group col-sm-3">


            </div>
            <!-- Quantity Field -->
            <div class="form-group col-sm-2">

            </div>

            <!-- Price Field -->
            <div class="form-group col-sm-2">
                {!! Form::label('', 'Giá tạm tính:') !!}

            </div>
            <div class="form-group col-sm-2">
                <input type="text" id="sum-total" name="sum-total" readonly class="form-control">
            </div>
            <!-- Type Field -->
            <div class="form-group col-sm-2">

            </div>
            <div class="form-group col-sm-1">

            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="total-div">
        <div class="menu-item row">
            <!-- Menu Id Field -->
            <div class="form-group col-sm-3">


            </div>
            <!-- Quantity Field -->
            <div class="form-group col-sm-2">

            </div>

            <!-- Price Field -->
            <div class="form-group col-sm-2">
                <label>Chiết khấu:</label>
                {!! Form::number('discount_percent', null, ['id' => 'discount_percent','class'=>'','min'=>0,'max'=>100]) !!}%

            </div>
            <div class="form-group col-sm-2">
                <input type="text" id="discount" name="discount" readonly class="form-control">
            </div>
            <!-- Type Field -->
            <div class="form-group col-sm-2">

            </div>
            <div class="form-group col-sm-1">

            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="total-div">
        <div class="menu-item row">
            <!-- Menu Id Field -->
            <div class="form-group col-sm-3">


            </div>
            <!-- Quantity Field -->
            <div class="form-group col-sm-2">

            </div>

            <!-- Price Field -->
            <div class="form-group col-sm-2">
                <label>Giá sau chiết khấu:</label>

            </div>
            <div class="form-group col-sm-2">
                <input type="text" id="total_to_pay" name="total_to_pay" readonly class="form-control">
            </div>
            <!-- Type Field -->
            <div class="form-group col-sm-2">

            </div>
            <div class="form-group col-sm-1">

            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
        <textarea name="note" id="note" cols="40" rows="4" placeholder="Ghi chú cho hóa đơn này..."></textarea>
</div>
<div class="form-group col-md-12" style="text-align: center">
    <a class="btn btn-lg btn-success" style="color: white" id="more"><i class="fas fa-plus-circle"></i></a>
</div>
<script>
    $(function () {
        let i = 0;

        var html = '';
        $("#more").on('click', function () {
            updateTotalToPay()
            i++;
            html = '<div class="row">' +
                '<div class="form-group col-sm-3"><select id="menu_id-' + i + '" name="menu_id[' + i + ']" placeholder="" required> ' +
                '{!! $menu_html !!}' +
                '</select></div>' +
                '<div class="form-group col-sm-2"><input id="quantity-' + i + '" class="form-control" name="quantity[' + i + ']" required type="number" min=0></div>' +
                '<div class="form-group col-sm-2"><input id="price-' + i + '" readonly class="form-control" name="price[' + i + ']" required type="number"></div>' +
                '<div class="form-group col-sm-2"><input id="total-' + i + '" readonly class="form-control total-to-pay" required name="total[' + i + ']" type="number"></div>' +
                '<div class="form-group col-sm-2"><input class="form-control" id="type-' + i + '" name="type[' + i + ']" type="checkbox"></div>' +
                '<div class="form-group col-sm-1"><a class="btn btn-danger less" id="remove-menu-' + i + '" style="color: white"><i class="fas fa-minus-circle"></i></a></div>' +
                '</div>'
            $("#checkout-order-div").fadeIn().append(html)

            $('#menu_id-' + i).select2(
                {
                    width: '100%',
                    placeholder: 'Chọn...'
                })
            for (let j = 0; j <= i; j++) {
                $("#menu_id-" + j).on('change', function () {
                    if (!$("#type-" + j).is(":checked")) {
                        getMenuPrice(j)

                    } else {
                        $("#price-" + j).val(0);
                        $("#total-" + j).val(0);
                        updateTotalToPay();
                    }
                })
                $("#type-" + j).on('click', function () {
                    if (!$(this).is(":checked")) {
                        getMenuPrice(j)

                    } else {
                        $("#price-" + j).val(0);
                        $("#total-" + j).val(0);
                        updateTotalToPay();
                    }
                })
                $("#quantity-" + j).on('input', function () {
                    $("#total-" + j).val($(this).val() * $("#price-" + j).val())
                    updateTotalToPay();
                })
                $("#remove-menu-" + j).on('click', function () {
                    $(this).parent().parent().remove();
                    updateTotalToPay();
                })
            }
        })

        function updateTotalToPay() {
            var sum = 0;
            $(".total-to-pay").each(function () {
                sum += +$(this).val();
            });
            $("#sum-total").val(sum);
            setDiscountValue()
        }

        function getMenuPrice(id) {
            $.ajax({
                type: 'POST',
                url: '{{route('get-menu-price')}}',
                data: {
                    id: $("#menu_id-" + id).val(),
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (data) {
                    $("#price-" + id).val(data['price']);
                    $("#total-" + id).val($("#quantity-" + id).val() * $("#price-" + id).val());
                    updateTotalToPay();
                    setDiscountValue();

                },
                error: function (data) {

                }
            });
        }

        $("#menu_id-0").on('change', function () {
            if (!$("#type-0").is(":checked")) {
                getMenuPrice(0)

            } else {
                $("#price-0").val(0);
                $("#total-0").val(0);
                updateTotalToPay();
            }
        })
        $("#type-0").on('click', function () {
            if (!$(this).is(":checked")) {
                getMenuPrice(0)

            } else {
                $("#price-0").val(0);
                $("#total-0").val(0);
                updateTotalToPay();
            }
        })
        $("#quantity-0").on('input', function () {
            $("#total-0").val($(this).val() * $("#price-0").val());
            updateTotalToPay();
        })
        $("#remove-menu-0").on('click', function () {
            $(this).parent().parent().remove();
            updateTotalToPay();
        })
        $("#discount_percent").on('change',function () {
            setDiscountValue()
        })
        function setDiscountValue(){
            var discount=($("#sum-total").val()*$("#discount_percent").val())/100;
            $("#discount").val(discount)
            $("#total_to_pay").val($("#sum-total").val()-discount);
        }
        $("#regular_customer_id").fadeOut().hide();
        $("#regular_customer_id").next(".select2-container").fadeIn().hide();
        $("#is-regular").on('change',function () {
            if ($(this).is(':checked')){
                $("#regular_customer_id").fadeIn().show();
                $("#regular_customer_id").next(".select2-container").fadeIn().show();
                $("#customer_info").fadeOut().hide();
            }else{
                $("#regular_customer_id").fadeOut().hide();
                $("#regular_customer_id").next(".select2-container").fadeOut().hide();
                $("#customer_info").fadeIn().show();
                $('#regular_customer_id').val(null).trigger("change");

            }
        })
        $("#submit").on('click',function () {

            if ($("#is-regular").is(':checked')){
                var data = $('#regular_customer_id').select2('data')
                $("#customer_info").val(data[0].text)
            }else{
                $('#regular_customer_id').removeAttr('required');
                $("#customer_info").val()
                $('#regular_customer_id').val(null).trigger("change");
            }
        })
    })
</script>
