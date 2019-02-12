<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/parsley.min.css') }}">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.2/multiple-select.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.2/multiple-select.min.js"></script> 
</head>
<body>
	<br>
	<br>
	<div class="col-md-8 col-md-offset-2">
		<div class="form-group">
			<label>Judul Task :</label>
			<input type="text" class="form-control" id="judul_task" name="judul_task" value="{{$task->judul_task}}">
		</div>
		<div class="form-group">
			<label>Deadline : </label>
			<input type="date" class="form-control" id="judul_task" name="judul_task" value="{{$task->deadline}}">
		</div>
		<div class="form-group">
			<label>Pilih User :</label>
			<select class="form-control select2-multi" multiple="multiple" name="user[]">
				@foreach($user as $us)
					<option value="{{$us}}"></option>
				@endforeach
			</select>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script type="text/javascript">
    	$('.select2-multi').select2();
    </script>
</body>
</html>