  <div class="container">
  <div class="row">
    <div class="col-sm-4">
        <h2><?php echo $result['nama_produk']?></h2>
        <div class="panel-body"><img src="<?php echo base_url($result['gambar_produk'])?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Rp <?php echo number_format($result['harga'])?></div>
      </div>
      <div class ="col-sm-6">
        <h2>Custom Tab</h2>
        <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Bahan</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><label>Bahan</label>
        <?php
          if($bahan!=FALSE){
            $i = 1;
            foreach ($bahan as $rows) {
              ?>
              <script type="text/javascript">
                $(document).ready(function() {
                  $("input#material<?php echo $i;?>").checked(function(event) {
                    jQuery.ajax({
                      jQuery("label#finishing").html("test");
                    });
                  });
                });
              </script>
                <label id="bahan<?php echo $i;?>"><input type="radio" id="material<?php echo $i;?>" name="bahan" value="<?php echo $rows->id_bahan?>"><?php echo $rows->nama_bahan; ?></label>
              <?php
              $i++;
            }
          }
        ?></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Finishing</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><label>Finishing</label>
        <?php
          if($finishing!=FALSE){
            $i = 1;
            foreach ($finishing as $rows) {
              ?>
              <script type="text/javascript">
                $(document).ready(function() {
                  $("input#material<?php echo $i;?>").checked(function(event) {
                    jQuery.ajax({
                      jQuery("label#finishing").html("test");
                    });
                  });
                });
              </script>
                <label id="finishing<?php echo $i;?>"><input type="radio" id="material<?php echo $i;?>" name="finishing" value="<?php echo $rows->id_finishing?>"><?php echo $rows->nama_finishing; ?></label>
              <?php
              $i++;
            }
          }
        ?></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Warna</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
          <div class="col-xs-12 col-sm-12 col-md-12 swatchGrid">
            <div class "heading"> <span><h3> Bianca </h3></span>
            </div>
          <img  src="<?php echo base_url('asset/gambar/warna/920.jpg')?>" />
          <img src="<?php echo base_url('asset/gambar/warna/921.jpg')?>"  />
          <img  src="<?php echo base_url('asset/gambar/warna/932.jpg')?>"   />
          <img  src="<?php echo base_url('asset/gambar/warna/935.jpg')?>"   />
          <img  src="<?php echo base_url('asset/gambar/warna/941.jpg')?>"   />
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
</div>
