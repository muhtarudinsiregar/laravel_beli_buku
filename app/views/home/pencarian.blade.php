@extends('layout/main')
    @section('content')
    <div class="row">
        @include('dashboard/anggota')
        <div class="col-lg-9">
            <?php foreach($data as $value){ ?>
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <div class="caption">
                        <img src="<?php  ?>" alt="">
                        <?php  echo HTML::image('img/'.$value->gambar, 'a picture',array("width"=>"115","height"=>"212")); ?>
                        <div class="caption">
                            <h5 class="judul text-center">
                                <?php echo HTML::link('home/show/'.$value->id_bk, $value->judul) ?>
                            </h5>
                            <p>Oleh :<?php  echo $value->nama ?></p>
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
