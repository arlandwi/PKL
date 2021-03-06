<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id','title', 'content', 'category_id', 'slug'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function task()
    {
    	return $this->hasMany(Task::class);
    }

    public function comments()
    {
    	return $this->hasMany(comment::class);
    }
}
