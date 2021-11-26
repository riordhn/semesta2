<?php  
class M_MonSubdit extends CI_Model{ 

	public function getMonitoring(){  
		$q=$this->db->query("SELECT biodata.NAMA, tugas_belajar.ID_TUBEL, tugas_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring.ID_MONITORING as a , monitoring.SEMESTER_SEKARANG, date_format(tugas_belajar.MULAI_TUBEL,'%d/%m/%Y') as MULAI_TUBEL, date_format(tugas_belajar.SELESAI_TUBEL,'%d/%m/%Y') as SELESAI_TUBEL, (SELECT MAX(aktivitas_studi.PRESENTASE_KELULUSAN) FROM aktivitas_studi JOIN monitoring on aktivitas_studi.ID_MONITORING = monitoring.ID_MONITORING WHERE aktivitas_studi.ID_MONITORING=a ORDER BY aktivitas_studi.ID_AKTIVITAS) PROGRES_DISERTASI,  date_format(perpanjangan.MULAI_PERPANJANGAN,'%d/%m/%Y') as MULAI_PERPANJANGAN,  date_format(perpanjangan.SELESAI_PERPANJANGAN,'%d/%m/%Y') as SELESAI_PERPANJANGAN FROM tugas_belajar JOIN biodata ON tugas_belajar.NIK = biodata.NIK LEFT OUTER JOIN perpanjangan on tugas_belajar.ID_TUBEL = perpanjangan.ID_TUBEL JOIN monitoring ON monitoring.ID_TUBEL = tugas_belajar.ID_TUBEL"); 
		return $q->result();
	}

	public function getMonitoring7(){  
		$q=$this->db->query("SELECT biodata.NAMA, tugas_belajar.ID_TUBEL, tugas_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring.ID_MONITORING as a , monitoring.SEMESTER_SEKARANG, date_format(tugas_belajar.MULAI_TUBEL,'%d/%m/%Y') as MULAI_TUBEL, date_format(tugas_belajar.SELESAI_TUBEL,'%d/%m/%Y') as SELESAI_TUBEL, (SELECT MAX(aktivitas_studi.PRESENTASE_KELULUSAN) FROM aktivitas_studi JOIN monitoring on aktivitas_studi.ID_MONITORING = monitoring.ID_MONITORING WHERE aktivitas_studi.ID_MONITORING=a ORDER BY aktivitas_studi.ID_AKTIVITAS) PROGRES_DISERTASI,  date_format(perpanjangan.MULAI_PERPANJANGAN,'%d/%m/%Y') as MULAI_PERPANJANGAN,  date_format(perpanjangan.SELESAI_PERPANJANGAN,'%d/%m/%Y') as SELESAI_PERPANJANGAN FROM tugas_belajar JOIN biodata ON tugas_belajar.NIK = biodata.NIK LEFT OUTER JOIN perpanjangan on tugas_belajar.ID_TUBEL = perpanjangan.ID_TUBEL JOIN monitoring ON monitoring.ID_TUBEL = tugas_belajar.ID_TUBEL WHERE monitoring.SEMESTER_SEKARANG>=7"); 
		return $q->result();
	}

	public function getMonitoringSmt($smt){  
		$q=$this->db->query("SELECT biodata.NAMA, tugas_belajar.ID_TUBEL, tugas_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring.ID_MONITORING as a , monitoring.SEMESTER_SEKARANG, date_format(tugas_belajar.MULAI_TUBEL,'%d/%m/%Y') as MULAI_TUBEL, date_format(tugas_belajar.SELESAI_TUBEL,'%d/%m/%Y') as SELESAI_TUBEL, (SELECT MAX(aktivitas_studi.PRESENTASE_KELULUSAN) FROM aktivitas_studi JOIN monitoring on aktivitas_studi.ID_MONITORING = monitoring.ID_MONITORING WHERE aktivitas_studi.ID_MONITORING=a ORDER BY aktivitas_studi.ID_AKTIVITAS) PROGRES_DISERTASI,  date_format(perpanjangan.MULAI_PERPANJANGAN,'%d/%m/%Y') as MULAI_PERPANJANGAN,  date_format(perpanjangan.SELESAI_PERPANJANGAN,'%d/%m/%Y') as SELESAI_PERPANJANGAN FROM tugas_belajar JOIN biodata ON tugas_belajar.NIK = biodata.NIK LEFT OUTER JOIN perpanjangan on tugas_belajar.ID_TUBEL = perpanjangan.ID_TUBEL JOIN monitoring ON monitoring.ID_TUBEL = tugas_belajar.ID_TUBEL WHERE monitoring.SEMESTER_SEKARANG='".$smt."'"); 
		return $q->result();
	}

	public function getMonitoringTh(){  
		$q=$this->db->query("SELECT biodata.NAMA, tugas_belajar.ID_TUBEL, tugas_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring.ID_MONITORING as a , monitoring.SEMESTER_SEKARANG, date_format(tugas_belajar.MULAI_TUBEL,'%d/%m/%Y') as MULAI_TUBEL, date_format(tugas_belajar.SELESAI_TUBEL,'%d/%m/%Y') as SELESAI_TUBEL, (SELECT MAX(aktivitas_studi.PRESENTASE_KELULUSAN) FROM aktivitas_studi JOIN monitoring on aktivitas_studi.ID_MONITORING = monitoring.ID_MONITORING WHERE aktivitas_studi.ID_MONITORING=a ORDER BY aktivitas_studi.ID_AKTIVITAS) PROGRES_DISERTASI,  date_format(perpanjangan.MULAI_PERPANJANGAN,'%d/%m/%Y') as MULAI_PERPANJANGAN,  date_format(perpanjangan.SELESAI_PERPANJANGAN,'%d/%m/%Y') as SELESAI_PERPANJANGAN FROM tugas_belajar JOIN biodata ON tugas_belajar.NIK = biodata.NIK LEFT OUTER JOIN perpanjangan on tugas_belajar.ID_TUBEL = perpanjangan.ID_TUBEL JOIN monitoring ON monitoring.ID_TUBEL = tugas_belajar.ID_TUBEL WHERE year(tugas_belajar.SELESAI_TUBEL)='".date('Y')."'"); 
		return $q->result();
	}

	public function getMonitoringIndi(){  
		$q=$this->db->query("SELECT biodata.NAMA, tugas_belajar.ID_TUBEL, tugas_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring.ID_MONITORING as a , monitoring.SEMESTER_SEKARANG, date_format(tugas_belajar.MULAI_TUBEL,'%d/%m/%Y') as MULAI_TUBEL, date_format(tugas_belajar.SELESAI_TUBEL,'%d/%m/%Y') as SELESAI_TUBEL, (SELECT MAX(aktivitas_studi.PRESENTASE_KELULUSAN) FROM aktivitas_studi JOIN monitoring on aktivitas_studi.ID_MONITORING = monitoring.ID_MONITORING WHERE aktivitas_studi.ID_MONITORING=a ORDER BY aktivitas_studi.ID_AKTIVITAS) PROGRES_DISERTASI,  date_format(perpanjangan.MULAI_PERPANJANGAN,'%d/%m/%Y') as MULAI_PERPANJANGAN,  date_format(perpanjangan.SELESAI_PERPANJANGAN,'%d/%m/%Y') as SELESAI_PERPANJANGAN FROM tugas_belajar JOIN biodata ON tugas_belajar.NIK = biodata.NIK LEFT OUTER JOIN perpanjangan on tugas_belajar.ID_TUBEL = perpanjangan.ID_TUBEL JOIN monitoring ON monitoring.ID_TUBEL = tugas_belajar.ID_TUBEL JOIN aktivitas_studi on aktivitas_studi.ID_MONITORING = monitoring.ID_MONITORING WHERE aktivitas_studi.PRESENTASE_KELULUSAN >= '90'"); 
		return $q->result();
	}

	public function getMonitoringLulus(){  
		$q=$this->db->query("SELECT DISTINCT(biodata.NAMA), pengaktifan_kembali.ID_PENGAKTIFAN, tugas_belajar.ID_TUBEL, tugas_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring.ID_MONITORING as a, monitoring.SEMESTER_SEKARANG, date_format(tugas_belajar.MULAI_TUBEL,'%d/%m/%Y') as MULAI_TUBEL, date_format(tugas_belajar.SELESAI_TUBEL,'%d/%m/%Y') as SELESAI_TUBEL, (SELECT MAX(aktivitas_studi.PRESENTASE_KELULUSAN) FROM aktivitas_studi JOIN monitoring on aktivitas_studi.ID_MONITORING = monitoring.ID_MONITORING WHERE aktivitas_studi.ID_MONITORING=a ORDER BY aktivitas_studi.ID_AKTIVITAS) PROGRES_DISERTASI FROM tugas_belajar JOIN biodata ON tugas_belajar.NIK = biodata.NIK JOIN monitoring ON monitoring.ID_TUBEL = tugas_belajar.ID_TUBEL  JOIN aktivitas_studi on aktivitas_studi.ID_MONITORING = monitoring.ID_MONITORING JOIN pengaktifan_kembali ON tugas_belajar.ID_TUBEL = pengaktifan_kembali.ID_TUBEL"); 
		return $q->result();
	}

	public function getDet($idmon){  
		$q=$this->db->query("SELECT biodata.NAMA, tugas_belajar.ID_TUBEL, tugas_belajar.PERGURUAN_TINGGI_PENYELENGGARA , monitoring.ID_MONITORING , monitoring.SEMESTER_SEKARANG
			FROM tugas_belajar
			JOIN biodata ON tugas_belajar.NIK = biodata.NIK
			JOIN monitoring ON monitoring.ID_TUBEL = tugas_belajar.ID_TUBEL
			WHERE monitoring.ID_MONITORING = '".$idmon."'");
		return $q->result();
	}

	public function getTarget($idmon){  
		$q=$this->db->query("Select * from syarat_kelulusan where ID_MONITORING='".$idmon."'"); 
		return $q->result();
	}


	public function getAktivitas($idmon){  
		$q=$this->db->query("Select * from aktivitas_studi where ID_MONITORING='".$idmon."'"); 
		return $q->result();
	}

	public function getPublikasi($idmon){  
		$q=$this->db->query("Select * from publikasi where ID_MONITORING='".$idmon."'"); 
		return $q->result();
	}

	public function getPenghargaan($idmon){  
		$q=$this->db->query("Select * from penghargaan where ID_MONITORING='".$idmon."'"); 
		return $q->result();
	}

	public function getSeminar($idmon){  
		$q=$this->db->query("Select * from seminar_pelatihan where ID_MONITORING='".$idmon."' AND JENIS_KEGIATAN='0'"); 
		return $q->result();
	}

	public function getPelatihan($idmon){  
		$q=$this->db->query("Select * from seminar_pelatihan where ID_MONITORING='".$idmon."' AND JENIS_KEGIATAN='1'"); 
		return $q->result();
	}

	public function hitungPerSMT($smt){
		$q=$this->db->query("SELECT COUNT(ID_MONITORING) as NUM FROM monitoring WHERE SEMESTER_SEKARANG='".$smt."'"); 
		return $q->result();
	}

	public function hitungSmt7(){
		$q=$this->db->query("SELECT COUNT(ID_MONITORING) as NUM FROM monitoring WHERE SEMESTER_SEKARANG>=7"); 
		return $q->result();
	}

	public function hitungSemua(){
		$q=$this->db->query("SELECT COUNT(ID_MONITORING) as NUM FROM monitoring"); 
		return $q->result();
	}

	public function hitung80(){
		$q=$this->db->query("SELECT COUNT(DISTINCT aktivitas_studi.ID_MONITORING) as NUM FROM monitoring JOIN aktivitas_studi ON monitoring.ID_MONITORING=aktivitas_studi.ID_MONITORING where aktivitas_studi.PRESENTASE_KELULUSAN >= 90"); 
		return $q->result();
	}

	public function hitungTarget($th){
		$q=$this->db->query("SELECT COUNT(ID_TUBEL) as NUM FROM tugas_belajar WHERE year(SELESAI_TUBEL) = '".$th."'"); 
		return $q->result();
	}

	public function hitungLulus(){
		$q=$this->db->query("SELECT COUNT(ID_PENGAKTIFAN) as NUM FROM pengaktifan_kembali"); 
		return $q->result();
	}

	public function dataExcel(){
		$q=$this->db->query("SELECT biodata.NAMA, tugas_belajar.ID_TUBEL, negara.NAMA_NEGARA, tugas_belajar.PERGURUAN_TINGGI_PENYELENGGARA , tugas_belajar.LOKASI_TUBEL, monitoring.ID_MONITORING as a , monitoring.SEMESTER_SEKARANG, date_format(tugas_belajar.MULAI_TUBEL,'%d/%m/%Y') as MULAI_TUBEL, date_format(tugas_belajar.SELESAI_TUBEL,'%d/%m/%Y') as SELESAI_TUBEL, (SELECT MAX(aktivitas_studi.PRESENTASE_KELULUSAN) FROM aktivitas_studi JOIN monitoring on aktivitas_studi.ID_MONITORING = monitoring.ID_MONITORING WHERE aktivitas_studi.ID_MONITORING=a ORDER BY aktivitas_studi.ID_AKTIVITAS) PROGRES_DISERTASI,  date_format(perpanjangan.MULAI_PERPANJANGAN,'%d/%m/%Y') as MULAI_PERPANJANGAN,  date_format(perpanjangan.SELESAI_PERPANJANGAN,'%d/%m/%Y') as SELESAI_PERPANJANGAN, date_format((SELECT tugas_belajar.MULAI_TUBEL + INTERVAL 6 MONTH),'%d/%m/%Y') as PENGALIHAN_TUNJANGAN FROM tugas_belajar JOIN biodata ON tugas_belajar.NIK = biodata.NIK  JOIN perpanjangan on tugas_belajar.ID_TUBEL = perpanjangan.ID_TUBEL JOIN monitoring ON monitoring.ID_TUBEL = tugas_belajar.ID_TUBEL JOIN negara ON negara.ID_NEGARA = tugas_belajar.ID_NEGARA");
		return $q->result();
	}

	//query excel baru, 19-8-21
	public function dataExcelNew(){
		$q=$this->db->query("SELECT biodata.NAMA, tugas_belajar.ID_TUBEL, negara.NAMA_NEGARA, tugas_belajar.PERGURUAN_TINGGI_PENYELENGGARA , tugas_belajar.LOKASI_TUBEL, monitoring.ID_MONITORING as MON, monitoring.SEMESTER_SEKARANG, date_format(tugas_belajar.MULAI_TUBEL,'%d/%m/%Y') as MULAI_TUBEL, date_format(tugas_belajar.SELESAI_TUBEL,'%d/%m/%Y') as SELESAI_TUBEL,  date_format(perpanjangan.MULAI_PERPANJANGAN,'%d/%m/%Y') as MULAI_PERPANJANGAN,  date_format(perpanjangan.SELESAI_PERPANJANGAN,'%d/%m/%Y') as SELESAI_PERPANJANGAN, x.SEMESTER as SMT_ST, x.DOSBING_1, x.DOSBING_2, x.TOPIK_JUDUL_DISERTASI, x.PRESENTASE_DISERTASI, x.PRESENTASE_KELULUSAN, x.PENJELASAN_KEMAJUAN_STUDI, x.LANGKAH_KONKRIT_SMT_DEPAN, y.UJIAN_PROPOSAL, y.TGL_UJIAN_PROPOSAL, y.TGL_RENCANA_UP, y.SEMINAR_AKHIR, y.KATEGORI_SA, y.TGL_SA, y.SEMESTER as SMT_SA, y.TGL_RENCANA_SA, y.PENILAIAN_PLAGIASI, y.HASIL, y.TGL_TES, y.TGL_RENCANA, z.SEMESTER as SMT_P, z.SUDAH_BELUM, z.KATEGORI_PUBLIKASI, z.NAMA_PUBLIKASI, z.TGL_SUBMIT, z.PROGRESS_JURNAL, z.TGL_RENCANA as TGL_PUB
			FROM tugas_belajar 
			JOIN biodata ON tugas_belajar.NIK = biodata.NIK  
			LEFT JOIN perpanjangan on tugas_belajar.ID_TUBEL = perpanjangan.ID_TUBEL 
			JOIN monitoring ON monitoring.ID_TUBEL = tugas_belajar.ID_TUBEL 
			JOIN negara ON negara.ID_NEGARA = tugas_belajar.ID_NEGARA
			LEFT JOIN ( select * from aktivitas_studi WHERE ID_AKTIVITAS IN (SELECT MAX(ID_AKTIVITAS) FROM aktivitas_studi GROUP BY ID_MONITORING) ) x on monitoring.ID_MONITORING=x.ID_MONITORING
			LEFT JOIN ( select * from tugas_akhir WHERE ID_TUGAS IN (SELECT MAX(ID_TUGAS) FROM tugas_akhir GROUP BY ID_MONITORING)) y on monitoring.ID_MONITORING=y.ID_MONITORING
			LEFT JOIN ( select * from publikasi  WHERE ID_PUBLIKASI IN (SELECT MAX(ID_PUBLIKASI) FROM publikasi GROUP BY ID_MONITORING)) z on monitoring.ID_MONITORING=z.ID_MONITORING");
		return $q->result();
	}

	//update monitoring baru, 14 Juni 2021

	public function getSekarang($idmon){  
		$q=$this->db->query("Select * from monitoring where ID_MONITORING='".$idmon."'"); 
		return $q->result();
	}

	public function getTA($idmon){  
		$q=$this->db->query("Select * from tugas_akhir where ID_MONITORING='".$idmon."'"); 
		return $q->result();
	}

	public function getTOEFL($idmon){  
		$q=$this->db->query("Select * from toefl where ID_MONITORING='".$idmon."'"); 
		return $q->result();
	}





	





} 

?>