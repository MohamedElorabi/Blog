@include('layouts.header')

@include('layouts.navbar')

<!-- Page Header -->
<header class="masthead" style="background-image: url('../uploads/{{ $post->url }}')">

  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h2>{{ $post->title }}</h2>
          <span class="subheading">{{ $post->description }}</span>
        </div>
      </div>
    </div>
  </div>
</header>


<div class="text-center">

    <p>{!!html_entity_decode($post->body)!!}</p>
    <p><span class="glyphicon glyphicon-time"></span>

        Posted on {{ $post->created_at}} - <strong>Category:</strong>

        <a href="../category/{{ $post->category->name}}">
            {{ $post->category->name}}
        </a>
    </p>
    <br>

    <div class="comments">

        @foreach ($post->comments as $comment)


            <div class="comment">
                <p class="comment-time">
                    <span class="glyphicon glyphicon-time"></span>
                    {{ $comment->created_at->diffForHumans() }}
                </p>
                <p class="comment-text">{{ $comment->body }}</p>
            </div>


        @endforeach

    </div>

    <br>



    <form method="POST" action="/posts/{{ $post->id }}/store">
        {{ csrf_field() }}


        <div class="form-group">
            <label for="body">Write Something . . .</label>
            <textarea name="body" id="body" class="form-control"></textarea>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </div>

    </form>



</div>
@include('layouts.footer')
