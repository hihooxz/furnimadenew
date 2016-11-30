<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchUser($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->order_by('tanggal_daftar','DESC');
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllUser() {
    return $this->db->count_all("user");
  }

  function saveUser($data){
    $array = array(
        'username' => $data['username'],
        'password' => md5($data['password']),
        'email' => $data['email'],
        'nama_lengkap' => $data['nama_lengkap'],
				'jenis_kelamin' => $data['jenis_kelamin'],
        'alamat' => $data['alamat'],
        'tentang_user' => $data['tentang_user'],
        'hak_akses' => $data['hak_akses'],
      	'tanggal_daftar' => date('Y-m-d H:i:s'),
        'status_user' => $data['status_user']
      );
    $this->db->insert('user',$array);
    return 1;
  }
    function editUser($data,$id){
      $array = array(
				'username' => $data['username'],
				'password' => md5($data['password']),
				'email' => $data['email'],
				'nama_lengkap' => $data['nama_lengkap'],
				'jenis_kelamin' => $data['jenis_kelamin'],
				'alamat' => $data['alamat'],
				'tentang_user' => $data['tentang_user'],
				'hak_akses' => $data['hak_akses'],
				'status_user' => $data['status_user']
			);
			if($data['password']!="")
			$array['password']=md5($data['password']);

      $this->db->where('id_user',$id);
      $this->db->update('user',$array);
      return 1;
    }

		function fetchUserSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('tanggal_daftar','DESC');
	    $query = $this->db->get('user');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}
    function validLogin($username,$password){
    $this->db->where('username',$username);
    $this->db->where('password',md5($password));
    $this->db->where('hak_akses != ',1);;
      $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return false;
  }
  function validLoginSupplier($username,$password){
    $this->db->where('username',$username);
    $this->db->where('password',md5($password));
    $this->db->where('hak_akses',2);
      $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return false;
  }
  function saveProfil($data,$id){
    $array = array(
        'email' => $data['email'],
        'nama_lengkap' => $data['nama'],
        'jenis_kelamin' => $data['jenis_kelamin'],
        'alamat' => $data['alamat'],
        'tentang_user' => $data['tentang_user'],
        'no_hp' => $data['no_hp']
      );
    $this->db->where('id_user',$id);
    $this->db->update('user',$array);
    return 1;
  }
  function gantiPassword($data,$id){
    $array = array(
        'password' => md5($data['password'])
      );
    $this->db->where('id_user',$id);
    $this->db->update('user',$array);
    return 1;
  }
  function daftarCustomer($data){
    $array = array(
        'username' => $data['username'],
        'password' => md5($data['password']),
        'email' => $data['email'],
        'hak_akses' => 3, // 3 = customer
        'tanggal_daftar' => date('Y-m-d H:i:s'),
        'status_user' => 0
      );
    $this->db->insert('user',$array);
    return 1;
  }
  function daftarSupplier($data){
    $array = array(
        'username' => $data['username'],
        'password' => md5($data['password']),
        'email' => $data['email'],
        'hak_akses' => 2, // 3 = Supplier
        'tanggal_daftar' => date('Y-m-d H:i:s'),
        'status_user' => 0
      );
    $this->db->insert('user',$array);
    return 1;
  }
	function bikinRuangpesan($id_pembeli,$id_penjual){
    $array = array(
        'id_pembeli' => $id_pembeli,
        'id_penjual' => $id_penjual,
        'tanggal_ruangpesan' => date('Y-m-d H:i:s')
      );
    $this->db->insert('ruangpesan',$array);
    return 1;
  }
	function ruangPesan($id_pembeli,$id_penjual){
    $this->db->where('id_pembeli',$id_pembeli);
    $this->db->where('id_penjual',$id_penjual);
    $query = $this->db->get('ruangpesan');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return false;
  }
	function fetchPesan($id){
		$this->db->join('ruangpesan','ruangpesan.id_ruangpesan = pesan.id_ruangpesan');
		$this->db->join('user','user.id_user = pesan.id_user');
		$this->db->order_by('tanggal_pesan','ASC');
		$this->db->where('pesan.id_ruangpesan',$id);
		$query = $this->db->get('pesan');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}
	function getRuangpesan($id){

    $sql = "select fm_ruangpesan.*,id_penjual.nama_lengkap as nama_lengkap_penjual,fm_user.*
          FROM
          fm_ruangpesan
          JOIN fm_user ON fm_ruangpesan.id_pembeli = fm_user.id_user
          JOIN (select * from fm_user) as penjual ON fm_ruangpesan.id_penjual = penjual.id_user
          ";
    $query = $this->db->query($sql);
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return FALSE;
  }
  function getPenjualUsername($username){
    $this->db->where('username',$username);
    $this->db->where('hak_akses',2);
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return false;
  }
}
