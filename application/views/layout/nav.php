<?php 

$nav_produk = $this->konfigurasi_model->nav_produk();
$nav_mobile = $this->konfigurasi_model->nav_produk();
 ?>
<div class="wrap_header">
	<!-- Logo -->
	<a href="<?php echo base_url() ?>" class="logo">
		<img src="<?php echo base_url('assets/upload/image/'.$site->logo)?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline?>">
	</a>

	<!-- Menu -->
	<div class="wrap_menu">
		<nav class="menu">
			<ul class="main_menu">
				<li>
					<a href="<?php echo base_url() ?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url('produk')?>">Produk</a>
					<ul class="sub_menu">
					<?php foreach($nav_produk as $nav) { ?>
						<li><a href="<?php echo base_url('produk/kategori/'.$nav->slug_kategori)?>"><?php echo $nav->nama_kategori?></a></li>
						<?php }?>
					</ul>
				</li>
				<li>
					<a href="<?php echo base_url('kontak') ?>">Contact</a>
				</li>
			</ul>
		</nav>
	</div>

	<!-- Header Icon -->
	<div class="header-icons">

		<?php if($this->session->userdata('email')) { ?>
			<a href="<?php echo base_url('dashboard') ?>" class="header-wrapicon1 dis-block">
				<img src="<?php echo base_url()?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> <?php echo $this->session->userdata('nama_pelanggan');?>
			</a>
		<?php }else{ ?>
			<a href="<?php echo base_url('registrasi') ?>" class="header-wrapicon1 dis-block">
				<img src="<?php echo base_url()?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>
		<?php } ?>
		<span class="linedivide1"></span>

		<div class="header-wrapicon2">

		<?php 
		//check belanjaan di cart  
		$belanjaan = $this->cart->contents();
		?>
			<img src="<?php echo base_url()?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
			<span class="header-icons-noti"><?php echo count($belanjaan) ?></span>

			<!-- Header cart noti -->
			<div class="header-cart header-dropdown">
				<ul class="header-cart-wrapitem">

				<?php 
				// cart kosong
				if(empty($belanjaan)) { 
					?>
					<li class="header-cart-item">
						<p class="alert alert-success">Keranjang Belanja Kosong</p>
					</li>
				<?php  
				// cart isi
				}else{
				//total belanjaan
					 $total_belanja = 'Rp.' .number_format($this->cart->total(),'0',',','.');
				//tampilkan data cart
				foreach($belanjaan as $belanjaan) {
					$id_produk = $belanjaan['id'];
					// data produk
					$produknya = $this->produk_model->detail($id_produk);
				?>
					<li class="header-cart-item">
						<div class="header-cart-item-img">
							<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produknya->gambar)?>" alt="<?php echo $belanjaan['name'] ?>">
						</div>

						<div class="header-cart-item-txt">
							<a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk)?>" class="header-cart-item-name">
								<?php echo $belanjaan['name'] ?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $belanjaan['qty'] ?> x Rp. <?php echo number_format($belanjaan['price'],'0',',','.') ?> : 
								Rp. <?php echo number_format($belanjaan['subtotal'], '0' ,',' , '.') ?>
							</span>
						</div>
					</li>
					<?php 
					}//tutup foreach
					}//tutup if 
					?>
				</ul>

				<div class="header-cart-total">
					Total: <?php if(!empty($belanjaan)) { echo $total_belanja; }  ?>
				</div>

				<div class="header-cart-buttons">
					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							View Cart
						</a>
					</div>

					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja/checkout')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile">
<!-- Logo moblie -->
<a href="<?php echo base_url()?>" class="logo-mobile">
	<img src="<?php echo base_url('assets/upload/image/'.$site->logo)?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline?>">
</a>

<!-- Button show menu -->
<div class="btn-show-menu">
	<!-- Header Icon mobile -->
	<div class="header-icons-mobile">
		<a href="#" class="header-wrapicon1 dis-block">
			<img src="<?php echo base_url()?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
		</a>

		<span class="linedivide2"></span>
		<div class="header-wrapicon2">
		<?php 
		//check belanjaan di cart  
		$belanjaan_mobile = $this->cart->contents();
		?>
			<img src="<?php echo base_url()?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
			<span class="header-icons-noti"><?php echo count($belanjaan_mobile); ?></span>

			<!-- Header cart noti -->
			<div class="header-cart header-dropdown">
				<ul class="header-cart-wrapitem">
				<?php 
				// cart kosong
				if(empty($belanjaan_mobile)) { 
					?>
					<li class="header-cart-item">
						<p class="alert alert-success">Keranjang Belanja Kosong</p>
					</li>
				<?php  
				// cart isi
				}else{
				//total belanjaan
					 $total_belanja_mobile = 'Rp.' .number_format($this->cart->total(),'0',',','.');
				//tampilkan data cart
				foreach($belanjaan_mobile as $belanjaan_mobile) {
					$id_produk_mobile = $belanjaan_mobile['id'];
					// data produk
					$produk_mobile = $this->produk_model->detail($id_produk_mobile);
				?>
					<li class="header-cart-item">
						<div class="header-cart-item-img">
							<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk_mobile->gambar)?>" alt="<?php echo $belanjaan_mobile['name'] ?>">
						</div>

						<div class="header-cart-item-txt">
							<a href="<?php echo base_url('produk/detail/'.$produk_mobile->slug_produk)?>" class="header-cart-item-name">
								<?php echo $belanjaan_mobile['name'] ?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $belanjaan_mobile['qty'] ?> x Rp. <?php echo number_format($belanjaan_mobile['price'],'0',',','.') ?> : 
								Rp. <?php echo number_format($belanjaan_mobile['subtotal'], '0' ,',' , '.') ?>
							</span>
						</div>
					</li>
					<?php 
					}//tutup foreach
					}//tutup if 
					?>
				</ul>

				<div class="header-cart-total">
					Total: <?php if(!empty($belanjaan_mobile)) { echo $total_belanja; } ?>
				</div>

				<div class="header-cart-buttons">
					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							View Cart
						</a>
					</div>

					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja/checkout')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
		<span class="hamburger-box">
			<span class="hamburger-inner"></span>
		</span>
	</div>
</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu" >
<nav class="side-menu">
	<ul class="main-menu">
		<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
			<span class="topbar-child1">
				<?php echo $site->alamat ?>
			</span>
		</li>

		<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
			<div class="topbar-child2-mobile">
				<span class="topbar-email">
					<?php echo $site->email ?>
					<?php echo $site->telepon ?>
				</span>
			</div>
		</li>

		<li class="item-topbar-mobile p-l-10">
			<div class="topbar-social-mobile">
				<a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
				<a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>
			</div>
		</li>

		<li class="item-menu-mobile">
			<li class="item-menu-mobile">
				<a href="<?php echo base_url() ?>">Contact</a>
			</li>
			<li class="item-menu-mobile">
				<a href="<?php echo base_url('produk')?>">Produk</a>
				<ul class="sub_menu">
				<?php foreach($nav_mobile as $nav) { ?>
					<li><a href="<?php echo base_url('produk/kategori/'.$nav->slug_kategori)?>"><?php echo $nav->nama_kategori?></a></li>
					<?php }?>
				</ul>
			</li>
		<li class="item-menu-mobile">
			<a href="<?php echo base_url('kontak') ?>">Contact</a>
		</li>
	</ul>
</nav>
</div>
</header>