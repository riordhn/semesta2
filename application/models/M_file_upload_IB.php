<?php  
class M_file_upload_IB extends CI_Model{ 
    private $table = 'upload_file_ib';
    private $pk = 'ID_UP_FILE_IB';
	public $id_up_file_ib;
	public $id_ib;
	public $id_jenis;
	public $nama_file_ib;
	public $tipe_file;
	public $status_file_ib;
	public $keterangan_revisi_ib;
	public $nomor_surat;
	public $tgl_surat;
	public $jabatan_pimpinan;
	//public $status_file;
	


	public function save($upload){
	 $post = $this->input->post();
	 $this->id_up_file_ib = $upload['file_name'];
	 $this->id_ib = $upload['id_ib'];
	 $this->id_jenis = $upload['jenis_file'];
	 $this->nama_file_ib = $upload['nama_file'];
	 $this->tipe_file = $upload['file_type'];
	 $this->status_file_ib = '2';
	 $this->keterangan_revisi_ib= '';
	 if ($upload['jenis_file']==70) {
	 	$this->nomor_surat= $post['nosurat'];
	 	$this->tgl_surat= $post['tglsurat'];
	 	$this->jabatan_pimpinan= $post['jabatan'];
	 } else{
	 	$this->nomor_surat= '';
	 	$this->tgl_surat= '';
	 	$this->jabatan_pimpinan= '';	
	 }
    
    $this->db->insert($this->table, $this);

  	}

  	public function getJenis(){   
		$q=$this->db->query("Select * from jenisfile_sl"); 
		return $q->result();
	} 

	public function saveSPSTB($upload){
	 
	 $this->id_up_file_ib = $upload['file_name'];
	 $this->id_ib = $upload['id_ibel'];
	 $this->id_jenis = $upload['jenis_file'];
	 $this->nama_file_ib = $upload['nama_file'];
	 $this->tipe_file = $upload['file_type'];
	 $this->status_file_ib = '0';
	 $this->keterangan_revisi_ib= '';
    
    $this->db->insert($this->table, $this);

  	}

  	public function updateIbel($config){
		// $q=$this->db->query("UPDATE upload_file_ib SET STATUS_FILE_IB='2' WHERE ID_UP_FILE_IB='".$id."'");
  		
		$data = [
            'STATUS_FILE_IB' => '2',
            'NOMOR_SURAT' => $config['nosurat'],
            'TGL_SURAT' => $config['tglsurat'],
            'JABATAN_PIMPINAN' => $config['jabatan'],
        ];

        $this->db->where('ID_UP_FILE_IB', $config['file_name']);
        $this->db->update('upload_file_ib', $data);
	}



} 