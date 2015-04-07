@extends('layout/main')
@section('title')
{{ $title }}
@stop
@section('content')
{{-- <h2 class="title text-center">Tambah Buku </h2> --}}


<div class="row">
	<div class="col-lg-2">
		Lorem ipsum dolor sit amet.	
	</div>
	<div class="col-lg-10">
		{{ Form::open(array('url'=>'/store','class'=>'form-horizontal')) }}
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label" name="Nama">Judul</label>
			<div class="col-sm-9">
				<input type="text" name="judul" class="form-control input-sm" placeholder="Judul">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Penulis</label>
			<div class="col-sm-10">
				<input type="text" name="penulis" class="form-control input-sm" id="inputEmail3" placeholder="Penulis">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
			<div class="col-sm-10">
				<input type="text" name="harga" class="form-control input-sm" id="inputEmail3" placeholder="Harga">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Penerbit*</label>
			<div class="col-sm-10">
				<input type="text" name="penerbit" class="form-control input-sm" id="inputEmail3" placeholder="Penerbit">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Stok</label>
			<div class="col-sm-10">
				<input type="text" name="stok" class="form-control " id="inputEmail3" placeholder="Stok">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit"class="btn btn-primary">Tambah</button>
			</div>
		</div>

		{{ Form::close() }}
	</div>
</div>
@stop