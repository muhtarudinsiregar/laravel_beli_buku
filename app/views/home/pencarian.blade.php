@extends('layout/main')
    @section('content')
    <div class="row">
        @include('dashboard/anggota')
        <div class="col-lg-9">
            <?php foreach($data as $value){ ?>
            <div class="col-md-3" align="center">
                <div class="thumbnail thumbnail-custom">
                    <div class="caption">
                        <?php  echo HTML::image('img/'.$value->gambar, 'a picture'); ?>
                        <div class="caption">
                            <h5 class="judul text-center">
                                <?php echo HTML::link('home/show/'.$value->id_bk, $value->judul) ?>
                            </h5>
                            <h6>Oleh :<?php  echo $value->nama ?></h6>
                            <h6 class="harga">Rp. <?php echo number_format($value->harga,0,',','.') ?></h6>
                            
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
