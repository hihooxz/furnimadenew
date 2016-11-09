<div class="container">
  <div class="col-sm-2 col-md-2 sidebar">
          <?php $this->load->view('default/akun/sidebar');?>
  </div>
  <div class="col-md-10">
          <h3>Lihat Progress</h3><br />
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nama Customer</th>
                <th>Nama Produk</th>
                <th>Progress</th>
                <th>Gambar Progress</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  if($results!=FALSE){

                    foreach ($results as $rows) {
                      ?>
                      <tr>
                        <td><?php echo $rows->username ?></td>
                        <td><?php echo $rows->nama_produk?></td>
                        <td><?php echo $rows->progress?></td>
                        <td><?php if($rows->gambar_progress!= "") {
                          ?>
                          <img src="<?php echo base_url($rows->gambar_progress)?>" height="150px">
                          <?php
                        } ?></td>


                      <?php

                    }
                  }
                ?>
            </tbody>
            <thead>
              <tr>
                <th>Nama Customer</th>
                <th>Nama Produk</th>
                <th>Progress</th>
                <th>Gambar Progress</th>
              </tr>
            </thead>
          </table>
  </div>
</div>
