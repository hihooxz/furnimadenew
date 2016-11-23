<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
       <i class="fa fa-shopping-cart" aria-hidden="true"></i> Keranjang Belanjaan
  </div>

      <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
      <table class="table table-striped profile" style="border:1px solid #ddd">
        <thead> 
          <tr>
            <th>No</th>
            <th class="text-center">Produk</th>
            <th width="10%">Qty</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Subtotal</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td class="text-center">
              Sofa Ketje<br/>
              <img height="100px" src="asset/images/sofa1.jpg">
            </td>
            <td>
                <input type="number" class="form-control" value="1" name="quantity" min="1">
            </td>
            <td>Rp 4,890,000</td>
            <td>Rp 4,890,000</td>
            <td>
              <button class="btn btn-default dropdown-toggle">
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-default dropdown-toggle">
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td class="text-center">
              Sofa Ketje<br/>
              <img height="100px" src="asset/images/sofa1.jpg">
            </td>
            <td>
              <input type="number" class="form-control" value="1" name="quantity" min="1">
            </td>
            <td>Rp 4,890,000</td>
            <td>Rp 4,890,000</td>
            <td>
              <button class="btn btn-default dropdown-toggle">
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-default dropdown-toggle">
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td class="text-center">
              Sofa Ketje<br/>
              <img height="100px" src="asset/images/sofa1.jpg">
            </td>
            <td>
              <input type="number" class="form-control" value="1" name="quantity" min="1">
            </td>
            <td>Rp 4,890,000</td>
            <td>Rp 4,890,000</td>
            <td>
              <button class="btn btn-default dropdown-toggle">
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-default dropdown-toggle">
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td>4</td>
            <td class="text-center">
              Sofa Ketje<br/>
              <img height="100px" src="asset/images/sofa1.jpg">
            </td>
            <td>
              <input type="number" class="form-control" value="1" name="quantity" min="1">
            </td>
            <td>Rp 4,890,000</td>
            <td>Rp 4,890,000</td>
            <td>
              <button class="btn btn-default dropdown-toggle">
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-default dropdown-toggle">
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
          <tfoot>
            <tr>
              <th colspan="4">Total</th>
              <th colspan="2" class="text-center">Rp  19,560,000</th>
            </tr>
          </tfoot> 
        </tbody>
  </table>
  <div class="row">
    <div class="col-md-4">
      <a class="btn btn-md form-control fur-btn-primary" style="margin-top:10px" href="#" role="button" type="submit">
              <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali Berbelanja
      </a>
    </div>
    <div class="col-md-4">
      <a class="btn btn-md form-control fur-btn-primary" style="margin-top:10px" href="#" role="button" type="submit">
              <i class="fa fa-close" aria-hidden="true"></i> Kosongkan Keranjang
      </a>
    </div>
    <div class="col-md-4">
      <a class="btn btn-md form-control fur-btn-primary" style="margin-top:10px" href="<?php echo base_url('akun-penjual/checkout/')?>" role="button" type="submit">
          Checkout <i class="fa fa-arrow-right" aria-hidden="true"></i>
      </a>
    </div>
  </div>
  </div>
  <div class="col-md-1"></div>
  </div>
  </div>
</div>