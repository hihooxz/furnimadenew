<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Tender
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun/nav_member');?>
    </div>
    <div class="col-md-8 form-group form-impian table-responsive">
      <div class="row">
      </div>
      <table class="table table-striped profile" style="border:1px solid #ddd">
        <thead>
          <tr>
            <td>No</td>
            <td>Judul Desain</td>
            <td width="20%">Gambar</td>
            <td>Keterangan</td>
            <td>Range Harga</td>
            <td>Tanggal Selesai</td>
            <td>Status</td>
            <td>Aksi</td>
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
                  <td><?php echo $rows->judul_desain;?></td>
                  <td>
                    <?php
                      $img = $this->mod->getDataWhere('gambar_desain','id_desain_produk',$rows->id_desain_produk);
                    ?>
                    <img class="img-responsive" src="<?php echo base_url($img['url_desain_produk']) ?>">
                  </td>
                  <td><?php echo substr($rows->deskripsi_desain,0,100)?></td>
                  <td><?php echo $rows->range_harga ?></td>
                  <td><?php echo date('d M Y',strtotime($rows->tanggal_selesai_tender)) ?></td>
                  <td>
                    <?php
                      if($rows->status_tender == 0){
                        echo "Terbuka";
                      }
                      else echo "Tutup";
                    ?>
                  </td>
                  <td>
                    <a href="<?php echo base_url($this->uri->segment(1).'/lihat-tender/'.$rows->id_tender_desain)?>" title="Lihat Tender">
                      <button class="btn btn-default dropdown-toggle">
                        <i class="fa fa-list"></i>
                      </button>
                    </a>
                    <a href="<?php echo base_url($this->uri->segment(1).'/tutup-tender/'.$rows->id_tender_desain)?>" title="Tutup Tender" onclick="return confirm('Apakah anda yakin ingin menutup tender ini?')">
                    <button class="btn btn-default dropdown-toggle">
                      <i class="fa fa-window-close-o"></i>
                    </button>
                    </a>
                  </td>
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
