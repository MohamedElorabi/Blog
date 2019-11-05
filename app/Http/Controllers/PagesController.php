<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PagesController extends Controller
{
  public function posts()
  {
     $posts = Post::all();

    return view('master', compact('posts'));
  }

  public function post(Post $post)
    {
    	return view('post', compact('post'));
    }


    public function editor()
    {

        return view('admin.posts.create');

    }
}
