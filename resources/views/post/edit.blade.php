@extends('layouts.app')
@section('title', 'Post Records')
@section('content')
<div class="p-3">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
      </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </div>
    @endif


    <form action="/post/{{ $post->id }}/edit" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title</label>

            <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control"  rows="10">{{ $post->body }}</textarea>
        </div>

        <div class="form-group">
            <div class="float-right">
                <input type="submit" value="Update Post" class="btn btn-success">
            </div>
        </div>
    </form>
</div>
@endsection
