<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Edit Produk
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun_penjual/nav_penjual');?>
    </div>


    <div class="col-md-8">
      <?php echo form_open_multipart('')?>
      <div class="row">
      <?php
        if($this->session->flashdata('success_form') == TRUE){
          ?>
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Hore!</strong> Kamu Berhasil Edit Produk
          </div>
          <?php
        }
        if(!$this->form_validation->run() && isset($_POST['nama_produk'])){
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
        if(isset($error)){
          ?>
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Ouch!</strong>
            <?php echo $error?>
          </div>
          <?php
        }
      ?>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Kategori</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <?php
            $options = array(''=>'Pilih Kategori');
              if($kategori != FALSE){
                foreach ($kategori as $rows) {
                  $options[$rows->id_kategori] = $rows->nama_kategori;
                }
              }
              echo form_dropdown('id_kategori',$options,$result['id_kategori'],'class="form-control"');

            ?>

          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Nama Produk</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12" name="nama_produk" value="<?php echo $result['nama_produk']?>">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Foto Produk</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="file" name="userfile" class="form-control col-md-7 col-xs-12">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Harga</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12"name="harga_produk"value="<?php echo $result['harga_produk']?>">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Deskripsi Produk</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
             <textarea class="form-control col-md-7 col-xs-12" rows="5" id="comment" name="deskripsi_produk"><?php echo $result['deskripsi_produk']?></textarea>
            <button class="btn btn-md form-control fur-btn-primary" style="margin-top:10px"   type="submit">
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
