@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Order need send</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Price</th>
                                        <th>Number</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Price</th>
                                        <th>Number</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

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
        } );
    </script>
@stop
