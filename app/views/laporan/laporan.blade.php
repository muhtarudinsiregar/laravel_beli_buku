@extends('layout/main')
@section('content')
	<div class="row">
		@include('dashboard/admin')
		<div class="col-lg-9">
			<div class="form-group">
				{{-- <button type="submit" class="btn btn-primary">Export ke PDF</button> --}}
				<a href="" class="btn btn-primary">Export ke PDF</a>
			</div>
		</div>	
	</div>
@stop