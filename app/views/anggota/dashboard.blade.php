@extends('layout.main')
@section('title')
{{ $title }}
@stop
@section('navbar')
	@include('layout.anggota_navbar')
@stop
@section('content')
	<?php if (Session::has('pesan')): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong><?php echo Session::get('pesan'); ?></strong> Alert body ...
		</div>
	<?php endif ?>
@stop