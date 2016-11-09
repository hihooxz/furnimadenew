<div class="container">
  <div class="col-sm-3 col-md-2 sidebar">
          <?php $this->load->view('default/akun_supplier/sidebar');?>
  </div>
  <div class="col-md-9">
          <h3>Tambah Produk</h3><br />
          <?php echo form_open_multipart();
            echo validation_errors();
            if(isset($error))
            echo $error;
            if($this->session->flashdata('result') == TRUE)
              echo "Berhasil Menambah Produk. Saat ini visibility produk anda adalah private.";
           ?>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-comment-o fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Nama produk" name="nama_produk" value="<?php echo set_value('nama_produk');?>">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-newspaper-o fa-fw"></i></span>
            <textarea name="deskripsi_produk" class="form-control" placeholder="Deskripsi Produk"><?php echo set_value('deskripsi_produk');?></textarea>
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Harga" name="harga" value="<?php echo set_value('harga');?>">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Harga Promo (Jika Ada Promo Diisi)" name="harga_promo" value="<?php echo set_value('harga_promo');?>">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-image fa-fw"></i></span>
            <input class="form-control" type="file" name="userfile">
          </div>
          <label><small>*Gambar Max 1 Mb</small></label>
          <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-warning" name="save">
          </div>
          <?php echo form_close(); ?>
  </div>  
</div>