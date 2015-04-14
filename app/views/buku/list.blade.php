@extends('layout/main')
@section('title')
{{ $title }}
@stop
@section('content')
	<div class="row">
		<div class="col-lg-3">Lorem ipsum dolor.</div>
		<div class="col-lg-9">
			<table class="table table-hover">
				<thead>
					<tr>
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
						<td> {{ $value->judul }} </td>
						<td> {{ $value->penulis }} </td>
						<td> {{ $value->kategori }} </td>
						<td> {{ $value->tahun }} </td>
						<td> {{ link_to('buku/'.$value->id_bk.'/edit') }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop