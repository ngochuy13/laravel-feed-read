@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}">
                            {!! session('message.content') !!}
                        </div>
                    @endif
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="title">Danh sách chức vụ</h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <a href="{{ route('Role.create') }}" class="btn btn-info btn-fill btn-wd">Tạo chức vụ</a>
                                </div>
                            </div>
                        </div>
                        <div class="content table-responsive table-full-width">

                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th width="20%">ID chức vụ</th>
                                    <th width="20%">Tên</th>
                                    <th width="35%">Mô tả</th>
                                    <th width="12%">Sửa</th>
                                    <th width="12%">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>
                                            <p>{{ $role->name }}</p>
                                        </td>
                                        <td>
                                          <p>{{ $role->display_name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $role->description }}</p>
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('Role.edit', $role->id) }}">
                                                <span class="ti-pencil"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('Role.delete', $role->id) }}">
                                                <span class="ti-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                @include('partials.pagination', ['paginator' => $roles])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection