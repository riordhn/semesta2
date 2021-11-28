<?php  
class M_perpanjangan extends CI_Model{ 
	private $table = 'perpanjangan';
	private $pk = 'id_perpanjangan';
	public $id_perpanjangan;
	public $id_tubel;
	public $tanggal_pengajuan;
	public $status_perpanjangan;
	public $mulai_perpanjangan;
	public $selesai_perpanjangan;
	public $beasiswa;
	public $tambahan_semester;
	public $id_status_sl;

	

	public function getID(){
		$nik=$this->session->userdata('NIK');
		$query=$this->db->query("Select id_perpanjangan from perpanjangan where ID_TUBEL = (Select id_tubel from tugas_belajar where NIK='$nik' order by id_tubel desc limit 1)");

		return $query->result();
	}

	public function getNIK($id){
		$query=$this->db->query("Select NIK from tugas_belajar where ID_TUBEL = (Select id_tubel from perpanjangan where ID_PERPANJANGAN='$id')");

		return $query->result();
	}

	public function cekPerpanjangan($id){
		$query=$this->db->query("Select * from perpanjangan where ID_TUBEL = '$id' ORDER BY ID_TUBEL DESC");
		return $query->result();
	}

	public function savePerpanjangan(){
		$post = $this->input->post();

		
		$this->id_perpanjangan = '';
		$this->id_tubel = $post['idtubel'];
		$this->status_perpanjangan='0';
		$this->mulai_perpanjangan=date('Y-m-d', strtotime('+1 days', strtotime($post['mulaiperpanjangan'])));
		$date=date('Y-m-d', strtotime('+1 days', strtotime($post['mulaiperpanjangan'])));
		$jangka=$post['jangka'];
		if ($jangka==1) {
			$dateakhir=date('Y-m-d', strtotime('+6 month', strtotime($date)));
		}
		else{
			$dateakhir=date('Y-m-d', strtotime('+12 month', strtotime($date)));	
		}
		$this->selesai_perpanjangan=$dateakhir;
		$this->tambahan_semester=$post['jangka'];
		$this->beasiswa=$post['beasiswa'];
		if ($post['jenis']==0) {
		$this->id_status_sl='1';
		} else {
		$this->id_status_sl='2';
		}

		// echo "<pre>";
		// print_r($this);
		// die;

		$this->db->insert($this->table, $this);

	}


	private function _uploadFile($file)
	{
		$post = $this->input->post();
	    $config['upload_path']          = './file/monitoring/';
	    $config['allowed_types']        = 'pdf';
	    
	    $nama = basename($_FILES[$file]['name']);
	    $ext = pathinfo($nama, PATHINFO_EXTENSION);
	    $new_name = $file.'_'.$post['idmonitor'].'_'.date('y-m-d').'.'.$ext;

	    $config['file_name']            = $new_name;
	    $config['overwrite']			= true;
	    $config['max_size']             = 2000000; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

		
	    $this->load->library('upload', $config);

	    if(!empty($_FILES[$file]['name'])){
                if(!move_uploaded_file($_FILES[$file]["tmp_name"], "./file/monitoring/" . $config['file_name'])){
                    $this->upload->display_errors(); 
                } 
                else{
                    // $upload=$this->upload->data();
                    // $model->save($config);
                    return $config['file_name'];
	    		}
	    	}
	    	else{
	    	echo "gagal";

	    }
	    //return "default.jpg";
	}

	public function filePerpanjanganditangguhkan($id)
	{
		//$nik=$this->session->userdata('NIK');
		$q=$this->db->query("SELECT u.*, p.ID_PERPANJANGAN FROM perpanjangan p, upload_file_perpanjangan u WHERE p.ID_TUBEL='$id' and u.ID_PERPANJANGAN = p.ID_PERPANJANGAN and STATUS_FILE_PERPANJANGAN=1 and ID_JENIS IN (26,27,28,30,56,57,68);");
		return $q->result();
	}


	public function filePerpanjanganditangguhkanNon($id)
	{
		//$nik=$this->session->userdata('NIK');
		$q=$this->db->query("SELECT u.*, p.ID_PERPANJANGAN FROM perpanjangan p, upload_file_perpanjangan u WHERE p.ID_TUBEL='$id' and u.ID_PERPANJANGAN = p.ID_PERPANJANGAN and STATUS_FILE_PERPANJANGAN=1 and ID_JENIS IN (26,27,28,30,56,57,68);");
		return $q->result();
	}


	public function update_status($id){
		$q=$this->db->query("UPDATE perpanjangan SET ID_STATUS_SL='2' WHERE ID_PERPANJANGAN='".$id."'");
	}


	


} 