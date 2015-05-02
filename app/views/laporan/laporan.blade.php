@extends('layout.main')
@section('navbar')
	@include('layout.admin_navbar')
@stop
@section('content')
<div class="row">
	{{-- @include('dashboard/admin') --}}
	<div class="col-lg-9 col-lg-offset-2">
		<div class="row">
			<hr>
			<h4>Statistik Total Penjualan</h4>
			<canvas id="chartPenjualan" width="400" height="400"></canvas>
		</div>
		<br>
		<div class="row">
			{{ Form::open(array('class'=>'form-inline','url'=>'export')) }}
				<div class="form-group">
					<select name="tahun" id="" class="form-control">
						<option value="bulan">Hari</option>
						<option value="bulan">Bulan</option>
						<option value="bulan">Tahun</option>
					</select>
				</div>
				<div class="form-group">
					<label for=""></label>
					<input type="submit" class="btn btn-primary" value="Export ke PDF">
				</div>
			{{ Form::close() }}
		</div>
	</div>	
</div>
@stop
@section('assets')
<script src="{{ asset('assets/js/Chart.min.js')}}"></script>
<script>
	var data = {
		labels: {{ json_encode($data_tanggal) }},
		datasets: [
		{
			fillColor: "rgba(151,187,205,0.5)",
			strokeColor: "rgba(151,187,205,0.8)",
			pointColor: "rgba(220,220,220,1)",
			pointStrokeColor: "#fff",
			pointHighlightFill: "#fff",
			pointHighlightStroke: "rgba(220,220,220,1)",
			highlightFill: "rgba(151,187,205,0.75)",
			highlightStroke: "rgba(151,187,205,1)",
			data: {{ json_encode($data_penjualan) }}
		}
		]
	};

	var ctx = document.getElementById("chartPenjualan").getContext("2d");
	var myLineChart = new Chart(ctx).Line(data);

</script>
@stop