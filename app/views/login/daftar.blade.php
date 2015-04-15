@extends('layout/main')
@section('content')

<div class="container">    
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                 
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Daftar </div>
				{{-- <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> --}}
			</div>     

			<div style="padding-top:30px" class="panel-body" >
				@if($errors->has())
				<div class="alert alert-danger">
					<ul class="square">
						@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				{{-- <form id="loginform" class="form-horizontal" role="form"> --}}
				{{ Form::open(array('url'=>'store','class'=>'form-horizontal','method'=>'POST','id'=>'loginform')) }}
				<div class="form-group">
					<label for="email" class="col-md-3 control-label">Email</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="email" placeholder="Alamat Email" 
						value="{{ Input::old("email") }}">
					</div>
				</div>

				<div class="form-group">
					<label for="firstname" class="col-md-3 control-label">Nama Lengkap</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
					</div>
				</div>
				<div class="form-group">
					<label for="firstname" class="col-md-3 control-label">Nomor Hp</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="no_hp" placeholder="Nomor HP">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-md-3 control-label">Password</label>
					<div class="col-md-9">
						<input type="password" class="form-control" name="password" placeholder="Password"> 
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-md-3 control-label">Ulangi Password</label>
					<div class="col-md-9">
						<input type="password" class="form-control" name="re_password" placeholder=" Ulangi Password"> 
					</div>
				</div>
				<div class="form-group">
					<!-- Button -->                                        
					<div class="col-md-offset-3 col-md-9">
						<button id="btn-signup" type="submit" class="btn btn-info">Daftar</button>
						<span style="margin-left:8px; margin-right:8px;">or</span>
						<button id="btn-signup" type="submit" class="btn btn-success">Masuk
						</button>
					</div>
				</div>
				{{ Form::close() }}    
			</div>                     
		</div>  
	</div>
</div>

@stop