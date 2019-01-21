@extends('layouts.app')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>All Task</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">

	            @foreach ($tasks as $task)
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	<a href="">{{ $task->judul_task }}</a>  | {{ $task->post->title }} | {{ $task->user->name }}

		                	<div class="pull-right">
		                		<form class="" action="">
		                			{{ csrf_field() }}
		                			{{ method_field('UPDATE') }}
		                			<button type="submit" class="btn btn-xs btn-info">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</button>	
		                		</form>
		                	</div>
		                	<div class="pull-right">
		                		<form class="" action="" method="post">
		                			{{ csrf_field() }}
		                			{{ method_field('DELETE') }}
		                			<button type="submit" class="btn btn-xs btn-danger">Hapus</button> &nbsp;
		                		</form>
		                	</div>
		                	<div class="pull-right">
		                		{{ $task->created_at->diffForHumans() }} &nbsp;
		                	</div>
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
        </div>

        	<!-- Modal -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
									<label for="input_nama">Judul</label>
									<input type="text" name="judul_task" id="judul_task" class="form-control">
								</div>
								<div class="form-group">
									<label for="input_nama">Pilih User</label>
									<input type="text" name="email" id="email" class="form-control">
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
	    <!-- Akhir modal -->

    </section>


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