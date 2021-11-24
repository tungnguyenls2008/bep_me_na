<div class="table-responsive">
    <table class="table" id="checkoutOrders-table">
        <thead>
        <tr>
            <th>Hóa đơn</th>
            <th>Danh sách món</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Khuyến mãi?</th>
            <th>Thành tiền</th>
            <th>Thông tin khác</th>
        </tr>
        </thead>
        <tbody>


        @foreach($checkoutOrders as $checkoutOrder)
            <tr>
                <td>{{ $checkoutOrder->bill_code }}</td>
                <?php $menu_ids = json_decode($checkoutOrder->menu_id, true);
                $menu = \App\Models\Menu::find($menu_ids);
                ?>
                <td>
                    <table class="table table-bordered table-striped">
                        @foreach($menu as $item)
                            <tr>
                                <td>{{$item->name}}</td>
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
                                <td>{{number_format($item)}}</td>
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
                                    <td>Thanh toán</td>
                                </tr>
                            @else
                                <tr>
                                    <td>Tặng kèm</td>
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
                                <td>{{number_format($item)}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                Tổng hóa đơn:<b> {{number_format(array_sum($total))}}</b>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php $user = \App\Models\User::find($checkoutOrder->user_id);

                ?>
                <td>
                    <b>Người tạo: </b>{{ $user->name }}<br>
                    <b>Ngày tạo: </b>{{date('d-m-Y H:i:s',strtotime($checkoutOrder->created_at))}}
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
                        <div class="modal-dialog modal-dialog-centered" role="document">
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
                {{--                <td width="120">--}}
                {{--                    {!! Form::open(['route' => ['checkoutOrders.destroy', $checkoutOrder->id], 'method' => 'delete']) !!}--}}
                {{--                    <div class='btn-group'>--}}
                {{--                        <a href="{{ route('checkoutOrders.show', [$checkoutOrder->id]) }}"--}}
                {{--                           class='btn btn-default btn-xs'>--}}
                {{--                            <i class="far fa-eye"></i>--}}
                {{--                        </a>--}}
                {{--                        <a href="{{ route('checkoutOrders.edit', [$checkoutOrder->id]) }}"--}}
                {{--                           class='btn btn-default btn-xs'>--}}
                {{--                            <i class="far fa-edit"></i>--}}
                {{--                        </a>--}}
                {{--                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                {{--                    </div>--}}
                {{--                    {!! Form::close() !!}--}}
                {{--                </td>--}}
            </tr>

        @endforeach

        </tbody>
    </table>
    {{$checkoutOrders->links()}}
</div>
