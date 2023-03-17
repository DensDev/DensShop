<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" title="Cetak" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"> Cetak</i></a>
		<a href="<?php echo base_url('admin/transaksi') ?>" title="Kembali" class="btn btn-info btn-sm"><i class="fa fa-backward"> Kembali</i></a>
	</div>
	
</p>
<div class="clearfix"></div><hr>

<table class="table table-bordered" width="100%">
	<thead>
		<tr>
			<th width="20%">Nama Pelanggan</th>
			<th>: <?php echo $header_transaksi->nama_pelanggan; ?></td>
		</tr>
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
		<tr>
			<td>Bukti Bayar</td>
			<td><?php if($header_transaksi->bukti_bayar !="") { ?><img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">
				<?php }else{ echo 'Belum ada Bukti Bayar'; } ?></td>
		</tr>
		<tr>
			<td>Tanggal Bayar</td>
			<td><?php echo date ('d-m-Y',strtotime($header_transaksi->tanggal_bayar)) ?></td>
		</tr>
		<tr>
			<td>Jumlah Bayar</td>
			<td>Rp. <?php echo number_format($header_transaksi->jumlah_bayar); ?></td>
		</tr>
		<tr>
			<td>Pembayaran dari</td>
			<td><?php echo $header_transaksi->nama_bank; ?> No.Rekening: <?php echo $header_transaksi->rekening_pembayaran; ?> Atas Nama <?php echo $header_transaksi->rekening_pelanggan; ?></td>
		</tr>
		<tr>
			<td>Pembayaran ke Rekening</td>
			<td><?php echo $header_transaksi->bank; ?> No.Rekening: <?php echo $header_transaksi->nomor_rekening; ?> Atas Nama <?php echo $header_transaksi->nama_pemilik; ?></td>
		</tr>
	</tbody>
</table>
<hr>
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
