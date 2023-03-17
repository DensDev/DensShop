<table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama</th>
 			<th>Email</th>
 			<th>Kontak</th>
 			<th>Subject</th>
 			<th>Pesan</th>
 			<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no = 1; foreach($inbox as $inbox) { ?>
 		<tr>
 			<td><?php echo $no++;?></td>
 			<td><?php echo $inbox->inbox_nama;?></td>
 			<td><?php echo $inbox->inbox_email;?></td>
 			<td><?php echo $inbox->inbox_kontak;?></td>
 			<td><?php echo $inbox->inbox_subject;?></td>
 			<td><?php echo $inbox->inbox_pesan;?></td>
 			<td>
 				<a href="<?php echo base_url('admin/inbox/delete/'.$inbox->inbox_id)?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" onclick="return confirm ('Are you sure to delete this data?')"></i> Delete
 				</a>

 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>