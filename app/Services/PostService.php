<?php
namespace App\Services;

use App\Mail\PostMail;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Services\BaseService;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostService extends BaseService {

    public $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function getAllCategories(){
        return $this->postRepository->all(new Category());
    }

    public function getAllTags(){
        return $this->postRepository->all(new Tag());
    }

    public function createOrUpdate($request){

        $data= [];
        $filePath = '';
        $slug = '';

        // store file
        if ($request->hasFile('image')) {
            $filePath = $this->storeFile($request->image,'posts');
            $data['image'] = $filePath;
            
        }
        
        // create unique slug
        $slug = $this->postRepository->createUniqueSlug($request->title);

        if (!$request->id) {
            $data['user_id'] = Auth::user()->id;
        }
        
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['tag_ids'] = array_map('intval', $request->tag_ids);
        $data['description'] = $request->description;
        $data['slug'] = $slug;


        $post =  $this->postRepository->updateOrCreate(new Post(),$data,'id',$request->id);
        $admin = User::whereHas('roles',function($query) {
            $query->where('name','admin');
        })->first('email');
        $adminEmail = $admin->email;

        // Send email while createing a post
        if (!$request->id) {
            Mail::to($adminEmail)->send(new PostMail(Auth::user()->name));
        }

        return $post;
        
    }

    public function getPost($id){
        
        $user = Auth::user();
        if($user->hasRole('user')){
           $post = $this->postRepository->getUserPost($id);
           if ($post) {
            return $post->load('user');
           }else{
            return false;
           }
        }elseif($user->hasRole('admin')){
           $post = $this->postRepository->find(new Post(), $id);
           if ($post) {
            return $post->load('user');
           }else{
            return false;
           }

        }
    }

    public function getAllPosts(){
        
        $user = Auth::user();

        if($user->hasRole('user')){

           $posts =  $this->postRepository->getUserPosts();
           return $this->sendResponse($posts);

        }elseif($user->hasRole('admin')){

           $posts = $this->postRepository->getAllposts();
           return $this->sendResponse($posts);

        }

    }

    public function getPostCount(){
       return $this->postRepository->getPostCount();
    }

    public function deletePost($id){
       return $this->postRepository->deletePost($id);
    }

}