<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		{{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 class="text-center">Laporan Penjualan</h1>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td class="text-center">No</td>
							<td class="text-center">Bulan</td>
							<td class="text-center">Jumlah</td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						@foreach($data as $value)
						<tr>
							<td class="text-center">{{ $i }}</td>
							<td class="text-center">{{ $value->tanggal }}</td>
							<td class="text-center">Rp. {{ number_format($value->total,0,',','.') }}</td>
						</tr>
						<?php $i++; ?>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" class="text-center">Jumlah Total</td>
							<td class="text-center">Rp. {{ $total }}</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>