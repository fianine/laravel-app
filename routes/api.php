<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSubscriptionController;
use App\Http\Controllers\WebsiteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 * User API
 */
Route::get('users', [UserController::class])->name('users.index');
Route::get('user/{userId}', [UserController::class, 'show'])->name('users.show');

/**
 * Website API
 */
Route::get('websites', [WebsiteController::class, 'index'])->name('websites.index');
Route::get('website/{websiteId}', [WebsiteController::class, 'show'])->name('websites.show');

/**
 * User Subscription API
 */
Route::post('userSubscription', [UserSubscriptionController::class, 'sub'])
    ->name('user.subscription');

/**
 * Post API
 */
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('post/{postId}', [PostController::class, 'show'])->name('posts.show');
Route::get('post/byWebsite/{websiteId}', [PostController::class, 'byWebiste'])
    ->name('post.byWebsite');
Route::post('post', [PostController::class, 'post'])->name('post');

