<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('muser');
		$this->load->model('mproduk','mp');
		if($this->session->userdata('loginMember') != TRUE){
			redirect(base_url('halaman/login/'));
			$array = array(
					'error_session' => TRUE
				);
			$this->session->set_flashdata($array);
		}
	}
	function profil(){
		$data['title_web'] = 'Profil Member| Furnimade';
		$data['path_content'] = 'default/akun/profil';

		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('no_hp','No Ponsel','required|numeric');

		if(!$this->form_validation->run())
			$this->load->view('default/index',$data);
		else{
			$this->muser->saveProfil($_POST,$this->session->userdata('idUser'));
			redirect(base_url('akun/profil'));
		}
	}
	/*function riwayat_order(){
		$data['title_web'] = 'Riwayat Order| Furnimade';
		$data['path_content'] = 'default/akun/riwayat_order';


		$this->load->view('default/index',$data);
	}
	*/
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
		$data['path_content'] = 'default/akun-supplier/password';

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

	function riwayat_order(){
		$data['title_web'] = 'Progress Pesanan | Furnimade';
		$data['path_content'] = 'default/akun/riwayat_order';


		if(!$this->form_validation->run()){
		// Ngeload data
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] =base_url('akun/riwayat_order'); // configurate link pagination
		$config['total_rows'] = $this->mod->countData('progress');// fetch total record in databae using load
		$config['per_page'] = $perpage; // Total data in one page
		$config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->mp->fetchRiwayatPesanan($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('idUser')); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->mod->countData('progress'); // Make a variable (array) link so the view can call the variable
		$this->load->view('default/index',$data);
		}
		else{
			$data['results'] = $this->mp->fetchCustomSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('default/index',$data);
		}
	}

	function lihat_progress(){
		$data['title_web'] = 'Lihat Progress | Furnimade';
		$data['path_content'] = 'default/akun/lihat_progress';
		$id=$this->uri->segment(3);
		$data['result']=$this->mp->getBuatProduk($id);
		if($data['result']==FALSE)
			redirect(base_url('akun/riwayat-order'));

		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url('akun/lihat-progress/'.$id.'/'); // configurate link pagination
		$config['total_rows'] = $this->mod->countData('progress');// fetch total record in databae using load
		$config['per_page'] = $perpage; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->mp->fetchLihatProgress($config['per_page'],$page,$this->uri->segment(4),$id); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->mod->countData('progress'); // Make a variable (array) link so the view can call the variable
		$this->load->view('default/index',$data);

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
}
