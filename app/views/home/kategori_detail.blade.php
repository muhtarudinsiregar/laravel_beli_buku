@extends('layout/main')
    @section('content')
    <div class="row">
        @include('dashboard/anggota')
        <div class="col-lg-9">
            <?php foreach($data as $buku){ ?>
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <div class="caption">
                        <?php  echo HTML::image('img/'.$buku->gambar, 'a picture',array("width"=>"115","height"=>"212")); ?>
                        <div class="caption">
                            <h4 class="judul"><a href="{{ URL::to('home/show/'.$buku->id_bk) }}"><?php    echo $buku->judul ?></a></h4>
                            <p>Oleh <?php  echo $buku->nama ?></p>
                            <p class="harga">Rp. <?php echo number_format($buku->harga,0,',','.') ?></p>
                            <p>
                            {{-- <button class="btn btn-primary btn-md"> Tambah</button> --}}
                            <a href="" class="btn btn-info btn-xs" role="button">Button</a> 
                            <a href="#" class="btn btn-default btn-xs" role="button">Button</a></p>
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
