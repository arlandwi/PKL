@extends('layouts.appadmin')

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
	        		<button type="button" class="btn btn-xs btn-success pull-right" style="margin-bottom: 15px;" data-toggle="modal" data-target="#buatproject"  >+ Buat Project</button>
	        	</div>
	        <div class="col-md-8 col-md-offset-2">
	            @foreach ($posts as $post)
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	<a href="{{ route('post.show.admin', $post) }}">{{ $post->title }}</a>  | {{ $post->category->name }}

		                	<div class="pull-right">
		                		<button type="button" class="btn btn-xs btn-info" data-id="{{$post->id}}" data-title="{{$post->title}}" data-content="{{$post->content}}" data-catid="{{$post->category_id}}" data-toggle="modal" data-target="#editproject">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;
		                		</button>	
		                	</div>
		                	<div class="pull-right">
		                			<button type="button" class="btn btn-xs btn-danger" data-id="{{$post->id}}" data-toggle="modal" data-target="#hapusproject">Hapus</button> &nbsp;
		                	</div>
		                	<div class="pull-right">
		                		{{ $post->created_at->diffForHumans() }} &nbsp;
		                	</div>
		                </div>
		                <div class="panel-body">
		                	<p>{{ str_limit($post->content, 100, '...') }}</p>
		                </div>
	            	</div>
	            @endforeach

	            {!! $posts->render() !!}
		    </div>
		</div>
			</div>

          </div>
        </div>
    </section>


    <!-- Modal Edit Task -->
	<div class="modal fade" id="editproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Edit Project</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form role="form" action="{{route('post.updateproject.admin')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="id" id="id" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="">Nama Project</label>
								<input type="text" class="form-control" name="title" id="title">
							</div>
							<div class="form-group">
								<label for="">Kategori</label>
								<select class="form-control" name="catid" id="catid">
									@foreach ($categories as $category)
										<option value="{{$category->id}}">
											{{$category->name}} 
										</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="">Keterangan</label>
								<textarea name="content" id="content" rows="5" class="form-control">
								</textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Save">
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

	<!-- Modal Hapus Project -->
	<div class="modal fade" id="hapusproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Hapus Project</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">	      
					<div class="panel-body">
						<form action="{{route('post.destroyproject.admin')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
							<p>Hapus Project ?</p>
							<input type="hidden" name="id" id="id" value="">
							<button type="submit" class="btn btn-info pull-right" data-dismiss="modal" style="margin-left:6px;">Batalkan</button>
							<button type="submit" class="btn btn-danger pull-right">Hapus</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>		


	<!-- Modal Buat Project -->
	<div class="modal fade" id="buatproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Buat Project</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">	      
					<div class="panel-body">
						<form class="" action="{{route('post.createproject.admin')}}" method="post">
						{{ csrf_field() }}
							<div class="form-group">
								<label for="">Nama Project</label>
								<input type="text" class="form-control" name="title" id="title">
							</div>
							<div class="form-group">
								<label for="">Kategori</label>
								<select name="catid" id="catid" class="form-control">
									@foreach ($categories as $category)
										<option value="{{ $category->id }}"> {{ $category->name }} </option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="">Keterangan</label>
									<textarea name="content" id="content" rows="5" class="form-control" ></textarea>
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Save">
							</div>
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





	