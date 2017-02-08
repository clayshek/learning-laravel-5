<?php

namespace App;

class Comment extends Model
{

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()   //so grab this using $comment->user->name
    {
        return $this->belongsTo(User::class);
    }
}
