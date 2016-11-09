<div class="row">
	  	<div id="topnav" class="hidden-xs visible-sm visible-md visible-lg">
		  	<div class="col-sm-3">
		  		<img src="<?php echo base_url('asset/asset_default/images/logo.png')?>" class="img-responsive">
		  	</div>
		  	<div class="col-sm-5" style="margin-top:30px">
		  		<div class="col-sm-5">
		  			<i class="fa fa-bed fa" aria-hidden="true"></i> <a href="<?php echo base_url('produk/katalog')?>">Lihat Katalog</a>
		  		</div>
		  		<div class="col-sm-7">
		  			<i class="fa fa-pencil fa" aria-hidden="true"></i> <a href="<?php echo base_url('halaman/furniture-impian-desain'); ?>">Buat Furniture Impianmu</a>
		  		</div>
		  	</div>
		  	<div class="col-sm-4" style="padding-top:25px;">
		  		<div class="col-sm-5" style="margin-bottom:10px;">
		  			<form method="POST" action="">
			  		<div class="input-group margin-bottom-sm hidden-xs">
					  <input class="form-control" type="text" placeholder="Search">
					  <span class="input-group-addon"><button type="submit" class="button"><i class="fa fa-search fa-fw"></i></button></span>
					</div>
					</form>
				</div>
				<div class="col-sm-7">
					<?php
						if($this->session->userdata('loginMember') == TRUE){
					?>
					<ul>
						<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
		              	<ul class="dropdown-menu" id="dropdown">
		                  <li><a href="<?php echo base_url('akun/profil')?>"><i class="fa fa-user fa-fw"></i> Profil</a></li>
		                  <li><a href="<?php echo base_url('akun/riwayat-order')?>"><i class="fa fa-clock-o fa-fw"></i> Riwayat Order</a></li>
		                  <li><a href="<?php echo base_url('akun/produk-tersimpan')?>"><i class="fa fa-save fa-fw"></i> Produk Tersimpan</a></li>
		                  <li><a href="<?php echo base_url('akun/inspirasi-tersimpan')?>"><i class="fa fa-file-image-o fa-fw"></i> Inspirasi Tersimpan</a></li>
		                  <li><a href="<?php echo base_url('akun/password')?>"><i class="fa fa-key fa-fw"></i>Password</a></li>
		                  <li><a href="<?php echo base_url('akun/logout')?>"><i class="fa fa-unlock-alt fa-fw"></i>Logout</a></li>
		                </ul>
		              	</li>
		            <li>&nbsp;&nbsp;&nbsp;<span class="separator">&nbsp;</span></li>
					<li><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</li>
					<li><span class="separator">&nbsp;</span>&nbsp;&nbsp;&nbsp;</li>
					<li><a href="<?php echo base_url('akun/riwayat-order') ?>">PROGRESS</a>&nbsp;&nbsp;&nbsp;</li>
		            </ul>
		            <?php
		        	}
		        	else if($this->session->userdata('loginSupplier') == TRUE){
		        		?>
					<ul>
						<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
		              	<ul class="dropdown-menu" id="dropdown">
		                  <li><a href="<?php echo base_url('akun-supplier/profil')?>"><i class="fa fa-user fa-fw"></i> Profil</a></li>
		                  <li><a href="<?php echo base_url('akun-supplier/riwayat-order')?>"><i class="fa fa-clock-o fa-fw"></i> Riwayat Order</a></li>
		                  <li><a href="<?php echo base_url('akun-supplier/produk-tersimpan')?>"><i class="fa fa-save fa-fw"></i> Produk Tersimpan</a></li>
		                  <li><a href="<?php echo base_url('akun-supplier/inspirasi-tersimpan')?>"><i class="fa fa-file-image-o fa-fw"></i> Inspirasi Tersimpan</a></li>
		                  <li><a href="<?php echo base_url('akun-supplier/password')?>"><i class="fa fa-key fa-fw"></i>Password</a></li>
		                  <li><a href="<?php echo base_url('akun-supplier/logout')?>"><i class="fa fa-unlock-alt fa-fw"></i>Logout</a></li>
		                </ul>
		              	</li>
		            <li>&nbsp;&nbsp;&nbsp;<span class="separator">&nbsp;</span></li>
					<li><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</li>
					<li>&nbsp;<span class="separator">&nbsp;&nbsp;&nbsp;</span></li>
					<li><a href="<?php echo base_url('akun-supplier/riwayat-order') ?>" title="Tanya Progress"><i class="fa fa-info fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;</li>
		            </ul>
		        		<?php
		        	}
		        	else{
		        		?>
		        		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#loginForm">Login</button>
		        		<?php
		        	}
		            ?>
				</div>
		  	</div>
	  	</div>

	  	<div class="visible-xs hidden-sm hidden-md hidden-lg">
	  		<div class="container">
	  		<img src="<?php echo base_url('asset/asset_default/images/logo.png')?>" class="img-responsive">
	  		</div>
	  	</div>
	  </div>
