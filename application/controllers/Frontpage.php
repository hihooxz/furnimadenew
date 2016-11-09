<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mproduk','mp');
	}
	public function index(){
		$data['title_web'] = 'Frontpage | Furnimade';
		$data['path_content'] = 'default/module/frontpage';

		$data['results'] = $this->mp->fetchProduk(6,0,FALSE); // fetch data using limit and pagination
		$data['results2'] = $this->mp->fetchKategori(6,0,FALSE); // fetch data using limit and pagination
		$this->load->view('default/index',$data);
	}
	
}
