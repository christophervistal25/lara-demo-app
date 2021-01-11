@extends('layouts.app')
@section('title', 'Post Records')
@section('content')
<div class="p-3">
        <div class="form-group">
            <label>Title</label>

            <input type="text" readonly class="form-control" name="title" placeholder="Enter title" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label>Body</label>
            <textarea name="body" readonly class="form-control"  rows="10">{{ $post->body }}</textarea>
        </div>

</div>
@endsection
