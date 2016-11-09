<div class="container">
<div class="row">
  <div class="col-sm-4">
      <h2><?php echo $result['nama_produk']?></h2>
      <div class="panel-body"><img src="#" class="img-responsive" alt="gambar produk"></div>

    </div>
    <div class ="col-sm-6">
      <h2>Lihat Detail</h2>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Detail Barang</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse collapse">
        <div class="panel-body"><label></label>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Deskripsi Furniture</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                      <tr>

                        <td><?php echo $result['nama_produk']?></td>
                        <td><?php echo $result['deskripsi_produk']?></td>
                        <td>
                          <?php
                            if($result['status_buat'] == 1)
                              echo "Pending";
                            if($result['status_buat'] == 2)
                              echo "Proses";
                            if($result['status_buat'] == 3)
                              echo "Selesai";
                            if($result['status_buat'] == 4)
                             echo "dibatalkan";
                          ?>
                        </tr>
            </tbody>
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Deskripsi Furniture</th>
                <th>Status</th>
              </tr>
            </thead>
          </table></div>
      </div>
    </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Bahan</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse collapse">
      <div class="panel-body"><label>Bahan</label>
      <?php
        echo $result['nama_bahan'];
      ?></div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Finishing</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body"><label>Finishing</label>
      <?php
        echo $result['nama_finishing'];
      ?></div>
    </div>
  </div>

  </div>
</div>
  </div>
</div>
