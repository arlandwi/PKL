@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $post->title }} | <small>Status : {{ $post->category->name }}</small>
						<div class="pull-right">
	                		<form class="" action="{{ route('post.task', $post['id']) }}" method="post">
	                			{{ csrf_field() }}
	                			<!-- {{ method_field('UPDATE') }} -->
	                			<button type="submit" class="btn btn-xs btn-info">&nbsp;Add Task&nbsp;</button>	
	                		</form>
	                	</div>

					</div>
					<div class="panel-body"><p>{{ $post->content }}</p></div>
					<div class="row">
	        <div class="col-md-8 col-md-offset-2">

	            @foreach ($tasks as $task)
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	<a href="">{{ $task->judul_task }}</a>  | {{ $task->post->title }}
							<div class="pull-right">
	                			{{ csrf_field() }}
	                			
	                			<button type="button" class="btn btn-xs btn-info" data-id="{{$task->id}}" data-toggle="modal" data-target="#userntaskModal" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add User&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> &nbsp;
	                		</div>

<!-- Modal -->
	<div class="modal fade" id="userntaskModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Penugasan User dan Task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal -->
					<form role="form" action="{{route('userntaskstore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="task_id" id="task_id" class="form-control" value="{{$task->id}}">
							</div>
							<div class="form-group">
								<label for="input_nama">Pilih User</label>
								<select name="user_id" id="user_id" class="form-control">
									@foreach ($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>	
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

		                	</div>
		                	
		                	<div class="pull-right">
		                		{{ $task->created_at->diffForHumans() }} &nbsp;
		                	</div>
		                </div>
		                <div class="panel-body">
		                	<p>Dikerjakan : <strong></strong></p>
		                </div>
		                <div class="panel-body">
		                	<p>{{ str_limit($task->isi_task, 100, '...') }}</p>
		                </div>
	            	</div>
	            @endforeach

	            {!! $tasks->render() !!}
		    </div>
		</div>
				</div>
			</div>

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Tambahkan Komentar</div>
					
					@foreach ($post->comments()->get() as $comment)
						<div class="panel-body">
							<h4>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</h4>

							<p>{{ $comment->message }}</p>
						</div>
					@endforeach
					<div class="panel-body">
						<form action="{{ route('post.comment.store', $post) }}" method="post" class="form-horizontal">
							{{ csrf_field() }}
							<textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Berikan Komentar"></textarea>
							<input type="submit" value="Komentar" class="btn btn-primary">							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer -->
    <footer>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <p>&copy; copyright 2019 by Tim PKN UMM.</p>
          </div>
        </div>
      </div>
    </footer>
      
    <!-- Akhir footer -->
@endsection