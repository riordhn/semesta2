<?php  
class M_Dosen extends CI_Model{ 
	private $table = 'biodata';

	public function getAuth($id){  
		$query=$this->db->query("SELECT * FROM biodata WHERE NIK='$id' LIMIT 1");
		return $query;
	}

	public function getBiodata(){  
		$id=$this->session->userdata('NIK');
		$q=$this->db->query("Select * from biodata where NIK='$id'"); 
		return $q->result();
	}

	public function getKota(){  
		$q=$this->db->query("Select * from kota"); 
		return $q->result();
	}

	public function getNegara(){   
		return $this->db->order_by('NAMA_NEGARA', 'asc')->get('negara')->result();  
	} 

	public function getJenjang(){   
		return $this->db->get('jenjang_pendidikan')->result();  
	}

	public function getUnitKer(){  
		$q=$this->db->query("Select * from fakultas"); 
		return $q->result();
	}	


} 