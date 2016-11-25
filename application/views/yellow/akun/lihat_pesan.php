<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
      Lihat Pesan dari <?php echo $result['username']?>
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun/nav_member');?>
    </div>
    <div class="col-md-8">
      <?php
        if($results!=FALSE){
          foreach ($results as $rows) {
            if($rows->id_user == $this->session->userdata('idUser')){
            ?>
            <div class="row text-left">
              <div class="col-xs-8 col-xs-offset-2">
                <div class="alert alert-warning" role="alert">
                  <div class="col-xs-10">
                    <h4><?php echo $this->session->userdata('username')?></h4>
                    <?php
                      echo $rows->pesan;
                    ?><br />
                    <small><?php echo date('D, d M Y H:i',strtotime($rows->tanggal_pesan))?></small>
                  </div>
                  <div class="col-xs-2">
                      <i class="fa fa-user fa-4x"></i>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <?php
              }
            else{
              ?>
              <div class="row text-left">
                <div class="col-xs-8">
                  <div class="alert alert-info" role="alert">
                    <?php
                      echo $rows->pesan;
                    ?><br />
                    <small><?php echo date('D, d M Y H:i',strtotime($rows->tanggal_pesan))?></small>
                  </div>
                </div>
              </div>
              <?php
            }
          }
        }
      ?>
      <div class="text-left">
      <a href="<?php echo base_url($this->uri->segment(1).'/kirim-pesan/'.$result['id_penjual'])?>">
        <button class="btn btn-md fur-btn-primary" style="border-radius:0px">
        <i class="fa fa-envelope"></i> Kirim Pesan</button>
      </a>
      </div>
    </div>
  </div>
</div>
