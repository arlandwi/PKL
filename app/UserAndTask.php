<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAndTask extends Model
{
     protected $fillable = ['task_id', 'user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function task()
    {
    	return $this->belongsTo(Task::class);
    }
}
