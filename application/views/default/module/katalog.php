
		<div class="container">
			<div style="margin-bottom:20px">
				<center><h2>Lihat Katalog</h2></center>
			</div>
			<?php
				if($results!=false){
					foreach ($results as $rows) {
						?>
						<div class="col-md-2 col-xs-12">
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