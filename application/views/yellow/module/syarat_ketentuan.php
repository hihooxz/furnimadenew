<div class="container">
  <div class="blog-preview">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Terms & Conditions <i class="fa fa-warning fa-1x" aria-hidden="true"></i>
  </div>
    <ol>
      <?php if($result['syarat_ketentuan'] != "") echo $result['syarat_ketentuan']; else echo "data not found"?>
      </ol>
  </div>
</div>
