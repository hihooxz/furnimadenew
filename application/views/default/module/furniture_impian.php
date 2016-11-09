<!-- Buat Furnitur Inmpian -->
		<div id="container">
			<?php
			echo form_open_multipart('');
			?>
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<center>
				<h3>Kirimkan Furniture Impianmu</h3>
				</center><br /><br />
				<?php
					if(isset($error))
						echo $error;
					echo validation_errors();
					if($this->session->flashdata('success') == TRUE)
						echo "<strong>Berhasil Mengirimkan Desain. Silahkan Tunggu Konfirmasikan via email dari kami untuk tahap selanjutnya.</strong>";
				?>
					<div class="form-group">
				        <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $profile['nama_lengkap']?>">
				    </div>
				    <div class="form-group">
				    	<label>Gambar (Max Size: 2MB)</label>
				        <input type="file" class="form-control" name="userfile">
				    </div>
					<div class="form-group">
				        <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $profile['email']; ?>">
				    </div>
				    <div class="form-group">
				        <input type="text" class="form-control" placeholder="No Ponsel" name="no_hp" value="<?php echo $profile['no_hp']; ?>">
				    </div>
				    <div class="form-group">
				        <input type="text" class="form-control" placeholder="Lokasi" name="lokasi" value="<?php echo $profile['alamat']?>">
				    </div>
				    <div class="form-group">
				        <textarea placeholder="Permintahan Tambahan" name="deskripsi" class="form-control"></textarea>
				    </div>
				    <div class="form-group">
				        <input type="submit" value="Kirim" class="btn btn-lg btn-warning">
				    </div>
			</div>
			<div class="col-md-3">
			</div>
			<?php
			echo form_close();
			?>
			<div style="clear:both;"></div>
		</div>
		