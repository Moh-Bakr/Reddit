<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('community')->withCount(['postVotes' => function ($query) {
            $query->where('post_votes.created_at', '>', now()->subDecade(1))
                ->where('vote', 1);
        }])->orderBy('post_votes_count', 'desc')->take(10)->get();

        return view('home', compact('posts'));
    }
}
