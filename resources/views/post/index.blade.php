@extends('layouts.app')
@section('title', 'Post Records')
@section('content')
<div class="p-3">

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
      </div>
    @endif

    <a class="btn btn-primary mb-2" href="/post/create">Create new post</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td class="text-center">
                    <a href="/post/{{ $post->id }}/edit" class="btn btn-success">EDIT</a>
                    <a href="/post/{{ $post->id }}" class="btn btn-info">SHOW</a>
                    <a href="/post/{{ $post->id }}/delete" class="btn btn-danger">DELETE</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-danger font-weight-bold">No available data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
