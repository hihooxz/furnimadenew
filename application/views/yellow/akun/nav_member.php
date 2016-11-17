<ul class="member-sidebar text-left" id="member-sidebar" style="list-style:none">
        <li>
          <a <?php if($this->uri->segment(2) == 'profil') echo "class=\"active\""?> href="<?php echo base_url('akun/profil') ?>"><i class="fa fa-user" aria-hidden="true"></i>Profil</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'pesan') echo "class=\"active\""?> href="<?php echo base_url('akun/pesan') ?>"><i class="fa fa-envelope-open" aria-hidden="true"></i> Pesan</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'riwayat-order') echo "class=\"active\""?> href="<?php echo base_url('akun/riwayat-order') ?>"><i class="fa fa-history" aria-hidden="true"></i> Riwayat Order</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'desain') echo "class=\"active\""?> href="<?php echo base_url('akun/desain') ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Desain</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'unggah-produk') echo "class=\"active\""?> href="<?php echo base_url('akun/unggah-produk') ?>"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Unggah Produk</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'password') echo "class=\"active\""?> href="<?php echo base_url('akun/password') ?>"><i class="fa fa-key" aria-hidden="true"></i>Ganti Password</a>
        </li>
      </ul>