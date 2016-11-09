<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url('asset/blog/css/bootstrap.min.css')?>" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url('asset/blog/css/blog-home.css')?>" rel="stylesheet">
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Furnimade Blog
                <small>Blog</small>
            </h1>
            <!-- Second Blog Post -->
        </div>
      </div>
            <!-- First Blog Post -->
            <?php
              if($results != FALSE){
                foreach ($results as $rows) {
                  ?>
                <div  class="row" style="margin-top:20px;">
            <h2>
                <a href="#"><?php echo$rows->judul_blog?></a>
            </h2>
              <p><span class="glyphicon glyphicon-time"></span><?php echo date('d M Y',strtotime($rows->tanggal_blog))?></p>
            <hr>
          <div  class="col-md-4">
            <?php if($rows->gambar_blog!= "") {
              ?>
              <img src="<?php echo base_url($rows->gambar_blog)?>" height="300px"  alt="img">
              <?php
            } ?>
          </div>
          <div class="col-md-8">
            <p><?php echo substr($rows->isi_blog,0,1000)?>...</p>
            <a class="btn btn-warning" href="<?php echo base_url('halaman/baca_blog/'.$rows->id_blog)?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
          </div>
        </div>
            <?php
          }
        }
      ?>
</div>
