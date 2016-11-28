<div class="box">
  <div class="box-header">
    <h3 class="box-title">Lihat Konfirmasi</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row" style="margin-bottom:10px">
      <form method="POST" action="">
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
        <input type="text" name="search" class="form-control" value="<?php echo set_value('search') ?>">
      </div>
      <div class="col-md-3">
        <?php
          $options = array(
                'nominal'=>'Nominal',
                'bank'=> 'Bank',
                'konfirmasi_pembayaran.atas_nama'=>'Atas Nama'
                );
          echo form_dropdown('by',$options,set_value('by'),"class='form-control'");
        ?>
      </div>
      <div class="col-md-3">
        <button type="submit"class="btn btn-default">Search</button>
      </div>
    </form>
    </div>
    <table id="example1" class="table table-bpembayaraned table-striped">
      <thead>
      <tr>
        <th>Username</th>
        <th>Nominal</th>
        <th>Bank Asal</th>
        <th>Atas Nama</th>
        <th>No rekening </th>
        <th>Nominal</th>
        <th>Bank Tujuan</th>
        <th>Tanggal Transfer</th>
        <th>Tanggal Konfirmasi</th>
        <!-- <th width="5%">Action</th> -->
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>

                <td><?php echo $rows->username ?></td>
                <td><?php echo  number_format($rows->nominal) ?></td>
                <td><?php echo $rows->bank?></td>
                <td><?php echo $rows->atas_nama?></td>
                <td><?php echo $rows->no_rekening?></td>
                <td><?php echo number_format($rows->nominal) ?></td>
                <td><?php echo $rows->nama_bank?></td>
                <td><?php echo date('D, d M Y ',strtotime($rows->tanggal_transfer)) ?></td>
                <td><?php echo date('D, d M Y H:i ',strtotime($rows->tanggal_konfirmasi_pembayaran)) ?></td>
                <!-- <td><?php if($rows->status==1) echo "<button type='button' class='btn btn-block btn-success '>Done</button>";
                 elseif($rows->status==2) echo "<button type='button' class='btn btn-block btn-info '>Pending</button>"; ?></td>
                <td>
                    <?php
                    if($rows->status != 1){
                    ?>
                  <a href ="<?php echo base_url('adminpanel/pembayaran/status-done/'.$rows->id_konfirmasi_pembayaran)?>" title="Set Status to Done">
                    <?php
                      }
                    ?>
                    <i class="fa fa-check fa-fw"></i>
                    <?php
                    if($rows->status != 1){
                    ?>
                    </a>
                    <?php
                      }
                    ?>
                    <?php
                    if($rows->status !=2){
                    ?>
                  <a href ="<?php echo base_url('adminpanel/pembayaran/status-pending/'.$rows->id_konfirmasi_pembayaran)?>" title="Set Status to Pending">
                    <?php
                    }
                    ?>
                    <i class="fa fa-hourglass-1 fa-fw"></i>
                    <?php
                    if($rows->status != 2){
                    ?>
                  </a>
                  <?php
                    }
                    ?>
                    |
                  <a href ="<?php echo base_url('adminpanel/pembayaran/hapus-konfirmasi-pembayaran/'.$rows->id_konfirmasi_pembayaran)?>" >
                    <i class="fa fa-trash"></i>
                  </a>
                </td> -->
              </tr>
      				<?php
      			}
      		}
      	?>
      	<?php
      		echo $links;
      	?>
      </tbody>
      <tfoot>
      <tr>
        <th>Username</th>
        <th>Nominal</th>
        <th>Bank Asal</th>
        <th>Atas Nama</th>
        <th>No rekening </th>
        <th>Nominal</th>
        <th>Bank Tujuan</th>
        <th>Tanggal Transfer</th>
        <th>Tanggal Konfirmasi</th>
        <!-- <th width="5%">Action</th> -->
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
