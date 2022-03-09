<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{


    public function store(Request $request, Post $post)
    {
        $post->load('community');
        $post->comments()->create([
            'user_id' => auth()->id(),
            'comment_text' => $request->comment_text
        ]);
        return redirect()->route('communities.posts.show', [$post->community, $post]);

    }

    public function show(Community $community, Post $post)
    {
        $post->load('comments.user');

        return view('posts.show', compact('community', 'post'));
    }
}
