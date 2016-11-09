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
  function countAllpesan() {
    return $this->db->count_all("pesan");
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

}
