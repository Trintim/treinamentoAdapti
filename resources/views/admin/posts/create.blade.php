@extends('template')

@section('content')
    
    <h1>Create new Post</h1>

    {!! Form::open(['route'=>'admin.posts.store', 'method'=>'post']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}<br>
        {!! Form::text('title', null, ['class'=>'form-control']) !!}<br>
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}<br>
        {!! Form::textarea('content', null, ['class'=>'form-control']) !!}<br>
    </div>

    <div class="form-group">
        
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}<br>

    </div>

    {!! Form::close() !!}

@endsection