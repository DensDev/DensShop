<p>
	<a href="<?php echo base_url('admin/user/add')?>" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Add User</a>
</p>

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
 			<th>Nama</th>
 			<th>Email</th>
 			<th>Username</th>
 			<th>Level</th>
 			<th>Foto</th>
 			<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no = 1; foreach($user as $users) { ?>
 		<tr>
 			<td><?php echo $no++;?></td>
 			<td><?php echo $users->nama;?></td>
 			<td><?php echo $users->email;?></td>
 			<td><?php echo $users->username;?></td>
 			<td><?php echo $users->akses_user;?></td>
 			<td><?php if($users->gambar !="") { ?>
          	<img src= <?php echo base_url('assets/upload/image/profile/'.$users->gambar);?> class="img-circle" alt="<?php echo $users->username?>" width="50">
          	<?php }else{  ?>
              <img src="<?php echo base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="50">
              <?php  } ?></td>
 			<td>
 				<a href="<?php echo base_url('admin/user/edit/'.$users->id_user)?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
 				<a href="<?php echo base_url('admin/user/delete/'.$users->id_user)?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" onclick="return confirm ('Are you sure to delete this data?')"></i> Delete</a>

 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>