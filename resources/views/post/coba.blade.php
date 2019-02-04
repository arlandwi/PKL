<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>
		hello!

	</p>
	<p>
		@foreach ($task->user as $all)
					<span class="label label-default">{{ $all->name }}</span>
				@endforeach
	</p>

</body>
</html>