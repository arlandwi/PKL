@extends('layouts.app')

@section('content')
	<div class="container">
		<center>
			<h2>Lihat Detail Task</h2>
			<br>
		</center>
	</div>

	@if($tasks->isEmpty())
    @else
    	  <div class="col-xs-8 col-xs-offset-2">
            <center>
            <table border="0" cellspacing="5" width="530">
              <tr>
                <td width="100">Nama Project</td>
                <td width="15"> : </td>
                <td><input type="text" class="form-control" style="border-style: none;" name="project" id="project" value="{{$task->post->title}}" readonly=""></td>
              </tr>             
              <tr> 
                <td width="100">Nama Task</td>
                <td width="15"> :</td>
                <td><input type="text" class="form-control" style="border-style: none;" name="judul" id="judul" value="{{$task->judul_task}}" readonly=""></td>
              </tr>
              <tr>
                <td width="100">Dikerjakan</td>
                <td width="15"> :</td>
                <td><input type="text" class="form-control" style="border-style: none;" name="id" id="id" value="@foreach ($task->user as $all){{ $all->name }}, @endforeach" readonly="">
                </td>
              </tr>
              <tr>
                <td width="100">Deadline</td>
                <td width="15"> :</td>
                        <td><input type="text" class="form-control" style="border-style: none;" name="deadline" id="deadline" value="{{$task->deadline}}" readonly=""></td>
              </tr>
                <td width="100">Keterangan</td> 
                <td width="15"> :</td>              
                <td><input type="text" class="form-control" style="border-style: none;" name="isi" id="isi" value="{{$task->isi_task}}" readonly=""></td>
              </tr>

              <tr> 
                <td width="100">Status</td>
                <td width="15"> :</td>
                <td><input type="text" class="form-control" style="border-style: none;" name="status" id="status" value="{{$task->status}}" readonly=""></td>
              </tr>
            </table>
            </center>
        </div>

    @endif

    @if ($task->status === 'Validate')

    @else
    <div style="margin-top: 50px;" class="col-xs-8 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Komentar</div>
					@foreach ($task->post->comments()->get() as $comment)
						<div class="panel-body" style="max-height: 100%; height: 100%;" >
							@if($comment->user === null)
								<h5>
									<b>{{ $comment->admin->name }}</b>
									<sup class="pull-right">{{ $comment->created_at->diffForHumans() }}
									</sup>
								</h5>

								<p style="word-wrap: break-word;">{{ $comment->message }}</p>
							@else
								<h5>
									<b>{{ $comment->user->name }}</b>
									<sup class="pull-right">{{ $comment->created_at->diffForHumans() }}
									</sup>
								</h5>

								<p style="word-wrap: break-word;">{{ $comment->message }}</p>
							@endif
						</div>
						<hr style="margin-bottom: 0px">
					@endforeach
					<div class="panel-body">
						<form action="{{route('post.comment.store.user')}}" method="post" class="form-horizontal">
							{{ csrf_field() }}
							<input type="hidden" name="post_id" value="{{$task->post_id}}">
							<textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Berikan Komentar"></textarea>
							<input type="submit" value="Komentar" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
		@endif
@endsection