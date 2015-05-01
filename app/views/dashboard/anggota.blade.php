<div class="col-sm-3">
	<div class="left-sidebar">
		<!-- <h2>Category</h2> -->
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			<?php foreach ($kategori as $value) {	?>
			<div class="panel panel-default">
				<div class="panel-heading">
				<h4 class="panel-title"><a href="{{ URL::to('kategori/'.$value->id_ktgr) }}"><?php echo $value->nama; ?></a></h4>
				</div>
			</div>
			<?php }; ?>
		</div><!--/category-productsr-->
	</div>
</div>