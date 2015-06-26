@extends('layout/main')
@section('sidebar')
@include('layout.sidebar')
@stop
@section('content')
	<div class="col-lg-9">
	<?php if (Session::has('notif')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong><?php echo Session::get('notif'); ?></strong>
		</div>
	<?php endif ?>
	<div class="panel panel-default">
		<div class="panel-heading">Tambah Buku</div>
			<div class="panel-body">
				<div class="col-md-12">
					<?php echo Form::open(array('url'=>'admin/buku','class'=>'form-horizontal','method'=>'POST','files'=>true)); ?>
					<div class="row">
						<div class="col-lg-5">	
							<div class="form-group">
								<label for="nama">Judul Buku</label>
								<input type="text" class="form-control" name="judul" placeholder="Judul Buku">
							</div>
						</div>
						<div class="col-lg-5 col-md-offset-1">	
							<div class="form-group">
								<label for="nama">Harga Buku</label>
								<input type="text" class="form-control" name="harga" placeholder="Harga Buku">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-5">
							<div class="form-group">
								<label for="nama">Kategori Buku</label>
								<select name="kategori" class="form-control">
									<?php foreach ($kategori as $value): ?>
										<option value="<?php echo $value->id_ktgr; ?>"> <?php echo $value->nama; ?> </option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-lg-5 col-lg-offset-1">
								<div class="form-group">
									<label for="nama">Tahun</label>
									<input type="text" class="form-control" name="tahun" placeholder="Tahun">
								</div>
						</div>
					</div>
					<div class="row">
							<div class="col-lg-5">
								<div class="form-group">
									<label for="nama">Penulis</label>
									<select name="penulis" class="form-control">
										<?php foreach ($penulis as $value): ?>
											<option value="<?php echo $value->id_pen ?>"><?php echo $value->nama; ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-lg-offset-1">
								<div class="form-group">
									<label for="nama">Gambar</label>
									<input type="file" class="form-control" name="gambar" placeholder="Gambar Buku">
								</div>
							</div>
					</div>
					<div class="row">
							<div class="col-lg-5">
								<div class="form-group">
									<label for="nama">Deskripsi</label>
									<textarea class="textarea form-control"  cols="" rows="8" name="deskripsi"></textarea>		
								</div>
								</div>
							<div class="col-lg-3 col-lg-offset-1">
								<div class="form-group">
									<div class="row">
										<label for=""></label>
										<button class="btn btn-primary" type="submit">Tambah</button>
										<button class="btn btn-danger col-lg-offset-1 " type="reset">Reset</button>
									</div>
								</div>
							</div>
					</div>
					<?php echo Form::close() ?>
				<!-- </form> -->
			</div> <!--/.col -md-12 -->
		</div> <!--/.panel-body -->
	</div> <!--/.panel-default -->
</div> <!--/.col-lg-12-->
@stop