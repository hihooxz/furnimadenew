<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mpesan','mps');
    $this->load->library('pagination');
	}

  function lihat_pesan(){
    $data['title_web'] = 'View All pesan | Adminpanel Furnimade';
    $data['path_content'] = 'admin/pesan/lihat_pesan';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/pesan/lihat_pesan/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('pesan');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mps->fetchPesan($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('pesan'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mps->fetchPesanSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }

		function tambah_pesan(){
			$data['title_web'] = 'Tambah pesan | Adminpanel Furnimade';
			$data['path_content'] = 'admin/pesan/tambah_pesan';
			$this->form_validation->set_rules('pesan','Pesan','required');
			if(!$this->form_validation->run()){
				$data['error'] = false;
				$this->load->view('admin/index',$data);
			}
			else{
				$config['upload_path'] = './asset/gambar/pesan';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '8000';

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('admin/index',$data);
				}

			else{
				$save = $this->mps->savePesan($_POST,$this->upload->data());
				redirect(base_url($this->uri->segment(1).'/pesan/lihat_pesan'));
			}
		}
	}

		function ubah_pesan(){
			$data['title_web'] = 'Ubah Pesan | Adminpanel Furnimade';
			$data['path_content'] = 'admin/pesan/ubah_pesan';
			$id=$this->uri->segment(4);
			$data['result']=$this->mod->getDataWhere('pesan','id_pesan',$id);
			if($data['result']==FALSE)
				redirect(base_url('adminpanel/pesan/lihat_pesan'));

				$this->form_validation->set_rules('pesan','Pesan','required');

				if(!$this->form_validation->run()){
					$data['error'] = false;
					$this->load->view('admin/index',$data);
				}
				else{
					$config['upload_path'] = './asset/gambar/pesan';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '8000';



				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$save = $this->mps->editPesan($_POST,FALSE,$id);
					redirect(base_url($this->uri->segment(1).'/pesan/lihat_pesan'));
				}

			else{
				$save = $this->mps->editPesan($_POST,$this->upload->data(),$id);
				redirect(base_url($this->uri->segment(1).'/pesan/lihat_pesan'));
			}
		}
	}

    function hapus_pesan(){
			$id = $this->uri->segment(4);
			$this->db->where('id_pesan',$id);
			$this->db->delete('pesan');
			redirect(base_url($this->uri->segment(1).'/pesan/lihat_pesan'));
		}
  }

?>
