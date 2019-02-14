@extends('layouts.app')

@section('content')
	<div class="container">
		<center>
			<h2>All Task</h2>
		</center>
		@foreach($task->user as $us)
		  @if($us->id === 1)
        <p>{{$us->slug}}</p>
      @else
      @endif
		@endforeach
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