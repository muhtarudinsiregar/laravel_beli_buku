<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-custom navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span><a class="navbar-brand span-right" href="/">BeliBuku</a></span>
            </div>
            <div class="navbar-collapse collapse" id="searchbar">
                <ul class="nav navbar-nav navbar-left">
                    <li id="userPage" class="custom-cari">
                       <li><a href="#">Pencarian</a></li>
                   </li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Daftar</a></li>
                <li><a href="{{ URL::to('login') }}">Login</a></li>
                <li><a href="{{ URL::to('keranjang') }}" class ='span-left'><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
            </ul>
            <!-- <form class="navbar-form"> -->
            <?php echo Form::open(array('url'=>'cari','class'=>'navbar-form','method'=>'GET'))?>
            <div class="form-group" style="display:inline;">
                <div class="input-group" style="display:table;">
                    <input class="form-control" id="keyword" name="search" placeholder="Judul, Pengarang" autocomplete="off" autofocus="autofocus" type="text">
                      {{--   <span class="input-group-btn" style="width:1%">
                            <select class="form-control" name="kategori">
                              <option value="0">Semua Kategori</option>
                              <option value="1">Lorem ipsum </option>
                              <option value="2">Lorem ipsum </option>
                            
                          </select>
                      </span> --}}
                      <span class="input-group-btn" style="width:1%;">
                        <button type="submit" class="btn btn-success" type="button">  <span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </div>
            <!-- </form> -->
            <?php echo Form::close(); ?>

        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">{{ $title }}</li>
            </ol>
        </div>
    </div>

    @yield('content')
</div>


<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
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