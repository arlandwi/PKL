<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Task;
use App\User;
use app\UserAndTask

class multirecordController extends Controller
{
    public function index()
    {
    	$task = Task::lists('id','judul_task');
    	return view('userntask.index',compact('task'));
    }

    public function insert()
    {
    	Task::create([
            'post_id' => request('post_id'),
            'judul_task' => request('judul_task'),
            'slug' => str_slug(request('judul_task')),
            'isi_task' => request('isi_task')
        ]);
    }
    
    public function edit()
    {
    	return view('userntask.update');
    }

    public function update()
    {

    }
}
