@extends('layout/main')
@section('content')
{{-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> --}}
<div class="row">
    <div class="col-lg-12">
        <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Buku</th>
                {{-- <th style="width:10%">Harga</th> --}}
                <th style="width:13%">Jumlah</th>
                <th style="width:27%" class="text-center">Total</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
        @if(Session::has('items'))
        @foreach($data_book as $value)
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
                        </div>
                    </div>
                </td>
                {{-- <td data-th="Price">Rp {{ $value->harga }}</td> --}}
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="{{ $value->jumlah_buku }}" min=0>
                </td>
                <td data-th="Subtotal" class="text-center">
                    Rp {{ number_format($value->total,0,',','.') }}
                </td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>                                
                </td>
            </tr>
           
        @endforeach
            {{ $notif }}
        @else

        @endif
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total 1.99</strong></td>
            </tr>
            <tr>
                <td><a href="{{ URL::previous() }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Lanjut Berbelanja</a></td>
                <td colspan="2" class="hidden-xs"></td>
                {{-- <td class="hidden-xs text-center"><strong>Total Harga $total->total</strong></td> --}}
                <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
        </tfoot>
    </table>
    </div>
</div>
@stop