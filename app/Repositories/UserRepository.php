<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\UserDetail;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository{


    public function getAllUsers(){
        return User::whereHas('roles', function($query) {
            $query->where('name','user');
        })->paginate(6);
    }
    public function userDetailsList($request, $perPage = 10){
        $perPage = $perPage;
        if ($request->per_page) {
            $perPage = $request->per_page;
        }
       return UserDetail::when($request->search, function($query) use ($request) {
        $query->where('first_name', 'like', '%' .$request->search. '%')
        ->orWhere('last_name', 'like', '%'. $request->search. '%')
        ->orWhere('email', 'like', '%'. $request->search. '%')
        ->orWhere('phone', 'like', '%'. $request->search. '%')
        ->orWhere('job_title', 'like', '%'. $request->search. '%')
        ->orWhere('nationality', 'like', '%'. $request->search. '%')
        ->orWhere('driving_license', 'like', '%'. $request->search. '%');
       })
       ->orderBy('created_at','desc')->paginate($perPage);
    }


    // delete user details
    public function deleteUserInfo($id){
        return UserDetail::find($id)->delete();
    }

    public function getUserCount(){
        return User::whereHas('roles', function($query) {
            $query->where('name', 'user');
        })->count();
    }
    
}