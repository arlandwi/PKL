@extends('layouts.app')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Portfolio</h2>
              <hr>
            </div> 
          </div>
	            
	<div class="row">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @foreach ($tasks as $task)
          	@if ($task->status === 'Validate')
            @foreach($task->user as $us)
              @if($us->id === Auth::user()->id)
                <br>
                <div class="col-md-10 col-md-offset-1">
                  <sup>{{ $task->created_at->diffForHumans() }}</sup>
                  <div class="panel panel-default">
                    <div class="panel-heading" style="background: #E5E5E5;">
                      <STRONG>{{ $task->judul_task }} | <sup>{{$task->post->title}}</sup></STRONG>
                      <div class="pull-right">
                        <a type="button" href="{{route('post.task.user', $task)}}" class="btn 
                        btn-xs btn-success" >Lihat Detail</a>&nbsp;
                         {{ csrf_field() }}
                      </div>
                      <div class="pull-right">
                      {{ csrf_field() }}
                        @if ($task->status === 'Belum Dikerjakan')
                          <button type="button" class="btn btn-xs btn-danger" data-id="{{$task->id}}" data-status="{{$task->status}}" data-toggle="modal" data-target="#ubahstatustask">Belum Dikerjakan
                          </button>&nbsp;
                        @elseif ($task->status === 'Sedang Dikerjakan')
                          <button type="button" class="btn btn-xs btn-warning" data-id="{{$task->id}}" data-status="{{$task->status}}" data-toggle="modal" data-target="#ubahstatustask">Sedang Dikerjakan</button>&nbsp;
                        @elseif ($task->status === 'Selesai')
                          <button type="button" class="btn btn-xs btn-success" disabled="" >Menunggu Validasi</button>&nbsp;
                        @else
                          <button type="button" class="btn btn-xs btn-success" disabled="">Selesai</button>&nbsp;
                        @endif
                      </div>
                    </div>   
                  </div>            
                </div>
              @else
              @endif
            @endforeach
            @else
            @endif
          @endforeach
          <center>{!! $tasks->render() !!}</center>
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





	