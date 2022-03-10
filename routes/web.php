<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommunityPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('communities', CommunityController::class);
    Route::resource('communities.posts', CommunityPostController::class);
    Route::resource('posts.comments', PostCommentController::class);
    Route::get('posts/{post_id}/vote/{vote}', [CommunityPostController::class, 'vote'])->name('post.vote');
});

