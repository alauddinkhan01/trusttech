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
        // $request['request_type'] = 'adminDashboard';
        // $userDetailsList = $this->userService->userDetailsList($request);
        // $search = $request->search;
        // return view('admin_dashboard.ContactList',compact('userDetailsList','search'));
    }

    public function getAllUsers(){
        return $allUsers = $this->userService->getAllUsers();
    }
    // // get admin list
    // public function addContact(Request $request){

    //     // get cities
    //     $request['model'] ='City';
    //     $cities = $this->userService->getConfiguration($request);
        
    //     // get countries
    //     $request['model'] ='Country';
    //     $countries = $this->userService->getConfiguration($request);

    //     // get skills
    //     $request['model'] ='Skill';
    //     $skills = $this->userService->getConfiguration($request);

    //     return view('admin_dashboard.AddContact',compact('cities','countries','skills'));
    // }

    // // store user data
    // public function storeUserInfo(SubmitUserInfoRequest $request){

    //     $request['user_id'] = Auth::user()->id;

    //     if ($request->skillIds) {
    //         if (count($request->skillIds) > 0) {
    //             $request['skillIds'] = array_map('intval',  $request->skillIds) ;
    //         }
    //     }

    //     return $this->userService->storeUserInfo($request);
    // }

    // // delete user data
    // public function deleteUserInfo($id){
    //    return $this->userService->deleteUserInfo($id);
    // }
}
