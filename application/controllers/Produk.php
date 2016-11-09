<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mproduk','mp');
	}
	function katalog(){
		$data['title_web'] = 'Katalog Produk | Furnimade';
		$data['path_content'] = 'default/module/katalog';

		$data['results'] = $this->mod->fetchAllData('kategori');
		$this->load->view('default/index',$data);
	}
	function kategori(){
		$id = $this->uri->segment(3);
		$kategori = $this->mod->getDataWhere('kategori','id_kategori',$id);
		$data['result'] = $kategori;

		$data['title_web'] = 'Lihat Katalog '.$kategori['nama_kategori'].' | Furnimade';
		$data['path_content'] = 'default/module/kategori';

		// Ngeload data
	    $perpage = 16;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url('/produk/kategori/'.$id.'/'); // configurate link pagination
	    $config['total_rows'] = $this->mp->countProdukKategori($id);// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
    	$this->pagination->initialize($config); // intialize var config
    	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    	$data['results'] = $this->mp->fetchProdukKategori($config['per_page'],$page,$this->uri->segment(4),$this->uri->segment(3)); // fetch data using limit and pagination
    	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    	$data['total_rows'] = $this->mp->countProdukKategori($id); // Make a variable (array) link so the view can call the variable
		$this->load->view('default/index',$data);
	}
	function lihat_produk(){
		$data['title_web'] = 'Lihat Produk |  Furnimade';
		$data['path_content'] = 'default/module/lihat_produk';
		$data['bahan'] = $this->mp->fetchAllBahan();
		$data['finishing'] = $this->mp->fetchAllFinishing();
		$id=$this->uri->segment(3);
		$data['result']= $this->mp->getProduk($id);
		if($data['result']==FALSE)

		$this->form_validation->set_rules('nama_produk','Nama Produk','required');
		$this->form_validation->set_rules('deskripsi_produk','Deskripsi','required');
		$this->form_validation->set_rules('kode_produk','Kode Produk','required');
				$this->form_validation->set_rules('harga','Harga','required|numeric');
				$this->form_validation->set_rules('harga_promo','Harga Promo','numeric');

			if(!$this->form_validation->run()){
				$this->load->view('default/index',$data);
			}

			else{
				$config['upload_path'] = './asset/gambar/thumbnail/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '500';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload()){
				$save = $this->mp->editProduk($_POST,$id,FALSE);
							redirect(base_url($this->uri->segment(1).'/module/lihat_produk'));
			}

		else{
			$save = $this->mp->editProduk($_POST,$id,$this->upload->data());
						redirect(base_url($this->uri->segment(1).'/module/lihat_produk'));
		}

			}
	}
	function promo(){
		$id = $this->uri->segment(3);

		$data['title_web'] = 'Lihat Promo Produk | Furnimade';
		$data['path_content'] = 'default/module/promo';

		// Ngeload data
	    $perpage = 16;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url('/produk/promo/'); // configurate link pagination
	    $config['total_rows'] = $this->mp->countProdukPromo();// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
    	$this->pagination->initialize($config); // intialize var config
    	$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    	$data['results'] = $this->mp->fetchProdukPromo($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
    	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    	$data['total_rows'] = $this->mp->countProdukPromo(); // Make a variable (array) link so the view can call the variable
		$this->load->view('default/index',$data);
	}
}
