@extends('layout/main')
    @section('content')
    <div class="row">
            <?php foreach($data as $value){ ?>
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <div class="caption">
                        <?php  echo HTML::image('img/'.$value->gambar, 'a picture'); ?>
                        <div class="caption">
                            <h4 class="judul"> <?php    echo $value->judul ?> </h4>
                            <p>Oleh <?php  echo $value->nama ?></p>
                            <p class="harga">Rp. <?php echo number_format($value->harga,0,',','.') ?></p>
                            <p><a href="#" class="btn btn-info btn-xs" role="button">Button</a> <a href="#" class="btn btn-default btn-xs" role="button">Button</a></p>
                        </div>
                    </div>
                
                </div>
            </div>
            <?php } ?>
        </div><!--features_items-->
    @stop
    <?php  ?>
    <!-- Single button -->
