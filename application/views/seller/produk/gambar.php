<?php 
//error upload 
if(isset($error))
{
	echo '<p class="alert alert-warning">';
	echo $error;
	echo '</p>';
}
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open_multipart(base_url('seller/produk/gambar/'.$produk->id_produk),' class="form-horizontal"');



 ?>
<div class="form-group">
	<label  class="col-md-2 control-label">Judul Gambar</label>
		<div class="col-md-5">
			<input type="text" name="judul_gambar" class="form-control"  placeholder="Judul Gambar Produk" value="<?php echo set_value('judul_gambar')?>" required>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Upload Gambar Produk</label>
		<div class="col-md-4">
			<input type="file" name="gambar" class="form-control" value="<?php echo set_value('gambar')?>"required>
		</div>
		<div class="col-md-4">
			<button class="btn btn-success btn-lg" name="submit" type="submit"><i class="fa fa-save"></i> Save
			</button>
			<button class="btn btn-info btn-lg" name="submit" type="reset"><i class="fa fa-times"></i> Reset
			</button>
		</div>
</div>
<?php echo form_close(); ?>

<?php 

if ($this->session->flashdata('sukses')) 
{
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

 ?>

 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Gambar</th>
 			<th>Judul</th>
 			<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
 	<tr> 
 			<td>1</td>
 			<td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar);?>" class="img img-responsive img-thumbnail" width="60"></td>
 			<td><?php echo $produk->nama_produk;?></td>
 		</tr>
 		<?php $no = 2; foreach($gambar as $row) { ?>
 		<tr> 
 			<td><?php echo $no++ ?></td>
 			<td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$row->gambar);?>" class="img img-responsive img-thumbnail" width="60"></td>
 			<td><?php echo $row->judul_gambar;?></td>
 			<td>
 				<a href="<?php echo base_url('seller/produk/delete_gambar/'.$produk->id_produk.'/'.$row->id_gambar)?>" class="btn btn-danger btn-xs" onClick="return confirm('Yakin ingin menghapus Gambar ini?')"><i class="fa fa-trash-o"></i> Hapus Gambar</a>
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>