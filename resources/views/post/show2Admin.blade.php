@extends('layouts.appadmin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
		                <div class="panel-heading">
		                Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $post->name }}

		                <div class="pull-right">
	                		<form class="" action="{{ route('post.edit2.admin', $post) }}">
	                			{{ csrf_field() }}
	                			{{ method_field('UPDATE') }}
	                			<button type="submit" class="btn btn-xs btn-info">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>	
	                		</form>
	                	</div>
	                	<div class="pull-right">
	                		<form class="" action="{{ route('post.destroy2.admin', $post) }}" method="post">
	                			{{ csrf_field() }}
	                			{{ method_field('DELETE') }}
	                			<button type="submit" class="btn btn-xs btn-danger">Hapus</button> &nbsp;
	                		</form>
	                	</div>	
		                </div>
		                <div class="panel-body">
		                	<p>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $post->email }}</p>
		                	<p>Bergabung sejak : {{ $post->created_at->diffForHumans() }}</p>
		                	<p>Status: {{ $post->status }}</p>
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