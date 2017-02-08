<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\BlogPosted;

// Carbon used for date conversions below
use Carbon\Carbon;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = \App\Post::latest();

        if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);  //this converts month name to number
        }

        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();

       // $archives = \App\Post::archives();


        return view('blog.index', compact('posts'));
        //alternate way of writing could be return view('blog/index')
    }

    public function show(\App\Post $post)
    {
        return view('blog.show', compact('post'));
    }
// Above is example of 'Route Model Binding', which pushes some of the work to Laravel
// Passed variable name (here $post) has to match variable in corresponding Route in web.php
// Below is another way of accomplishing this.
/*
    public function show($id)
    {
        $post = \App\Post::find($id);

        return view('blog.show', compact('post'));
    }
*/
    public function create()
    {
        return view('blog.create');
    }  

    public function store()
    {

        //dd(request(['title', 'body']));

        //Validate request data
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        //Create new post using request data *
/*      \App\Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
*/

        //Above doesn't require custom method in User class
        //Below here's another one-liner option, possible by adding a new method ( publish() ) to User class:
        auth()->user()->publish( new \App\Post(request(['title','body'])) );

        //Below examples explicitly create a post object and assign variables. More typing, 
        //but no additional setup. For one-liners above, requires whitelisting or blacklisting specific
        //variables using 'fillable' or 'guarded' in Model file (see \app\Post.php)

        //$post = new \App\Post;
        //$post->title = request('title');
        //$post->body = request('body');

        //Save it to the database

        //$post->save();


        // Send email upon blog post. Up top, use App\Mail\BlogPosted, which is created by 
        // php artisan make:mail BlogPosted

        \Mail::to(auth()->user()->email)->send(new BlogPosted(auth()->user()));

        //And then redirect to the home page

        return redirect('/blog');
    }
}
