@extends('layouts.appadmin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $post->title }} | <small>{{ $post->category->name }}</small>
						<div class="pull-right">
	                		<form class="" action="{{ route('post.task.admin', $post['id']) }}" method="post">
	                			{{ csrf_field() }}
	                			<!-- {{ method_field('UPDATE') }} -->
	                			<button type="submit" class="btn btn-xs btn-info">&nbsp;Add Task&nbsp;</button>	
	                		</form>
	                	</div>
	                	<!-- <div class="pull-right">
	                		<form class="" action="{{ route('post.showtask')}}">
	                			{{ csrf_field() }}
	                			{{ method_field('DELETE') }}
	                			<button type="submit" class="btn btn-xs btn-danger">Lihat Task</button> &nbsp;
	                		</form>
	                	</div> -->
					</div>
					<div class="panel-body"><p>{{ $post->content }}</p></div>
						
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