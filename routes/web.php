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
Route::post("/subscribe", function(){
	Newsletter::subscribeOrUpdate(request('email'));
	return back();
});

Route::get('/', 'FrontendController@index');
Route::get('/category/{category}/posts/{post?}', 'PostsController@show');
Route::get('/tag/{tag}', 'TagsController@index')->name('tag.index');
Route::get('/search', 'SearchController@get');
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/profile', 'ProfilesController@index')->name('profile');
	Route::patch('/profile', 'ProfilesController@update')->name('profile.update');

// ************* Admin Routes **************** //
	Route::group(['middleware' => 'admin'], function(){
		Route::resource('/categories', 'Admin\CategoriesController');
		Route::resource('/tags', 'Admin\TagsController');
		Route::resource('/users', 'Admin\UsersController');
		Route::patch('/users/{user}/admin', 'Admin\UsersController@admin')->name('users.admin');
		Route::get('/settings', 'Admin\SettingsController@index')->name('settings');
		Route::patch('/settings', 'Admin\SettingsController@update')->name('settings.update');
	});
// ************ Supervisor Routes ********** // 
	Route::resource('/posts', 'PostsController');
	Route::get('/posts/get/trashed', 'PostsController@trashed')->name('posts.trashed');
	Route::post('/posts/restore/{slug}', 'PostsController@restore')->name('posts.restore');
	Route::delete('/posts/kill/{slug}', 'PostsController@kill')->name('posts.kill');
});
