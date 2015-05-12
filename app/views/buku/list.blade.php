@extends('layout/main')
@section('title')
{{ $title }}
@stop
@section('navbar')
	@include('layout/admin_navbar')
@stop
@section('content')
<div class="row">
	{{-- <div class="col-lg-3">Lorem ipsum dolor.</div> --}}
	<div class="col-lg-12">
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
				@foreach($data as $value)
				<tr>
					<td> <?php echo HTML::image('img/'.$value->gambar, 'gambar', array('width'=>'115','heigh'=>'162')) ?></td>
					<td> <?php echo $value->judul  ; ?></td>
					<td> <?php echo $value->penulis ; ?></td>
					<td> <?php echo $value->kategori  ; ?></td>
					<td> <?php echo $value->tahun  ; ?></td>
					<td> 
						{{ Form::open(array('url'=>route('admin.buku.destroy',$value->id_bk),'method'=>'delete','class'=>'form-inline')) }}
						<a href="{{ URL::to('admin/buku/'.$value->id_bk.'/edit') }}" class="btn btn-primary">Ubah</a>
						{{ Form::submit('Hapus', array('class'=>'btn btn-danger')) }}
						{{ Form::close() }}

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop