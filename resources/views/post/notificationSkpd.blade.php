@extends('layouts.appskpd')

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
	            		@if($peng->skpd->id === Auth::user()->id)
		                <div class="panel-heading">
		                	<div class="pull-right"> 
		                		<sup>
		                			{{ $peng->created_at->diffForHumans() }}
		                		</sup>
		                	</div>
		                	<strong>{{ $peng->subject }}</strong> | 
		                	 	Oleh : {{ $peng->skpd->name }} |
		                	 	@if($peng->status === 'Belum Di Proses')
		                	 	Status : <button class="btn btn-xs btn-danger" disabled="disabled">{{ $peng->status}}</button>
		                	 	@elseif(($peng->status === 'Sedang Di Proses'))
		                	 	Status : <button class="btn btn-xs btn-warning" disabled="disabled">{{ $peng->status}}</button>
		                	 	@else
		                	 	Status : <button class="btn btn-xs btn-success" disabled="disabled">{{ $peng->status}}</button>
		                	 	@endif	 
		                </div>
		                <div class="panel-body">
		                	<p><b>Lokasi :{{ $peng->lokasi }}</b></p>
		                	<p>{{ str_limit($peng->isi, 100, '...') }}</p>
		                </div>
		                @else
		          
		                @endif	
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





	