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
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Edit Buku</h3>
		</div>
		<div class="panel-body">
			<div class="col-lg-12">
				<?php echo Form::model($buku,array('url'=>route('admin.buku.update',['buku'=>$buku->id_bk]),'files'=>true,'class'=>'form-horizontal','method'=>'PUT')); ?>
				<div class="row">
					<div class="col-lg-5">	
						<div class="form-group">
							<label for="nama">Judul Buku</label>
							<?php echo Form::text('judul', null, array('class' => 'form-control')); ?>
						</div>
					</div>
					<div class="col-lg-5 col-md-offset-1">	
						<div class="form-group">
							<label for="nama">Harga Buku</label>
							<?php echo Form::text('harga', null, array('class' => 'form-control')); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						<div class="form-group">
							<label for="nama">Kategori Buku</label>
							<select name="kategori" class="form-control">
							<?php 
								foreach($kategori as $value){
									$selected = ($value->id_ktgr == $buku->id_ktgr)? "selected='selected'":''; //sets html flag
     				 			echo "<option value='$value->id_ktgr' $selected>$value->nama</option>\n";
     				 		}?>	
							</select>
						</div>
					</div>
					<div class="col-lg-5 col-lg-offset-1">
						<div class="form-group">
							<label for="nama">Tahun</label>
							<?php echo Form::text('tahun', null, array('class' => 'form-control')); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						<div class="form-group">
							<label for="nama">Penulis</label>
							<select name="penulis" class="form-control">
								<?php 
								foreach($penulis as $value){
									$selected = ($value->id_pen == $buku->id_pen)? "selected='selected'":''; //sets html flag
     				 			echo "<option value='$value->id_pen' $selected>$value->nama</option>\n";
     				 		}?>	
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
							<?php echo Form::textarea('deskripsi', null, array('class' => 'form-control')); ?>	
						</div>
					</div>
					<div class="col-lg-3 col-lg-offset-1">
						<div class="form-group">
							<div class="row">
								<label for=""></label>
								<button class="btn btn-primary" type="submit">Update</button>
								<a href="<?php echo URL::to('admin/buku/'); ?>" class="btn btn-danger col-lg-offset-1">Batal</a>
							</div>
						</div>
					</div>
				</div>
			<?php Form::close()  ?>
			</div>
		</div>
	</div>
</div>
@stop
