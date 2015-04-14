@extends('layout/main')
@section('content')
	<div class="row">
		
		<div class="col-lg-3">Lorem ipsum dolor sit amet.</div>
		<div class="col-lg-9">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Penulis</th>
						<th><span class="glyphicon glyphicon-menu-down"></span></th>
					</tr>
				</thead>
				<tbody>
				<?php $no=1 ?>
				@foreach($data as $value)
					<tr>
						<td> {{ $no++ }} </td>
						<td> {{ $value->nama }} </td>
						<td>
							{{ Form::open(array('url'=>route('penulis.destroy',$value->id_pen),'method'=>'delete','class'=>'form-inline')) }}
								<a href="{{ URL::to('penulis/'.$value->id_pen.'/edit') }}" class="btn btn-primary">Ubah</a>
								{{ Form::submit('Hapus', array('class'=>'btn btn-danger')) }}
							{{ Form::close() }}
						</td>

					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop