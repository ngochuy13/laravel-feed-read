@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Create Permission</h4>
                            <p class="category">Here is a subtitle for this table</p>
                        </div>
                        <div class="content">
                            {{--@include('partials.errorMessage', ['errors' => $errors])--}}
                            {!! Form::model($permission, [
                            'method' => $permission->exists ? 'put' : 'post',
                            'route' => $permission->exists ? ['Permission.update', $permission->id] : ['Permission.store']
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
                                        {!! Form::label('Permission name [optional]') !!}
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
                                    {!! Form::submit($permission->exists ? 'Save Permission' : 'Create Permission', ['class' => 'btn btn-primary']) !!}
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