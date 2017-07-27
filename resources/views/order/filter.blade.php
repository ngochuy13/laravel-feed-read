@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-tab-report">
                        <div class="tab-report-header">
                            <div class="report-item active" data-id="1">
                                <p class="range">Hôm nay</p>
                                <p class="range-date">
                                    <span>Hôm nay</span>
                                </p>
                                <h2 class="revenue">{{ number_format($transactionToday) }} vn₫</h2>
                                <p class="order-total">{{ $orderToday ? $orderToday : 0 }} đơn hàng</p>
                            </div>
                            <div class="report-item" data-id="2">
                                <p class="range">Hôm qua</p>
                                <p class="range-date">
                                    <span>Hôm qua</span>
                                </p>
                                <h2 class="revenue">{{ number_format($transactionYesterday) }} vn₫</h2>
                                <p class="order-total">{{ $orderYesterday ? $orderYesterday : 0 }} đơn hàng</p>
                            </div>
                            <div class="report-item" data-id="3">
                                <p class="range">7 ngày trước</p>
                                <p class="range-date">
                                    <span>Hôm qua</span>
                                    <span> - </span>
                                    <span>{{ Carbon\Carbon::yesterday()->startOfWeek()->format('d-m-Y') }}</span>
                                </p>
                                <h2 class="revenue">{{ number_format($transactionLastWeek) }} vn₫</h2>
                                <p class="order-total">{{ $orderLastWeek ? $orderLastWeek : 0 }} đơn hàng</p>
                            </div>
                            <div class="report-item" data-id="4">
                                <p class="range">30 ngày trước</p>
                                <p class="range-date">
                                    <span>Hôm qua</span>
                                    <span> - </span>
                                    <span>{{ Carbon\Carbon::yesterday()->subMonth()->format('d-m-Y') }}</span>
                                </p>
                                <h2 class="revenue">{{ number_format($transactionMonth) }} vn₫</h2>
                                <p class="order-total">{{ $orderMonth ? $orderMonth : 0 }} đơn hàng</p>
                            </div>
                            <div class="report-item" data-id="4">
                                <p class="range">90 ngày trước</p>
                                <p class="range-date">
                                    <span>Hôm qua</span>
                                    <span> - </span>
                                    <span>{{ Carbon\Carbon::yesterday()->subMonth(3)->format('d-m-Y') }}</span>
                                </p>
                                <h2 class="revenue">{{ number_format($transactionThreeMonth) }} vn₫</h2>
                                <p class="order-total">{{ $orderThreeMonth ? $orderThreeMonth : 0 }} đơn hàng</p>
                            </div>
                        </div>
                        <div class="tab-report-content">
                            <div class="report-content active" data-id='1'>
                                <h1>this is content of tab 1</h1>
                            </div>
                            <div class="report-content" data-id='2'>
                                <h1>this is content of tab 2</h1>
                            </div>
                            <div class="report-content" data-id='3'>
                                <h1>this is content of tab 3</h1>
                            </div>
                            <div class="report-content" data-id='4'>
                                <h1>this is content of tab 4</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datatable').DataTable({
                "ajax": "json/order-need-send.json",
                "columns": [
                    { "data": "id" },
                    { "data": "price" },
                    { "data": "number" },
                    { "data": "start_date" },
                    { "data": "status" }
                ]
            });
            $('.block-tab-report .report-item').on('click', function(e){
                e.preventDefault();
                $('.block-tab-report .report-item').removeClass('active');
                $(this).addClass('active');
                var itemID = $(this).data('id');
                $('.block-tab-report .report-content').removeClass('active');
                $('.block-tab-report .report-content[data-id='+itemID+']').addClass('active');
            })
        } );
    </script>
@stop