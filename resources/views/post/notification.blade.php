@extends('layouts.appadmin')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Notification</h2>
              <form action="{{route('post.notificationfil.admin')}}" method="post">
              	{{csrf_field()}}
              	<select name="filter" id="filter">
              		<option value="Terbaru">Terbaru</option>
              		<option value="Terlama">Terlama</option>
              		<option value="Belum Di Proses">Belum Di Proses</option>
              		<option value="Sedang Di Proses">Sedang Di Proses</option>
              		<option value="Selesai">Selesai</option>
              	</select>
              	<button class="btn btn-xs btn-info" type="submit">Filter</button>
              </form>
              <hr>
              <p>{{$fill}}</p>
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
				                		<sup>
				                			{{ $peng->created_at->diffForHumans() }}
				                			@if($peng->status === 'Belum Di Proses')
												<button type="button" class="btn btn-danger btn-xs" style="margin-left: 10px;" aria-hidden="true" data-id="{{$peng->id}}" data-status="{{$peng->status}}" data-toggle="modal" data-target="#ubahstatus">
													{{$peng->status}}
												</button>
											@elseif ($peng->status === 'Sedang Di Proses')
												<button type="button" class="btn btn-warning btn-xs" style="margin-left: 10px;" aria-hidden="true" data-id="{{$peng->id}}" data-status="{{$peng->status}}" data-toggle="modal" data-target="#ubahstatus">
													{{$peng->status}}
												</button>	
											@else
												<button type="button" class="btn btn-success btn-xs" disabled="disabled" style="margin-left: 10px;">
													{{$peng->status}}
												</button>	
											@endif
				                			<button type="button" class="btn btn-danger btn-xs glyphicon glyphicon-trash" style="margin-left: 10px;" aria-hidden="true" data-id="{{$peng->id}}" data-toggle="modal" data-target="#hapusnotif">
											</button>
				                		</sup>
				                	</div>
				                	<strong>{{ $peng->subject }}</strong> | 
				                	 	Oleh : {{ $peng->skpd->name }}
				                		 
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

    <!-- Modal Hapus Notif -->
	<div class="modal fade" id="hapusnotif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Hapus Pengaduan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">	      
					<div class="panel-body">
						<form action="{{route('post.notif.destroy.admin')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
							<p>Hapus Pengaduan ?</p>
							<input type="hidden" name="id" id="id" value="">
							<button type="submit" class="btn btn-info pull-right" data-dismiss="modal" style="margin-left:6px;">Batalkan</button>
							<button type="submit" class="btn btn-danger pull-right">Hapus</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>		

	 <!-- Modal Update Status -->
	<div class="modal fade" id="ubahstatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Ubah Status Pengaduan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">	      
					<div class="panel-body">
						<form action="{{route('post.status.update.admin')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
							<input type="hidden" name="id" id="id" value="">
							<p>Status Pengaduan <input style="text-align: center; border-style: none;" type="text" id="status" value="" disabled></p>
							<input type="hidden" name="status1" id="status1" value="">
							<button type="submit" class="btn btn-info pull-right" data-dismiss="modal" style="margin-left:6px;">Batalkan</button>
							<button type="submit" class="btn btn-danger pull-right">Ubah</button>
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





	