<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommunityPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);

// for automated testing
//Route::get('c/{slug}',
//    [CommunityController::class, 'show'])
//    ->name('communities.show');
//
//Route::get('p/{postId}',
//    [CommunityPostController::class, 'show'])
//    ->name('communities.posts.show');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('communities', CommunityController::class);
    Route::resource('communities.posts', CommunityPostController::class);
    Route::resource('posts.comments', PostCommentController::class);
    Route::get('posts/{post_id}/vote/{vote}', [CommunityPostController::class, 'vote'])->name('post.vote');
    Route::post('posts/{post_id}/report', [CommunityPostController::class, 'report'])->name('post.report');

});

