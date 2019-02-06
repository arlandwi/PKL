<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/parsley.min.css') }}">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.2/multiple-select.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.2/multiple-select.min.js"></script> 
</head>
<body>
	<p>
		hello!

	</p>
	<p>
		@foreach ($task->user as $all)
					<span class="label label-default">{{ $all->name }}</span>
				@endforeach
</body>
</html>
<form action="{{ route('coba',$task->id)}}">
							                		{{ csrf_field() }}
							                		<button type="submit" data-toggle="modal" data-target="lihat" class="btn btn-xs btn-success" >Lihat Detail</button>&nbsp; 
							                		</form>