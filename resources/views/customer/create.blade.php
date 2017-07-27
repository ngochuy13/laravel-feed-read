@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">TẠO MỚI KHÁCH HÀNG</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::open(['route' => 'Customer.store', 'id' => 'create-request', 'novalidate' => '']) !!}
                                        <div class="row">
                                            <div class="form-group col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                                                {!! Form::label('Tên Khách Hàng') !!}
                                                {!! Form::text('name', null, ['class' => 'form-control border-input', 'placeholder' => 'Tên Khách Hàng', 'required'=> '']) !!}
                                            </div>
                                            <div class="form-group col-md-6{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                {!! Form::label('Số Điện Thoại') !!}
                                                {!! Form::text('phone', null, ['class' => 'form-control border-input', 'placeholder'=> 'Số Điện Thoại', 'required'=> '', 'data-rule-vnphone' => 'true' , 'data-msg-vnphone' => 'Số ĐT không hợp lệ']) !!}
                                            </div>
                                        </div>
                                        <span id="loading"></span>
                                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                            {!! Form::label('Tên Công ty') !!}
                                            {!! Form::text('company', null, ['class' => 'form-control border-input', 'placeholder'=> 'Tên công ty', 'required'=> '']) !!}
                                        </div>
                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            {!! Form::label('Địa chỉ') !!}
                                            {!! Form::text('address', null, ['class' => 'form-control border-input', 'placeholder'=> 'Địa chỉ', 'required'=> '']) !!}
                                        </div>
                                        <div class="footer text-right">
                                            <button style="min-width: 200px;" class="btn btn-success" type="submit">Tạo mới</button>
                                        </div>
                                        <br>
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
    </style>
@endsection

@section('page_scripts')
    <script type="text/javascript">
        jQuery(function($){
            $("#total_price, #deposit_money").on('change', function(){
                var dep = $("#deposit_money").val();
                var price = $("#total_price").val();
                if(isNaN(dep)){
                    dep = 0;
                }
                if(isNaN(price)){
                    dep = 0;
                }
                $("#debt-calculation").html( price - dep );
                $("input[id=remain]").val( price - dep )
            });
            $.validator.addMethod(
                    "vnphone",
                    function(value, element) {
                        var re = new RegExp(/^(0\d{9,10})$/);
                        return this.optional(element) || re.test(value);
                    },
                    "10-11 digits start with 0"
            );
            $("#create-request").validate();
        })
    </script>
@endsection
