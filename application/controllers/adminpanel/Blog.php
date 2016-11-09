<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mblog','mb');
    $this->load->library('pagination');
	}

  function lihat_blog(){
    $data['title_web'] = 'View All Blog | Adminpanel Furnimade';
    $data['path_content'] = 'admin/blog/lihat_blog';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/blog/lihat_blog/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('blog');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mb->fetchBlog($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('blog'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mb->fetchBlogSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }

		function tambah_blog(){
			$data['title_web'] = 'Tambah blog | Adminpanel Furnimade';
			$data['path_content'] = 'admin/blog/tambah_blog';
			$this->form_validation->set_rules('judul_blog','Judul Blog','required');
			$this->form_validation->set_rules('artikel','artikel','required');
			if(!$this->form_validation->run()){
				$data['error'] = false;
				$this->load->view('admin/index',$data);
			}
			else{
				$config['upload_path'] = './asset/gambar/blog';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '8000';

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('admin/index',$data);
				}

			else{
				$save = $this->mb->saveBlog($_POST,$this->upload->data());
				redirect(base_url($this->uri->segment(1).'/blog/lihat_blog'));
			}
		}
	}

		function ubah_blog(){
			$data['title_web'] = 'Ubah blog | Adminpanel Furnimade';
			$data['path_content'] = 'admin/blog/ubah_blog';
			$id=$this->uri->segment(4);
			$data['result']=$this->mod->getDataWhere('blog','id_blog',$id);
			if($data['result']==FALSE)
				redirect(base_url('adminpanel/blog/lihat_blog'));

				$this->form_validation->set_rules('judul_blog','Judul Blog','required');
				$this->form_validation->set_rules('artikel','artikel','required');

				if(!$this->form_validation->run()){
					$data['error'] = false;
					$this->load->view('admin/index',$data);
				}
				else{
					$config['upload_path'] = './asset/gambar/blog';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '8000';



				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$save = $this->mb->editBlog($_POST,FALSE,$id);
					redirect(base_url($this->uri->segment(1).'/blog/lihat_blog'));
				}

			else{
				$save = $this->mb->editBlog($_POST,$this->upload->data(),$id);
				redirect(base_url($this->uri->segment(1).'/blog/lihat_blog'));
			}
		}
	}

    function hapus_blog(){
			$id = $this->uri->segment(4);
			$this->db->where('id_blog',$id);
			$this->db->delete('blog');
			redirect(base_url($this->uri->segment(1).'/blog/lihat_blog'));
		}
  }

?>
