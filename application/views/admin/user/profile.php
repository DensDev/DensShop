<?php 

//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');
if($this->session->flashdata('sukses')) 
{ 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>'; 
}
echo form_open_multipart(base_url('admin/user/profile'),' class="form-horizontal"');

 ?>

 <br>
 <br>
      <!-- left column -->
      <div class="col-md-3 control-label">
        <div class="text-center">
          <?php if($profile->gambar !="") { ?>
          	<img src= <?php echo base_url('assets/upload/image/profile/'.$profile->gambar);?> class="img-circle" alt="<?php echo $profile->username?>" width="160" height="160">
          	<?php }else{  ?>
              <img src="<?php echo base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <?php  } ?>
        </div>
      </div>
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="username" value="<?php echo $profile->username?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password')?>">
              <span class="text-danger">Ketik minimal 6 karakter untuk mengganti Password Baru atau biarkan kosong</span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="nama" value="<?php echo $profile->nama; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" value="<?php echo $profile->email; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              	<button class="btn btn-success btn-lg" name="submit" type="submit">
              		<i class="fa fa-save"></i> Save
				</button>
				<button class="btn btn-info btn-lg" name="reset" type="reset">
					<i class="fa fa-times"></i> Reset
				</button>
            </div>
          </div>
      </div>
 <?php 

echo form_close();

  ?>