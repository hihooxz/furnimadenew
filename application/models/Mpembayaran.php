<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpembayaran extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchPembayaran($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->order_by('nama_bank','ASC');
    $query = $this->db->get('pembayaran');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllPembayaran() {
    return $this->db->count_all("pembayaran");
  }

  function savePembayaran($data,$upload_data){
    $array = array(
        'nama_bank' => $data['nama_bank'],
        'atas_nama' => $data['atas_nama'],
				'no_rekening' => $data['no_rekening'],
        'gambar_bank' => 'asset/gambar/pembayaran/'.$upload_data['orig_name']


      );
    $this->db->insert('Pembayaran',$array);
    return 1;
  }
    function editPembayaran($data,$upload_data,$id){
      $array = array(
				'nama_bank' => $data['nama_bank'],
        'atas_nama' => $data['atas_nama'],
				'no_rekening' => $data['no_rekening']
        	);

			if($upload_data!=false){
				$array['gambar_bank'] = 'asset/gambar/pembayaran/'.$upload_data['orig_name'];
			}
      $this->db->where('id_Pembayaran',$id);
      $this->db->update('pembayaran',$array);
      return 1;
    }

		function fetchPembayaranSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('nama_bank','ASC');
	    $query = $this->db->get('pembayaran');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}


}
