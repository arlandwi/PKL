<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Task;
use App\User;
use PDF;
use DB;
use View;
use App;

class PdfControler extends Controller
{
    public function cetak($id)
    {
    	$post = Post::find($id);
    	$task = Task::All();
    	$users = User::All();
    	// DB::table('tasks')
     //           ->where('post_id', $post->id);
        // mengarahkan view pada file pdf.blade.php di views/provinsi/
		// $view = View::make('post.pdf', array('task' => $task, 'i' => 0))->render(); 
		// // panggil fungsi dompdf
		// $pdf = App::make('dompdf');
		// // set ukuran kertas dan orientasi
		// $pdf->loadHTML($view)->setPaper('letter')->setOrientation('potrait');
		// // cetak
		// return $pdf->stream();
		$pdf = PDF::loadView('post.pdf',compact('task', 'post', 'users'))
				->setPaper('a4', 'landscape');
 
    	return $pdf->stream();
    }
}
