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
		<div class="row">
			<a href="" class="btn btn-primary">Export ke PDF</a>
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
	var myLineChart = new Chart(ctx).Bar(data);

</script>
@stop