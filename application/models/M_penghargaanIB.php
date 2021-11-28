<?php  
class M_penghargaanIB extends CI_Model{ 
	private $table = 'penghargaan_ib';
	private $pk = 'ID_PENGHARGAAN_IB';
	public $id_penghargaan_ib;
	public $id_monitoring_ib;
	public $nama_penghargaan;
	public $pemberi_penghargaan;
	public $tahun_penghargaan;
	public $file_upload_penghargaan;
	public $semester;


	public function rules(){
		return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'pemberi',
            'label' => 'Pemberi',
            'rules' => 'required'],
            
            ['field' => 'tahun',
            'label' => 'Tahun',
            'rules' => 'required']

        ];
	}

	public function getPenghargaan($semester,$id){
		$query=$this->db->query("Select * from penghargaan_ib where ID_PENGHARGAAN_IB = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}


	public function savePenghargaan(){
		$post = $this->input->post();
		
		$this->id_penghargaan_ib = '';
		$this->id_monitoring_ib = $post['idmonitor'];
		$this->semester = $post['semester'];
		$this->nama_penghargaan = $post['nama'];
		$this->pemberi_penghargaan = $post['pemberi'];
		$this->tahun_penghargaan = $post['tahun'];
		$this->file_upload_penghargaan = $this->_uploadFile();
		

		$this->db->insert($this->table, $this);

	}

	public function upPenghargaan(){
		$post = $this->input->post();
		
		$this->id_penghargaan_ib = $post['idpeng'];
		$this->id_monitoring_ib = $post['idmonitor'];
		$this->semester = $post['semester'];
		$this->nama_penghargaan = $post['nama'];
		$this->pemberi_penghargaan = $post['pemberi'];
		$this->tahun_penghargaan = $post['tahun'];

		if(!empty($_FILES["sertif"]["tmp_name"])){

		$this->file_upload_penghargaan = $this->_uploadFile1($post['filepeng']);

		} else {
			$this->file_upload_penghargaan = $post['filepeng'];			
		}
		

		$this->db->update($this->table, $this, array('id_penghargaan_ib' => $post['idpeng']));

	}

	private function _uploadFile()
	{
		$post = $this->input->post();
	    $config['upload_path']          = './file/monitoring/';
	    $config['allowed_types']        = 'pdf';
	    
	    $nama = basename($_FILES['sertif']['name']);
	    $ext = pathinfo($nama, PATHINFO_EXTENSION);
	    $new_name = 'penghargaan'.'_'.$post['idmonitor'].'_'.date('y-m-d').'.'.$ext;

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

	    if(!empty($_FILES['sertif']['name'])){
                if(!move_uploaded_file($_FILES['sertif']["tmp_name"], "./file/monitoring/" . $config['file_name'])){
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

	private function _uploadFile1($namee)
	{
		$post = $this->input->post();
	    $config['upload_path']          = './file/monitoring/';
	    $config['allowed_types']        = 'pdf';
	    
	    $nama = basename($_FILES['sertif']['name']);
	    $ext = pathinfo($nama, PATHINFO_EXTENSION);
	    $new_name = $namee.'.'.$ext;

	    $config['file_name']            = $new_name;
	    $config['overwrite']			= true;
	    $config['max_size']             = 80000; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

		
	    $this->load->library('upload', $config);

	    // if ($this->upload->do_upload('images')) {
	    //     return $this->upload->data("file_name");
	    // }
	    // else{
	    // 	$this->upload->display_errors();
	    // }

	    if(!empty($_FILES['sertif']['name'])){
                if(!move_uploaded_file($_FILES['sertif']["tmp_name"], "./file/monitoring/" . $config['file_name'])){
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