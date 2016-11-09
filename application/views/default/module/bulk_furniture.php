<!-- Bulk Furniture -->
		<div id="bulk_furniture">
			<div class="col-md-6">
				<h3>Mencari Desainer furniture untuk Ruangan Anda?</h3>
				<div class="col-md-3">
					<center>
					<i class="fa fa-money fa-4x" aria-hidden="true"></i><br />
					Jaminan Harga Termurah
					</center>
				</div>
				<div class="col-md-3">
					<center>
					<i class="fa fa-user fa-4x" aria-hidden="true"></i><br />
					Dikerjakan Oleh yang Berpengalaman
					</center>
				</div>
				<div class="col-md-3">
					<center>
					<i class="fa fa-gear fa-4x" aria-hidden="true"></i><br />
					Instalasi Terpercaya
					</center>
				</div>
				<div class="col-md-3">
					<center>
					<i class="fa fa-check-circle fa-4x" aria-hidden="true"></i><br />
					Quality Check Terbaik
					</center>
				</div>
			</div>
			<div class="col-md-6">
				<h3>Pesan Bulk Furniture Untuk Ruangan Anda Sekarang</h3>
				<?php
					echo form_open('');
					?>
					<div class="input-group margin-bottom-sm form-group">
					  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
					  <input class="form-control" type="text" placeholder="Nama" name="nama">
					</div>
					<div class="input-group margin-bottom-sm form-group">
					  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					  <input class="form-control" type="text" placeholder="Email" name="email">
					</div>
					<div class="input-group margin-bottom-sm form-group">
					  <span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
					  <input class="form-control" type="text" placeholder="No Ponsel" name="no_hp">
					</div>
				    <div class="input-group margin-bottom-sm form-group">
					  <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
					  <input class="form-control" type="text" placeholder="Lokasi" name="lokasi">
					</div>
					<div class="input-group margin-bottom-sm form-group">
					  <span class="input-group-addon"><i class="fa fa-file-text fa-fw"></i></span>
					  <textarea placeholder="Deskripsi Furniture" name="deskripsi" class="form-control"></textarea>
					</div>
				    <div class="form-group">
				    </div>
				    <div class="form-group">
				        <input type="submit" value="Kirim" class="btn btn-lg btn-warning">
				    </div>
					
					<?php
					echo form_close();
				?>
			</div>
			<div style="clear:both;"></div>
		</div>
		