<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Unggah Produk
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun_penjual/nav_penjual');?>
    </div>
    <div class="col-md-8">
      <form class="fr">
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Kategori</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <select class="form-control fr">
              <option >Lorem Ipsum 1</option>
              <option >Lorem Ipsum 2</option>
              <option >Lorem Ipsum 3</option>
              <option >Lorem Ipsum 4</option>
            </select>
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
            <input type="text" class="form-control col-md-7 col-xs-12">
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
            <input type="file" name="pic" class="form-control col-md-7 col-xs-12">
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
            <input type="text" class="form-control col-md-7 col-xs-12">
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
             <textarea class="form-control col-md-7 col-xs-12" rows="5" id="comment"></textarea>
            <a class="btn btn-md form-control fur-btn-primary" style="margin-top:10px" href="#" role="button" type="submit">
              Submit
            </a>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      </form>
    </div>
       
    </div>
  </div>
</div>