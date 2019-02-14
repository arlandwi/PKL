@extends('layouts.appkepala')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>All Project</h2>
              <hr>
              <form action="{{route('post.indexfill.kepala')}}" method="post">
              	{{csrf_field()}}
              	<select name="filter" id="filter">
              		<option value="Terbaru">Terbaru</option>
              		<option value="Terlama">Terlama</option>
              	</select>
              	<button class="btn btn-xs btn-info" type="submit">Filter</button>
              </form>
              <p>{{$fill}}</p>
            </div> 
          </div>
          <div class="row">
            <div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            @foreach ($posts as $post)
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	<a href="">{{ $post->title }}</a>  | {{ $post->category->name }}
		                	<div class="pull-right">
                        <form action="{{route('cetak-pdf', $post['id'])}}">
		                		  <button class="btn btn-xs btn-success">Cetak PDF</button>
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





	