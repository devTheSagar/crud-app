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
        // validation 
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string|max:10000',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB limit
        ],[
            'title.required'        => '<-- Title is required.',
            'title.max'             => '<-- Title should be in 255 characters',
            'description.required'  => '<-- Description is required.',
            'description.max'       => '<-- Description should be in 10,000 characters'
        ]);

        Post::addPost($request);
        flash()->success('Post created successfully!');
        return back();
    }

    function view(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('post.view', ['posts' => $posts]);
    }

    function edit(String $id){
        $post = Post::find($id);
        return view('post.edit', ['post' => $post]);
    }

    function update(Request $request, String $id){
        // validation 
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string|max:10000',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB limit
        ],[
            'title.required'        => '<-- Title is required.',
            'title.max'             => '<-- Title should be in 255 characters',
            'description.required'  => '<-- Description is required.',
            'description.max'       => '<-- Description should be in 10,000 characters'
        ]);

        Post::updatePost($request, $id);
        flash()->success('Post updated successfully!');
        return redirect(route('post.view'));
    }

    function delete(String $id){
        Post::deletePost($id);
        flash()->info('Post deleted successfully!');
        return back();
    }
  
}
