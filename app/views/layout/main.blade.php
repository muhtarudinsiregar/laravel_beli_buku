<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
  @section('navbar')
  <nav class="navbar navbar-custom navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class=""><a class="navbar-brand brand-custom span-right" href="<?php echo URL::to('/') ?>"><span class="fa fa-book"></span> BeliBuku</a></span>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Link</a></li> -->
        <li><a href="#">Pencarian</a></li>
      </ul>
      <div class="col-sm-3 col-md-6">
       <?php echo Form::open(array('url'=>'cari','method'=>'GET','class'=>"navbar-form")); ?>
       <div class="input-group col-md-12">
        <input type="text" class="form-control" placeholder="Judul, Pengarang" name="search">
        <div class="input-group-btn">
          <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      <?php echo Form::close() ?>
    </div>
    <ul class="nav navbar-nav navbar-left">
      <li><a href="<?php echo URL::to('keranjang'); ?>"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
     @if (Auth::check())
        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->nama }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo URL::to('anggota/dashboard'); ?>">Sejarah Transaksi</a></li>
                      <li><a href="#">Profil</a></li>
                      <li class="divider"></li>
                      <li><a href="{{ URL::to('logout') }}">Keluar</a></li>
                    </ul>
                </li>
    @else
         <li><a href="<?php echo URL::to('daftar'); ?>">Daftar</a></li>
      <li><a href="<?php echo URL::to('login'); ?>">Login</a></li>
     @endif
      
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<ol class="breadcrumb item">
<li class=""><a href="<?php echo URL::to('/'); ?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
  <li class="active"></li>
</ol>
@show
<div class="container">
 	<div class="row">
      <ol class="breadcrumb breadcrumb-custom item">
        <li><a href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li class="active">{{ $title }}</li>
      </ol>
  	</div>
	<div class="row">
		@yield('sidebar')
    
    @yield('content')
    </div>
	
    
 
</div>


<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@yield('assets')
<script>
  $('#profiles').keyup(function () {
    var max = 250;
    var len = $(this).val().length;
    if (len >= max) {
      $('#charNum').text(' you have reached the limit');
    } else {
      var char = max - len;
      $('#charNum').text(char + ' characters left');
    }
  });
</script>
</body>
</html>