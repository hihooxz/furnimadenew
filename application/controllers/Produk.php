<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mproduk','mp');
	}
	function katalog(){
		$data['title_web'] = 'Katalog Produk | Furnimade';
		$data['path_content'] = 'yellow/module/katalog';

		$data['results'] = $this->mod->fetchDataOrderBy('kategori','nama_kategori','ASC');
		$data['total_rows'] = $this->mod->countData('kategori');
		$this->load->view('yellow/index',$data);
	}
	function kategori(){
		$id = $this->uri->segment(3);
		$kategori = $this->mod->getDataWhere('kategori','id_kategori',$id);
		$data['result'] = $kategori;
		if($kategori == FALSE)
			redirect(base_url('produk/katalog'));

		$data['title_web'] = 'Lihat Katalog '.$kategori['nama_kategori'].' | Furnimade';
		$data['path_content'] = 'yellow/module/kategori';

		// Ngeload data
	    $perpage = 16;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url('produk/kategori/'.$id.'/'.$this->mod->toAscii($kategori['nama_kategori'],'','-')); // configurate link pagination
	    $config['total_rows'] = $this->mod->countWhereData('produk','id_kategori',$id);// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 5; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
    	$this->pagination->initialize($config); // intialize var config
    	$page = ($this->uri->segment(5))? $this->uri->segment(5) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    	$data['results'] = $this->mp->fetchProdukKategori($config['per_page'],$page,$this->uri->segment(5),$this->uri->segment(3)); // fetch data using limit and pagination
    	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    	$data['total_rows'] = $this->mod->countWhereData('produk','id_kategori',$id); // Make a variable (array) link so the view can call the variable
		$this->load->view('yellow/index',$data);
	}
	function detail_produk(){
		$data['title_web'] = 'Detail Produk |  Furnimade';
		$data['path_content'] = 'yellow/module/detail_produk';
		$id=$this->uri->segment(3);
		$data['result']= $this->mp->getProduk($id);
		if($data['result']==FALSE)
			redirect(base_url('hal/produk'));
		
		$this->load->view('yellow/index',$data);
		
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
