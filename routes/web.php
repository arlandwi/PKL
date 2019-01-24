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

//auth admin
Route::get('/admin','AdminController@index')->name('admin.home');
Route::group(['prefix'=>'admin'], function(){

	//login & logout
	Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
	Route::get('/logout','AuthAdmin\LoginController@logout')->name('admin.logout');

	//profil
	Route::get('/profil','PostController@profilAdmin')->name('post.profil.admin')->middleware('auth:admin');
	Route::post('/update',"PostController@updateproAdmin")->name('update.admin')->middleware('auth:admin');
	Route::get('/member','PostController@memberAdmin')->name('post.member.admin')->middleware('auth:admin');
	Route::get('/member/{post}','PostController@show2Admin')->name('post.show2.admin')->middleware('auth:admin');
	Route::get('/member/{post}/edit2','PostController@edit2Admin')->name('post.edit2.admin')->middleware('auth:admin');
	Route::patch('/member/{post}/edit2','PostController@update2Admin')->name('post.update2.admin')->middleware('auth:admin');
	Route::delete('/member/{post}/delete2','PostController@destroy2Admin')->name('post.destroy2.admin')->middleware('auth:admin');

	//all project
	Route::get('/post','PostController@indexAdmin')->name('post.index.admin')->middleware('auth:admin');
	Route::get('/post/{post}/edit','PostController@editAdmin')->name('post.edit.admin')->middleware('auth:admin');
	Route::get('/post/{post}','PostController@showAdmin')->name('post.show.admin')->middleware('auth:admin');
	Route::patch('/post/{post}/edit','PostController@updateAdmin')->name('post.update.admin')->middleware('auth:admin');
	Route::delete('/post/{post}/delete','PostController@destroyAdmin')->name('post.destroy.admin')->middleware('auth:admin');

	//create project
	Route::get('/post/create','PostController@createAdmin')->name('post.create.admin')->middleware('auth:admin');
	Route::post('/post/create','PostController@storeAdmin')->name('post.store.admin')->middleware('auth:admin');

	//create comment
	Route::post('/post/{post}/comment','PostCommentController@storeAdmin')->name('post.comment.store.admin')->middleware('auth:admin');

	//Task
	Route::post('/post/{post}/addtask','PostController@taskAdmin')->name('post.task.admin')->middleware('auth:admin');
	Route::post('/post/task/store','PostController@taskstoreAdmin')->name('post.taskstore.admin')->middleware('auth:admin');


});


//auth user
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
Route::post('postMail', 'MailController@post')->name('postmail');

Route::group(['prefix'=>'user'], function(){

	//profil
	Route::get('/profil','PostController@profilUser')->name('post.profil.user')->middleware('auth');
	Route::post('/update',"PostController@updateproUser")->name('update.user')->middleware('auth');

	//notification
	Route::get('/notification','PostController@notification')->name('post.notification')->middleware('auth');

	//portofolio
	Route::get('/portfolio','PostController@portfolio')->name('post.portfolio')->middleware('auth');

<<<<<<< HEAD
	Route::post('/userntask/store',"PostController@userntaskstore")->name('userntaskstore')->middleware('auth');

	Route::get('/post/{post}','PostController@show')->name('post.show')->middleware('auth');
	Route::get('/member/{post}','PostController@show2')->name('post.show2')->middleware('auth');

	Route::post('/addusertask/{task}','PostController@userntask')->name('post.userntask')->middleware('auth');
	Route::post('/post/{post}/addtask','PostController@task')->name('post.task')->middleware('auth');
	Route::post('/post/task/store','PostController@taskstore')->name('post.taskstore')->middleware('auth');
=======
	//all project
	Route::get('/post','PostController@indexUser')->name('post.index.user')->middleware('auth');
	Route::get('/post/{post}','PostController@showUser')->name('post.show.user')->middleware('auth');

	//create comment
	Route::post('/post/{post}/comment','PostCommentController@storeUser')->name('post.comment.store.user')->middleware('auth');
>>>>>>> 26cde051bdb6cc07328b2cc3f514a5d2820206dc

	//calendar
	Route::get('/calendar','PostController@calendar')->name('post.calendar')->middleware('auth');

});
	
	Route::get('/calendar','PostController@calendar')->name('post.calendar')->middleware('auth');	
	Route::get('/taskshow','PostController@showtask')->name('post.showtask')->middleware('auth');


<<<<<<< HEAD
	Route::post('/post/{post}/comment','PostCommentController@store')->name('post.comment.store')->middleware('auth');
});

// // -------------------------------multirecordController----------------
// Route::get('/', array('as'=>'info','uses'=>'multirecordController@index'));
=======
>>>>>>> 26cde051bdb6cc07328b2cc3f514a5d2820206dc
