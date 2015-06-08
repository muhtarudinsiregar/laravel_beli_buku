@extends('layout.main')
@@section('content')
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo Auth::user()->nama; ?></h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tbody>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?php echo Auth::user()->alamat; ?></td>
						</tr>
						<tr >
							<td>Email</td>
							<td>:</td>
							<td><?php echo Auth::user()->email; ?></td>
						</tr>
						<tr >
							<td class="col-lg-3">Nomor Handphone</td>
							<td>:</td>
							<td><?php echo Auth::user()->no_hp; ?></td>
						</tr>
						<tr>
							<td colspan="2">
								<a href="<?php echo URL::to('keranjang/konfirmasi'); ?>" class="btn btn-success">Pembelian</a>
							</td>
							<td colspan="2" class="text-right">
								<a href="<?php echo URL::to('anggota/profil') ?>" class="btn btn-warning">Perbarui Data</a>
							</td>
						</tr>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>
@stop