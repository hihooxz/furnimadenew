<div class="container" style="margin-bottom:105px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center">
      <div style="margin-bottom:20px" class="modal-title">
        <i class="fa fa-lock" aria-hidden="true"></i> Login
      </div>
      <?php
        if(!$this->form_validation->run() && isset($_POST['username'])){
          ?>
          <div class="alert alert-warning" role="alert">
            <strong>Hei!</strong> 
            <?php
              echo validation_errors();
            ?>
          </div>
          <?php
        }
      ?>
      <form method="POST" action="">
            <div class="input-group margin-bottom-sm form-group">
              <span class="input-group-addon modal-fa"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" placeholder="Username" name="username">
            </div>
            <div class="input-group margin-bottom-sm form-group">
              <span class="input-group-addon modal-fa"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <button class="btn btn-md form-control fur-btn-primary" style="border-radius:0px">Login</button>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
