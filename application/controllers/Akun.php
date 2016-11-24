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
    $data['results'] = $this->mpesan->fetchRuangpesan($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
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

		$data['results'] = $this->muser->fetchRuangpesan($id);
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
		$this->form_validation->set_rules('tanggal_transfer','tanggal_transfer','required');



		if(!$this->form_validation->run()){
			$this->load->view('yellow/index',$data);
		}
		else{
			$save = $this->mpembayaran->saveKonfirmasi($_POST);
			$this->session->set_flashdata(array('success_form'=>TRUE));
			redirect(base_url($this->uri->segment(1).'/konfirmasi_pembayaran'));
		}
	}
	function riwayat_desain_produk(){
		$data['title_web'] = 'Riwayat Produk| Furnimade';
		$data['path_content'] = 'yellow/akun/riwayat_desain_produk';
		if(!$this->form_validation->run()){
		// Ngeload data
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url($this->uri->segment(1).'/riwayat_desain_produk/'); // configurate link pagination
		$config['total_rows'] = $this->mod->countData('produk');// fetch total record in databae using load
		$config['per_page'] = $perpage; // Total data in one page
		$config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->mp->fetchProduk($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->mod->countData('produk'); // Make a variable (array) link so the view can call the variable
		$this->load->view('yellow/index',$data);
		}
		else{
			$data['results'] = $this->mp->fetchProdukSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('yellow/index',$data);
		}
	}

	function tender(){
		$data['title_web'] = 'Konfirmasi Pembayaran | Furnimade';
		$data['path_content'] = 'yellow/akun/tender';

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
