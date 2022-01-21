<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_loginDosen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('ORMBiodata');
        $this->load->model('ORMFakultas');

        $this->load->model('M_dosen');
        $this->load->model('M_biodata');
        $this->load->model('m_login');
        $this->load->library('session');

    }

    public function index()
    {
        $this->load->view('V_loginDosen');
    }

    public function authuser1()
    {
        $this->load->model('M_biodata');
        $bio = $this->M_biodata;

        $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

        //$url = "https://uacc.unair.ac.id/api/auth/login"; // The POST URL
        $url = "https://apicybercampus.unair.ac.id/api/auth/login";
        // The POST Data
        $postdata = "LoginForm[username]=" . $username;
        $postdata .= "&LoginForm[password]=" . $password;

        // print_r($postdata);
        // die;

        $ch = curl_init($url);

        // Set the request type to POST
        curl_setopt($ch, CURLOPT_POST, true);
        // Pass the post parameters as a naked string
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

        // Option to Return the Result, rather than just true/false
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Perform the request, and save content to $result
        $result = curl_exec($ch);
        $res = json_decode($result, true);

        // Show the result?

        //      echo "<pre>";
        //      print_r($result);

        // die;
        $sta = $res['status'];

        if ($sta == "error") {
            $this->session->set_flashdata('er', 'NIK/Password anda salah atau tidak ditemukan');
            redirect('C_loginDosen/');

        }

        $dataken = $res['data'];
        $token = $res['data']['token'];
        $nik = $res['data']['username'];
        $namauser = $res['data']['name'];
        $status_user = (!empty($res['data']['pegawai']))? 'Tendik' : 'Dosen';

        $this->session->set_userdata('token', $token);
        $this->session->set_userdata('NIK', $nik);
        $this->session->set_userdata('Nama', $namauser);

        //$url = "https://uacc.unair.ac.id/api/view-beasiswa-sdm?access-token=".$token."&USERNAME=".$nik;
        

        if($status_user == 'Dosen'){
            $token = $this->authuser2();

            // $urldosen = "https://apicybercampus.unair.ac.id/api/dosen/view1?access-token=" . $token . "&nip=" . $nik;
            $urldosen = "https://apicybercampus.unair.ac.id/api/dosen/view1";

            $postdata = "token=" . $token;
            $postdata .= "&nip=" . $nik;

            $ch = curl_init($urldosen);

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $json = curl_exec($ch);

            // for dosen
            // $json = file_get_contents($urldosen);
            $response = json_decode($json, true);
            $data_dosen = $response['items'];

            $cek_user = $this->M_dosen->getAuth($username);

            //Cek Apakah user sudah tersimpan di database

            if ($cek_user->num_rows() == 0) {
                $bio->insertDosen($data_dosen, $dataken);
            }else{
                $bio->updateDosen($data_dosen, $dataken);
            }
        }else{
            $urlpegawai = "https://apicybercampus.unair.ac.id/api/pegawai/view1?access-token=" . $token . "&nip=" . $nik;

            // for tendik
            $json1 = file_get_contents($urlpegawai);
            $response = json_decode($json1, true);
            $data_pegawai = $response['items'];

            $cek_user = $this->M_dosen->getAuth($username);

            //Cek Apakah user sudah tersimpan di database
            if ($cek_user->num_rows() == 0) {
                $bio->insertTendik($data_pegawai, $dataken);
            }else{
                $bio->updateTendik($data_pegawai, $dataken);
            }

            $biodata = ORMBiodata::find($nik);
            if($fakultas = ORMFakultas::where('ID_UNIT_KERJA', $biodata->ID_UNIT_KERJA)->first()){
                $biodata->UNIT_KERJA = $fakultas->FAKULTAS;
                $biodata->save();
            }
        }

        if ($sta == "success") {

            $cek_user = $this->M_dosen->getAuth($username);
            //foreach ($items as $user) {
            if ($cek_user->num_rows() > 0) { //jika login sebagai admin
                //if(isset($user)){ //jika login sebagai admin
                $data = $cek_user->row_array();
                $this->session->set_userdata('masuk', true);
                $this->session->set_userdata('akses', '1');
                $this->session->set_userdata('NIK', $data['NIK']);
                $this->session->set_userdata('name', $data['NAMA']);
                $this->session->set_userdata('fak', $data['UNIT_KERJA']);
                redirect('C_dosen');

            } else { // jika username dan password tidak ditemukan atau salah
                // $url=base_url();
                // echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                // redirect($url);

                echo "gagal";
            }
        } else { // jika username dan password tidak ditemukan atau salah
            $url = base_url();
            echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
            redirect($url);
        }

    }

    public function authuser2()
    {
        $url = "https://apicybercampus.unair.ac.id/api/token/ambil-token-v2";

        $postdata = "user=sdm_studilanjut";
        $postdata .= "&key=sdM@Stud1l@njut@582";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        $res = json_decode($result, true);

        $callbacktype = isset($_GET['callbacktype']) ? $_GET['callbacktype'] : NULL;

        if(!empty($callbacktype)){
            var_dump($res); die;
        }else{
            return $res;
        }
    }

    public function authuser()
    {
        $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

        $cek_user = $this->M_dosen->getAuth($username);
        //foreach ($items as $user) {
        if ($cek_user->num_rows() > 0) { //jika login sebagai admin
            //if(isset($user)){ //jika login sebagai admin
            $data = $cek_user->row_array();
            $this->session->set_userdata('masuk', true);
            $this->session->set_userdata('akses', '0');
            $this->session->set_userdata('NIK', $data['NIK']);
            $this->session->set_userdata('name', $data['NAMA']);
            $this->session->set_userdata('fak', $data['UNIT_KERJA']);
            redirect('C_dosen');

        } else { // jika username dan password tidak ditemukan atau salah
            $url = base_url();
            echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
            redirect($url);
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('C_loginDosen');
    }
}
