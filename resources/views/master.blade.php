@include('layouts.header')

@include('layouts.navbar')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Clean Blog</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
          </div>
        </div>
      </div>
    </header>

@foreach ($posts as $post)
<div class="text-center">
    <h3>
           <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>

    </h3>
    <span>{{ $post->description }}</span>
    <p><span class="glyphicon glyphicon-time"></span>

        Posted on {{ $post->created_at}} - <strong>Category:</strong>

        <a href="../category/{{ $post->category->name}}">
            {{ $post->category->name}}
        </a>
        <span class="fa fa-eye">0</span>
    </p>

</div>

@endforeach

          <hr>
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-left" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>

    @include('layouts.footer')
