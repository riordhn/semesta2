<?php  
class M_Ibel_Fakultas extends CI_Model{ 
	private $table = 'tugas_belajar';

	public function getIbel(){
		$unit=$this->session->userdata('fak');  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, izin_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_status_sl=1 and b.UNIT_KERJA='$unit'"); 
		return $q->result();
	}

	public function getLaporan(){  
		$q=$this->db->query("Select t.*,p.*, b.NAMA, b.STATUS_PEGAWAI, b.PANGKAT_GOLONGAN, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA, j.NAMA_JENJANG from biodata b, izin_belajar t, jenjang_pendidikan j, pengaktifan_ib p, status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_JENJANG=j.ID_JENJANG and p.ID_status_sl=12 and p.ID_IB=t.ID_IB"); 
		return $q->result();
	}
	

	public function getFile($id){
		$q=$this->db->query("Select * from upload_file_ib where ID_IB='".$id."'");
		return $q->result();
	}

	public function getNik($id){
		$q=$this->db->query("Select id_ib, NIK from izin_belajar where ID_IB='".$id."'");
		return $q->result();
	}

	public function update_status($id){
		$q=$this->db->query("UPDATE izin_belajar SET ID_STATUS_SL='2' WHERE ID_IB='".$id."'");
	}

	public function hitungDashIB($sl){
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("SELECT COUNT(t.ID_IB)  as NUM FROM izin_belajar t, biodata b WHERE t.NIK = b.NIK and t.ID_STATUS_SL='".$sl."' and b.UNIT_KERJA='$unit'"); 
		return $q->result();
	}
	
	public function hitungDashSDMIB(){
		$q=$this->db->query("SELECT COUNT(ID_IB) as NUM FROM izin_belajar WHERE ID_STATUS_SL IN (2,3,6,10)"); 
		return $q->result();
	}

	public function fileIbelditangguhkan()
	{
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("SELECT b.*, u.*, t.NIK FROM biodata b, upload_file_ib u, izin_belajar t WHERE t.NIK=b.NIK and b.UNIT_KERJA='$unit' and u.STATUS_FILE_IB=1 and u.ID_JENIS IN (46,49,50,51,52,70);");
		return $q->result();
	}
} 