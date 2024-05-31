<?php

use App\Http\Controllers\Analytics\AnalyticsController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Can;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    "prefix" => "admin",
    "middleware" => ['auth','throttle:30,1']
], function () {
    Route::get('users-list',[UserController::class,'usersList'])->can('view.users')->name('users.list');
    Route::get('get-all-users',[UserController::class,'getAllUsers'])->can('view.users')->name('get.users.list');
});

Route::group([
    "prefix" => "post",
    "middleware" => ['auth','throttle:30,1']
], function () {
    Route::get('posts-list',[PostController::class,'postsList'])->name('posts.list');
    Route::get('create-post',[PostController::class,'createPost'])->name('create.post');
    Route::post('create-or-update-post',[PostController::class,'createOrUpdate'])->name('create.update.post');
    Route::get('view-post/{id}',[PostController::class,'viewPost'])->name('view.post');
    Route::get('get-post/{id}',[PostController::class,'getPost'])->name('get.post');
    Route::get('/get-all-posts', [PostController::class, 'getAllPosts'])->name('get.all.posts');
    Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('delete.post');
});

Route::get('get-analytics',[AnalyticsController::class,'getAlaytics'])->middleware('auth')->name('get.analytics');


require __DIR__.'/auth.php';
