@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách khách hàng</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped datatable">
                                <thead>
                                <tr>
                                    <th>Mã số</th>
                                    <th>Họ và Tên</th>
                                    <th>Số ĐT</th>
                                    <th>Địa chỉ</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Mã số</th>
                                    <th>Họ và Tên</th>
                                    <th>Số ĐT</th>
                                    <th>Địa chỉ</th>
                                    <th>Thao tác</th>
                                </tr>
                                </tfoot>
                            </table>

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
                "ajax": "{{route('Customer.list.json')}}",
                "language": {
                    "url": "/data-table-vietnamese.json"
                },
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "phone" },
                    { "data": "address" },
                    { "data": "action" }
                ]
            });
        } );
    </script>
@stop

