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
    $this->db->insert('pembayaran',$array);
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
      $this->db->where('id_pembayaran',$id);
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
		function fetchKonfirmasiPembayaran($limit,$start,$pagenumber) {

	    if($pagenumber!="")
	      $this->db->limit($limit,($pagenumber*$limit)-$limit);
	    else
	      $this->db->limit($limit,$start);
	  	$this->db->select('konfirmasi_pembayaran.*,user.username,pembayaran.nama_bank');
			$this->db->join('pembayaran','konfirmasi_pembayaran.id_pembayaran = pembayaran.id_pembayaran');
			$this->db->join('user','konfirmasi_pembayaran.id_user = user.id_user');
	    $this->db->order_by('tanggal_transfer','ASC');
	    $query = $this->db->get('konfirmasi_pembayaran');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
	  }
	  function countAllKonfirmasiPembayaran() {
	    return $this->db->count_all("konfirmasi_pembayaran");
	  }

		function saveKonfirmasi($data){
			$array = array(
					'id_user' =>$this->session->userdata('idUser'),
					'id_pembayaran' => $data['id_pembayaran'],
					'atas_nama' => $data['atas_nama'],
					'no_rekening' => $data['no_rekening'],
					'nominal' => $data['nominal'],
					'bank' =>$data['bank'],
					'tanggal_transfer' => date('Y-m-d',strtotime($data['tanggal_transfer'])),
					'tanggal_konfirmasi_pembayaran' => date('Y-m-d H:i:s')
				);
			$this->db->insert('konfirmasi_pembayaran',$array);
			return 1;
		}

	    function editKonfirmasi($data,$id){
	      $array = array(
					'status' => $data['status']
	        	);
	      $this->db->where('id_konfirmasi_pembayaran',$id);
	      $this->db->update('konfirmasi_pembayaran',$array);
	      return 1;
	    }

			function fetchKonfirmasiPembayaranSearch($data) {
				$this->db->like($data['by'],$data['search']);
				$this->db->select('konfirmasi_pembayaran.*,user.username,pembayaran.nama_bank');
			$this->db->join('pembayaran','konfirmasi_pembayaran.id_pembayaran = pembayaran.id_pembayaran');
			$this->db->join('user','konfirmasi_pembayaran.id_user = user.id_user');
				$this->db->order_by('tanggal_transfer','ASC');
		    $query = $this->db->get('konfirmasi_pembayaran');
		    if($query->num_rows()>0){
		      return $query->result();
		    }
		    else return FALSE;
			}

			function getKonfirmasi($id) {

				$this->db->join('pembayaran','konfirmasi_pembayaran.id_pembayaran = pembayaran.id_pembayaran');
				$this->db->join('user','konfirmasi_pembayaran.id_user = user.id_user');
		    $this->db->order_by('tanggal_transfer','ASC');
				$this->db->where('id_konfirmasi_pembayaran',$id);
				$query = $this->db->get('konfirmasi_pembayaran');
				if($query->num_rows()>0){
					return $query->row_array();
				}
				else return FALSE;
			}
			function changeStatusOrder($status,$data){
		    $status_pembayaran = "";
		    if($status == 1)
		      $status_pembayaran = "Done";
		    else if($status == 2)
		      $status_pembayaran = "Pending";
		  }

			function fetchAllPembayaran(){

				$this->db->order_by('nama_bank','ASC');
				$query = $this->db->get('pembayaran');
				if($query->num_rows()>0){
					return $query->result();
				}
				else return FALSE;
			}

}
