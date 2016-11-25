<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpesan extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchPesan($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);
		$this->db->join('user','pesan.id_user = user.id_user');
		$this->db->join('ruangpesan','pesan.id_ruangpesan = ruangpesan.id_ruangpesan');
    $this->db->order_by('tanggal_pesan','ASC');
    $query = $this->db->get('pesan');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function getRuangpesan($id){
  	$this->db->join('user','user.id_user = ruangpesan.id_penjual');
  	$this->db->where('id_ruangpesan',$id);
  	$query = $this->db->get('ruangpesan');
  	if($query->num_rows()>0){
  		return $query->row_array();
  	}
  	else return false;
  }
  function countAllpesan() {
    return $this->db->count_all("pesan");
  }

	function simpanPesan($data,$id,$upload_data){
    $array = array(
        'id_ruangpesan' => $id,
        'id_user' => $this->session->userdata('idUser'),
				'pesan' => $data['pesan'],	
				'tanggal_pesan' => date('Y-m-d H:i:s')

      );
			if($upload_data!=false){
				$array['gambar_pesan'] = 'asset/gambar/pesan/'.$upload_data['orig_name'];
			}
    $this->db->insert('pesan',$array);
    return 1;
  }


		function fetchPesanSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('tanggal_pesan','ASC');
	    	$query = $this->db->get('pesan');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}

		function fetchRuangpesanPembeli($limit,$start,$pagenumber,$id_user){

			if($pagenumber!=""){
				/*$this->db->limit($limit,($pagenumber*$limit)-$limit);*/
				$limit = ($pagenumber*$limit)-$limit.",".$limit;
			}
	    else{
				/* $this->db->limit($limit,$start); */
				$limit = $start.",".$limit;
			}

	    $sql = "select fm_ruangpesan.*,fm_user.nama_lengkap ,table_user.nama_lengkap as nama_lengkap_penjual
	          FROM
	          fm_ruangpesan
	          JOIN fm_user ON fm_ruangpesan.id_pembeli = fm_user.id_user
	          JOIN (select * from fm_user) as table_user ON fm_ruangpesan.id_penjual = table_user.id_user
	          Where id_pembeli = ".$id_user."
						limit ".$limit."
	          ";
						$query = $this->db->query($sql);
				    if($query->num_rows()>0){
				      return $query->result();
				    }
				    else return FALSE;
	  }
	  function fetchAllPesanPembeli($id) {
	  	$this->db->select('pesan.*,user.username');
	  	$this->db->join('ruangpesan','ruangpesan.id_ruangpesan = pesan.id_pesan');
	  	$this->db->join('user','user.id_user = ruangpesan.id_penjual');
	  	$this->db->where('pesan.id_ruangpesan',$id);
		$this->db->order_by('tanggal_pesan');
	    $query = $this->db->get('pesan');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}

}
