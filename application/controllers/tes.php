 <?php
  public function saveTb(){
        $this->load->model('M_Tubel_Dosen');
        $post = $this->input->post();
        $save = $this->M_Tubel_Dosen;
        $validasi = $this->form_validation;
        $validasi->set_rules($save->rules());
        // echo '<pre>';
        // print_r($post);
        // die;

        if($validasi->run()){
            $save->saveTB();
            redirect('C_dosen/uploadfile/');
        }

        //redirect('C_dosen/uploadfile/');
        echo "gagal";
    }

 public function uploadfile(){
        $this->load->model('M_Tubel_Dosen');
        $data['idTubel']= $this->M_Tubel_Dosen->getIdTubel();
        foreach ($data['idTubel'] as $key) {
            $id=$key->id_tubel;
        }
        $data['count']=$this->M_Tubel_Dosen->hitung($id);
        $data['file']= $this->M_Tubel_Dosen->upFile($id);
        $this->load->view('V_headerDosen');
        $this->load->view('V_uploadfileV2',$data);
        $this->load->view('V_footerDosen');
    }


function upload_fileV2($id = NULL){
        $this->load->model('M_file_upload');
        $post=$this->input->post();
        $model=$this->M_file_upload;
        
        $idjenis=$this->input->post('idjenis');
        $namafile =$this->input->post('namajenis');

        
        $config['upload_path'] = './file/tubel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']  = '800000';
        $idnew=$id;
        $config['id_tubel'] = $idnew;
        $nik=$this->session->userdata('NIK');


        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile.'_'.$nik.'_'.$idnew.'.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] =$namafile;

 
        $this->load->library('upload',$config);
            if(!empty($_FILES['file']['name'])){
                if(!move_uploaded_file($_FILES['file']["tmp_name"], "./file/tubel/" . $new_name)){
                    $this->upload->display_errors(); 
                } 
                else
                    $upload=$this->upload->data();
                    $model->save($config);
                   redirect('C_dosen/uploadfile/');
                    
            }

    }

?>