<!-- Buat Furnitur Inmpian -->
		<div id="container" style="height:400px">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<center>
				<h3>Desain Apa Yang Mau Kamu Kirim?</h3>
				</center><br /><br />
				<div class="row" style="margin-top:100px">
					<?php
					$attr = "";
						if($this->session->userdata('loginMember') == FALSE){
							$attr = "data-toggle=\"modal\" data-target=\"#loginForm\"";
						}
						else{
							$attr = "href=\"".base_url('halaman/furniture-impian')."\"";
						}
					$attr2 = "";
						if($this->session->userdata('loginMember') == FALSE){
							$attr2 = "data-toggle=\"modal\" data-target=\"#loginForm\"";
						}
						else{
							$attr2 = "href=\"".base_url('halaman/furniture-impian-desain')."\"";
						}
					?>
					<div class="col-md-6 col-xs-12">
						<a <?php echo $attr;?>>
							<button class="btn btn-warning">
								<i class="fa fa-image fa-5x"></i><br />
								<i class="fa fa-plus"></i> Hanya Kirim Gambar Saja
							</button>
						</a>
					</div>
					<div class="col-md-6 col-xs-12">
						<a <?php echo $attr2; ?>>
							<button class="btn btn-warning">
								<i class="fa fa-pencil-square-o fa-5x"></i><br />
								<i class="fa fa-plus"></i> Kirim Gambar & Desain
							</button>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
			</div>
			<div style="clear:both;"></div>
		</div>
