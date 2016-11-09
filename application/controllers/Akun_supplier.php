<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_supplier extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('muser');
		$this->load->model('mproduk','mp');
		if($this->session->userdata('loginSupplier') != TRUE){
			redirect(base_url('halaman/login/'));
			$array = array(
					'error_session' => TRUE
				);
			$this->session->set_flashdata($array);
		}
	}
	function profil(){
		$data['title_web'] = 'Profil Supplier| Furnimade';
		$data['path_content'] = 'default/akun_supplier/profil';

		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('no_hp','No Ponsel','required|numeric');

		if(!$this->form_validation->run())
			$this->load->view('default/index',$data);
		else{
			$this->muser->saveProfil($_POST,$this->session->userdata('idUser'));
			redirect(base_url('akun-supplier/profil'));
		}
	}
	function daftar_pesanan(){
		$data['title_web'] = 'Daftar Pesanan | Furnimade';
		$data['path_content'] = 'default/akun_supplier/daftar_pesanan';
		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url('akun-supplier/produk/'); // configurate link pagination
    $config['total_rows'] = $this->mp->countProdukUser($this->session->userdata('idUser'));// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mp->fetchDaftarPesanan($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $this->load->view('default/index',$data);
		}
		else{
			$data['results'] = $this->mproduk->fetchCustomSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('default/index',$data);
		}

	}
	function lihat_detail_produk(){
		$data['title_web'] = 'Lihat Produk |  Furnimade';
		$data['path_content'] = 'default/akun_supplier/lihat_detail_produk';
		$data['bahan'] = $this->mp->fetchAllBahan();
		$data['finishing'] = $this->mp->fetchAllFinishing();
		$id=$this->uri->segment(3);
		$data['result']= $this->mp->getProdukBuatUser($id);
		if($data['result'] == false)
			redirect(base_url('akun-supplier/daftar-pesanan'));

		$this->load->view('default/index',$data);
	}
	function riwayat_pesanan(){
		$data['title_web'] = 'Riwayat Pesanan | Furnimade';
		$data['path_content'] = 'default/akun_supplier/riwayat_pesanan';

		$this->load->view('default/index',$data);
	}
	function produk(){
    $data['title_web'] = 'Lihat Produk | Furnimade';
    $data['path_content'] = 'default/akun_supplier/produk';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url('akun-supplier/produk/'); // configurate link pagination
    $config['total_rows'] = $this->mproduk->countProdukUser($this->session->userdata('idUser'));// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mproduk->fetchProdukUser($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('idUser')); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $this->load->view('default/index',$data);
		}
		else{
			$data['results'] = $this->mproduk->fetchProdukSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('default/index',$data);
		}
  }
	function password(){
		$data['title_web'] = 'Ganti Password| Furnimade';
		$data['path_content'] = 'default/akun_supplier/password';

		$this->form_validation->set_rules('current','Password Yang Sekarang','required|callback_validPassword');
		$this->form_validation->set_rules('password','Password Baru','required');
		$this->form_validation->set_rules('confirm','Konfirmasi Password','required|matches[password]');
		if(!$this->form_validation->run())
			$this->load->view('default/index',$data);
		else{
			$this->muser->gantiPassword($_POST,$this->session->userdata('idUser'));
			$array = array('result'=>TRUE);
			$this->session->set_flashdata($array);
			$this->load->view('default/index',$data);
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
	function tambah_produk(){
		$data['title_web'] = 'Tambah Produk | Furnimade';
		$data['path_content'] = 'default/akun_supplier/tambah_produk';

		$this->form_validation->set_rules('nama_produk','Nama Produk','required');
		$this->form_validation->set_rules('deskripsi_produk','Deskripsi Produk','required');
		$this->form_validation->set_rules('harga','Harga Produk','required|numeric');
		$this->form_validation->set_rules('harga_promo','Harga Promo Produk','numeric');

		if(!$this->form_validation->run())
			$this->load->view('default/index',$data);
		else{
				$config['upload_path'] = './asset/gambar/produk/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000';
				$config['file_name'] = $this->session->userdata('username').'_'.date('YmdHis');

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('default/index',$data);
				}

			else{
				$this->mproduk->tambahProduk($_POST,$this->upload->data());
				$array = array('result'=>TRUE);
				$this->session->set_flashdata($array);
				$this->load->view('default/index',$data);
			}
		}
	}
	function beri_harga(){
		$data['title_web'] = 'Beri Harga | Furnimade';
		$data['path_content'] = 'default/akun_supplier/beri_harga';
		$id=$this->uri->segment(3);
		$data['result']= $this->mp->getProdukBuatUser($id);
		$data['results'] = $this->mp->fetchGambarProdukBuatUser($id);
		if($data['result'] == false)
			redirect(base_url('akun-supplier/daftar-pesanan'));

		$this->form_validation->set_rules('harga','Harga ','required|numeric');
		$this->form_validation->set_rules('waktupengerjaan','Waktu Pengerjaan','required|numeric');

		if(!$this->form_validation->run())
			$this->load->view('default/index',$data);
		else{
				$array = array('result'=>TRUE);
				$this->session->set_flashdata($array);
				$id=$this->uri->segment(3);
				$data['result']= $this->mp->getProdukBuatUser($id);
				$data['save'] = $this->mp->saveBeriHargaBuat($id,$this->session->userdata('idUser'),$_POST);
				redirect(base_url('akun-supplier/daftar_pesanan'));
			}
		}

	function logout(){
		$array = array(
					'loginMember' => FALSE,
					'idUser' => NULL,
					'username' => NULL
				);
			$this->session->set_userdata($array);
			$array = array(
					'error_session' => TRUE
				);
			$this->session->set_flashdata($array);
		redirect(base_url('halaman/login'));
	}

	function progress_pesanan(){
		$data['title_web'] = 'Progress Pesanan | Furnimade';
		$data['path_content'] = 'default/akun_supplier/progress_pesanan';

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url('akun-supplier/progress_pesanan'); // configurate link pagination
    $config['total_rows'] = $this->mp->countProgressPesanan($this->session->userdata('idUser'));// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mp->fetchProgressPesanan($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('idUser')); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $this->load->view('default/index',$data);
		}
		else{
			$data['results'] = $this->mproduk->fetchCustomSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('default/index',$data);
		}

	}

	function tambah_progress(){
		$data['title_web'] = 'Tambah progress | Furnimade';
		$data['path_content'] = 'default/akun_supplier/tambah_progress';
		$id=$this->uri->segment(3);
		$data['result']= $this->mp->getTambahProgress($id);
		$data['results'] = $this->mp->fetchGambarProdukBuatUser($id);
		$this->form_validation->set_rules('progress','Progress Pesanan','required');
		if(!$this->form_validation->run())
			$this->load->view('default/index',$data);
		else{
				$config['upload_path'] = './asset/gambar/progress/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '3000';
				$config['file_name'] = $this->session->userdata('username').'_'.date('YmdHis');
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('default/index',$data);
				}
			else{
				$array = array('result'=>TRUE);
				$this->session->set_flashdata($array);
				$id=$this->uri->segment(3);
				$data['result']= $this->mp->getTambahProgress($id);
				$data['save'] = $this->mp->tambahProgress($id,$_POST,$this->upload->data());
				redirect(base_url('akun-supplier/daftar_pesanan'));
			}
		}
	}

}
