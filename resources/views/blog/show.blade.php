@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Detail Blog: <strong>#{{$blog['id']}}</strong></h4>
                        </div>
                        <div class="content">
                            {!! Form::open(['route' => 'Blog.update', 'id' => 'form-update']) !!}
                            <div class="clearfix"></div>

                            <div class="row">
                                <div class="form-group col-md-12{{ $errors->has('title') ? ' has-error' : '' }}">
                                    {!! Form::label('title') !!}
                                    {!! Form::text('title', $blog['title'], ['class' => 'form-control border-input', 'placeholder' => 'title', 'required'=> '']) !!}
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('description') ? ' has-error' : '' }}">
                                    {!! Form::label('description') !!}
                                    {!! Form::textarea('description', $blog['description'], ['class' => 'form-control border-input', 'placeholder' => 'description', 'required'=> '']) !!}
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('link') ? ' has-error' : '' }}">
                                    {!! Form::label('link') !!}
                                    {!! Form::text('link', $blog['link'], ['class' => 'form-control border-input', 'placeholder' => 'link', 'required'=> '']) !!}
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('category') ? ' has-error' : '' }}">
                                    {!! Form::label('category') !!}
                                    {!! Form::text('category', $blog['category'], ['class' => 'form-control border-input', 'placeholder' => 'category', 'required'=> '']) !!}
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('comments') ? ' has-error' : '' }}">
                                    {!! Form::label('comments') !!}
                                    {!! Form::text('comments', $blog['comments'], ['class' => 'form-control border-input', 'placeholder' => 'comments', 'required'=> '']) !!}
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('pubDate') ? ' has-error' : '' }}">
                                    {!! Form::label('pubDate') !!}
                                    {!! Form::text('pubDate', $blog['pubDate'], ['class' => 'form-control border-input', 'placeholder' => 'pubDate', 'required'=> '']) !!}
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update</button>
                            </div>
                            <div class="clearfix"></div>
                            {!! Form::hidden('id', $blog['id']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
