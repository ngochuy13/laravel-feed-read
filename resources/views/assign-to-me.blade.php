@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Todo today</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <tr><th>Order ID</th>
                                    <th>Number</th>
                                    <th>Date</th>
                                    <th>User assigned</th>
                                    <th></th>
                                </tr></thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1,000</td>
                                        <td>07-06-2017</td>
                                        <td>Niger</td>
                                        <td><a href="/order-detail"><span class="ti-arrow-circle-right"></span></a></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1,000</td>
                                        <td>07-06-2017</td>
                                        <td>Niger</td>
                                        <td><a href="/order-detail"><span class="ti-arrow-circle-right"></span></a></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1,000</td>
                                        <td>07-06-2017</td>
                                        <td>Niger</td>
                                        <td><a href="/order-detail"><span class="ti-arrow-circle-right"></span></a></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1,000</td>
                                        <td>07-06-2017</td>
                                        <td>Niger</td>
                                        <td><a href="/order-detail"><span class="ti-arrow-circle-right"></span></a></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1,000</td>
                                        <td>07-06-2017</td>
                                        <td>Niger</td>
                                        <td><a href="/order-detail"><span class="ti-arrow-circle-right"></span></a></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1,000</td>
                                        <td>07-06-2017</td>
                                        <td>Niger</td>
                                        <td><a href="/order-detail"><span class="ti-arrow-circle-right"></span></a></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
