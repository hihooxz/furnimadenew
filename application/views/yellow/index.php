<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('yellow/common/header'); ?>
</head>
<body>
    <?php $this->load->view('yellow/common/nav'); ?>
    <?php $this->load->view($path_content); ?>

<br/>
  

<div id="loginModal" class="modal fade in" role="dialog">
  <div class="modal-dialog modal-lg product-modal">
    <div class="modal-content flat text-center" style="border-radius:0px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <i class="fa fa-close fa-2x"></i>
        </button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6" style="border-right:1px solid #e0e0e0">
            <div class="input-group margin-bottom-sm form-group" style="border-radius:0px">
              <span class="input-group-addon modal-fa"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" placeholder="Username">
            </div>
              <div class="input-group margin-bottom-sm form-group">
              <span class="input-group-addon modal-fa"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" placeholder="Password">
            </div>
            <div class="form-group">
              <a href="#" style="color:#333">Forgot Password ?</a>
            </div>
            <button class="btn btn-md form-control fur-btn-primary" style="border-radius:0px">Login</button>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
      <div class="modal-footer text-center">
        Belum punya akun ?
         <a href="#"> Daftar Disini</a>
      </div>
    </div>
  </div>
</div>

    <script src="asset/asset_index/bootstrap/js/jquery.min.js"></script>
    <script src="asset/asset_index/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>