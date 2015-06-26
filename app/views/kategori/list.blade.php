@extends('layout/main')
@section('sidebar')
@include('layout.sidebar')
@stop
@section('content')
<div class="col-lg-9">
	<a href="<?php echo URL::to('admin/kategori/create'); ?>" class="btn btn-primary">Tambah Kategori</a>
	<br>
	<br>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Panel title</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>
						<th><span class="glyphicon glyphicon-menu-down"></span></th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1 ?>
					<?php foreach ($data as $value): ?>


						<tr>
							<td> {{ $no++ }} </td>
							<td> {{ $value->nama }} </td>
							<td>
								<?php echo Form::open(array('url'=>route('admin.kategori.destroy',$value->id_ktgr),'method'=>'delete','class'=>'form-inline')); ?>
								<a href="{{ URL::to('admin/kategori/'.$value->id_ktgr.'/edit') }}" class="btn btn-primary">Ubah</a>
								<?php echo Form::submit('Hapus', array('class'=>'btn btn-danger')); ?>
								<?php echo Form::close(); ?>
								{{-- <a href="{{ URL::to('kategori/'.$value->id_ktgr) }}" class="btn btn-primary">Hapus</a> --}}
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop