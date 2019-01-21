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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('postMail', 'MailController@post')->name('postmail');

Route::middleware('auth')->group(function(){
	Route::get('/post','PostController@index')->name('post.index')->middleware('auth');
	Route::get('/calendar','PostController@calendar')->name('post.calendar')->middleware('auth');
	Route::get('/notification','PostController@notification')->name('post.notification')->middleware('auth');
	Route::get('/portfolio','PostController@portfolio')->name('post.portfolio')->middleware('auth');
	Route::get('/member','PostController@member')->name('post.member')->middleware('auth');
	Route::get('/profil','PostController@profil')->name('post.profil')->middleware('auth');
	Route::post('/update',"PostController@updatepro")->name('update')->middleware('auth');
	Route::get('/post/create','PostController@create')->name('post.create')->middleware('auth');
	Route::post('/post/create','PostController@store')->name('post.store')->middleware('auth');

	Route::get('/post/{post}','PostController@show')->name('post.show')->middleware('auth');
	Route::get('/member/{post}','PostController@show2')->name('post.show2')->middleware('auth');

	Route::get('/taskshow','PostController@showtask')->name('post.showtask')->middleware('auth');
	Route::post('/post/{post}/addtask','PostController@task')->name('post.task')->middleware('auth');
	Route::post('/post/task/store','PostController@taskstore')->name('post.taskstore')->middleware('auth');

	Route::get('/post/{post}/edit','PostController@edit')->name('post.edit')->middleware('auth');
	Route::get('/member/{post}/edit2','PostController@edit2')->name('post.edit2')->middleware('auth');
	Route::get('/profil/edit3','PostController@edit3')->name('post.edit3')->middleware('auth');

	Route::patch('/post/{post}/edit','PostController@update')->name('post.update')->middleware('auth');
	Route::patch('/member/{post}/edit2','PostController@update2')->name('post.update2')->middleware('auth');
	Route::patch('/member/{post}/edit3','PostController@update3')->name('post.update3')->middleware('auth');

	Route::delete('/post/{post}/delete','PostController@destroy')->name('post.destroy')->middleware('auth');
	Route::delete('/member/{post}/delete2','PostController@destroy2')->name('post.destroy2')->middleware('auth');

	Route::post('/post/{post}/comment','PostCommentController@store')->name('post.comment.store')->middleware('auth');
});
