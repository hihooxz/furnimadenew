<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Kirim Pesan
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun/nav_member');?>
      </ul>
    </div>
    <div class="col-md-8">
      <?php echo form_open_multipart('');?>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Penerima Pesan*</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $result['username']?>" readonly name="username">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Isi Pesan*</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <textarea class="form-control col-md-7 col-xs-12" rows="5" id="comment" name="pesan"></textarea>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Gambar Pesan</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
             <input type="file" name="userfile" class="form-control col-md-7 col-xs-12">
            <button class="btn btn-md form-control fur-btn-primary" style="margin-top:10px" href="#" role="button" type="submit">
              Submit
            </button>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      </form>
    </div>

    </div>
  </div>
</div>
