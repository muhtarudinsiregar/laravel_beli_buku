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
		{{ Form::model($penulis,array('route'=>array('admin.penulis.update',$penulis->id_pen),'class'=>'form-horizontal','method'=>'PUT')) }}

		<div class="form-group">
			<label for="inputEmail3" class="col-lg-2 control-label" name="Nama">Nama Penulis</label>
			<div class="col-lg-9 col-lg-offset-1">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					{{ Form::text('nama', null, array('class' => 'form-control','placeholder'=>'masukkan nama')) }}
					<!-- <input required id="penulis" type="text" class="form-control" name="penulis" placeholder="Nama Penulis" value="{{ $penulis->nama }}">                                         -->
				</div>
			</div>

		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-lg-2 control-label" name="Nama">Profil Penulis</label>
			<div class="col-lg-9 col-lg-offset-1">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
					<textarea required id="profiles" style="resize:none" id="" cols="30" rows="7" type="text" class="form-control" name="profil" placeholder="Profil Penulis"> {{ $penulis->profil }} </textarea>
				</div>
			</div>                                       
		</div>
		<div class="form-group">
			<div class="col-lg-4 col-lg-offset-3">
				<div id="charNum"></div>
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
