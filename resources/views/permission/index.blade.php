@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="title">Permission list</h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <a href="{{ route('Permission.create') }}" class="btn btn-info btn-fill btn-wd">Create Permission</a>
                                </div>
                            </div>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th width="20%">Machine name</th>
                                    <th width="20%">Permission name</th>
                                    <th width="35%">Permission desciption</th>
                                    <th width="12%">Edit</th>
                                    <th width="12%">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>
                                            <p>{{ $permission->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $permission->display_name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $permission->description }}</p>
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('Permission.edit', $permission->id) }}">
                                                <span class="ti-pencil"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('Permission.confirm', $permission->id) }}">
                                                <span class="ti-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                @include('partials.pagination', ['paginator' => $permissions])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection