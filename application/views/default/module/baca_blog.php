<!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2><?php echo $result['judul_blog']?></h2>

         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <!-- <a href="#"><img alt="img" src="assets/img/blog/blog-3.jpg"></a> -->
                          <figcaption class="mu-blog-caption">
                            <h3><a href="#"><?php echo $result['judul_blog']?></a></h3>
                          </figcaption>
                        </figure>
                        <div class="col-md-3">
                            <img src="<?php echo base_url ($result['gambar_blog'])?>" height="300px"  alt="img">
                        </div>
                        <div class="mu-blog-meta">
                          <a href="#"><?php echo date('D, d M Y',strtotime($result['tanggal_blog']))?></a>
                        </div>
                        <div class="mu-blog-description">
                          <?php echo $result['isi_blog'] ?>

                        </div>

                      </article>
                    </div>
                  </div>
                </div>

              </div>

           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
