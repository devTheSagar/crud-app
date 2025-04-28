<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    private static $post, $image, $imageName, $directory;

    public static function imageUpload($request){

        if($request->hasFile('image')){
            self::$image = $request->image;
            self::$imageName = time() . '_' . self::$image->getClientOriginalName();
            self::$directory = 'uploads/post-images/';
            self::$image->move(self::$directory, self::$imageName);
            return self::$directory . self::$imageName;
        }else{
            return 'uploads/post-images/default_post_image.jpg';
        }
        
    }

    public static function addPost($request){
        self::$post                 = new Post();
        self::$post->title          = $request->title;
        self::$post->description    = $request->description;
        self::$post->image          = self::imageUpload($request);
        self::$post->save();
    }

    public static function updatePost($request, $id){
        self::$post = Post::find($id);
        self::$post->title = $request->title;
        self::$post->description = $request->description;
        // self::$post->image = $request->image;
        if($request->file('image')){
            if(self::$post->image !== 'uploads/post-images/default_post_image.jpg' && file_exists(self::$post->image)){
                unlink(self::$post->image);
            }
            self::$post->image = self::imageUpload($request);
        }
        self::$post->save();
    }

    public static function deletePost($id){
        self::$post = Post::find($id);
        if(self::$post->image !== 'uploads/post-images/default_post_image.jpg' && file_exists(self::$post->image)){
            unlink(self::$post->image);
        }
        self::$post->delete();
    }
}
