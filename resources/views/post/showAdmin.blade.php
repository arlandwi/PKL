@extends('layouts.appadmin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $post->title }} | <small>{{ $post->category->name }}</small>
						<div class="pull-right">
	                			{{ csrf_field() }}
	                			<button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-id="{{$post->id}}" data-target="#TaskModal" >&nbsp;Add Task&nbsp;</button>	
	                	</div>

					</div>
					<div class="panel-body"><p>{{ $post->content }}</p></div>
						<div class="row">
							 @foreach ($tasks as $task)
	        <div class="col-md-8 col-md-offset-2">

	           
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	<STRONG>{{ $task->judul_task }}</STRONG>  | {{ $task->post->title }}
		                	<div class="pull-right">
		                		{{ csrf_field() }}
		                		<button type="button" class="btn btn-xs btn-danger" data-id="{{$task->id}}" data-judul="{{$task->judul_task}}" data-isi_task="{{$task->isi_task}}" data-tgl_mulai="{{$task->tgl_mulai}}" data-deadline="{{$task->deadline}}" data-toggle="modal" data-target="#edit123">Edit Task</button>&nbsp;
		                	</div>
							<div class="pull-right">
	                			{{ csrf_field() }}
	                			<button type="button" class="btn btn-xs btn-info" data-id="{{$task->id}}" data-toggle="modal" data-target="#userntaskModal" >Add User</button> &nbsp;
	                		</div>
		                	</div>
		                	
		                	<div class="pull-right">
		                		{{ $task->created_at->diffForHumans() }} &nbsp;
		                	</div>
		                </div>
		                <div class="panel-body">
		                	<p>Dikerjakan : {{($tugas)}}<strong></strong></p>
		                	<p>Batas Pengerjaan : {{($task->deadline)}}<strong></strong></p>
		                	<p>Keterangan :</p>
		                	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                		{{ str_limit($task->isi_task, 100, '...') }}</p>
		                </div>
	            	</div>
	            @endforeach

		    </div>
				</div>
			</div>

			                	

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Tambahkan Komentar</div>
					
					@foreach ($post->comments()->get() as $comment)
						<div class="panel-body">
							@if($comment->user === null)
								<h4>{{ $comment->admin->name }} - {{ $comment->created_at->diffForHumans() }}</h4>

								<p>{{ $comment->message }}</p>
							@else
								<h4>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</h4>

								<p>{{ $comment->message }}</p>
							@endif
						</div>
					@endforeach
					<div class="panel-body">
						<form action="{{ route('post.comment.store.admin', $post) }}" method="post" class="form-horizontal">
							{{ csrf_field() }}
							<textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Berikan Komentar"></textarea>
							<input type="submit" value="Komentar" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal Tambah User di Task-->
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
					<form role="form" action="{{route('post.tasknuser.admin')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
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

<!-- Modal Tambah Task -->
	<div class="modal fade" id="TaskModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Tambah Task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal -->
					<form role="form" action="{{route('post.taskstore.admin')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="post_id" id="post_id" class="form-control" value="{{$post->id}}">
							</div>
							<div class="form-group">
								<label for="input_judul">Judul Task</label>
								<input type="text" name="judul_task" id="judul_task" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_tgl">Tanggal Mulai</label>
								<input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_deadline">Batas Pengerjaan</label>
								<input type="date" name="deadline" id="deadline" class="form-control">
							</div>	
							<div class="form-group">
								<label for="input_isitask">Isi Task</label>
								<textarea name="isi_task" id="isi_task" rows="5" class="form-control" placeholder="Tulis Isi Task"></textarea>
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

	<!-- Modal Edit Task -->
	<div class="modal fade" id="edit123" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Edit Task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal -->
					<form role="form" action="" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="id" id="id" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="judul">Judul Task</label>
								<input type="text" name="judul" id="judul" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_tgl">Tanggal Mulai</label>
								<input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_deadline">Batas Pengerjaan</label>
								<input type="date" name="deadline" id="deadline" class="form-control">
							</div>	
							<div class="form-group">
								<label for="input_isitask">Isi Task</label>
								<textarea name="isi_task" id="isi_task" rows="5" class="form-control" placeholder="Tulis Isi Task"></textarea>
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