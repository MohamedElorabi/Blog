<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="post.html">Sample Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
        @if(Auth::check())

                @if(Auth::user()->hasRole('Admin'))
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Admin</a>
                </li>
                @endif

                @if(Auth::user()->hasRole('Editor'))
                <li class="nav-item">
                    <a class="nav-link" href="admin/posts">Create Post</a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link">Welcome: {{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                @endif
      </ul>
    </div>
  </div>
</nav>
