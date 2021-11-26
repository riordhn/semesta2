<?php  
class M_tugasAkhirIB extends CI_Model{ 
	private $table = 'tugas_akhir_ib';
	private $pk = 'ID_TUGAS';
	public $id_tugas;
	public $id_monitoring_ib; 
	public $semester;
	public $bukti_bimbingan; 
	public $ujian_proposal;
	public $tgl_ujian_proposal;
	public $tgl_rencana_up;
	public $penilaian_plagiasi;
	public $hasil;
	public $tgl_tes;
	public $tgl_rencana;
	public $seminar_akhir; 
	public $kategori_sa;
	public $tgl_sa;
	public $tgl_rencana_sa; 
	public $bukti_sa; 


	public function getTugas($semester,$id){
		$query=$this->db->query("Select * from tugas_akhir_ib where ID_TUGAS = '$id' AND SEMESTER='$semester'");

		return $query->result();
	}

	public function updateSemester($id,$semester){
		$query=$this->db->query("UPDATE monitoring_ib SET SEMESTER_SEKARANG='$semester' where ID_MONITORING_IB = '$id'");
	}

	public function updateTotalSemester($id,$semester){
		$query=$this->db->query("UPDATE monitoring_ib SET TOTAL_SEMESTER='$semester' where ID_MONITORING_IB = '$id'");
	}


	public function saveTA(){
		$post = $this->input->post();
		
		$this->id_tugas = '';
		$this->id_monitoring_ib = $post['idmonitor'];
		$this->semester = $post['semester'];
		$this->bukti_bimbingan = $this->_uploadFile('buktibimbingan');
		$this->ujian_proposal = $post['statusupros'];
		$this->tgl_ujian_proposal = $post['tglupros'];
		$this->tgl_rencana_up = $post['tglrencanaupros'];
		$this->penilaian_plagiasi = $post['statuskelnas'];
		$this->hasil = $post['hasilpenilaian'];
		$this->tgl_tes = $post['tglkelnas'];
		$this->tgl_rencana = $post['tglrencanakelnas'];
		$this->seminar_akhir = $post['statusseminar'];
		$this->kategori_sa = $post['kategoriseminar'];
		$this->tgl_sa = $post['tglseminar'];
		$this->tgl_rencana_sa = $post['tglrencanaseminar'];
		$this->bukti_sa = $this->_uploadFile('buktiseminar'); 
		// echo "<pre>";
  //       print_r($this);
  //       die;

		$this->db->insert($this->table, $this);

	}

	public function upTA($id){
		$post = $this->input->post();
		
		$this->id_tugas = $id;
		$this->id_monitoring_ib = $post['idmonitor'];
		$this->semester = $post['semester'];
		$this->ujian_proposal = $post['statusupros'];
		if ($post['statusupros']==1) {
		$this->tgl_ujian_proposal = $post['tglupros'];
		$this->tgl_rencana_up = NULL;
		} else {
		$this->tgl_ujian_proposal = NULL;
		$this->tgl_rencana_up = $post['tglrencanaupros'];
		}
		$this->penilaian_plagiasi = $post['statuskelnas'];
		if ($post['statuskelnas']==1) {
		$this->hasil = $post['hasilpenilaian'];
		$this->tgl_tes = $post['tglkelnas'];
		$this->tgl_rencana = NULL;
		} else {
		$this->hasil = '0';
		$this->tgl_tes = NULL;
		$this->tgl_rencana = $post['tglrencanakelnas'];
		}
		$this->seminar_akhir = $post['statusseminar'];
		if ($post['statusseminar']==1) {
		$this->kategori_sa = $post['kategoriseminar'];
		$this->tgl_sa = $post['tglseminar'];
		$this->tgl_rencana_sa = NULL;
		} else {
		$this->kategori_sa = NULL;
		$this->tgl_sa = NULL;
		$this->tgl_rencana_sa = $post['tglrencanaseminar'];
		} 

		if(!empty($_FILES["buktibimbingan"]["tmp_name"])){

		$this->bukti_bimbingan = $this->_uploadFile('buktibimbingan');

		} else {
			$this->bukti_bimbingan = $post['namabimbingan'];			
		}

		if(!empty($_FILES["buktiseminar"]["tmp_name"])){

		$this->bukti_sa = $this->_uploadFile('buktiseminar'); 

		} else {
			$this->bukti_sa = $post['namasa'];			
		}

		// echo "<pre>";
		// print_r($this);
		// die;
		

		$this->db->update($this->table, $this, array('id_tugas' => $id));

	}


	private function _uploadFile($file)
	{
		$post = $this->input->post();
	    $config['upload_path']          = './file/monitoringIB/tugas/';
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
                if(!move_uploaded_file($_FILES[$file]["tmp_name"], "./file/monitoringIB/tugas/" . $config['file_name'])){
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