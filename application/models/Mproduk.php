<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproduk extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchProduk($limit,$start,$pagenumber) {

    if($pagenumber!=""){
			/*$this->db->limit($limit,($pagenumber*$limit)-$limit);*/
			$limit = ($pagenumber*$limit)-$limit.",".$limit;
		}
    else{
			/* $this->db->limit($limit,$start); */
			$limit = $start.",".$limit;
		}

		/*$this->db->join('user','user.id_user = header_booked.id_stylist');
		$this->db->join('user','user.id_user = header_booked.id_customer');
    $this->db->order_by('date_insert','DESC');
    $query = $this->db->get('header_booked');*/
		$sql = "select fm_produk.*,fm_user.username,fm_kategori.*
		FROM
		fm_produk
		JOIN fm_user ON fm_produk.id_penjual = fm_user.id_user
		JOIN fm_kategori ON fm_produk.id_kategori = fm_kategori.id_kategori
		limit ".$limit."
		";
		$query = $this->db->query($sql);
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllproduk() {
    return $this->db->count_all("produk");
    }

		function getproduk($id) {
			$sql = "select fm_produk.*,fm_user.username,fm_kategori.*
			FROM
			fm_produk
			JOIN fm_user ON fm_produk.id_penjual = fm_user.id_user
			JOIN fm_kategori ON fm_produk.id_kategori = fm_kategori.id_kategori
			where id_produk = ".$id."
			";
			$query = $this->db->query($sql);
	    if($query->num_rows()>0){
	      return $query->row_array();
	    }
	    else return FALSE;
	  }

		function saveProduk($data,$upload_data){
			$array = array(
					'id_admin' => $this->session->userdata('idAdmin'),
					'id_penjual' => $data['user'],
					'id_kategori' => $data['kategori'],
					'nama_produk' =>$data['nama_produk'],
					'harga_produk' => $data['harga_produk'],
					'deskripsi_produk' =>$data['deskripsi_produk'],
					'tanggal_produk' => date('Y-m-d H:i:s'),
					'gambar_produk' => 'asset/gambar/thumbnail/'.$upload_data['orig_name']
				);
			$this->db->insert('produk',$array);
			return 1;
		}
			function editProduk($data,$upload_data,$id){
				$array = array(
					'id_penjual' => $data['user'],
					'id_kategori' => $data['kategori'],
					'nama_produk' =>$data['nama_produk'],
					'harga_produk' => $data['harga_produk'],
					'deskripsi_produk' =>$data['deskripsi_produk'],
					'tanggal_produk' => date('Y-m-d H:i:s')

				);

				if($upload_data!=false){
					$array['gambar_produk'] = 'asset/gambar/thumbnail/'.$upload_data['orig_name'];
				}
				$this->db->where('id_produk',$id);
				$this->db->update('produk',$array);
				return 1;
			}



		function fetchProdukSearch($data){
			if($data['by'] == "username") $data['by'] = "fm_user.username";
			$sql = "select fm_produk.*,fm_user.username,fm_kategori.*
			FROM
			fm_produk
			JOIN fm_user ON fm_product.id_penjual = fm_user.id_user
			JOIN fm_kategori ON fm_produk.id_kategori = fm_kategori.id_kategori
			where ".$data['by']." like '%".$data['search']."%'
			";
			$query = $this->db->query($sql);
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;

		}

		function fetchKategori($limit,$start,$pagenumber) {

			if($pagenumber!="")
				$this->db->limit($limit,($pagenumber*$limit)-$limit);
			else
				$this->db->limit($limit,$start);

			$this->db->order_by('id_kategori','DESC');
			$query = $this->db->get('kategori');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;
		}
		function countAllKategori() {
			return $this->db->count_all("kategori");
		}

		function saveKategori($data,$upload_data){
		$result = $this->mod->getDataWhere('kategori','nama_kategori',$data['id_parent']);
			$array = array(
					'id_parent' => $data['id_parent'],
					'nama_kategori' =>($data['nama_kategori']),
					'keterangan_kategori' => $data['keterangan_kategori'],
				);
			if($upload_data != FALSE){
				$array['gambar_kategori'] = 'asset/gambar/produk/'.$upload_data['orig_name'];
			}

			$this->db->insert('kategori',$array);
			return 1;
		}
			function editKategori($data,$id,$upload_data){
				$result = $this->mod->getDataWhere('kategori','nama_kategori',$data['id_parent']);
				$array = array(
					    'id_parent' => $data['id_parent'],
							'nama_kategori' =>($data['nama_kategori']),
							'keterangan_kategori' => $data['keterangan_kategori'],
				);

				if($upload_data!=false){
					$array['gambar_kategori'] = 'asset/gambar/produk/'.$upload_data['orig_name'];
				}
				$this->db->where('id_kategori',$id);
				$this->db->update('kategori',$array);
				return 1;
			}

			function fetchKategoriSearch($data) {
				$this->db->like($data['by'],$data['search']);
				$this->db->order_by('id_kategori','DESC');
				$query = $this->db->get('kategori');
				if($query->num_rows()>0){
					return $query->result();
				}
				else return FALSE;
			}
			function fetchAllParent(){
				$this->db->where('id_parent',0);
				$this->db->order_by('nama_kategori','ASC');
				$query = $this->db->get('kategori');
				if($query->num_rows()>0){
					return $query->result();
				}
				else return FALSE;
			}

			function fetchAllKategori(){
				$this->db->where('id_parent !=',0);
				$this->db->order_by('nama_kategori','ASC');
				$query = $this->db->get('kategori');
				if($query->num_rows()>0){
					return $query->result();
				}
				else return FALSE;
			}

			function unggahproduk($data,$upload_data){
				$array = array(
						'id_kategori' => $data['id_kategori'],
						'nama_produk' =>$data['nama_produk'],
						'harga_produk' => $data['harga_produk'],
						'deskripsi_produk' =>$data['deskripsi_produk'],
						'gambar_produk' => 'asset/gambar/produk/'.$upload_data['file_name'],
						'id_penjual' => $this->session->userdata('idUser'),
						'tanggal_produk' => date('Y-m-d H:i:s')
					);
				$this->db->insert('produk',$array);
				return 1;
			}

			function editunggahproduk($data,$id,$upload_data){
				$array = array(
					'id_kategori' => $data['id_kategori'],
					'nama_produk' =>$data['nama_produk'],
					'harga_produk' => $data['harga_produk'],
					'deskripsi_produk' =>$data['deskripsi_produk'],
					'id_penjual' => $this->session->userdata('idUser'),
					'tanggal_produk' => date('Y-m-d H:i:s')

				);

				if($upload_data!=false){
					$array['gambar_produk'] = 'asset/gambar/produk/'.$upload_data['file_name'];
				}
				$this->db->where('id_produk',$id);
				$this->db->update('produk',$array);
				return 1;
			}
			// function getKategori($id){
			// 	$result = $this->mod->getDataWhere('kategori','id_kategori',$id);
			// 	if($result['parent_kategori'] == 0){
			// 		$this->db->where('id_kategori',$id);
			// 	    $query = $this->db->get('kategori');
			// 	}
			// 	else{
			// 		$sql = "select fm_kategori.*,table_kategori.nama_kategori as nama_parent
			// 		FROM
			// 		fm_kategori
			// 		JOIN (select * from fm_kategori) as table_kategori ON fm_kategori.id_parent = table_kategori.id_kategori
			// 		";
			// 		$query = $this->db->query($sql);
			// 	}
			// 	if($query->num_rows()>0){
			// 	    return $query->row_array();
			// 	}
			// 	else return FALSE;
			// }
			function getKategori($id) {


				$this->db->order_by('id_kategori','ASC');
				$this->db->where('id_kategori',$id);
				$query = $this->db->get('kategori');
				if($query->num_rows()>0){
					return $query->row_array();
				}
				else return FALSE;
			}
	function fetchProdukKategori($limit,$start,$pagenumber,$id) {

			if($pagenumber!="")
				$this->db->limit($limit,($pagenumber*$limit)-$limit);
			else
				$this->db->limit($limit,$start);

			$this->db->where('id_kategori',$id);
			$this->db->order_by('tanggal_produk','DESC');
			$query = $this->db->get('produk');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;
		}
		 function getProdukDesain($id_user,$date){
  	$this->db->where('id_pembeli',$id_user);
  	$this->db->where('tanggal_desain',$date);
  	$query = $this->db->get('desain_produk');
  	if($query->num_rows()>0){
  		return $query->row_array();
  	}
  	else return false;
  }

  function saveFurnitureImpian($data,$upload_data,$cpt,$cpt2){
  	$date = date('Y-m-d H:i:s');
  	$array = array(
        'judul_desain' => $data['nama'],
        'bahan_desain' => $data['bahan'], // tidak ada bahann
        'finishing_desain' => $data['finishing'], // tidak ada finishing
        'deskripsi_desain' =>($data['deskripsi']),
        'tanggal_desain' => $date,
        'ditenderkan' => $data['ditenderkan'],
        'id_pembeli' => $this->session->userdata('idUser')
      );
    $this->db->insert('desain_produk',$array);

    $desain = $this->getProdukDesain($this->session->userdata('idUser'),$date,$upload_data);
    if($desain!=FALSE){
		    for($i=0; $i<$cpt; $i++){
						$array = array(
								'id_desain_produk' => $desain['id_desain_produk'],
								'jenis_desain' => 0
							);
						$array['url_desain_produk'] = $this->session->userdata('path_file'.$i);
						$this->db->insert('gambar_desain',$array);
						$this->session->set_userdata(array('path_file'.$i =>NULL));
		    } // end for
		    for($i=0; $i<$cpt2; $i++){
					$array = array(
							'id_desain_produk' => $desain['id_desain_produk'],
							'jenis_desain' => 1
						);
					$array['url_desain_produk'] = $this->session->userdata('path_file2'.$i);
					$this->db->insert('gambar_desain',$array);
					$this->session->set_userdata(array('path_file2'.$i =>NULL));
	    	} // end for
		} // end if $desain
    return $desain['id_desain_produk'];
  }
  function fetchDesainProduk($limit,$start,$pagenumber,$id_user){
	if($pagenumber!="")
				$this->db->limit($limit,($pagenumber*$limit)-$limit);
			else
				$this->db->limit($limit,$start);

			$this->db->where('id_pembeli',$id_user);
			$this->db->order_by('tanggal_desain','DESC');
			$query = $this->db->get('desain_produk');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;  	
  }
  function countTender($id_user){
  	$this->db->join('desain_produk','desain_produk.id_desain_produk = tender_desain.id_desain_produk');
  	$this->db->where('id_pembeli',$id_user);
  	return $this->db->count_all_results('tender_desain');
  }
  function fetchTender($limit,$start,$pagenumber,$id_user){
  	if($pagenumber!="")
				$this->db->limit($limit,($pagenumber*$limit)-$limit);
			else
				$this->db->limit($limit,$start);
			$this->db->join('desain_produk','desain_produk.id_desain_produk = tender_desain.id_desain_produk');
			$this->db->where('id_pembeli',$id_user);
			$this->db->order_by('tanggal_desain','DESC');
			$query = $this->db->get('tender_desain');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;  
  }
  function getTender($id){
		$this->db->join('desain_produk','desain_produk.id_desain_produk = tender_desain.id_desain_produk');
		$this->db->where('id_tender_desain',$id);
		$query = $this->db->get('tender_desain');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else return FALSE;  
  }
  function saveTender($data,$id){
  	$array = array(
  			'id_desain_produk' => $id,
  			'tanggal_selesai_tender' => date('Y-m-d',strtotime($data['tanggal_selesai_tender'])),
  			'range_harga' => $data['range_harga'],
  			'status_tender' => 0
  		);
  	$this->db->insert('tender_desain',$array);
  	return 1;
  }
  function countTenderPenjual($id){
  	$this->db->where('id_tender',$id);
  	return $this->db->count_all_results('tender_penjual');
  }
  function fetchTenderPenjual($limit,$start,$pagenumber,$id){
  	if($pagenumber!="")
				$this->db->limit($limit,($pagenumber*$limit)-$limit);
			else
				$this->db->limit($limit,$start);
			$this->db->join('user','user.id_user = tender_penjual.id_penjual');
			$this->db->where('id_tender',$id);
			$this->db->order_by('tanggal_tender_penjual','DESC');
			$query = $this->db->get('tender_penjual');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;  
  }
  function fetchAllTender($limit,$start,$pagenumber){
  	if($pagenumber!="")
				$this->db->limit($limit,($pagenumber*$limit)-$limit);
			else
				$this->db->limit($limit,$start);
			$this->db->join('desain_produk','desain_produk.id_desain_produk = tender_desain.id_desain_produk');
			$this->db->join('user','user.id_user = desain_produk.id_pembeli');
			$this->db->order_by('tanggal_selesai_tender','DESC');
			$query = $this->db->get('tender_desain');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;  
  }
  function saveFurnitureImpianNext($data,$id){
  	$result = $this->mod->getDataWhere('user','username',$data['username']);

  	$array = array(
  			'id_penjual' => $result['id_user']
  		);
  	$this->db->where('id_desain_produk',$id);
	$this->db->update('desain_produk',$array);
	return 1;
  }
  function updateCart($data){
  	$this->load->library('cart');
		foreach ($this->cart->contents() as $items) {
			$array = array(
					'rowid' => $items['rowid'],
					'qty' => $data['qty_'.$items['id']]
				);
			$this->cart->update($array);
		}
	}
	function pesananTerakhir($id_user){
		$this->db->where('id_user',$id_user);
		$this->db->order_by('tanggal_pesan','DESC');
		$query = $this->db->get('pesanan');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else return FALSE;
	}
	function pesanan($data){
		$this->load->library('cart');
		$array = array(
				'jumlah_barang' => $this->cart->total_items(),
				'total' => $this->cart->total(),
				'id_user' => $this->session->userdata('idUser'),
				'id_pembayaran' => $data['id_pembayaran'],
				'nama_lengkap' => $data['nama_lengkap'],
				'email' => $data['email'],
				'no_hp' => $data['no_hp'],
				'alamat' => $data['alamat'],
				'status_pesanan' => 0,
				'tanggal_pesan' => date('Y-m-d H:i:s')
			);
		$this->db->insert('pesanan',$array);

		$pesanan = $this->pesananTerakhir($this->session->userdata('idUser'));
		foreach ($this->cart->contents() as $items) {
			$array2 = array(
					'id_pesanan' => $pesanan['id_pesanan'],
					'id_produk' => $items['id'],
					'nama_produk' => $items['name'],
					'gambar_produk' => $items['image'],
					'harga_beli' => $items['price'],
					'qty' => $items['qty']
				);
			$this->db->insert('detail_pesanan',$array2);
		}
		$this->cart->destroy();
		return 1;
	}
	function fetchPesanan($limit,$start,$pagenumber,$id){
		if($pagenumber!="")
				$this->db->limit($limit,($pagenumber*$limit)-$limit);
			else
				$this->db->limit($limit,$start);
			$this->db->where('id_user',$id);
			$this->db->order_by('tanggal_pesan','DESC');
			$query = $this->db->get('pesanan');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;  
	}
	function fetchDetailPesanan($id){
		$this->db->where('id_pesanan',$id);
			$query = $this->db->get('detail_pesanan');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;  	
	}
	function totalPesanan($id_pesanan){
		$select = "select sum(jumlah_barang) as total_item from fm_pesanan where id_pesanan = ".$id_pesanan;
		$query = $this->db->query($select);
		$data = $query->row_array();
		if($query->num_rows()>0)
			return $data['total_item'];
		else return 0;
	}
 }
 

?>
