@extends('layout/main')
@section('content')
<div class="row">
<?php var_dump(Session::all()); ?>
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th class="text-center" style="width:50%">Buku</th>
                    {{-- <th style="width:10%">Harga</th> --}}
                    <th class="text-center" style="width:13%">Jumlah</th>
                    <th class="text-center" style="width:27%" class="text-center">Total</th>
                    <th class="text-center" style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
            <?php if (Session::has('notif')): ?>
                <?php var_dump(Session::all()) ?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><?php echo Session::get('notif'); ?></strong>   
                    </div>
            <?php endif ?>
                <?php if (Session::get('items')): ?>
                    <?php foreach ($data_book as $key =>$value): ?>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs">
                                    {{-- <img src="http://placehold.it/100x100" alt="..." class="img-responsive"/> --}}
                                    <?php  echo HTML::image('img/'.$value->gambar, 'a picture',array("class"=>"img-responsive","width"=>"100","height"=>"100")); ?>
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin"><a href="{{ URL::to('home/show/'.$value->id_bk) }}">{{ $value->judul }}</a></h4>
                                    <p class="harga">Rp. {{ number_format($value->harga,0,',','.') }}</p>

                                    <?php echo Form::open(array('url'=>route('keranjang.destroy',$key),'method'=>'delete','class'=>'form-inline')) ; ?>
                                    <br>
                                    <?php echo Form::button('<i class="fa fa-trash-o"> Hapus</i>', array('class'=>'btn btn-danger','type'=>'submit')); ?>
                                {{ Form::close() }}     
                                </div>
                            </div>
                        </td>
                        {{-- <td data-th="Price">Rp {{ $value->harga }}</td> --}}
                        <?php echo Form::open(array('url'=>'keranjang/'.$key,'method'=>'PUT')) ?>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="{{ $value->jumlah_buku }}" min=1 name="jml_bk">
                        </td>
                        <td data-th="Subtotal" class="text-center">
                            Rp <?php echo number_format($value->total,0,',','.'); ?>
                        </td>
                        <td class="actions" data-th="">
                            <?php echo Form::button(' Update ', array('class'=>'btn btn-primary','type'=>'submit')); ?>
                                                    
                        </td>
                         <?php echo Form::close() ?>  
                    </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <?php var_dump(Session::has('get')) ?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Keranjang masih Kosong</strong>
                    </div>
                <?php endif ?>
            </tbody>
            <tfoot>
                 <tr>
                    <td colspan="" class="hidden-xs"></td>
                    <td class="text-center">
                        <h4>
                            <strong>Total Harga</strong>
                        </h4>
                    </td>
                    <td class="text-center">
                        <h4>
                            <strong>Rp <?php echo number_format($total,0,',','.'); ?></strong>

                        </h4>
                    </td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td>
                        <a href="<?php echo URL::to('/'); ?>" class="btn btn-warning">
                            <i class="fa fa-angle-left"></i> Lanjut Berbelanja
                        </a>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td>
                        <?php if (Session::has('items')): ?>
                        <a href="<?php echo URL::to('keranjang/pesan'); ?>" class="btn btn-info btn-block">
                        Konfirmasi Pembayaran <i class="fa fa-angle-right"></i>
                        </a>
                        <?php endif ?>
                    </td>
                </tr>
            </tfoot>
        </table>
</div>
@stop