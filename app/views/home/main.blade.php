@extends('layout/main')
    @section('content')
    <div class="row">
        @include('dashboard/anggota')
        <div class="col-lg-9">
            <?php foreach($data as $value){ ?>
            <div class="col-lg-3" align="center" style="padding:10px 18px">
                <div class="thumbnail">
                    <div class="caption">
                        <?php  echo HTML::image('img/'.$value->gambar, 'a picture',array("width"=>"98","height"=>"160")); ?>
                        <div class="caption">
                            <h4 class="judul"><a href="{{ URL::to('home/show/'.$value->id_bk) }}"><?php    echo $value->judul ?></a></h4>
                            <p>Oleh : <?php  echo $value->nama ?></p>
                            <p class="harga">Rp. <?php echo number_format($value->harga,0,',','.') ?></p>
                            <p>
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
