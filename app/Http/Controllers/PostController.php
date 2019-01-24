<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Task;
use App\UserAndTask;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
	public function index()
	{
		$posts = Post::latest()->paginate(3);

		return view('post.index', compact('posts'));
	}
    public function userntask(Task $task)
    {
        $users = User::all();
        return view('post.user_n_task', compact('task', 'users'));
    }
    public function calendar(){
        $posts = Post::all();

        return view('post.calendar', compact('posts'));
    }
	public function notification(){
		$posts = Post::latest()->paginate(3);

		return view('post.notification', compact('posts'));
	}
    public function member(){
        $posts = User::latest()->paginate(3);

        return view('post.member', compact('posts'));
    }
	public function portfolio(){
		$posts = Post::latest()->paginate(3);
		return view('post.portfolio', compact('posts'));
	}
    public function profil(){
        $ulog = Auth::user();
        return view('post.profil', compact('ulog'));
    }

    public function updatepro(Request $request){
      $updatee = \DB::table('users')->select('id')->where('id', $request->input('id'));
      $updatee->update(['name' => $request->input('name')]);
      $updatee->update(['email' => $request->input('email')]);
      return back()->with('success', 'Profil Berhasil Diubah');
    }

    public function create()
    {
    	$categories = Category::all();
    	return view('post.create', compact('categories'));
    }

    public function store()
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

    	return redirect() -> route('post.index')->with('success', 'Post Berhasil Ditambahkan');
    }

    public function userntaskstore()
    {
        $this->validate(request(), [
            'user_id' => 'required'
        ]);

        UserAndTask::create([
            'user_id' => request('user_id'),
            'task_id' => request('task_id')
        ]);

        return back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function taskstore()
    {
        $this->validate(request(), [
            'judul_task' => 'required',
            'isi_task' => 'required|min:10'
        ]);

        Task::create([
            'post_id' => request('post_id'),
            'judul_task' => request('judul_task'),
            'slug' => str_slug(request('judul_task')),
            'isi_task' => request('isi_task')
        ]);

        return redirect() -> route('post.index')->with('success', 'Task Berhasil Ditambahkan');
    }
 
    public function show(Post $post)
    {
        $users = User::All();
        $tasks = Task::latest()->paginate(3);
        $one = UserAndTask::All();
    	return view('post.show', compact('post', 'tasks', 'users', 'one'));
    }

    public function show2(User $post)
    {
        return view('post.show2', compact('post'));
    }

    public function task(Post $post)
    {
        $users = User::all();
        return view('post.task', compact('users', 'post'));
    }

    public function edit(Post $post)
    {
    	$categories = Category::all();

    	return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
    	$post->update([
    		'title' => request('title'),
    		'category_id' => request('category_id'),
    		'content' => request ('content'),
    	]);

    	return redirect()->route('post.index')->with('info', 'Post Berhasil Diubah');
    }

    public function edit2(User $post)
    {

        return view('post.edit2', compact('post'));
    }

    public function update2(User $post)
    {
        $post->update([
            'name' => request('name'),
            'email' => request('email'),
        ]);

        return redirect()->route('post.member')->with('info', 'Post Berhasil Diubah');
    }

    public function edit3(User $post)
    {
        $post = User::all();
        return view('post.edit3', compact('post'));
    }

    public function update3(User $post)
    {
        $post->update([
            'name' => request('name'),
            'email' => request('email'),
        ]);

        return redirect()->route('post.member')->with('info', 'Post Berhasil Diubah');
    }

    public function destroy(Post $post)
    {
    	$post->delete();

    	return redirect()->route('post.index')->with('danger', 'Post Berhasil Dihapus');
    }
    public function destroy2(User $post)
    {
        $post->delete();

        return redirect()->route('post.member')->with('danger', 'Post Berhasil Dihapus');
    }
}
