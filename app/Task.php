<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 'post_id', 'tgl_mulai', 'deadline', 'judul_task', 'isi_task', 'slug'];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function user()
    {
    	return $this->belongsToMany('App\User','task_user');
    }
}
