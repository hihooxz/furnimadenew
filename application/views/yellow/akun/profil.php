<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Profil
  </div>
  <div class="row text-center">
    <div class="col-md-3">
      <?php $this->load->view('yellow/akun/nav_member');?>
    </div>
    <div class="col-md-8 form-group form-impian">
      <div class="row">
      </div>
      <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="text" placeholder="Nama">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="text" placeholder="Email">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="text" placeholder="Alamat">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-mobile-phone fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="text" placeholder="Phone Number">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="text" placeholder="About Me">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          Gender: 
          <label class="radio-inline">
            <input type="radio" name="gender" value="1" checked>
            Male
          </label>
          <label class="radio-inline">
            <input type="radio" name="gender" value="1">
            Female
          </label>
        </div>
        <button class="btn btn-md form-control fur-btn-primary" style="border-radius:0px">Simpan</button>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>