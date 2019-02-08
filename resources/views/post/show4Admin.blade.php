@extends('layouts.appadmin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
		                <div class="panel-heading">
			                Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $kepala->name }}

			                <div class="pull-right">
		                			<button type="button" class="btn btn-xs btn-info" data-id="{{$kepala->id}}" data-name="{{$kepala->name}}" data-email="{{$kepala->email}}" data-toggle="modal" data-target="#editkepala">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>	
		                	</div>
		                	<div class="pull-right">
		                			<button type="submit" class="btn btn-xs btn-danger" data-id="{{$kepala->id}}" data-toggle="modal" data-target="#hapuskepala">Hapus</button> &nbsp;
		                	</div>	
		                </div>
		                <div class="panel-body">
		                	<p>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $kepala->email }}</p>
		                	<p>Bergabung sejak : {{ $kepala->created_at->diffForHumans() }}</p>
		                	<p>Status: {{ $kepala->status }}</p>
		                </div>
		            
	            </div>
			</div>
		</div>
	</div>

	<!-- Modal Edit  -->
	<div class="modal fade" id="editkepala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Edit Kepala</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form role="form" action="{{route('update.memberke.admin')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="id" id="id" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="input_nama">Name</label>
								<input type="text" name="name" id="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_nama">Email</label>
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

<!-- Modal Hapus  -->
	<div class="modal fade" id="hapuskepala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Hapus Kepala</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">	      
					<div class="panel-body">
						<form action="{{route('destroy.memberke.admin')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
							<p>Hapus Kepala ?</p>
							<input type="hidden" name="id" id="id" value="">
							<button type="submit" class="btn btn-info pull-right" data-dismiss="modal" style="margin-left:6px;">Batalkan</button>
							<button type="submit" class="btn btn-danger pull-right">Hapus</button>
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