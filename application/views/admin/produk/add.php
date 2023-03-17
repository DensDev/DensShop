<?php 
//error upload 
if(isset($error))
{
	echo '<p class="alert alert-warning">';
	echo $error;
	echo '</p>';
}
if($this->session->flashdata('sukses')) 
{ 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>'; 
}
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open_multipart(base_url('admin/produk/add'),' class="form-horizontal"');



 ?>
<div class="form-group">
	<label  class="col-md-2 control-label">Nama Produk</label>
		<div class="col-md-5">
			<input type="text" name="nama_produk" class="form-control"  placeholder="Nama Produk" value="<?php echo set_value('nama_produk')?>" required>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Kode Produk</label>
		<div class="col-md-5">
			<input type="text" name="kode_produk" class="form-control"  placeholder="Kode Produk" value="<?php echo set_value('kode_produk')?>" required>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Kategori Produk</label>
		<div class="col-md-5">
			<select name="id_kategori" class="form-control">
			<?php foreach($kategori as $kategori){ ?>
				<option value="<?php echo $kategori->id_kategori;?>">
					<?php echo $kategori->nama_kategori;?>
				</option>
			<?php } ?>
			</select>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Harga Produk</label>
		<div class="col-md-5">
			<input type="number" name="harga" class="form-control"  placeholder="Harga Produk" value="<?php echo set_value('harga')?>" required>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Stok Produk</label>
		<div class="col-md-5">
			<input type="number" name="stok" class="form-control"  placeholder="Stok Produk" value="<?php echo set_value('stok')?>" required>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Berat Produk</label>
		<div class="col-md-5">
			<input type="text" name="berat" class="form-control"  placeholder="Berat Produk" value="<?php echo set_value('berat')?>" required>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Ukuran Produk</label>
		<div class="col-md-5">
			<input type="text" name="ukuran" class="form-control"  placeholder="Ukuran Produk" value="<?php echo set_value('ukuran')?>" required>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Keterangan Produk</label>
		<div class="col-md-10">
			<textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"><?php echo set_value('keterangan')?></textarea>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Keywordk</label>
		<div class="col-md-10">
			<textarea name="keywords" class="form-control" placeholder="Keywords"><?php echo set_value('keywords')?></textarea>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Upload Gambar Produk</label>
		<div class="col-md-10">
			<input type="file" name="gambar" class="form-control" required>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label">Status Produk</label>
		<div class="col-md-5">
			<select name="status_produk" class="form-control">
				<option value="Publish">Publikasikan</option>
				<option value="Draft">Draft</option>
			</select>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-2 control-label"></label>
		<div class="col-md-5">
			<button class="btn btn-success btn-lg" name="submit" type="submit"><i class="fa fa-save"></i> Save
			</button>
			<button class="btn btn-info btn-lg" name="submit" type="reset"><i class="fa fa-times"></i> Reset
			</button>
		</div>
</div>
 <?php 

echo form_close();

  ?>