<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Cetak Laporan</title>
		<body>
			<style type="text/css">
				.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
				.tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
				.tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
				.tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
				.tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
				.tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}

				.information {background-color: #60A7A6;  color: #FFF;}
        		.information table {padding: 10px;}
			</style>
			<div style="font-family:Arial; font-size:12px;">
				<center><h2>LAPORAN PROJECT</h2></center>	
			</div>
			<table border="0" style="font-family: Arial; font-size: 13px;">
				<tr>
					<td>Nama Project</td>
					<td>:</td>
					<td>{{$post->title}}</td>
				</tr>
				<tr>
					<td>Keterangan</td>
					<td>:</td>
					<td>{{$post->content}}</td>
				</tr>
			</table>
			<br>
			<table class="tg">
			  <tr>
			    <th class="tg-3wr7">#<br></th>
			    <th class="tg-3wr7">Nama Task<br></th>
			    <th class="tg-3wr7">Keterangan<br></th>
			    <th class="tg-3wr7">Dikerjakan<br></th>
			    <th class="tg-3wr7">Status<br></th>
			  </tr>

			  @foreach ($task as $key => $tt)
			  <tr>
			    <td class="tg-rv4w" width="5%" ><center>{{ ++$key }}</center></td>
			    <td class="tg-rv4w" width="20%">{{ $tt->judul_task }}</td>
			    <td class="tg-rv4w" width="">{{ $tt->isi_task }}</td>
			    <td class="tg-rv4w" width="15%">
			    	@foreach ($tt->user as $all){{ $all->name }}, @endforeach
			    </td>
			    <td class="tg-rv4w" width="15%">{{ $tt->status }}</td>
			  </tr>
			  @endforeach
			</table>
		</body>
	</head>
</html>