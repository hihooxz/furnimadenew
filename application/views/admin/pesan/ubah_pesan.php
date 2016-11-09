<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ubah pesan</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php if(!$this->form_validation->run() && isset($_POST['Pesan'])){ ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      <?php echo validation_errors();
      ?>
    </div>
    <?php }
    echo $error;
    ?>
    <?php echo form_open_multipart('');?>
      <!-- text input -->

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if(!$this->form_validation->run() && isset($_POST['pesan'])){ ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            <?php echo validation_errors();
            ?>
          </div>
          <?php }
          echo $error;
          ?>
          <?php echo form_open_multipart('');?>
            <!-- text input -->

            <div class="form-group">
              <label>Pesan</label>
              <textarea class="form-control" rows="3" name="pesan"><?php echo $result['pesan'] ?></textarea>
             </div>
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" class="form-control"  name="userfile">
            </div>

             </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!-- /.box-body -->
      </div> <!-- end of div box body -->
      </div> <!-- end of div cols 6 -->
      </div> <!-- end of div row-->
      </section>


  </div>
  <!-- /.box-body -->
</div> <!-- end of div box body -->
</div> <!-- end of div cols 6 -->
</div> <!-- end of div row-->
</section>
