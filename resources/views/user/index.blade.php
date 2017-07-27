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
                                    <h4 class="title">Danh sách tài khoản</h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <a href="{{ Route('User.create') }}"
                                       class="btn btn-info btn-fill btn-wd">Tạo tài khoản</a>
                                </div>
                            </div>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày chỉnh sửa</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                @if($listUser)
                                    <tbody>
                                    @foreach($listUser as $User)
                                        <tr>
                                            <td>{{$User->id}}</td>
                                            <td>{{$User->name}}</td>
                                            <td>{{$User->email}}</td>
                                            <td>{{$User->created_at}}</td>
                                            <td>{{$User->updated_at}}</td>
                                            <td><a class="btn btn-info" href="{{ route('User.edit', ['id' => $User->id] ) }}"><span class="ti-arrow-circle-right"></span></a></td>
                                            <td><a class="btn btn-danger" href="{{ route('User.delete', ['id' => $User->id] ) }}"><span class="ti-trash"></span></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @endif
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')

@endsection