@extends('layout/main')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail" >
				<h4 class="text-center"><span class="label label-info">Samsung</span></h4>
				<img src="http://placehold.it/650x450&text=Galaxy S5" class="img-responsive">
				<div class="caption">
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<h3>{{ $data->judul }}</h3>
						</div>
						<div class="col-md-6 col-xs-6 price">
							<h3>
								<label>$649.99</label></h3>
							</div>
						</div>
						<p>32GB, 2GB Ram, 1080HD, 5.1 inches, Android</p>
						<div class="row">
							<div class="col-md-6">
								<a class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a> 
							</div>
							<div class="col-md-6">
								<a href="{{ URL::to('')}}" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</a></div>
							</div>

							<p> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@stop