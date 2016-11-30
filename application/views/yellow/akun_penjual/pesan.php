<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Pesan
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
            <td>Dari</td>
            <td>tanggal</td>
            <td>Aksi</td>
          </tr>
        </thead>
        <tbody>
          <?php
            if($results!=FALSE){
              $i= 1;
              foreach ($results as $rows) {
                ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $rows->nama_lengkap_pembeli ?></td>
                  <td><?php echo date('D d M Y H:i',strtotime($rows->tanggal_ruangpesan))?>
                  <td>
                    <a  class="btn btn-default dropdown-toggle" href="<?php echo base_url($this->uri->segment(1).'/lihat-pesan/'.$rows->id_ruangpesan)?>" title="Lihat Pesan">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-default dropdown-toggle" href="<?php echo base_url($this->uri->segment(1).'/hapus-pesan/'.$rows->id_ruangpesan)?>" title="Hapus Pesan">
                      <i class="fa fa-trash"></i>
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
          <?php
            echo $links;
          ?>
    </div>
  </div>
</div>
