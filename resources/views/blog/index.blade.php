@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Search Blog</h4>
                        </div>
                        <div class="content">
                            <div class="row form-group">
                                {!! Form::open(['route' => 'Blog.index', 'novalidate' => '']) !!}
                                <div class="col-md-3 text-right">
                                    {!! Form::label('Category') !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::text('category', null, ['class' => 'form-control border-input']) !!}
                                </div>
                                <div class="col-md-3">
                                    <button style="min-width: 100%;" class="btn btn-success" type="submit">Search</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="title">List Blog</h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <a class="btn btn-info btn-fill btn-wd" href="{{ route('Blog.create') }}">Create Blog</a>
                                </div>
                            </div>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <!-- <th>Description</th> -->
                                    <!-- <th>Link</th> -->
                                    <th>Category</th>
                                    <th>Comments</th>
                                    <th>PubDate</th>
                                    <th>Action</th>
                                </tr></thead>
                                @if($blogs)
                                    <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td><a href="{{ route('Blog.detail', ['id' => $blog->id]) }}">{{ $blog->id }}</a></td>
                                            <td><a href="{{ route('Blog.detail', ['id' => $blog->id]) }}">{{ $blog->title }}</a></td>
                                            <!-- <td>{{ $blog->description }}</td> -->
                                            <!-- <td>{{ $blog->link }}</td> -->
                                            <td>{{ $blog->category }}</td>
                                            <td>{{ $blog->comments }}</td>
                                            <td>{{ date('d-m-Y', strtotime($blog->pubDate)) }}</td>
                                            <td><a href="{{ route('Blog.detail', ['id' => $blog->id]) }}"><span class="ti-arrow-circle-right"></span></a>
                                            <a href="{{ route('Blog.delete', ['id' => $blog->id]) }}"><span class="ti-trash text-red"></span></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @endif
                            </table>
                            @include('partials.pagination', ['paginator' => $blogs])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
