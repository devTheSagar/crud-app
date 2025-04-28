<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        return view('post.index');
    }

    function insert(Request $request){
        Post::addPost($request);
        return back()->with('success', 'Post added successfully!');
    }

    function view(){
        $posts = Post::all();
        return view('post.view', ['posts' => $posts]);
    }

    function edit(String $id){
        $post = Post::find($id);
        return view('post.edit', ['post' => $post]);
    }

    function update(Request $request, String $id){
        Post::updatePost($request, $id);
        return redirect(route('post.view'))->with('success', 'Post updated successfully!');
    }

    function delete(String $id){
        Post::deletePost($id);
        return back()->with('success', 'post deleted successfully!');
    }

  
}
