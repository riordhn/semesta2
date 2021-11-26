<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class C_loginStaff extends CI_Controller {

	 function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
 
	}

    public function index(){
     $this->load->view('V_loginStaff');
    }

    function authadmin(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_admin=$this->M_login->auth_admin($username,$password);

        if($cek_admin->num_rows() > 0){ //jika login sebagai admin
					$data=$cek_admin->row_array();
					$hak= $data['HAK_AKSES'];
					if($hak==2){
						$this->session->set_userdata('masuk',TRUE);
	        			$this->session->set_userdata('akses',$data['HAK_AKSES']);
			            $this->session->set_userdata('NIP',$data['NIP']);
			            redirect('C_subditSDM');
					} else {
						if($hak==3){
							$this->session->set_userdata('masuk',TRUE);
		        			$this->session->set_userdata('akses',$data['HAK_AKSES']);
				            $this->session->set_userdata('NIP',$data['NIP']);
				            redirect('C_Age');
						} else {
							if($hak==1){
							$this->session->set_userdata('masuk',TRUE);
		        			$this->session->set_userdata('akses',$data['HAK_AKSES']);
				            $this->session->set_userdata('NIP',$data['NIP']);
				            $this->session->set_userdata('fak',$data['UNIT_KERJA']); //belum ditambah didatabase, pada entitas login tmbah kolom unit kerja sesuai set
				            redirect('C_fakultas');
							}
						}
					}
        }else{  // jika username dan password tidak ditemukan atau salah
							$url=base_url('loginStaff');
							echo $this->session->set_flashdata('msg','Username atau Password SALAH');
							redirect('C_loginStaff');
					}

    }

 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('C_loginStaff'));
	}



}
    

?>