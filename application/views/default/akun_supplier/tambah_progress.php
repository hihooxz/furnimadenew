<div class="container">
<div class="row">
  <div class="col-sm-4">
      <h2><?php echo $result['nama_produk']?></h2>
      <?php
        if($results!=FALSE){
          foreach ($results as $rows) {
            ?>
              <div class="col-md-6 col-xs-12">
                <?php if($rows->url_gambar!= "") {
                  ?>
                    <img src="<?php echo base_url($rows->url_gambar)?>" class="img-responsive">
                  <?php
                } else{
                  ?>
                  <img data-src="holder.js/141x232" class="img-thumbnail">
                  <?php
                }?>
              </div>
            <?php
          }
        }
      ?>
    </div>
    <div class ="col-sm-6">
      <h2>Progress Pesanan</h2>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Progress</a>
        </h4>
      </div>
      <?php
        echo form_open_multipart();
      ?>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><label></label>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-book fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="progress" name="progress">
          </div>
           <div class="input-group margin-bottom-sm form-group">
              <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
              <input class="form-control" type="file"  name="userfile">
            </div>
          <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-warning">

          </div>
          <?php
            echo form_close();
           echo validation_errors()
          ?>
        </div>
      </div>
    </div>

  </div>

  </div>
</div>
  </div>
