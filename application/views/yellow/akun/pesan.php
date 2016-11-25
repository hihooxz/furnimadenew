<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Pesan
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
            <td>Dari</td>
            <td>tanggal</td>
            <td style="padding:0px 50px 0px 50px"></td>
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
                  <td><?php echo $rows->nama_lengkap_penjual ?></td>
                  <td><?php echo date('D d M Y H:i',strtotime($rows->tanggal_ruangpesan))?>
                  <td>
                    <a  class="btn btn-default dropdown-toggle" href="<?php echo base_url($this->uri->segment(1).'/lihat-pesan/'.$rows->id_ruangpesan)?>">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-default dropdown-toggle" href="<?php echo base_url($this->uri->segment(1).'/delete-pesan/'.$rows->id_ruangpesan)?>">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php
                $i++;
              }
            }
          ?>
          <?php
            echo $links;
          ?>

        </tbody>
  </table>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
