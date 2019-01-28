@extends('layouts.appadmin')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Notification</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">

	            @foreach ($pengaduan as $peng)
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	<div class="pull-right"> 
		                		{{ $peng->created_at->diffForHumans() }} 
		                	</div>
		                	<h4>{{ $peng->subject }} </h4> 
		                	 <p>Oleh : {{ $peng->skpd->name }}</p>
		                		 
		                </div>
		                <div class="panel-body">
		                	<p><b>Lokasi :{{ $peng->lokasi }}</b></p>
		                	<p>{{ str_limit($peng->isi, 100, '...') }}</p>
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





	