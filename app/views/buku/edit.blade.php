@extends('layout/main')
@section('title')
{{ $title }}
@stop
@section('content')
{{-- <h2 class="title text-center">Tambah Buku </h2> --}}


<div class="row">
	<div class="col-lg-3">
		Lorem ipsum dolor sit amet.	
	</div>
	<div class="col-lg-9">
		{{ Form::model($buku,array('url'=>route('admin.buku.update',['buku'=>$buku->id_bk]),'files'=>true,'class'=>'form-horizontal','method'=>'PUT')) }}
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label" name="Nama">Judul</label>
			<div class="col-lg-9 col-lg-offset-1">
				{{ Form::text('judul', null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Penulis</label>
			<div class="col-lg-9 col-lg-offset-1">
				<select class="form-control" name="penulis">
					@foreach($penulis as $value)
						<option value="{{ $value->id_pen }}"> {{ $value->nama }} </option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
			<div class="col-lg-9 col-lg-offset-1">

				<select class="form-control" name="kategori">
					@foreach($kategori as $value)
					<option value="{{ $value->id_ktgr }}"> {{ $value->nama }} </option>
					@endforeach
				</select>

			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
			<div class="col-lg-9 col-lg-offset-1">
				{{ Form::text('harga', null, array('class' => 'form-control')) }}
				{{-- <input type="text" name="harga" class="form-control input-sm" id="inputEmail3" placeholder="Harga"
				 value="{{ $value->harga }}"> --}}
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tahun</label>
			<div class="col-lg-9 col-lg-offset-1">
				{{ Form::text('tahun', null, array('class' => 'form-control')) }}
				{{-- <input type="text" name="tahun" class="form-control " id="inputEmail3" placeholder="Tahun" value="{{ $value->tahun }}"> --}}
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
			<div class="col-lg-9 col-lg-offset-1">
				<input type="file" name="gambar" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
			<div class="col-lg-9 col-lg-offset-1">
				{{ Form::textarea('deskripsi', null, array('class' => 'form-control')) }}
				{{-- <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea> --}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-9 col-lg-offset-1">
				<button type="submit"class="btn btn-primary">Tambah</button>
			</div>
		</div>

		{{ Form::close() }}
	</div>
</div>
@stop