<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					
				<?php include("menu.php"); ?>
					
				</div>
			</div>

			<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">
				<!-- Product -->
				<h2><?php echo $title ?></h2>
				<p>Berikut adalah Riwayat Belanja Anda</p>

				<?php if($header_transaksi) 
				{ 
				?>
				<table class="table table-bordered" width="100%">
					<thead>
						<tr>
							<th width="20%">Kode Transaksi</th>
							<th>: <?php echo $header_transaksi->kode_transaksi; ?></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tanggal</td>
							<td>: <?php echo date ('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?>
							</td>
						</tr>
						<tr>
							<td>Jumlah Total</td>
							<td>Rp. <?php echo number_format($header_transaksi->jumlah_transaksi); ?></td>
						</tr>
						<tr>
							<td>Status Bayar</td>
							<td><?php echo $header_transaksi->status_bayar; ?></td>
						</tr>
					</tbody>
				</table>

				<table class="table table-bordered" width="100%">
					<thead>
						<tr class="bg-success">
							<th>No</th>
							<th>Kode Transaksi</th>
							<th>Nama Produk</th>
							<th>jumlah Item</th>
							<th>harga</th>
							<th>Sub Total</th>
						</tr>
					</thead>
					<?php $i=1; foreach($transaksi as $transaksi) { ?>
					<tbody>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $transaksi->kode_produk; ?></td>
							<td><?php echo $transaksi->nama_produk;?></td>
							<td><?php echo $transaksi->jumlah; ?></td>
							<td>Rp. <?php echo number_format($transaksi->harga); ?></td>
							<td>Rp. <?php echo number_format($transaksi->total_harga); ?></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
				<?php }else{ ?>
				<p class="alert alert-success">
					<i class="fa fa-warning"></i>
					Belum Ada Transaksi
				</p>
				<?php } ?>
			</div>
		</div>
	</div>
</section>