<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class C_Age extends CI_Controller {
    function __construct(){
        parent::__construct();
      
        $this->load->helper(array('form'));
         if($this->session->userdata('masuk') != TRUE){
            $url=base_url('C_loginStaff');
            redirect($url);
        }

    }

    public function index(){
         if($this->session->userdata('akses')=='3'){
        $this->load->model('M_age');
        $data['baru']=$this->M_age->hitungSetnegBaru();
        $data['selesai']=$this->M_age->hitungSetnegSelesai();
        $data['baruP']=$this->M_age->hitungSetnegBaruP();
        $data['selesaiP']=$this->M_age->hitungSetnegSelesaiP();
     $this->load->view('V_headerAge');
     $this->load->view('V_dashboardAge',$data);
     $this->load->view('V_footerSubdit');
       }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

	public function usulanSetneg(){
        if($this->session->userdata('akses')=='3'){
         $this->load->model('M_age');
         $data['usulan']=$this->M_age->getUsulanSetneg();
     $this->load->view('V_headerAge');
     $this->load->view('V_tabelUsulanSetneg',$data);
     $this->load->view('V_footerSubdit');
       }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function riwayatAge(){
        if($this->session->userdata('akses')=='3'){
        $this->load->model('M_age');
        $data['tubel']=$this->M_age->riwayat();

     $this->load->view('V_headerAge');
     $this->load->view('V_riwayatAge', $data);
     $this->load->view('V_footerSubdit');
       }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

     public function dokumenSetnegAge(){
        if($this->session->userdata('akses')=='3'){
         $this->load->model('M_age');
         $data['usulan']=$this->M_age->getUsulanSetneg();
     $this->load->view('V_headerAge');
     $this->load->view('V_dokumenSetnegAge', $data);
     $this->load->view('V_footerSubdit');
       }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    function uploadfile_setneg($id = NULL){
        $this->load->model('M_file_upload');
        $model=$this->M_file_upload;
        $this->load->model('M_age');
        $up=$this->M_age;
        //$idjenis=$this->M_file_upload->getJenis();
        $a=1;

        $namafile = array('SETNEG');
        $idjenis= array('21');
        $config['upload_path'] = './file/tubel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']  = '2000000';
        $idnew=$id;
        $config['id_tubel'] = $idnew;
        $nik=$this->input->post('nik');

        $j=0;
        for($i=1; $i<=1 ; $i++) { 
        $nama = basename($_FILES[$id]['name']);
        $size = $_FILES[$id]['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile[$i-1].'_'.$nik.'_'.$idnew.'.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis[$i-1];
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] =$namafile[$i-1];
        $config['tgl_surat'] = $this->input->post('tgl_surat');
        $config['nomor_surat'] =$this->input->post('nomor_surat');
 
        $this->load->library('upload',$config);
            if(!empty($_FILES[$id]['name'])){
                if(!move_uploaded_file($_FILES[$id]["tmp_name"], "./file/tubel/" . $new_name)){
                    $this->upload->display_errors(); 
                } 
                else{
                    $upload=$this->upload->data();
                    $model->saveSPSTB($config);
                    //redirect('home/cindex');
                    echo "<pre>";
                    print_r($config);
                    echo "</pre>";
                        $j++;
                   }
                   // echo "File berhasil di upload";
                    //print_r($_FILES) ;
            }
        $a++;
            if($j==1){
                $up->updateSL6($idnew);
            }
    
        }
        // die;
        redirect('C_Age/');
    }

    public function usulanPerpanjanganSetneg(){
        if($this->session->userdata('akses')=='3'){
         $this->load->model('M_age');
         $data['usulan']=$this->M_age->getUsulanPerpanjanganSetneg();
     $this->load->view('V_headerAge');
     $this->load->view('V_tabelUsulanPerpanjanganSetneg',$data);
     $this->load->view('V_footerSubdit');
       }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

     public function dokumenPerpanjanganSetnegAge(){
        if($this->session->userdata('akses')=='3'){
         $this->load->model('M_age');
         $data['usulan']=$this->M_age->getUsulanPerpanjanganSetneg();
     $this->load->view('V_headerAge');
     $this->load->view('V_dokumenPerpanjanganSetnegAge', $data);
     $this->load->view('V_footerSubdit');
       }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    function uploadfile_PPsetneg($id = NULL){
        $this->load->model('M_age');
        $up=$this->M_age;
        //$idjenis=$this->M_file_upload->getJenis();
        $a=1;

        $namafile = array('Perpanjangan SETNEG');
        $idjenis= array('32');
        $config['upload_path'] = './file/perpanjangan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']  = '2000000';
        $idnew=$id;
        $config['id_perpanjangan'] = $idnew;
        $nik=$this->input->post('nik');

        $j=0;
        for($i=1; $i<=1 ; $i++) { 
        $nama = basename($_FILES[$id]['name']);
        $size = $_FILES[$id]['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile[$i-1].'_'.$nik.'_'.$idnew.'.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis[$i-1];
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] =$namafile[$i-1];
        // $config['tgl_surat'] = $this->input->post('tgl_surat');
        // $config['nomor_surat'] =$this->input->post('nomor_surat');
 
        $this->load->library('upload',$config);
            if(!empty($_FILES[$id]['name'])){
                if(!move_uploaded_file($_FILES[$id]["tmp_name"], "./file/perpanjangan/" . $new_name)){
                    $this->upload->display_errors(); 
                } 
                else{
                    $upload=$this->upload->data();
                    $up->saveSPerpanjanganSetneg($config);
                    //redirect('home/cindex');
                    echo "<pre>";
                    print_r($config);
                    echo "</pre>";
                        $j++;
                   }
                   // echo "File berhasil di upload";
                    //print_r($_FILES) ;
            }
        $a++;
            if($j==1){
                $up->updateSL6P($idnew);
            }
    
        }
        // die;
        redirect('C_Age/');
    }

    
}
    

?>