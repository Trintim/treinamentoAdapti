@extends('template')

@section('content')
    
    <h1>Create new Post</h1>

    @if($errors->any())
        
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    @endif

    {!! Form::open(['route'=>'admin.posts.create', 'method'=>'post']) !!}

    @include('admin.posts._form')

    <div class="form-group">
        {!! Form::label('tags', 'Tags:', ['class'=>'control-label']) !!}<br>
        {!! Form::textarea('tags', null, ['class'=> 'form-control']) !!}<br>
        
    </div>

    <div class="form-group">
        
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}<br>

    </div>

    {!! Form::close() !!}

@endsection