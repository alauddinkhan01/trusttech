<?php

namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public $userService;
    public $postService;

    public function __construct(PostService $postService, UserService $userService)
    {
        $this->postService = $postService;
        $this->userService = $userService;
    }

    public function getAlaytics(){
        $userCount = $this->userService->getUserCount();
        $postCount = $this->postService->getPostCount();
        return response()->json([
            'success' => true,
            'user_count' => max($userCount, 0),
            'posts_count' => max($postCount, 0),
        ]);    }
}
