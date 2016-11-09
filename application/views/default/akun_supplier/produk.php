<div class="container">
  <div class="col-sm-2 col-md-2 sidebar">
          <?php $this->load->view('default/akun_supplier/sidebar');?>
  </div>
  <div class="col-md-10">
          <h3>Produk</h3><br />
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Produk</th>
                <th>Deskripsi Produk</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Harga Promo</th>
                <th>Visibility</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if($results!=FALSE){
                  $i = 1;
                  foreach ($results as $rows) {
                    ?>
                    <tr>
                      <td><?php echo $i?></td>
                      <td><?php echo $rows->nama_produk?></td>
                      <td><?php echo $rows->deskripsi_produk?></td>
                      <td>
                        <?php if($rows->gambar_produk!= "") {
                          ?>
                            <img src="<?php echo base_url($rows->gambar_produk)?>">
                          <?php
                        } else{
                          ?>
                          <img data-src="holder.js/141x232" class="img-thumbnail">
                          <?php
                        }?>
                      </td>
                      <td>Rp <?php echo number_format($rows->harga) ?></td>
                      <td>Rp <?php echo number_format($rows->harga_promo) ?></td>
                      <td>
                        <?php
                          if($rows->status_produk == 0)
                            echo "Public";
                          if($rows->status_produk == 1)
                            echo "Private";
                          if($rows->status_produk == 2)
                            echo "Blocked";
                        ?>
                      </td> 
                    </tr>
                    <?php
                    $i++;
                  }
                }
              ?>
            </tbody>
            <thead>
              <tr>
                <th>#</th>
                <th>Produk</th>
                <th>Deskripsi Produk</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Harga Promo</th>
                <th>Visibility</th>
              </tr>
            </thead>
          </table>
          <center><?php echo $links; ?></center>
  </div>  
</div>