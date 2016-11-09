<div class="box">
  <div class="box-header">
    <h3 class="box-title">Lihat User</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row" style="margin-bottom:10px">
      <form method="POST" action="">
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
        <input type="text" name="search" class="form-control">
      </div>
      <div class="col-md-3">
        <?php
          $options = array(
                'username'=>'Username',
                'nama_lengkap'=> 'Nama Lengkap',
                'email' => 'Email',
                'alamat' => 'Alamat',
                'tanggal_daftar'=> 'Tangga Daftar'
                );
          echo form_dropdown('by',$options,set_value('by'),"class='form-control'");
        ?>
      </div>
      <div class="col-md-3">
        <button type="submit"class="btn btn-default">Search</button>
      </div>
    </form>
    </div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Username</th>
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Hak Akses</th>
        <th>Tanggal Daftar</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php echo $rows->username ?></td>
                <td><?php echo $rows->nama_lengkap ?></td>
                <td><?php echo $rows->email ?></td>
                <td><?php if($rows->jenis_kelamin==1) echo "Male"; else echo "Female"; ?></td>
                <td><?php echo $rows->alamat ?></td>
                <td><?php if($rows->hak_akses==1) echo "Admin"; elseif($rows->hak_akses==2) echo "Tukang Kayu"; else "Customer"; ?></td>
                <td><?php echo $rows->tanggal_daftar ?></td>
                  <td>
                  <a href ="<?php echo base_url('adminpanel/user/ubah_user/'.$rows->id_user)?>">Ubah</a> |
                  <a href ="<?php echo base_url('adminpanel/user/hapus_user/'.$rows->id_user)?>" onclick="return confirm('Apakah Kamu yakin data tersebut ingin dihapus ?')">Hapus</a>
                </td>
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
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Hak Akses</th>
        <th>Tanggal Daftar</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
