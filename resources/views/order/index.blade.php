@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Search đơn hàng</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                {!! Form::open(['route' => 'Order.index', 'novalidate' => '']) !!}
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="form-group col-md-6{{ $errors->has('start_day') ? ' has-error' : '' }}">
                                            {!! Form::label('Ngày bắt đầu') !!}
                                            {!! Form::date('start_day', null, ['class' => 'form-control border-input']) !!}
                                        </div>
                                        <div class="form-group col-md-6{{ $errors->has('end_day') ? ' has-error' : '' }}">
                                            {!! Form::label('Ngày kết thúc') !!}
                                            {!! Form::date('end_day', null, ['class' => 'form-control border-input']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                            {!! Form::label('Tình trạng') !!}
                                            {!! Form::select('status', $status ,null , ['class' => 'form-control border-input']) !!}
                                        </div>
                                        <div class="col-md-6 text-right form-group">
                                            {!! Form::label('&nbsp;') !!}
                                            <button style="min-width: 100%;" class="btn btn-success" type="submit">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </div>
                                <span id="loading"></span>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách Order</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Nội dung</th>
                                    <th>Số lượng</th>
                                    <th>Kích Thước</th>
                                    <th>Thành tiền</th>
                                    <th>Ngày Giao</th>
                                    <th>User assigned</th>
                                    <th></th>
                                </tr></thead>
                                @if($orders)
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->content }}</td>
                                            <td>{{ $order->number }}</td>
                                            <td>{{ $order->size }}</td>
                                            <td>{{ number_format($order->total_price) }} VNĐ</td>
                                            <td>{{ date('d-m-Y', strtotime($order->delivery_date)) }}</td>
                                            <td>Niger</td>
                                            <td><a href="{{ route('Order.detail', ['id' => $order->id]) }}"><span class="ti-arrow-circle-right"></span></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @endif
                            </table>
                            @include('partials.pagination', ['paginator' => $orders])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
