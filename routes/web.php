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
	Route::post('/post/editproject','PostController@updateProjectAdmin')->name('post.updateproject.admin')->middleware('auth:admin');
	Route::post('/post/destroyproject','PostController@destroyProjectAdmin')->name('post.destroyproject.admin')->middleware('auth:admin');
	Route::post('/post/createproject','PostController@createProjectAdmin')->name('post.createproject.admin')->middleware('auth:admin');
	//create project
	Route::get('/create','PostController@createproAdmin')->name('post.pro.admin')->middleware('auth:admin');

	 Route::get('/createadmin','PostController@createAdmin')->name('post.create.admin')->middleware('auth:admin');

	Route::post('/post/create','PostController@storeAdmin')->name('post.store.admin')->middleware('auth:admin');

	//comment
	Route::post('/post/{post}/comment','PostCommentController@storeAdmin')->name('post.comment.store.admin')->middleware('auth:admin');
	Route::post('/comment/destroy','PostCommentController@destroyAdmin')->name('post.comment.destroy.admin')->middleware('auth:admin');

	//Task
	Route::post('/post/{post}/addtask','PostController@taskAdmin')->name('post.task.admin')->middleware('auth:admin');
	Route::post('/post/task/store','PostController@taskstoreAdmin')->name('post.taskstore.admin')->middleware('auth:admin');
	Route::post('/post/adduserntask','PostController@addUserAdmin')->name('post.tasknuser.admin')->middleware('auth:admin');
	Route::post('/post/destroy','PostController@destroyTaskAdmin')->name('post.destroytask.admin')->middleware('auth:admin');
	Route::post('/post/edit','PostController@updateTaskAdmin')->name('post.updatetask.admin')->middleware('auth:admin');

	//notification
	Route::get('/notification','PostController@notificationAdmin')->name('post.notification.admin')->middleware('auth:admin');


});


//auth user
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');

Route::group(['prefix'=>'user'], function(){

	//profil
	Route::get('/profil','PostController@profilUser')->name('post.profil.user')->middleware('auth');
	Route::post('/update',"PostController@updateproUser")->name('update.user')->middleware('auth');

	//notification
	
	//portofolio
	Route::get('/portfolio','PostController@portfolio')->name('post.portfolio')->middleware('auth');

	//all project
	Route::get('/post','PostController@indexUser')->name('post.index.user')->middleware('auth');
	Route::get('/post/{post}','PostController@showUser')->name('post.show.user')->middleware('auth');

	//create comment
	Route::post('/post/{post}/comment','PostCommentController@storeUser')->name('post.comment.store.user')->middleware('auth');

	//calendar
	Route::get('/calendar','PostController@calendar')->name('post.calendar')->middleware('auth');

});

//auth skpd
	Route::get('/skpd','SkpdController@index')->name('skpd.home');
	Route::group(['prefix'=>'skpd'], function(){

		//login & logout
		Route::get('/login', 'AuthSkpd\LoginController@showLoginForm')->name('skpd.login');
		Route::post('/login', 'AuthSkpd\LoginController@login')->name('skpd.login.submit');
		Route::get('/logout','AuthSkpd\LoginController@logout')->name('skpd.logout');

		//register
		Route::get('/register', 'AuthSkpd\RegisterController@showRegistrationForm')->name('skpd.register');
		Route::post('/register', 'AuthSkpd\RegisterController@register')->name('skpd.register.submit');

		Route::get('/pengaduan', 'SkpdController@pengaduan')->name('pengaduan')->middleware('auth:skpd');
		Route::post('/postPengaduan', 'PostController@storePengaduan')->name('pengaduan.submit')->middleware('auth:skpd');
		Route::post('/postMail', 'MailController@post')->name('postmail')->middleware('auth:skpd');

	});
	


	Route::get('/taskshow','PostController@showtask')->name('post.showtask')->middleware('auth');

	Route::get('/tes/{id}','PostController@coba')->name('coba');
