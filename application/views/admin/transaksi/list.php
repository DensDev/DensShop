<table class="table table-bordered" width="100%">
<thead>
	<tr class="bg-success">
		<th>No</th>
		<th>Nama Pelanggan</th>
		<th>Kode Transaksi</th>
		<th>Tanggal Transaksi</th>
		<th>jumlah Total</th>
		<th>jumlah Item</th>
		<th>Status Pembayaran</th>
		<th>Action</th>
	</tr>
</thead>
<?php $i=1; foreach($header_transaksi as $header_transaksi) { ?>
<tbody>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $header_transaksi->nama_pelanggan; ?>
			<br><small>
				Telepon: <?php echo $header_transaksi->telepon; ?>
				<br>Email: <?php echo $header_transaksi->email; ?>
				<br>Alamat Kirim: <br><?php echo nl2br($header_transaksi->alamat); ?>
			</small>
		</td>
		<td><?php echo $header_transaksi->kode_transaksi; ?></td>
		<td><?php echo date ('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
		<td>Rp. <?php echo number_format($header_transaksi->jumlah_transaksi); ?></td>
		<td><?php echo $header_transaksi->total_item; ?></td>
		<td><?php echo $header_transaksi->status_bayar; ?></td>
		<td>
		<div class="btn-group">
			<a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"> Detail</i>
			</a> 
			<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"> Cetak</i>
			</a>
			<a href="<?php echo base_url('admin/transaksi/status/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"> Update Status</i>
			</a>  
		</div>
		</td>
	</tr>
	<?php $i++; } ?>
</tbody>
</table>