<?php  
class M_publikasi extends CI_Model{ 
	private $table = 'publikasi';
	private $pk = 'ID_PUBLIKASI';
	public $id_publikasi;
	public $id_monitoring;
	public $semester;
	public $sudah_belum;
	public $kategori_publikasi;
	public $nama_publikasi;
	public $tgl_submit;
	public $progress_jurnal;
	public $bukti_publikasi;
	public $tgl_rencana;


	// public function rules(){
	// 	return [
 //            ['field' => 'judul',
 //            'label' => 'Judul',
 //            'rules' => 'required'],

 //            ['field' => 'penulis',
 //            'label' => 'penulis_ke_berapa',
 //            'rules' => 'required'],
            
 //            ['field' => 'afiliasi',
 //            'label' => 'afiliasi',
 //            'rules' => 'required'],

 //            ['field' => 'issn',
 //            'label' => 'issn',
 //            'rules' => 'required'],

 //            ['field' => 'tahun',
 //            'label' => 'tahun',
 //            'rules' => 'required'],

 //            ['field' => 'link',
 //            'label' => 'link',
 //            'rules' => 'required']

 //        ];
	// }

	public function getPublikasi($id){
		$query=$this->db->query("Select * from publikasi where ID_PUBLIKASI = '$id'");

		return $query->result();
	}


	public function savePublikasi(){

		$post = $this->input->post();

		if ($post['status']==0) {
			$this->id_publikasi = '';
			$this->id_monitoring = $post['idmonitor'];
			$this->semester = $post['semester'];
			$this->sudah_belum = $post['status'];
			$this->tgl_rencana = $post['tglrencana'];
		} else {
			$this->id_publikasi = '';
			$this->id_monitoring = $post['idmonitor'];
			$this->semester = $post['semester'];
			$this->sudah_belum = $post['status'];
			$this->kategori_publikasi = $post['kategoripublikasi'];
			$this->nama_publikasi = $post['namapublikasi'];
			$this->tgl_submit = $post['tglpublikasi'];
			$this->progress_jurnal = $post['progrespublikasi'];
			$this->bukti_publikasi = $this->_uploadFile('buktipublikasi');
			$this->tgl_rencana = null;
		}

		$this->db->insert($this->table, $this);

	}

	public function upPublikasi($id){
		$post = $this->input->post();

		if ($post['status']==0) {
			$this->id_publikasi = $id;
			$this->id_monitoring = $post['idmonitor'];
			$this->semester = $post['semester'];
			$this->sudah_belum = '0';
			$this->tgl_rencana = $post['tglrencana'];
		} else {
			$this->id_publikasi = $id;
			$this->id_monitoring = $post['idmonitor'];
			$this->semester = $post['semester'];
			$this->sudah_belum = $post['status'];
			$this->kategori_publikasi = $post['kategoripublikasi'];
			$this->nama_publikasi = $post['namapublikasi'];
			$this->tgl_submit = $post['tglpublikasi'];
			$this->progress_jurnal = $post['progrespublikasi'];
			if ($_FILES["buktipublikasi"]["error"] != 4) {
				$this->bukti_publikasi = $this->_uploadFile('buktipublikasi');	
			} else {
				$this->bukti_publikasi = $post['namafile'];
			}
			
			$this->tgl_rencana = null;
		}
		// echo "<pre>";
  //       print_r($this);
  //       die;

		$this->db->update($this->table, $this, array('ID_PUBLIKASI' => $id));

	}

	private function _uploadFile($file)
	{
		$post = $this->input->post();
	    $config['upload_path']          = './file/monitoring/publikasi/';
	    $config['allowed_types']        = 'pdf';
	    
	    $nama = basename($_FILES[$file]['name']);
	    $ext = pathinfo($nama, PATHINFO_EXTENSION);
	    $new_name = $file.'_'.trim($post['idmonitor'], ' ').'.'.$ext;

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
                if(!move_uploaded_file($_FILES[$file]["tmp_name"], "./file/monitoring/publikasi/" . $config['file_name'])){
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