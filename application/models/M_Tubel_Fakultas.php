<?php  
class M_Tubel_Fakultas extends CI_Model{ 
	private $table = 'tugas_belajar';

	public function getTubel(){  
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("Select t.*, b.NAMA, b.STATUS_PEGAWAI,b.PANGKAT_GOLONGAN, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, tugas_belajar t, status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and b.UNIT_KERJA='$unit' and t.ID_status_sl=1"); 
		return $q->result();
	}

	public function getTubel2($id){  		
		$q=$this->db->query("Select t.*, b.*, s.STATUS_SL, s.LOKASI_DATA, n.NAMA_NEGARA, j.NAMA_JENJANG from biodata b, tugas_belajar t, status_studilanjut s, negara n, jenjang_pendidikan j where t.ID_TUBEL='$id' and t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_NEGARA=n.ID_NEGARA and t.ID_JENJANG=j.ID_JENJANG"); 
		return $q->result();
	}

	public function getTubelall(){  
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("Select t.*, b.NAMA,b.STATUS_PEGAWAI,b.PANGKAT_GOLONGAN, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, tugas_belajar t, status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and b.UNIT_KERJA='$unit'"); 
		return $q->result();
	}

	public function getPerpanjanganall(){  
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("Select t.*, b.NAMA,b.STATUS_PEGAWAI,b.PANGKAT_GOLONGAN, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, tugas_belajar t, status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and b.UNIT_KERJA='$unit'"); 
		return $q->result();
	}

	public function getPengaktifanall(){  
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("Select t.*, b.NAMA,b.STATUS_PEGAWAI,b.PANGKAT_GOLONGAN, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, tugas_belajar t, status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and b.UNIT_KERJA='$unit'"); 
		return $q->result();
	}

	public function getFile($id){
		$q=$this->db->query("Select * from upload_file_tubel where ID_TUBEL='".$id."'");
		return $q->result();
	}

	public function getNik($id){
		$q=$this->db->query("Select id_tubel, NIK from tugas_belajar where ID_TUBEL='".$id."'");
		return $q->result();
	}

	public function update_status($id){
		$q=$this->db->query("UPDATE tugas_belajar SET ID_STATUS_SL='2' WHERE ID_TUBEL='".$id."'");
	}

	public function getSetneg(){
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL from biodata b, tugas_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_STATUS_SL IN (6,7)"); 
		return $q->result();
	}

	public function getPerpanjangan(){
		$query=$this->db->query("Select p.*,b.nama, t.id_tubel from perpanjangan p, biodata b, tugas_belajar t where p.id_tubel=t.id_tubel and b.nik=t.nik and p.ID_STATUS_SL ='1'");

		return $query->result();
	}

	public function getFilePer($id){
		$query=$this->db->query("Select * from upload_file_perpanjangan where id_perpanjangan='$id' and ID_JENIS IN (26,27,28,29,30)");

		return $query->result();
	}

	public function getFilePerpanjangan(){
		$unit=$this->session->userdata('fak');
		$query=$this->db->query("Select DISTINCT p.*, b.nama, t.id_tubel, s.status_sl,
			(Select ID_UP_FILE_PJG from upload_file_perpanjangan f where f.id_perpanjangan=p.id_perpanjangan and ID_JENIS=26) AS FILE_A,
			(Select ID_UP_FILE_PJG from upload_file_perpanjangan f where f.id_perpanjangan=p.id_perpanjangan and ID_JENIS=27) AS FILE_B,
			(Select ID_UP_FILE_PJG from upload_file_perpanjangan f where f.id_perpanjangan=p.id_perpanjangan and ID_JENIS=28) AS FILE_C,
			(Select ID_UP_FILE_PJG from upload_file_perpanjangan f where f.id_perpanjangan=p.id_perpanjangan and ID_JENIS=29) AS FILE_D,
			(Select ID_UP_FILE_PJG from upload_file_perpanjangan f where f.id_perpanjangan=p.id_perpanjangan and ID_JENIS=30) AS FILE_E 
		 from upload_file_perpanjangan f, perpanjangan p, biodata b, tugas_belajar t, status_studilanjut s where p.ID_status_sl=s.ID_status_sl and p.id_tubel=t.id_tubel and b.nik=t.nik and f.id_perpanjangan=p.id_perpanjangan and p.ID_STATUS_SL ='1' and b.UNIT_KERJA='$unit'");

		return $query->result();
	}

	public function getFilePengaktifan(){
		$unit=$this->session->userdata('fak');
		$query=$this->db->query("Select DISTINCT p.*, b.nama, t.id_tubel, s.status_sl,
			(Select ID_UP_FILE_AKT from upload_file_pengaktifan f where f.id_pengaktifan=p.id_pengaktifan and ID_JENIS=33) AS FILE_A,
			(Select ID_UP_FILE_AKT from upload_file_pengaktifan f where f.id_pengaktifan=p.id_pengaktifan and ID_JENIS=34) AS FILE_B
		 	from upload_file_pengaktifan f, pengaktifan_kembali p, biodata b, tugas_belajar t, status_studilanjut s where p.ID_status_sl=s.ID_status_sl and p.id_tubel=t.id_tubel and b.nik=t.nik and f.id_pengaktifan=p.id_pengaktifan and p.ID_STATUS_SL ='1' and b.UNIT_KERJA='$unit'"); 

		return $query->result();
	}

	public function fileTubelditangguhkan()
	{
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("SELECT b.*, u.*, t.NIK FROM biodata b, upload_file_tubel u, tugas_belajar t WHERE t.NIK=b.NIK and b.UNIT_KERJA='$unit' and u.STATUS_FILE_TUBEL=1 and u.ID_JENIS IN (1,2,3,6,9,11,12,13,62,63,64, 4,15,16,17,18,19,5,7,10,65,67);");
		return $q->result();
	}

	public function filePanjangditangguhkan()
	{
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("SELECT t.*, b.*, l.NIK, u.* FROM biodata b, upload_file_perpanjangan u, perpanjangan t, tugas_belajar l WHERE l.NIK=b.NIK and b.UNIT_KERJA='$unit' and l.ID_TUBEL=t.ID_TUBEL and u.STATUS_FILE_PERPANJANGAN=1 and u.ID_JENIS IN (30,56,57,68);");
		return $q->result();
	}

	public function fileAktifditangguhkan()
	{
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("SELECT t.*, b.*, l.NIK, u.* FROM biodata b, upload_file_pengaktifan u, pengaktifan_kembali t, tugas_belajar l WHERE l.NIK=b.NIK and b.UNIT_KERJA='$unit' and l.ID_TUBEL=t.ID_TUBEL and u.STATUS_FILE_PENGAKTIFAN=1 and u.ID_JENIS IN (35,66,37, 69);");
		return $q->result();
	}

	public function updateStatusSL($id){
		$q=$this->db->query("UPDATE tugas_belajar SET ID_STATUS_SL='2' WHERE ID_TUBEL='".$id."'");
	}

	public function hitungDash($sl){
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("SELECT COUNT(t.ID_TUBEL)  as NUM FROM tugas_belajar t, biodata b WHERE t.NIK = b.NIK and t.ID_STATUS_SL='".$sl."' and b.UNIT_KERJA='$unit'"); 
		return $q->result();
	}
	public function hitungpp(){
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("SELECT COUNT(p.ID_PERPANJANGAN) as NUM, b.UNIT_KERJA as one, t.ID_TUBEL FROM perpanjangan p , tugas_belajar t, biodata b  WHERE p.ID_STATUS_SL IN (1) and p.ID_TUBEL=t.ID_TUBEL and t.NIK=b.NIK and b.UNIT_KERJA='$unit'"); 
		return $q->result();
	}
	public function hitungpk(){
		$unit=$this->session->userdata('fak');
		$q=$this->db->query("SELECT COUNT(p.ID_PENGAKTIFAN) as NUM, b.UNIT_KERJA as one, t.ID_TUBEL FROM pengaktifan_kembali p, tugas_belajar t, biodata b WHERE p.ID_STATUS_SL IN (1) and p.ID_TUBEL=t.ID_TUBEL and t.NIK=b.NIK and b.UNIT_KERJA='$unit'"); 
		return $q->result();
	}

	public function hitungDashSDM(){
		$q=$this->db->query("SELECT COUNT(ID_TUBEL) as NUM FROM tugas_belajar WHERE ID_STATUS_SL IN (2,3,6,10)"); 
		return $q->result();
	}
} 