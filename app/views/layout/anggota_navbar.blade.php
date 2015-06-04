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
        <ul class="nav navbar-nav navbar-left">
            <li><a href="{{ URL::to('daftar') }}">Sejarah Transaksi</a></li>
            <li><a href="{{ URL::to('kategori') }}">Kategori</a></li>
            <li><a href="{{ URL::to('login') }}">Penulis</a></li>
            <li><a href="{{ URL::to('laporan') }}">Laporan</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ URL::to('keranjang') }}" class ='span-left'><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
         </ul>
      </div><!--/.nav-collapse -->
   </div>
</nav>