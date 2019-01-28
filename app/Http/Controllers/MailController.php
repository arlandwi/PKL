<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function post(Request $req)
    {
    	$req->validate([
    		
    		'email'=>'required',
            'lokasi'=>'required',
    		'message'=>'required',
    	]);

    	$data = [
    		'email'=>$req->email,
    		'lokasi'=>$req->lokasi,
            'subject'=>$req->subject,
    		'bodyMassage'=>$req->message,
    	];

    	Mail::send('post.mail',$data,function($message) use($data){
    		$message->from($data['email']);
    		$message->to('diskominfositubondo@gmail.com', 'Pengaduan');
    		$message->subject($data['subject']);
    	});

    	return back()->with('success', 'Pengaduan Berhasil Terkirim');
    }
}
