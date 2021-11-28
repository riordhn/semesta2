<?php  
class M_file_upload extends CI_Model{ 
    private $table = 'upload_file_tubel';
    private $table2 = 'upload_file_perpajangan';
    private $table1 = 'upload_file_ib';
    private $pk = 'ID_UP_FILE_T';
    private $pk1 = 'ID_UP_FILE_IB';
	public $id_up_file_t;
	public $id_tubel;
	public $id_jenis;
	public $nama_file_t;
	public $tipe_file;
	public $status_file_tubel;
	public $keterangan_revisi_tubel;
	public $nomor_surat;
	public $tgl_surat;
	public $jabatan_pimpinan;
	


	public function save($upload){
	 
	 $this->id_up_file_t = $upload['file_name'];
	 $this->id_tubel = $upload['id_tubel'];
	 $this->id_jenis = $upload['jenis_file'];
	 $this->nama_file_t = $upload['nama_file'];
	 $this->tipe_file = $upload['file_type'];
	 $this->status_file_tubel = '2';
	 $this->keterangan_revisi_tubel= '';
	 if ($upload['jenis_file']==2) {
	 	$this->nomor_surat= $upload['nosurat'];
	 	$this->tgl_surat= $upload['tglsurat'];
	 	$this->jabatan_pimpinan= '';	
	 } elseif ($upload['jenis_file']==4 || $upload['jenis_file']==19 || $upload['jenis_file']==18  || $upload['jenis_file']==67) {
	 	$this->nomor_surat= $upload['nosurat'];
	 	$this->tgl_surat= $upload['tglsurat'];
	 	$this->jabatan_pimpinan= $upload['jabatan'];
	 } else{
	 	$this->nomor_surat= '';
	 	$this->tgl_surat= '';
	 	$this->jabatan_pimpinan= '';	
	 }
    $this->db->insert($this->table, $this);

  	}

  	public function saveFilePanjangan($upload){
	 $post = $this->input->post();
	 $idfile=$upload['file_name'];	 
	 $id_perpanjangan = $upload['id_perpanjangan'];
	 $id_jenis = $upload['jenis_file'];
	 $nama_file_t = $upload['nama_file'];
	 $tipe_file = $upload['file_type'];
	 $status_file_perpanjangan = '2';
	 $keterangan_revisi_perpanjangan= '';
	 if ($upload['jenis_file']==68) {
	 	$nomor_surat= $post['nosurat'];
	 	$tgl_surat= $post['tglsurat'];
	 	$jabatan_pimpinan= $post['jabatan'];
	 } else{
	 	$nomor_surat= '';
	 	$tgl_surat= '';
	 	$jabatan_pimpinan= '';	
	 }
	

    $q=$this->db->query("insert into upload_file_perpanjangan (ID_UP_FILE_PJG,ID_PERPANJANGAN,ID_JENIS,NAMA_FILE_PJG,TIPE_FILE,STATUS_FILE_PERPANJANGAN,KETERANGAN_REVISI_PERPANJANGAN,NOMOR_SURAT,TGL_SURAT,JABATAN_PIMPINAN) VALUES ('$idfile','$id_perpanjangan','$id_jenis','$nama_file_t','$tipe_file','$status_file_perpanjangan','$keterangan_revisi_perpanjangan','$nomor_surat','$tgl_surat','$jabatan_pimpinan')");

  	}

  	public function saveFilePengaktifan($upload){
	 $post = $this->input->post();
	 $idfile=$upload['file_name'];	 
	 $id_perpanjangan = $upload['id_pengaktifan'];
	 $id_jenis = $upload['jenis_file'];
	 $nama_file_t = $upload['nama_file'];
	 $tipe_file = $upload['file_type'];
	 $status_file_perpanjangan = '2';
	 $keterangan_revisi_perpanjangan= '';
	 if ($upload['jenis_file']==69) {
	 	$nomor_surat= $post['nosurat'];
	 	$tgl_surat= $post['tglsurat'];
	 	$jabatan_pimpinan= $post['jabatan'];
	 } elseif ($upload['jenis_file']==37) {
	 	$nomor_surat= '';
	 	$tgl_surat= $post['spmt'];
	 	$jabatan_pimpinan= '';
	 } else{
	 	$nomor_surat= '';
	 	$tgl_surat= '';
	 	$jabatan_pimpinan= '';	
	 }
	
	
    $q=$this->db->query("insert into upload_file_pengaktifan (ID_UP_FILE_AKT,ID_PENGAKTIFAN,ID_JENIS,NAMA_FILE_AKT,TIPE_FILE,STATUS_FILE_PENGAKTIFAN,KETERANGAN_REVISI_PENGAKTIFAN,NOMOR_SURAT,TGL_SURAT,JABATAN_PIMPINAN) VALUES ('$idfile','$id_perpanjangan','$id_jenis','$nama_file_t','$tipe_file','$status_file_perpanjangan','$keterangan_revisi_perpanjangan','$nomor_surat','$tgl_surat','$jabatan_pimpinan')");

  	}

	public function saveSPSTB($upload){
	 
	 $this->id_up_file_t = $upload['file_name'];
	 $this->id_tubel = $upload['id_tubel'];
	 $this->id_jenis = $upload['jenis_file'];
	 $this->nama_file_t = $upload['nama_file'];
	 $this->tipe_file = $upload['file_type'];
	 $this->status_file_tubel = '0';
	 $this->keterangan_revisi_tubel= '';
	 $this->tgl_surat = $upload['tgl_surat'];
	 $this->nomor_surat = $upload['nomor_surat'];
	 
    $this->db->insert($this->table, $this);

  	}

  	public function saveSKP($upload){
	 
	 $this->id_up_file_t = $upload['file_name'];
	 $this->id_tubel = $upload['id_tubel'];
	 $this->id_jenis = $upload['jenis_file'];
	 $this->nama_file_t = $upload['nama_file'];
	 $this->tipe_file = $upload['file_type'];
	 $this->status_file_tubel = '0';
	 $this->keterangan_revisi_tubel= '';
	 $this->tgl_surat = $upload['tgl_surat'];
	 $this->nomor_surat = $upload['nomor_surat'];
    
    $this->db->insert($this->table, $this);

  	}

  	public function saveSetneg($upload){
	 
	 $this->id_up_file_t = $upload['file_name'];
	 $this->id_tubel = $upload['id_tubel'];
	 $this->id_jenis = $upload['jenis_file'];
	 $this->nama_file_t = $upload['nama_file'];
	 $this->tipe_file = $upload['file_type'];
	 $this->status_file_tubel = '0';
	 $this->keterangan_revisi_tubel= '';
    
    $this->db->insert($this->table, $this);

  	}

	public function getFile($id_daftar){   
		$q = $this->db->where('id_daftar',$id_daftar)->get();  
		return $q->result();
	} 

	public function getJenis(){   
		$q=$this->db->query("Select * from jenisfile_sl"); 
		return $q->result();
	} 

	public function semuaFile($id){
		$q=$query=$this->db->query("Select * from file_upload where id_daftar='$id'");
		return $q->result();
	}

	public function updateTB($id){
		$q=$this->db->query("UPDATE upload_file_tubel SET STATUS_FILE_TUBEL='2' WHERE ID_UP_FILE_T='".$id."'");
	}

	public function updateTB2($config){
		// $q=$this->db->query("UPDATE upload_file_tubel SET STATUS_FILE_TUBEL='2' WHERE ID_UP_FILE_T='".$id."'");
		$data = [
            'STATUS_FILE_TUBEL' => '2',
            'NOMOR_SURAT' => $config['nosurat'],
            'TGL_SURAT' => $config['tglsurat'],
            'JABATAN_PIMPINAN' => $config['jabatan'],
        ];

		$new_id = preg_replace('/\\.[^.\\s]{3,4}$/', '', $config['file_name']);

        $this->db->like('ID_UP_FILE_T', $new_id);
        $this->db->update('upload_file_tubel', $data);

	}

	public function updatePerpanjangan($config){
		// $q=$this->db->query("UPDATE upload_file_perpanjangan SET STATUS_FILE_PERPANJANGAN='2' WHERE ID_UP_FILE_PJG='".$id."'");

		$data = [
            'STATUS_FILE_PERPANJANGAN' => '2',
            'NOMOR_SURAT' => $config['nosurat'],
            'TGL_SURAT' => $config['tglsurat'],
            'JABATAN_PIMPINAN' => $config['jabatan'],
        ];
		$new_id = preg_replace('/\\.[^.\\s]{3,4}$/', '', $config['file_name']);
		
        $this->db->like('ID_UP_FILE_PJG', $new_id);
        $this->db->update('upload_file_perpanjangan', $data);
	}

	public function updatePengaktifan($config){
		// $q=$this->db->query("UPDATE upload_file_pengaktifan SET STATUS_FILE_PENGAKTIFAN='2' WHERE ID_UP_FILE_AKT='".$id."'");
		$data = [
            'STATUS_FILE_PENGAKTIFAN' => '2',
            'NOMOR_SURAT' => $config['nosurat'],
            'TGL_SURAT' => $config['tglsurat'],
            'JABATAN_PIMPINAN' => $config['jabatan'],
        ];

		$new_id = preg_replace('/\\.[^.\\s]{3,4}$/', '', $config['file_name']);

        $this->db->like('ID_UP_FILE_AKT', $new_id);
        $this->db->update('upload_file_pengaktifan', $data);
	}

	public function updatePengaktifandosen($id){
		$q=$this->db->query("UPDATE upload_file_pengaktifan SET STATUS_FILE_PENGAKTIFAN='2' WHERE ID_UP_FILE_AKT='".$id."'");
	}

	//template
	public function getFileRekPim($id){   
		$q = $this->db->query("Select * from upload_file_tubel where id_tubel='$id' and id_jenis='4'");  
		return $q->result();
	}

	public function getSetneg($id){   
		$q = $this->db->query("Select * from upload_file_tubel where id_tubel='$id' and id_jenis='21'");  
		return $q->result();
	}

	public function getLoa($id){   
		$q = $this->db->query("Select * from upload_file_tubel where id_tubel='$id' and id_jenis='2'");  
		return $q->result();
	}

	public function getSuratPengantar($id_perpanjangan){
		$q = $this->db->query("SELECT * from upload_file_perpanjangan where id_perpanjangan='$id_perpanjangan' and id_jenis='68'");  
		return $q->result();
	}

	public function getSuratPengantarTubel($id_tubel){
		$q = $this->db->query("SELECT * from upload_file_tubel where id_tubel='$id_tubel' and id_jenis='67'");  
		return $q->result();
	}

	//sk pengaktifan tubel
	public function getFile37($id){
		$q = $this->db->query("Select * from upload_file_pengaktifan ufp join pengaktifan_kembali pk on ufp.ID_PENGAKTIFAN=pk.ID_PENGAKTIFAN join tugas_belajar tb on tb.ID_TUBEL=pk.ID_TUBEL where tb.id_tubel='$id' and id_jenis='69'");  
		return $q->result();
	}
	//end

	public function getSuratPengantarIdTubel($id_tubel){
		$q = $this->db->query("SELECT * 
		FROM upload_file_perpanjangan u 
		JOIN perpanjangan p ON p.id_perpanjangan = u.id_perpanjangan
		JOIN tugas_belajar t ON t.id_tubel = p.id_tubel
		where p.id_tubel='$id_tubel' and u.id_jenis='68'");  
		return $q->result();
	}

} 