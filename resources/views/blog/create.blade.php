@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Create Blog</h4>
                        </div>
                        <div class="content">
                            {!! Form::open(['route' => 'Blog.create', 'id' => 'form-create']) !!}
                            <div class="clearfix"></div>

                            <div class="row">
                                <div class="form-group col-md-12{{ $errors->has('title') ? ' has-error' : '' }}">
                                    {!! Form::label('title') !!}
                                    {!! Form::text('title', null, ['class' => 'form-control border-input', 'placeholder' => 'title', 'required'=> '']) !!}
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('description') ? ' has-error' : '' }}">
                                    {!! Form::label('description') !!}
                                    {!! Form::textarea('description', null, ['class' => 'form-control border-input', 'placeholder' => 'description', 'required'=> '']) !!}
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('link') ? ' has-error' : '' }}">
                                    {!! Form::label('link') !!}
                                    {!! Form::text('link', null, ['class' => 'form-control border-input', 'placeholder' => 'link', 'required'=> '']) !!}
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('category') ? ' has-error' : '' }}">
                                    {!! Form::label('category') !!}
                                    {!! Form::text('category', null, ['class' => 'form-control border-input', 'placeholder' => 'category', 'required'=> '']) !!}
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('comments') ? ' has-error' : '' }}">
                                    {!! Form::label('comments') !!}
                                    {!! Form::text('comments', null, ['class' => 'form-control border-input', 'placeholder' => 'comments', 'required'=> '']) !!}
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('pubDate') ? ' has-error' : '' }}">
                                    {!! Form::label('pubDate') !!}
                                    {!! Form::date('pubDate', \Carbon\Carbon::now(), ['class' => 'form-control border-input', 'placeholder' => 'pubDate', 'required'=> '']) !!}
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Create</button>
                            </div>
                            <div class="clearfix"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
