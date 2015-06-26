@extends('layout/main')
@section('sidebar')
@include('layout.sidebar')
@stop
@section('content')
<div class="col-lg-9">
	<a class="btn btn-primary" href="<?php echo URL::to('admin/penulis/create'); ?>">Tambah Penulis</a>
	<br>
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">List Penulis</h3>
		</div>
		<div class="panel-body">
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
					<?php foreach ($data as $value): ?>
					<tr>
						<td> <?php echo $no++; ?> </td>
						<td> <?php echo $value->nama ; ?></td>
						<td>
							{{ Form::open(array('url'=>route('admin.penulis.destroy',$value->id_pen),'method'=>'delete','class'=>'form-inline')) }}
							<a href="{{ URL::to('admin/penulis/'.$value->id_pen.'/edit') }}" class="btn btn-primary">Ubah</a>
							<?php echo Form::submit('Hapus', array('class'=>'btn btn-danger','type'=>'reset')); ?>
							<?php echo Form::close(); ?> 
						</td>

					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop