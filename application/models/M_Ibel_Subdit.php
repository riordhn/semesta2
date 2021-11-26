<?php  
class M_Ibel_Subdit extends CI_Model{ 
	private $table = 'izin_belajar';

	public function getIbel(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, s.STATUS_SL, s.LOKASI_DATA from biodata b, izin_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl"); 
		return $q->result();
	} 

	public function getIbel_Id($id_ibel){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, s.STATUS_SL, s.LOKASI_DATA from biodata b, izin_belajar t,  status_studilanjut s where (t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl) AND t.ID_IB='".$id_ibel."'");
		return $q->result();
	}

	public function getBiodatadanIbel($id_ibel){
		$q=$this->db->query("SELECT t.*, b.*, j.*, f.*
		FROM izin_belajar t 
		JOIN biodata b ON t.NIK = b.NIK 
		JOIN jenjang_pendidikan j ON t.ID_JENJANG = j.ID_JENJANG
		JOIN upload_file_ib f ON f.ID_IB = t.ID_IB 
		WHERE t.ID_IB='".$id_ibel."' AND f.ID_JENIS='70'");
		return $q->result();
	}

	public function bio($idtub){
		$q=$this->db->query("Select b.NAMA, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR from biodata b, izin_belajar t where t.NIK=b.NIK and t.ID_IB='".$idtub."'");
		return $q->result();
	}

	public function bioL($idtub){
		$q=$this->db->query("SELECT biodata.* , izin_belajar.*  FROM biodata JOIN izin_belajar ON biodata.NIK = izin_belajar.NIK WHERE izin_belajar.ID_IB='".$idtub."'"); 
		return $q->result();
	}


	public function getFile($id){
		$q=$this->db->query("Select * from upload_file_ib where ID_IB='".$id."'");
		return $q->result();
	}

	public function getStatusIb($id){
		$q=$this->db->query("Select ID_STATUS_SL, ID_IB from izin_belajar where ID_IB='".$id."'");
		return $q->result();
	}

	public function updateFileIB(){
		$post= $this->input->post();
		if($post['STATUS_FILE_IB']==null){
			$status=2;
		}else{
			$status=$post['STATUS_FILE_IB'];
		}
		$q=$this->db->query("UPDATE upload_file_ib SET STATUS_FILE_IB='".$status."', KETERANGAN_REVISI_IB='".$post['memo']."' WHERE ID_UP_FILE_IB='".$post['ID_UP_FILE_IB']."'");
	}

	public function getIbelDiterima(){
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, s.STATUS_SL from biodata b, izin_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_STATUS_SL='3'"); 
		return $q->result(); //harusnya status == 3 , karena diterima
	}

	public function getLaporan(){
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, s.STATUS_SL from biodata b, pengaktifan_ib t,  status_studilanjut s, izin_belajar i where i.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_STATUS_SL='12' and t.ID_IB = i.ID_IB"); 
		return $q->result(); //harusnya status == 3 , karena diterima
	}

	public function penerimaanIbel(){
		$post= $this->input->post();
		$q=$this->db->query("UPDATE izin_belajar SET ID_STATUS_SL='".$post['status_ib']."' WHERE ID_IB='".$post['ID_ibels']."'");
		if($post['status_ib']==3){
				$createMon=$this->db->query("INSERT INTO monitoring_ib (ID_MONITORING_IB, ID_IB, TOTAL_SEMESTER, SEMESTER_SEKARANG) VALUES ('','".$post['ID_ibels']."', '6', '1'); ");
		}
	}

	public function updateSL7($tb){
		$q=$this->db->query("UPDATE izin_belajar SET ID_STATUS_SL='7' WHERE ID_IB='".$tb."'");
	}

	public function getIbel12(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, s.STATUS_SL, s.LOKASI_DATA from biodata b, izin_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_status_sl='12'"); 
		return $q->result();
	} 

	//pembaruan 17-6-21
	public function cekFile($sl){
		$q=$this->db->query("SELECT COUNT(ID_UP_FILE_IB) as NUM FROM upload_file_ib WHERE ID_IB='".$sl."' and STATUS_FILE_IB IN ('1','2')"); 
		return $q->result();
	}

} 