<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkonfigurasi extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchkonfigurasi($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
    $this->db->limit($limit,$start);
	  $this->db->order_by('judul_website','DESC');
    $query = $this->db->get('konfigurasi');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }

    function editkonfigurasi($data,$id=1){
      $array = array(
				'judul_website' => $data['judul_website'],
				'faq' => $data['faq'],
				'syarat_ketentuan' => $data['syarat_ketentuan'],
				'tentang_kami' => $data['tentang_kami'],
				'alamat_kantor' => $data['alamat_kantor'],
				'no_telp' => $data['no_telp'],
				'link_facebook' => $data['link_facebook'],
				'link_twitter' => $data['link_twitter'],
				'link_instagram' => $data['link_instagram'],
				'link_gplus' => $data['link_gplus'],
				'link_path' => $data['link_path']
			);

      $this->db->where('id_konfigurasi',$id);
      $this->db->update('konfigurasi',$array);
      return 1;
    }
		function getkonfigurasi($id){
			$query = $this->db->get('konfigurasi');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else return FALSE;

		}







}
