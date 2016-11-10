<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mpembayaran','mpb');
    $this->load->library('pagination');
	}

  function lihat_pembayaran(){
    $data['title_web'] = 'View All Pembayaran | Adminpanel Furnimade';
    $data['path_content'] = 'admin/pembayaran/lihat_pembayaran';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/Pembayaran/lihat-pembayaran/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('pembayaran');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mpb->fetchPembayaran($config['per_page'],$page,$this->uri->segment(4)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('pembayaran'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mpb->fetchPembayaranSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }

		function tambah_Pembayaran(){
			$data['title_web'] = 'Tambah Pembayaran | Adminpanel Furnimade';
			$data['path_content'] = 'admin/pembayaran/tambah_pembayaran';
			$this->form_validation->set_rules('nama_bank','Nama Bank','required');
			$this->form_validation->set_rules('atas_nama','Atas Nama','required');
			$this->form_validation->set_rules('no_rekening','No Rekening','required|numeric');

			if(!$this->form_validation->run()){
				$data['error'] = false;
				$this->load->view('admin/index',$data);
			}
			else{
				$config['upload_path'] = './asset/gambar/pembayaran';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '8000';

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('admin/index',$data);
				}

			else{
				$save = $this->mpb->savePembayaran($_POST,$this->upload->data());
				redirect(base_url($this->uri->segment(1).'/pembayaran/lihat_pembayaran'));
			}
		}
	}

		function ubah_Pembayaran(){
			$data['title_web'] = 'Ubah Pembayaran | Adminpanel Furnimade';
			$data['path_content'] = 'admin/Pembayaran/ubah_Pembayaran';
			$id=$this->uri->segment(4);
			$data['result']=$this->mpbd->getDataWhere('Pembayaran','id_Pembayaran',$id);
			if($data['result']==FALSE)
				redirect(base_url('adminpanel/Pembayaran/lihat_Pembayaran'));

				$this->form_validation->set_rules('nama_bank','Nama Bank','required');
				$this->form_validation->set_rules('atas_nama','Atas Nama','required');
				$this->form_validation->set_rules('no_rekening','No Rekening','required|numeric');

				if(!$this->form_validation->run()){
					$data['error'] = false;
					$this->load->view('admin/index',$data);
				}
				else{
					$config['upload_path'] = './asset/gambar/Pembayaran';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '8000';



				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$save = $this->mpb->editPembayaran($_POST,FALSE,$id);
					redirect(base_url($this->uri->segment(1).'/pembayaran/lihat_pembayaran'));
				}

			else{
				$save = $this->mpb->editPembayaran($_POST,$this->upload->data(),$id);
				redirect(base_url($this->uri->segment(1).'/pembayaran/lihat_pembayaran'));
			}
		}
	}

    function hapus_pembayaran(){
			$id = $this->uri->segment(4);
			$this->db->where('id_pembayaran',$id);
			$this->db->delete('pembayaran');
			redirect(base_url($this->uri->segment(1).'/Pembayaran/lihat_pembayaran'));
		}

		function lihat_konfirmasi_pembayaran(){
	    $data['title_web'] = 'Lihat Konfirmasi | Adminpanel Furnimade';
	    $data['path_content'] = 'admin/pembayaran/lihat_konfirmasi_pembayaran';

		$this->form_validation->set_rules('search','Search','required');

			if(!$this->form_validation->run()){
	    // Ngeload data
	    $perpage = 10;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/pembayaran/lihat-konfirmasi-pembayaran/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countData('konfirmasi_pembayaran');// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $config['full_tag_open'] = '<ul class="pagination">';
	    $config['full_tag_close'] = '</ul>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="disabled"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mpb->fetchKonfirmasiPembayaran($config['per_page'],$page,$this->uri->segment(5)); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countData('konfirmasi_pembayaran'); // Make a variable (array) link so the view can call the variable
	    $this->load->view('admin/index',$data);
			}
			else{
				$data['results'] = $this->mpb->fetchKonfirmasiPembayaranSearch($_POST); // fetch data using limit and pagination
				$data['links'] = false;
				$this->load->view('admin/index',$data);
			}
	  }

		function status_done(){
	  	$id=$this->uri->segment(4);
			$data['result']=$this->mpb->getKonfirmasi($id);
			if($data['result']==FALSE)
				redirect(base_url($this->uri->segment(1).'/pembayaran/lihat_konfirmasi_pembayaran'));

			$array = array(
					'status' => 1
				);
			$this->db->where('id_konfirmasi_pembayaran',$id);
			$this->db->update('konfirmasi_pembayaran',$array);

			// sent email changed status
			$this->mpb->changeStatusOrder(1,$data['result']);

			redirect(base_url($this->uri->segment(1).'/pembayaran/lihat_konfirmasi_pembayaran'));
	  }

		function status_pending(){
			$id=$this->uri->segment(4);
			$data['result']=$this->mpb->getKonfirmasi($id);
			if($data['result']==FALSE)
				redirect(base_url($this->uri->segment(1).'/pembayaran/lihat_konfirmasi_pembayaran'));

			$array = array(
					'status' => 2
				);
			$this->db->where('id_konfirmasi_pembayaran',$id);
			$this->db->update('konfirmasi_pembayaran',$array);

			// sent email changed status
			$this->mpb->changeStatusOrder(2,$data['result']);

			redirect(base_url($this->uri->segment(1).'/pembayaran/lihat_konfirmasi_pembayaran'));
	  }

		function ubah_konfirmasi_pembayaran(){
				$data['title_web'] = 'Edit konfirmasi pembayaran | Adminpanel Furnimade';
				$data['path_content'] = 'admin/pembayaran/ubah_konfirmasi_pembayaran';
				$id=$this->uri->segment(4);
				$data['result']=$this->mpb->getKonfirmasi($id);
				if($data['result']==FALSE)
					redirect(base_url('adminpanel/pembayaran/lihat_konfirmasi_pembayaran'));

					$this->form_validation->set_rules('status','Status','required');

	        if(!$this->form_validation->run()){
	          $this->load->view('admin/index',$data);
	        }
	        else{
	          $save = $this->mpb->editKonfirmasi($_POST,$id);
	          redirect(base_url($this->uri->segment(1).'/pembayaran/lihat_konfirmasi_pembayaran'));
	        }
		}

		function hapus_konfirmasi_pembayaran(){
			$id = $this->uri->segment(4);
			$this->db->where('id_konfirmasi_pembayaran',$id);
			$this->db->delete('konfirmasi_pembayaran');
			redirect(base_url($this->uri->segment(1).'/pembayaran/lihat_konfirmasi_pembayaran'));
		}

  }

?>
