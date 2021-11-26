<?php  
class M_age extends CI_Model{ 

	private $table = 'upload_file_perpanjangan';

	public function getUsulanSetneg(){  
			$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL from biodata b, tugas_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_status_sl='5'"); 
			return $q->result();
		}

	public function updateSL6($tb){
			$q=$this->db->query("UPDATE tugas_belajar SET ID_STATUS_SL='6' WHERE ID_TUBEL='".$tb."'");
		}

	public function hitungSetnegSelesai(){
		$q=$this->db->query("SELECT COUNT(ID_UP_FILE_T) as NUM FROM upload_file_tubel WHERE id_jenis='21'"); 
		return $q->result();
	}

	public function hitungSetnegBaru(){
		$q=$this->db->query("SELECT COUNT(ID_TUBEL) as NUM FROM tugas_belajar WHERE ID_status_sl='5'"); 
		return $q->result();
	}

	public function riwayat(){
		$q=$this->db->query("SELECT  DISTINCT(tugas_belajar.ID_TUBEL) as x, tugas_belajar.*, biodata.NAMA, biodata.UNIT_KERJA, biodata.PANGKAT_GOLONGAN, biodata.STATUS_PEGAWAI, biodata.JENIS_KEPEGAWAIAN, biodata.TEMPAT_LAHIR, biodata.TGL_LAHIR, status_studilanjut.STATUS_SL, status_studilanjut.LOKASI_DATA, (
		    select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel 
			JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
		    where upload_file_tubel.ID_JENIS=21 and upload_file_tubel.ID_TUBEL=x )as A, 
		    ( select upload_file_perpanjangan.ID_UP_FILE_PJG FROM upload_file_perpanjangan 
			JOIN perpanjangan ON upload_file_perpanjangan.ID_PERPANJANGAN = perpanjangan.ID_PERPANJANGAN
		   JOIN tugas_belajar ON perpanjangan.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_perpanjangan.ID_JENIS=32 and tugas_belajar.ID_TUBEL=x) as B FROM tugas_belajar join biodata on biodata.NIK = tugas_belajar.NIK join status_studilanjut on status_studilanjut.ID_STATUS_SL = tugas_belajar.ID_STATUS_SL where tugas_belajar.ID_STATUS_SL in (7,6) and tugas_belajar.LOKASI_TUBEL=1");
		return $q->result();
	}

	public function getUsulanPerpanjanganSetneg(){  
			$q=$this->db->query("SELECT tugas_belajar.*, perpanjangan.*, biodata.NAMA, biodata.UNIT_KERJA, biodata.PANGKAT_GOLONGAN, biodata.STATUS_PEGAWAI, biodata.JENIS_KEPEGAWAIAN, biodata.TEMPAT_LAHIR, biodata.TGL_LAHIR, status_studilanjut.STATUS_SL, status_studilanjut.LOKASI_DATA FROM biodata, tugas_belajar, status_studilanjut, perpanjangan where biodata.NIK = tugas_belajar.NIK and perpanjangan.ID_TUBEL=tugas_belajar.ID_TUBEL and status_studilanjut.ID_STATUS_SL = perpanjangan.ID_STATUS_SL and perpanjangan.ID_STATUS_SL='5'"); 
			return $q->result();
		}

	public function saveSPSTB($upload){
	 
	 $this->ID_UP_FILE_PJG = $upload['file_name'];
	 $this->ID_PERPANJANGAN = $upload['id_perpanjangan'];
	 $this->ID_JENIS = $upload['jenis_file'];
	 $this->NAMA_FILE_PJG = $upload['nama_file'];
	 $this->TIPE_FILE = $upload['file_type'];
	 $this->STATUS_FILE_PERPANJANGAN = '0';
	 $this->TGL_SURAT = $upload['tgl_surat'];
	 $this->NOMOR_SURAT = $upload['nomor_surat'];
    
    $this->db->insert($this->table, $this);

  	}

  	public function updateSL6P($tb){
			$q=$this->db->query("UPDATE perpanjangan SET ID_STATUS_SL='6' WHERE ID_PERPANJANGAN='".$tb."'");
		}

	public function hitungSetnegSelesaiP(){
		$q=$this->db->query("SELECT COUNT(ID_UP_FILE_PJG) as NUM FROM upload_file_perpanjangan WHERE id_jenis='32'"); 
		return $q->result();
	}

	public function hitungSetnegBaruP(){
		$q=$this->db->query("SELECT COUNT(ID_PERPANJANGAN) as NUM FROM perpanjangan WHERE ID_status_sl='5'"); 
		return $q->result();
	}

	public function saveSPerpanjanganSetneg($upload){
	 
	 $this->ID_UP_FILE_PJG = $upload['file_name'];
	 $this->ID_PERPANJANGAN = $upload['id_perpanjangan'];
	 $this->ID_JENIS = $upload['jenis_file'];
	 $this->NAMA_FILE_PJG = $upload['nama_file'];
	 $this->TIPE_FILE = $upload['file_type'];
	 $this->STATUS_FILE_PERPANJANGAN = '0';
    
    $this->db->insert($this->table, $this);

  	}

} 

?>