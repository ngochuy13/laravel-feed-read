@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Quản lý</h4>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('Dashboard.listcustomer') }}" class="btn btn-info btn-fill btn-wd">Danh Sách KH</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

