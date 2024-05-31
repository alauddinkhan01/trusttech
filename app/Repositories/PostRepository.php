<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class PostRepository extends BaseRepository
{
    public function createUniqueSlug($title)
    {
        // Generate a unique slug
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        // Ensure the slug is unique
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function getUserPost($id){
        return Post::where('id',$id)->where('user_id',Auth::user()->id)->first();
    }

    public function getUserPosts(){
        return Post::with('category')->where('user_id',Auth::user()->id)->paginate(6);
    }

    public function getAllposts(){
        return Post::with('category')->paginate(6);
    }

    public function getPostCount(){
        if (Auth::user()->hasRole('user')) {
            return Post::where('user_id',Auth::user()->id)->count();
        }if (Auth::user()->hasRole('admin')) {
           return Post::count();
        }
    }

    public function deletePost($id){
        if (Auth::user()->hasRole('user')) {
            return Post::where('id',$id)->where('user_id',Auth::user()->id)->delete();
        }if (Auth::user()->hasRole('admin')) {
           return Post::find($id)->delete();
        }
    }
}
