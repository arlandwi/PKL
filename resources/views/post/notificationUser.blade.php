@extends('layouts.app')

@section('content')
	<div class="container">
		<center>
			<h2>All Task</h2>
		</center>
	</div>
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @foreach ($tasks as $task)
            @foreach($task->user as $us)
              @if($us->id === Auth::user()->id)
                <br>
                <div class="col-md-10 col-md-offset-1">
                  <sup>{{ $task->created_at->diffForHumans() }}</sup>
                  <div class="panel panel-default">
                    <div class="panel-heading" style="background: #E5E5E5;">
                      <STRONG>{{ $task->judul_task }}</STRONG>
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
          @endforeach
          <center>{!! $tasks->render() !!}</center>
        </div>
    </div>
  </div>
</div>


          <!-- Modal Lihat Detail -->
  <div class="modal fade" id="lihatuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"  id="myModalLabel">Detail Task</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background-color: #eee;">
          <div class="panel-body" >
            @if($tasks->isEmpty())

            @else
            <center>
            <table border="0" cellspacing="5" width="530">
              <tr>
                <td width="100">Nama Project</td>
                <td width="15"> : </td>
                <td><input type="text" class="form-control" style="border-style: none;" name="project" id="project" value="" readonly=""></td>
              </tr>
              <tr>
                <td width="100">Nama Task</td>
                <td width="15"> :</td>
                <td><input type="text" class="form-control" style="border-style: none;" name="judul" id="judul" value="" readonly=""></td>
              </tr>
              <tr>
                <td width="100">Dikerjakan</td>
                <td width="15"> :</td>
                <td><input type="text" class="form-control" style="border-style: none;" name="id" id="id" value="" readonly="">
                </td>
              </tr>
              <tr>
                <td width="100">Deadline</td>
                <td width="15"> :</td>
                        <td><input type="text" class="form-control" style="border-style: none;" name="deadline" id="deadline" value="" readonly=""></td>
              </tr>
                <td width="100">Keterangan</td>
                <td width="15"> :</td>
                <td><input type="text" class="form-control" style="border-style: none;" name="isi" id="isi" value="" readonly=""></td>
              </tr>
            </table>
            </center>

            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Ubah Status Task -->
  <div class="modal fade" id="ubahstatustask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Ubah Status Task</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="panel-body">
            <form action="{{route('post.status.update.taskuser')}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
              <input type="hidden" name="id" id="id" value="">
              <p>Status Pengerjaan Task <input style="text-align: center; border-style: none;" type="text" id="status" value="" disabled></p>
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
