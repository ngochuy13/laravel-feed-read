@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{ $user->exists ? 'Cập nhật tài khoản' : 'Tạo tài khoản' }}</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::model($user, [
                                        'method' => $user->exists ? 'put' : 'post',
                                        'route' => $user->exists ? ['User.update', $user->id] : ['User.store']
                                    ]) !!}
                                    <div class="row">
                                        <div class="form-group col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                                            {!! Form::label('Tên tài khoản') !!}
                                            {!! Form::text('name', null, ['class' => 'form-control border-input', 'placeholder' => 'Tên tài khoản', 'required'=> '']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                            {!! Form::label('Email') !!}
                                            {!! Form::email('email', null, ['class' => 'form-control border-input', 'placeholder'=> 'Email', 'required'=> '']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                                            {!! Form::label('Vai trò') !!}
                                            {!! Form::select('role[]', $role, $rolesChecked, ['multiple' => 'multiple', 'class' => 'form-control border-input']) !!}
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                                            {!! Form::label('Mật khẩu') !!}
                                            {!! Form::password('password', ['class' => 'form-control border-input', 'placeholder'=> 'Mật khẩu', 'required'=> '']) !!}
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            {!! Form::label('Xác nhận mật khẩu') !!}
                                            {!! Form::password('password_confirmation', ['class' => 'form-control border-input', 'placeholder'=> 'Xác nhận mật khẩu', 'required'=> '']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::submit($user->exists ? 'Cập nhật tài khoản' : 'Tạo tài khoản', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                        <div class="row">
                                        </div>

                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
