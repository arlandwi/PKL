@extends('layouts.appadmin')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>List User</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
            <hr>
            <h4 style="text-align: center;">MEMBER</h4>
	            @foreach ($posts as $post)
  	            	<div class="panel panel-default">
  		                <div class="panel-heading">
  		                	<a href="{{ route('post.show2.admin', $post) }}">{{ $post->name }}</a>
  		                </div>
  	            	</div>  
	            @endforeach

	            {!! $posts->render() !!}

              <hr>
              <h4 style="text-align: center;">SKPD</h4>
              <button class="btn btn-xs btn-success pull-right" type="button" data-toggle="modal" data-target="#buatskpd">Buat Akun SKPD</button>
              <br><br>
              @foreach ($skpds as $skpd)
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <a href="{{ route('post.show3.admin', $skpd) }}">{{ $skpd->name }}</a>
                      </div>
                  </div>  
              @endforeach

              {!! $posts->render() !!}

              <hr>
              <h4 style="text-align: center;">KEPALA</h4>
              <button class="btn btn-xs btn-success pull-right" type="button" data-toggle="modal" data-target="#buatkepala">Buat Akun Kepala</button>
              <br><br>
              @foreach ($kepalas as $kepala)
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <a href="{{ route('post.show4.admin', $kepala) }}">{{ $kepala->name }}</a>
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

    <!-- Modal register skpd -->
    <div class="modal fade" id="buatskpd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Buat Akun SKPD</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" action="{{ route('skpd.register.submit') }}" enctype="multipart/form-data" method="post">{{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="">Nama SKPD</label>
                  <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                  <label for="">Email SKPD</label>
                  <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                  <input id="status" type="hidden" class="form-control" name="status" value="skpd" required autofocus>
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                  <label for="">Confirm Password</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-info">Buat Akun</button>
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


<!-- Modal register kepala -->
    <div class="modal fade" id="buatkepala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Buat Akun Kepala</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" action="{{ route('kepala.register.submit') }}" enctype="multipart/form-data" method="post">{{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="">Nama Kepala</label>
                  <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                  <label for="">Email Kepala</label>
                  <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                  <input id="status" type="hidden" class="form-control" name="status" value="kepala" required autofocus>
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                  <label for="">Confirm Password</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-info">Buat Akun</button>
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





	