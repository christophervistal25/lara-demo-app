<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('posts', function () {
    $posts = Post::get();
    return view('post.index', compact('posts'));
});


Route::get('post/create', function () {
    return view('post.create');
});

Route::post('post/create', function (Request $request) {
    $validator = \Validator::make($request->all(), [
        'title' => 'required',
        'body' => 'required',
    ]);

    if($validator->fails()) {
        return back()->withErrors($validator);
    }

    Post::create([
        'title' => $request->title,
        'body' => $request->body,
    ]);

    return back()->with('success', 'Successfully create new post.');
});

Route::get('/post/{id}/edit', function ($id) {
    $post = Post::find($id);
    return view('post.edit', compact('post'));
});

Route::put('/post/{id}/edit', function (Request $request, $id) {

    $validator = \Validator::make($request->all(), [
        'title' => 'required',
        'body' => 'required',
    ]);

    if($validator->fails()) {
        return back()->withErrors($validator);
    }

    $post = Post::find($id);
    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();

    return back()->with('success', 'Post successfully update.');
});

Route::get('/post/{id}', function ($id) {
    $post = Post::find($id);
    return view('post.show', compact('post'));
});

Route::get('/post/{id}/delete', function ($id) {
    Post::find($id)->delete();
    return back()->with('success', 'Successfully delete a post.');

});


