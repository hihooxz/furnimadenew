<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('muser');
		$this->load->model('mproduk','mp');
		if($this->session->userdata('loginMember') != TRUE){
			redirect(base_url('hal/login/'));
			$array = array(
					'error_session' => TRUE
				);
			$this->session->set_flashdata($array);
		}
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
		$data['title_web'] = 'Profil Member| Furnimade';
		$data['path_content'] = 'yellow/akun/pesan';

		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));


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

	function riwayat_pesanan(){
		$data['title_web'] = 'Riwayat Pesanan | Furnimade';
		$data['path_content'] = 'default/akun/riwayat_pesanan';

		$this->load->view('default/index',$data);
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
