<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
       Pembayaran & Checkout
  </div>

      <div class="row">

      <div class="col-md-1"></div>
      <div class="col-md-10">
        <p>
          Pastikan informasi dibawah ini adalah benar data anda. Jika belum sesuai silahkan diubah dengan keadaan anda saat ini.
        </p>
        <?php
          if(!$this->form_validation->run() && isset($_POST['nama_lengkap'])){
            ?>
            <div class="alert alert-warning" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Ouch!</strong> 
              <?php echo validation_errors();?>
            </div>
            <?php
          }
        ?>
        <div class="row text-center title-info">
          <i class="fa fa-user" aria-hidden="true"></i> Informasi User
        </div>
        <?php echo form_open('')?>
        <div class="row pembayaran">
          <div class="col-md-4">
            <label>Nama</label>
            <input type="text" class="form-control col-xs-12" value="<?php echo $result['nama_lengkap']?>" name="nama_lengkap">
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label>Email</label>
            <input type="text" class="form-control col-xs-12" value="<?php echo $result['email']?>" name="email">
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label>Nomor Telepon</label>
            <input type="text" class="form-control col-xs-12" value="<?php echo $result['no_hp']?>" name="no_hp">
          </div>
        </div>
        <div>
          <label>Alamat</label>
          <textarea name="alamat" class="form-control col-xs-12" rows="3" id="comment" style="margin-bottom: 30px"><?php echo $result['alamat']?></textarea>
        </div>
        <div class="row pembayaran">
          <div class="col-md-5">
            <label>Total Harga</label>
            <input type="text" class="form-control col-xs-12" value="Rp <?php echo number_format($this->cart->total()) ?>" disabled>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-6"></div>
        </div>
        <div class="row text-center title-info">
          <i class="fa fa-money" aria-hidden="true"></i> Metode Pembayaran
        </div>
          <?php
            if($bank!=FALSE){
              $i = 1;
              foreach ($bank as $rows) {
                if($i%3==1){
                  ?>
                  <div class="row pembayaran text-center">
                  <?php
                }
                ?>
                <div class="col-md-4">
                  <label style="cursor:pointer">
                    <input type="radio" value="<?php echo $rows->id_pembayaran ?>" name="id_pembayaran"><br/>
                    <?php
                      if($rows->gambar_bank == ""){
                        ?>
                        <i class="fa fa-bank fa-3x" aria-hidden="true"></i><br/>
                        <?php
                      }
                      else{
                        ?>
                        <img src="<?php echo base_url($rows->gambar_bank)?>" class="img-responsive">
                        <?php
                      }
                    ?>
                    <b><?php echo $rows->nama_bank?></b><br/>
                    a/n. <?php echo $rows->atas_nama?><br/>
                    <?php echo $rows->no_rekening?>
                  </label>
                </div>
                <?php
                if($i%3==0 || $i==$total_bank){
                  echo "</div>";
                }
                $i++;
              }
            }
          ?>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <button class="btn btn-md form-control fur-btn-primary" style="margin-top:10px" type="submit">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i> Order
          </button>
        </div>
        <div class="col-md-3"></div>
        </div>
        <?php echo form_close('')?>
  </div>
  <div class="col-md-1"></div>
  </div>
  </div>
</div>