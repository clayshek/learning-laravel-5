<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    //protected $guarded = [''];

    protected $fillable = ['user_id', 'title', 'body'] ;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()   //  $post->user  - or also - $comment->post->user
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
    }

    public static function archives() 
    {
        return static::selectRaw('extract(year from created_at) as year, 
            to_char (created_at, \'Mon\') as month, count(*)')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
