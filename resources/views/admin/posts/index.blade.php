@extends('template')

@section('title')
Blog Trin Admir
@stop

@section('content')
<h1>Blog Trin</h1>

<a href="{{ route('admin.posts.create') }}"><button type="button" class="btn btn-success">New Post</button></a>

<table class="table">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Action</th>
    </tr>

    @foreach($posts as $post)
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>
            <a href="{{ route('admin.posts.edit', ['id'=>$post->id]) }}"><button type="button" class="btn btn-info">Edit</button></a>
            <a href="{{ route('admin.posts.destroy', ['id'=>$post->id]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
    </tr>
    @endforeach

</table>

{!! $posts->render() !!}

@stop
