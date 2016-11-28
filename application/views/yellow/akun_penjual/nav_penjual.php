<ul class="member-sidebar text-left" id="member-sidebar" style="list-style:none">
        <li>
          <a <?php if($this->uri->segment(2) == 'profil') echo "class=\"active\""?> href="<?php echo base_url('akun-penjual/profil') ?>"><i class="fa fa-user" aria-hidden="true"></i>Profil</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'password') echo "class=\"active\""?> href="<?php echo base_url('akun-penjual/password') ?>"><i class="fa fa-key" aria-hidden="true"></i>Ganti Password</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'riwayat-pesanan') echo "class=\"active\""?> href="<?php echo base_url('akun-penjual/riwayat-pesanan') ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Riwayat Pesanan</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'konfirmasi-pembayaran') echo "class=\"active\""?> href="<?php echo base_url('akun-penjual/konfirmasi-pembayaran')?>"><i class="fa fa-check-square" aria-hidden="true"></i> Konfirmasi Pembayaran</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'barang-diterima') echo "class=\"active\""?> href="<?php echo base_url('akun-penjual/barang-diterima')?>"><i class="fa fa-th-large" aria-hidden="true"></i> Barang Diterima</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'pesan' || $this->uri->segment(2) == 'lihat-pesan' || $this->uri->segment(2) == 'kirim-pesan') echo "class=\"active\""?> href="<?php echo base_url('akun-penjual/pesan') ?>"><i class="fa fa-comments" aria-hidden="true"></i> Pesan</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'konfirmasi-pengerjaan') echo "class=\"active\""?> href="<?php echo base_url('akun-penjual/konfirmasi-pengerjaan')?>"><i class="fa fa-exchange" aria-hidden="true"></i> Konfirmasi Pengerjaan</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'unggah-produk') echo "class=\"active\""?> href="<?php echo base_url('akun-penjual/unggah-produk') ?>"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Unggah Produk</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'riwayat-produk') echo "class=\"active\""?> href="<?php echo base_url('akun-penjual/riwayat-produk') ?>"><i class="fa fa-th-list" aria-hidden="true"></i>Riwayat Produk</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'tender') echo "class=\"active\""?> href="<?php echo base_url('akun-penjual/tender') ?>"><i class="fa fa-briefcase" aria-hidden="true"></i>Tender</a>
        </li>
      </ul>
