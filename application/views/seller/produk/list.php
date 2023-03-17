<p>
	<a href="<?php echo base_url('seller/produk/add')?>" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Add Produk</a>
</p>

<?php 

if($this->session->flashdata('sukses')) 
{ 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>'; 
}

 ?>

 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Gambar</th>
 			<th>Nama</th>
 			<th>Kategori</th>
 			<th>Harga</th>
 			<th>Status</th>
 			<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no = 1; foreach($produk as $row) { ?>
 		<tr> 
 			<td><?php echo $no++ ?></td>
 			<td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$row->gambar);?>" class="img img-responsive img-thumbnail" width="60"></td>
 			<td><?php echo $row->nama_produk;?></td>
 			<td><?php echo $row->nama_kategori;?></td>
 			<td><?php echo number_format($row->harga,'0',',','.');?></td>
 			<td><?php echo $row->status_produk;?></td>	
 			<td>
 				<a href="<?php echo base_url('seller/produk/gambar/'.$row->id_produk)?>" class="btn btn-success btn-xs"><i class="fa fa-image"></i> Gambar (<?php echo $row->total_gambar?>)</a>
 				<a href="<?php echo base_url('seller/produk/edit/'.$row->id_produk)?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
 				<?php include('delete.php') ?>
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>