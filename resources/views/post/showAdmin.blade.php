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
									@if($task->post_id === $post->id)
									<br>
			        				<div class="col-md-10 col-md-offset-1">

						            	<sup>{{ $task->created_at->diffForHumans() }}</sup>
						            	<div class="panel panel-default">
							                <div class="panel-heading" style="background: #E5E5E5;">
							                	<STRONG>{{ $task->judul_task }}</STRONG>
							                	 <div class="pull-right">
							                	 &nbsp;
							                	</div>
							                	<div class="pull-right">
							                		{{ csrf_field() }}
							                		<button type="button" class="btn btn-xs btn-danger" data-id="{{$task->id}}" data-toggle="modal" data-target="#hapustask">Hapus</button>&nbsp;
							                	</div>
							                	<div class="pull-right">
						                			{{ csrf_field() }}
						                			<button type="button" class="btn btn-xs btn-warning" data-id="{{$task->id}}" data-judul="{{$task->judul_task}}" data-mulai="{{$task->tgl_mulai}}" data-deadline="{{$task->deadline}}" data-isi="{{$task->isi_task}}" data-toggle="modal" data-target="#edittask" >&nbsp;Edit&nbsp;</button>&nbsp;
						                		</div>
						                		<div class="pull-right">
							                		{{ csrf_field() }}
							                		<button type="button" data-id="@foreach ($task->user as $all){{ $all->name }}, @endforeach" data-project="{{$task->post->title}}" data-judul="{{$task->judul_task}}" data-deadline="{{$task->deadline}}" data-isi="{{$task->isi_task}}" data-toggle="modal" data-target="#lihat" class="btn btn-xs btn-success" >Lihat Detail</button>&nbsp;
							                	</div>
							                	<div class="pull-right">
							                		{{ csrf_field() }}
							                		@if ($task->status === 'Belum Dikerjakan')
							                			<button type="button" class="btn btn-xs btn-danger" disabled="" >{{$task->status}}
							                			</button>&nbsp;
							                		@elseif ($task->status === 'Sedang Dikerjakan')
							                			<button type="button" class="btn btn-xs btn-warning" disabled="">{{$task->status}}</button>&nbsp;
							                		@elseif ($task->status === 'Selesai')
							                			<button type="button" class="btn btn-xs btn-success" data-id="{{$task->id}}" data-status="{{$task->status}}" data-toggle="modal" data-target="#ubahstatustask">{{$task->status}}</button>&nbsp;
							                		@else
							                			<button type="button" class="btn btn-xs btn-success" disabled="">{{$task->status}}</button>&nbsp;
							                		@endif
							                	</div>
							                </div>
							                
							               
							            </div>
							                
						                	
			            			</div>
			            			@else
	           						@endif
	            			@endforeach
	            		<center>{!! $tasks->render() !!}</center>
		    		</div>
				</div>
			</div>
			<div class="col-xs-8 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Komentar</div>
					
					@foreach ($post->comments()->get() as $comment)
						<div class="panel-body" style="max-height: 100%; height: 100%;" >
							@if($comment->user === null)
								<h5>
									<b>{{ $comment->admin->name }}</b>
									<sup class="pull-right">{{ $comment->created_at->diffForHumans() }}
										<button type="submit" class="glyphicon glyphicon-trash" style="margin-left: 10px;" aria-hidden="true" data-id="{{$comment->id}}" data-toggle="modal" data-target="#hapuskomen">
										</button>
									</sup>
								</h5>

								<p style="word-wrap: break-word;">{{ $comment->message }}</p>
							@else
								<h5>
									<b>{{ $comment->user->name }}</b>
									<sup class="pull-right">{{ $comment->created_at->diffForHumans() }}
										<button type="submit" class="glyphicon glyphicon-trash" style="margin-left: 10px;" aria-hidden="true" data-id="{{$comment->id}}" data-toggle="modal" data-target="#hapuskomen">
										</button>
									</sup>
								</h5>

								<p style="word-wrap: break-word;">{{ $comment->message }}</p>
							@endif
						</div>
						<hr style="margin-bottom: 0px">
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
								<input type="hidden" name="status" id="status" class="form-control" value="Belum Dikerjakan">
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
								<label for="input_user">Pilih User</label>
								<select class="form-control select2-multi" name="users[]" multiple="multiple">
									@foreach($users as $user)
										<option value='{{ $user->id }}'>{{ $user->name }}</option>
									@endforeach
								</select>
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
	<div class="modal fade" id="edittask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Edit Task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form role="form" action="{{route('post.updatetask.admin')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
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
								<input type="date" name="mulai" id="mulai" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_deadline">Batas Pengerjaan</label>
								<input type="date" name="deadline" id="deadline" class="form-control">
							</div>	
							<div class="form-group">
								<label for="input_isitask">Isi Task</label>
								<textarea name="isi" id="isi" rows="5" class="form-control" placeholder="Tulis Isi Task"></textarea>
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


	<!-- Modal Lihat Detail -->
	<div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"  id="myModalLabel">Detail Task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="background-color: #eee;">	      
					<div class="panel-body" >
						@if($tasks->isEmpty())

						@else
						<center>
						<table border="0" cellspacing="5" width="530">
							<tr>
								<td width="100">Nama Project</td>
								<td width="15"> : </td>
								<td><input type="text" class="form-control" style="border-style: none;" name="project" id="project" readonly=""></td>
							</tr>							
							<tr> 
								<td width="100">Nama Task</td>
								<td width="15"> :</td>
								<td><input type="text" class="form-control" style="border-style: none;" name="judul" id="judul" value="" readonly=""></td>
							</tr>
							<tr>
								<td width="100">Dikerjakan</td>
								<td width="15"> :</td>
								<td><input type="text" class="form-control" style="border-style: none;" name="id" id="id" value="" readonly="">
								</td>
							</tr>
							<tr>
								<td width="100">Deadline</td>
								<td width="15"> :</td>
	                			<td><input type="text" class="form-control" style="border-style: none;" name="deadline" id="deadline" value="" readonly=""></td>
							</tr>
								<td width="100">Keterangan</td>	
								<td width="15"> :</td>							
								<td><input type="text" class="form-control" style="border-style: none;" name="isi" id="isi" value="" readonly=""></td>
							</tr>
						</table>
						</center>

						@endif
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Hapus Komen -->
	<div class="modal fade" id="hapuskomen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Hapus Komentar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">	      
					<div class="panel-body">
						<form action="{{route('post.comment.destroy.admin')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
							<p>Hapus Komentar ?</p>
							<input type="hidden" name="id" id="id" value="">
							<button type="submit" class="btn btn-info pull-right" data-dismiss="modal" style="margin-left:6px;">Batalkan</button>
							<button type="submit" class="btn btn-danger pull-right">Hapus</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>		

	<!-- Modal Hapus Task -->
	<div class="modal fade" id="hapustask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Hapus task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">	      
					<div class="panel-body">
						<form action="{{route('post.destroytask.admin')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
							<p>Hapus Task ?</p>
							<input type="hidden" name="id" id="id" value="">
							<button type="button" class="btn btn-info pull-right" data-dismiss="modal" style="margin-left:6px;">Batalkan</button>
							<button type="submit" class="btn btn-danger pull-right">Hapus</button>
						</form>
					</div>
				</div>			
			
			</div>
		</div>
	</div>

	<!-- Modal Ubah Status Task -->
	<div class="modal fade" id="ubahstatustask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Ubah Status Task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">	      
					<div class="panel-body">
						<form action="{{route('post.status.update.task')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
							<input type="hidden" name="id" id="id" value="">
							<p>Status Pengerjaan Task <input style="text-align: center; border-style: none;" type="text" id="status" value="" disabled></p>
							<input type="hidden" name="status1" id="status1" value="">
							<button type="submit" class="btn btn-info pull-right" data-dismiss="modal" style="margin-left:6px;">Batalkan</button>
							<button type="submit" class="btn btn-danger pull-right">Ubah</button>
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
