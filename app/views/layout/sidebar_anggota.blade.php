@section('sidebar')
<div class="col-lg-3">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ URL::to('anggota/dashboard') }}"><span class="glyphicon glyphicon-dashboard"></span>  Dashboard</a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ URL::to('anggota/profil') }}"><span class="glyphicon glyphicon-user"></span> Profil</a>
                </h4>
            </div>
        </div>
    </div>
</div>
@stop