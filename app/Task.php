<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['post_id', 'judul_task', 'isi_task', 'slug'];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
