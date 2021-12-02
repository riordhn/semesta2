<?php  
class M_Tubel_Subdit extends CI_Model{ 

	private $table = 'tugas_belajar';

	public function getTubel(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, tugas_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl"); 
		return $q->result();
	}

	public function bio($idtub){
		$q=$this->db->query("Select b.NAMA, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR from biodata b, tugas_belajar t where t.NIK=b.NIK and t.ID_TUBEL='".$idtub."'"); 
		return $q->result();
	}

	public function bioL($idtub){
		$q=$this->db->query("SELECT biodata.* , tugas_belajar.*, negara.NAMA_NEGARA FROM biodata JOIN tugas_belajar ON biodata.NIK = tugas_belajar.NIK JOIN negara ON negara.ID_NEGARA=tugas_belajar.ID_NEGARA WHERE tugas_belajar.ID_TUBEL='".$idtub."'"); 
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

	public function getFile($id){
		$q=$this->db->query("Select * from upload_file_tubel where ID_TUBEL='".$id."'");
		return $q->result();
	}
	public function updateFileTB(){
		$post= $this->input->post();
		if($post['STATUS_FILE_TUBEL']==null){
			$status=2;
		}else{
			$status=$post['STATUS_FILE_TUBEL'];
		}
		$q=$this->db->query("UPDATE upload_file_tubel SET STATUS_FILE_TUBEL='".$status."', KETERANGAN_REVISI_TUBEL='".$post['memo']."' WHERE ID_UP_FILE_T='".$post['ID_UP_FILE_T']."'");
	}

	public function penerimaanTubel(){
		$post= $this->input->post();
		$q=$this->db->query("UPDATE tugas_belajar SET ID_STATUS_SL='".$post['status_tub']."' WHERE ID_TUBEL='".$post['ID_tubels']."'");
	}

	public function getStatusTUb($id){
		$q=$this->db->query("Select ID_STATUS_SL, ID_TUBEL from tugas_belajar where ID_TUBEL='".$id."'");
		return $q->result();
	}

	public function getTubelDiterima(){
		$q=$this->db->query("SELECT tugas_belajar.*, tugas_belajar.ID_TUBEL as z, biodata.NAMA, biodata.UNIT_KERJA, biodata.PANGKAT_GOLONGAN, biodata.STATUS_PEGAWAI, biodata.JENIS_KEPEGAWAIAN, biodata.TEMPAT_LAHIR, biodata.TGL_LAHIR, status_studilanjut.STATUS_SL, status_studilanjut.LOKASI_DATA, (
		    select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel 
			JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
		    where upload_file_tubel.ID_JENIS=20 and tugas_belajar.ID_TUBEL = z )as B, 
		    ( select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel 
			JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
		    where upload_file_tubel.ID_JENIS=14 and tugas_belajar.ID_TUBEL = z) as A FROM biodata, tugas_belajar, status_studilanjut where biodata.NIK = tugas_belajar.NIK and status_studilanjut.ID_STATUS_SL = tugas_belajar.ID_STATUS_SL and tugas_belajar.ID_STATUS_SL='3' ORDER BY tugas_belajar.ID_TUBEL DESC;"); 
		return $q->result(); //tampilan up sp dan stb
	}

	public function updateSL5($tb){
		$q=$this->db->query("UPDATE tugas_belajar SET ID_STATUS_SL='5' WHERE ID_TUBEL='".$tb."'");
	}

	public function updateSL10($tb){
		$q=$this->db->query("UPDATE tugas_belajar SET ID_STATUS_SL='10' WHERE ID_TUBEL='".$tb."'");
	}

	public function getSetneg(){
		$q=$this->db->query("SELECT  DISTINCT(tugas_belajar.ID_TUBEL) as x, tugas_belajar.*, biodata.NAMA, biodata.UNIT_KERJA, biodata.PANGKAT_GOLONGAN, biodata.STATUS_PEGAWAI, biodata.JENIS_KEPEGAWAIAN, biodata.TEMPAT_LAHIR, biodata.TGL_LAHIR, status_studilanjut.STATUS_SL, status_studilanjut.LOKASI_DATA, (
		    select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel 
			JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
		    where upload_file_tubel.ID_JENIS=21 and upload_file_tubel.ID_TUBEL=x )as A, 
		    ( select upload_file_perpanjangan.ID_UP_FILE_PJG FROM upload_file_perpanjangan 
			JOIN perpanjangan ON upload_file_perpanjangan.ID_PERPANJANGAN = perpanjangan.ID_PERPANJANGAN
		   JOIN tugas_belajar ON perpanjangan.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_perpanjangan.ID_JENIS=32 and tugas_belajar.ID_TUBEL=x) as B FROM tugas_belajar join biodata on biodata.NIK = tugas_belajar.NIK join status_studilanjut on status_studilanjut.ID_STATUS_SL = tugas_belajar.ID_STATUS_SL where tugas_belajar.ID_STATUS_SL in (7,6) and tugas_belajar.LOKASI_TUBEL=1"); 
		return $q->result(); //tampilan dokumen setneg, setneg + perpanjangan
	}

	public function getTubelSSL6(){
		$q=$this->db->query("SELECT tugas_belajar.*, tugas_belajar.ID_TUBEL as z, biodata.NAMA, biodata.UNIT_KERJA, biodata.PANGKAT_GOLONGAN, biodata.STATUS_PEGAWAI, biodata.JENIS_KEPEGAWAIAN, biodata.TEMPAT_LAHIR, biodata.TGL_LAHIR, status_studilanjut.STATUS_SL, status_studilanjut.LOKASI_DATA, (
		    select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel 
			JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
		    where upload_file_tubel.ID_JENIS=22 and tugas_belajar.ID_TUBEL = z )as A, 
		    ( select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel 
			JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
		    where upload_file_tubel.ID_JENIS=25 and tugas_belajar.ID_TUBEL = z) as B FROM biodata, tugas_belajar, status_studilanjut where biodata.NIK = tugas_belajar.NIK and status_studilanjut.ID_STATUS_SL = tugas_belajar.ID_STATUS_SL and tugas_belajar.ID_STATUS_SL IN (6,10)"); 
		return $q->result(); //tampilan up sk pembebasan
	}

	public function updateSL7($tb){
		$q=$this->db->query("UPDATE tugas_belajar SET ID_STATUS_SL='7' WHERE ID_TUBEL='".$tb."'");
		
	}

	public function hitungDash($sl){
		$q=$this->db->query("SELECT COUNT(ID_TUBEL) as NUM FROM tugas_belajar WHERE ID_STATUS_SL='".$sl."'"); 
		return $q->result();
	}

	public function hitungDashIB($sl){
		$q=$this->db->query("SELECT COUNT(ID_IB) as NUM FROM izin_belajar WHERE ID_STATUS_SL='".$sl."'"); 
		return $q->result();
	}

	public function hitungpp(){
		$q=$this->db->query("SELECT COUNT(ID_PERPANJANGAN) as NUM FROM perpanjangan WHERE ID_STATUS_SL IN (2,3,6,10)"); 
		return $q->result();
	}

	public function hitungpk(){
		$q=$this->db->query("SELECT COUNT(ID_PENGAKTIFAN) as NUM FROM pengaktifan_kembali WHERE ID_STATUS_SL IN (2,3,6,10)"); 
		return $q->result();
	}

	public function hitungDashSDM(){
		$q=$this->db->query("SELECT COUNT(ID_TUBEL) as NUM FROM tugas_belajar WHERE ID_STATUS_SL IN (2,3,6,10)"); 
		return $q->result();
	}

	public function hitungDashSDMIB(){
		$q=$this->db->query("SELECT COUNT(ID_IB) as NUM FROM izin_belajar WHERE ID_STATUS_SL IN (2,3)"); 
		return $q->result();
	}

	public function cekSPSTB($tub){
		$q=$this->db->query("SELECT COUNT(ID_UP_FILE_T) as NUM FROM upload_file_tubel WHERE ID_JENIS IN ('14','20') AND ID_TUBEL='".$tub."'");
		return $q->result();
	}

	public function cekSKP($tub){
		$q=$this->db->query("SELECT COUNT(ID_UP_FILE_T) as NUM FROM upload_file_tubel WHERE ID_JENIS IN ('22','25') AND ID_TUBEL='".$tub."'");
		return $q->result();
	}

	public function getTubel7(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, tugas_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_status_sl='7'"); 
		return $q->result();
	}

	public function getIbelStatusSL($sl){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, izin_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_status_sl='".$sl."'"); 
		return $q->result();
	}

	public function getIbelSDM(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, f.ID_FAKULTAS, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, izin_belajar t,  status_studilanjut s, fakultas f where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and f.id_unit_kerja = b.id_unit_kerja and t.ID_status_sl in (2,3)"); 
		return $q->result();
	}

	//template
	public function getDataSTB($id){
		$q=$this->db->query("Select t.* , b.nama, b.gelar_depan, b.TEMPAT_LAHIR, b.TGL_LAHIR, b.gelar_belakang, b.pangkat_golongan, b.status_pegawai, b.unit_kerja, b.nama_jabatan, b.JENIS_KEPEGAWAIAN, j.NAMA_JENJANG from tugas_belajar t, jenjang_pendidikan j, biodata b where t.id_tubel='$id' and t.ID_JENJANG=j.ID_JENJANG and b.nik=t.nik  order by t.id_tubel desc limit 1;"); 
		return $q->result();
	}

	// public function getDataSKPTB($id){
	// 	$q=$this->db->query("Select t.* , b.nama, b.gelar_depan, b.TEMPAT_LAHIR, b.TGL_LAHIR, b.gelar_belakang, b.pangkat_golongan, b.status_pegawai, b.unit_kerja, b.nama_jabatan, b.JENIS_KEPEGAWAIAN, j.NAMA_JENJANG from tugas_belajar t, jenjang_pendidikan j, biodata b where t.id_tubel='$id' and t.ID_JENJANG=j.ID_JENJANG and b.nik=t.nik  order by t.id_tubel desc limit 1;"); 
	// 	return $q->result();
	// }

	//Start getData SK Perpanjangan Tubel
	public function getDataSKPTB($id){
		$q=$this->db->query("SELECT t.*, j.*, b.*, p.* FROM tugas_belajar t JOIN jenjang_pendidikan j ON t.ID_JENJANG=j.ID_JENJANG JOIN biodata b ON b.nik=t.nik JOIN perpanjangan p ON t.ID_TUBEL=p.ID_TUBEL WHERE t.id_tubel='$id' order by t.id_tubel desc limit 1;");
		return $q->result();
	}
	//End getData SK Perpanjangan Tubel

	//Start getData Perjanjian Perpanjangan
	public function getDataSPP($id){
		$q=$this->db->query("SELECT t.*, j.*, b.*, p.* FROM tugas_belajar t JOIN jenjang_pendidikan j ON t.ID_JENJANG=j.ID_JENJANG JOIN biodata b ON b.nik=t.nik JOIN perpanjangan p ON t.ID_TUBEL=p.ID_TUBEL WHERE t.id_tubel='$id' order by t.id_tubel desc limit 1;");
		return $q->result();
	}
	//End getData Perjanjian Perpanjangan

	//getData SK Pengaktifan

	public function getDataSKPengaktifan2($id){
		$q=$this->db->query("SELECT tb.*,pk.*, j.*, b.*,n.*, fpk.* FROM tugas_belajar tb JOIN pengaktifan_kembali pk ON pk.ID_TUBEL=tb.ID_TUBEL JOIN jenjang_pendidikan j ON tb.ID_JENJANG=j.ID_JENJANG JOIN biodata b ON b.nik=tb.nik JOIN negara n ON tb.ID_NEGARA=n.ID_NEGARA JOIN upload_file_pengaktifan fpk ON fpk.ID_PENGAKTIFAN=pk.ID_PENGAKTIFAN WHERE tb.id_tubel='$id' AND fpk.ID_JENIS='37' order by tb.id_tubel desc limit 1;");
		return $q->result();
	}	
	//end getData SK Pengaktifan

	//pembaruan 17-3-21
	public function cekFile($sl){
		$q=$this->db->query("SELECT COUNT(ID_UP_FILE_T) as NUM FROM upload_file_tubel WHERE ID_TUBEL='".$sl."' and STATUS_FILE_TUBEL IN ('1','2')"); 
		return $q->result();
	}

	//proses tb belum selesai
	public function getTubelPros(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.PANGKAT_GOLONGAN, b.STATUS_PEGAWAI, b.JENIS_KEPEGAWAIAN, b.TEMPAT_LAHIR, b.TGL_LAHIR, t.ID_status_sl, s.STATUS_SL, s.LOKASI_DATA, (SELECT COUNT(ID_UP_FILE_T) FROM upload_file_tubel WHERE ID_TUBEL=t.ID_TUBEL and STATUS_FILE_TUBEL=1) as NUM, (SELECT COUNT(ID_UP_FILE_T) FROM upload_file_tubel WHERE ID_TUBEL=t.ID_TUBEL and STATUS_FILE_TUBEL=2) as CEK from biodata b, tugas_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_status_sl!=7"); 
		return $q->result();
	}

	//create monitoring
	public function createMon($tb){
		$tot_semester=$this->db->query("SELECT jenjang_pendidikan.LAMA_STUDI FROM tugas_belajar join jenjang_pendidikan on tugas_belajar.ID_JENJANG=jenjang_pendidikan.ID_JENJANG WHERE ID_TUBEL='".$tb."'")->result();
		//return $tot_semester;
		$tot= $tot_semester[0]->LAMA_STUDI*2;
		$createMon=$this->db->query("INSERT INTO monitoring (ID_MONITORING, ID_TUBEL, TOTAL_SEMESTER, SEMESTER_SEKARANG) VALUES ('','".$tb."', '".$tot."', '1'); ");
	}

	//tabel register
	public function excelRegister(){  
		$q=$this->db->query("Select t.*, t.mulai_tubel as mul, b.*, (Select mulai_perpanjangan from perpanjangan where ID_TUBEL=t.ID_TUBEL order by id_perpanjangan ASC limit 1) mulai_perpanjangan, (Select tanggal_lulus from pengaktifan_kembali where ID_TUBEL=t.ID_TUBEL order by id_pengaktifan ASC limit 1) tanggal_lulus, j.lama_studi, n.nama_negara from tugas_belajar t join biodata b on t.nik=b.nik join jenjang_pendidikan j on t.ID_JENJANG=j.ID_JENJANG join negara n on t.ID_NEGARA=n.ID_NEGARA"); 
		return $q->result();
	}

	public function excelRegisterIB(){  
		$q=$this->db->query("Select t.*, b.*, (Select tgl_lulus_ib from pengaktifan_ib where ID_IB=t.ID_IB) tanggal_lulus, j.lama_studi from izin_belajar t join biodata b on t.nik=b.nik join jenjang_pendidikan j on t.ID_JENJANG=j.ID_JENJANG "); 
		return $q->result();
	}






} 