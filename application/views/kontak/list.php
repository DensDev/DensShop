<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/template/images/heading-pages-06.jpg')?>">
	<h2 class="l-text2 t-center">
		<?php echo $title; ?>
	</h2>
</section>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 p-b-30">
				<div class="p-r-20 p-r-0-lg">
					<div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="<?php echo base_url()?>assets/template/images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
				</div>
			</div>

			<div class="col-md-6 p-b-30">
			<?php 
				if($this->session->flashdata('sukses')) 
				{ 
					echo '<div class="alert alert-success">';
					echo $this->session->flashdata('sukses');
					echo '</div>'; 
				}
				//notifikasi error
				echo validation_errors('<div class="alert alert-warning">','</div>');
				echo form_open_multipart(base_url('kontak'),'class="leave-comment"');
				?>
					<h4 class="m-text26 p-b-36 p-t-15">
						Send us your message
					</h4>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" name="inbox_nama" placeholder="Nama" type="text" required>
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inbox_kontak" placeholder="Phone Number">
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inbox_email" placeholder="Email Address">
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inbox_subject" placeholder="Subjek">
					</div>

					<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="inbox_pesan" placeholder="Message"></textarea>

					<div class="w-size25">
						<!-- Button -->
						<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
							Send
						</button>
					</div>
			<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>