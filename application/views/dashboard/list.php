<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
				<div class="leftbar p-r-10 p-r-0-sm">
					
				<?php include("menu.php"); ?>
					
				</div>
			</div>

			<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">
				<!-- Product -->
				<div class="alert alert-success">
					<h1>Welcome,  <i><strong><?php echo $this->session->userdata('nama_pelanggan')  ?></strong></i> </h1>
				</div>

				<p>Berikut adalah Riwayat Belanja Anda</p>

				<?php if($header_transaksi) 
				{ 
				?>
				<table class="table table-bordered" width="100%">
					<thead>
						<tr class="bg-success">
							<th>No</th>
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
							<td><?php echo $header_transaksi->kode_transaksi; ?></td>
							<td><?php echo date ('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
							<td>Rp. <?php echo number_format($header_transaksi->jumlah_transaksi); ?></td>
							<td><?php echo $header_transaksi->total_item; ?></td>
							<td><?php echo $header_transaksi->status_bayar; ?></td>
							<td>
							<div class="button-group">
								<a href="<?php echo base_url('dashboard/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"> Detail</i>
								</a> 
								<a href="<?php echo base_url('dashboard/konfirmasi/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="fa fa-upload"> Konfirmasi bayar</i>
								</a> 
							</div>
							</td>
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