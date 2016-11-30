<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        <?php echo $result['nama_produk']?>
  </div>
  <div class="row text-center btn-produk" style="margin-top:20px">
  <span class="pull-right">Product by: <i class="fa fa-user fa-fw"></i> <?php echo $result['username']?>
  <?php
    if($this->session->userdata('hakAkses') == 2 && $this->session->userdata('idUser') != $result['id_penjual']){
      ?>
      <a href="<?php echo base_url('akun-penjual/kirim-pesan/'.$result['id_penjual'])?>" title="Kirim Pesan">
      <button class="btn fur-btn-primary">
      <i class="fa fa-envelope"></i> Kirim Pesan
      </button></a>
      <?php
    }
    else if($this->session->userdata('hakAkses') == 3){
      ?>
      <a href="<?php echo base_url('akun/kirim-pesan/'.$result['id_penjual'])?>" title="Kirim Pesan">
      <button class="btn fur-btn-primary">
      <i class="fa fa-envelope"></i> Kirim Pesan
      </button></a>
      <?php
    }
  ?>
  
  </span>
    <div class="col-md-6 col-sm-4 col-xs-6">
      <?php
                if($result['gambar_produk']!=""){
                  ?>
                  <img class="img" width="250" height="180" src="<?php echo base_url($result['gambar_produk']) ?>">
                  <?php
                }
                else{
                  ?>
                  <i class="fa fa-cube fa-5x"></i>
                  <?php
                }
              ?>
    </div>

    <div class="col-md-6 col-sm-8 col-xs-6 text-left">
        <b>Spesifikasi Produk</b><br/>
        <?php
          echo $result['deskripsi_produk'];
        ?>
    </div><br/>
    <div class="produk-price cart-btn text-left row">
        <span class="col-md-3"><i class="fa fa-tag fa-fw"></i> Rp <?php echo number_format($result['harga_produk'])?></span>
        <?php
          if($this->session->userdata('loginMember') == TRUE){
        ?>
        <span class="col-md-3 text-center"><a href="#" data-toggle="modal" data-target="#cartModal" role="button"><i class="fa fa-cart-plus fa-fw"></i>Tambahkan ke Keranjang</a></span>
        <?php
        }
        else{
          ?>
          <span class="col-md-3 text-center"><a href="#" data-toggle="modal" data-target="#loginModal" role="button"><i class="fa fa-cart-plus fa-fw"></i>Tambahkan ke Keranjang</a></span>
          <?php
        }
        ?>
    </div>
  </div>
</div>

<div id="cartModal" class="modal fade in" role="dialog">
  <div class="modal-dialog modal-lg product-modal">
    <div class="modal-content flat text-center" style="border-radius:0px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <i class="fa fa-close fa-2x"></i>
        </button>
        <h4 class="modal-title">Tambahkan ke Keranjang</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <?php
                if($result['gambar_produk']!=""){
                  ?>
                  <img class="img" width="250" height="180" src="<?php echo base_url($result['gambar_produk']) ?>">
                  <?php
                }
                else{
                  ?>
                  <i class="fa fa-cube fa-5x"></i>
                  <?php
                }
              ?>
          </div>
          <div class="col-md-8" style="border-right:1px solid #e0e0e0">
          <?php
            if($this->session->userdata('hakAkses') == 2)
              $url = "akun-penjual";
            else if($this->session->userdata('hakAkses') == 3)
              $url = "akun";
          ?>
          <form method="POST" action="<?php echo base_url($url.'/tambahkan-keranjang')?>">
            <div class="input-group margin-bottom-sm form-group" style="border-radius:0px">
              <span class="input-group-addon modal-fa"><i class="fa fa-unsorted fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="number" placeholder="Qty" name="qty" min=1>
            </div>
            <input type="hidden" name="id_produk" value="<?php echo $result['id_produk']?>">
            <button class="btn btn-md form-control fur-btn-primary" style="border-radius:0px" type="submit">Tambahkan ke Keranjang
            <i class="fa fa-cart-plus"></i></button>
            </form>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer text-center">
        Belum punya akun ?
         <a href="<?php echo base_url('hal/daftar')?>"> Daftar Disini</a>
      </div> -->
    </div>
  </div>
</div>