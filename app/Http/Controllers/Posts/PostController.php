<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function postsList(){
        return Inertia::render('Posts/PostsList');
    }

    public function createPost(){
        $allTags = $this->postService->getAllTags();
        $allCategories = $this->postService->getAllCategories();
        return Inertia::render('Posts/CreateOrUpdatePost',compact('allTags','allCategories'));
    }

    public function createOrUpdate(Request $request){
        $this->postService->createOrUpdate($request);
        
        return redirect()->route('posts.list')->with('success','Post saved successfully');
    }

    public function getPost($id){
        $post =  $this->postService->getPost($id);
        if ($post) {
            $allTags = $this->postService->getAllTags();
            $allCategories = $this->postService->getAllCategories();
            return Inertia::render('Posts/CreateOrUpdatePost',compact('allTags','allCategories','post'));
        }else{
            return redirect()->route('posts.list')->with('error','Unauthorize Action');
        }
    }

    public function viewPost($id){
        $post =  $this->postService->getPost($id);
        if ($post) {
            return Inertia::render('Posts/ViewPost',compact('post'));
        }else{
            return redirect()->route('posts.list');
        }
    }

    public function getAllPosts(){
        return $this->postService->getAllPosts();
    }

    public function deletePost($id){
       $status = $this->postService->deletePost($id);
        if (!$status) {
            return redirect()->route('posts.list')->with('error','Unauthorize Action');
        }else{
            return redirect()->route('posts.list')->with('success','Post deleted successfully!');
        }
    }
}
