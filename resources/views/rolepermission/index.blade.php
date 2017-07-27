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
                            <h4 class="title">Phân quyền cho vai trò</h4>
                            {{--<p class="category">Here is a subtitle for this table</p>--}}
                        </div>
                        <div class="content">
                            {!! Form::open(['route' => 'Roles.permissions.update']) !!}
                            <div class="table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Permission</th>
                                        @foreach($roles as $role)
                                            <th><span>{{ $role->display_name }}</span></th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>
                                                <p>{{ $permission->display_name }}</p>
                                                <small class="title">{{ $permission->description }}</small>
                                            </td>
                                            @foreach($roles as $role)
                                                <td>
                                                    <label class="checkbox">
                                                        {!!
                                                         Form::checkbox($permission->name.'|'.$role->name,
                                                         'true', isset($rolepermission[$permission->id][$role->id]) ? true : false )
                                                        !!}
                                                    </label>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="footer text-right">
                                <hr>
                                {!! Form::submit('Save', ['class' => 'btn btn-primary', 'style' => 'min-width: 200px']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection