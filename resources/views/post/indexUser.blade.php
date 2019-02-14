@extends('layouts.app')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>All Project</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">

	           @foreach ($tasks as $task)
	           		@foreach($task->user as $us)
					@if($us->id === Auth::user()->id)
						<br>
			        	<div class="col-md-10 col-md-offset-1">
						    <sup>{{ $task->created_at->diffForHumans() }}</sup>
						    <div class="panel panel-default">
							    <div class="panel-heading" style="background: #E5E5E5;">
							        <STRONG>{{ $task->judul_task }}</STRONG>
							         <div class="pull-right">
							            {{ csrf_field() }}
							            <button type="button" data-id="@foreach ($task->user as $all){{ $all->name }}, @endforeach" data-project="{{$task->post->title}}" data-judul="{{$task->judul_task}}" data-deadline="{{$task->deadline}}" data-isi="{{$task->isi_task}}" data-toggle="modal" data-target="#lihatuser" class="btn btn-xs btn-success" >Lihat Detail</button>&nbsp;
							         </div>
							    </div>   
							</div>
							                
						                	
			            </div>
			        @else
	           		@endif
	           		@endforeach
	            @endforeach
	            <center>{!! $tasks->render() !!}</center>
		    </div>
		</div>
			</div>

          </div>
        </div>
    </section>

    <!-- Modal Lihat Detail -->
	<div class="modal fade" id="lihatuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
								<td><input type="text" class="form-control" style="border-style: none;" name="project" id="project" value="" readonly=""></td>
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





	