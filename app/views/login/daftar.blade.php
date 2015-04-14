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

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form id="loginform" class="form-horizontal" role="form">
					<div id="signupalert" style="display:none" class="alert alert-danger">
						<p>Error:</p>
						<span></span>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-3 control-label">Email</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="email" placeholder="Email Address">
						</div>
					</div>

					<div class="form-group">
						<label for="firstname" class="col-md-3 control-label">Nama</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="firstname" placeholder="Nama">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-md-3 control-label">Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="passwd" placeholder="Password"> 
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-md-3 control-label">Re Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="passwd" placeholder=" Re Password"> 
						</div>
					</div>
					<div class="form-group">
						<!-- Button -->                                        
						<div class="col-md-offset-3 col-md-9">
							<button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Daftar</button>
							<span style="margin-left:8px;">or</span>
							<button id="btn-signup" type="button" class="btn btn-success"><i class="icon-hand-right"></i> &nbsp Masuk
							</button>
						</div>
					</div>
				{{ Form::close() }}    
			</div>                     
		</div>  
	</div>
</div>

@stop