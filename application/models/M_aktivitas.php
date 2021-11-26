<?php  
class M_aktivitas extends CI_Model{ 
	private $table = 'aktivitas_studi';
	private $pk = 'ID_AKTIVITAS';
	public $id_aktivitas;
	public $id_monitoring;
	public $semester;
	public $dosbing_1;
	public $dosbing_2;
	public $topik_judul_disertasi;
	public $presentase_disertasi;
	public $presentase_kelulusan;
	public $penjelasan_kemajuan_studi;
	public $langkah_konkrit_smt_depan;


	// public function rules(){
	// 	return [
 //            ['field' => 'sks',
 //            'label' => 'SKS',
 //            'rules' => 'required'],

 //            ['field' => 'ipk',
 //            'label' => 'IPK',
 //            'rules' => 'required'],
            
 //            ['field' => 'ips',
 //            'label' => 'IPS',
 //            'rules' => 'required']


 //        ];
	// }

	public function getAktifitas($semester,$id){
		$query=$this->db->query("SELECT * from aktivitas_studi where ID_AKTIVITAS = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}


	public function saveAktivitas(){
		$post = $this->input->post();

		
		$this->id_aktivitas = '';
		$this->id_monitoring = $post['idmonitor'];
		$this->semester = $post['semester'];
		$this->dosbing_1 = $post['dos1'];
		$this->dosbing_2 = $post['dos2'];
		$this->topik_judul_disertasi = $post['topik'];
		$this->presentase_disertasi = $post['persenta'];
		$this->presentase_kelulusan = $post['persenkel'];
		$this->penjelasan_kemajuan_studi = $post['kemajuan'];
		$this->langkah_konkrit_smt_depan = $post['langkah'];
		

		$this->db->insert($this->table, $this);

	}

	public function upAktivitas($id){
		$post = $this->input->post();

		
		$this->id_aktivitas = $id;
		$this->id_monitoring = $post['idmonitor'];
		$this->semester = $post['semester'];
		$this->dosbing_1 = $post['dos1'];
		$this->dosbing_2 = $post['dos2'];
		$this->topik_judul_disertasi = $post['topik'];
		$this->presentase_disertasi = $post['persenta'];
		$this->presentase_kelulusan = $post['persenkel'];
		$this->penjelasan_kemajuan_studi = $post['kemajuan'];
		$this->langkah_konkrit_smt_depan = $post['langkah'];

		$this->db->update($this->table, $this, array('id_aktivitas' => $id));

	}

	public function updateSemester($id,$semester){
		$query=$this->db->query("UPDATE monitoring SET SEMESTER_SEKARANG='$semester' where ID_MONITORING = '$id'");
	}


	private function _uploadFile($file)
	{
		$post = $this->input->post();
	    $config['upload_path']          = './file/monitoring/aktivitas/';
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

	    // if ($this->upload->do_upload('images')) {
	    //     return $this->upload->data("file_name");
	    // }
	    // else{
	    // 	$this->upload->display_errors();
	    // }

	    if(!empty($_FILES[$file]['name'])){
                if(!move_uploaded_file($_FILES[$file]["tmp_name"], "./file/monitoring/aktivitas/" . $config['file_name'])){
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