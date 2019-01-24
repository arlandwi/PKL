<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Admin;

class PostCommentController extends Controller
{
    public function storeAdmin(Request $request, Post $post)
    {
    	//Comment::create([
    	//	'post_id' => $post->id,
    	//	'user_id' => auth()->id(),
    	//	'message' => $request->message,
    	//]);
    	$post->comments()->create(array_merge(
    		$request->only('message'),
    		['admin_id' => auth('admin')->id()]

    	));

    	return redirect()->back();
    }

    public function storeUser(Request $request, Post $post)
    {
        //Comment::create([
        //  'post_id' => $post->id,
        //  'user_id' => auth()->id(),
        //  'message' => $request->message,
        //]);
        $post->comments()->create(array_merge(
            $request->only('message'),
            ['user_id' => auth('web')->id()]

        ));

        return redirect()->back();
    }
}
