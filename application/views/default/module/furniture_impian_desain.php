<!-- Buat Furnitur Inmpian -->
		<div id="container">
			<div class="col-md-6 col-md-offset-3">
			<?php
				echo form_open_multipart('');
			?>
				<center>
				<h3>Mewujudkan Furniture Impian Anda Menjadi Kenyataan</h3>
				<div class="col-md-12">
        <?php
        $attr2 = "";
          if($this->session->userdata('loginMember') == FALSE){
            $attr2 = "data-toggle=\"modal\" data-target=\"#loginForm\"";
          }
          else{
            $attr2 = "";
          }
          if(isset($error)){
							echo $error;
						}
						if($this->session->flashdata('success')==TRUE){
				echo "Kamu Berhasil Mengupload Desain Silahkan Tunggu Konfirmasi Dari Kami";
			}
						echo validation_errors();
        ?>
			</div>
				</center><br /><br />
					<div class="col-md-12">
						<div class="col-md-6 col-xs-12">
						    <div class="form-group">
						    	<label>Gambar Dimensi Produk</label>
						        <input type="file" class="form-control" name="userfile[]">
						    </div>
					    </div>
					    <div class="col-md-6 col-xs-12">
						    <div class="form-group">
						    	<label>Gambar 3D Produk</label>
						        <input type="file" class="form-control" name="userfile[]">
						    </div>
					    </div>
				    </div>
				    <div class="form-group">
				    	<label>Material</label>
				    	<?php
				    		if($bahan!=FALSE){
				    			$i = 1;
				    			foreach ($bahan as $rows) {
				    				?>
				    					<label id="bahan<?php echo $i;?>"><input type="radio" name="bahan" id="material<?php echo $i;?>" value="<?php echo $rows->id_bahan?>"><?php echo $rows->nama_bahan; ?></label>
				    				<?php
				    				$i++;
				    			}
				    		}
				    	?>
				    </div>
				    <div class="form-group">
				    	<label id="finishing"></label>
				    </div>
            <div class="form-group">
              <label>Finishing</label>
              <?php
                $options = array();
                if($finishing!=FALSE){
                  foreach ($finishing as $rows) {
                      $options[$rows->id_finishing] = $rows->nama_finishing;
                  }
                  echo form_dropdown('finishing',$options,set_value('finishing'),"class='form-control'");
                }
               ?>
             </div>
				    <div class="form-group">
				        <input type="text" class="form-control" placeholder="Nama Produk" name="nama">
				    </div>
				    <div class="form-group">
				        <textarea placeholder="Deskripsi Furniture" name="deskripsi" class="form-control"></textarea>
				    </div>
				    <div class="form-group">
				    <?php
				    	if($attr2 != ""){
				    ?>
		              <a <?php echo $attr2; ?>>
						        <input type="submit" value="Kirim" class="btn btn-lg btn-warning">
		              </a>
              <?php
          				}
          				else{
          					?>
          					<input type="submit" value="Kirim" class="btn btn-lg btn-warning">
          					<?php
          				}
              ?>
				    </div>
			</div>
			<div class="col-md-3">
			</div>
			<?php
			echo form_close();
			?>
			<div style="clear:both;"></div>
		</div>
