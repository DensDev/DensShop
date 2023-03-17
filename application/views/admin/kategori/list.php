<p>
	<a href="<?php echo base_url('admin/kategori/add')?>" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Add Kategori</a>
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
 			<th>Nama</th>
 			<th>Slug</th>
 			<th>urutan</th>
 			<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no = 1; foreach($kategori as $kategori) { ?>
 		<tr>
 			<td><?php echo $no++;?></td>
 			<td><?php echo $kategori->nama_kategori;?></td>
 			<td><?php echo $kategori->slug_kategori;?></td>
 			<td><?php echo $kategori->urutan;?></td>
 			<td>
 				<a href="<?php echo base_url('admin/kategori/edit/'.$kategori->id_kategori)?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
 				<a href="<?php echo base_url('admin/kategori/delete/'.$kategori->id_kategori)?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" onClick="return confirm ('Are you sure to delete this data?')"></i> Delete</a>

 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>