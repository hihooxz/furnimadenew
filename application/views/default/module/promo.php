		<div class="container">
			<div style="margin-bottom:20px">
				<center><h2>Lihat Produk Promo</h2></center>
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
								<b><?php echo $rows->nama_produk?></b> <a href="<?php echo base_url('produk/simpan-produk/'.$rows->id_produk)?>" title="Simpan Produk"
									onclick="return confirm('Apakah Anda Yakin Ingin Menyimpan Produk ini?')"><i class="fa fa-save"></i></a><br />
								<?php
									if($rows->harga_promo == 0){
										?>
										<span class="label label-warning"><b>Rp <?php echo number_format($rows->harga)?></b></span><br />
										<?php
									}
									else{
										?>
										<span class="label label-warning"><strike><b>Rp <?php echo number_format($rows->harga)?></b></strike></span>
										<span class="label label-success">Rp <?php echo number_format($rows->harga_promo)?></span>
										<?php
									}
								?>
								<br /><br />
							</center>
						</div>
						<?php
					}
				}
			?>
			<center>
				<?php echo $links; ?>
			</center>
		</div>