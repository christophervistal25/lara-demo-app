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


    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label>Title</label>

            <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control"  rows="10">{{ old('body') }}</textarea>
        </div>

        <div class="form-group">
            <div class="float-right">
                <input type="submit" value="Add new post" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
@endsection
