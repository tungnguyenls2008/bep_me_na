<div class="table-responsive table-hover table-bordered">
    <table class="table" id="checkoutOrders-table">
        <thead>
        <tr>
            <th style="text-align: center">Hóa đơn</th>
            <th style="text-align: center">Danh sách thực đơn</th>
            <th style="text-align: center">Số lượng</th>
            <th style="text-align: center">Đơn giá</th>
            <th style="text-align: center"><i class="fas fa-dollar-sign" style="color: darkgreen"></i> / <i class="fas fa-gift"
                                                                                 style="color: red"></i></th>
            <th style="text-align: center">Thành tiền</th>
            <th style="text-align: center">Thông tin khác</th>
            <th style="text-align: center">Thao tác</th>
        </tr>
        </thead>
        <tbody>


        @foreach($checkoutOrders as $checkoutOrder)
            <tr>
                <td>
                    <b>Số hóa đơn: </b><a
                        href="{{asset($checkoutOrder->bill_path)}}">{{ $checkoutOrder->bill_code }}<i
                            class="fas fa-download"></i></a><br>
                    <b>Thông tin khách hàng: </b>{{$checkoutOrder->customer_info}}
                    <br>
                    @if($checkoutOrder->regular_customer_id!=null && \App\Models\Customer::find($checkoutOrder->regular_customer_id)!=null)
                        <a href="{{route('customers.show',['customer'=>$checkoutOrder->regular_customer_id])}}"
                           class="btn btn-sm btn-outline-success" style="color: green"><i class="fas fa-user-check"></i>
                            Khách
                            hàng thân thiết</a>
                    @endif
                </td>
                <?php $menu_ids = json_decode($checkoutOrder->menu_id, true);
                $menu = \App\Models\Menu::find($menu_ids);
                ?>
                <td>
                    <table class="table table-bordered table-striped">
                        @foreach($menu as $item)
                            <tr>
                                <td>
                                    {{$item->name}}
                                    @if($item->status==1)
                                        <div class="badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Tạm ngừng bán"><i class="fas fa-pause-circle"></i></div>
                                        @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
                <?php $quantity = json_decode($checkoutOrder->quantity, true);

                ?>
                <td>
                    <table class="table table-bordered table-striped">
                        @foreach($quantity as $item)
                            <tr>
                                <td>{{$item}}</td>
                            </tr>
                        @endforeach
                    </table>
                </td>
                <?php $price = json_decode($checkoutOrder->price, true);

                ?>
                <td>
                    <table class="table table-bordered table-striped">
                        @foreach($price as $item)
                            <tr>
                                <td>{{number_format($item)}}đ</td>
                            </tr>
                        @endforeach
                    </table>
                </td>
                <?php $type = json_decode($checkoutOrder->type, true);

                ?>
                <td>
                    <table class="table table-bordered table-striped">
                        @foreach($type as $item)
                            @if($item==0)
                                <tr>
                                    <td style="color: darkgreen;text-align: center"><i class="fas fa-dollar-sign"></i></td>
                                </tr>
                            @else
                                <tr>
                                    <td style="color: red;text-align: center"><i class="fas fa-gift"></i></td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </td>
                <?php
                $total = [];
                for ($i = 0; $i < count($price); $i++) {
                    $total[$i] = $quantity[$i] * $price[$i];
                }
                ?>
                <td>
                    <table class="table table-bordered table-striped">
                        @foreach($total as $item)
                            <tr>
                                <td>{{number_format($item)}}đ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                Chiết khấu {{$checkoutOrder->discount_percent!=null?$checkoutOrder->discount_percent.'%':''}}:
                                <b> {{$checkoutOrder->discount_percent!=null?number_format(((array_sum($total)*$checkoutOrder->discount_percent)/100)):0}}đ</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tổng hóa đơn:<b> {{number_format(array_sum($total)-(array_sum($total)*$checkoutOrder->discount_percent)/100)}}đ</b>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php $user = \App\Models\User::find($checkoutOrder->user_id);

                ?>
                <td>
                    <b>Người tạo: </b>{{ $user->name }}<br>
                    <b>Ngày tạo: </b>{{date('d-m-Y H:i:s',strtotime($checkoutOrder->created_at))}}<br>
                    <b>Trạng thái: </b>
                    @switch($checkoutOrder->status)
                        @case(0) <a href="{{route('order-toggle-status',['id'=>$checkoutOrder->id])}}"
                                    class="badge badge-warning"
                                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái đơn hàng này?')">Chưa
                            thanh toán</a>@break
                        @case(1) <a href="{{route('order-toggle-status',['id'=>$checkoutOrder->id])}}"
                                    class="badge badge-success"
                                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái đơn hàng này?')">Đã thanh
                            toán</a>@break
                    @endswitch
                    <hr>
                    <?php
                    $note = \App\Models\Note::where(['bill_code' => $checkoutOrder->bill_code])->first();
                    if ($note != null) {
                        echo '<b>Ghi chú: </b>' . $note->content;
                    }
                    ?>
                    <a data-toggle="modal" data-target="#{{$checkoutOrder->bill_code}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <div class="modal fade" id="{{$checkoutOrder->bill_code}}" tabindex="-1" role="dialog"
                         aria-labelledby="{{$checkoutOrder->bill_code}}" aria-hidden="true">
                        <div class="modal-dialog " role="document" style="margin-top: 10%;z-index: 10">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Ghi chú</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    $note = \App\Models\Note::where(['bill_code' => $checkoutOrder->bill_code])->first();
                                    ?>
                                    @if($note!=null)
                                        {!! Form::open(['route' => 'update-note']) !!}
                                        <input type="text" hidden value="{{$note->id}}" id="note-id" name="note-id">
                                        <!-- Bill Code Field -->
                                        <div class="form-group col-sm-12 col-lg-12">
                                            {!! Form::label('bill_code', 'Số hóa đơn:') !!}
                                            {{ Form::text('bill_code', $checkoutOrder->bill_code, ['class' => 'form-control','readonly'=>true]) }}
                                        </div>
                                        <!-- Content Field -->
                                        <div class="form-group col-sm-12 col-lg-12">
                                            {!! Form::label('content', 'Nội dung:') !!}
                                            {!! Form::textarea('content', $note->content, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="card-footer">
                                            {!! Form::submit('Cập nhật ghi chú', ['class' => 'btn btn-primary']) !!}
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng
                                            </button>
                                        </div>

                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open(['route' => 'create-note']) !!}

                                        <div class="card-body">

                                            <div class="row">
                                                <!-- Bill Code Field -->
                                                <div class="form-group col-sm-12 col-lg-12">
                                                    {!! Form::label('bill_code', 'Số hóa đơn:') !!}
                                                    {{ Form::text('bill_code', $checkoutOrder->bill_code, ['class' => 'form-control','readonly'=>true]) }}
                                                </div>
                                                <!-- Content Field -->
                                                <div class="form-group col-sm-12 col-lg-12">
                                                    {!! Form::label('content', 'Nội dung:') !!}
                                                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                        </div>

                                        <div class="card-footer">
                                            {!! Form::submit('Tạo ghi chú', ['class' => 'btn btn-primary']) !!}
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng
                                            </button>

                                        </div>

                                        {!! Form::close() !!}
                                    @endif
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['checkoutOrders.destroy', $checkoutOrder->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{--                                        <a href="{{ route('checkoutOrders.show', [$checkoutOrder->id]) }}"--}}
                        {{--                                           class='btn btn-default btn-xs'>--}}
                        {{--                                            <i class="far fa-eye"></i>--}}
                        {{--                                        </a>--}}
                        {{--                                        <a href="{{ route('checkoutOrders.edit', [$checkoutOrder->id]) }}"--}}
                        {{--                                           class='btn btn-default btn-xs'>--}}
                        {{--                                            <i class="far fa-edit"></i>--}}
                        {{--                                        </a>--}}
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    {{$checkoutOrders->links()}}
</div>
