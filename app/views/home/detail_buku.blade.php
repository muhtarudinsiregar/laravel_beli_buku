@extends('layout/main')
@section('title')
{{ $title }}
@stop
@section('content')
@if(Session::has('notifikasi'))
<div class="row">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>{{ Session::get('notifikasi')}}</strong>menambahkan buku ke keranjang belanja anda.
    </div>
</div>
@endif
{{-- tengah --}}
<div class="row">	
	<div class="col-lg-3">
		<div class="thumbnail">
			<tr>
				<td><?php echo HTML::image('img'.'/'.$data->gambar,"Gambar Buku", ['width'=>'199','height'=>'330']) ?></td>
			</tr>
		</div>
	</div>
	<div class="col-lg-5">
		<div class="row">
			<div class="col-lg-12">
				<h3><?php echo $data->judul; ?></h3>
			</div>
		</div>
		<div class="row">
			<table class="table">
				<tr>
					<th>Penulis</th>
					<td><?php echo $data->nama; ?></td>
				</tr>
				<tr>
					<th>Harga</th>
					<td class="harga"><?php echo $data->harga; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-lg-4">
		{{-- <form class="form-inline"> --}}
		{{ Form::open(['url'=>'keranjang','class'=>'form-horizontal','method'=>"post"]) }}
		{{ Form::hidden('id_bk', $data->id_bk) }}
		{{-- {{ var_dump(Input::get('id_bk')); }} --}}
		<div class="form-group">
			<label for="inputPassword" class="col-sm-offset-2 col-lg-2 control-label">Jumlah </label>
			<div class="col-sm-3">
				<input required type="number" class="form-control" min="0" max="50" name="jml_bk">
			</div>
		</div>

		<div class="form-group">
			<label for="" class="control-label col-lg-2"></label>
			<input type="submit" name="addItem" value="Tambah" class="btn btn-primary">
			{{-- <button name="addItem" class="raised btn btn-primary btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> Masukkan Ke Keranjang</button> --}}
		</div>
		{{ Form::close()}}
	</div>
</div>

<div class="row">
	<table class="table">
		<tr>
			<th>Keterangan</th>
			<td><?php echo $data->deskripsi; ?></td>
		</tr>
		<tr>
			<th>Profil Penulis</th>
			<td><?php echo $data->profil; ?></td>
		</tr>
	</table>
</div>
@stop