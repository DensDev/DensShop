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

echo form_open_multipart(base_url('admin/user/foto_profil'),' class="form-horizontal"');

 ?>
<br>
<div class="form-group">
	<label  class="col-md-3 control-label">Nama Lengkap</label>
		<div class="col-md-5">
			<input class="form-control" type="text" name="nama" value="<?php echo $profile->nama; ?>">
		</div>
</div>
<div class="form-group">
	<label  class="col-md-3 control-label">Upload Foto </label>
		<div class="col-md-5">
			<?php if($profile->gambar !="") { ?>
          	<img src= <?php echo base_url('assets/upload/image/profile/'.$profile->gambar);?> class="img-circle" alt="<?php echo $profile->username?>" width="160" height="160">
          	<?php }else{  ?>
              <img src="<?php echo base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <?php  } ?>
              <input type="file" class="form-control" name="gambar" value="<?php echo $profile->gambar ?>">
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