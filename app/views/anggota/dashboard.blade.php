@extends('layout.main')
@section('title')
{{ $title }}
@stop
@section('sidebar')
@include('layout.sidebar_anggota')
@stop
@section('content')

<div class="col-lg-9">
	<?php if (Session::has('notif')): ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong><?php echo Session::get('pesan'); ?></strong> Alert body ...
	</div>
<?php endif ?>
	<h4 class="text-center">Sejarah Transaksi</h4>
	<table class="table table-bordered table-hover">
		<thead align="center">
			<tr >
				<th>No Pemesanan</th>
				<th>Tanggal Pemesanan</th>
				<th>Total Harga</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_pemesanan as $value): ?>
			<tr align="center">
				<td><?php echo $value->id_pmsn; ?></td>
				<td><?php echo $value->tanggal_pemesanan; ?></td>
				<td >Rp. <?php echo number_format($value->total_harga,0,',','.') ?></td>
				<td>
					<a href="<?php echo URL::to('anggota/detail_pemesanan/'.$value->id_pmsn); ?>">
						Detail Pemesanan
					</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div> <!--/.col-lg-12-->
@stop