<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('muser');
		$this->load->model('mproduk','mp');
		$this->load->model('mpembayaran');
		$this->load->model('mpesan');
		if($this->session->userdata('loginMember') != TRUE){
			redirect(base_url('hal/login/'));
			$array = array(
					'error_session' => TRUE
				);
			$this->session->set_flashdata($array);
		}
		$this->load->library('cart');
	}
	function profil(){
		$data['title_web'] = 'Profil Member| Furnimade';
		$data['path_content'] = 'yellow/akun/profil';
		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('no_hp','No Ponsel','required|numeric');

		if(!$this->form_validation->run())
			$this->load->view('yellow/index',$data);
		else{
			$this->muser->saveProfil($_POST,$this->session->userdata('idUser'));
			$this->session->set_flashdata(array('success_form'=>TRUE));
			redirect(base_url('akun/profil'));
		}
	}
	function pesan(){
		$data['title_web'] = 'Pesan Member| Furnimade';
		$data['path_content'] = 'yellow/akun/pesan';
		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));
		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/pesan/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('pesan');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mpesan->fetchRuangpesanPembeli($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('idUser')); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('pesan'); // Make a variable (array) link so the view can call the variable
    $this->load->view('yellow/index',$data);
		}
		else{
			$data['results'] = $this->mpesan->fetchRuangpesanSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('yellow/index',$data);
		}
	}
	function lihat_pesan(){
		$data['title_web'] = 'Lihat Pesan| Furnimade';
		$data['path_content'] = 'yellow/akun/lihat_pesan';
		$id = $this->uri->segment(3);
		$data['result'] = $this->mpesan->getRuangpesan($id);


		$data['results'] = $this->mpesan->fetchAllPesanPembeli($id);
		$this->load->view('yellow/index',$data);
	}
	function produk_tersimpan(){
		$data['title_web'] = 'Desain Produk | Furnimade';
		$data['path_content'] = 'default/akun/produk_tersimpan';

		$this->load->view('default/index',$data);
	}
	function inspirasi_tersimpan(){
		$data['title_web'] = 'Desain Inspirasi Tersimpan | Furnimade';
		$data['path_content'] = 'default/akun/inspirasi_tersimpan';

		$this->load->view('default/index',$data);
	}
	function password(){
		$data['title_web'] = 'Ganti Password| Furnimade';
		$data['path_content'] = 'yellow/akun/password';

		$this->form_validation->set_rules('current','Password Yang Sekarang','required|callback_validPassword');
		$this->form_validation->set_rules('password','Password Baru','required');
		$this->form_validation->set_rules('confirm','Konfirmasi Password','required|matches[password]');
		if(!$this->form_validation->run())
			$this->load->view('yellow/index',$data);
		else{
			$this->muser->gantiPassword($_POST,$this->session->userdata('idUser'));
			$this->session->set_flashdata(array('success_form'=>TRUE));
			$this->load->view('yellow/index',$data);
		}
	}
	function validPassword(){
		$current = $this->input->post('current');
		$data = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));

		if(md5($current) == $data['password']){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('validPassword','Password Yang Sekarang Tidak Sesuai');
			return FALSE;
		}
	}



	public function ruang_pesan(){
		$id = $this->uri->segment(3);
		$data['result']	= $this->muser->getRuangpesan($id);
		if($data['result'] == false)
			show_404();

		$data['results'] = $this->muser->fetchRuangpesanPembeli($id);
		$this->load->view('yellow/index',$data);
	}

	function kirim_pesan(){
		$data['title_web'] = 'Kirim Pesan | Furnimade';
		$data['path_content'] = 'yellow/akun/kirim_pesan';
		$id = $this->uri->segment(3);
    	$data['result'] = $this->mod->getDataWhere('user','id_user',$id);
    	if($data['result'] == FALSE)
    		show_404();

				$this->form_validation->set_rules('username','Penerima pesan','required');
				$this->form_validation->set_rules('pesan','isi Pesan','required');


        if(!$this->form_validation->run()){
          $this->load->view('yellow/index',$data);
        }

        else{
        $config['upload_path'] = './asset/gambar/pesan/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '500';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
						$ruangpesan= $this->muser->ruangPesan($this->session->userdata('idUser'),$id);
						if($ruangpesan == FALSE){
							$this->muser->bikinRuangpesan($this->session->userdata('idUser'),$id);
							$ruangpesan= $this->muser->ruangPesan($this->session->userdata('idUser'),$id);
							$save = $this->mpesan->simpanPesan($_POST,$ruangpesan['id_ruangpesan'],FALSE);
							redirect(base_url($this->uri->segment(1).'/pesan'));
						}
						else{
							$save = $this->mpesan->simpanPesan($_POST,$ruangpesan['id_ruangpesan'],$this->upload->data());
							redirect(base_url($this->uri->segment(1).'/pesan'));
						}
				}

			else{
				$save = $this->mpesan->simpanPesan($_POST,$id,$this->upload->data());
          		redirect(base_url($this->uri->segment(1).'/kirim_pesan'));
					}

      }
		}

	function riwayat_pesanan(){
		$data['title_web'] = 'Riwayat Pesanan | Furnimade';
		$data['path_content'] = 'yellow/akun/riwayat_pesanan';

		if(!$this->form_validation->run()){
		// Ngeload data
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url($this->uri->segment(1).'/riwayat-pesanan/'); // configurate link pagination
		$config['total_rows'] = $this->mod->countWhereData('pesanan','id_user',$this->session->userdata('idUser'));// fetch total record in databae using load
		$config['per_page'] = $perpage; // Total data in one page
		$config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->mp->fetchPesanan($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('idUser')); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->mod->countWhereData('pesanan','id_user',$this->session->userdata('idUser')); // Make a variable (array) link so the view can call the variable
		$this->load->view('yellow/index',$data);
		}
		else{
			$data['results'] = $this->mp->fetchPesananSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('yellow/index',$data);
		}
	}
	function detail_pesanan(){
		$data['title_web'] = 'Detail Pesanan | Furnimade';
		$data['path_content'] = 'yellow/akun/detail_pesanan';

		$id = $this->uri->segment(3);
		$data['result'] = $this->mod->getDataWhere('pesanan','id_pesanan',$id);
		if($data['result'] == FALSE)
			redirect(base_url($this->uri->segment(1).'/riwayat-pesanan'));

		$data['results'] = $this->mp->fetchDetailPesanan($id);
		$this->load->view('yellow/index',$data);
	}
	function konfirmasi_pembayaran(){
		$data['title_web'] = 'Konfirmasi Pembayaran | Furnimade';
		$data['path_content'] = 'yellow/akun/konfirmasi_pembayaran';
		$data['bank'] = $this->mpembayaran->fetchAllPembayaran();
		$this->form_validation->set_rules('id_pembayaran','Bank Tujuan','required');
		$this->form_validation->set_rules('bank','Banj Asal','required');
		$this->form_validation->set_rules('atas_nama','Atas Nama','required');
		$this->form_validation->set_rules('no_rekening','Nomor Rekening','required');
		$this->form_validation->set_rules('nominal','Nominal','required|numeric');
		$this->form_validation->set_rules('tanggal_transfer','tanggal_transfer','required');



		if(!$this->form_validation->run()){
			$this->load->view('yellow/index',$data);
		}
		else{
			$save = $this->mpembayaran->saveKonfirmasi($_POST);
			$this->session->set_flashdata(array('success_form'=>TRUE));
			redirect(base_url($this->uri->segment(1).'/konfirmasi-pembayaran'));
		}
	}
	function riwayat_desain_produk(){
		$data['title_web'] = 'Riwayat Desain Produk| Furnimade';
		$data['path_content'] = 'yellow/akun/riwayat_desain_produk';
		if(!$this->form_validation->run()){
		// Ngeload data
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url($this->uri->segment(1).'/riwayat-desain-produk/'); // configurate link pagination
		$config['total_rows'] = $this->mod->countWhereData('desain_produk','id_pembeli',$this->session->userdata('idUser'));// fetch total record in databae using load
		$config['per_page'] = $perpage; // Total data in one page
		$config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->mp->fetchDesainProduk($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('idUser')); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->mod->countWhereData('desain_produk','id_pembeli',$this->session->userdata('idUser')); // Make a variable (array) link so the view can call the variable
		$this->load->view('yellow/index',$data);
		}
		else{
			$data['results'] = $this->mp->fetchDesainProdukSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('yellow/index',$data);
		}
	}
	function lihat_desain(){
		$data['title_web'] = 'Lihat Desain Produk| Furnimade';
		$data['path_content'] = 'yellow/akun/lihat_desain_produk';

		$id = $this->uri->segment(3);
		$data['result'] = $this->mod->getDataWhere('desain_produk','id_desain_produk',$id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/riwayat-desain-produk'));

		$data['results'] = $this->mod->fetchDataWhere('gambar_desain','id_desain_produk',$id);
		$this->load->view('yellow/index',$data);
	}
	function hapus_desain(){
		$this->load->helper("file");
		$id = $this->uri->segment(3);
		$result = $this->mod->getDataWhere('desain_produk','id_desain_produk',$id);
		$this->db->where('id_desain_produk',$id);
		$this->db->delete('desain_produk');

		$results = $this->mod->fetchDataWhere('gambar_desain','id_desain_produk',$id);
		foreach ($results as $rows) {
			unlink($rows->url_desain_produk);
		}

		$this->db->where('id_desain_produk',$id);
		$this->db->delete('gambar_desain');		

		if($result['ditenderkan'] == 1){
			$this->db->where('id_desain_produk',$id);
			$this->db->delete('tender_desain');					
		}
		redirect(base_url($this->uri->segment(1).'/riwayat-desain-produk'));
	}
	function tender(){
		$data['title_web'] = 'Tender | Furnimade';
		$data['path_content'] = 'yellow/akun/tender';

		if(!$this->form_validation->run()){
		// Ngeload data
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url($this->uri->segment(1).'/tender/'); // configurate link pagination
		$config['total_rows'] = $this->mp->countTender($this->session->userdata('idUser'));// fetch total record in databae using load
		$config['per_page'] = $perpage; // Total data in one page
		$config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->mp->fetchTender($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('idUser')); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->mp->countTender($this->session->userdata('idUser')); // Make a variable (array) link so the view can call the variable
		$this->load->view('yellow/index',$data);
		}
		else{
			$data['results'] = $this->mp->fetchTenderSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('yellow/index',$data);
		}
	}

	function lihat_tender(){
		$data['title_web'] = 'Lihat Tender | Furnimade';
		$data['path_content'] = 'yellow/akun/lihat_tender';

		$id = $this->uri->segment(3);
		$data['result'] = $this->mp->getTender($id);
		if($data['result'] == FALSE)
			redirect(base_url($this->uri->segment(1).'/tender'));

		if(!$this->form_validation->run()){
		// Ngeload data
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url($this->uri->segment(1).'/lihat-tender/'.$id.'/'); // configurate link pagination
		$config['total_rows'] = $this->mp->countTenderPenjual($id);// fetch total record in databae using load
		$config['per_page'] = $perpage; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->mp->fetchTenderPenjual($config['per_page'],$page,$this->uri->segment(4),$id); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->mp->countTenderPenjual($id); // Make a variable (array) link so the view can call the variable
		$this->load->view('yellow/index',$data);
		}
		else{
			$data['results'] = $this->mp->fetchTenderPenjualSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('yellow/index',$data);
		}
	}
	function tutup_tender(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mp->getTender($id);
		if($data['result'] == FALSE)
			redirect(base_url($this->uri->segment(1).'/tender'));

		$this->db->where('id_tender',$id);
		$this->db->update('tender',array('status_tender'=>1));
		redirect(base_url($this->uri->segment(1).'/tender'));
	}

	function keranjang(){
		$data['title_web'] = 'Keranjang Belanjaan | Furnimade';
		$data['path_content'] = 'yellow/akun/keranjang';

		$this->form_validation->set_rules('hidden','Hidden','required');
		if(!$this->form_validation->run())
			$this->load->view('yellow/index',$data);
		else{
			$this->mp->updateCart($_POST);
			$this->load->view('yellow/index',$data);
		}
	}
	function tambahkan_keranjang(){
		$qty = $this->input->post('qty');
		$id = $this->input->post('id_produk');
		
		$result = $this->mod->getDataWhere('produk','id_produk',$id);

		$flag = 0;
		foreach ($this->cart->contents() as $items) {
			if($items['id'] == $id){
				$flag = 1;
				$rowid = $items['rowid'];
				$qty_before = $items['qty'];
			}
		}

		if($flag==0){
			$data = array(array(
	        'id'      => $id,
	        'qty'     => $qty,
	        'name'	  => $result['nama_produk'],
	        'price'   => $result['harga_produk'],
	        'image'   => $result['gambar_produk']
			));
			$this->cart->insert($data);
		}
		if($flag == 1){
			$data = array(
			    'rowid' => $rowid,
			    'qty'   => $qty_before+$qty
			);

			$this->cart->update($data);
		}

		redirect(base_url($this->uri->segment(1).'/'.'keranjang'));
	}
	function hapus_item(){
		$rowid = $this->uri->segment(3);
		$data = array(
			    'rowid' => $rowid,
			    'qty'   => 0
			);
		$this->cart->update($data);
		redirect(base_url($this->uri->segment(1).'/'.'keranjang'));
	}
	function kosongkan_keranjang(){
		$this->cart->destroy();
		redirect(base_url($this->uri->segment(1).'/'.'keranjang'));
	}
	function checkout(){
		$data['title_web'] = 'Pembayaran & Checkout | Furnimade';
		$data['path_content'] = 'yellow/akun/checkout';
		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));

		$data['bank'] = $this->mpembayaran->fetchAllPembayaran();
		$data['total_bank'] = $this->mod->countData('pembayaran');
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('no_hp','Nomor Telepon','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('id_pembayaran','Metode Pembayaran','required');

		if(!$this->form_validation->run())
			$this->load->view('yellow/index',$data);
		else{
			$this->mp->pesanan($_POST);
			$this->session->set_flashdata(array('success_form'=>TRUE));
			redirect(base_url($this->uri->segment(1).'/sukses-order/'));
		}
	}
	function sukses_order(){
		$data['title_web'] = 'Sukses Order | Furnimade';
		$data['path_content'] = 'yellow/akun/sukses_order';

		$this->load->view('yellow/index',$data);
	}
	function logout(){
		$array = array(
					'loginMember' => FALSE,
					'idUser' => NULL,
					'username' => NULL,
					'hakAkses' => NULL
				);
			$this->session->set_userdata($array);
			$array = array(
					'error_session' => TRUE
				);
			$this->session->set_flashdata($array);
		redirect(base_url('hal/login'));
	}
}
