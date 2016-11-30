		<div class="container">
			<div style="margin-bottom:20px">
				<center><h2>Lihat Katalog</h2></center>
			</div>
			<?php
				if($results!=false){
					$i = 1;
					foreach ($results as $rows) {
						if($i%6==1){
							?>
							<div class="row">
							<?php
						}
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
				                  <i class="fa fa-archive fa-5x" style="color:#f2bb00"></i>
				                  <?php
				                }?>
				                </a><br />
								<b><?php echo $rows->nama_kategori?></b><br /><br />
							</center>
						</div>
						<?php
						if($i%6==0 || $i == $total_rows){
							?>
							</div>
							<?php
						}
						$i++;
					}
				}
			?>
		</div>
