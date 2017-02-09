<?php

namespace App\Listeners;

use App\Events\BlogCommentPosted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyBlogAuthor
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BlogCommentPosted  $event
     * @return void
     */
    public function handle(BlogCommentPosted $event)
    {
        var_dump($event->comment['body'] . ' was posted on your blog.');
    }
}
