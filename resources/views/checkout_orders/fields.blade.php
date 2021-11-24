<?php $menu = \App\Models\Menu::all();
$menu_select = [];
$menu_html = '<option></option>';
foreach ($menu as $item) {
    $menu_select[$item->id] = $item->name;
    $menu_html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
}
?>
<div id="checkout-order-div" class="col-md-12">
    <div class="menu-item-div">
        <div class="menu-item row">
            <!-- Menu Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('menu_id', 'Món') !!}
                {!! Form::select('menu_id[0]',$menu_select,null,['id'=>'menu_id-0','placeholder'=>'Chọn...']) !!}

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


<div class="row">
    <div class="col-md-6">
        <textarea name="note" id="note" cols="40" rows="4" placeholder="Ghi chú cho hóa đơn này..."></textarea>
    </div>
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
                '<div class="form-group col-sm-3"><select id="menu_id-' + i + '" name="menu_id[' + i + ']" placeholder=""> ' +
                '{!! $menu_html !!}' +
                '</select></div>' +
                '<div class="form-group col-sm-2"><input id="quantity-' + i + '" class="form-control" name="quantity[' + i + ']" type="number" min=0></div>' +
                '<div class="form-group col-sm-2"><input id="price-' + i + '" readonly class="form-control" name="price[' + i + ']" type="number"></div>' +
                '<div class="form-group col-sm-2"><input id="total-' + i + '" readonly class="form-control total-to-pay" name="total[' + i + ']" type="number"></div>' +
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
            $("#sum-total").val(sum)
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
                    updateTotalToPay()

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
    })
</script>
