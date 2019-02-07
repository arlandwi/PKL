<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Task;
use App\Pengaduan;
use DB;
use Calendar;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
	public function indexAdmin(Request $request)
	{
        $categories = Category::all();

        if ($request->input('filter') === null) {
            $posts = Post::all();
            $fill = "";          
        }
        elseif ($request->input('filter') === 'Terbaru') {
            $posts = Post::orderBy('created_at', 'DESC')->get();
            $fill = "Sort By Terbaru";
        }elseif ($request->input('filter') === 'Terlama') {
            $posts = Post::orderBy('created_at', 'ASC')->get();
            $fill = "Sort By Terlama";
        }

		return view('post.indexAdmin', compact('posts','categories','fill'));
	}

    public function indexUser()
    {
        $posts = Post::latest()->paginate(3);
        return view('post.indexUser', compact('posts','calendar_details'));
    }

    public function showtask()
    {
        $tasks = Task::latest()->paginate(3);

        return view('post.showtask', compact('tasks'));
    }
    public function calendar(){
       $events = Task::get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->judul_task,
                true,
                new \DateTime($event->tgl_mulai),
                new \DateTime($event->deadline.' +1 day')
            );
        } 
        $calendar_details = Calendar::addEvents($event_list); 
 
        return view('post.calendar', compact('calendar_details') );
    }
	public function notificationAdmin(Request $request){
        if ($request->input('filter') === null) {
            $pengaduan = Pengaduan::all();
            $fill = "";          
        }
        elseif ($request->input('filter') === 'Terbaru') {
            $pengaduan = Pengaduan::orderBy('created_at', 'DESC')->get();
            $fill = "Sort By Terbaru";
        }elseif ($request->input('filter') === 'Terlama') {
            $pengaduan = Pengaduan::orderBy('created_at', 'ASC')->get();
            $fill = "Sort By Terlama";
        }elseif ($request->input('filter') === 'Belum Di Proses') {
            $pengaduan = Pengaduan::where('status', 'Belum Di Proses')->orderBy('status', 'Belum Di Proses')->get();
            $fill = "Sort By Belum Di Proses";
        }elseif ($request->input('filter') === 'Sedang Di Proses') {
            $pengaduan = Pengaduan::where('status', 'Sedang Di Proses')->orderBy('created_at', 'DESC')->get();
            $fill = "Sort By Sedang Di Proses";
        }else{
            $pengaduan = Pengaduan::where('status', 'Selesai')->orderBy('created_at', 'DESC')->get();
            $fill = "Sort By Selesai";
        }
        return view('post.notification', compact('pengaduan','fill'));
	}
    

    public function notificationSkpd(){
        $pengaduan = Pengaduan::orderBy('created_at', 'DESC')->get();

        return view('post.notificationSkpd', compact('pengaduan'));
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

    public function updateTaskAdmin(Request $request){
      $updatee = \DB::table('tasks')->select('id')->where('id', $request->input('id'));
      $updatee->update(['judul_task' => $request->input('judul')]);
      $updatee->update(['tgl_mulai' => $request->input('mulai')]);
      $updatee->update(['deadline' => $request->input('deadline')]);
      $updatee->update(['isi_task' => $request->input('isi')]);
      return back()->with('success', 'Task Berhasil Di Edit');
    }

    public function updateProjectAdmin(Request $request){
      $updatee = \DB::table('posts')->select('id')->where('id', $request->input('id'));
      $updatee->update(['title' => $request->input('title')]);
      $updatee->update(['content' => $request->input('content')]);
      $updatee->update(['category_id' => $request->input('catid')]);
      return back()->with('success', 'Project Berhasil Di Edit');
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

    public function taskstoreAdmin(Request $request)
    {
        $this->validate($request, array(
            'post_id' => 'required',
            'judul_task' => 'required',
            'isi_task' => 'required|min:10',
            'tgl_mulai' => 'required',
            'deadline' => 'required'
        ));

        // Task::create([
        //     'post_id' => request('post_id'),
        //     'judul_task' => request('judul_task'),
        //     'tgl_mulai' => request('tgl_mulai'),
        //     'deadline' => request('deadline'),
        //     'slug' => str_slug(request('judul_task')),
        //     'isi_task' => request('isi_task')
        // ]);

        $task = new Task;

        $task->post_id = $request->post_id;
        $task->judul_task = $request->judul_task;
        $task->tgl_mulai = $request->tgl_mulai;
        $task->deadline = $request->deadline;
        $task->slug = str_slug($request->judul_task);
        $task->isi_task = $request->isi_task;

        $task->save();

        $task->user()->sync($request->users, false);

        return back()->with('alert', 'Task Berhasil Ditambahkan');
    }

    public function showAdmin(Post $post)
    {
        $tasks = Task::All();
        $users = User::All();
        // $tugas = DB::table('users')
        //     ->join('user_and_tasks', 'users.id', '=', 'user_and_tasks.user_id')
        //     ->join('tasks', 'tasks.id', '=', 'user_and_tasks.task_id')
        //     ->select('users.name','tasks.judul_task','tasks.deadline','tasks.post_id','tasks.isi_task','tasks.id','tasks.tgl_mulai')
        //     ->groupBy('users.name','tasks.judul_task','tasks.deadline','tasks.post_id','tasks.isi_task','tasks.id','tasks.tgl_mulai')
        //     ->get();
            
    	return view('post.showAdmin', compact('post', 'project', 'tasks', 'users', 'tugas','utask'));
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

    	return redirect()->route('post.index.admin')->with('success', 'Post Berhasil Dihapus');
    }

    public function destroy2Admin(User $post)
    {
        $post->delete();

        return redirect()->route('post.member.admin')->with('succes', 'Post Berhasil Dihapus');
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
            'isi' => request('isi'),
            'status' => request('status')
        ]);

        return back()->with('success', 'Pengaduan berhasil dikirim');
    }

    public function destroyTaskAdmin(Request $request)
    {
        $destroy = DB::table('tasks')->select('id')->where('id', $request->input('id'));
        $destroy->delete();

        return redirect()->back()->with('success', 'Project Berhasil Dihapus'); 
    }

     public function destroyProjectAdmin(Request $request)
    {
        $destroy = DB::table('posts')->select('id')->where('id', $request->input('id'));
        $destroy->delete();

        return redirect()->back()->with('success', 'Project Berhasil Dihapus'); 
    }

     public function createProjectAdmin(Request $request)
    {
       
        Post::create([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'content' => request('content'),
            'category_id' => request('catid')
        ]);

        return back()->with('success', 'Project berhasil dibuat');
    }


     public function destroyNotifAdmin(Request $request)
    {
        $destroy = DB::table('pengaduans')->select('id')->where('id', $request->input('id'));
        $destroy->delete();

        return redirect()->back()->with('success', 'Notifikasi Berhasil Dihapus'); 
    }

    public function updateStatusAdmin(Request $request){
      $updatee = \DB::table('pengaduans')->select('id')->where('id', $request->input('id'));
      $updatee->update(['status' => $request->input('status1')]);
      return back()->with('success', 'Status Berhasi Di Ubah');


}
