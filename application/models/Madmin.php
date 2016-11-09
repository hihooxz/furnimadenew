<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}
	function validLogin($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$this->db->where('hak_akses',1);
	  	$query = $this->db->get('user');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else return false;
	}
}
