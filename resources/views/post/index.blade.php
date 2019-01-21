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

	            @foreach ($posts as $post)
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	<a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>  | {{ $post->category->name }}

		                	<div class="pull-right">
		                		<form class="" action="{{ route('post.edit', $post) }}">
		                			{{ csrf_field() }}
		                			{{ method_field('UPDATE') }}
		                			<button type="submit" class="btn btn-xs btn-info">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</button>	
		                		</form>
		                	</div>
		                	<div class="pull-right">
		                		<form class="" action="{{ route('post.destroy', $post) }}" method="post">
		                			{{ csrf_field() }}
		                			{{ method_field('DELETE') }}
		                			<button type="submit" class="btn btn-xs btn-danger">Hapus</button> &nbsp;
		                		</form>
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





	