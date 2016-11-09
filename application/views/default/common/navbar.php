<nav class="navbar navbar-default">
        <div class="container-fluid" id="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Project name</a> -->
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" id="navigation">
              <li><a href="<?php echo base_url(''); ?>">HOME</a></li>
              <li><a href="<?php echo base_url('produk/kategori/11/ruang-tamu')?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">RUANG TAMU <span class="caret"></span></a>
                <ul class="dropdown-menu" id="dropdown">
                  <?php
                    $sub = $this->mod->fetchSubKategori(11);
                    if($sub!=FALSE){
                      foreach ($sub as $rows) {
                        ?>
                        <li><a href="<?php echo base_url('produk/kategori/'.$rows->id_kategori)?>"><?php echo $rows->nama_kategori?></a></li>
                        <?php
                      }
                    }
                  ?>
                </ul>
              </li>
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">RUANG MAKAN & DAPUR <span class="caret"></span></a>
                <ul class="dropdown-menu" id="dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">KAMAR TIDUR <span class="caret"></span></a>
                <ul class="dropdown-menu" id="dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">KAMAR TIDUR ANAK<span class="caret"></span></a>
                <ul class="dropdown-menu" id="dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
              <li><a href="<?php echo base_url('halaman/bulk-furniture'); ?>">BULK FURNITURE</a></li>
              <li><a href="<?php echo base_url('halaman/cari-inspirasi'); ?>">CARI INSPIRASI RUANGAN</a></li>
              <li><a href="<?php echo base_url('produk/promo'); ?>">SEDANG PROMO</a></li>
              <li><a href="<?php echo base_url('halaman/lihat-blog'); ?>">BLOG</a></li>
            </ul>
            <!-- <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul> -->
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
