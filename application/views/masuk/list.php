<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">
	<!-- Cart item -->
	<div class="pos-relative">
		<div class="bgwhite">

		<h1><?php echo $title?>	</h1><hr>
		<div class="clearfix"></div>
			<p class="alert alert-success">Belum memiliki akun? silahkan <a href="<?php echo base_url('registrasi')?>" class="btn btn-info btn-sm">Registrasi di sini</a></p>

			<div class="col-md-12">

				<?php 
					//display error
					echo validation_errors('<div class="alert alert-warning">','</div>');
					//display notifikasi
					if($this->session->flashdata('warning'))
					{
						echo '<div class="alert alert-warning">';
						echo $this->session->flashdata('warning');
						echo '</div>'; 
					}

					//logout
					  if($this->session->flashdata('sukses'))
					{
					  echo '<div class="alert alert-success">';
					  echo $this->session->flashdata('sukses');
					  echo '</div>';
					}
					//form open
					echo form_open(base_url('masuk'),'class="leave-comment"'); ?>
					<table class="table">
						<thead>
							<tr>
								<th>Email (Username)</th>
								<th><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email')?>" required></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Password</td>
								<td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password')?>" required></td>
							</tr>
							<tr>
								<td></td>
								<td>
								<button class="btn btn-success btn-lg" type="submit">
									<i class="fa fa-sign-in"></i> Login
								</button>
								<button class="btn btn-default btn-lg" type="reset">
								<i class="fa fa-times"></i>Reset
								</button>
								</td>
							</tr>
						</tbody>
					</table>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

	<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
		<div class="flex-w flex-m w-full-sm">
		</div>

		<div class="size10 trans-0-4 m-t-10 m-b-10">
			<!-- Button -->

		</div>
	</div>
	</div>
	</div>
</section>