@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">TIẾP NHẬN YÊU CẦU THIẾT KẾ</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="/" method="POST" class="" id="create-request">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Tên Khách Hàng</label>
                                                <input type="text" class="form-control border-input" placeholder="Tên Khách Hàng" value="" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Số Điện Thoại</label>
                                                <input type="text" class="form-control border-input" placeholder="Số Điện Thoại" value="" required data-rule-vnphone="true" data-msg-vnphone="Số ĐT không hợp lệ">
                                            </div>
                                        </div>
                                        <span id="loading"></span>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input type="text" class="form-control border-input" placeholder="Địa chỉ" value="" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Nội Dung Yêu Cầu</label>
                                            <textarea rows="10" class="form-control border-input"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kích Thước (W x H mét)</label>
                                                    <input type="text" class="form-control border-input" placeholder="Kích Thước" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Số lượng</label>
                                                    <input type="number" class="form-control border-input" placeholder="Số lượng" value="100" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Thành Tiền</label>
                                                <input id="total_price" type="number" class="form-control border-input" placeholder="Thành Tiền" value="" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Đưa Trước</label>
                                                <input id="deposit_money" type="number" class="form-control border-input" placeholder="Đưa Trước" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Còn Lại: <span id="debt-calculation">0</span></label>
                                            <input type="hidden" id="debt" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày Giao</label>
                                            <input type="date" class="form-control border-input" placeholder="Ngày Giao" value="" required>
                                        </div>
                                        <br>
                                        <div class="footer text-right">
                                            <button style="min-width: 200px;" class="btn btn-success" type="submit">Tiếp nhận</button>
                                        </div>
                                        <br>
                                        {{csrf_field()}}
                                    </form>
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