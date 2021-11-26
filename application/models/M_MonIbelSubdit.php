<?php  
class M_MonIbelSubdit extends CI_Model{ 

	public function getMonitoring(){  
		$q=$this->db->query("SELECT biodata.NAMA, izin_belajar.ID_IB, izin_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring_ib.ID_MONITORING_IB as a , monitoring_ib.SEMESTER_SEKARANG, date_format(izin_belajar.MULAI_IB,'%d/%m/%Y') as MULAI_IB, date_format(izin_belajar.SELESAI_IB,'%d/%m/%Y') as SELESAI_IB, (SELECT MAX(aktivitas_studi_ib.PRESENTASE_KELULUSAN) FROM aktivitas_studi_ib JOIN monitoring_ib on aktivitas_studi_ib.ID_MONITORING_IB = monitoring_ib.ID_MONITORING_IB WHERE aktivitas_studi_ib.ID_MONITORING_IB=a ORDER BY aktivitas_studi_ib.ID_AKTIVITAS_IB) PROGRES_DISERTASI FROM izin_belajar JOIN biodata ON izin_belajar.NIK = biodata.NIK JOIN monitoring_ib ON monitoring_ib.ID_IB = izin_belajar.ID_IB"); 
		return $q->result();
	}

	public function getMonitoring7(){  
		$q=$this->db->query("SELECT biodata.NAMA, izin_belajar.ID_IB, izin_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring_ib.ID_MONITORING_IB as a , monitoring_ib.SEMESTER_SEKARANG, date_format(izin_belajar.MULAI_IB,'%d/%m/%Y') as MULAI_IB, date_format(izin_belajar.SELESAI_IB,'%d/%m/%Y') as SELESAI_IB, (SELECT MAX(aktivitas_studi_ib.PRESENTASE_KELULUSAN) FROM aktivitas_studi_ib JOIN monitoring_ib on aktivitas_studi_ib.ID_MONITORING_IB = monitoring_ib.ID_MONITORING_IB WHERE aktivitas_studi_ib.ID_MONITORING_IB=a ORDER BY aktivitas_studi_ib.ID_AKTIVITAS_IB) PROGRES_DISERTASI FROM izin_belajar JOIN biodata ON izin_belajar.NIK = biodata.NIK JOIN monitoring_ib ON monitoring_ib.ID_IB = izin_belajar.ID_IB WHERE monitoring_ib.SEMESTER_SEKARANG>=7"); 
		return $q->result();
	}

	public function getMonitoringSmt($smt){  
		$q=$this->db->query("SELECT biodata.NAMA, izin_belajar.ID_IB, izin_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring_ib.ID_MONITORING_IB as a , monitoring_ib.SEMESTER_SEKARANG, date_format(izin_belajar.MULAI_IB,'%d/%m/%Y') as MULAI_IB, date_format(izin_belajar.SELESAI_IB,'%d/%m/%Y') as SELESAI_IB, (SELECT MAX(aktivitas_studi_ib.PRESENTASE_KELULUSAN) FROM aktivitas_studi_ib JOIN monitoring_ib on aktivitas_studi_ib.ID_MONITORING_IB = monitoring_ib.ID_MONITORING_IB WHERE aktivitas_studi_ib.ID_MONITORING_IB=a ORDER BY aktivitas_studi_ib.ID_AKTIVITAS_IB) PROGRES_DISERTASI FROM izin_belajar JOIN biodata ON izin_belajar.NIK = biodata.NIK JOIN monitoring_ib ON monitoring_ib.ID_IB = izin_belajar.ID_IB WHERE monitoring_ib.SEMESTER_SEKARANG='".$smt."'"); 
		return $q->result();
	}

	public function getMonitoringTh(){  
		$q=$this->db->query("SELECT biodata.NAMA, izin_belajar.ID_IB, izin_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring_ib.ID_MONITORING_IB as a , monitoring_ib.SEMESTER_SEKARANG, date_format(izin_belajar.MULAI_IB,'%d/%m/%Y') as MULAI_IB, date_format(izin_belajar.SELESAI_IB,'%d/%m/%Y') as SELESAI_IB, (SELECT MAX(aktivitas_studi_ib.PRESENTASE_KELULUSAN) FROM aktivitas_studi_ib JOIN monitoring_ib on aktivitas_studi_ib.ID_MONITORING_IB = monitoring_ib.ID_MONITORING_IB WHERE aktivitas_studi_ib.ID_MONITORING_IB=a ORDER BY aktivitas_studi_ib.ID_AKTIVITAS_IB) PROGRES_DISERTASI FROM izin_belajar JOIN biodata ON izin_belajar.NIK = biodata.NIK JOIN monitoring_ib ON monitoring_ib.ID_IB = izin_belajar.ID_IB WHERE year(izin_belajar.SELESAI_IB)='".date('Y')."'"); 
		return $q->result();
	}

	public function getMonitoringIndi(){  
		$q=$this->db->query("SELECT biodata.NAMA, izin_belajar.ID_IB, izin_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring_ib.ID_MONITORING_IB as a , monitoring_ib.SEMESTER_SEKARANG, date_format(izin_belajar.MULAI_IB,'%d/%m/%Y') as MULAI_IB, date_format(izin_belajar.SELESAI_IB,'%d/%m/%Y') as SELESAI_IB, (SELECT MAX(aktivitas_studi_ib.PRESENTASE_KELULUSAN) FROM aktivitas_studi_ib JOIN monitoring_ib on aktivitas_studi_ib.ID_MONITORING_IB = monitoring_ib.ID_MONITORING_IB WHERE aktivitas_studi_ib.ID_MONITORING_IB=a ORDER BY aktivitas_studi_ib.ID_AKTIVITAS_IB) PROGRES_DISERTASI FROM izin_belajar JOIN biodata ON izin_belajar.NIK = biodata.NIK JOIN monitoring_ib ON monitoring_ib.ID_IB = izin_belajar.ID_IB WHERE aktivitas_studi_ib.PRESENTASE_KELULUSAN >= '90'"); 
		return $q->result();
	}

	public function getMonitoringLulus(){  
		$q=$this->db->query("SELECT DISTINCT(biodata.NAMA), pengaktifan_ib.ID_PENGAKTIFAN_IB, izin_belajar.ID_IB, izin_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring_IB.ID_MONITORING_IB as a , monitoring_ib.SEMESTER_SEKARANG, date_format(izin_belajar.MULAI_IB,'%d/%m/%Y') as MULAI_IB, date_format(izin_belajar.SELESAI_IB,'%d/%m/%Y') as SELESAI_IB, (SELECT MAX(aktivitas_studi_ib.PRESENTASE_KELULUSAN) FROM aktivitas_studi_ib JOIN monitoring_ib on aktivitas_studi_ib.ID_MONITORING_IB = monitoring_ib.ID_MONITORING_IB WHERE aktivitas_studi_ib.ID_MONITORING_IB=a ORDER BY aktivitas_studi_ib.ID_AKTIVITAS_IB) PROGRES_DISERTASI FROM izin_belajar JOIN biodata ON izin_belajar.NIK = biodata.NIK JOIN monitoring_ib ON monitoring_ib.ID_IB = izin_belajar.ID_IB  JOIN aktivitas_studi_ib on aktivitas_studi_ib.ID_MONITORING_IB = monitoring_ib.ID_MONITORING_IB JOIN pengaktifan_ib ON izin_belajar.ID_IB = pengaktifan_ib.ID_IB"); 
		return $q->result();
	}



	public function getDet($idmon){  
		$q=$this->db->query("SELECT biodata.NAMA, izin_belajar.ID_IB, izin_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring_ib.ID_MONITORING_IB , monitoring_ib.SEMESTER_SEKARANG
			FROM izin_belajar
			JOIN biodata ON izin_belajar.NIK = biodata.NIK
			JOIN monitoring_ib ON monitoring_ib.ID_IB = izin_belajar.ID_IB
			WHERE monitoring_ib.ID_MONITORING_IB = '".$idmon."'");
		return $q->result();
	}

	public function getTarget($idmon){  
		$q=$this->db->query("Select * from syarat_kelulusan_ib where ID_MONITORING_IB='".$idmon."'"); 
		return $q->result();
	}


	public function getAktivitas($idmon){  
		$q=$this->db->query("Select * from aktivitas_studi_ib where ID_MONITORING_IB='".$idmon."'"); 
		return $q->result();
	}

	public function getPublikasi($idmon){  
		$q=$this->db->query("Select * from publikasi_ib where ID_MONITORING_IB='".$idmon."'"); 
		return $q->result();
	}

	public function getPenghargaan($idmon){  
		$q=$this->db->query("Select * from penghargaan_ib where ID_MONITORING_IB='".$idmon."'"); 
		return $q->result();
	}

	public function getSeminar($idmon){  
		$q=$this->db->query("Select * from seminar_pelatihan_ib where ID_MONITORING_IB='".$idmon."' AND JENIS_KEGIATAN='0'"); 
		return $q->result();
	}

	public function getPelatihan($idmon){  
		$q=$this->db->query("Select * from seminar_pelatihan_ib where ID_MONITORING_IB='".$idmon."' AND JENIS_KEGIATAN='1'"); 
		return $q->result();
	}

	public function hitungPerSMT($smt){
		$q=$this->db->query("SELECT COUNT(ID_MONITORING_IB) as NUM FROM monitoring_ib WHERE SEMESTER_SEKARANG='".$smt."'"); 
		return $q->result();
	}

	public function hitungSmt7(){
		$q=$this->db->query("SELECT COUNT(ID_MONITORING_IB) as NUM FROM monitoring_ib WHERE SEMESTER_SEKARANG>=7"); 
		return $q->result();
	}

	public function hitungSemua(){
		$q=$this->db->query("SELECT COUNT(ID_MONITORING_IB) as NUM FROM monitoring_ib"); 
		return $q->result();
	}

	public function hitung80(){
		$q=$this->db->query("SELECT COUNT(DISTINCT aktivitas_studi_ib.ID_MONITORING_IB) as NUM FROM monitoring_ib JOIN aktivitas_studi_ib ON monitoring_ib.ID_MONITORING_IB=aktivitas_studi_ib.ID_MONITORING_IB where aktivitas_studi_ib.PRESENTASE_KELULUSAN >= 90"); 
		return $q->result();
	}

	public function hitungTarget($th){
		$q=$this->db->query("SELECT COUNT(ID_IB) as NUM FROM izin_belajar WHERE year(SELESAI_IB) = '".$th."'"); 
		return $q->result();
	}

	public function hitungLulus(){
		$q=$this->db->query("SELECT COUNT(ID_PENGAKTIFAN_IB) as NUM FROM pengaktifan_ib"); 
		return $q->result();
	}

	public function dataExcel(){
		$q=$this->db->query("SELECT biodata.NAMA, izin_belajar.ID_IB, izin_belajar.PERGURUAN_TINGGI_PENYELENGGARA, monitoring_ib.ID_MONITORING_IB as a ,  monitoring_ib.SEMESTER_SEKARANG, date_format(izin_belajar.MULAI_IB,'%d/%m/%Y') as MULAI_IB, date_format(izin_belajar.SELESAI_IB,'%d/%m/%Y') as SELESAI_IB, (SELECT MAX(aktivitas_studi_ib.PRESENTASE_KELULUSAN) FROM aktivitas_studi_ib JOIN monitoring_ib on aktivitas_studi_ib.ID_MONITORING_IB = monitoring_ib.ID_MONITORING_IB WHERE aktivitas_studi_ib.ID_MONITORING_IB=a ORDER BY aktivitas_studi_ib.ID_AKTIVITAS_IB) PROGRES_DISERTASI, date_format((SELECT izin_belajar.MULAI_IB + INTERVAL 6 MONTH),'%d/%m/%Y') as PENGALIHAN_TUNJANGAN  FROM izin_belajar JOIN biodata ON izin_belajar.NIK = biodata.NIK  JOIN monitoring_ib ON monitoring_ib.ID_IB = izin_belajar.ID_IB");
		return $q->result();
	}

	//update monitoring baru, 14 Juni 2021

	public function getSekarang($idmon){  
		$q=$this->db->query("Select * from monitoring_ib where ID_MONITORING_IB='".$idmon."'"); 
		return $q->result();
	}

	public function getTA($idmon){  
		$q=$this->db->query("Select * from tugas_akhir_ib where ID_MONITORING_IB='".$idmon."'"); 
		return $q->result();
	}

	public function getTOEFL($idmon){  
		$q=$this->db->query("Select * from toefl_ib where ID_MONITORING_IB='".$idmon."'"); 
		return $q->result();
	}

	public function dataExcelNew1(){
		$q=$this->db->query("SELECT biodata.NAMA, izin_belajar.ID_IB, izin_belajar.PERGURUAN_TINGGI_PENYELENGGARA, monitoring_ib.ID_MONITORING_IB as a ,  monitoring_ib.SEMESTER_SEKARANG, date_format(izin_belajar.MULAI_IB,'%d/%m/%Y') as MULAI_IB, date_format(izin_belajar.SELESAI_IB,'%d/%m/%Y') as SELESAI_IB, (SELECT MAX(aktivitas_studi_ib.PRESENTASE_KELULUSAN) FROM aktivitas_studi_ib JOIN monitoring_ib on aktivitas_studi_ib.ID_MONITORING_IB = monitoring_ib.ID_MONITORING_IB WHERE aktivitas_studi_ib.ID_MONITORING_IB=a ORDER BY aktivitas_studi_ib.ID_AKTIVITAS_IB) PROGRES_DISERTASI, date_format((SELECT izin_belajar.MULAI_IB + INTERVAL 6 MONTH),'%d/%m/%Y') as PENGALIHAN_TUNJANGAN  FROM izin_belajar JOIN biodata ON izin_belajar.NIK = biodata.NIK  JOIN monitoring_ib ON monitoring_ib.ID_IB = izin_belajar.ID_IB");
		return $q->result();
	}

	//query excel baru, 19-8-21
	public function dataExcelNew(){
		$q=$this->db->query("SELECT biodata.NAMA, izin_belajar.ID_IB, izin_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring_ib.ID_MONITORING_IB as MON, monitoring_ib.SEMESTER_SEKARANG, date_format(izin_belajar.MULAI_IB,'%d/%m/%Y') as MULAI_IB, date_format(izin_belajar.SELESAI_IB,'%d/%m/%Y') as SELESAI_IB,  x.SEMESTER as SMT_ST, x.DOSBING_1, x.DOSBING_2, x.TOPIK_JUDUL_DISERTASI, x.PRESENTASE_DISERTASI, x.PRESENTASE_KELULUSAN, x.PENJELASAN_KEMAJUAN_STUDI, x.LANGKAH_KONKRIT_SMT_DEPAN, y.UJIAN_PROPOSAL, y.TGL_UJIAN_PROPOSAL, y.TGL_RENCANA_UP, y.SEMINAR_AKHIR, y.KATEGORI_SA, y.TGL_SA, y.SEMESTER as SMT_SA, y.TGL_RENCANA_SA, y.PENILAIAN_PLAGIASI, y.HASIL, y.TGL_TES, y.TGL_RENCANA, z.SEMESTER as SMT_P, z.SUDAH_BELUM, z.KATEGORI_PUBLIKASI, z.NAMA_PUBLIKASI, z.TGL_SUBMIT, z.PROGRESS_JURNAL, z.TGL_RENCANA as TGL_PUB
			FROM izin_belajar 
			JOIN biodata ON izin_belajar.NIK = biodata.NIK   
			JOIN monitoring_ib ON monitoring_ib.ID_IB = izin_belajar.ID_IB 
			LEFT JOIN ( select * from aktivitas_studi_ib WHERE ID_AKTIVITAS_IB IN (SELECT MAX(ID_AKTIVITAS_IB) FROM aktivitas_studi_ib GROUP BY ID_MONITORING_IB) ) x on monitoring_ib.ID_MONITORING_IB=x.ID_MONITORING_IB
			LEFT JOIN ( select * from tugas_akhir_ib WHERE ID_TUGAS IN (SELECT MAX(ID_TUGAS) FROM tugas_akhir_ib GROUP BY ID_MONITORING_IB)) y on monitoring_ib.ID_MONITORING_IB=y.ID_MONITORING_IB
			LEFT JOIN ( select * from publikasi_ib  WHERE ID_PUBLIKASI_IB IN (SELECT MAX(ID_PUBLIKASI_IB) FROM publikasi_ib GROUP BY ID_MONITORING_IB)) z on monitoring_ib.ID_MONITORING_IB=z.ID_MONITORING_IB");
		return $q->result();
	}

} 

?>