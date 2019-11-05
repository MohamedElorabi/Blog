<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\DataTables\UserDatatable;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(UserDatatable $user)
     {
         return $user->render('admin.users.index', ['title' => 'User Controller']);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('admin.users.create', ['title' => trans('admin.user_add')]);
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
      'email'    => 'required|email|unique:users',
      'password' => 'required|min:6',
    ], [], [
      'name'     => trans('admin.name'),
      'email'    => trans('admin.email'),
      'password' => trans('admin.password'),
    ]);
    $data['password'] = bcrypt(request('password'));
    User::create($data);
    session()->flash('success', trans('admin.record_added'));
    return redirect('admin/users');
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
      $user  = User::find($id);
      $title = trans('admin.user_edit');
      return view('admin.users.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
      $data = $this->validate(request(),
    [
      'name'     => 'required',
      'email'    => 'required|email|unique:users,email,'.$id,
      'password' => 'sometimes|nullable|min:6'
    ], [], [
      'name'     => trans('admin.user_name'),
      'email'    => trans('admin.user_email'),
      'password' => trans('admin.user_password'),
    ]);
  if (request()->has('password')) {
    $data['password'] = bcrypt(request('password'));
  }
  User::where('id', $id)->update($data);
  session()->flash('success', trans('admin.updated_record'));
  return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
   		User::find($id)->delete();
   		session()->flash('success', trans('admin.deleted_record'));
   		return redirect('users');
 	}

}
