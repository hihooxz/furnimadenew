<?php $this->load->view('default/common/slideshow')?>              	
	<!--/ carousel-->
	
<!-- How it Works -->
		      <div class="row">
		      	<div class="row">
			    	<div id="three_button">
			      		<div class="col-md-12">
			      		<center>
				      		<div class="col-md-3">
				      		</div>
				      		<div class="col-md-2" style="margin-bottom:10px; margin-right:40px; margin-left:-40px">
				      			<a href="#"><button type="button" class="btn btn-lg btn-warning">LIHAT KATALOG</button></a>
				      		</div>
				      		<div class="col-md-2" style="margin-bottom:10px; margin-right:20px; margin-left:-20px">
				      			<a href="#"><button type="button" class="btn btn-lg btn-warning">BUAT FURNITURE IMPIANMU</button></a>
				      		</div>
				      		<div class="col-md-2" style="margin-bottom:10px;">
				      			<a href="#"><button type="button" class="btn btn-lg btn-warning">TEMUKAN INSPIRASI</button></a>
				      		</div>
				      		<div class="col-md-3">
				      		</div>
			      		</center>
			      		</div>
		      		</div>
		      	</div>
		      	<div id="how_it_work" style="margin-bottom:10px;">
			      	<center>
			      		<h2>CARA KERJA</h2>
			      	</center>
			      	<div class="col-md-4">
			      		<div class="col-md-6">
			      		</div>
			      		<div class="col-md-6">
			      			<center>
			      			<i class="fa fa-cloud-upload fa-5x"></i><br />
			      			1. UPLOAD GAMBAR<BR /> DESAIN FURNITURE KAMU
			      			</center>
			      		</div>
			      	</div>
			      	<div class="col-md-4" style="text-align:center">
			      		<i class="fa fa-check fa-5x"></i><br />
			      		2. PILIH MATERIAL<BR /> TERBAIK & KONFIRMASI PEMBAYARAN
			      	</div>
			      	<div class="col-md-4">
			      		<div class="col-md-7">
			      			<center>
				      			<i class="fa fa-gift fa-5x"></i><BR />
				      			3. TERIMA FURNITURE IMPIAN DITEMPAT ANDA
			      			</center>
			      		</div>
			      		<div class="col-md-5">
			      		</div>
			      	</div>
		      	</div>
		      	<div class="container">
					<div style="margin:10px 0">
						<center>
			      			<h2>Produk Terbaru</h2>
			      		</center>
					</div>
					<?php
						if($results!=false){
							foreach ($results as $rows) {
								?>
								<div class="col-md-2">
									<center>
										<a href="<?php echo base_url('produk/lihat-produk/'.$rows->id_produk)?>" title="Lihat <?php echo $rows->nama_produk?>">
										<?php if($rows->gambar_produk!= "") {
						                  ?>
						                  	<img src="<?php echo base_url($rows->gambar_produk)?>">
						                  <?php
						                } else{
						                  ?>
						                  <img data-src="holder.js/141x232" class="img-thumbnail">
						                  <?php
						                }?>
						                </a><br />
										<?php
											if($rows->harga_promo == 0){
												?>
												<span class="label label-warning"><b>Rp <?php echo number_format($rows->harga)?></b></span>
												<?php
											}
											else{
												?>
												<span class="label label-warning"><strike><b>Rp <?php echo number_format($rows->harga)?></b></strike></span>
												<span class="label label-success">Rp <?php echo number_format($rows->harga_promo)?></span>
												<?php
											}
										?>
										<br />
										<?php echo $rows->nama_produk; ?>
										<br /><br />
									</center>
								</div>
								<?php
							}
						}
					?>
				</div>
				<div class="container">
					<div style="margin:10px 0">
						<center>
			      			<h2>Katalog Produk</h2>
			      		</center>
					</div>
					<?php
				if($results2!=false){
					foreach ($results2 as $rows) {
						?>
						<div class="col-md-2">
							<center>
								<a href="<?php echo base_url('produk/kategori/'.$rows->id_kategori)?>" title="Lihat Katalog dari <?php echo $rows->nama_kategori?>">
								<?php if($rows->gambar_kategori!= "") {
				                  ?>
				                  	<img src="<?php echo base_url($rows->gambar_kategori)?>">
				                  <?php
				                } else{
				                  ?>
				                  <img data-src="holder.js/141x232" class="img-thumbnail">
				                  <?php
				                }?>
				                </a><br />
								<b><?php echo $rows->nama_kategori?></b><br /><br />
							</center>
						</div>
						<?php
								}
							}
						?>
				</div>
		      </div>