<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Task;
use App\Pengaduan;
use App\UserAndTask;
use DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
	public function indexAdmin()
	{
		$posts = Post::latest()->paginate(3);

		return view('post.indexAdmin', compact('posts'));
	}

    public function indexUser()
    {
        $posts = Post::latest()->paginate(3);

        return view('post.indexUser', compact('posts'));
    }

    public function showtask()
    {
        $tasks = Task::latest()->paginate(3);

        return view('post.showtask', compact('tasks'));
    }
    public function calendar(){
        $posts = Post::all();

        return view('post.calendar', compact('posts'));
    }
	public function notificationAdmin(){
		$pengaduan = Pengaduan::orderBy('created_at', 'DESC')->get();

		return view('post.notification', compact('pengaduan'));
	}
    public function memberAdmin(){
        $posts = User::latest()->paginate(3);

        return view('post.memberAdmin', compact('posts'));
    }
	public function portfolio(){
		$posts = Post::latest()->paginate(3);
		return view('post.portfolio', compact('posts'));
	}
    public function profilAdmin(){
        $ulog = Auth::user();
        return view('post.profilAdmin', compact('ulog'));
    }

    public function profilUser(){
        $ulog = Auth::user();
        return view('post.profilUser', compact('ulog'));
    }

    public function updateproAdmin(Request $request){
      $updatee = \DB::table('admins')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success', 'Profil Berhasil Diubah');
    }

     public function updateproUser(Request $request){
      $updatee = \DB::table('admins')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success', 'Profil Berhasil Diubah');
    }

    public function createproAdmin()
    {
    	$categories = Category::all();
    	return view('post.createAdmin', compact('categories'));
    }

    public function storeAdmin()
    {
    	$this->validate(request(), [
    		'title' => 'required',
    		'content' => 'required|min:10'
    	]);

    	Post::create([
    		'title' => request('title'),
    		'slug' => str_slug(request('title')),
    		'content' => request('content'),
    		'category_id' => request('category_id')
    	]);

    	return redirect() -> route('post.index.admin')->with('success', 'Post Berhasil Ditambahkan');
    }

    public function addUserAdmin()
    {
        $this->validate(request(), [
            'user_id' => 'required',
            'task_id' => 'required'
        ]);

        UserAndTask::create([
            'user_id' => request('user_id'),
            'task_id' => request('task_id'),
        ]);

        return back()->with('success', 'Task Berhasil Ditambahkan');
    }

    public function taskstoreAdmin()
    {
        $this->validate(request(), [
            'judul_task' => 'required',
            'isi_task' => 'required|min:10',
            'tgl_mulai' => 'required',
            'deadline' => 'required'
        ]);

        Task::create([
            'post_id' => request('post_id'),
            'judul_task' => request('judul_task'),
            'tgl_mulai' => request('tgl_mulai'),
            'deadline' => request('deadline'),
            'slug' => str_slug(request('judul_task')),
            'isi_task' => request('isi_task')
        ]);

        return back()->with('success', 'Task Berhasil Ditambahkan');
    }

    public function showAdmin(Post $post)
    {
        $tasks = Task::All();
        $users = User::All();
        $tugas = DB::table('users')
            ->join('user_and_tasks', 'users.id', '=', 'user_and_tasks.user_id')
            ->join('tasks', 'tasks.id', '=', 'user_and_tasks.task_id')
            ->select('users.name')
            ->get();
    	return view('post.showAdmin', compact('post', 'tasks', 'users', 'tugas'));
    }

     public function showUser(Post $post)
    {
        return view('post.showUser', compact('post'));
    }

    public function show2Admin(User $post)
    {
        return view('post.show2Admin', compact('post'));
    }

    public function taskAdmin(Post $post)
    {
        $users = User::all();
        return view('post.taskAdmin', compact('users', 'post'));
    }

    public function editAdmin(Post $post)
    {
    	$categories = Category::all();

    	return view('post.editAdmin', compact('post', 'categories'));
    }

    public function updateAdmin(Post $post)
    {
    	$post->update([
    		'title' => request('title'),
    		'category_id' => request('category_id'),
    		'content' => request ('content'),
    	]);

    	return redirect()->route('post.index.admin')->with('info', 'Post Berhasil Diubah');
    }

    public function edit2Admin(User $post)
    {

        return view('post.edit2Admin', compact('post'));
    }

    public function update2Admin(User $post)
    {
        $post->update([
            'name' => request('name'),
            'email' => request('email'),
        ]);

        return redirect()->route('post.member.admin')->with('info', 'Post Berhasil Diubah');
    }

    public function edit3(User $post)
    {
        $post = User::all();
        return view('post.edit3', compact('post'));
    }

    public function destroyAdmin(Post $post)
    {
    	$post->delete();

    	return redirect()->route('post.index.admin')->with('danger', 'Post Berhasil Dihapus');
    }

    public function destroy2Admin(User $post)
    {
        $post->delete();

        return redirect()->route('post.member.admin')->with('danger', 'Post Berhasil Dihapus');
    }

    public function storePengaduan()
    {
         $this->validate(request(), [
            'subject' => 'required',
            'lokasi' => 'required',
            'isi' => 'required',
        ]);

        $skpd = Auth::user()->id;

        Pengaduan::create([
            'skpd_id' => $skpd,
            'subject' => request('subject'),
            'lokasi' => request('lokasi'),
            'isi' => request('isi')
        ]);

        return back()->with('success', 'Pengaduan berhasil dikirim');
    }
}
