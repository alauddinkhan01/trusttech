<?php
namespace App\Services;

use App\Models\User;
use App\Services\BaseService;
use App\Repositories\UserRepository;

class UserService extends BaseService {

    public $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }


    public function getAllUsers(){
        $userList = $this->userRepository->getAllUsers();
        return $this->sendResponse($userList);
    }

    public function getUserCount(){
        return $this->userRepository->getUserCount();
    }

}
