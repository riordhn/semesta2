<?php  
class M_Perpanjangan_Subdit extends CI_Model{ 

	private $table = 'upload_file_perpanjangan';
 
	public function getPerpanjangan(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.NIK, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, perpanjangan t,  tugas_belajar a, status_studilanjut s where a.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and a.ID_TUBEL = t.ID_TUBEL;"); 
		return $q->result();
	} 

	public function bio($idtub){
		$q=$this->db->query("Select b.NAMA, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR from biodata b, tugas_belajar t, perpanjangan p where t.NIK=b.NIK and t.ID_TUBEL=p.ID_TUBEL AND p.ID_PERPANJANGAN='".$idtub."'"); 
		return $q->result();
	}

	public function bioL($idtub){
		$q=$this->db->query("SELECT biodata.* , tugas_belajar.* , perpanjangan.*, negara.NAMA_NEGARA  FROM tugas_belajar JOIN biodata ON biodata.NIK = tugas_belajar.NIK JOIN perpanjangan ON tugas_belajar.ID_TUBEL = perpanjangan.ID_TUBEL JOIN negara ON tugas_belajar.ID_NEGARA = negara.ID_NEGARA WHERE perpanjangan.ID_PERPANJANGAN='".$idtub."'"); 
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
		$q=$this->db->query("Select * from upload_file_perpanjangan where ID_PERPANJANGAN='".$idp."'");
		return $q->result();
	}

	public function updateFilePerpanjangan(){
		$post= $this->input->post();
		if($post['STATUS_FILE_PERPANJANGAN']==null){
			$status=2;
		}else{
			$status=$post['STATUS_FILE_PERPANJANGAN'];
		}
		$q=$this->db->query("UPDATE upload_file_perpanjangan SET STATUS_FILE_PERPANJANGAN='".$status."', KETERANGAN_REVISI_PERPANJANGAN='".$post['memo']."' WHERE ID_UP_FILE_PJG='".$post['ID_UP_FILE_PJG']."'");
	}

	public function penerimaanPerpanjangan(){
		$post= $this->input->post();
		$q=$this->db->query("UPDATE perpanjangan SET ID_STATUS_SL='".$post['status_perpanjangan']."' WHERE ID_PERPANJANGAN='".$post['ID_PERPANJANGAN']."'");
		$uppp=$this->db->query("UPDATE monitoring, perpanjangan set monitoring.TOTAL_SEMESTER = monitoring.TOTAL_SEMESTER + perpanjangan.TAMBAHAN_SEMESTER where  monitoring.ID_TUBEL = perpanjangan.ID_TUBEL AND perpanjangan.ID_STATUS_SL=3 AND perpanjangan.ID_TUBEL='".$post['ID_TUBEL']."'");
	}

	public function getStatusP($id){
		$q=$this->db->query("Select ID_STATUS_SL, ID_PERPANJANGAN, ID_TUBEL, TAMBAHAN_SEMESTER from perpanjangan where ID_PERPANJANGAN='".$id."'");
		return $q->result();
	}

	public function getPerpanjanganDiterima(){
		$q=$this->db->query("SELECT tugas_belajar.*, perpanjangan.*, perpanjangan.ID_PERPANJANGAN as z, biodata.NAMA, biodata.UNIT_KERJA, biodata.PANGKAT_GOLONGAN, biodata.STATUS_PEGAWAI, biodata.JENIS_KEPEGAWAIAN, biodata.TEMPAT_LAHIR, biodata.TGL_LAHIR, status_studilanjut.STATUS_SL, status_studilanjut.LOKASI_DATA, (
		    select upload_file_perpanjangan.ID_UP_FILE_PJG FROM upload_file_perpanjangan 
			JOIN perpanjangan ON upload_file_perpanjangan.ID_PERPANJANGAN = perpanjangan.ID_PERPANJANGAN 
		    where upload_file_perpanjangan.ID_JENIS=29 and perpanjangan.ID_PERPANJANGAN = z )as B, 
		    ( select upload_file_perpanjangan.ID_UP_FILE_PJG FROM upload_file_perpanjangan 
			JOIN perpanjangan ON upload_file_perpanjangan.ID_PERPANJANGAN = perpanjangan.ID_PERPANJANGAN 
		    where upload_file_perpanjangan.ID_JENIS=31 and perpanjangan.ID_PERPANJANGAN = z ) as A FROM biodata, tugas_belajar, status_studilanjut, perpanjangan where biodata.NIK = tugas_belajar.NIK and perpanjangan.ID_TUBEL=tugas_belajar.ID_TUBEL and status_studilanjut.ID_STATUS_SL = perpanjangan.ID_STATUS_SL and perpanjangan.ID_STATUS_SL='3'"); 
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
		$q=$this->db->query("UPDATE perpanjangan SET ID_STATUS_SL='7' WHERE ID_PERPANJANGAN='".$tb."'");
		//$createMon=$this->db->query("INSERT INTO monitoring (ID_MONITORING, ID_TUBEL, TOTAL_SEMESTER, SEMESTER_SEKARANG, TAMBAHAN_SEMESTER) VALUES ('','".$tb."', '6', '1', '0'); ");
	}

	public function saveSPP($upload){
	 
	 $this->ID_UP_FILE_PJG = $upload['file_name'];
	 $this->ID_PERPANJANGAN = $upload['id_perpanjangan'];
	 $this->ID_JENIS = $upload['jenis_file'];
	 $this->NAMA_FILE_PJG = $upload['nama_file'];
	 $this->TIPE_FILE = $upload['file_type'];
	 $this->STATUS_FILE_PERPANJANGAN = '0';
	 $this->KETERANGAN_REVISI_PERPANJANGAN= '';
    
    $this->db->insert($this->table, $this);

  	}

  	public function getPerpanjangan7(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.NIK, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, a.TGL_SUBMIT_TB, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, perpanjangan t,  tugas_belajar a, status_studilanjut s where a.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and a.ID_TUBEL = t.ID_TUBEL and t.ID_status_sl='7';"); 
		return $q->result();
	}

	//pembaruan 17-5-21
	public function cekFile($sl){
		$q=$this->db->query("SELECT COUNT(ID_UP_FILE_PJG) as NUM FROM upload_file_perpanjangan WHERE ID_PERPANJANGAN='".$sl."' and STATUS_FILE_PERPANJANGAN IN ('1','2')"); 
		return $q->result();
	}

	public function getFileLama($sl){
		$q=$this->db->query("Select * from upload_file_tubel where ID_TUBEL='".$sl."' AND ID_JENIS IN (10,15,16,17,18,20,22,25)");
		return $q->result();
	}

	//perpanjangan on pross
	public function getPerpanjanganPros(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.NIK, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA, (SELECT COUNT(ID_UP_FILE_PJG) FROM upload_file_perpanjangan WHERE ID_PERPANJANGAN=t.ID_PERPANJANGAN and STATUS_FILE_PERPANJANGAN=1) as NUM, (SELECT COUNT(ID_UP_FILE_PJG) FROM upload_file_perpanjangan WHERE ID_PERPANJANGAN=t.ID_PERPANJANGAN and STATUS_FILE_PERPANJANGAN=2) as CEK from biodata b, perpanjangan t,  tugas_belajar a, status_studilanjut s where a.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and a.ID_TUBEL = t.ID_TUBEL and t.ID_status_sl!=7;"); 
		return $q->result();
	}

	public function getDataPerpanjangan($id_pp){
		$q = $this->db->query("SELECT p.*, t.*, b.*, j.*
		FROM perpanjangan p
		JOIN tugas_belajar t
		ON t.id_tubel = p.id_tubel
		JOIN jenjang_pendidikan j
		ON j.id_jenjang = t.id_jenjang
		JOIN biodata b
		ON t.NIK = b.NIK
		WHERE id_perpanjangan='$id_pp'");  
		return $q->result();
	}

	public function cekSPPSPTB($tub){
		$q=$this->db->query("SELECT COUNT(ID_UP_FILE_PJG) as NUM FROM upload_file_perpanjangan WHERE ID_JENIS IN ('31','29') AND ID_PERPANJANGAN='".$tub."'");
		return $q->result();
	}

} 