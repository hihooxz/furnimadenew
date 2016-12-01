<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Ajukkan Penawaran
  </div>
  <div class="row text-center">
  <?php
    if($penjual == FALSE){
                          $img = $this->mod->getDataWhere('gambar_desain','id_desain_produk',$result['id_desain_produk']);
                        ?>
    <div class="col-md-4">
            <?php
                if($img['url_desain_produk']!=""){
                  ?>
                  <img class="img-responsive" src="<?php echo base_url($img['url_desain_produk']) ?>">
                  <?php
                }
                else{
                  ?>
                  <i class="fa fa-archive fa-5x"></i>
                  <?php
                }
              ?>
          </div>
          <div class="col-md-8">
            <div class="row">
              <?php
                if(!$this->form_validation->run() && isset($_POST['lama_pengerjaan'])){
                  ?>
                  <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Ouch!</strong>
                    <?php echo validation_errors()?>
                  </div>
                  <?php
                }
                if($this->session->flashdata('failed_form') == TRUE){
                 ?>
                  <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Ouch!</strong>
                    Anda Sudah Pernah Mengajukkan Penawaran Sebelumnya.
                  </div>
                  <?php 
                }
                if($this->session->flashdata('success_form') == TRUE){
                  ?>
                  <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Hore!</strong>
                    Anda Berhasil Mengajukkan Penawaran.
                  </div>
                  <?php
                }
              ?>
            </div>
            <form method="POST" action="<?php echo base_url($this->uri->segment(1).'/ajukkan-penawaran/'.$this->uri->segment(3))?>">
              <div class="input-group margin-bottom-sm form-group" style="border-radius:0px">
                <span class="input-group-addon modal-fa"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                  <input class="form-control" type="text" placeholder="Lama Pengerjaan (contoh: 5 Hari, 1 Minggu, 1 Bulan, dst)" name="lama_pengerjaan" value="<?php echo set_value('lama_pengerjaan')?>">
              </div>
              <div class="input-group margin-bottom-sm form-group" style="border-radius:0px">
                <span class="input-group-addon modal-fa"><i class="fa fa-unsorted fa-fw" aria-hidden="true"></i></span>
                  <input class="form-control" type="number" placeholder="Harga (contoh: 1000000)" name="harga" required min="0" value="<?php echo set_value('harga')?>">
              </div>
              <div class="input-group margin-bottom-sm form-group" style="border-radius:0px">
                <span class="input-group-addon modal-fa"><i class="fa fa-tree fa-fw" aria-hidden="true"></i></span>
                  <input class="form-control" type="text" placeholder="Bahan (contoh: Kayu jati, mahoni, dll)" name="bahan" value="<?php echo set_value('bahan')?>">
              </div>
              <div class="input-group margin-bottom-sm form-group" style="border-radius:0px">
                <span class="input-group-addon modal-fa"><i class="fa fa-info fa-fw" aria-hidden="true"></i></span>
                  <input class="form-control" type="text" placeholder="Keterangan Tambahan" name="keterangan" value="<?php echo set_value('keterangan')?>">
              </div>
              <input type="hidden" name="id_tender_desain" value="<?php echo $result['id_tender_desain']?>">
              <button class="btn btn-md form-control fur-btn-primary" style="border-radius:0px" type="submit">Ajukkan Penawaran
              <i class="fa fa-edit"></i></button>
              </form>
            </div>
        <?php
          }
          else{
            ?>
            <h3>Anda Sudah Melakukkan Pengajuan Penawaran untuk Tender Ini.</h3>
            <a href="<?php echo base_url($this->uri->segment(1).'/tender')?>">
              <button class="btn btn-lg fur-btn-primary" style="border-radius:0px" role="button"><i class="fa fa-arrow-left"></i> Kembali ke Tender</button>
            </a>
            <?php
          }
        ?>
  </div>
</div>
