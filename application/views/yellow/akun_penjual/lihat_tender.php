<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
      Lihat Tender
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun/nav_member');?>
    </div>
    <div class="col-md-8 ">
      <div class="row" style="margin-bottom: 10px;">
        <div class="col-xs-3">
          <a title="Kembali ke Tender" href="<?php echo base_url($this->uri->segment(1).'/tender')?>">
            <button class="btn btn-md fur-btn-primary"><i class="fa fa-arrow-left"></i> Kembali ke Tender</button>
          </a>
        </div>
        <div class="col-xs-3 col-xs-offset-6">
            <button class="btn btn-md fur-btn-primary" data-toggle="modal" data-target="#tenderModal" role="button"><i class="fa fa-edit"></i> Ajukkan Penawaran</button>
        </div>
      </div>
    <div class="form-group form-impian table-responsive">
          <table class="table table-striped profile" style="border:1px solid #ddd">
            <thead>
              <tr>
                <td>Judul Desain</td>
                <td width="20%">Gambar</td>
                <td>Keterangan</td>
                <td>Range Harga</td>
                <td>Tanggal Selesai</td>
                <td>Status</td>
                <td>Total Penawaran</td>
              </tr>
            </thead>
            <tbody>
                    <tr>
                      <td><?php echo $result['judul_desain'];?></td>
                      <td>
                        <?php
                          $img = $this->mod->getDataWhere('gambar_desain','id_desain_produk',$result['id_desain_produk']);
                        ?>
                        <img class="img-responsive" src="<?php echo base_url($img['url_desain_produk']) ?>">
                      </td>
                      <td><?php echo substr($result['deskripsi_desain'],0,100)?></td>
                      <td><?php echo $result['range_harga'] ?></td>
                      <td><?php echo date('d M Y',strtotime($result['tanggal_selesai_tender'])) ?></td>
                      <td>
                        <?php
                          if($result['status_tender'] == 0){
                            echo "Terbuka";
                          }
                          else echo "Tutup";
                        ?>
                      </td>
                      <td><?php echo $total_penjual;?></td>
                    </tr>
            </tbody>
      </table>
        </div>
        <div class="form-group form-impian table-responsive">
          <table class="table table-striped profile" style="border:1px solid #ddd">
          <thead>
            <tr>
              <td width="70%">Gambar</td>
              <td>Jenis</td>
            </tr>
          </thead>
          <tbody>
            <?php 
              if($results!=FALSE){
                foreach ($results as $rows) {
                  ?>
                  <tr>
                    <td>
                      <img src="<?php echo base_url($rows->url_desain_produk)?>" height="200px">
                    </td>
                    <td>
                      <?php
                        if($rows->jenis_desain == 0)
                          echo "Gambar Dimensi Produk";
                        else if($rows->jenis_desain == 1)
                          echo "Gambar 3D Produk";
                      ?>
                    </td>
                  </tr>
                  <?php
                }
              }
            ?>
          </tbody>
        </table>
        </div>
    </div>
  </div>
</div>

<div id="tenderModal" class="modal fade in" role="dialog">
  <div class="modal-dialog modal-lg product-modal">
    <div class="modal-content flat text-center" style="border-radius:0px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <i class="fa fa-close fa-2x"></i>
        </button>
        <h4 class="modal-title">Ajukkan Penawaran</h4>
      </div>
      <div class="modal-body">
        <div class="row">
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
            <form method="POST" action="<?php echo base_url($this->uri->segment(1).'/ajukkan-penawaran')?>">
              <div class="input-group margin-bottom-sm form-group" style="border-radius:0px">
                <span class="input-group-addon modal-fa"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                  <input class="form-control" type="text" placeholder="Lama Pengerjaan (contoh: 5 Hari, 1 Minggu, 1 Bulan, dst)" name="lama_pengerjaan">
              </div>
              <div class="input-group margin-bottom-sm form-group" style="border-radius:0px">
                <span class="input-group-addon modal-fa"><i class="fa fa-unsorted fa-fw" aria-hidden="true"></i></span>
                  <input class="form-control" type="number" placeholder="Harga (contoh: 1000000)" name="harga" required min="0">
              </div>
              <div class="input-group margin-bottom-sm form-group" style="border-radius:0px">
                <span class="input-group-addon modal-fa"><i class="fa fa-tree fa-fw" aria-hidden="true"></i></span>
                  <input class="form-control" type="text" placeholder="Bahan (contoh: Kayu jati, mahoni, dll)" name="bahan">
              </div>
              <div class="input-group margin-bottom-sm form-group" style="border-radius:0px">
                <span class="input-group-addon modal-fa"><i class="fa fa-info fa-fw" aria-hidden="true"></i></span>
                  <input class="form-control" type="text" placeholder="Keterangan Tambahan" name="keterangan">
              </div>
              <input type="hidden" name="id_tender_desain" value="<?php echo $result['id_tender_desain']?>">
              <button class="btn btn-md form-control fur-btn-primary" style="border-radius:0px" type="submit">Ajukkan Penawaran
              <i class="fa fa-edit"></i></button>
              </form>
            </div>
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