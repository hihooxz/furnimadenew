<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_penjual extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('muser');
		$this->load->model('mproduk','mp');
		$this->load->model('mpembayaran');
		$this->load->model('mpesan');
		if($this->session->userdata('hakAkses') != 2){
			redirect(base_url('hal/login/'));
			$array = array(
					'error_session' => TRUE
				);
			$this->session->set_flashdata($array);
		}
	}
	function profil(){
		$data['title_web'] = 'Profil Penjual| Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/profil';

		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('no_hp','No Ponsel','required|numeric');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('tentang_user','Tentang Anda','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');

		if(!$this->form_validation->run())
			$this->load->view('yellow/index',$data);
		else{
			$this->muser->saveProfil($_POST,$this->session->userdata('idUser'));
			$this->session->set_flashdata(array('success_form'=>TRUE));
			redirect(base_url('akun-penjual/profil'));
		}
	}
	function password(){
		$data['title_web'] = 'Ganti Password| Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/password';

		$this->form_validation->set_rules('current','Password Yang Sekarang','required|callback_validPassword');
		$this->form_validation->set_rules('password','Password Baru','required');
		$this->form_validation->set_rules('confirm','Konfirmasi Password','required|matches[password]');
		if(!$this->form_validation->run())
			$this->load->view('yellow/index',$data);
		else{
			$this->session->set_flashdata(array('success_form'=>TRUE));
			$this->muser->gantiPassword($_POST,$this->session->userdata('idUser'));
			redirect(base_url('akun-penjual/password'));
		}
	}
	function validPassword(){
		$current = $this->input->post('current');
		$data = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));

		if(md5($current) == $data['password']){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('validPassword','Password Yang Sekarang Tidak Benar!');
			return FALSE;
		}
	}
	function unggah_produk(){
		$data['title_web'] = 'Unggah Produk| Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/unggah_produk';
		$data['kategori'] = $this->mp->fetchAllKategori();
		$this->form_validation->set_rules('id_kategori','Nama Kategori','required');
		$this->form_validation->set_rules('nama_produk','Nama Produk','required');
		$this->form_validation->set_rules('harga_produk','Harga Produk','required|numeric');
		$this->form_validation->set_rules('deskripsi_produk','Deskripsi Produk','required');

		if(!$this->form_validation->run()){
			$this->load->view('yellow/index',$data);
		}
		else{
			$config['upload_path'] = './asset/gambar/produk';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			$config['file_name'] = $this->session->userdata('username').'_'.date('YmdHis');
			$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('yellow/index',$data);
				}
				else{
						$this->session->set_flashdata(array('success_form'=>TRUE));
					$data['save'] = $this->mp->unggahProduk($_POST,$this->upload->data());
					$this->load->view('yellow/index',$data);
				}

		}
	}
	function edit_produk(){
		$data['title_web'] = 'Unggah Produk| Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/edit_produk';
		$data['kategori'] = $this->mp->fetchAllKategori();

		$id=$this->uri->segment(3);
		$data['result']=$this->mp->getProduk($id);
		if($data['result']==FALSE)
			redirect(base_url($this->uri->segment(1).'/riwayat_produk'));

			$this->form_validation->set_rules('id_kategori','Nama Kategori','required');
			$this->form_validation->set_rules('nama_produk','Nama Produk','required');
			$this->form_validation->set_rules('harga_produk','Harga Produk','required|numeric');
			$this->form_validation->set_rules('deskripsi_produk','Deskripsi Produk','required');
			if(!$this->form_validation->run()){
				$this->load->view('yellow/index',$data);
			}
			else{
				$config['upload_path'] = './asset/gambar/produk';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000';
				$config['file_name'] = $this->session->userdata('username').'_'.date('YmdHis');

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$save = $this->mp->editunggahproduk($_POST,$id,FALSE);
					redirect(base_url($this->uri->segment(1).'/riwayat_produk'));
				}
				else{
					$save = $this->mp->editunggahproduk($_POST,$id,$this->upload->data());
					redirect(base_url($this->uri->segment(1).'/riwayat_produk'));
				}
			}
	}
	function riwayat_produk(){
		$data['title_web'] = 'Riwayat Produk| Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/riwayat_produk';
		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/riwayat_produk/'); // configurate link pagination
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
	function riwayat_pesanan(){
		$data['title_web'] = 'Riwayat Pesanan| Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/riwayat_pesanan';


    	$this->load->view('yellow/index',$data);
	}
	function konfirmasi_pengerjaan(){
		$data['title_web'] = 'Konfirmasi Pengerjaan | Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/konfirmasi_pengerjaan';


    	$this->load->view('yellow/index',$data);
	}
	function konfirmasi_pembayaran(){
		$data['title_web'] = 'Konfirmasi Pembayaran | Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/konfirmasi_pembayaran';

		$data['results'] = $this->mod->fetchAllData('pembayaran');

		$this->form_validation->set_rules('id_pembayaran','Bank Tujuan','required');
		$this->form_validation->set_rules('bank','Bank Asal','required');
		$this->form_validation->set_rules('atas_nama','Atas Nama','required');
		$this->form_validation->set_rules('no_rekening','No Rekening','required|numeric');
		$this->form_validation->set_rules('nominal','Nominal','required|numeric');
		$this->form_validation->set_rules('tanggal_transfer','Tanggal Transfer','required');

		if(!$this->form_validation->run())
    		$this->load->view('yellow/index',$data);
    	else{
    		$data['save'] = $this->mpembayaran->saveKonfirmasi($_POST);
    		$this->session->set_flashdata(array('success_form'=>TRUE));
    		$this->load->view('yellow/index',$data);
    	}
	}
	function pesan(){
		$data['title_web'] = 'Pesan | Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/pesan';
		$data['result'] = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));
		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/pesan/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('pesan');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 3; // catch uri segment where locate in 3th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mpesan->fetchRuangpesanPenjual($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('idUser')); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('pesan'); // Make a variable (array) link so the view can call the variable
    $this->load->view('yellow/index',$data);
		}
		else{
			$data['results'] = $this->mpesan->fetchRuangpesanSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('yellow/index',$data);
		}

    	$this->load->view('yellow/index',$data);
	}

	function lihat_pesan(){
		$data['title_web'] = 'Lihat Pesan| Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/lihat_pesan';
		$id = $this->uri->segment(3);
		$data['result'] = $this->mpesan->getRuangpenjual($id);


		$data['results'] = $this->mpesan->fetchAllPesanPenjual($id);
		$this->load->view('yellow/index',$data);
	}

	function tender(){
		$data['title_web'] = 'Tender | Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/tender';


			$this->load->view('yellow/index',$data);
	}
	public function ruang_pesan(){
		$id = $this->uri->segment(3);
		$data['result']	= $this->muser->getRuangpenjual($id);
		if($data['result'] == false)
			show_404();

		$data['results'] = $this->muser->fetchRuangpesanPenjual($id);
		$this->load->view('yellow/index',$data);
	}

	function kirim_pesan(){
		$data['title_web'] = 'Kirim Pesan | Furnimade';
		$data['path_content'] = 'yellow/akun_penjual/kirim_pesan';
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
						$ruangpesan= $this->muser->ruangPesan($id,$this->session->userdata('idUser'));
						if($ruangpesan == FALSE){
							$this->muser->bikinRuangpesan($id,$this->session->userdata('idUser'));
							$ruangpesan= $this->muser->ruangPesan($id,$this->session->userdata('idUser'));
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

	function keranjang(){
		$data['title_web'] = 'Keranjang Belanjaan | Furnimade';
		$data['path_content'] = 'yellow/module/keranjang';

		$this->load->view('yellow/index',$data);
	}
	function checkout(){
		$data['title_web'] = 'Checkout & Pembayaran Belanjaan | Furnimade';
		$data['path_content'] = 'yellow/module/checkout';

		$this->load->view('yellow/index',$data);
	}
	function delete_produk(){
		$id = $this->uri->segment(3);
		$this->db->where('id_produk',$id);
		$this->db->delete('produk');
		redirect(base_url($this->uri->segment(1).'/riwayat_produk/'));
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
