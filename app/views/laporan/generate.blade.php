<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 align="center">Laporan Penjualan Buku Tahun 2015</h1>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<table border="1" width="540">
					<thead>
						<tr>
							<td align="center">No</td>
							<td align="center">Bulan</td>
							<td align="center">Jumlah</td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($data as $value): ?>
						<tr>
							<td align="center"><?php echo $i; ?></td>
							<td align="center"><?php echo $value->tanggal; ?></td>
							<td align="center">Rp. <?php echo number_format($value->total,0,',','.'); ?></td>
						</tr>
						<?php $i++; ?>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" align="center">Total Penjualan</td>
							<td align="center">Rp. <?php echo $total; ?></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</body>
</html>