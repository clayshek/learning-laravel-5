    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="\">Root Home</a>
          <a class="nav-link" href="\blog">Blog Home</a>
          <a class="nav-link" href="https://mailtrap.io">Mailtrap.io</a>
          <a class="nav-link" href="#">About</a>
          <a class="nav-link" href="\blog\create">Create</a>
          @if (Auth::check())
            <a class="nav-link ml-auto" href='#'>{{ Auth::user()->name }} </a>
            @endif
        </nav>
      </div>
    </div>