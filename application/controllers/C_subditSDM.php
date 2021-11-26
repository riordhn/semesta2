<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_subditSDM extends CI_Controller {
    function __construct(){
        parent::__construct();
      
        $this->load->helper(array('form'));
         if($this->session->userdata('masuk') != TRUE){
            $url=base_url('C_loginStaff');
            redirect($url);
        }

    }

    public function index(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_Tubel_Subdit');
            $data['tubel']= $this->M_Tubel_Subdit->getTubel();
            $data['tubel1']= $this->M_Tubel_Subdit->hitungDash('1');
            $data['tubel2']= $this->M_Tubel_Subdit->hitungDashSDM();
            $data['tubel3']= $this->M_Tubel_Subdit->hitungDash('5');
            $data['tubel4']= $this->M_Tubel_Subdit->hitungDash('7');
            $data['ibel1']= $this->M_Tubel_Subdit->hitungDashIB('1');
            $data['ibel2']= $this->M_Tubel_Subdit->hitungDashSDMIB();
            $data['ibel4']= $this->M_Tubel_Subdit->hitungDashIB('7');
        
            $data['pp']= $this->M_Tubel_Subdit->hitungpp();
            $data['pk']= $this->M_Tubel_Subdit->hitungpk();
            $this->load->view('V_headerSubdit');
            $this->load->view('V_dashboardSubdit', $data);
            $this->load->view('V_footerSubdit');
             }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }

    }


    public function detailDashboard($sl=null){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_Tubel_Subdit');
         $data['tubel']= $this->M_Tubel_Subdit->getTubelStatusSL($sl);
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailDashboardSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailDashboardIB($sl=null){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_Tubel_Subdit');
         $data['tubel']= $this->M_Tubel_Subdit->getIbelStatusSL($sl);
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailDashboardSDMIB',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailDashboardSDM(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_Tubel_Subdit');
         $data['tubel']= $this->M_Tubel_Subdit->getTubelSDM();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailDashboardSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailDashboardSDMIB(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_Tubel_Subdit');
         $data['tubel']= $this->M_Tubel_Subdit->getIbelSDM();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailDashboardSDMIB',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

   public function usulanTBSubdit(){
        if($this->session->userdata('akses')=='2'){
         $this->load->model('M_Tubel_Subdit');
         $data['tubel']= $this->M_Tubel_Subdit->getTubelPros();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_tabelTBSubdit', $data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function prosesTBSubdit($idTub){
        if($this->session->userdata('akses')=='2'){
         $this->load->model('M_Tubel_Subdit');
         $data['file']=$this->M_Tubel_Subdit->getFile($idTub);
         $data['tub']=$this->M_Tubel_Subdit->getStatusTub($idTub);
         $data['bio']=$this->M_Tubel_Subdit->bio($idTub);
         $data['confirm']=$this->M_Tubel_Subdit->cekFile($idTub);
         $this->load->view('V_headerSubdit');
         $this->load->view('V_prosesTBSubdit',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

     public function uploadFileSp(){
         if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Tubel_Subdit');
        $data['tubel']= $this->M_Tubel_Subdit->getTubelDiterima();
        $this->load->view('V_headerSubdit');
        $this->load->view('V_uploadSP_STB',$data);
        $this->load->view('V_footerSubdit');
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    function uploadfile_SP($id = NULL){
        $this->load->model('M_file_upload');
        $model=$this->M_file_upload;
        $this->load->model('M_Tubel_Subdit');
        $up=$this->M_Tubel_Subdit;
        
        $nik=$this->input->post('nik');
        $namafile =$this->input->post('namafile');
        $idjenis=$this->input->post('jenisfile');
        $lokasi=$this->input->post('lokasi');
        $config['upload_path'] = './file/tubel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']  = '2000000';
        $config['id_tubel'] = $id;
        $nama = basename($_FILES[$id]['name']);
        $size = $_FILES[$id]['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile.'_'.$nik.'_'.$id.'.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] =$namafile;
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
                    echo "<pre>";
                    print_r($config);
                    echo "</pre>";
                }
            }
        $cek=$up->cekSPSTB($id);
        // $a=$cek[0]->NUM;
        // echo $a;
        if($cek[0]->NUM=='2'){
            if($lokasi=='1'){
                $up->updateSL5($id);
                $up->createMon($id);
                
            } else {
                $up->updateSL10($id);
                $up->createMon($id);
            }
        }

        redirect('C_subditSDM/uploadFileSp');
    }

     public function uploadSKPembebasan(){
        if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Tubel_Subdit');
        $data['tubel']= $this->M_Tubel_Subdit->getTubelSSL6();
     $this->load->view('V_headerSubdit');
     $this->load->view('V_uploadSK_Pembebasan',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

     function uploadfile_SKP($id = NULL){

        $this->load->model('M_file_upload');
        $model=$this->M_file_upload;
        $this->load->model('M_Tubel_Subdit');
        $up=$this->M_Tubel_Subdit;
       
        //$a=$cek[0]->NUM;
        $nik=$this->input->post('nik');
        $namafile =$this->input->post('namafile');
        $idjenis=$this->input->post('jenisfile');
        $lokasi=$this->input->post('lokasi');
        $config['upload_path'] = './file/tubel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']  = '2000000';
        $config['id_tubel'] = $id;
        $nama = basename($_FILES[$id]['name']);
        $size = $_FILES[$id]['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile.'_'.$nik.'_'.$id.'.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] =$namafile;
         $config['tgl_surat'] = $this->input->post('tgl_surat');
        $config['nomor_surat'] =$this->input->post('nomor_surat');
 
 
        $this->load->library('upload',$config);
            if(!empty($_FILES[$id]['name'])){
                if(!move_uploaded_file($_FILES[$id]["tmp_name"], "./file/tubel/" . $new_name)){
                    $this->upload->display_errors(); 
                } 
                else{
                    $upload=$this->upload->data();
                    $model->saveSKP($config);
                    echo "<pre>";
                    print_r($config);
                    echo "</pre>";
                    
                }
            }
         $cek=$up->cekSKP($id);
         if($cek[0]->NUM==2){
            $up->updateSL7($id);
        }
        redirect('C_subditSDM/uploadSKPembebasan');
    }

    public function prosesFileTB(){
        if($this->session->userdata('akses')=='2'){
        $idtub= $_POST['ID_TUB'];
        $this->load->model('M_Tubel_Subdit');
        $this->M_Tubel_Subdit->updateFileTB();
        $this->prosesTBSubdit($idtub);
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function finalDokumen(){
        if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Tubel_Subdit');
        $this->M_Tubel_Subdit->penerimaanTubel();
        $this->uploadFileSp();
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }

    }

    public function usulanIBSubdit(){
        if($this->session->userdata('akses')=='2'){
    $this->load->model('M_Ibel_Subdit');
    $data['ibel']= $this->M_Ibel_Subdit->getIbel();
     $this->load->view('V_headerSubdit');
     $this->load->view('V_tabelIBSubdit',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function prosesIBSubdit($idib){
        if($this->session->userdata('akses')=='2'){
      $this->load->model('M_Ibel_Subdit');
         $data['file']=$this->M_Ibel_Subdit->getFile($idib);
         $data['tub']=$this->M_Ibel_Subdit->getStatusIb($idib);
        $data['bio']=$this->M_Ibel_Subdit->bio($idib);
         $data['confirm']=$this->M_Ibel_Subdit->cekFile($idib);
         $this->load->view('V_headerSubdit');
         $this->load->view('V_prosesIBSubdit',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function prosesFileIB(){
        if($this->session->userdata('akses')=='2'){
        $idtub= $_POST['ID_IB'];
        $this->load->model('M_Ibel_Subdit');
        $this->M_Ibel_Subdit->updateFileIB();
        $this->prosesIBSubdit($idtub);
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function finalDokumenIbel(){
        if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Ibel_Subdit');
        $this->M_Ibel_Subdit->penerimaanIbel();
        $this->uploadFileIBSubdit();
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }


    public function uploadFileIBSubdit(){
      if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Ibel_Subdit');
        $data['tubel']= $this->M_Ibel_Subdit->getIbelDiterima();
        $this->load->view('V_headerSubdit');
        $this->load->view('V_uploadFileIBSubdit',$data);
        $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    function uploadfile_SKIB($id = NULL){
        $this->load->model('M_file_upload_IB');
        $model=$this->M_file_upload_IB; //ibell
        $this->load->model('M_Ibel_Subdit');
        $up=$this->M_Ibel_Subdit;
        //$idjenis=$this->M_file_upload->getJenis();
        $namafile ='SK Izin Belajar';
        $idjenis='53'; //ntar diganti
        $config['upload_path'] = './file/ibel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']  = '2000000';
        $config['id_ibel'] = $id;
        $nik=$this->input->post('nik');
        $nama = basename($_FILES[$id]['name']);
        $size = $_FILES[$id]['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile.'_'.$nik.'_'.$id.'.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] =$namafile;
 
        $this->load->library('upload',$config);
            if(!empty($_FILES[$id]['name'])){
                if(!move_uploaded_file($_FILES[$id]["tmp_name"], "./file/ibel/" . $new_name)){
                    $this->upload->display_errors(); 
                } 
                else{
                    $upload=$this->upload->data();
                    $model->saveSPSTB($config);
                    //redirect('home/cindex');
                    echo "<pre>";
                    print_r($config);
                    echo "</pre>";
                    $up->updateSL7($id);
                   }
                   // echo "File berhasil di upload";
                    //print_r($_FILES) ;
            }
        
        // die;
        redirect('C_subditSDM/');
    }

    public function detailMonitoring($smt=null){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonSubdit');
         $data['tubel']= $this->M_MonSubdit->getMonitoringSmt($smt);
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

     public function detailMonitoringSmt7(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonSubdit');
         $data['tubel']= $this->M_MonSubdit->getMonitoring7();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }


    public function detailMonitoringSemua(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonSubdit');
         $data['tubel']= $this->M_MonSubdit->getMonitoring();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailMonitoringTh(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonSubdit');
         $data['tubel']= $this->M_MonSubdit->getMonitoringTh();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailMonitoringIndi(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonSubdit');
         $data['tubel']= $this->M_MonSubdit->getMonitoringIndi();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailMonitoringLulus(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonSubdit');
         $data['tubel']= $this->M_MonSubdit->getMonitoringLulus();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

     public function dokumenSetnegSubdit(){
        if($this->session->userdata('akses')=='2'){
     $this->load->model('M_Tubel_Subdit');
         $data['tubel']= $this->M_Tubel_Subdit->getSetneg();
     $this->load->view('V_headerSubdit');
     $this->load->view('V_dokumenSetnegSubdit',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function monitoringSubdit(){
        if($this->session->userdata('akses')=='2'){
        $this->load->model('M_MonSubdit');
        $data['mon']=$this->M_MonSubdit->getMonitoring();
        $data['smt1']=$this->M_MonSubdit->hitungPerSMT(1);
        $data['smt2']=$this->M_MonSubdit->hitungPerSMT(2);
        $data['smt3']=$this->M_MonSubdit->hitungPerSMT(3);
        $data['smt4']=$this->M_MonSubdit->hitungPerSMT(4);
        $data['smt5']=$this->M_MonSubdit->hitungPerSMT(5);
        $data['smt6']=$this->M_MonSubdit->hitungPerSMT(6);
        $data['smt7']=$this->M_MonSubdit->hitungSmt7();
        $data['semua']=$this->M_MonSubdit->hitungSemua();
        $data['semua80']=$this->M_MonSubdit->hitung80();
        $data['semuaTarget']=$this->M_MonSubdit->hitungTarget(date('Y'));
        $data['semuaLulus']=$this->M_MonSubdit->hitungLulus();
        $this->load->view('V_headerSubdit');
        $this->load->view('V_monitoringSDM', $data);
        $this->load->view('V_footerSubdit');
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailMonevSDM($idmon=null){
        if($this->session->userdata('akses')=='2'){
        $this->load->model('M_MonSubdit');
        $data['mon']=$this->M_MonSubdit->getDet($idmon);
        $data['sekarang']=$this->M_MonSubdit->getSekarang($idmon);
        $data['aktivitas']=$this->M_MonSubdit->getAktivitas($idmon);
        $data['tugas_akhir']=$this->M_MonSubdit->getTA($idmon);
        $data['publikasi']=$this->M_MonSubdit->getPublikasi($idmon);
        $data['toefl']=$this->M_MonSubdit->getTOEFL($idmon);
        $this->load->view('V_headerSubdit');
        $this->load->view('V_detailMonevSDM1', $data);
        $this->load->view('V_footerSubdit');
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    //ibel
    public function detailMonitoringIB($smt=null){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonIbelSubdit');
         $data['tubel']= $this->M_MonIbelSubdit->getMonitoringSmt($smt);
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDMIB',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

     public function detailMonitoringSmt7IB(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonIbelSubdit');
         $data['tubel']= $this->M_MonIbelSubdit->getMonitoring7();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDMIB',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }


    public function detailMonitoringSemuaIB(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonIbelSubdit');
         $data['tubel']= $this->M_MonIbelSubdit->getMonitoring();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDMIB',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailMonitoringThIB(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonIbelSubdit');
         $data['tubel']= $this->M_MonIbelSubdit->getMonitoringTh();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDMIB',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailMonitoringIndiIB(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonIbelSubdit');
         $data['tubel']= $this->M_MonIbelSubdit->getMonitoringIndi();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailMonitoringLulusIB(){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_MonIbelSubdit');
         $data['tubel']= $this->M_MonIbelSubdit->getMonitoringLulus();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_detailMonDashSDMIB',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    //  public function dokumenSetnegSubditIB(){
    //      $this->load->model('M_Tubel_Subdit');
    //      $data['tubel']= $this->M_Tubel_Subdit->getSetneg();
    //  $this->load->view('V_headerSubdit');
    //  $this->load->view('V_dokumenSetnegSubdit',$data);
    //  $this->load->view('V_footerSubdit');
    // }

    public function monitoringSubditIB(){
         if($this->session->userdata('akses')=='2'){
        $this->load->model('M_MonIbelSubdit');
        $data['mon']=$this->M_MonIbelSubdit->getMonitoring();
        $data['smt1']=$this->M_MonIbelSubdit->hitungPerSMT(1);
        $data['smt2']=$this->M_MonIbelSubdit->hitungPerSMT(2);
        $data['smt3']=$this->M_MonIbelSubdit->hitungPerSMT(3);
        $data['smt4']=$this->M_MonIbelSubdit->hitungPerSMT(4);
        $data['smt5']=$this->M_MonIbelSubdit->hitungPerSMT(5);
        $data['smt6']=$this->M_MonIbelSubdit->hitungPerSMT(6);
        $data['smt7']=$this->M_MonIbelSubdit->hitungSmt7();
        $data['semua']=$this->M_MonIbelSubdit->hitungSemua();
        $data['semua80']=$this->M_MonIbelSubdit->hitung80();
        $data['semuaTarget']=$this->M_MonIbelSubdit->hitungTarget(date('Y'));
        $data['semuaLulus']=$this->M_MonIbelSubdit->hitungLulus();
        $this->load->view('V_headerSubdit');
        $this->load->view('V_monitoringIbelSDM', $data);
        $this->load->view('V_footerSubdit');
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function detailMonevSDMIB($idmon=null){
         if($this->session->userdata('akses')=='2'){
        //     $data['mon']=$this->M_MonSubdit->getDet($idmon);
        // $data['sekarang']=$this->M_MonSubdit->getSekarang($idmon);
        // $data['aktivitas']=$this->M_MonSubdit->getAktivitas($idmon);
        // $data['tugas_akhir']=$this->M_MonSubdit->getTA($idmon);
        // $data['publikasi']=$this->M_MonSubdit->getPublikasi($idmon);
        // $data['toefl']=$this->M_MonSubdit->getTOEFL($idmon);
        $this->load->model('M_MonIbelSubdit');
        $data['mon']=$this->M_MonIbelSubdit->getDet($idmon);
        $data['sekarang']=$this->M_MonIbelSubdit->getSekarang($idmon);
        $data['aktivitas']=$this->M_MonIbelSubdit->getAktivitas($idmon);
        $data['publikasi']=$this->M_MonIbelSubdit->getPublikasi($idmon);
        $data['tugas_akhir']=$this->M_MonIbelSubdit->getTA($idmon);
        $data['toefl']=$this->M_MonIbelSubdit->getTOEFL($idmon);
        $this->load->view('V_headerSubdit');
        $this->load->view('V_detailMonevSDM1', $data);
        $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function laporanIBSubdit(){
          if($this->session->userdata('akses')=='2'){
         $this->load->model('M_Ibel_Subdit');
        $data['mon']=$this->M_Ibel_Subdit->getLaporan();
        $this->load->view('V_headerSubdit');
        $this->load->view('V_laporanIB', $data);
        $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }
    //ibel

    public function perpanjanganSubdit(){
          if($this->session->userdata('akses')=='2'){
         $this->load->model('M_Perpanjangan_Subdit');
          $data['tubel']= $this->M_Perpanjangan_Subdit->getPerpanjanganPros();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_perpanjanganSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function prosesPerpanjanganSubdit($idp){
        if($this->session->userdata('akses')=='2'){
            $this->load->model('M_Perpanjangan_Subdit');
            $data['file']=$this->M_Perpanjangan_Subdit->getFile($idp);
            $data['tub']=$this->M_Perpanjangan_Subdit->getStatusP($idp);
            $data['bio']=$this->M_Perpanjangan_Subdit->bio($idp);
            $data['filelama']=$this->M_Perpanjangan_Subdit->getFileLama($data['tub'][0]->ID_TUBEL);
            $data['confirm']=$this->M_Perpanjangan_Subdit->cekFile($idp);
            $this->load->view('V_headerSubdit');
            $this->load->view('V_prosesPerpanjanganSDM', $data);
            $this->load->view('V_footerSubdit');
            //print_r($data['tub'][0]->ID_TUBEL);
        }else{
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function prosesFilePerpanjangan(){
          if($this->session->userdata('akses')=='2'){
        $idtub= $_POST['ID_PERPANJANGAN'];
        $this->load->model('M_Perpanjangan_Subdit');
        $this->M_Perpanjangan_Subdit->updateFilePerpanjangan();
        $this->prosesPerpanjanganSubdit($idtub);
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function finalDokumenPerpanjangan(){
         if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Perpanjangan_Subdit');
        $this->M_Perpanjangan_Subdit->penerimaanPerpanjangan();
        $this->uploadSP_perpanjanganSubdit();
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function uploadSP_perpanjanganSubdit(){
         if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Perpanjangan_Subdit');
        $data['tubel']= $this->M_Perpanjangan_Subdit->getPerpanjanganDiterima();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_uploadPerpanjanganSDM', $data);
         $this->load->view('V_footerSubdit');
           }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    function uploadfile_SPP($id = NULL){
        $this->load->model('M_Perpanjangan_Subdit');
        $model=$this->M_Perpanjangan_Subdit;
        //$idjenis=$this->M_file_upload->getJenis();
        $namafile ='Surat Perjanjian Perpanjangan TB';
        $idjenis='29'; //ntar diganti
        $config['upload_path'] = './file/perpanjangan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']  = '2000000';
        $config['id_perpanjangan'] = $id;
        $nik=$this->input->post('nik');
        $lokasi=$this->input->post('lokasi');
        $nama = basename($_FILES[$id]['name']);
        $size = $_FILES[$id]['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile.'_'.$nik.'_'.$id.'.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] =$namafile;
 
        $this->load->library('upload',$config);
            if(!empty($_FILES[$id]['name'])){
                if(!move_uploaded_file($_FILES[$id]["tmp_name"], "./file/perpanjangan/" . $new_name)){
                    $this->upload->display_errors(); 
                } 
                else{
                    $upload=$this->upload->data();
                    $model->saveSPP($config);
                    //redirect('home/cindex');
                    echo "<pre>";
                    print_r($config);
                    echo "</pre>";
                    $cek=$model->cekSPPSPTB($id);
                    // $a=$cek[0]->NUM;
                    // echo $a;
                    if($cek[0]->NUM=='2'){
                        if($lokasi=='1'){
                            $model->updateSL5($id);
                        } else {
                            $model->updateSL10($id);
                        }
                    }
                }
                   // echo "File berhasil di upload";
                    //print_r($_FILES) ;
            }
        
        // die;

        redirect('C_subditSDM/uploadSP_perpanjanganSubdit');
    }

    //SpTB
    function uploadfile_SPPSPTB($id = NULL){
        $this->load->model('M_Perpanjangan_Subdit');
        $model=$this->M_Perpanjangan_Subdit;
        //$idjenis=$this->M_file_upload->getJenis();
        $namafile ='Surat Perpanjangan TB';
        $idjenis='31'; //ntar diganti
        $config['upload_path'] = './file/perpanjangan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']  = '2000000';
        $config['id_perpanjangan'] = $id;
        $nik=$this->input->post('nik');
        $lokasi=$this->input->post('lokasi');
        $nama = basename($_FILES[$id]['name']);
        $size = $_FILES[$id]['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile.'_'.$nik.'_'.$id.'.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] =$namafile;
 
        $this->load->library('upload',$config);
            if(!empty($_FILES[$id]['name'])){
                if(!move_uploaded_file($_FILES[$id]["tmp_name"], "./file/perpanjangan/" . $new_name)){
                    $this->upload->display_errors(); 
                } 
                else{
                    $upload=$this->upload->data();
                    $model->saveSPP($config);
                    //redirect('home/cindex');
                    echo "<pre>";
                    print_r($config);
                    echo "</pre>";
                     $cek=$model->cekSPPSPTB($id);
                    // $a=$cek[0]->NUM;
                    // echo $a;
                    if($cek[0]->NUM=='2'){
                        if($lokasi=='1'){
                            $model->updateSL5($id);
                        } else {
                            $model->updateSL10($id);
                        }
                    }
                   }
                   // echo "File berhasil di upload";
                    //print_r($_FILES) ;
            }
        
        // die;

        redirect('C_subditSDM/uploadSP_perpanjanganSubdit');
    }

     public function uploadSKPerpanjangan(){
         if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Perpanjangan_Subdit');
        $data['tubel']= $this->M_Perpanjangan_Subdit->getTubelSSL6();
     $this->load->view('V_headerSubdit');
     $this->load->view('V_uploadSK_Perpanjangan',$data);
     $this->load->view('V_footerSubdit');
       }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    function uploadfile_SKPP($id = NULL){
        $this->load->model('M_Perpanjangan_Subdit');
        $model=$this->M_Perpanjangan_Subdit;
        //$idjenis=$this->M_file_upload->getJenis();
        $namafile ='SK Perpanjangan';
        $idjenis='55'; //ntar diganti
        $config['upload_path'] = './file/perpanjangan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']  = '2000000';
        $config['id_perpanjangan'] = $id;
        $nik=$this->input->post('nik');
        $lokasi=$this->input->post('lokasi');
        $nama = basename($_FILES[$id]['name']);
        $size = $_FILES[$id]['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile.'_'.$nik.'_'.$id.'.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] =$namafile;
 
        $this->load->library('upload',$config);
            if(!empty($_FILES[$id]['name'])){
                if(!move_uploaded_file($_FILES[$id]["tmp_name"], "./file/perpanjangan/" . $new_name)){
                    $this->upload->display_errors(); 
                } 
                else{
                    $upload=$this->upload->data();
                    $model->saveSPP($config);
                    //redirect('home/cindex');
                    echo "<pre>";
                    print_r($config);
                    echo "</pre>";
                   $model->updateSL7($id);
                   }
                   // echo "File berhasil di upload";
                    //print_r($_FILES) ;
            }
        // die;
        redirect('C_subditSDM/uploadSP_perpanjanganSubdit');
    }


    public function pengaktifanSubdit(){
         if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Pengaktifan_Subdit');
          $data['tubel']= $this->M_Pengaktifan_Subdit->getPengaktifanPros();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_pengaktifanSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function prosesPengaktifanSubdit($idp=null){
        if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Pengaktifan_Subdit');
         $data['file']=$this->M_Pengaktifan_Subdit->getFile($idp);
         $data['tub']=$this->M_Pengaktifan_Subdit->getStatusP($idp);
        $data['bio']=$this->M_Pengaktifan_Subdit->bio($idp);
         $data['filelama']=$this->M_Pengaktifan_Subdit->getFileLama($data['tub'][0]->ID_TUBEL);
         $data['confirm']=$this->M_Pengaktifan_Subdit->cekFile($idp);
         $this->load->view('V_headerSubdit');
         $this->load->view('V_prosesPengaktifanSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

     public function prosesFilePengaktifan(){
        if($this->session->userdata('akses')=='2'){
        $idtub= $_POST['ID_PENGAKTIFAN'];
        $this->load->model('M_Pengaktifan_Subdit');
        $this->M_Pengaktifan_Subdit->updateFilePengaktifan();
        $this->prosesPengaktifanSubdit($idtub);
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function finalDokumenPengaktifan(){
         if($this->session->userdata('akses')=='2'){
        $this->load->model('M_Pengaktifan_Subdit');
        $this->M_Pengaktifan_Subdit->penerimaanPengaktifan();
        $this->uploadPengaktifanSubdit();
         }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function uploadPengaktifanSubdit(){
         if($this->session->userdata('akses')=='2'){
         $this->load->model('M_Pengaktifan_Subdit');
        $data['tubel']= $this->M_Pengaktifan_Subdit->getPengaktifanDiterima();
         $this->load->view('V_headerSubdit');
         $this->load->view('V_uploadPengaktifanSDM',$data);
         $this->load->view('V_footerSubdit');
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    function uploadfile_SKPK($id = NULL){
        $this->load->model('M_Pengaktifan_Subdit');
        $model=$this->M_Pengaktifan_Subdit;
        //$idjenis=$this->M_file_upload->getJenis();
        $namafile ='SK Pengaktifan';
        $idjenis='40'; //ntar diganti
        $config['upload_path'] = './file/pengaktifan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']  = '2000000';
        $config['id_pengaktifan'] = $id;
        $nik=$this->input->post('nik');
        $lokasi=$this->input->post('lokasi');
        $nama = basename($_FILES[$id]['name']);
        $size = $_FILES[$id]['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile.'_'.$nik.'_'.$id.'.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] =$namafile;
 
        $this->load->library('upload',$config);
            if(!empty($_FILES[$id]['name'])){
                if(!move_uploaded_file($_FILES[$id]["tmp_name"], "./file/pengaktifan/" . $new_name)){
                    $this->upload->display_errors(); 
                } 
                else{
                    $upload=$this->upload->data();
                    $model->saveSPPK($config);
                    //redirect('home/cindex');
                    echo "<pre>";
                    print_r($config);
                    echo "</pre>";
                   $model->updateSL7($id);
                   }
                   // echo "File berhasil di upload";
                    //print_r($_FILES) ;
            }
        
        // die;

        redirect('C_subditSDM/uploadPengaktifanSubdit');
    }

    public function fileExcel(){
         if($this->session->userdata('akses')=='2'){
        $this->load->model('M_MonSubdit');
         $data['rekap']=$this->M_MonSubdit->dataExcelNew();
         $this->load->view('V_excelMonitoring',$data);
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function fileExcelIB(){
         if($this->session->userdata('akses')=='2'){
        $this->load->model('M_MonIbelSubdit');
         $data['rekap']=$this->M_MonIbelSubdit->dataExcelNew();
         $this->load->view('V_excelMonitoringIB',$data);
          }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function arsipTubel(){
        if($this->session->userdata('akses')=='2'){
    $this->load->model('M_Tubel_Subdit');
    $data['tubel']= $this->M_Tubel_Subdit->getTubel7();
     $this->load->view('V_headerSubdit');
     $this->load->view('V_apTubelSDM',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function fileTBSubdit($id=null){
        if($this->session->userdata('akses')=='2'){
    $this->load->model('M_Tubel_Subdit');
    $data['file']= $this->M_Tubel_Subdit->getFile($id);
     $data['bio']=$this->M_Tubel_Subdit->bioL($id);
     $this->load->view('V_headerSubdit');
     $this->load->view('V_fileTubel',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }


    public function arsipIbel(){
        if($this->session->userdata('akses')=='2'){
    $this->load->model('M_Ibel_Subdit');
    $data['tubel']= $this->M_Ibel_Subdit->getIbel12();
     $this->load->view('V_headerSubdit');
     $this->load->view('V_apIbelSDM',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

     public function fileIBSubdit($id=null){
        if($this->session->userdata('akses')=='2'){
    $this->load->model('M_Ibel_Subdit');
    $data['file']= $this->M_Ibel_Subdit->getFile($id);
     $data['bio']=$this->M_Ibel_Subdit->bioL($id);
     $this->load->view('V_headerSubdit');
     $this->load->view('V_fileIB',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function arsipPerpanjangan(){
        if($this->session->userdata('akses')=='2'){
    $this->load->model('M_Perpanjangan_Subdit');
    $data['tubel']= $this->M_Perpanjangan_Subdit->getPerpanjangan7();
     $this->load->view('V_headerSubdit');
     $this->load->view('V_apPerpanjanganSDM',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    public function filePPSubdit($id=null){
        if($this->session->userdata('akses')=='2'){
    $this->load->model('M_Perpanjangan_Subdit');
    $data['file']= $this->M_Perpanjangan_Subdit->getFile($id);
     $data['bio']=$this->M_Perpanjangan_Subdit->bioL($id);
     $this->load->view('V_headerSubdit');
     $this->load->view('V_filePP',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

     public function arsipPengaktifan(){
        if($this->session->userdata('akses')=='2'){
    $this->load->model('M_Pengaktifan_Subdit');
    $data['tubel']= $this->M_Pengaktifan_Subdit->getPengaktifan7();
     $this->load->view('V_headerSubdit');
     $this->load->view('V_apPengaktifanSDM',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

      public function filePKSubdit($id=null){
        if($this->session->userdata('akses')=='2'){
    $this->load->model('M_Pengaktifan_Subdit');
    $data['file']= $this->M_Pengaktifan_Subdit->getFile($id);
     $data['bio']=$this->M_Pengaktifan_Subdit->bioL($id);
     $this->load->view('V_headerSubdit');
     $this->load->view('V_filePK',$data);
     $this->load->view('V_footerSubdit');
      }else{
        echo "Anda tidak berhak mengakses halaman ini";
      }
    }

    //template

    public function outputSTB($id=null){
        $this->load->model('M_Tubel_Subdit');
        $this->load->model('M_file_upload');
        $data['tubel']= $this->M_Tubel_Subdit->getDataSTB($id);
        $data['file']= $this->M_file_upload->getFileRekPim($id);
        $this->load->view('V_STB',$data);
    }

    //Start Template SK Perpanjangan Tubel

    public function outputSKPTB($id=null){
      $this->load->model('M_Tubel_Subdit');
      $this->load->model('M_file_upload');
      $data['tubel']= $this->M_Tubel_Subdit->getDataSKPTB($id);
      $data['file']= $this->M_file_upload->getFileRekPim($id);
      $data['setneg']= $this->M_file_upload->getSetneg($id);
      $data['pengantar']= $this->M_file_upload->getSuratPengantarIdTubel($id);
      $this->load->view('V_SKPTB',$data);
    }
    
    //End Template SK Perpanjangan Tubel


    //Start Template Perjanjian Perpanjangan

    public function outputSPP($id=null){
      $this->load->model('M_Tubel_Subdit');
      $this->load->model('M_file_upload');
      $data['tubel']= $this->M_Tubel_Subdit->getDataSPP($id);
      $data['file']= $this->M_file_upload->getFileRekPim($id);
      $this->load->view('V_SPP',$data);
    }

    //End Template Perjanjian Perpanjangan

    // Start Template Surat Perpanjangan TUBEL
    public function outputSPTB($id=null){
      $this->load->model('M_Perpanjangan_Subdit');
      $this->load->model('M_file_upload');
      $data['perpanjangan']= $this->M_Perpanjangan_Subdit->getDataPerpanjangan($id);
      $data['file']= $this->M_file_upload->getSuratPengantar($id);
      $this->load->view('V_SPTB',$data);
    }
    // End Template Surat Perpanjangan TUBEL

    public function outputSPerjanjian($id=null){
        $this->load->model('M_Tubel_Subdit');
        $this->load->model('M_file_upload');
        $data['tubel']= $this->M_Tubel_Subdit->getDataSTB($id);
        $data['file']= $this->M_file_upload->getFileRekPim($id);
        $this->load->view('V_SP',$data);
    }

    // Template Surat Pembebasan
     public function outputSPembebasan($id=null){
        $this->load->model('M_Tubel_Subdit');
        $this->load->model('M_file_upload');
        $data['tubel']= $this->M_Tubel_Subdit->getDataSTB($id);
        $data['file']= $this->M_file_upload->getSuratPengantarTubel($id);
        $this->load->view('V_Pembebasan',$data);
    }
    //End

    // Template SK Tugas Belajar
     public function outputSKTB($id=null){
        $this->load->model('M_Tubel_Subdit');
        $this->load->model('M_file_upload');
        $data['tubel']= $this->M_Tubel_Subdit->getDataSTB($id);
        $data['file']= $this->M_file_upload->getFileRekPim($id);
        $data['setneg']= $this->M_file_upload->getSetneg($id);
        $data['loa']= $this->M_file_upload->getLoa($id);
        $this->load->view('V_SKTB',$data);
    }
    //End

    public function outputSKIB_PNS($id=null){
      $this->load->model('M_Ibel_Subdit');
      $data['ibel']= $this->M_Ibel_Subdit->getBiodatadanIbel($id);
      $this->load->view('V_SKIB_DIR',$data);
    }

     //Template Pengaktifan
     public function outputSKPengaktifan($id=null){
      $this->load->model('M_Tubel_Subdit');
      $this->load->model('M_file_upload');
      $data['tubel']= $this->M_Tubel_Subdit->getDataSKPengaktifan2($id);
      $data['file']= $this->M_file_upload->getFile37($id);
      $this->load->view('V_SKPengaktifan',$data);
    }

    //end sk pengaktifan

    // Template SK Izin Belajar
    public function outputSKIB($id=null){
      $this->load->model('M_Ibel_Subdit');
      $data['ibel']= $this->M_Ibel_Subdit->getBiodatadanIbel($id);
      $this->load->view('V_SKIB',$data);
    }


    // excel register
    public function excel_register(){
      $this->load->model('M_Tubel_Subdit');
      $data['rekap']= $this->M_Tubel_Subdit->excelRegister();
      $data['rekapib']= $this->M_Tubel_Subdit->excelRegisterIB();
      $this->load->view('V_excelRegister',$data);
    }
}
    

?>