<?php 

if ($this->session->flashdata('sukses')) 
{
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

 ?>
<?php 

//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open_multipart(base_url('admin/konfigurasi/icon'),' class="form-horizontal"');

 ?>

<div class="form-group">
	<label  class="col-md-3 control-label">Nama Website</label>
		<div class="col-md-5">
			<input type="text" name="namaweb" class="form-control"  placeholder="Nama Website" 
			value="<?php echo $konfigurasi->namaweb ?>" required>
		</div>
</div>
<div class="form-group">
	<label  class="col-md-3 control-label">Upload icon </label>
		<div class="col-md-5">
			<input type="file" name="icon" class="form-control"  placeholder="Upload icon" value="<?php echo $konfigurasi->icon ?>" required>
			Icon lama: <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon);?>" class="img img-responsive img thumbnail">
		</div>
</div>

<div class="form-group">
	<label  class="col-md-3 control-label"></label>
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