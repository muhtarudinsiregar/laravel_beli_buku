@extends('layout/main')
@section('content')
<div class="row">
	<h2>Tambah Penulis</h2>
</div>
<div class="row">
	<div class="col-lg-offset-3 div col-lg-9">
		@if (Session::has('message'))
		<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>

		@endif
	</div>
</div>		
	<div class="row">
		<div class="col-lg-3">
			Lorem ipsum dolor sit amet.
		</div>
		<div class="col-lg-9">
			{{ Form::model($kategori,array('route'=>array('admin.kategori.update',$kategori->id_ktgr),'class'=>'form-horizontal','method'=>'PUT')) }}
			<div class="form-group">
				<label for="inputEmail3" class="col-lg-2 control-label" name="Nama">Nama Kategori</label>
				<div class="col-lg-9 col-lg-offset-1">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
						{{-- <input type="text" class="form-control" name="kategori" value="" placeholder="Nama Kategori"> --}}
						{{ Form::text('nama', null, array('class' => 'form-control')) }}                                        
					</div>
				</div>

			</div>
			<div class="form-group">
				{{-- <label for="inputEmail3" class="col-lg-2 control-label" name="Nama"></label> --}}
				<div class="col-lg-1 col-lg-offset-3">
					<button type="submit"class="btn btn-primary">Simpan</button>
				</div>
				<div class="col-lg-1 col-lg-offset-1">
					<button type="submit"class="btn btn-danger">Kembali</button>
				</div>
			</div>

			{{ Form::close() }}
		</div>
	</div>



	@stop
