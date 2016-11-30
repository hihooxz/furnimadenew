<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
       <i class="fa fa-shopping-cart" aria-hidden="true"></i> Keranjang Belanjaan
  </div>

      <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
      <?php echo form_open('')?>
      <input type="hidden" name="hidden" value="1">
      <table class="table table-striped profile" style="border:1px solid #ddd">
        <thead> 
          <tr>
            <th class="text-center">Produk</th>
            <th width="10%">Qty</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Subtotal</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($this->cart->contents() as $items): ?>
          <tr>
            <td class="text-center">
              <?php echo $items['name']?><br/>
              <img height="100px" src="<?php echo base_url($items['image'])?>">
            </td>
            <td>
                <input type="number" class="form-control" value="<?php echo $items['qty']?>" name="qty_<?php echo $items['id']?>" min="1">
            </td>
            <td class="text-right">Rp <?php echo number_format($items['price'])?></td>
            <td class="text-right">Rp <?php echo number_format($items['price']*$items['qty'])?></td>
            <td class="text-center">
              <a href="<?php echo base_url($this->uri->segment(1).'/hapus-item/'.$items['rowid'])?>" title="Hapus Item">
              <button class="btn btn-default dropdown-toggle">
                <i class="fa fa-trash"></i>
              </button>
              </a>
            </td>
          </tr>
          <?php 
          endforeach; 
          
          ?>
          <tfoot>
            <tr>
              <th colspan="3">Total</th>
              <th class="text-right">Rp  <?php echo number_format($this->cart->total())?></th>
              <th class="text-center">
                <button class="btn btn-md fur-btn-primary" style="margin-top:10px" type="submit">
              <i class="fa fa-refresh" aria-hidden="true"></i> Update Qty
                </button>
              </th>
            </tr>
          </tfoot> 
        </tbody>
  </table>
  <?php echo form_close('')?>
  <div class="row">
    <div class="col-md-4">
      <a class="btn btn-md form-control fur-btn-primary" style="margin-top:10px" href="<?php echo base_url('produk/katalog')?>" role="button" type="submit">
              <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali Berbelanja
      </a>
    </div>
    <div class="col-md-4">
      <a class="btn btn-md form-control fur-btn-primary" style="margin-top:10px" href="<?php echo base_url($this->uri->segment(1).'/kosongkan-keranjang/')?>" role="button" type="submit">
              <i class="fa fa-close" aria-hidden="true"></i> Kosongkan Keranjang
      </a>
    </div>
    <div class="col-md-4">
      <a class="btn btn-md form-control fur-btn-primary" style="margin-top:10px" href="<?php echo base_url($this->uri->segment(1).'/checkout/')?>" role="button" type="submit">
          Checkout <i class="fa fa-arrow-right" aria-hidden="true"></i>
      </a>
    </div>
  </div>
  </div>
  <div class="col-md-1"></div>
  </div>
  </div>
</div>