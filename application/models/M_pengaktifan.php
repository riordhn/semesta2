  <?php  
class M_pengaktifan extends CI_Model{ 
	private $table = 'pengaktifan_kembali';
	private $pk = 'id_pengaktifan';
	public $id_pengaktifan;
	public $id_tubel;
	public $id_status_sl;
	public $tanggal_lulus;
	public $tanggal_spmt;


	

	public function getID(){
		$nik=$this->session->userdata('NIK');
		$query=$this->db->query("Select id_pengaktifan from pengaktifan_kembali where ID_TUBEL = (Select id_tubel from tugas_belajar where NIK='$nik' order by id_tubel desc limit 1)");

		return $query->result();
	}

	public function getNIK($id){
		$query=$this->db->query("Select NIK from tugas_belajar where ID_TUBEL = (Select id_tubel from pengaktifan_kembali where ID_PENGAKTIFAN='$id')");

		return $query->result();
	}


	public function savePengaktifan(){
		$post = $this->input->post();

		
		$this->id_pengaktifan = '';
		$this->id_tubel = $post['idtubel'];
		if ($post['jenis']==0) {
		$this->id_status_sl='1';
		} else {
		$this->id_status_sl='2';
		}
		$this->tanggal_lulus=$post['tgl'];
		$this->tanggal_spmt=$post['spmt'];


		$this->db->insert($this->table, $this);

	}

	public function saveSpmt($id){
		$post = $this->input->post();

		
		$tanggal=$post['spmt'];


		$q=$this->db->query("UPDATE pengaktifan_kembali SET TANGGAL_SPMT='$tanggal' WHERE ID_PENGAKTIFAN='".$id."'");

	}

	public function filePengaktifanditangguhkan($id)
	{
		//$nik=$this->session->userdata('NIK');
		$q=$this->db->query("SELECT u.*, p.ID_PENGAKTIFAN FROM pengaktifan_kembali p, upload_file_pengaktifan u WHERE p.ID_TUBEL='$id' and u.ID_PENGAKTIFAN = p.ID_PENGAKTIFAN and STATUS_FILE_PENGAKTIFAN=1 and ID_JENIS IN (33,34);");
		return $q->result();
	}

	public function filePengaktifanditangguhkanNon($id)
	{
		//$nik=$this->session->userdata('NIK');
		$q=$this->db->query("SELECT u.*, p.ID_PENGAKTIFAN FROM pengaktifan_kembali p, upload_file_pengaktifan u WHERE p.ID_TUBEL='$id' and u.ID_PENGAKTIFAN = p.ID_PENGAKTIFAN and STATUS_FILE_PENGAKTIFAN=1 and ID_JENIS IN (33,35,66,37, 69);");
		return $q->result();
	}


	private function _uploadFile($file)
	{
		$post = $this->input->post();
	    $config['upload_path']          = './file/monitoring/';
	    $config['allowed_types']        = 'pdf';
	    
	    $nama = basename($_FILES[$file]['name']);
	    $ext = pathinfo($nama, PATHINFO_EXTENSION);
	    $new_name = $file.'_'.$post['idmonitor'].'_'.date('y-m-d').'.pdf';

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

	public function update_status($id){
		$q=$this->db->query("UPDATE pengaktifan_kembali SET ID_STATUS_SL='2' WHERE ID_PENGAKTIFAN='".$id."'");
	}


	


} 