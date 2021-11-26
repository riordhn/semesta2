<?php  
class M_toefl extends CI_Model{ 
	private $table = 'toefl';
	private $pk = 'ID_TOEFL';
	public $id_toefl;
	public $id_monitoring;
	public $sudah_belum;
	public $tgl_tes;
	public $tgl_berlaku_sampai;
	public $penyelenggara;
	public $bukti_toefl;
	public $tgl_rencana;
	public $nilai;
	public $semester;

	public function getToefl($semester,$id){
		$query=$this->db->query("Select * from toefl where ID_TOEFL = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	public function saveToefl(){

		$post = $this->input->post();

		if ($post['status']==0) {
			$this->id_toefl = '';
			$this->id_monitoring = $post['idmonitor'];
			$this->semester = $post['semester'];
			$this->sudah_belum = $post['status'];
			$this->nilai = '0';
			$this->tgl_rencana = $post['tglrencana'];
		} else {
			$this->id_toefl = '';
			$this->id_monitoring = $post['idmonitor'];
			$this->semester = $post['semester'];
			$this->sudah_belum = $post['status'];
			$this->tgl_tes = $post['tgltes'];
			$this->tgl_berlaku_sampai = $post['tglberlaku'];
			$this->penyelenggara = $post['penyelenggara'];
			$this->nilai = $post['skortoefl'];
			$this->bukti_toefl = $this->_uploadFile('buktitoefl');
			$this->tgl_rencana = null;
		}

		$this->db->insert($this->table, $this);

	}

	public function upToefl($id){
		$post = $this->input->post();

		if ($post['status']==0) {
			$this->id_toefl = $id;
			$this->id_monitoring = $post['idmonitor'];
			$this->semester = $post['semester'];
			$this->sudah_belum = $post['status'];
			$this->tgl_rencana = $post['tglrencana'];
		} else {
			$this->id_toefl = $id;
			$this->id_monitoring = $post['idmonitor'];
			$this->semester = $post['semester'];
			$this->sudah_belum = $post['status'];
			$this->tgl_tes = $post['tgltes'];
			$this->tgl_berlaku_sampai = $post['tglberlaku'];
			$this->penyelenggara = $post['penyelenggara'];
			$this->nilai = $post['skortoefl'];
			if ($_FILES["buktitoefl"]["error"] != 4) {
				$this->bukti_toefl = $this->_uploadFile('buktitoefl');	
			} else {
				$this->bukti_toefl = $post['namafile'];
			}
			
			$this->tgl_rencana = null;
		}
		// echo "<pre>";
  //       print_r($this);
  //       die;

		$this->db->update($this->table, $this, array('ID_TOEFL' => $id));

	}

	private function _uploadFile($file)
	{
		$post = $this->input->post();
	    $config['upload_path']          = './file/monitoring/toefl/';
	    $config['allowed_types']        = 'pdf';
	    
	    $nama = basename($_FILES[$file]['name']);
	    $ext = pathinfo($nama, PATHINFO_EXTENSION);
	    $new_name = $file.'_'.$post['idmonitor'].'.pdf';

	    $config['file_name']            = $new_name;
	    $config['overwrite']			= true;
	    $config['max_size']             = 2000000; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

		
	    $this->load->library('upload', $config);

	    // if ($this->upload->do_upload('images')) {
	    //     return $this->upload->data("file_name");
	    // }
	    // else{
	    // 	$this->upload->display_errors();
	    // }

	    if(!empty($_FILES[$file]['name'])){
                if(!move_uploaded_file($_FILES[$file]["tmp_name"], "./file/monitoring/toefl/" . $config['file_name'])){
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








}
?>