@section('sidebar')
<div class="col-lg-3">
    <div class="panel-group">
    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="<?php echo URL::to('dashboard') ?>">Dashboard</a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ URL::to('admin/buku') }}">Buku</a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ URL::to('admin/penulis') }}">Penulis</a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ URL::to('admin/kategori') }}">Kategori</a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ URL::to('admin/laporan') }}">Laporan</a>
                </h4>
            </div>
        </div>
    </div>
</div>
@stop