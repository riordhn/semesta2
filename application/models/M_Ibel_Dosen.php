<?php  
class M_Ibel_Dosen extends CI_Model{ 
	private $table = 'izin_belajar';
	private $pk = 'ID_IB';
	public $id_ib;
    public $nik;
	public $perguruan_tinggi_penyelenggara;
	public $nama_bidang_perguruan_tinggi;
	public $mulai_ib;
	public $selesai_ib;
	public $id_jenjang;
	public $Id_status_sl;

	public function rules(){
		return [
			
			['field' => 'jenjang',
            'label' => 'jenjang',
			'rules' => 'required'],
			
			['field' => 'namaPT',
            'label' => 'NamaPT',
			'rules' => 'required'],
			
			['field' => 'bidang',
            'label' => 'bidang',
			'rules' => 'required'],
			
			['field' => 'mulai',
            'label' => 'Tgl Mulai',
			'rules' => 'required'],
			
			// ['field' => 'selesai',
            // 'label' => 'Tgl Selesai',
			// 'rules' => 'required']

		
		];
	}


	public function saveIB(){
		$post = $this->input->post();

		$this->id_ib = '';
		$this->nik =$this->session->userdata('NIK');
		$this->perguruan_tinggi_penyelenggara = $post['namaPT'];
		$this->nama_bidang_perguruan_tinggi = $post['bidang'];
		$this->mulai_ib = $post['mulai'];
		$this->selesai_ib = $post['selesai'];
		$this->id_jenjang = $post['jenjang'];
		$this->Id_status_sl='13';

		$this->db->insert($this->table, $this);

	
	}

	public function updateIB(){
		$post = $this->input->post();

		$this->id_ib = $post['idibel'];
		$this->nik =$post['NIK'];
		$this->perguruan_tinggi_penyelenggara = $post['namaPT'];
		$this->nama_bidang_perguruan_tinggi = $post['bidang'];
		$this->mulai_ib = $post['mulai'];
		$this->selesai_ib = $post['selesai'];
		$this->id_jenjang = $post['jenjang'];
		$this->Id_status_sl='13';

		$this->db->update($this->table, $this, array('id_ib' => $post['idibel']));

	
	}

	public function cekMonitoring($id){
		$query=$this->db->query("Select * from monitoring_ib where ID_IB = '$id'");
		return $query->result();
	}

	public function getFak(){
		$query=$this->db->query("SELECT FAKULTAS from fakultas where ID_FAKULTAS < 16 ");
		return $query->result();
	}

	public function getBiodata(){  
		$id=$this->session->userdata('NIK');
		$q=$this->db->query("SELECT * FROM biodata WHERE NIK='$id'"); 
		return $q->result();
	}

	public function getData(){  
		// $q=$this->db->query("Select t.*,DATE_FORMAT(t.MULAI_IB, '%d-%M-%Y') as Mulai,DATE_FORMAT(t.SELESAI_IB, '%d-%M-%Y') as Selesai,m.SEMESTER_SEKARANG as 'semester_now',j.NAMA_JENJANG, m.TOTAL_SEMESTER as 'total' , b.FOTO1, b.NAMA, b.GELAR_DEPAN, b.GELAR_BELAKANG, b.NIK from biodata b, izin_belajar t, monitoring_ib m, jenjang_pendidikan j where t.NIK=b.NIK and t.ID_IB=m.ID_IB and t.ID_JENJANG=j.ID_JENJANG ORDER BY t.ID_IB DESC LIMIT 1"); 
		$nik=$this->session->userdata('NIK');
		$q=$this->db->query("SELECT t.*,DATE_FORMAT(t.MULAI_IB, '%d-%M-%Y') as Mulai,DATE_FORMAT(t.SELESAI_IB, '%d-%M-%Y') as Selesai,m.SEMESTER_SEKARANG as 'semester_now', m.TOTAL_SEMESTER,j.NAMA_JENJANG, m.TOTAL_SEMESTER as 'total', m.PENASEHAT_AKADEMIK , b.FOTO1, b.NAMA, b.GELAR_DEPAN, b.GELAR_BELAKANG, b.NIK from biodata b, izin_belajar t, monitoring_ib m, jenjang_pendidikan j where b.NIK='$nik' and b.NIK=t.NIK and t.ID_IB=m.ID_IB and t.ID_JENJANG=j.ID_JENJANG ORDER BY t.ID_IB DESC LIMIT 1");
		return $q->result();
	}

	public function getIdIbel(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("SELECT id_ib from izin_belajar where NIK = '$iduser' ORDER BY ID_IB DESC LIMIT 1");
		return $query->result();
	}

	public function cekIbel(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("SELECT * from izin_belajar where NIK = '$iduser' ORDER BY ID_IB DESC LIMIT 1");
		return $query->result();
	}

	public function cekLaporan($id){
		$query=$this->db->query("SELECT * from pengaktifan_ib where ID_IB = '$id'");
		return $query->result();
	}

	public function getDataIbel($id){
		$query=$this->db->query("SELECT * from izin_belajar where ID_IB = '$id'");
		return $query->result();
	}

	public function getIdMo(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select * from izin_belajar where NIK='$iduser' and ID_STATUS_SL='7' ORDER BY ID_IB DESC LIMIT 1");
		// echo "<pre>";
		// print_r($query->result());
		// die;

		return $query->result();
	}

	public function getIbel(){
		$iduser=$this->session->userdata('NIK');  
		$q=$this->db->query("SELECT p.*, t.*,j.NAMA_JENJANG , b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from pengaktifan_ib p, biodata b, izin_belajar t,  status_studilanjut s,  jenjang_pendidikan j where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_JENJANG=j.ID_JENJANG and t.ID_IB = p.ID_IB and t.NIK='$iduser' ORDER BY t.ID_IB DESC LIMIT 1"); 
		return $q->result();
	}

	public function getIbel1(){
		$iduser=$this->session->userdata('NIK');  
		$q=$this->db->query("SELECT t.*,j.NAMA_JENJANG , b.NAMA, b.UNIT_KERJA, f.ID_FAKULTAS, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, izin_belajar t,  status_studilanjut s,  jenjang_pendidikan j, fakultas f where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_JENJANG=j.ID_JENJANG and f.id_unit_kerja = b.id_unit_kerja and t.NIK='$iduser' ORDER BY t.ID_IB DESC LIMIT 1"); 
		return $q->result();
	}

	public function getIbelpeng(){
		$iduser=$this->session->userdata('NIK');  
		$q=$this->db->query("SELECT p.*, t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR from biodata b, izin_belajar t, pengaktifan_ib p where t.NIK='$iduser' and t.NIK=b.NIK and t.ID_IB = p.ID_IB  ORDER BY t.ID_IB DESC LIMIT 1"); 
		return $q->result();
	}

	public function getsemIbel($id)
	{
		$q=$this->db->query("Select * from monitoring_ib where ID_IB = '$id'");
		return $q->result();
	}

	public function upFile($id)
	{
		$q=$this->db->query("SELECT DISTINCT(izin_belajar.ID_IB) as a,
							(select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=42 and izin_belajar.ID_IB=a) AS FILE_A,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=43 and izin_belajar.ID_IB=a) AS FILE_B,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=44 and izin_belajar.ID_IB=a) AS FILE_C,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=45 and izin_belajar.ID_IB=a) AS FILE_D,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=47 and izin_belajar.ID_IB=a) AS FILE_E,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=48 and izin_belajar.ID_IB=a) AS FILE_F
							FROM izin_belajar
							WHERE izin_belajar.ID_IB = '$id'");
		return $q->result();
	}

	public function upFileNon($id)
	{
		$q=$this->db->query("SELECT DISTINCT(izin_belajar.ID_IB) as a,
							(select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=42 and izin_belajar.ID_IB=a) AS FILE_A,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=43 and izin_belajar.ID_IB=a) AS FILE_B,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=44 and izin_belajar.ID_IB=a) AS FILE_C,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=45 and izin_belajar.ID_IB=a) AS FILE_D,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=47 and izin_belajar.ID_IB=a) AS FILE_E,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=48 and izin_belajar.ID_IB=a) AS FILE_F,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=46 and izin_belajar.ID_IB=a) AS FILE_G,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=49 and izin_belajar.ID_IB=a) AS FILE_H,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=50 and izin_belajar.ID_IB=a) AS FILE_I,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=51 and izin_belajar.ID_IB=a) AS FILE_J,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=52 and izin_belajar.ID_IB=a) AS FILE_K,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=70 and izin_belajar.ID_IB=a) AS FILE_L
							FROM izin_belajar
							WHERE izin_belajar.ID_IB = '$id'");
		return $q->result();
	}

	public function hitung($id)
	{
		$q=$this->db->query("SELECT count(*) as jumlah from upload_file_ib where ID_IB='$id'");
		return $q->result();
	}

	public function getfileIbel($id)
	{
		$q=$this->db->query("SELECT * FROM upload_file_ib WHERE ID_IB='$id' ORDER BY ID_JENIS ASC");
		return $q->result();
	}

	public function status($status)
	{	
		$post=$this->input->post();
		// $status = $post['status'];
		$id = $post['ID_tubels'];
		$q=$this->db->query("update izin_belajar set ID_STATUS_SL='$status' where ID_IB='$id'");
	}

	public function statusNon($status)
	{	
		$post=$this->input->post();
		// $status = $post['status'];
		$id = $post['ID_tubels'];
		$q=$this->db->query("update izin_belajar set ID_STATUS_SL='2' where ID_IB='$id'");
	}

	public function getDataIbelDiri($id)
	{
		$nik=$this->session->userdata('NIK');
		$q=$this->db->query("SELECT b.*,t.*, DATE_FORMAT(t.MULAI_IB, '%d-%m-%Y') AS MULAI_IB, DATE_FORMAT(t.SELESAI_IB, '%d-%m-%Y') AS SELESAI_IB from biodata b, izin_belajar t where b.NIK='$nik' and t.id_ib='$id' and t.NIK=b.NIK");

		return $q->result();

	}

	public function getDataIbelDiriFak($id)
	{
		
		$q=$this->db->query("SELECT b.*,t.*, DATE_FORMAT(t.MULAI_IB, '%d-%m-%Y') AS MULAI_IB, DATE_FORMAT(t.SELESAI_IB, '%d-%m-%Y') AS SELESAI_IB from biodata b, izin_belajar t where t.id_ib='$id' and t.NIK=b.NIK");

		return $q->result();
	}

	public function fileIbelditangguhkan($id)
	{
		$q=$this->db->query("SELECT * FROM upload_file_ib WHERE ID_IB='$id' and STATUS_FILE_IB=1 and ID_JENIS IN (42,43,44,45,47,48);");
		return $q->result();
	}

	public function fileIbelditangguhkanNon($id)
	{
		$q=$this->db->query("SELECT * FROM upload_file_ib WHERE ID_IB='$id' and STATUS_FILE_IB=1 and ID_JENIS IN (42,43,44,45,47,48,46,49,50,51,52,70);");
		return $q->result();
	}

	public function upFileBaru($id)
	{
		$q=$this->db->query("SELECT DISTINCT(izin_belajar.ID_IB),
							(select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=3) AS FILE_A,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=44) AS FILE_B,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=47) AS FILE_C,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=42) AS FILE_D,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=48) AS FILE_E,
							 (select upload_file_ib.ID_UP_FILE_IB  FROM upload_file_ib 
							 JOIN izin_belajar ON upload_file_ib.ID_IB = izin_belajar.ID_IB 
							 where upload_file_ib.ID_JENIS=43) AS FILE_F
							FROM izin_belajar
							WHERE izin_belajar.ID_IB = '$id'");
		return $q->result();
	}
} 