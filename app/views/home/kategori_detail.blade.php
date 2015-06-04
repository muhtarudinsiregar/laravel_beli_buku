@extends('layout/main')
    @section('content')
    <div class="row">
        @include('dashboard/anggota')
        <div class="col-lg-9">
            <?php foreach($data as $buku){ ?>
            <div class="col-xs-18 col-sm-6 col-md-3" align="center">
                <div class="thumbnail thumbnail-custom">
                    <div class="caption">
                        <?php  echo HTML::image('img/'.$buku->gambar, 'a picture',array("width"=>"115","height"=>"212")); ?>
                        <div class="caption">
                            <h5 class="judul"><a href="{{ URL::to('home/show/'.$buku->id_bk) }}"><?php    echo $buku->judul ?></a></h5>
                            <h6>Oleh <?php  echo $buku->penulis ?></h6>
                            <h4 class="harga">Rp. <?php echo number_format($buku->harga,0,',','.') ?></h4>
                            
                        </div>
                    </div>
                
                </div>
            </div>
            <?php } ?>
        </div>    
    </div><!--features_items-->
    @stop
    <?php  ?>
    <!-- Single button -->
