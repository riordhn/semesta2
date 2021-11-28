<?php  
class M_pengaktifanIB extends CI_Model{ 
	private $table = 'pengaktifan_ib';
	private $pk = 'id_pengaktifan_ib';
	public $id_pengaktifan_ib;
	public $id_ib;
	public $id_status_sl;
	public $tgl_lulus_ib;
	public $file_ijazah;




	public function saveLaporan(){
		$post = $this->input->post();

		
		$this->id_pengaktifan_ib = '';
		$this->id_ib = $post['idib'];
		$this->id_status_sl='12';
		$this->tgl_lulus_ib=$post['tgl'];
		$this->file_ijazah=$this->_uploadFile();


		$this->db->insert($this->table, $this);

	}


	private function _uploadFile()
	{
		$post = $this->input->post();
	    $config['upload_path']          = './file/laporan/';
	    $config['allowed_types']        = 'pdf';
	    
	    $nama = basename($_FILES['file']['name']);
	    $ext = pathinfo($nama, PATHINFO_EXTENSION);
	    $new_name = 'IjazahIbel_'.$post['idib'].'.'.$ext;

	    $config['file_name']            = $new_name;
	    $config['overwrite']			= true;
	    $config['max_size']             = 2000000; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

		
	    $this->load->library('upload', $config);

	    if(!empty($_FILES['file']['name'])){
                if(!move_uploaded_file($_FILES['file']["tmp_name"], "./file/laporan/" . $config['file_name'])){
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