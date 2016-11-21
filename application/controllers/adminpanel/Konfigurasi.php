<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class konfigurasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mkonfigurasi','mko');
    	$this->load->library('pagination');
	}


	function edit_konfigurasi(){
			$data['title_web'] = 'Edit konfigurasi | Adminpanel Furnimade';
			$data['path_content'] = 'admin/konfigurasi/edit_konfigurasi';
			$data['result']=$this->mod->getDataWhere('konfigurasi','id_konfigurasi',1);
			if($data['result']==FALSE)
				redirect(base_url('adminpanel/konfigurasi/manage_konfigurasi'));

				$this->form_validation->set_rules('judul_website','Judul','required');
				$this->form_validation->set_rules('faq','faq','required');
				$this->form_validation->set_rules('alamat_kantor','Alamat','required');
				$this->form_validation->set_rules('syarat_ketentuan','Syarat','required');
				$this->form_validation->set_rules('no_telp','Telepon','required|numeric');
				$this->form_validation->set_rules('link_facebook','Facebook','required');
				$this->form_validation->set_rules('link_twitter','Twitter','required');
				$this->form_validation->set_rules('link_instagram','Instagram','required');
				$this->form_validation->set_rules('link_gplus','Gplus','required');
				$this->form_validation->set_rules('link_path','Path','required');


        if(!$this->form_validation->run()){
          $this->load->view('admin/index',$data);
        }
        else{
          $save = $this->mko->editkonfigurasi($_POST,1);
          redirect(base_url($this->uri->segment(1).'/konfigurasi/edit_konfigurasi'));
        }
	}


}

?>
