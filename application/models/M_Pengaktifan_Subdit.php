<?php  
class M_Pengaktifan_Subdit extends CI_Model{ 

	private $table = 'upload_file_pengaktifan';
 
	public function getPengaktifan(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.NIK, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, pengaktifan_kembali t,  tugas_belajar a, status_studilanjut s where a.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and a.ID_TUBEL = t.ID_TUBEL;"); 
		return $q->result();
	}

	public function bio($idtub){
		$q=$this->db->query("Select b.NAMA, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR from biodata b, tugas_belajar t, pengaktifan_kembali p where t.NIK=b.NIK and t.ID_TUBEL=p.ID_TUBEL AND p.ID_PENGAKTIFAN='".$idtub."'"); 
		return $q->result();
	}

	public function bioL($idtub){
		$q=$this->db->query("SELECT biodata.* , tugas_belajar.* , pengaktifan_kembali.*, negara.NAMA_NEGARA FROM tugas_belajar JOIN biodata ON biodata.NIK = tugas_belajar.NIK JOIN pengaktifan_kembali ON tugas_belajar.ID_TUBEL = pengaktifan_kembali.ID_TUBEL JOIN negara ON tugas_belajar.ID_NEGARA = negara.ID_NEGARA WHERE pengaktifan_kembali.ID_PENGAKTIFAN='".$idtub."'"); 
		return $q->result();
	}


	public function getTubelStatusSL($sl){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, tugas_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_status_sl='".$sl."'"); 
		return $q->result();
	}

	public function getTubelSDM(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, tugas_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_status_sl in (2,3,6,10)"); 
		return $q->result();
	}

	public function getFile($idp){
		$q=$this->db->query("Select * from upload_file_pengaktifan where ID_PENGAKTIFAN='".$idp."'");
		return $q->result();
	}
	public function updateFilePengaktifan(){
		$post= $this->input->post();
		if($post['STATUS_FILE_PENGAKTIFAN']==null){
			$status=2;
		}else{
			$status=$post['STATUS_FILE_PENGAKTIFAN'];
		}
		$q=$this->db->query("UPDATE upload_file_pengaktifan SET STATUS_FILE_PENGAKTIFAN='".$status."', KETERANGAN_REVISI_PENGAKTIFAN='".$post['memo']."' WHERE ID_UP_FILE_AKT='".$post['ID_UP_FILE_AKT']."'");
	}

	public function penerimaanPengaktifan(){
		$post= $this->input->post();
		$q=$this->db->query("UPDATE pengaktifan_kembali SET ID_STATUS_SL='".$post['status_pengaktifan']."' WHERE ID_PENGAKTIFAN='".$post['ID_PENGAKTIFAN']."'");
	}

	public function getStatusP($id){
		$q=$this->db->query("Select ID_STATUS_SL, ID_PENGAKTIFAN, ID_TUBEL from pengaktifan_kembali where ID_PENGAKTIFAN='".$id."'");
		return $q->result();
	}

	public function getPengaktifanDiterima(){
		$q=$this->db->query("SELECT tugas_belajar.*, pengaktifan_kembali.*, biodata.NAMA, biodata.UNIT_KERJA, biodata.PANGKAT_GOLONGAN, biodata.STATUS_PEGAWAI, biodata.JENIS_KEPEGAWAIAN, biodata.TEMPAT_LAHIR, biodata.TGL_LAHIR, status_studilanjut.STATUS_SL, status_studilanjut.LOKASI_DATA FROM biodata, tugas_belajar, status_studilanjut, pengaktifan_kembali where biodata.NIK = tugas_belajar.NIK and pengaktifan_kembali.ID_TUBEL=tugas_belajar.ID_TUBEL and status_studilanjut.ID_STATUS_SL = pengaktifan_kembali.ID_STATUS_SL and pengaktifan_kembali.ID_STATUS_SL='3'"); 
		return $q->result(); //harusnya status == 3 , karena diterima
	}

	public function updateSL5($tb){
		$q=$this->db->query("UPDATE perpanjangan SET ID_STATUS_SL='5' WHERE ID_PERPANJANGAN='".$tb."'");
	}

	public function updateSL10($tb){
		$q=$this->db->query("UPDATE perpanjangan SET ID_STATUS_SL='10' WHERE ID_PERPANJANGAN='".$tb."'");
	}

	public function getSetneg(){
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL from biodata b, tugas_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_STATUS_SL='6'"); 
		return $q->result();
	}

	public function getTubelSSL6(){
		$q=$this->db->query("SELECT tugas_belajar.*, perpanjangan.*, biodata.NAMA, biodata.UNIT_KERJA, biodata.PANGKAT_GOLONGAN, biodata.STATUS_PEGAWAI, biodata.JENIS_KEPEGAWAIAN, biodata.TEMPAT_LAHIR, biodata.TGL_LAHIR, status_studilanjut.STATUS_SL, status_studilanjut.LOKASI_DATA FROM biodata, tugas_belajar, status_studilanjut, perpanjangan where biodata.NIK = tugas_belajar.NIK and perpanjangan.ID_TUBEL=tugas_belajar.ID_TUBEL and status_studilanjut.ID_STATUS_SL = perpanjangan.ID_STATUS_SL and perpanjangan.ID_STATUS_SL IN (6,10)"); 
		return $q->result();
	}

	public function updateSL7($tb){
		$q=$this->db->query("UPDATE pengaktifan_kembali SET ID_STATUS_SL='7' WHERE ID_PENGAKTIFAN='".$tb."'");
		//$createMon=$this->db->query("INSERT INTO monitoring (ID_MONITORING, ID_TUBEL, TOTAL_SEMESTER, SEMESTER_SEKARANG, TAMBAHAN_SEMESTER) VALUES ('','".$tb."', '6', '1', '0'); ");
	}

	public function saveSPPK($upload){
	 
	 $this->ID_UP_FILE_AKT = $upload['file_name'];
	 $this->ID_PENGAKTIFAN = $upload['id_pengaktifan'];
	 $this->ID_JENIS = $upload['jenis_file'];
	 $this->NAMA_FILE_AKT = $upload['nama_file'];
	 $this->TIPE_FILE = $upload['file_type'];
	 $this->STATUS_FILE_PENGAKTIFAN = '0';
	 $this->KETERANGAN_REVISI_PENGAKTIFAN= '';
    
    $this->db->insert($this->table, $this);

  	}

  	public function getPengaktifan7(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.NIK, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, pengaktifan_kembali t,  tugas_belajar a, status_studilanjut s where a.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and a.ID_TUBEL = t.ID_TUBEL and t.ID_status_sl='7';"); 
		return $q->result();
	}

	//pembaruan 17-6-21
	public function cekFile($sl){
		$q=$this->db->query("SELECT COUNT(ID_UP_FILE_AKT) as NUM FROM upload_file_pengaktifan WHERE ID_PENGAKTIFAN='".$sl."' and STATUS_FILE_PENGAKTIFAN IN ('1','2')"); 
		return $q->result();
	} 

	public function getFileLama($sl){
		$q=$this->db->query("Select * from upload_file_tubel where ID_TUBEL='".$sl."' AND ID_JENIS IN (10,15,16,17,18,22,25,65)");
		return $q->result();
	}

	//proses pengaktifan
	public function getPengaktifanPros(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.NIK, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA, (SELECT COUNT(ID_UP_FILE_AKT) FROM upload_file_pengaktifan WHERE ID_PENGAKTIFAN=t.ID_PENGAKTIFAN and STATUS_FILE_PENGAKTIFAN=1) as NUM, (SELECT COUNT(ID_UP_FILE_AKT) FROM upload_file_pengaktifan WHERE ID_PENGAKTIFAN=t.ID_PENGAKTIFAN and STATUS_FILE_PENGAKTIFAN=2) as CEK from biodata b, pengaktifan_kembali t,  tugas_belajar a, status_studilanjut s where a.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and a.ID_TUBEL = t.ID_TUBEL and t.ID_status_sl!=7;"); 
		return $q->result();
	}

} 