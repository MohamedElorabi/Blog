<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');


Route::get('/logout', 'SessionsController@destroy');

//Admin Routes
Route::group(['namespace' => 'Admin'],function(){
	Route::get('admin/home','HomeController@index')->name('admin.home');
	// Users Routes
	Route::resource('admin/user','UserController');
	// Roles Routes
	Route::resource('admin/role','RoleController');
	// Permission Routes
	Route::resource('admin/permission','PermissionController');
	// Post Routes
	Route::resource('admin/post','PostController');
	// Tag Routes
	Route::resource('admin/tag','TagController');
	// Category Routes
	Route::resource('admin/category','CategoryController');
	// Admin Auth Routes
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login', 'Auth\LoginController@login');
});


Route::get('/access-denied', 'PagesController@accessDenied');

Route::get('/statistics', 'PagesController@statistics');

Route::get('/index', 'PagesController@posts');

Route::get('/posts/{post}', 'PagesController@post');

// Admin
Route::group(['middleware' => 'roles', 'roles'=> ['Editor', 'Admin']], function() {
Route::get('/admin', function () {
    return view('admin.home');
});
});


// Users
Route::get('admin/users', 'UserController@index');
Route::get('admin/users/create', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('admin/users/{id}/edit', 'UserController@edit');
Route::resource('users', 'UserController');

// Categories
Route::get('admin/categories', 'CategoriesController@index');
Route::get('admin/categories/create', 'CategoriesController@create');
Route::post('/categories', 'CategoriesController@store');
Route::get('admin/categories/{id}/edit', 'CategoriesController@edit');
Route::resource('categories', 'CategoriesController');
// Posts
Route::group(['middleware' => 'roles', 'roles'=> ['Editor', 'Admin']], function() {
Route::get('admin/posts', 'PostsController@index');
Route::get('admin/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('admin/posts/{id}/edit', 'PostsController@edit');
});
// Comments
//Route::get('admin/comments', 'CommentsController@index');
Route::post('/posts/{post}/store', 'CommentsController@store');


//Route::resource('users', 'UserController');
