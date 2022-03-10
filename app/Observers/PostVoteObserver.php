<?php

namespace App\Observers;

use App\Models\PostVote;

class PostVoteObserver
{
    public function created(PostVote $postVote)
    {
        $postVote->post()->increment('votes', $postVote->vote);
    }

}
