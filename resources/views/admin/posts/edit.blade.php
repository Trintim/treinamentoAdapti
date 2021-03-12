@extends('template')

@section('title')
Blog Trin Admir
@stop

@section('content')
<h1>Edit Post</h1>

@if($errors->any())
<ul class="alert">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

{!! Form::model($post, ['route'=>['admin.posts.update', $post->id], 'method'=>'put']) !!}

@include('admin.posts._form')

<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}<br>
    {!! Form::text('tags', $post->TagList, ['class' => 'form-control']) !!}<br>
</div>

<div class="form-group">
    {!! Form::submit('save', ['class'=>'btn btn-primary']) !!}<br>
</div>

{!! Form::close() !!}
@stop
