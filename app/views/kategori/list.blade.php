@extends('layout/main')
@section('content')
	<div class="row">
		
		<div class="col-lg-3">Lorem ipsum dolor sit amet.</div>
		<div class="col-lg-9">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>
						<th><span class="glyphicon glyphicon-menu-down"></span></th>
					</tr>
				</thead>
				<tbody>
				<?php $no=1 ?>
				@foreach($data as $value)
					<tr>
						<td> {{ $no++ }} </td>
						<td> {{ $value->nama }} </td>
						<td>
							
							{{ Form::open(array('url'=>route('kategori.destroy',$value->id_ktgr),'method'=>'delete','class'=>'form-inline')) }}
								{{ Form::submit('Hapus', array('class'=>'btn btn-danger')) }}
							<a href="{{ URL::to('kategori/'.$value->id_ktgr.'/edit') }}" class="btn btn-primary">Ubah</a>
							{{ Form::close() }}
                        	{{-- <a href="{{ URL::to('kategori/'.$value->id_ktgr) }}" class="btn btn-primary">Hapus</a> --}}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop