@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">TIẾP NHẬN YÊU CẦU THIẾT KẾ</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::open(['route' => 'Customer.storecusorder', 'id' => 'create-request', 'novalidate' => '']) !!}
                                    <div class="row">
                                        <div class="form-group col-md-6{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            {!! Form::label('Số Điện Thoại') !!}
                                            <div class="typeahead-wrapper">
                                                {!! Form::text('phone', null, ['id'=>'phone', 'class' => 'form-control border-input', 'placeholder'=> 'Số Điện Thoại', 'required'=> '', 'data-rule-vnphone' => 'true' , 'data-msg-vnphone' => 'Số ĐT không hợp lệ']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                                            {!! Form::label('Tên Khách Hàng') !!}
                                            {!! Form::text('name', null, ['id'=>'name','class' => 'form-control border-input', 'placeholder' => 'Tên Khách Hàng', 'required'=> '']) !!}
                                        </div>
                                    </div>
                                    <span id="loading"></span>
                                    <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                        {!! Form::label('Tên Công ty') !!}
                                        {!! Form::text('company', null, ['id'=>'company','class' => 'form-control border-input', 'placeholder'=> 'Tên công ty', 'required'=> '']) !!}
                                    </div>
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        {!! Form::label('Địa chỉ') !!}
                                        {!! Form::text('address', null, ['id'=>'address','class' => 'form-control border-input', 'placeholder'=> 'Địa chỉ', 'required'=> '']) !!}
                                    </div>
                                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                        {!! Form::label('Nội Dung Yêu Cầu') !!}
                                        {!! Form::textarea('content', null, ['class' => 'form-control border-input', 'rows' => '10', 'required'=> '']) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                                                {!! Form::label('Kích Thước (W x H mét)') !!}
                                                {!! Form::text('size', null, ['class' => 'form-control border-input', 'placeholder'=> 'Kích Thước', 'required'=> '']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                                                {!! Form::label('Số lượng') !!}
                                                {!! Form::text('number', null, ['class' => 'form-control border-input', 'placeholder'=> 'Số lượng', 'required'=> '']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6{{ $errors->has('total_price') ? ' has-error' : '' }}">
                                            {!! Form::label('Thành Tiền') !!}
                                            {!! Form::text('total_price', null, ['id' => 'total_price', 'class' => 'money form-control border-input', 'placeholder'=> 'Thành Tiền', 'required'=> '']) !!}
                                        </div>
                                        <div class="form-group col-md-6{{ $errors->has('deposited') ? ' has-error' : '' }}">
                                            {!! Form::label('Đưa Trước') !!}
                                            {!! Form::text('deposited', null, ['id' => 'deposit_money', 'class' => 'money form-control border-input', 'placeholder'=> 'Đưa Trước', 'required'=> '']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('remain') ? ' has-error' : '' }}">
                                        <label>Còn Lại: <span id="debt-calculation">0</span></label>
                                        {!! Form::hidden('remain', null, ['id' => 'remain']) !!}
                                    </div>
                                    <div class="form-group{{ $errors->has('delivery_date') ? ' has-error' : '' }}">
                                        {!! Form::label('Ngày Giao') !!}
                                        {!! Form::date('delivery_date', null, ['class' => 'form-control border-input', 'placeholder'=> 'Ngày Giao', 'required'=> '']) !!}
                                    </div>
                                    <br>
                                    <div class="footer text-right">
                                        <button style="min-width: 200px;" class="btn btn-success" type="submit">Tiếp nhận</button>
                                    </div>
                                    <br>
                                    {!! Form::hidden('status', 'waiting') !!}
                                    {!! Form::hidden('customer_id', 0) !!}
                                    {!! Form::hidden('priority', 0) !!}
                                    {{csrf_field()}}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_styles')
    <style>
        .form-group{
            position: relative;
        }
        label.error{
            color: red;
            position: absolute;
            font-size: 12px;
        }
        .twitter-typeahead{
            width: 100%;
        }

        .typeahead,
        .tt-query,
        .tt-hint {
            width: 100%;
            height: 40px;
            padding: 8px 18px;
            font-size: 14px;
            line-height: 30px;
            border: 2px solid #ccc;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
            outline: none;
        }

        .typeahead {
            background-color: #fff;
        }

        .typeahead:focus {
            border: 2px solid #0097cf;
        }

        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
            color: #999
        }

        .tt-menu {
            width: 100%;
            margin: 5px 0;
            padding: 5px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }
        .tt-menu .empty-message{
            padding: 5px 18px;
        }
        .tt-suggestion {
            padding: 3px 18px;
            font-size: 16px;
            line-height: 1.4;
        }
        .tt-suggestion .customer-name{
            font-size: 12px;
            color: #888;
            display: block;
        }

        .tt-suggestion:hover {
            cursor: pointer;
            background-color: #f1f1f1;
        }

        .tt-suggestion.tt-cursor {
            background-color: #f1f1f1;
        }

        .tt-suggestion p {
            margin: 0;
        }

        .gist {
            font-size: 14px;
        }

    </style>
@endsection
@section('page_scripts')
    <script src="/js/cleave.min.js"></script>
    <script src="/js/typeahead.min.js"></script>
    <script src="/js/handlebars.min.js"></script>
    <script type="text/javascript">
        function numberWithThousands(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        jQuery(function($){

            var phones = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '/customer/request-json?phone=%QUERY',
                    wildcard: '%QUERY'
                }
            });

            $("#phone").typeahead(null, {
                name: 'customer-phone',
                display: 'phone',
                source: phones,
                templates: {
                    empty: '<div class="empty-message">Không có khách hàng tương ứng</div>',
                    notFound: '<div class="empty-message">Không có khách hàng tương ứng</div>',
                    suggestion: Handlebars.compile('<div><span class="phone">@{{phone}}</span><span class="customer-name">@{{name}}</span></div>')
                }
            }).on('typeahead:change', function(e){
                var isMatchSelected = $(e.target).attr('data-phone') == e.target.value;
                $("#address, #company, #name").prop('readonly', isMatchSelected);
                if(!isMatchSelected){
                    $("[name='customer_id']").val(0);
                } else {
                    $("[name='customer_id']").val( $(e.target).attr('data-customer-id') );
                }
            }).on('typeahead:select', function(e, selected_data){
                $("#name").val(selected_data.name).prop('readonly', true);
                $("#company").val(selected_data.company).prop('readonly', true);
                $("#address").val(selected_data.address).prop('readonly', true);
                $("[name='customer_id']").val(selected_data.id);
                $(this).attr('data-phone', selected_data.phone);
                $(this).attr('data-customer-id', selected_data.id);
            });

            $("#total_price, #deposit_money").on('keyup', function(){
                var dep = $("#deposit_money").data('cleave').getRawValue();
                var price = $("#total_price").data('cleave').getRawValue();
                var debt = (price - dep > 0) ? (price - dep) : 0;
                $("#debt-calculation").html( numberWithThousands(debt) );
                $("input[id=remain]").val( debt );
            });

            $(".money").each(function(){
                $(this).data('cleave', new Cleave( this, {
                            numeral: true,
                            numeralThousandsGroupStyle: 'thousand',
                            numeralPositiveOnly: true
                        })
                );
            });


            $.validator.addMethod(
                    "vnphone",
                    function(value, element) {
                        var re = new RegExp(/^(0\d{9,10})$/);
                        return this.optional(element) || re.test(value);
                    },
                    "10-11 digits start with 0"
            );
            $("#create-request").validate({
                highlight: function(el, errorClass){
                    $(el).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(el, errorClass){
                    $(el).closest('.form-group').removeClass('has-error');
                },
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
