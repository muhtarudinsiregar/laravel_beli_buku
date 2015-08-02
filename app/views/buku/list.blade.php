@extends('layout/main')
@section('sidebar')
@include('layout.sidebar')
@stop
@section('content')
	<div class="col-lg-9">
		<?php if (Session::has('notif')): ?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong><?php echo Session::get('notif'); ?></strong>
			</div>
		<?php endif ?>
		<a href="<?php echo URL::to('admin/buku/create'); ?>" class="btn btn-primary">Tambah Buku</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Gambar</th>
					<th>Judul</th>
					<th>Penulis</th>
					<th>Kategori</th>
					<th>Tahun</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $value): ?>
				<tr>
					<td> 
						<?php 
							echo HTML::image('img/'.$value->gambar, 'gambar', array('width'=>'115','heigh'=>'162'))
						?>
					</td>
					<td> <?php echo $value->judul  ; ?></td>
					<td> <?php echo $value->penulis ; ?></td>
					<td> <?php echo $value->kategori  ; ?></td>
					<td> <?php echo $value->tahun  ; ?></td>
					<td> 
						 <?php 
						 	echo Form::open(array('url'=>route('admin.buku.destroy',$value->id_bk),'method'=>'delete','class'=>'form-inline'));
						  ?>
						  <?php 
						  echo link_to('admin/buku/'.$value->id_bk.'/edit', 'Ubah', array('class'=>'btn btn-primary')); ?>
					
						<?php 
							echo Form::submit('Hapus', array('class'=>'btn btn-danger'));
							echo Form::close();
						 ?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
@stop