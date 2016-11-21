<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hal extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('muser');
		$this->load->model('mproduk');
		$this->load->model('mblog');
	}
	function login(){
		$data['title_web'] = 'Masuk ke Halaman Member | Furnimade';
		$data['path_content'] = 'yellow/module/login';

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|callback_validLoginMember');

		if(!$this->form_validation->run())
			$this->load->view('yellow/index',$data);
		else{
			if($this->session->userdata('hakAkses') == 3)
				redirect(base_url('akun/profil'));
			else if($this->session->userdata('hakAkses') == 2)
				redirect(base_url('akun-penjual/profil'));
		}
	}
	function validLoginMember(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->muser->validLogin($username,$password);
		if($result != FALSE){
			$array = array(
					'loginMember' => TRUE,
					'idUser' => $result['id_user'],
					'username' => $result['username'],
					'hakAkses' => $result['hak_akses']
				);
			$this->session->set_userdata($array);
			return TRUE;
		}
		else{
			$this->form_validation->set_message('validLoginMember','Username atau Password Tidak Ditemukan');
			return FALSE;
		}
	}
	function cari_inspirasi(){
		$data['title_web'] = 'Cari Inspirasi | Furnimade';
		$data['path_content'] = 'default/module/cari_inspirasi';

		$this->load->view('default/index',$data);
	}
	function bulk_furniture(){
		$data['title_web'] = 'Bulk Furniture | Furnimade';
		$data['path_content'] = 'default/module/bulk_furniture';

		$this->load->view('default/index',$data);
	}
	function buat_furniture_impian(){
		$data['title_web'] = 'Buat Furniture Impian | Furnimade';
		$data['path_content'] = 'default/module/buat_furniture_impian';

		$this->load->view('default/index',$data);
	}
	function blog(){
		$data['title_web'] = 'Lihat Blog | Furnimade';
		$data['path_content'] = 'yellow/module/blog';

		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url('hal/blog/'); // configurate link pagination
		$config['total_rows'] = $this->mod->countData('blog');// fetch total record in databae using load
		$config['per_page'] = $perpage; // Total data in one page
		$config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->mblog->fetchLihatBlogMember($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->mod->countData('blog'); // Make a variable (array) link so the view can call the variable
		$this->load->view('yellow/index',$data);
	}
	function baca_blog(){
		$data['title_web'] = 'Baca Blog | Furnimade';
		$data['path_content'] = 'yellow/module/baca_blog';
		$id = $this->uri->segment(3);
		$data['result']=$this->mblog->getLihatBlog($id);
		if($data['result'] == FALSE)
			redirect(base_url('hal/blog'));

		$array = array(
				'dilihat' => $data['result']['dilihat']+1
			);
		$this->db->where('id_blog',$id);
		$this->db->update('blog',$array);

		$this->load->view('yellow/index',$data);
	}


	function furniture_impian(){
		$data['title_web'] = 'Buat Furniture Impian | Furnimade';
		$data['path_content'] = 'yellow/module/furniture_impian';
		$data['profile'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('no_hp','No Ponsel','required|numeric');
		$this->form_validation->set_rules('lokasi','Lokasi','required');
		$this->form_validation->set_rules('deskripsi','Permintaan Tambahan','required');

		if(!$this->form_validation->run())
			$this->load->view('yellow/index',$data);
		else{
			$config['upload_path'] = './asset/gambar/produk/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				$config['file_name'] = 'furniturimpian_'.$this->session->userdata('idUser').'_'.date('YmdHis');

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('yellow/index',$data);
				}

			else{
				$save = $this->mproduk->saveFurnitureImpian($_POST,$this->upload->data());
				$this->session->set_flashdata(array('success'=>TRUE));
				$this->load->view('yellow/index',$data);
			}
		}
	}
	function furniture_impian_desain(){
		$data['title_web'] = 'Buat Furniture Impian dengan Desain | Furnimade';
		$data['path_content'] = 'default/module/furniture_impian_desain';
		$data['profile'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));
		$data['bahan'] = $this->mproduk->fetchAllBahan();
		$data['finishing'] = $this->mproduk->fetchAllFinishing();
		$this->form_validation->set_rules('bahan','bahan','required');
		$this->form_validation->set_rules('finishing','finishing','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('deskripsi','Permintaan Tambahan','required');
		if(!$this->form_validation->run()){
			$this->load->view('default/index',$data);
		}
		else {
			/*$config = array();
	    $config['upload_path'] = './images/gambar/produk';
	    $config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
    	$config['overwrite']     = FALSE;*/
			$this->load->library('upload');
	    $files = $_FILES;
	    $cpt = 2;
			$flag = 0;
	    for($i=0; $i<$cpt; $i++){
	        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	        $_FILES['userfile']['size']= $files['userfile']['size'][$i];
	        $this->upload->initialize($this->set_upload_options($i));
	        $this->upload->do_upload();
	        $img_file = $this->upload->data();
	        $this->session->set_userdata(array('path_file'.$i =>'asset/gambar/produk/'.$img_file['file_name']));
	    }
			if (!$this->upload->do_upload()){
				$data['error'] = $this->upload->display_errors();
				$this->load->view('default/index',$data);
			}
			else{
				$save = $this->mproduk->saveFurnitureImpian2($_POST,$this->upload->data(),$cpt);
				$this->session->set_flashdata(array('success'=>TRUE));
				$this->load->view('default/index',$data);
			}
		}
	}
	private function set_upload_options($i){
    	//upload an image options
    	$config = array();
		$config['file_name'] = $this->session->userdata('username').'_gambarbuat_'.$i.'_'.date('YmdHis');
		$config['upload_path'] = './asset/gambar/produk';
	    $config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
	    $config['overwrite']     = TRUE;

    return $config;
}
	/*function data_bahan(){
		$id_bahan = $this->input->post('id_bahan');
		$finishing = $this->mod->fetchDataWhere('finishing','id_bahan',$id_bahan);

		$message = "";
		if($finishing != FALSE){
			foreach ($finishing as $rows) {
				$message = "
					<div class=\"col-md-2 col-xs-12 col-sm-6\">
						<img src=\"".base_url($rows->gambar_finishing)."\" class=\"img-responsive\">
					</div>
				";
			}
		}
		else{
			$data['finishing'] = "error";
		}
		$data['finishing'] = $message;
		echo json_encode($data);
	}*/
	
	function login_supplier(){
		$data['title_web'] = 'Masuk ke Halaman Supplier | Furnimade';
		$data['path_content'] = 'default/module/login_supplier';

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|callback_validLoginSupplier');

		if(!$this->form_validation->run())
			$this->load->view('default/index',$data);
		else{
			redirect(base_url('module-supplier/profil'));
		}
	}
	function validLoginSupplier(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->muser->validLoginSupplier($username,$password);
		if($result != FALSE){
			$array = array(
					'loginSupplier' => TRUE,
					'idUser' => $result['id_user'],
					'username' => $result['username'],
					'hakAkses' => $result['hak_akses']
				);
			$this->session->set_userdata($array);
			return TRUE;
		}
		else{
			$this->form_validation->set_message('validLoginSupplier','Username atau Password Tidak Ditemukan');
			return FALSE;
		}
	}
	function daftar(){
		$data['title_web'] = 'Daftar Halaman Member | Furnimade';
		$data['path_content'] = 'yellow/module/daftar';

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirm','Confirm Password','required|matches[password]');
		$this->form_validation->set_rules('email','Email','required|valid_email');


		if(!$this->form_validation->run())
			$this->load->view('yellow/index',$data);
		else{
			$data['save'] = $this->muser->daftarCustomer($_POST);
			$array = array(
					'post' => TRUE
				);
			$this->session->set_flashdata($array);
			$this->load->view('yellow/index',$data);
		}
	}
	function daftar_penjual(){
		$data['title_web'] = 'Daftar Penjual | Furnimade';
		$data['path_content'] = 'yellow/module/daftar_penjual';

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirm','Confirm Password','required|matches[password]');
		$this->form_validation->set_rules('email','Email','required|valid_email');


		if(!$this->form_validation->run())
			$this->load->view('yellow/index',$data);
		else{
			$data['save'] = $this->muser->daftarSupplier($_POST);
			$array = array(
					'post' => TRUE
				);
			$this->session->set_flashdata($array);
			$this->load->view('yellow/index',$data);
		}
	}
	function keranjang(){
		$data['title_web'] = 'Keranjang Belanjaan | Furnimade';
		$data['path_content'] = 'yellow/module/keranjang';

		$this->load->view('yellow/index',$data);
	}
	function checkout(){
		$data['title_web'] = 'Checkout | Furnimade';
		$data['path_content'] = 'yellow/module/checkout';

		$this->load->view('yellow/index',$data);
	}
	function tentang_kami(){
		$data['title_web'] = 'Tentang Kami | Furnimade';
		$data['path_content'] = 'yellow/module/tentang_kami';

		$this->load->view('yellow/index',$data);
	}
	function faq(){
		$data['title_web'] = 'FAQ | Furnimade';
		$data['path_content'] = 'yellow/module/faq';

		$this->load->view('yellow/index',$data);
	}
	function syarat_ketentuan(){
		$data['title_web'] = 'Syarat & Ketentuan | Furnimade';
		$data['path_content'] = 'yellow/module/syarat_ketentuan';

    	
    	$this->load->view('yellow/index',$data);	
	}
}
