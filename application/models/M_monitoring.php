<?php  
class M_monitoring extends CI_Model{ 
	private $table = 'monitoring';
	private $pk = 'ID_MONITORING';
	public $penasehat_akademik;


	public function getIdTubel(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select id_tubel from tugas_belajar where NIK = '$iduser' ORDER BY ID_TUBEL DESC LIMIT 1");
		// foreach ($query->result() as $row)
		// {
		// 		echo $row->id_tubel;
		// }
		// die;
		return $query->result();
	}

	public function getTarget()
	{
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select * from syarat_kelulusan where ID_MONITORING=(Select id_monitoring from monitoring where ID_TUBEL = (Select id_tubel from tugas_belajar where NIK = '$iduser' ORDER BY ID_TUBEL DESC LIMIT 1) ORDER BY ID_MONITORING DESC LIMIT 1) ORDER BY ID_SYARAT_KELULUSAN DESC LIMIT 1");
		// foreach ($query->result() as $row)
		// {
		// 		echo $row->id_tubel;
		// }
		// die;
		return $query->result();
	}

	public function getSemTubel(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("SELECT id_tubel, semester,semester_sekarang from tugas_belajar where NIK = '$iduser' ORDER BY ID_TUBEL DESC LIMIT 1");

		return $query->result();
	}

	public function getIdMonitor($id){
		$query=$this->db->query("SELECT * FROM monitoring where ID_TUBEL = '$id'");

		return $query->result();
	}

	public function getIdMon1($id){
		$query=$this->db->query("SELECT * FROM monitoring where ID_MONITORING = '$id'");

		return $query->result();
	}

	public function cekMonitor(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select * from monitoring where ID_TUBEL = (Select id_tubel from tugas_belajar where NIK='$iduser' ORDER BY ID_TUBEL DESC LIMIT 1)");

		return $query->result();
	}

	public function savePenasihat()
	{
		$post=$this->input->post();
		$idmon = $post['idmonitor'];
		$this->penasehat_akademik = $post['penasihat'];

		$this->db->update($this->table, $this, array('id_monitoring' => $idmon));
	}

	

	public function getAktifitas($semester,$id){
		$query=$this->db->query("SELECT * from aktivitas_studi where ID_MONITORING = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	public function getPublikasi($semester,$id){
		$query=$this->db->query("Select *,date_format(TGL_SUBMIT,'%d-%m-%Y')as tanggalsub,date_format(TGL_RENCANA,'%d-%m-%Y')as tanggalren from publikasi where ID_MONITORING = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	public function getPenghargaan($semester,$id){
		$query=$this->db->query("Select * from penghargaan where ID_MONITORING = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	public function getToefl($semester,$id){
		$query=$this->db->query("Select *,date_format(TGL_TES,'%d-%m-%Y')as tanggalsub,date_format(TGL_RENCANA,'%d-%m-%Y')as tanggalber from toefl where ID_MONITORING = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	public function getTugasAkhir($semester,$id){
		$query=$this->db->query("Select *,date_format(TGL_UJIAN_PROPOSAL,'%d-%m-%Y')as tanggalup,date_format(TGL_RENCANA_UP,'%d-%m-%Y')as tanggalrenup,date_format(TGL_TES,'%d-%m-%Y')as tanggalpen,date_format(TGL_RENCANA,'%d-%m-%Y')as tanggalrenpen,date_format(TGL_SA,'%d-%m-%Y')as tanggalsa,date_format(TGL_RENCANA_SA,'%d-%m-%Y')as tanggalrensa from tugas_akhir where ID_MONITORING = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}


} 