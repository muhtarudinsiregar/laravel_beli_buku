@extends('layout.main')
@section('sidebar')
@include('layout.sidebar')
@stop
@section('content')
<div class="col-lg-9">
	<div class="row">
		<div class="panel panel-primary">
			  <div class="panel-heading">
					<h3 class="panel-title">Statistik Total Penjualan</h3>
			  </div>
			  <div class="panel-body">
					<canvas id="chartPenjualan" width="400" height="300"></canvas>
			  </div>
		</div>
	</div>
	<div class="row">
		<?php echo Form::open(array('class'=>'form-inline','url'=>'export')); ?>
			<div class="form-group">
				<label for=""></label>
				<input type="submit" class="btn btn-primary" value="Export ke PDF">
			</div>
			<?php echo Form::close() ; ?>
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