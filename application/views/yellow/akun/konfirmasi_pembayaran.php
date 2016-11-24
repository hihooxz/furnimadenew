<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Konfirmasi Pembayaran
  </div>
  <div class="row text-center">

    <div class="col-md-4">
      <?php $this->load->view('yellow/akun/nav_member');?>
    </div>
    <div class="col-md-8">
      <form class="" method="post">
        <div class="row">
        <?php
          if($this->session->flashdata('success_form') == TRUE){
            ?>
            <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Hore!</strong> Kamu Telah Mengkonfirmasi Pembayaran
            </div>
            <?php
          }
          if(!$this->form_validation->run() && isset($_POST['bank'])){
            ?>
            <div class="alert alert-warning" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Ouch!</strong>
              <?php echo validation_errors()?>
            </div>
            <?php
          }
        ?>
        </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Bank Tujuan</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <?php
            $options = array(''=>'Pilih Bank');
              if($bank != FALSE){
                foreach ($bank as $rows) {
                  $options[$rows->id_pembayaran] = $rows->nama_bank;
                }
              }
              echo form_dropdown('id_pembayaran',$options,set_value('id_pembayaran'),'class="form-control"');

            ?>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Bank Asal</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12" name="bank">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Atas Nama</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12" name="atas_nama">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Nomor Rekening</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12" name="no_rekening">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Tanggal Transfer</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
             <input type="date" class="form-control col-md-7 col-xs-12" name="tanggal_transfer">
            <button class="btn btn-md form-control fur-btn-primary" style="margin-top:10px" href="#"  type="submit">
              Submit
            </button>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      </form>
    </div>

    </div>
  </div>
</div>
