<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\CategoriesDatatable;
use App\Category;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesDatatable $category)
    {
        return $category->render('admin.categories.index', ['title' => 'Categories Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', ['title' => trans('create.Categories')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
      $data = $this->validate(request(),
    [
      'name'     => 'required',
      'discription'    => 'required',

    ], [], [
      'name'     => trans('admin.name'),
      'discription'    => trans('admin.email'),
    ]);

    Category::create($data);
    session()->flash('success', trans('admin.record_added'));
    return redirect('admin/categories');
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
      $category  = Category::find($id);
      $title = trans('category.edit');
      return view('admin.categories.edit', compact('category', 'title'));
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
      $data = $this->validate(request(),
    [
      'name'            => 'required',
      'discription'     => 'required',
    ], [], [
      'name'            => trans('admin.categories_name'),
      'description'     => trans('admin.categories_description'),
    ]);
  Category::where('id', $id)->update($data);
  session()->flash('success', trans('admin.updated_record'));
  return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Category::find($id)->delete();
      session()->flash('success', trans(admin.deleted_record));
      return redirect('admin.categories.btn.delete');
    }
}
