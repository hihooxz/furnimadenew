<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mblog extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchBlog($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->order_by('tanggal_blog','ASC');
    $query = $this->db->get('blog');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllblog() {
    return $this->db->count_all("blog");
  }

  function saveBlog($data,$upload_data){
    $array = array(
        'judul_blog' => $data['judul_blog'],
        'artikel' => $data['artikel'],
        'gambar_blog' => 'asset/gambar/blog/'.$upload_data['orig_name'],
        'id_user' => $this->session->userdata('idAdmin'),
				'tanggal_blog' => date('Y-m-d H:i:s')

      );
    $this->db->insert('blog',$array);
    return 1;
  }
    function editblog($data,$upload_data,$id){
      $array = array(
				'judul_blog' => $data['judul_blog'],
        'artikel' => $data['artikel'],
        	);

			if($upload_data!=false){
				$array['gambar_blog'] = 'asset/gambar/blog/'.$upload_data['orig_name'];
			}
      $this->db->where('id_blog',$id);
      $this->db->update('blog',$array);
      return 1;
    }

		function fetchBlogSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('tanggal_blog','ASC');
	    $query = $this->db->get('blog');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}
		function fetchLihatBlogMember($limit,$start,$pagenumber) {

	    if($pagenumber!="")
	      $this->db->limit($limit,($pagenumber*$limit)-$limit);
	    else
	      $this->db->limit($limit,$start);

	  	$this->db->join('user','user.id_user = blog.id_user');
	    $this->db->order_by('tanggal_blog','DESC');
	    $query = $this->db->get('blog');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
	  }
		function getLihatBlog($id){
			$this->db->join('user','user.id_user = blog.id_user');
			$this->db->where('id_blog',$id);
			$query = $this->db->get('blog');
			if($query->num_rows()>0){
				return $query->row_array();
			}
			else return false;
		}

}
