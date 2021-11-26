<?php  
class M_Tubel_Dosen extends CI_Model{ 
	private $table = 'tugas_belajar';
	private $pk = 'ID_TUBEL';
	public $id_tubel;
    public $nik;
    public $lokasi_tubel;
	public $perguruan_tinggi_penyelenggara;
	public $nama_bidang_perguruan_tinggi;
	public $mulai_tubel;
	public $selesai_tubel;
	public $sumber_pembiayaan;
	public $jenis_pembiayaan;
	public $tahun_pembiayaan;
	public $id_negara;
	public $id_jenjang;
	public $Id_status_sl;

	public function rules(){
		return [
			 ['field' => 'NIK',
            'label' => 'NIK',
			'rules' => 'required'],
			
			['field' => 'jenjang',
            'label' => 'jenjang',
			'rules' => 'required'],
			
			['field' => 'perguruan',
            'label' => 'perguruan',
			'rules' => 'required'],
			
			['field' => 'negara',
            'label' => 'negara',
            'rules' => 'required'],
			
			['field' => 'NamaPT',
            'label' => 'NamaPT',
			'rules' => 'required'],
			
			['field' => 'bidang',
            'label' => 'bidang',
			'rules' => 'required'],
			
			['field' => 'mulai',
            'label' => 'Tgl Mulai',
			'rules' => 'required'],
			
			// ['field' => 'selesai',
   //          'label' => 'Tgl Selesai',
			// 'rules' => 'required'],
			
			['field' => 'sumber',
            'label' => 'sumber biaya',
			'rules' => 'required'],
			
			['field' => 'Jenis',
            'label' => 'jenis',
			'rules' => 'required'],
			
			['field' => 'tahun',
            'label' => 'tahun',
			'rules' => 'required']

		
		];
	}


	public function saveTB(){
		$post = $this->input->post();

		$this->id_tubel = '';
		$this->nik =$this->session->userdata('NIK');
		$this->lokasi_tubel = $post['perguruan'];
		$this->perguruan_tinggi_penyelenggara = $post['NamaPT'];
		$this->nama_bidang_perguruan_tinggi = $post['bidang'];
		$this->mulai_tubel = $post['mulai'];
		$masa=$post['lama'];
		//get tanggal selesai tubel
		$tgl1 = date('Y-m-d', strtotime('+'.$masa.' year', strtotime($post['mulai'])));
		$tgl2 = date('Y-m-d', strtotime('-1 days', strtotime($tgl1)));
		
		$this->selesai_tubel = $tgl2;
		$this->sumber_pembiayaan = $post['sumber'];
		$this->jenis_pembiayaan = $post['Jenis'];
		$this->tahun_pembiayaan = $post['tahun'];
		$this->id_negara = $post['negara'];
		$this->id_jenjang = $post['jenjang'];
		$this->Id_status_sl='0';

		$this->db->insert($this->table, $this);

	
	}

	public function updateTB(){
		$post = $this->input->post();

		$this->id_tubel = $post['idtubel'];
		$this->nik =$this->session->userdata('NIK');
		$this->lokasi_tubel = $post['perguruan'];
		$this->perguruan_tinggi_penyelenggara = $post['NamaPT'];
		$this->nama_bidang_perguruan_tinggi = $post['bidang'];
		$this->mulai_tubel = $post['mulai'];
		$masa=$post['lama'];
		//get tanggal selesai tubel
		$tgl1 = date('Y-m-d', strtotime('+'.$masa.' year', strtotime($post['mulai'])));
		$tgl2 = date('Y-m-d', strtotime('-1 days', strtotime($tgl1)));
		
		$this->selesai_tubel = $tgl2;
		$this->sumber_pembiayaan = $post['sumber'];
		$this->jenis_pembiayaan = $post['Jenis'];
		$this->tahun_pembiayaan = $post['tahun'];
		$this->id_negara = $post['negara'];
		$this->id_jenjang = $post['jenjang'];
		$this->Id_status_sl='0';

		$this->db->update($this->table, $this, array('id_tubel' => $post['idtubel']));

	
	}

	public function getBiodata(){  
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.NAMA_STATUS from biodata b, tugas_belajar t,  status_verifikasi s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status"); 
		return $q->result();
	}

	public function getData(){ 
		$nik=$this->session->userdata('NIK');  
		// $q=$this->db->query("SELECT t.*,n.NAMA_NEGARA,DATE_FORMAT(t.MULAI_TUBEL, '%d-%M-%Y') as Mulai,DATE_FORMAT(t.SELESAI_TUBEL, '%d-%M-%Y') as Selesai,m.SEMESTER_SEKARANG as 'semester_now',j.NAMA_JENJANG, m.TOTAL_SEMESTER as 'total' , b.FOTO1, b.NAMA, b.GELAR_DEPAN, b.GELAR_BELAKANG, b.NIK from biodata b, tugas_belajar t, monitoring m, jenjang_pendidikan j, negara n where t.NIK=b.NIK and t.ID_TUBEL=m.ID_TUBEL and t.ID_JENJANG=j.ID_JENJANG and t.ID_NEGARA=n.ID_NEGARA ORDER BY t.ID_TUBEL DESC LIMIT 1"); 
		$q=$this->db->query("SELECT t.*,n.NAMA_NEGARA,DATE_FORMAT(t.MULAI_TUBEL, '%d-%m-%Y') as Mulai,DATE_FORMAT(t.SELESAI_TUBEL, '%d-%m-%Y') as Selesai,m.SEMESTER_SEKARANG as 'semester_now', m.TOTAL_SEMESTER,j.NAMA_JENJANG, m.TOTAL_SEMESTER as 'total', m.PENASEHAT_AKADEMIK , b.FOTO1, b.NAMA, b.GELAR_DEPAN, b.GELAR_BELAKANG, b.NIK from biodata b, tugas_belajar t, monitoring m, jenjang_pendidikan j, negara n where b.NIK='$nik' and b.NIK=t.NIK and t.ID_TUBEL=m.ID_TUBEL and t.ID_JENJANG=j.ID_JENJANG and t.ID_NEGARA=n.ID_NEGARA ORDER BY t.ID_TUBEL DESC LIMIT 1");
		return $q->result();
	}

	public function getData2(){ 
		$nik=$this->session->userdata('NIK'); 
		$q=$this->db->query("Select b.UNIT_KERJA, t.*,n.NAMA_NEGARA,DATE_FORMAT(t.SELESAI_TUBEL, '%d-%M-%Y') as Selesai from tugas_belajar t, biodata b, negara n where t.NIK='$nik' and b.NIK=t.NIK and t.ID_NEGARA=n.ID_NEGARA ORDER BY t.ID_TUBEL DESC LIMIT 1"); 
		return $q->result();
	}

	public function getData3(){ 
		$nik=$this->session->userdata('NIK'); 
		$q=$this->db->query("Select t.*,b.*,s.status_sl,s.LOKASI_DATA ,DATE_FORMAT(t.SELESAI_TUBEL, '%d-%M-%Y') as Selesai from tugas_belajar t, negara n, biodata b, status_studilanjut s where t.NIK='$nik' and b.NIK=t.NIK and t.ID_NEGARA=n.ID_NEGARA  and t.ID_STATUS_SL=s.ID_STATUS_SL ORDER BY t.ID_TUBEL DESC LIMIT 1"); 
		return $q->result();
	}

	public function getData4(){ 
		$nik=$this->session->userdata('NIK'); 
		$q=$this->db->query("Select b.*,p.*, t.PERGURUAN_TINGGI_PENYELENGGARA, s.status_sl, n.nama_negara from tugas_belajar t, perpanjangan p, biodata b, negara n, status_studilanjut s where t.NIK='$nik' and t.ID_TUBEL = p.ID_TUBEL and b.NIK='$nik' and t.ID_NEGARA=n.ID_NEGARA and p.ID_STATUS_SL=s.ID_STATUS_SL ORDER BY p.ID_PERPANJANGAN DESC LIMIT 1"); 
		return $q->result();
	}

	public function getDataAllTubel(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("select t.*,p.*,a.*,b.*,n.nama_negara, s.status_sl, s.LOKASI_DATA from negara n, tugas_belajar t, perpanjangan p, pengaktifan_kembali a, biodata b, status_studilanjut s where t.id_tubel=(select id_tubel from tugas_belajar where NIK='$iduser') and p.id_tubel=t.id_tubel and a.id_tubel=t.id_tubel and t.id_negara=n.id_negara and b.NIK='$iduser' and t.Id_status_sl=s.Id_status_sl and t.ID_STATUS_SL = 7");
		// foreach ($query->result() as $row)
		// {
		// 		echo $row->id_tubel;
		// }
		// die;
		return $query->result();
	}

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

	public function cekTubel(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select * from tugas_belajar where NIK = '$iduser' ORDER BY ID_TUBEL DESC LIMIT 1");
		return $query->result();
	}

	public function cekPengaktifan($id){
		
		$query=$this->db->query("Select id_pengaktifan from pengaktifan_kembali where ID_TUBEL = '$id'");

		return $query->result();
	}

	public function getIdMo(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select * from tugas_belajar where NIK='$iduser' and ID_STATUS_SL='7' ORDER BY ID_TUBEL DESC LIMIT 1");

		return $query->result();
	}

	public function cekSem(){
		$iduser=$this->session->userdata('NIK');
		$query=$this->db->query("Select t.id_tubel,m.* from tugas_belajar t, monitoring m where NIK = '$iduser' and m.ID_TUBEL=t.ID_TUBEL ORDER BY m.ID_TUBEL DESC LIMIT 1");
		return $query->result();
	}

	public function cekMonitoring($id){
		$query=$this->db->query("Select * from monitoring where ID_TUBEL = '$id'");
		return $query->result();
	}

	public function getFak(){
		$query=$this->db->query("SELECT FAKULTAS from fakultas where ID_FAKULTAS < 16 ");
		return $query->result();
	}

	public function getSetneg(){
		$iduser=$this->session->userdata('NIK');
		$q=$this->db->query("Select t.*, b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL from biodata b, tugas_belajar t,  status_studilanjut s where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_STATUS_SL>='6' and t.NIK='$iduser'"); 
		return $q->result();
	}

	public function getPerpanjanganSet(){
		$iduser=$this->session->userdata('NIK');
		$q=$this->db->query("Select * from upload_file_perpanjangan where ID_UP_FILE_PJG LIKE '%$iduser%' AND NAMA_FILE_PJG = 'Perpanjangan SETNEG'  ORDER BY ID_PERPANJANGAN DESC LIMIT 1"); 
		return $q->result();
	}

	public function getTubel(){
		$iduser=$this->session->userdata('NIK');  
		// $q=$this->db->query("SELECT t.*,j.NAMA_JENJANG , b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, tugas_belajar t,  status_studilanjut s,  jenjang_pendidikan j where t.NIK=b.NIK and t.ID_status_sl=s.ID_status_sl and t.ID_JENJANG=j.ID_JENJANG and t.NIK='$iduser' ORDER BY t.ID_TUBEL DESC LIMIT 1");

		$q=$this->db->query("SELECT t.*,j.NAMA_JENJANG , b.NAMA, b.UNIT_KERJA, b.TEMPAT_LAHIR, b.TGL_LAHIR, s.STATUS_SL, s.LOKASI_DATA from biodata b, tugas_belajar t,  status_studilanjut s,  jenjang_pendidikan j where b.NIK='$iduser' and b.NIK=t.NIK and t.ID_JENJANG=j.ID_JENJANG ORDER BY t.ID_TUBEL DESC LIMIT 1");  
		return $q->result();
	}

	public function getFile($id){
		$q=$this->db->query("Select * from upload_file_tubel where ID_TUBEL='".$id."' ORDER BY ID_JENIS ASC");
		return $q->result();
	}

	public function getFilePjg($id){
		$q=$this->db->query("Select * from upload_file_perpanjangan where ID_PERPANJANGAN='".$id."' ORDER BY ID_JENIS ASC");
		return $q->result();
	}

	public function getFileAkt($id){
		$q=$this->db->query("Select * from upload_file_pengaktifan where ID_PENGAKTIFAN='".$id."' ORDER BY ID_JENIS ASC");
		return $q->result();
	}

// 	public function upFile($id)
// 	{
// 		$q=$this->db->query("SELECT DISTINCT(tugas_belajar.ID_TUBEL),
// 							(select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=1) AS FILE_A,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=2) AS FILE_B,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=3)AS FILE_C,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=4)AS FILE_D,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=5) AS FILE_E,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=6) AS FILE_F,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=7) AS FILE_G,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=8) AS FILE_H,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=9) AS FILE_I,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=10) AS FILE_J,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=11) AS FILE_K,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=12) AS FILE_L,
// 							 (select upload_file_tubel.ID_UP_FILE_T  FROM upload_file_tubel 
// 							 JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL 
// 							 where upload_file_tubel.ID_JENIS=13) AS FILE_M
// 							FROM tugas_belajar
// 							WHERE tugas_belajar.ID_TUBEL = '$id'");
// 		return $q->result();
// 	}

public function upFile($id)
	{
		$q=$this->db->query("SELECT DISTINCT(tugas_belajar.ID_TUBEL) as a, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=1 and tugas_belajar.ID_TUBEL=a) AS FILE_A, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=2 and tugas_belajar.ID_TUBEL=a) AS FILE_B, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=3 and tugas_belajar.ID_TUBEL=a)AS FILE_C, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=62 and tugas_belajar.ID_TUBEL=a)AS FILE_D, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=63 and tugas_belajar.ID_TUBEL=a) AS FILE_E, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=6 and tugas_belajar.ID_TUBEL=a) AS FILE_F, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=64 and tugas_belajar.ID_TUBEL=a) AS FILE_G, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=9 and tugas_belajar.ID_TUBEL=a) AS FILE_I,  
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=11 and tugas_belajar.ID_TUBEL=a) AS FILE_K, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=12 and tugas_belajar.ID_TUBEL=a) AS FILE_L,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=13 and tugas_belajar.ID_TUBEL=a) AS FILE_M 
							FROM tugas_belajar WHERE tugas_belajar.ID_TUBEL = '$id'");
		return $q->result();
	}

	public function upFileNon($id)
	{
		$q=$this->db->query("SELECT DISTINCT(tugas_belajar.ID_TUBEL) as a, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=1 and tugas_belajar.ID_TUBEL=a) AS FILE_A, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=2 and tugas_belajar.ID_TUBEL=a) AS FILE_B, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=3 and tugas_belajar.ID_TUBEL=a)AS FILE_C, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=62 and tugas_belajar.ID_TUBEL=a)AS FILE_D, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=63 and tugas_belajar.ID_TUBEL=a) AS FILE_E, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=6 and tugas_belajar.ID_TUBEL=a) AS FILE_F, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=64 and tugas_belajar.ID_TUBEL=a) AS FILE_G, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=9 and tugas_belajar.ID_TUBEL=a) AS FILE_I,  
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=11 and tugas_belajar.ID_TUBEL=a) AS FILE_K, 
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=12 and tugas_belajar.ID_TUBEL=a) AS FILE_L,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=13 and tugas_belajar.ID_TUBEL=a) AS FILE_M,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=4 and tugas_belajar.ID_TUBEL=a) AS FILE_N,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=15 and tugas_belajar.ID_TUBEL=a) AS FILE_O,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=16 and tugas_belajar.ID_TUBEL=a) AS FILE_P,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=17 and tugas_belajar.ID_TUBEL=a) AS FILE_Q,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=18 and tugas_belajar.ID_TUBEL=a) AS FILE_R,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=19 and tugas_belajar.ID_TUBEL=a) AS FILE_S,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=5 and tugas_belajar.ID_TUBEL=a) AS FILE_T,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=7 and tugas_belajar.ID_TUBEL=a) AS FILE_U,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=10 and tugas_belajar.ID_TUBEL=a) AS FILE_V,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=65 and tugas_belajar.ID_TUBEL=a) AS FILE_W,
							(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=67 and tugas_belajar.ID_TUBEL=a) AS FILE_X
							FROM tugas_belajar WHERE tugas_belajar.ID_TUBEL = '$id'");
		return $q->result();
	}

	// ------FUNCTION AWAL FILE DOSEN----------
	// public function upFile($id)
	// {
	// 	$q=$this->db->query("SELECT DISTINCT(tugas_belajar.ID_TUBEL) as a, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=1 and tugas_belajar.ID_TUBEL=a) AS FILE_A, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=2 and tugas_belajar.ID_TUBEL=a) AS FILE_B, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=3 and tugas_belajar.ID_TUBEL=a)AS FILE_C, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=4 and tugas_belajar.ID_TUBEL=a)AS FILE_D, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=5 and tugas_belajar.ID_TUBEL=a) AS FILE_E, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=6 and tugas_belajar.ID_TUBEL=a) AS FILE_F, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=7 and tugas_belajar.ID_TUBEL=a) AS FILE_G, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=8 and tugas_belajar.ID_TUBEL=a) AS FILE_H, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=9 and tugas_belajar.ID_TUBEL=a) AS FILE_I, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=10 and tugas_belajar.ID_TUBEL=a) AS FILE_J, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=11 and tugas_belajar.ID_TUBEL=a) AS FILE_K, 
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=12 and tugas_belajar.ID_TUBEL=a) AS FILE_L,
	// 						(select upload_file_tubel.ID_UP_FILE_T FROM upload_file_tubel JOIN tugas_belajar ON upload_file_tubel.ID_TUBEL = tugas_belajar.ID_TUBEL where upload_file_tubel.ID_JENIS=13 and tugas_belajar.ID_TUBEL=a) AS FILE_M 
	// 						FROM tugas_belajar WHERE tugas_belajar.ID_TUBEL = '$id'");
	// 	return $q->result();
	// }

	public function hitungNon($id)
	{
		$q=$this->db->query("SELECT * from upload_file_tubel where ID_TUBEL='$id' and ID_JENIS IN (1,2,3,6,9,11,12,13,62,63,64,4,15,16,17,18,19,5,7,10,65,67)");
		return $q->num_rows();
	}

	public function hitung1($id)
	{
		$q=$this->db->query("SELECT * from upload_file_tubel where ID_TUBEL='$id' and ID_JENIS IN (1,2,3,6,9,11,12,13,62,63,64)");
		return $q->num_rows();
	}

	public function hitung($id)
	{
		$q=$this->db->query("SELECT * from upload_file_tubel where ID_TUBEL='$id' and ID_JENIS IN (1,2,3,6,9,11,12,13,62,63,64)");
		return $q->result();
	}

	public function status($status)
	{	
		$post=$this->input->post();
		
		$id = $post['ID_tubels'];
		$q=$this->db->query("update tugas_belajar set ID_STATUS_SL='$status' where ID_TUBEL='$id'");
	}

	public function statusNon($status)
	{	
		$post=$this->input->post();
		$id = $post['ID_tubels'];
		$q=$this->db->query("update tugas_belajar set ID_STATUS_SL='$status' where ID_TUBEL='$id'");
	}

	public function fileTubelditangguhkan($id)
	{
		//$nik=$this->session->userdata('NIK');
		$q=$this->db->query("SELECT * FROM upload_file_tubel WHERE ID_TUBEL='$id' and STATUS_FILE_TUBEL=1 and ID_JENIS IN (1,2,3,6,9,11,12,13,62,63,64, 4,15,16,17,18,19,5,7,10,65,67)");
		return $q->result();
	}

	public function fileTubelditangguhkanNon($id)
	{
		//$nik=$this->session->userdata('NIK');
		$q=$this->db->query("SELECT * FROM upload_file_tubel WHERE ID_TUBEL='$id' and STATUS_FILE_TUBEL=1 and ID_JENIS IN (1,2,3,6,9,11,12,13,62,63,64, 4,15,16,17,18,19,5,7,10,65,67)");
		return $q->result();
	}

	public function updateStatusSL($id){
		$q=$this->db->query("UPDATE tugas_belajar SET ID_STATUS_SL='2' WHERE ID_TUBEL='".$id."'");
	}


	public function getDataTubelDiri($id)
	{
		$nik=$this->session->userdata('NIK');
		$q=$this->db->query("SELECT b.*,t.*, DATE_FORMAT(t.MULAI_TUBEL, '%d-%m-%Y')AS MULAI_TB, DATE_FORMAT(t.SELESAI_TUBEL, '%d-%m-%Y')AS SELESAI_TB from biodata b, tugas_belajar t where b.NIK='$nik' and t.id_tubel='$id' and t.NIK=b.NIK");

		return $q->result();

	}

	public function getDataTubelDiriFak($id)
	{
		
		$q=$this->db->query("SELECT b.*,t.*, DATE_FORMAT(t.MULAI_TUBEL, '%d-%m-%Y') AS MULAI_TUBEL, DATE_FORMAT(t.SELESAI_TUBEL, '%d-%m-%Y') AS SELESAI_TUBEL from biodata b, tugas_belajar t where t.id_tubel='$id' and t.NIK=b.NIK");

		return $q->result();

	}

	public function getDataPjgDiriFak($id)
	{
		
		$q=$this->db->query("SELECT b.*,t.*,p.*, DATE_FORMAT(t.MULAI_TUBEL, '%d-%m-%Y') AS MULAI_TUBEL, DATE_FORMAT(t.SELESAI_TUBEL, '%d-%m-%Y') AS SELESAI_TUBEL,DATE_FORMAT(p.MULAI_PERPANJANGAN, '%d-%m-%Y') AS MULAI_PERPANJANGAN,DATE_FORMAT(p.SELESAI_PERPANJANGAN, '%d-%m-%Y') AS SELESAI_PERPANJANGAN  from biodata b, tugas_belajar t, perpanjangan p where p.id_perpanjangan='$id' and t.id_tubel=p.id_tubel and t.NIK=b.NIK");

		return $q->result();

	}

	public function getDataAktifDiriFak($id)
	{
		
		$q=$this->db->query("SELECT b.*,t.*,p.*, DATE_FORMAT(t.MULAI_TUBEL, '%d-%m-%Y') AS MULAI_TUBEL, DATE_FORMAT(t.SELESAI_TUBEL, '%d-%m-%Y') AS SELESAI_TUBEL from pengaktifan_kembali p, biodata b, tugas_belajar t where p.id_pengaktifan='$id' and p.id_tubel=t.id_tubel and t.NIK=b.NIK");

		return $q->result();

	}



} 