<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mproduk','mp');
    $this->load->library('pagination');
	}

  function lihat_produk(){
    $data['title_web'] = 'View All Product | Adminpanel Furnimade';
    $data['path_content'] = 'admin/produk/lihat_produk';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/produk/lihat_produk/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('produk');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mp->fetchProduk($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('produk'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mp->fetchProdukSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }

	// 	function tambah_produk(){
	// 		$data['title_web'] = 'Tambah Produk | Adminpanel Furnimade';
	// 		$data['path_content'] = 'admin/produk/tambah_produk';
	// 		$data['kategori'] = $this->mod->fetchAllData('kategori');
	//
	// 		$this->form_validation->set_rules('user','penjual','required');
	// 		$this->form_validation->set_rules('kategori','kategori','required');
	// 		$this->form_validation->set_rules('nama_produk','Nama Produk','required');
	// 		$this->form_validation->set_rules('deskripsi_produk','Deskripsi','required');
	// 		$this->form_validation->set_rules('kode_produk','Kode Produk','required');
  //   	$this->form_validation->set_rules('harga','Harga','required|numeric');
	//
	// 		if(!$this->form_validation->run()){
	// 			$data['error'] = false;
	// 			$this->load->view('admin/index',$data);
	// 		}
	// 		else{
	// 			$config['upload_path'] = './asset/gambar/thumbnail/';
	// 			$config['allowed_types'] = 'gif|jpg|png';
	// 			$config['max_size']	= '500';
	// 			$config['max_width']  = '1024';
	// 			$config['max_height']  = '768';
	//
	// 			$this->load->library('upload', $config);
	// 			if ( ! $this->upload->do_upload()){
	// 				$data['error'] = $this->upload->display_errors();
	// 				$this->load->view('admin/index',$data);
	// 			}
	//
	// 		else{
	// 			$save = $this->mp->saveProduk($_POST,$this->upload->data());
	// 			redirect(base_url($this->uri->segment(1).'/produk/lihat_produk'));
	// 		}
	// 	}
	// }

		function ubah_produk(){
			$data['title_web'] = 'Ubah Produk | Adminpanel Furnimade';
			$data['path_content'] = 'admin/produk/ubah_produk';
			$id=$this->uri->segment(4);
			$data['result']= $this->mp->getProduk($id);
			if($data['result']==FALSE)
				redirect(base_url('adminpanel/produk/lihat_produk'));

				$this->form_validation->set_rules('user','penjual','required');
				$this->form_validation->set_rules('kategori','kategori','required');
				$this->form_validation->set_rules('nama_produk','Nama Produk','required');
				$this->form_validation->set_rules('deskripsi_produk','Deskripsi','required');
				$this->form_validation->set_rules('kode_produk','Kode Produk','required');
	    	$this->form_validation->set_rules('harga','Harga','required|numeric');


        if(!$this->form_validation->run()){
          $this->load->view('admin/index',$data);
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
          			redirect(base_url($this->uri->segment(1).'/produk/lihat_produk'));
				}

			else{
				$save = $this->mp->editProduk($_POST,$id,$this->upload->data());
          		redirect(base_url($this->uri->segment(1).'/produk/lihat_produk'));
			}

        }
	}

    function hapus_produk(){
			$id = $this->uri->segment(4);
			$this->db->where('id_produk',$id);
			$this->db->delete('produk');
			redirect(base_url($this->uri->segment(1).'/produk/lihat_produk'));
		}

		function lihat_kategori(){
			$data['title_web'] = 'View All Kategori | Adminpanel Furnimade';
			$data['path_content'] = 'admin/produk/lihat_kategori';

			$this->form_validation->set_rules('search','Search','required');

			if(!$this->form_validation->run()){
			// Ngeload data
			$perpage = 10;
			$this->load->library('pagination'); // load libraray pagination
			$config['base_url'] = base_url($this->uri->segment(1).'/produk/lihat_kategori/'); // configurate link pagination
			$config['total_rows'] = $this->mod->countData('kategori');// fetch total record in databae using load
			$config['per_page'] = $perpage; // Total data in one page
			$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
			$choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
			$config['num_links'] = round($choice); // Rounding Choice Variable
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config); // intialize var config
			$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
			$data['results'] = $this->mp->fetchKategori($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
			$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
			$data['total_rows'] = $this->mod->countData('kategori'); // Make a variable (array) link so the view can call the variable
			$this->load->view('admin/index',$data);
			}
			else{
				$data['results'] = $this->mp->fetchKategoriSearch($_POST); // fetch data using limit and pagination
				$data['links'] = false;
				$this->load->view('admin/index',$data);
			}
		}

		function tambah_kategori(){
			$data['title_web'] = 'Tambah kategori | Adminpanel Furnimade';
			$data['path_content'] = 'admin/produk/tambah_kategori';
			$data['parent'] = $this->mp->fetchAllParent();
			$this->form_validation->set_rules('nama_kategori','Nama Kategori','required');
			$this->form_validation->set_rules('id_parent','Parent','required');
			$this->form_validation->set_rules('keterangan_kategori','Keterangan Kategori','required');

			if(!$this->form_validation->run()){
				$data['error'] = false;
				$this->load->view('admin/index',$data);
			}
			else{
				$config['upload_path'] = './asset/gambar/produk';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '500';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$save = $this->mp->saveKategori($_POST,FALSE);
					redirect(base_url($this->uri->segment(1).'/produk/lihat_kategori'));
				}
				else{
					$save = $this->mp->saveKategori($_POST,$this->upload->data());
					redirect(base_url($this->uri->segment(1).'/produk/lihat_kategori'));
				}
			}
		}

		function ubah_kategori(){
			$data['title_web'] = 'Ubah Kategori | Adminpanel Furnimade';
			$data['path_content'] = 'admin/produk/ubah_kategori';
			$data['parent'] = $this->mp->fetchAllParent();

			$id=$this->uri->segment(4);
			$data['result']=$this->mp->getKategori($id);
			if($data['result']==FALSE)
				redirect(base_url('adminpanel/produk/lihat_kategori'));

				$this->form_validation->set_rules('nama_kategori','Nama Kategori','required');
				$this->form_validation->set_rules('id_parent','Parent','required');
				$this->form_validation->set_rules('keterangan_kategori','Keterangan Kategori','required');
				if(!$this->form_validation->run()){
					$this->load->view('admin/index',$data);
				}
				else{
					$config['upload_path'] = './asset/gambar/produk';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '500';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';

					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload()){
						$save = $this->mp->editKategori($_POST,$id,$this->upload->data());
						redirect(base_url($this->uri->segment(1).'/produk/lihat_kategori'));
					}
					else{
						$save = $this->mp->editKategori($_POST,$id,$this->upload->data());
						redirect(base_url($this->uri->segment(1).'/produk/lihat_kategori'));
					}
				}
		}

		function hapus_kategori(){
			$id = $this->uri->segment(4);
			$this->db->where('id_kategori',$id);
			$this->db->delete('kategori');
			redirect(base_url($this->uri->segment(1).'/produk/lihat_kategori'));
		}








}

?>
