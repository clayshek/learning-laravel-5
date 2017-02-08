@extends('layouts.blog.master')

@section ('content')

        <div class="col-sm-8 blog-main">

         @include ('blog.post')

         <hr>

         <div class="comments">

         <ul class="list-group">
          @foreach ($post->comments as $comment)
            <li class="list-group-item">
            <strong>
              {{ $comment->created_at->diffForHumans() }}: &nbsp;
            </strong>
              {{ $comment->body }}
            </li>
            @endforeach
            </ul>

          </div>

<hr>

        <div class="card">
          <div class="card-block">
            <form method="POST" action="/blog/{{ $post->id }}/comments">
              {{ csrf_field() }}
              <div class="form-group">
                <textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
                </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
          </div>
        </div>
@include ('layouts.errors')
        </div><!-- /.blog-main -->

@endsection