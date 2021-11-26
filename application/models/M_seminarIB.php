<?php  
class M_seminarIB extends CI_Model{ 
	private $table = 'seminar_pelatihan_ib';
	private $pk = 'ID_KEGIATAN_IB';
	public $id_kegiatan_ib;
	public $id_monitoring_ib;
	public $jenis_kegiatan;
	public $nama_kegiatan;
	public $penyelenggara_kegiatan;
	public $negara;
	public $tahun_kegiatan;
	public $file_upload_bukti;
	public $semester;


	public function rules(){
		return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'jenis',
            'label' => 'Jenis',
            'rules' => 'required'],

            ['field' => 'penyelenggara',
            'label' => 'Penyelenggara',
            'rules' => 'required'],
            
            ['field' => 'negara',
            'label' => 'negara',
            'rules' => 'required'],

            ['field' => 'tahun',
            'label' => 'Tahun',
            'rules' => 'required']

        ];
	}

	public function getSeminar($semester,$id){
		$query=$this->db->query("Select * from seminar_pelatihan_ib where ID_KEGIATAN_IB = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	public function getNegara(){   
		return $this->db->get('negara')->result();  
	} 



	public function saveSeminar(){
		$post = $this->input->post();
		
		$this->id_kegiatan_ib = '';
		$this->id_monitoring_ib = $post['idmonitor'];
		$this->semester = $post['semester'];
		$this->nama_kegiatan = $post['nama'];
		$this->jenis_kegiatan = $post['jenis'];
		$this->penyelenggara_kegiatan = $post['penyelenggara'];
		$this->tahun_kegiatan = $post['tahun'];
		$this->negara = $post['negara'];
		$this->file_upload_bukti = $this->_uploadFile();
		

		$this->db->insert($this->table, $this);

	}

	public function upSeminar(){
		$post = $this->input->post();
		
		$this->id_kegiatan_ib = $post['idkeg'];
		$this->id_monitoring_ib = $post['idmonitor'];
		$this->semester = $post['semester'];
		$this->nama_kegiatan = $post['nama'];
		$this->jenis_kegiatan = $post['jenis'];
		$this->penyelenggara_kegiatan = $post['penyelenggara'];
		$this->tahun_kegiatan = $post['tahun'];
		$this->negara = $post['negara'];

		if(!empty($_FILES["sertif"]["tmp_name"])){

		$this->file_upload_bukti = $this->_uploadFile1($post['filekeg']);

		} else {
			$this->file_upload_bukti = $post['filekeg'];			
		}
		

		$this->db->update($this->table, $this, array('id_kegiatan_ib' => $post['idkeg']));

	}

	private function _uploadFile()
	{
		$post = $this->input->post();
	    $config['upload_path']          = './file/monitoring/';
	    $config['allowed_types']        = 'pdf';
	    
	    $nama = basename($_FILES['sertif']['name']);
	    $ext = pathinfo($nama, PATHINFO_EXTENSION);
	    $new_name = 'Sertif Kegiatan'.'_'.$post['idmonitor'].'_'.date('y-m-d').'.pdf';

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
	    $new_name = $namee.'.pdf';

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