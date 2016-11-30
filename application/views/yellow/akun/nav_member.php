<ul class="member-sidebar text-left" id="member-sidebar" style="list-style:none">
        <li>
          <a <?php if($this->uri->segment(2) == 'profil') echo "class=\"active\""?> href="<?php echo base_url('akun/profil') ?>"><i class="fa fa-user" aria-hidden="true"></i>Profil</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'password') echo "class=\"active\""?> href="<?php echo base_url('akun/password') ?>"><i class="fa fa-key" aria-hidden="true"></i>Ganti Password</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'riwayat-pesanan' || $this->uri->segment(2) == 'detail-pesanan') echo "class=\"active\""?> href="<?php echo base_url('akun/riwayat-pesanan') ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Riwayat Pesanan</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'konfirmasi-pembayaran') echo "class=\"active\""?> href="<?php echo base_url('akun/konfirmasi-pembayaran')?>"><i class="fa fa-check-square" aria-hidden="true"></i> Konfirmasi Pembayaran</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'barang-diterima') echo "class=\"active\""?> href="<?php echo base_url('akun/barang-diterima')?>"><i class="fa fa-th-large" aria-hidden="true"></i> Barang Diterima</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'pesan' || $this->uri->segment(2) == 'lihat-pesan' || $this->uri->segment(2) == 'kirim-pesan') echo "class=\"active\""?> href="<?php echo base_url('akun/pesan') ?>"><i class="fa fa-comments" aria-hidden="true"></i> Pesan</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'furniture-impian') echo "class=\"active\""?> href="<?php echo base_url('hal/furniture-impian') ?>"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Unggah Desain Produk</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'riwayat-desain-produk' || $this->uri->segment(2) == "lihat-desain") echo "class=\"active\""?> href="<?php echo base_url('akun/riwayat-desain-produk') ?>"><i class="fa fa-th-list" aria-hidden="true"></i>Riwayat Desain Produk</a>
        </li>
        <li>
          <a <?php if($this->uri->segment(2) == 'tender' || $this->uri->segment(2) == 'lihat-tender') echo "class=\"active\""?> href="<?php echo base_url('akun/tender') ?>"><i class="fa fa-briefcase" aria-hidden="true"></i>Tender</a>
        </li>
      </ul>
