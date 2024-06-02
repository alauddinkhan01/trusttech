<?php

namespace App\Http\Controllers\Users;

use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitUserInfoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    // get user list by admin
    public function usersList(Request $request){
       
        return Inertia::render('Admin/Users/UserList');
    }

    public function getAllUsers(){
        return $allUsers = $this->userService->getAllUsers();
    }
    
}
