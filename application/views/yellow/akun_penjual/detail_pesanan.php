<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Detail Pesanan
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun_penjual/nav_penjual');?>
    </div>
    <div class="col-md-8 form-group form-impian table-responsive">
      <div class="row">
      </div>
      <table class="table table-striped profile" style="border:1px solid #ddd">
        <thead>
          <tr>
            <td>No</td>
            <td width="30%">Produk</td>
            <td>Harga</td>
            <td>Qty</td>
            <td>Total</td
          </tr>
        </thead>
        <tbody>
        <?php
          if($results!=FALSE){
            $i = 1;
            foreach ($results as $rows) {
              ?>
              <tr>
                <td><?php echo $i;?></td>
                <td>
                <?php
                  if($rows->gambar_produk == ""){
                    ?>
                    <i class="fa fa-archive fa-5x" style="color:#f2bb00"></i>
                    <?php
                  }
                  else{
                    ?>
                    <img src="<?php echo base_url($rows->gambar_produk)?>" height="200px">
                    <?php
                  }
                ?><br />
                <?php echo $rows->nama_produk ?></td>
                <td>Rp <?php echo number_format($rows->harga_beli)?></td>
                <td>Rp <?php echo number_format($rows->qty)?></td>
                <td>Rp <?php echo number_format($rows->harga_beli*$rows->qty)?></td>
              </tr>
              <?php
              $i++;
            }
          }
        ?>
        </tbody>
  </table>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
