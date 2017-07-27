@extends('layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Create Role</h4>
                            <p class="category">Here is a subtitle for this table</p>
                        </div>
                        <div class="content">
                            {{--@include('partials.errorMessage', ['errors' => $errors])--}}
                            {!! Form::model($role, [
                            'method' => $role->exists ? 'put' : 'post',
                            'route' => $role->exists ? ['Role.update', $role->id] : ['Role.store']
                            ]) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('Display name') !!}
                                        {!! Form::text('display_name', null, ['class' => 'form-control border-input']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('Role name') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control border-input']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('Description') !!}
                                        {!! Form::text('description', null, ['class' => 'form-control border-input']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::submit($role->exists ? 'Cập nhật quyền' : 'Tạo quyền', ['class' => 'btn btn-primary']) !!}
                                    {!! Form::close() !!}
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection