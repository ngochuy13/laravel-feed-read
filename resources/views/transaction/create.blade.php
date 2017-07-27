@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Thanh toán đơn hàng: <strong>#{{ $request['id'] }}</strong></h4>
                        </div>
                        <div class="content">
                            {!! Form::open(['route' => 'Transaction.store', 'id' => 'transaction-form']) !!}
                            <table class="order-info-table">
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td>{{ number_format($request['total_price']) }} VNĐ</td>
                                </tr>
                                <tr>
                                    <td>Đã thanh toán</td>
                                    <td>- {{ number_format($request['total_price'] - $request['remain']) }} VNĐ</td>
                                </tr>
                                <tr>
                                    <td>Còn lại</td>
                                    <td>{{ number_format($request['remain']) }} VNĐ</td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="full-paid" class="btn btn-success" type="button">Trả hết</button>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group text-right">
                                        <label style="display: inline-block;">Thanh toán công nợ </label>
                                        {!! Form::text('amount', null, ['id' => 'paid-amount', 'class' => 'text-right form-control border-input money', 'required' => 'true', 'data-rule-maxcleave' => $request['remain'], 'data-msg-maxcleave' => 'Xin vui lòng nhập số tiền nhỏ hơn '.number_format($request['remain']), 'style' => 'font-size: 18px; display: inline-block; width: 200px;']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ghi chú</label>
                                        {!! Form::textarea('note_transaction', null, ['class' => 'form-control border-input']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('Order.detail', $request['id']) }}"  class="btn btn-info btn-fill btn-wd">Trở về</a>
                                <button type="submit" class="submit-button btn btn-info btn-fill btn-wd">Thanh toán</button>
                            </div>
                            <div class="clearfix"></div>
                            {!! Form::hidden('order_id', $request['id']) !!}
                            {!! Form::hidden('customer_id', $request['customer_id']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script src="/js/cleave.min.js"></script>
    <script src="/js/typeahead.min.js"></script>
    <script src="/js/handlebars.min.js"></script>
    <script type="text/javascript">
        jQuery(function($){
            $(".money").each(function(){
                $(this).data('cleave', new Cleave( this, {
                            numeral: true,
                            numeralThousandsGroupStyle: 'thousand',
                            numeralPositiveOnly: true
                        })
                );
            });

            $.validator.addMethod(
                    "maxcleave",
                    function(value, element, max) {
                        var cleave = $(element).data('cleave');
                        if( typeof cleave === 'undefined'){
                            return true;
                        }
                        return cleave.getRawValue() <= max;
                    },
                    "Please fill smaller value."
            );

            $("#full-paid").on('click', function(){
                var paidInput = $("#paid-amount");
                $("#paid-amount").data('cleave').setRawValue( parseInt(paidInput.attr('data-rule-maxcleave')) );
                $("#paid-amount").trigger('change');
            });

            $("#transaction-form").validate({
                submitHandler: function(form, e){
                    e.preventDefault();
                    $(".money").each(function(){
                        var cleave = $(this).data('cleave');
                        var v = cleave.getRawValue();
                        cleave.destroy();
                        this.value = v;
                    });
                    form.submit();
                }
            });
        })
    </script>
@endsection
