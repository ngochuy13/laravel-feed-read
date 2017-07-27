@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['method' => 'delete', 'route' => ['Permission.destroy', $permission->id]]) !!}
                    <div class="alert alert-danger">
                        <strong>Warning!</strong> You are about to delete a permission. This action cannot be undone. Are you
                        sure you
                        want to continue?
                    </div>
                    {!! Form::submit('Yes, delete this permission!', ['class' => 'btn btn-danger']) !!}

                    <a href="{{ route('Permission.index') }}" class="btn btn-success">
                        <strong>No, get me out of here!</strong>
                    </a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection