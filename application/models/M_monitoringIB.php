<?php  
class M_monitoringIB extends CI_Model{ 
	private $table = 'monitoring_ib';
	private $pk = 'ID_MONITORING_IB';


	public function getIdIb(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select id_tubel from tugas_belajar where NIK = '$iduser' ORDER BY ID_TUBEL DESC LIMIT 1");
		// foreach ($query->result() as $row)
		// {
		// 		echo $row->id_tubel;
		// }
		// die;
		return $query->result();
	}

	public function getIdMon1($id){
		$query=$this->db->query("SELECT * FROM monitoring_ib where ID_MONITORING_IB = '$id'");

		return $query->result();
	}


	public function getTarget()
	{
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select * from syarat_kelulusan_ib where ID_MONITORING_IB=(Select id_monitoring_ib from monitoring_ib where ID_IB = (Select id_ib from izin_belajar where NIK = '$iduser' ORDER BY ID_IB DESC LIMIT 1) ORDER BY ID_MONITORING_IB DESC LIMIT 1) ORDER BY ID_SYARAT_KELULUSAN_IB DESC LIMIT 1");
		// foreach ($query->result() as $row)
		// {
		// 		echo $row->id_tubel;
		// }
		// die;
		return $query->result();
	}

	public function getSemTubel(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select id_ib from izin_belajar where NIK = '$iduser' ORDER BY ID_IB DESC LIMIT 1");

		return $query->result();
	}

	public function getIdMonitor($id){
		$query=$this->db->query("Select * from monitoring_ib where ID_IB = '$id'");

		return $query->result();
	}

	public function cekMonitor(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select * from monitoring_ib where ID_IB = (Select id_ib from izin_belajar where NIK='$iduser')");

		return $query->result();
	}

	public function savePenasihat()
	{
		$post=$this->input->post();
		$idmon = $post['idmonitor'];
		$this->penasehat_akademik = $post['penasihat'];

		$this->db->update($this->table, $this, array('id_monitoring_ib' => $idmon));
	}

	public function saveTarget()
	{
		$post=$this->input->post();
		$idmon = $post['idmonitor'];
		$sks = $post['sks'];
		$publish = $post['publik'];
		$tesis = $post['sksta'];

		$q=$this->db->query("INSERT INTO syarat_kelulusan_ib (ID_SYARAT_KELULUSAN_IB,ID_MONITORING_IB,JUMLAH_SKS,JUMLAH_PUBLIKASI,JUMLAH_DISERTASI_THESIS_SKRIPSI) VALUE ('','$idmon','$sks','$publish','$tesis')");
	}

	public function getSemIbel(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("SELECT id_ib from izin_belajar where NIK = '$iduser' ORDER BY ID_IB DESC LIMIT 1");

		return $query->result();
	}

	// public function getIdMo(){
	// 	$iduser=$this->session->userdata('NIK');
	// 	$query=$this->db->query("Select * from monitoring where ID_TUBEL = (Select id_tubel from tugas_belajar where NIK='$iduser' ORDER BY ID_TUBEL DESC LIMIT 1)");

	// 	return $query->result();
	// }

	public function getAktifitas($semester,$id){
		$query=$this->db->query("Select * from aktivitas_studi_ib where ID_MONITORING_IB = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	public function getPublikasi($semester,$id){
		$query=$this->db->query("Select *,date_format(TGL_SUBMIT,'%d-%m-%Y')as tanggalsub,date_format(TGL_RENCANA,'%d-%m-%Y')as tanggalren from publikasi_ib where ID_MONITORING_IB = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	public function getToefl($semester,$id){
		$query=$this->db->query("SELECT *,date_format(TGL_TES,'%d-%m-%Y')as tanggalsub,date_format(TGL_BERLAKU_SAMPAI,'%d-%m-%Y')as tanggalber from toefl_ib where ID_MONITORING_IB = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	public function getTugasAkhir($semester,$id){
		$query=$this->db->query("Select *,date_format(TGL_UJIAN_PROPOSAL,'%d-%m-%Y')as tanggalup,date_format(TGL_RENCANA_UP,'%d-%m-%Y')as tanggalrenup,date_format(TGL_TES,'%d-%m-%Y')as tanggalpen,date_format(TGL_RENCANA,'%d-%m-%Y')as tanggalrenpen,date_format(TGL_SA,'%d-%m-%Y')as tanggalsa,date_format(TGL_RENCANA_SA,'%d-%m-%Y')as tanggalrensa from tugas_akhir_ib where ID_MONITORING_IB = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	// public function getPenghargaan($semester,$id){
	// 	$query=$this->db->query("Select * from penghargaan_ib where ID_MONITORING_IB = '$id' AND SEMESTER='$semester'");

	// 	return $query->result();
	// }

	// public function getSeminar($semester,$id){
	// 	$query=$this->db->query("Select * from seminar_pelatihan_ib where ID_MONITORING_IB = '$id' AND SEMESTER='$semester'");

	// 	return $query->result();
	// }


} 