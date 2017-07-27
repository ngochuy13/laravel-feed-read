@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Chi tiết đơn hàng: <strong>#{{$order['id']}}</strong></h4>
                        </div>
                        <div class="content">
                            {!! Form::open(['route' => 'Order.update', 'id' => 'form-update']) !!}
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="order-info-table">
                                        <tr>
                                            <td>Kích Thước: </td>
                                            <td>{{ $order['size'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng: </td>
                                            <td>{{ $order['number'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày giao: </td>
                                            <td>{{ date('d-m-Y', strtotime($order->delivery_date)) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            @if(Auth::user()->can('donhang') && Auth::user()->hasRole('administrator'))
                            <div class="row payment">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tổng tiền</label>
                                        <p>{{ number_format($order['total_price']) }} VNĐ</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Trả trước</label>
                                        <p>{{ number_format($order['deposited']) }} VNĐ</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Còn lại</label>
                                        <p>{{ number_format($order['remain']) }} VNĐ</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Đang thuộc về</label>
                                        {{--<input type="text" class="form-control border-input" value="Niger" placeholder="User assigned">--}}
                                        <select class="form-control border-input" name="user_id">
                                            <option value="">Chưa giao</option>
                                            @if($users)
                                                @foreach($users as $user)
                                                    @php
                                                        $roles = $user->roles()->addSelect('display_name')->get()->toArray()
                                                    @endphp
                                                    @if($order->user_id && $order->user_id == $user->id)
                                                        <option selected value="{{$user->id}}">{{$user->name}}
                                                            ({{$roles[0]['display_name']}})
                                                    @else
                                                        <option value="{{$user->id}}">{{$user->name}}
                                                            ({{$roles[0]['display_name']}})
                                                            @endif
                                                        </option>
                                                        @endforeach
                                                    @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Tình trạng</label>
                                    {!! Form::select('status', $status, $order['status'], ['class' => 'form-control border-input']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea rows="5" class="form-control border-input"
                                                  placeholder="Here can be your description"
                                                  value="Mike">{{ $order['content'] }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Cập nhật Đơn hàng</button>
                                @if($order['remain'] !=0 )
                                    <a href="javascript:void(0)" data-form="frm-create" class="btn btn-info btn-fill btn-wd submit-button">Thanh toán</a>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                            {!! Form::hidden('id', $order['id']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['route' => 'Transaction.create', 'id' => 'frm-create']) !!}
                            {!! Form::hidden('id' , $order['id']) !!}
                            {!! Form::hidden('customer_id' , $order['customer_id']) !!}
                            {!! Form::hidden('deposited', $order['deposited']) !!}
                            {!! Form::hidden('total_price', $order['total_price']) !!}
                            {!! Form::hidden('remain', $order['remain']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    @if(Auth::user()->can('donhang') && Auth::user()->hasRole('administrator'))
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Hoạt động gần đây.</h4>
                        </div>
                        <div class="content">
                            @if($transactions && $order['remain'] !=0 )
                                @foreach($transactions as $key => $transaction)
                                    <div class="timeline dashboard-timeline">
                                        <div class="timeline-group">
                                            <ul class="top-data">
                                                <li class="item overflow-ellipsis">
                                                    <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                                    <label>Mã đơn hàng #{{ $transaction['order_id'] }}</label>
                                                    <span class="item-quantity"> đã thanh toán: </span>
                                                    <a href="" title="">{{ number_format($transaction['amount']) }} VNĐ</a>
                                                    <span class="pull-right text-gray">{{ \Carbon\Carbon::parse($transaction->created_at)->diffForHumans() }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Đã thanh toán</p>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
