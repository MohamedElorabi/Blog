<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\DataTables\PostsDatatable;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(PostsDatatable $post)
     {
         return $post->render('admin.posts.index', ['title' => 'Show Posts']);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', ['title'=>trans('admin.create_post')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   $this->validate(request(),
    [
      'title'           => 'required',
      'description'     => 'required',
      'body'            => 'required',
      'url'             => 'required|image|mimes:jpg,jpeg,gif,png|max:2048',
      'user_id'         => 'required',
      'category_id'     => 'required',
    ], [], [
      'title'     => trans('admin.name'),
      'description'    => trans('admin.description'),
    ]);

        $img_name = time() . '.' . $request->url->getClientOriginalExtension();


        $post = new Post;

        $post->title        = request('title');
        $post->description  = request('description');
        $post->body         = request('body');
        $post->url          = $img_name;
      //  $post->view         = request('view');
        $post->user_id      = request('user_id');
        $post->category_id  = request('category_id');
        $post->save();
        $request->url->move(public_path('uploads'), $img_name);

    session()->flash('success', trans('admin.record_added'));
    return redirect('admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post  = Post::find($id);
      $title = trans('admin.post_edit');
      return view('admin.posts.edit', compact('post', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Post::find($id)->delete();
      session()->flash('success', trans(admin.deleted_record));
      return redirect('admin.posts.btn.delete');
    }
}
