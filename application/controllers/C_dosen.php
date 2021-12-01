<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('ORMBiodata');
        $this->load->model('ORMTugasBelajar');
        $this->load->model('ORMIzinBelajar');
        $this->load->model('ORMPengaktifanIzinBelajar');
        $this->load->model('ORMFakultas');

        $this->load->model('M_biodata');

        $this->load->helper(array('form'));
        $this->load->library('session');
        $this->load->library('form_validation');

        $nik = $this->session->userdata('NIK');
        $izin_belajar_active = ORMIzinBelajar::where('NIK', $nik)->where('HAS_REACTIVE', 0)->first();
        $tugas_belajar_active = ORMTugasBelajar::where('NIK', $nik)->where('HAS_REACTIVE', 0)->first();
        $this->session->set_userdata('izin_belajar_active', $izin_belajar_active);
        $this->session->set_userdata('tugas_belajar_active', $tugas_belajar_active);
    }

    public function index()
    {
        $this->session->set_userdata('nav', 'home');
        $this->load->model('M_dosen');
        $this->load->model('M_Tubel_Dosen');
        $this->load->model('M_Ibel_Dosen');
        $this->load->model('M_perpanjangan');
        $this->load->model('M_pengaktifan');
        $data['Biodata'] = $this->M_dosen->getBiodata();
        $data['semester'] = $this->M_Tubel_Dosen->cekSem();
        $data['id'] = $this->M_Tubel_Dosen->getIdTubel();
        $data['id2'] = $this->M_Ibel_Dosen->getIdIbel();

        if (!empty($data['id'])) {
            foreach ($data['id'] as $key) {
                $id1 = $key->id_tubel;
            }
        } else {
            $id1 = 0;
        }
        if (!empty($data['id2'])) {
            foreach ($data['id2'] as $key) {
                $id2 = $key->id_ib;
            }
        } else {
            $id2 = 0;
        }

        $data['montb'] = $this->M_Tubel_Dosen->cekMonitoring($id1);
        if (!empty($data['montb'])) {
            foreach ($data['montb'] as $sal) {
                $semse = $sal->SEMESTER_SEKARANG;
                $totals = $sal->TOTAL_SEMESTER;
            }
        } else {
            $semse = null;
            $totals = null;
        }

        if ($semse <= $totals && $semse != null && $totals != null) {
            $this->session->set_userdata('cektb', '1');
            $this->session->set_userdata('semontb', $semse);
            $this->session->set_userdata('setaltb', $totals);
        }
        $data['monib'] = $this->M_Ibel_Dosen->cekMonitoring($id2);
        if (!empty($data['monib'])) {
            foreach ($data['monib'] as $las) {
                $se = $las->SEMESTER_SEKARANG;
                $tos = $las->TOTAL_SEMESTER;
            }
        } else {
            $se = 22;
            $tos = null;
        }

        if ($se <= $tos) {
            $this->session->set_userdata('cekib', '1');
            $this->session->set_userdata('semonib', $se);
            $this->session->set_userdata('setalib', $tos);
        }

        $fakultas = $this->M_Tubel_Dosen->getFak();
        $array = json_decode(json_encode($fakultas), true);
        $p = array();
        foreach ($array as $key) {
            array_push($p, $key['FAKULTAS']);
        }
        $un = $this->session->userdata('fak');

        if (!empty($data['id'])) {
            if (in_array($un, $p)) {
                $data['tubel'] = $this->M_Tubel_Dosen->fileTubelditangguhkan($id1);
                $data['tubel1'] = $this->M_perpanjangan->filePerpanjanganditangguhkan($id1);
                $data['aktif'] = $this->M_pengaktifan->filePengaktifanditangguhkan($id1);
            } else {
                $data['tubel'] = $this->M_Tubel_Dosen->fileTubelditangguhkanNon($id1);
                $data['tubel1'] = $this->M_perpanjangan->filePerpanjanganditangguhkanNon($id1);
                $data['aktif'] = $this->M_pengaktifan->filePengaktifanditangguhkanNon($id1);
            }

        }

        if (!empty($data['id2'])) {
            if (in_array($un, $p)) {
                $data['ibel'] = $this->M_Ibel_Dosen->fileIbelditangguhkan($id2);
            } else {
                $data['ibel'] = $this->M_Ibel_Dosen->fileIbelditangguhkanNon($id2);
            }
        }

        
        $this->load->view('V_headerDosen');
        $this->load->view('V_dashboardDosen', $data);
        $this->load->view('V_footerDosen');

    }

    public function dashDosen()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('V_dashboardDosen');
        $this->load->view('V_footerDosen');
    }

    public function fileDitangguhkan()
    {$this->load->model('M_Tubel_Dosen');
        $this->load->model('M_Ibel_Dosen');
        $this->load->model('M_file_upload');
        $this->load->model('M_file_upload_IB');
        $this->load->model('M_perpanjangan');
        $this->load->model('M_pengaktifan');
        $data['id'] = $this->M_Tubel_Dosen->getIdTubel();
        $data['id2'] = $this->M_Ibel_Dosen->getIdIbel();
        foreach ($data['id2'] as $key) {
            $id2 = $key->id_ib;
        }
        foreach ($data['id'] as $key) {
            $id1 = $key->id_tubel;
        }
        if (empty($data['id'])) {
            $id1 = 0;
        }

        if (empty($data['id2'])) {
            $id2 = 0;
        }

        $fakultas = $this->M_Tubel_Dosen->getFak();
        $array = json_decode(json_encode($fakultas), true);
        $p = array();
        foreach ($array as $key) {
            array_push($p, $key['FAKULTAS']);
        }
        $un = $this->session->userdata('fak');
        if (in_array($un, $p)) {
            $data['tubel'] = $this->M_Tubel_Dosen->fileTubelditangguhkan($id1);
            $data['tubel1'] = $this->M_perpanjangan->filePerpanjanganditangguhkan($id1);
            $data['aktif'] = $this->M_pengaktifan->filePengaktifanditangguhkan($id1);
            $data['ibel'] = $this->M_Ibel_Dosen->fileIbelditangguhkan($id2);
            $this->load->view('V_headerDosen');
            $this->load->view('V_ditangguhkanDosen', $data);
            $this->load->view('V_footerDosen');
        } else {
            $data['tubel'] = $this->M_Tubel_Dosen->fileTubelditangguhkanNon($id1);
            $data['tubel1'] = $this->M_perpanjangan->filePerpanjanganditangguhkanNon($id1);
            $data['aktif'] = $this->M_pengaktifan->filePengaktifanditangguhkanNon($id1);
            $data['ibel'] = $this->M_Ibel_Dosen->fileIbelditangguhkanNon($id2);
            $this->load->view('V_headerDosen');
            $this->load->view('V_ditangguhkanDosenNon', $data);
            $this->load->view('V_footerDosen');
        }

        //if ($row==0) {
        // if (empty($data['tubel'])) {
        //     $this->M_Tubel_Dosen->updateStatusSL($id1);
        //  }

    }

    public function formtb()
    {
        $this->session->set_userdata('nav', 'usulan');
        $this->load->model('M_dosen');
        $this->load->model('M_Tubel_Dosen');
        $this->load->model('M_Ibel_Dosen');
        $data['unit'] = $this->M_dosen->getUnitKer();
        $data['Biodata'] = $this->M_dosen->getBiodata();
        $data['Kota'] = $this->M_dosen->getKota();

        $data['cektubel'] = $this->M_Tubel_Dosen->cekTubel();
        if (!empty($data['cektubel'])) {
            $cek_tb = 1;
            foreach ($data['cektubel'] as $k) {
                $idtubel = $k->ID_TUBEL;
                $status = $k->ID_STATUS_SL;
            }
            $data['cekpengaktifan'] = $this->M_Tubel_Dosen->cekPengaktifan($idtubel);
            if (!empty($data['cekpengaktifan'])) {
                $cek_pengaktifan_tb = 1;
            } else {
                $cek_pengaktifan_tb = 0;
            }
        } else {
            $cek_tb = 0;
            $cek_pengaktifan_tb = 0;
            $status = 30;
        }
        $data['cekibel'] = $this->M_Ibel_Dosen->cekIbel();
        if (!empty($data['cekibel'])) {

            $cek_ib = 1;
            foreach ($data['cekibel'] as $s) {
                $id_izin_belajar = $s->ID_IB;
                $status_ib = $s->ID_STATUS_SL;
            }
            $data['ceklaporan'] = $this->M_Ibel_Dosen->cekLaporan($id_izin_belajar);
            if (!empty($data['ceklaporan'])) {
                $cek_laporan = 1;
            } else {
                $cek_laporan = 0;
            }
        } else {
            $cek_ib = 0;
            $cek_laporan = 0;
            $status_ib = 30;
        }

        if (($cek_tb == 1 && $cek_ib == 1) || ($cek_tb == 1 && $cek_ib == 0) || ($cek_tb == 0 && $cek_ib == 1)) {

            if ($status == 0 || $status == 7 || $status == 9 || $status == 11 || $status_ib == 7 || $status_ib == 9 || $status_ib == 11) {

                if ($cek_pengaktifan_tb == 1 && $cek_laporan == 1 || $cek_pengaktifan_tb == 1 && $cek_laporan == 0 || $cek_pengaktifan_tb == 0 && $cek_laporan == 1 || $cek_pengaktifan_tb == 0 && $cek_laporan == 0 && $status == 0 || $cek_pengaktifan_tb == 0 && $cek_laporan == 0 && $status == 11 || $cek_pengaktifan_tb == 0 && $cek_laporan == 0 && $status == 9 || $cek_pengaktifan_tb == 0 && $cek_laporan == 0 && $status_ib == 11 || $cek_pengaktifan_tb == 0 && $cek_laporan == 0 && $status_ib == 9) {
                    $this->load->view('V_headerDosen', $data);
                    $this->load->view('V_formtb');
                    $this->load->view('V_footerDosen');
                } else {
                    $this->load->view('V_headerDosen');
                    $this->load->view('V_BlockPengajuan');
                    $this->load->view('V_footerDosen');
                }

            } else {
                $this->load->view('V_headerDosen');
                $this->load->view('V_BlockPengajuan');
                $this->load->view('V_footerDosen');
            }

        } else {
            $this->load->view('V_headerDosen', $data);
            $this->load->view('V_formtb');
            $this->load->view('V_footerDosen');
        }

    }

    public function formBioIb()
    {
        $nik = $this->session->userdata('NIK');
        
        $this->load->model('M_dosen');
        $this->load->model('M_Tubel_Dosen');
        $this->load->model('M_Ibel_Dosen');

        $data['unit'] = $this->M_dosen->getUnitKer();
        $data['Biodata'] = $this->M_dosen->getBiodata();
        $data['Kota'] = $this->M_dosen->getKota();
        $data['cektubel'] = $this->M_Tubel_Dosen->cekTubel();

        // CEK TUGAS BELAJAR yang belum aktif kembali
        $proses_tugas_belajar = ORMTugasBelajar::where('NIK', $nik)->where('HAS_REACTIVE', 0)->first();
        if ($proses_tugas_belajar) {
            $this->load->view('V_headerDosen');
            $this->load->view('V_BlockPengajuan');
            $this->load->view('V_footerDosen');
            return ;
        }

        $data['cekibel'] = $this->M_Ibel_Dosen->cekIbel();

        // CEK IZIN BELAJAR yang belum aktif kembali
        $proses_izin_belajar = ORMIzinBelajar::where('NIK', $nik)->where('HAS_REACTIVE', 0)->first();
        if ($proses_izin_belajar) {
            $status_ib = $proses_izin_belajar->ID_STATUS_SL;
            
            if (in_array($status_ib, [9, 11, 13]) ) {
                $this->load->view('V_headerDosen');
                $this->load->view('V_formBioIB', $data);
                $this->load->view('V_footerDosen');
            } else {
                $this->load->view('V_headerDosen');
                $this->load->view('V_BlockPengajuan');
                $this->load->view('V_footerDosen');
            }
        } else {
            $this->load->view('V_headerDosen');
            $this->load->view('V_formBioIB', $data);
            $this->load->view('V_footerDosen');
        }
    }

    public function saveBioTb()
    {
        $this->load->model('M_biodata');
        $post = $this->input->post();
        $save = $this->M_biodata;
        $validasi = $this->form_validation;
        $validasi->set_rules($save->rules());

        $birth = new Datetime($post['tgllahir']);
        $today = new Datetime(date('y-m-d'));
        $diff = $today->diff($birth);
        $this->session->set_userdata('age', $diff->y);

        $nik = $post['NIP'];
        $this->session->set_userdata('NIK', $nik);
        if ($validasi->run()) {
            $biodata = ORMBiodata::find($nik);
            $biodata->HANDPHONE = $post['nomor'];
            $biodata->ALAMAT = $post['alamat'];
            $biodata->TMT_PNS = $post['TMT'];
            $biodata->STATUS_JABATAN = $post['StatusJab'];
            $biodata->NAMA_JABATAN = $post['namaJab'];
            $biodata->save();

            $fakultas = ORMFakultas::where('ID_UNIT_KERJA', $biodata->ID_UNIT_KERJA)->first();
            $this->session->set_userdata('unit', $fakultas->FAKULTAS);

            if ($post['JenisPeg'] == "CPNS" || $post['jenjang'] = 'S3' && $post['jenjang'] = 'Sp2' && $this->session->userdata('age') >= 40 && $post['JenisPeg'] = 'PNS' || $this->session->userdata('age') >= 40 && $post['JenisPeg'] = 'PNS') {
                redirect('C_dosen/Tolak/');
            } else {
                redirect('C_dosen/formdatatb/');}
        }

        // redirect('C_dosen/formdatatb/');
        echo "gagal";
    }

    public function simpanBiodataIB()
    {
        $post = $this->input->post();
        $nik = $post['NIK'];

        // $validasi = $this->form_validation;
        // $validasi->set_rules($this->M_biodata->rules());
        
        // if ($validasi->run()) {
            $biodata = ORMBiodata::find($nik);
            $biodata->HANDPHONE = $post['nomor'];
            $biodata->ALAMAT = $post['alamat'];
            $biodata->TMT_PNS = $post['TMT'];
            $biodata->STATUS_JABATAN = $post['StatusJab'];
            $biodata->NAMA_JABATAN = $post['namaJab'];
            $biodata->save();
            
            $this->session->set_userdata('NIK', $nik);
            $this->session->set_userdata('unit', $post['unitfak']);

            redirect('C_dosen/formib');
        // }

        // redirect('C_dosen/formib');
    }

    public function Tolak()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('V_Tolak');
        $this->load->view('V_footerDosen');
    }

    public function formib($id = null)
    {
        $this->load->model('M_Ibel_Dosen');
        $this->load->model('M_dosen');
        $this->load->model('M_biodata');
        $data['Tubel'] = $this->M_Ibel_Dosen->getIbel1();
        $data['negara'] = $this->M_dosen->getNegara();
        $data['jenjang'] = $this->M_dosen->getJenjang();
        $data['biodata'] = $this->M_biodata->getBiodata($this->session->userdata('NIK'))[0];
        $data['id'] = $id;

        if (!empty($data['Tubel'])) {
            $this->load->view('V_headerDosen');
            $this->load->view('V_formIBisi', $data);
            $this->load->view('V_footerDosen');
        } else {
            $this->load->view('V_headerDosen');
            $this->load->view('V_formIB', $data);
            $this->load->view('V_footerDosen');
        }
    }

    public function uploadfoto()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('V_pasfoto');
        $this->load->view('V_footerDosen');
    }

    public function outputRekom($id = null)
    {
        $this->load->model('M_Tubel_Dosen');
        $data['tubel'] = $this->M_Tubel_Dosen->getDataTubelDiri($id);
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_RekomTubel', $data);
    }

    public function outputSuket($id = null)
    {
        $this->load->model('M_Tubel_Dosen');
        $data['tubel'] = $this->M_Tubel_Dosen->getDataTubelDiri($id);
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_SuketTB', $data);
    }

    public function outputPernyataan($id = null)
    {
        $this->load->model('M_Tubel_Dosen');
        $data['tubel'] = $this->M_Tubel_Dosen->getDataTubelDiri($id);
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_pernyataanTB', $data);
    }

    public function outputPernyataanIB($id = null)
    {
        $this->load->model('M_Ibel_Dosen');
        $data['tubel'] = $this->M_Ibel_Dosen->getDataIbelDiri($id);
        // echo "<pre>";
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_PernyataanIB', $data);
    }

    public function outputLinierIB($id = null)
    {
        $this->load->model('M_Ibel_Dosen');
        $data['tubel'] = $this->M_Ibel_Dosen->getDataIbelDiri($id);
        // echo "<pre>";
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_LinierIB', $data);
    }

    public function formdatatb($id = null)
    {
        $this->load->model('M_dosen');
        $this->load->model('M_Tubel_Dosen');
        $data['Tubel'] = $this->M_Tubel_Dosen->getTubel();
        $data['negara'] = $this->M_dosen->getNegara();
        $data['jenjang'] = $this->M_dosen->getJenjang();
        $data['id'] = $id;
        foreach ($data['Tubel'] as $key) {
            $status = $key->ID_STATUS_SL;
        }
        if (!empty($data['Tubel']) && $status == 0 || !empty($data['Tubel']) && $status == 11) {
            $this->load->view('V_headerDosen');
            $this->load->view('V_formDataTBisi', $data);
            $this->load->view('V_footerDosen');
        } else {
            $this->load->view('V_headerDosen');
            $this->load->view('V_fromDataTb', $data);
            $this->load->view('V_footerDosen');
        }
    }

    public function saveTb()
    {
        $this->load->model('M_Tubel_Dosen');
        $this->load->model('M_dosen');
        $data['jenjang'] = $this->M_dosen->getJenjang();
        $post = $this->input->post();

        foreach ($data['jenjang'] as $k) {
            if ($post['jenjang'] == $k->ID_JENJANG) {
                $_POST['lama'] = $k->LAMA_STUDI;
            }
        }
        $save = $this->M_Tubel_Dosen;
        $validasi = $this->form_validation;
        $validasi->set_rules($save->rules());
        $age = $this->session->userdata('age');
        $jenis = $this->session->userdata('jenispeg');
        if ($post['jenjang'] = 'S3' && $post['jenjang'] = 'Sp2' && $age >= 40 && $jenis = 'PNS') {
            redirect('C_dosen/Tolak/');
        }
        // echo '<pre>';
        // // print_r($jenis);
        // die;

        if ($validasi->run()) {
            $save->saveTB();
            $fakultas = $this->M_Tubel_Dosen->getFak();
            $array = json_decode(json_encode($fakultas), true);
            $p = array();
            foreach ($array as $key) {
                array_push($p, $key['FAKULTAS']);
            }
            $un = $this->session->userdata('unit');
            if (in_array($un, $p)) {
                redirect('C_dosen/uploadfile/');
            } else {
                redirect('C_dosen/uploadfileNon/');
            }
        }

        //redirect('C_dosen/uploadfile/');
        echo "gagal";
    }

    public function updateTb()
    {
        $this->load->model('M_Tubel_Dosen');
        $this->load->model('M_dosen');
        $data['jenjang'] = $this->M_dosen->getJenjang();
        $post = $this->input->post();

        foreach ($data['jenjang'] as $k) {
            if ($post['jenjang'] == $k->ID_JENJANG) {
                $_POST['lama'] = $k->LAMA_STUDI;
            }
        }
        $save = $this->M_Tubel_Dosen;
        $validasi = $this->form_validation;
        $validasi->set_rules($save->rules());
        $age = $this->session->userdata('age');
        $jenis = $this->session->userdata('jenispeg');
        if ($post['jenjang'] = 'S3' && $post['jenjang'] = 'Sp2' && $age >= 40 && $jenis = 'PNS') {
            redirect('C_dosen/Tolak/');
        }
        // echo '<pre>';
        // print_r($post);
        // die;

        if ($validasi->run()) {
            $save->updateTB();
            $fakultas = $this->M_Tubel_Dosen->getFak();
            $array = json_decode(json_encode($fakultas), true);
            $p = array();
            foreach ($array as $key) {
                array_push($p, $key['FAKULTAS']);
            }
            $un = $this->session->userdata('unit');
            if (in_array($un, $p)) {
                redirect('C_dosen/uploadfile/');
            } else {
                redirect('C_dosen/uploadfileNon/');
            }

        }

        //redirect('C_dosen/uploadfile/');
        echo "gagal";
    }

    public function updateIb()
    {
        $this->load->model('M_Ibel_Dosen');
        $post = $this->input->post();
        $save = $this->M_Ibel_Dosen;
        $validasi = $this->form_validation;
        $validasi->set_rules($save->rules());
        // echo '<pre>';
        // print_r($post);
        // die;

        if ($validasi->run()) {
            $save->updateIB();
            $fakultas = $this->M_Ibel_Dosen->getFak();
            $array = json_decode(json_encode($fakultas), true);
            $p = array();
            foreach ($array as $key) {
                array_push($p, $key['FAKULTAS']);
            }
            $un = $this->session->userdata('fak');
            if (in_array($un, $p)) {
                redirect('C_dosen/uploadfileIB/');
            } else {
                redirect('C_dosen/uploadfileIBNon/');
            }
        }

        //redirect('C_dosen/uploadfile/');
        echo "gagal";
    }

    public function saveIb()
    {
        $this->load->model('M_Ibel_Dosen');
        $post = $this->input->post();
        $save = $this->M_Ibel_Dosen;
        $validasi = $this->form_validation;
        $validasi->set_rules($save->rules());

        if ($validasi->run()) {
            $save->saveIB();
            $nik = $this->session->userdata('NIK');

            $biodata = ORMBiodata::find($nik);
            $fakultas = ORMFakultas::where('ID_UNIT_KERJA', $biodata->ID_UNIT_KERJA)->first();

            if($fakultas->ID_FAKULTAS < 16){
                redirect('C_dosen/uploadfileIB/');
            } else {
                redirect('C_dosen/uploadfileIBNon/');
            }
        }

        //redirect('C_dosen/uploadfile/');
        echo "gagal";
    }

    public function uploadfile()
    {
        $this->load->model('M_Tubel_Dosen');
        $data['idTubel'] = $this->M_Tubel_Dosen->getIdTubel();
        foreach ($data['idTubel'] as $key) {
            $id = $key->id_tubel;
        }
        $data['hitung'] = $this->M_Tubel_Dosen->hitung($id);

        if (!empty($data['hitung'])) {
            $data['count'] = $this->M_Tubel_Dosen->hitung1($id);
            // echo "<pre>";
            // print_r($data['hitung']);
            // die;
        } else {
            $data['count'] = 0;
        }

        $data['file'] = $this->M_Tubel_Dosen->upFile($id);
        $this->load->view('V_headerDosen');
        $this->load->view('V_uploadfileV2', $data);
        $this->load->view('V_footerDosen');
    }

    public function uploadfileNon()
    {
        $this->load->model('M_Tubel_Dosen');
        $data['idTubel'] = $this->M_Tubel_Dosen->getIdTubel();
        foreach ($data['idTubel'] as $key) {
            $id = $key->id_tubel;
        }
        $data['hitung'] = $this->M_Tubel_Dosen->hitungNon($id);

        if (!empty($data['hitung'])) {
            $data['count'] = $this->M_Tubel_Dosen->hitungNon($id);
            // echo "<pre>";
            // print_r($data['hitung']);
            // die;
        } else {
            $data['count'] = 0;
        }

        $data['file'] = $this->M_Tubel_Dosen->upFileNon($id);
        $this->load->view('V_headerDosen');
        $this->load->view('V_uploadfileV2Non', $data);
        $this->load->view('V_footerDosen');
    }

    public function uploadfileIB()
    {
        $this->load->model('M_Ibel_Dosen');
        $data['idIbel'] = $this->M_Ibel_Dosen->getIdIbel();
        foreach ($data['idIbel'] as $key) {
            $id = $key->id_ib;
        }
        $data['count'] = $this->M_Ibel_Dosen->hitung($id);
        $data['file'] = $this->M_Ibel_Dosen->upFile($id);

        // echo "<pre>";
        // print_r($data);
        // die;
        $this->load->view('V_headerDosen');
        $this->load->view('V_uploadfileIBV2', $data);
        $this->load->view('V_footerDosen');
    }

    public function uploadfileIBNon()
    {
        $this->load->model('M_Ibel_Dosen');
        $data['idIbel'] = $this->M_Ibel_Dosen->getIdIbel();
        foreach ($data['idIbel'] as $key) {
            $id = $key->id_ib;
        }
        $data['count'] = $this->M_Ibel_Dosen->hitung($id);
        $data['file'] = $this->M_Ibel_Dosen->upFileNon($id);

        // echo "<pre>";
        // print_r($data);
        // die;
        $this->load->view('V_headerDosen');
        $this->load->view('V_uploadfileIBV2Non', $data);
        $this->load->view('V_footerDosen');
    }

    public function submitTB($status, $idtubel)
    {
        $this->load->model('M_Tubel_Dosen');
        $save = $this->M_Tubel_Dosen;
        $post = $this->input->post();
        $data['data'] = array($status, $idtubel);
        $this->load->view('V_headerDosen');
        $this->load->view('V_submitDosen', $data);
        $this->load->view('V_footerDosen');
    }

    public function submitIB($status, $idtubel)
    {
        $this->load->view('V_headerDosen');
        $post = $this->input->post();
        $data['data'] = array($status, $idtubel);
        $this->load->view('V_submitDosenIB', $data);
        $this->load->view('V_footerDosen');
    }

    public function riwayatDosen()
    {
        $this->load->model('M_Tubel_Dosen');
        $this->load->view('V_headerDosen');
        // $data['tubel']= $this->M_Tubel_Dosen->getTubel();
        // $data['perpan']= $this->M_Tubel_Dosen->getPerpanjangan();
        // $data['pengak']= $this->M_Tubel_Dosen->getPengaktifan();
        $data['tubel'] = $this->M_Tubel_Dosen->getDataAllTubel();
        $data['tubel1'] = $this->M_Tubel_Dosen->getData3();
        $data['tubel2'] = $this->M_Tubel_Dosen->getData4();
        // echo "<pre>";
        // print_r($data['tubel2']);
        // die;
        $this->load->view('V_riwayatDosen', $data);
        $this->load->view('V_footerDosen');
    }

    public function riwayatDosenIB()
    {
        $this->load->model('M_Ibel_Dosen');
        $this->load->view('V_headerDosen');
        // $data['tubel']= $this->M_Tubel_Dosen->getTubel();
        // $data['perpan']= $this->M_Tubel_Dosen->getPerpanjangan();
        // $data['pengak']= $this->M_Tubel_Dosen->getPengaktifan();
        $data['tubel'] = $this->M_Ibel_Dosen->getIbel1();
        $data['tubel1'] = $this->M_Ibel_Dosen->getIbelPeng();
        // echo "<pre>";
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_riwayatDosenIB', $data);
        $this->load->view('V_footerDosen');
    }

    public function riwayatPerpanjangan()
    {
        $this->load->model('M_Tubel_Dosen');
        $this->load->view('V_headerDosen');
        //   $data['tubel']= $this->M_Tubel_Dosen->getTubel();
        $this->load->view('V_riwayatPerpanjangan');
        $this->load->view('V_footerDosen');
    }

    public function riwayatPengaktifan()
    {
        $this->load->model('M_Tubel_Dosen');
        $this->load->view('V_headerDosen');
        //   $data['tubel']= $this->M_Tubel_Dosen->getTubel();
        $this->load->view('V_riwayatPengaktifan');
        $this->load->view('V_footerDosen');
    }

    public function unduhDosen($id = null)
    {
        $data['fil'] = $id;
        $this->load->model('M_Tubel_Dosen');
        $data['ibel'] = $this->M_Tubel_Dosen->getFile($id);
        $this->load->view('V_headerDosen');
        $this->load->view('V_unduhDosen', $data);
        $this->load->view('V_footerDosen');
    }

    public function unduhDosenPjg($id = null)
    {
        $data['fil'] = $id;
        $this->load->model('M_Tubel_Dosen');
        $data['ibel'] = $this->M_Tubel_Dosen->getFilePjg($id);
        $this->load->view('V_headerDosen');
        $this->load->view('V_unduhDosenpjg', $data);
        $this->load->view('V_footerDosen');
    }

    public function unduhDosenAkt($id = null)
    {
        $data['fil'] = $id;
        $this->load->model('M_Tubel_Dosen');
        $data['ibel'] = $this->M_Tubel_Dosen->getFileAkt($id);
        $this->load->view('V_headerDosen');
        $this->load->view('V_unduhDosenakt', $data);
        $this->load->view('V_footerDosen');
    }

    public function unduhDosen2($id = null)
    {
        $this->load->model('M_Ibel_Dosen');
        $data['fil'] = $id;
        $data['ibel'] = $this->M_Ibel_Dosen->getfileIbel($id);
        $this->load->view('V_headerDosen');
        $this->load->view('V_unduhDosen1', $data);
        $this->load->view('V_footerDosen');
    }

    public function detailIbel($id = null)
    {
        $this->load->model('M_Ibel_Dosen');
        $data['bio'] = $this->M_Ibel_Dosen->getBiodata($id);
        $data['ibel'] = $this->M_Ibel_Dosen->getDataIbel($id);
        $this->load->view('V_headerDosen');
        $this->load->view('V_detailIbelDosen', $data);
        $this->load->view('V_footerDosen');
    }

    public function dokumenSetnegUser()
    {
        $this->load->model('M_Tubel_Dosen');
        $this->load->view('V_headerDosen');
        $data['tubel'] = $this->M_Tubel_Dosen->getSetneg();
        $data['tubel1'] = $this->M_Tubel_Dosen->getPerpanjanganSet();
        // echo "<pre>";
        // print_r($data['tubel1']);
        // die;
        $this->load->view('V_dokumenSetnegUser', $data);
        $this->load->view('V_footerDosen');
    }

    public function upload_file($id = null)
    {
        $this->load->model('M_file_upload');
        $model = $this->M_file_upload;
        $idjenis = $this->M_file_upload->getJenis();
        $a = 1;

        $namafile = array('Surat Jaminan Pembiayaan', 'LOA', 'Surat Keterangan Sehat', 'Surat Rekomendasi Pimpinan', 'Surat Keterangan Linier', 'SKP 2 Tahun Terakhir', 'Surat Pernyataan Bermaterai(9)', 'Bukti Akreditasi Prodi dan Instansi', 'Akta Nikah', 'KARPEG', 'Scan KTP', 'Scan CV', 'Paspor');
        $config['upload_path'] = './file/tubel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $idnew = $id;
        $config['id_tubel'] = $idnew;
        $nik = $this->session->userdata['NIK'];

        $j = 0;
        for ($i = 1; $i <= 13; $i++) {
            $nama = basename($_FILES['file' . $a]['name']);
            $size = $_FILES['file' . $a]['size'];
            $ext = pathinfo($nama, PATHINFO_EXTENSION);
            $new_name = $namafile[$i - 1] . '_' . $nik . '_' . $idnew . '.' . $ext;
            $config['file_name'] = $new_name;
            $config['jenis_file'] = $i;
            $config['file_size'] = $size;
            $config['file_type'] = $ext;
            $config['nama_file'] = $namafile[$i - 1];

            $this->load->library('upload', $config);
            if (!empty($_FILES['file' . $a]['name'])) {
                if (!move_uploaded_file($_FILES['file' . $a]["tmp_name"], "./file/tubel/" . $new_name)) {
                    $this->upload->display_errors();
                } else {
                    $upload = $this->upload->data();
                }

                $model->save($config);
                if ($i == 13) {
                    redirect('C_dosen/submitTB/');
                }

                // echo "<pre>";
                // print_r($config);
                // echo "</pre>";

                //echo "File berhasil di upload";
                //print_r($_FILES) ;
            }
            $a++;
            $j++;
        }

    }

    public function ubahStatusTB()
    {
        $this->load->model('M_Tubel_Dosen');
        $save = $this->M_Tubel_Dosen;
        $post = $this->input->post();

        if ($this->input->post('status') == 11) {
            if ($post['jenis'] == 1) {
                $save->status($this->input->post('status'));
                redirect('C_dosen/uploadfile');
            } else {
                $save->status($this->input->post('status'));
                redirect('C_dosen/uploadfileNon');
            }
        } elseif ($this->input->post('status') == 1 || $this->input->post('status') == 2) {
            if ($post['jenis'] == 2) {
                $save->status($this->input->post('status'));
                redirect('C_dosen/');
            } else {
                $save->statusNon($this->input->post('status'));
                redirect('C_dosen/');
            }
        }

    }

    public function ubahStatusIB()
    {
        $this->load->model('M_Ibel_Dosen');
        $save = $this->M_Ibel_Dosen;
        $post = $this->input->post();

        $status_sl = $this->input->post('status');
        $jenis_actor = $post['jenis']; // 1: Fakultas; 2: Non-Fakultas;

        if ($status_sl == 11) {
            if ($jenis_actor == 1) {
                $save->status();
                redirect('C_dosen/uploadfileIB');
            } else {
                $save->status();
                redirect('C_dosen/uploadfileIBNon');
            }
        } elseif ($status_sl == 1 || $status_sl == 2) {
            if ($jenis_actor == 2) {
                $save->status($status_sl);
                redirect('C_dosen/');
            } else {
                $save->status($status_sl);
                redirect('C_dosen/');
            }
        }

        if ($status_sl == 11) {
            $save->status($status_sl);
            redirect('C_dosen/uploadfileIB');
        } elseif ($status_sl == 1) {
            $save->status($status_sl);
            redirect('C_dosen/submitIB');
        }

    }

    public function upload_fileV2($id = null)
    {
        $this->load->model('M_Tubel_Dosen');
        $this->load->model('M_file_upload');
        $post = $this->input->post();
        $model = $this->M_file_upload;

        $idjenis = $this->input->post('idjenis');
        $namafile = $this->input->post('namajenis');

        if ($post['idjenis'] == 2) {
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['nosurat'] = $this->input->post('NoSurat');
        } elseif ($post['idjenis'] == 4 || $post['idjenis'] == 19 || $post['idjenis'] == 18 || $post['idjenis'] == 67) {
            $config['nosurat'] = $this->input->post('NoSurat');
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = $this->input->post('JabAtasan');
        }

        $config['upload_path'] = './file/tubel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $idnew = $id;
        $config['id_tubel'] = $idnew;
        $nik = $this->session->userdata('NIK');

        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile . '_' . $nik . '_' . $idnew . '.' . $ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] = $namafile;

        if (!in_array($ext, ['png', 'jpg', 'jpeg', 'bmp', 'pdf'])) {
            $fakultas = $this->M_Tubel_Dosen->getFak();
            $array = json_decode(json_encode($fakultas), true);
            $p = array();
            foreach ($array as $key) {
                array_push($p, $key['FAKULTAS']);
            }
            $un = $this->session->userdata('unit');
            if (in_array($un, $p)) {
                redirect('C_dosen/uploadfile/');
            } else {
                redirect('C_dosen/uploadfileNon/');
            }
        }

        $this->load->library('upload', $config);
        if (!empty($_FILES['file']['name'])) {
            if (!move_uploaded_file($_FILES['file']["tmp_name"], "./file/tubel/" . $new_name)) {
                $this->upload->display_errors();
            } else {
                $upload = $this->upload->data();
            }

            $model->save($config);
            $fakultas = $this->M_Tubel_Dosen->getFak();
            $array = json_decode(json_encode($fakultas), true);
            $p = array();
            foreach ($array as $key) {
                array_push($p, $key['FAKULTAS']);
            }
            $un = $this->session->userdata('unit');
            if (in_array($un, $p)) {
                // redirect('C_dosen/uploadfile/');
            } else {
                // redirect('C_dosen/uploadfileNon/');
            }

        }

        redirect($_SERVER['HTTP_REFERER']);

    }

    public function upload_fileTBulang($id = null)
    {
        $this->load->model('M_file_upload');
        $this->load->model('M_Tubel_Dosen');
        $post = $this->input->post();
        $model = $this->M_file_upload;
        // $model2=$this->M_Tubel_Dosen;

        $idjenis = $this->input->post('idjenis');
        $namafile = $this->input->post('namajenis');

        if ($idjenis == 2) {
            $config['nosurat'] = $this->input->post('NoSurat');
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = $this->input->post('JabAtasan');
        } else {
            $config['nosurat'] = '';
            $config['tglsurat'] = '';
            $config['jabatan'] = '';
        }

        $config['upload_path'] = './file/tubel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $config['overwrite'] = true;

        $idnew = $id;
        $config['id_tubel'] = $idnew;
        $nik = $this->session->userdata('NIK');

        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile . '_' . $nik . '_' . $idnew . '.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] = $namafile;

        $this->load->library('upload', $config);
        if (!empty($_FILES['file']['name'])) {
            if (!move_uploaded_file($_FILES['file']["tmp_name"], "./file/tubel/" . $new_name)) {
                $this->upload->display_errors();
            } else {
                $upload = $this->upload->data();
                $model->updateTB2($config);
                $data['tubel'] = $this->M_Tubel_Dosen->fileTubelditangguhkan($id);
                if (empty($data['tubel'])) {
                    $this->M_Tubel_Dosen->updateStatusSL($id);
                }
                // $data['cek']=$model2->fileTubelditangguhkan($idnew);
                // if (empty($data['cek'])) {
                //     $model2->updateStatusSLtangguhkan($idnew);
                // }
                // redirect('C_dosen/fileDitangguhkan/');
            }

            //echo "File berhasil di upload";
            //print_r($_FILES) ;
        }

        // die;
        //redirect('C_dosen/submitTB/');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function upload_filepanjangulang($id = null)
    {
        $this->load->model('M_file_upload');
        // $this->load->model('M_Tubel_Dosen');
        $post = $this->input->post();
        $model = $this->M_file_upload;
        // $model2=$this->M_Tubel_Dosen;

        $idjenis = $this->input->post('idjenis');
        $namafile = $this->input->post('namajenis');

        $config['upload_path'] = './file/perpanjangan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $config['overwrite'] = true;

        $idnew = $id;
        $config['id_tubel'] = $idnew;
        $nik = $this->session->userdata('NIK');

        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile . '_' . $nik . '_' . $idnew . '.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] = $namafile;

        $this->load->library('upload', $config);
        if (!empty($_FILES['file']['name'])) {
            if (!move_uploaded_file($_FILES['file']["tmp_name"], "./file/perpanjangan/" . $new_name)) {
                $this->upload->display_errors();
            } else {
                $upload = $this->upload->data();
                $model->updatePerpanjangan($config);
                // redirect('C_dosen/fileDitangguhkan/');
            }
            // echo "<pre>";
            // print_r($config);
            // echo "</pre>";
        }
        redirect($_SERVER['HTTP_REFERER']);

    }

    public function upload_fileAktifulang($id = null)
    {
        $this->load->model('M_file_upload');
        // $this->load->model('M_Tubel_Dosen');
        $post = $this->input->post();
        $model = $this->M_file_upload;
        // $model2=$this->M_Tubel_Dosen;

        $idjenis = $this->input->post('idjenis');
        $namafile = $this->input->post('namajenis');

        $config['upload_path'] = './file/pengaktifan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $config['overwrite'] = true;

        $idnew = $id;
        $config['id_tubel'] = $idnew;
        $nik = $this->session->userdata('NIK');

        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile . '_' . $nik . '_' . $idnew . '.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] = $namafile;

        $this->load->library('upload', $config);
        if (!empty($_FILES['file']['name'])) {
            if (!move_uploaded_file($_FILES['file']["tmp_name"], "./file/pengaktifan/" . $new_name)) {
                $this->upload->display_errors();
            } else {
                $upload = $this->upload->data();
                $model->updatePengaktifandosen($config['file_name']);
                // redirect('C_dosen/fileDitangguhkan/');
            }
            // echo "<pre>";
            // print_r($config);
            // echo "</pre>";
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function upload_fileIB($id = null)
    {
        $this->load->model('M_file_upload_IB');
        $model = $this->M_file_upload_IB;
        $idjenis = $this->M_file_upload_IB->getJenis();
        $a = 42;

        $namafile = array('Surat Pernyataan Bermaterai(3)', 'Bukti Akreditasi Prodi dan Instansi IB', 'SKP 2 Tahun Terakhir IB', 'Surat Keterangan Sehat IB', 'Surat Keterangan Linier IB', 'Bukti Penerimaan IB');
        $config['upload_path'] = './file/ibel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $idnew = $id;
        $config['id_ib'] = $idnew;
        $nik = $this->session->userdata['NIK'];

        $j = 0;
        for ($i = 42; $i <= 47; $i++) {
            $nama = basename($_FILES['file' . $a]['name']);
            $size = $_FILES['file' . $a]['size'];
            $ext = pathinfo($nama, PATHINFO_EXTENSION);
            $new_name = $namafile[$i - 42] . '_' . $nik . '_' . $idnew . '.' . $ext;
            $config['file_name'] = $new_name;
            $config['jenis_file'] = $i;
            $config['file_size'] = $size;
            $config['file_type'] = $ext;
            $config['nama_file'] = $namafile[$i - 42];

            $this->load->library('upload', $config);
            if (!empty($_FILES['file' . $a]['name'])) {
                if (!move_uploaded_file($_FILES['file' . $a]["tmp_name"], "./file/ibel/" . $new_name)) {
                    $this->upload->display_errors();
                } else {
                    $upload = $this->upload->data();
                }

                $model->save($config);
                if ($i == 47) {
                    // redirect('C_dosen/submitIB/');
                }

                // echo "<pre>";
                // print_r($config);
                // echo "</pre>";

                //echo "File berhasil di upload";
                //print_r($_FILES) ;
            }
            $a++;
            $j++;
        }
        // die;
        // redirect('C_dosen/submitTB/');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function upload_fileIBV2($id = null)
    {
        $this->load->model('M_file_upload_IB');
        $post = $this->input->post();
        $model = $this->M_file_upload_IB;

        $idjenis = $this->input->post('idjenis');
        $namafile = $this->input->post('namajenis');

        $config['upload_path'] = './file/ibel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $idnew = $id;
        $config['id_ib'] = $idnew;
        $nik = $this->session->userdata('NIK');

        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile . '_' . $nik . '_' . $idnew . '.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] = $namafile;

        $this->load->library('upload', $config);
        if (!empty($_FILES['file']['name'])) {
            if (!move_uploaded_file($_FILES['file']["tmp_name"], "./file/ibel/" . $new_name)) {
                $this->upload->display_errors();
            } else {
                $upload = $this->upload->data();
            }

            $model->save($config);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function upload_fileIbelulang($id = null)
    {
        $this->load->model('M_file_upload_IB');
        // $this->load->model('M_Tubel_Dosen');
        $post = $this->input->post();
        $model = $this->M_file_upload_IB;
        // $model2=$this->M_Tubel_Dosen;

        $idjenis = $this->input->post('idjenis');
        $namafile = $this->input->post('namajenis');

        $config['upload_path'] = './file/ibel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $config['overwrite'] = true;

        $idnew = $id;
        $config['id_tubel'] = $idnew;
        $nik = $this->session->userdata('NIK');

        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile . '_' . $nik . '_' . $idnew . '.'.$ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] = $namafile;

        $this->load->library('upload', $config);
        if (!empty($_FILES['file']['name'])) {
            if (!move_uploaded_file($_FILES['file']["tmp_name"], "./file/ibel/" . $new_name)) {
                $this->upload->display_errors();
            } else {
                $upload = $this->upload->data();
                $model->updateIbel($config);
                // redirect('C_dosen/fileDitangguhkan/');
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    // BATAS FUNCTION MONITORING

    public function cekMonitoring()
    {
        $this->load->model('M_monitoring');
        $this->load->model('M_Tubel_Dosen');
        $cek = $this->M_monitoring->cekMonitor();
        foreach ($cek as $key) {
            $penasehat = $key->PENASEHAT_AKADEMIK;
        }
        $cek1 = $this->M_Tubel_Dosen->getIdMo();
        if (empty($cek1)) {
            redirect('C_dosen/BlockMonitoring');
        } elseif (empty($penasehat)) {
            redirect('C_dosen/targetMonitoring');
        } else {
            redirect('C_dosen/tabelMonitoringDosen');
        }
    }

    public function BlockMonitoring()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('V_blockMonitoring');
        $this->load->view('V_footerDosen');
    }

    public function targetMonitoring()
    {
        $this->load->model('M_Tubel_Dosen');
        $this->load->model('M_monitoring');
        $data['tubel'] = $this->M_monitoring->getSemTubel();
        foreach ($data['tubel'] as $key) {
            $id = $key->id_tubel;
        }
        $data['idmonitor'] = $this->M_monitoring->getIdMonitor($id);

        foreach ($data['idmonitor'] as $k) {
            $id1 = $k->ID_MONITORING;
        }
        $this->session->set_userdata('IDMON', $id1);
        $this->load->view('V_headerDosen');
        $this->load->view('monitoring/V_FormAwalMonitoring');
        $this->load->view('V_footerDosen');
    }

    public function savePenasihat()
    {
        $this->load->model('M_monitoring');
        $save = $this->M_monitoring;

        $save->savePenasihat();
        redirect('C_dosen/tabelMonitoringDosen');
    }

    public function tabelMonitoringDosen($semester = null)
    {
        $this->session->set_userdata('nav', 'monitor');
        $this->load->model('M_Tubel_Dosen');
        $data['Biodata'] = $this->M_Tubel_Dosen->getData();
        // echo "<pre>";
        // print_r($data['Biodata']);
        // die;
        $this->load->model('M_monitoring');
        $data['tubel'] = $this->M_monitoring->getSemTubel();
        //$data['target']=$this->M_monitoring->getTarget();
        foreach ($data['tubel'] as $key) {
            $id = $key->id_tubel;
        }
        $data['idmonitor'] = $this->M_monitoring->getIdMonitor($id);

        foreach ($data['idmonitor'] as $k) {
            $id1 = $k->ID_MONITORING;
        }
        $this->session->set_userdata('IDMON', $id1);
        if ($semester == null) {
            $semester = $this->input->post('semester');
        }
        $this->session->set_userdata('sms', $semester);
        $data['aktifitas'] = $this->M_monitoring->getAktifitas($semester, $id1);
        $data['publikasi'] = $this->M_monitoring->getPublikasi($semester, $id1);
        $data['toef'] = $this->M_monitoring->getToefl($semester, $id1);
        $data['tugas'] = $this->M_monitoring->getTugasAkhir($semester, $id1);
        // echo "<pre>";
        // print_r($data['Biodata']);
        // die;

        $this->load->view('V_headerDosen');
        $this->load->view('monitoring/V_monitoring_Dosen', $data);
        $this->load->view('V_footerDosen');
    }

    // public function tabelAktifitasDosen()
    // {
    //     $this->load->view('V_headerDosen');
    //     $this->load->view('V_aktifitasDosen');
    //     $this->load->view('V_footerDosen');
    // }

    // public function tabelPublikasiDosen()
    // {
    //     $this->load->view('V_headerDosen');
    //     $this->load->view('V_publikasiDosen');
    //     $this->load->view('V_footerDosen');
    // }

    // public function tabelSeminarDosen()
    // {
    //     $this->load->view('V_headerDosen');
    //     $this->load->view('V_seminarDosen');
    //     $this->load->view('V_footerDosen');
    // }

    public function tambahAktifitas()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('monitoring/V_formAktivitasStudi');
        $this->load->view('V_footerDosen');
    }

    public function saveAktifitas()
    {
        $this->load->model('M_aktivitas');
        $post = $this->input->post();
        $save = $this->M_aktivitas;
        $validasi = $this->form_validation;
        $validasi->set_rules($save->rules());

        if ($validasi->run()) {
            $save->saveAktivitas();
            $save->updateSemester($post['idmonitor'], $this->session->userdata('sms') + 1);
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringDosen');
        }
    }

    public function saveAktifitas2()
    {
        $this->load->model('M_aktivitas');
        $post = $this->input->post();
        $save = $this->M_aktivitas;

        if (!empty($post)) {
            $save->saveAktivitas();
            //$save->updateSemester($post['idmonitor'],$this->session->userdata('sms')+1);
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringDosen');
        }
    }

    public function editAktifitas($id = null)
    {
        $this->load->model('M_aktivitas');
        $post = $this->input->post();
        $save = $this->M_aktivitas;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        if (!empty($post)) {
            $save->upAktivitas($id);
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringDosen');
        }

        $semester = $this->session->userdata('sms');
        $data['aktifitas'] = $this->M_aktivitas->getAktifitas($semester, $id);

        $this->load->view('V_headerDosen');
        $this->load->view('monitoring/V_formEditAktivitas', $data);
        $this->load->view('V_footerDosen');
    }

    public function tambahPublikasi()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('monitoring/V_formPublikasi');
        $this->load->view('V_footerDosen');
    }

    public function savePublikasi()
    {
        $this->load->model('M_publikasi');
        $post = $this->input->post();
        $save = $this->M_publikasi;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        // if($validasi->run()){
        $save->savePublikasi();
        //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
        redirect('C_dosen/tabelMonitoringDosen');
        //}
    }

    public function editPublikasi($id = null)
    {
        $this->load->model('M_publikasi');
        $post = $this->input->post();
        $save = $this->M_publikasi;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        // echo "<pre>";
        // print_r($_POST);
        // die;
        if (!empty($post)) {
            $save->upPublikasi($id);
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringDosen');

        }

        $semester = $this->session->userdata('sms');
        $data['publik'] = $this->M_publikasi->getPublikasi($id);

        $this->load->view('V_headerDosen');
        $this->load->view('monitoring/V_formEditPublikasi', $data);
        $this->load->view('V_footerDosen');
    }

    public function tambahToefl()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('monitoring/V_formToefl');
        $this->load->view('V_footerDosen');
    }

    public function saveToefl()
    {
        $this->load->model('M_toefl');
        $post = $this->input->post();
        $save = $this->M_toefl;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        if (!empty($post)) {
            $save->saveToefl();
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringDosen');

        } else {
            $this->load->view('V_headerDosen');
            $this->load->view('monitoring/V_formToefl');
            $this->load->view('V_footerDosen');
        }
    }

    public function editToefl($id = null)
    {
        $this->load->model('M_toefl');
        $post = $this->input->post();
        $save = $this->M_toefl;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        if (!empty($post)) {
            $save->upToefl($id);
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringDosen');
        }

        $semester = $this->session->userdata('sms');
        $data['toef'] = $this->M_toefl->getToefl($semester, $id);

        // echo "<pre>";
        // print_r($data['toef']);
        // die;
        $this->load->view('V_headerDosen');
        $this->load->view('monitoring/V_formEditToefl', $data);
        $this->load->view('V_footerDosen');
    }

    public function tambahTA()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('monitoring/V_formTA');
        $this->load->view('V_footerDosen');
    }

    public function saveTA()
    {
        $this->load->model('M_tugasAkhir');
        $this->load->model('M_monitoring');
        $post = $this->input->post();
        $save = $this->M_tugasAkhir;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        $data['idmonitor'] = $this->M_monitoring->getIdMon1($post['idmonitor']);
        $d = $data['idmonitor'][0];
        // echo "<pre>";
        // print_r($d->SEMESTER_SEKARANG);
        // die;
        if (!empty($post)) {
            $save->saveTA();
            $save->updateSemester($post['idmonitor'], $this->session->userdata('sms') + 1);
            if ($d->SEMESTER_SEKARANG > $d->TOTAL_SEMESTER) {
                $save->updateTotalSemester($post['idmonitor'], $d->TOTAL_SEMESTER + 1);
            }
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringDosen');
        }
    }

    public function editTA($id = null)
    {
        $this->load->model('M_tugasAkhir');
        $post = $this->input->post();
        $save = $this->M_tugasAkhir;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());
        // echo "<pre>";
        // print_r($_POST);
        // die;
        if (!empty($post)) {
            $save->upTA($id);
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringDosen');
        }

        $semester = $this->session->userdata('sms');
        $data['tugas'] = $this->M_tugasAkhir->getTugas($semester, $id);

        $this->load->view('V_headerDosen');
        $this->load->view('monitoring/V_formEditTA', $data);
        $this->load->view('V_footerDosen');
    }

    // public function tambahPelatihan()
    // {
    //     $this->load->view('V_headerDosen');
    //     $this->load->view('V_formPelatihan');
    //     $this->load->view('V_footerDosen');
    // }

    public function formPerpanjangan()
    {
        $this->load->model('M_Tubel_Dosen');
        $this->load->model('M_perpanjangan');
        $data['tubel'] = $this->M_Tubel_Dosen->getData2();
        foreach ($data['tubel'] as $k) {
            $un = $k->UNIT_KERJA;
        }
        $fakultas = $this->M_Tubel_Dosen->getFak();
        $array = json_decode(json_encode($fakultas), true);
        $p = array();
        foreach ($array as $key) {
            array_push($p, $key['FAKULTAS']);
        }
        $un = $this->session->userdata('fak');

        $data['cekTubel'] = $this->M_Tubel_Dosen->cekTubel();
        foreach ($data['cekTubel'] as $k) {
            $id = $k->ID_TUBEL;
        }
        $data['cekPanjang'] = $this->M_perpanjangan->cekPerpanjangan($id);

        foreach ($data['cekPanjang'] as $key) {
            $semester = $key->TAMBAHAN_SEMESTER;
        }
        $rowcount = count((array) $data['cekPanjang']);

        if (!empty($data['cekPanjang'])) {
            if ($rowcount == 1) {
                if ($semester == 1) {
                    if (in_array($un, $p)) {

                        $this->load->view('V_headerDosen');
                        $this->load->view('V_formPerpanjangan', $data);
                        $this->load->view('V_footerDosen');
                    } else {

                        $this->load->view('V_headerDosen');
                        $this->load->view('V_formPerpanjanganNon', $data);
                        $this->load->view('V_footerDosen');
                    }
                } else {
                    $this->load->view('V_headerDosen');
                    $this->load->view('V_BlockPerpanjangan');
                    $this->load->view('V_footerDosen');
                }
            } else {
                $this->load->view('V_headerDosen');
                $this->load->view('V_BlockPerpanjangan');
                $this->load->view('V_footerDosen');
            }

        } else {
            if (in_array($un, $p)) {
                $this->load->view('V_headerDosen');
                $this->load->view('V_formPerpanjangan', $data);
                $this->load->view('V_footerDosen');
            } else {
                $this->load->view('V_headerDosen');
                $this->load->view('V_formPerpanjanganNon', $data);
                $this->load->view('V_footerDosen');
            }
        }

    }

    public function savePerpanjangan()
    {
        $this->load->model('M_perpanjangan');
        $save = $this->M_perpanjangan;

        $save->savePerpanjangan();
        $data['id'] = $this->M_perpanjangan->getID();
        foreach ($data['id'] as $key) {
            $id = $key->id_perpanjangan;

        }
        if ($this->input->post('jenis') == 0) {
            $this->upload_Perpanjangan($id);
        } else {
            $this->upload_PerpanjanganNon($id);
        }
        redirect('C_dosen');

    }

    public function formLaporan()
    {
        $this->load->model('M_Ibel_Dosen');
        $data['ibel'] = $this->M_Ibel_Dosen->getIdIbel();
        if (!empty($data['ibel'])) {
            foreach ($data['ibel'] as $k) {
                $id = $k->id_ib;
            }
        } else {
            $id = 0;
        }
        $data['ibel1'] = $this->M_Ibel_Dosen->getsemIbel($id);
        if (!empty($data['ibel1'])) {
            foreach ($data['ibel1'] as $s) {
                $sekarang = $s->SEMESTER_SEKARANG;
                $total = $s->TOTAL_SEMESTER;
            }
        } else {
            $sekarang = 100;
            $total = 0;
        }
        if ($sekarang == $total || $sekarang > $total) {
            $this->load->view('V_headerDosen');
            $this->load->view('V_formLaporanIB', $data);
            $this->load->view('V_footerDosen');
        } else {
            $this->load->view('V_headerDosen');
            $this->load->view('V_tolakPengaktifan');
            $this->load->view('V_footerDosen');
        }
    }

    public function saveLaporan()
    {
        $this->load->model('M_pengaktifanIB');
        $save = $this->M_pengaktifanIB;
        // print_r($this->input->post());
        // die;

        $save->saveLaporan();
        redirect('C_dosen');

    }

    public function upload_Perpanjangan($id = null)
    {
        $this->load->model('M_file_upload');
        $model = $this->M_file_upload;
        $idjenis = $this->M_file_upload->getJenis();
        $a = 1;

        $namafile = array('Surat Pernyataan Keterlambatan TB Bermaterai', 'Surat Rekomendasi dari Lembaga Pendidikan', 'Surat Rekomendasi jaminan perpanjangan pembiayaan tugas belajar dari pemberi beasiswa');

        $idjenis1 = array('26', '27', '28');
        //$idjenis1 = array('26','27','28','54','60');
        $config['upload_path'] = './file/perpanjangan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $idnew = $id;
        $config['id_perpanjangan'] = $idnew;
        $nik = $this->session->userdata['NIK'];

        $j = 0;
        for ($i = 0; $i < 3; $i++) {

            $nama = basename($_FILES['file' . $j]['name']);
            $size = $_FILES['file' . $j]['size'];
            $ext = pathinfo($nama, PATHINFO_EXTENSION);
            $new_name = $namafile[$j] . '_' . $nik . '_' . $idnew . '.' . $ext;
            $config['file_name'] = $new_name;
            $config['jenis_file'] = $idjenis1[$j];
            $config['file_size'] = $size;
            $config['file_type'] = $ext;
            $config['nama_file'] = $namafile[$j];

            $this->load->library('upload', $config);
            if (!empty($_FILES['file' . $j]['name'])) {
                if (!move_uploaded_file($_FILES['file' . $j]["tmp_name"], "./file/perpanjangan/" . $new_name)) {
                    $this->upload->display_errors();
                } else {
                    $upload = $this->upload->data();
                }

                $model->saveFilePanjangan($config);
                // if ($i==5) {
                // redirect('C_dosen/submitTB/');
                // }

                // echo "<pre>";
                // print_r($config);
                // echo "</pre>";

                //echo "File berhasil di upload";
                //print_r($_FILES) ;
            }
            $a++;
            $j++;
        }
        // die;
        //redirect('C_dosen/submitTB/');
    }

    public function upload_PerpanjanganNon($id = null)
    {
        $this->load->model('M_file_upload');
        $model = $this->M_file_upload;
        $idjenis = $this->M_file_upload->getJenis();
        $a = 1;

        $namafile = array('Surat Pernyataan Keterlambatan TB Bermaterai', 'Surat Rekomendasi dari Lembaga Pendidikan', 'Surat Rekomendasi jaminan perpanjangan pembiayaan tugas belajar dari pemberi beasiswa', 'Surat Rekomendasi Perpanjangan Tubel dari pimpinan unit kerja', 'SK Kenaikan Pangkat Terakhir perpanjangan', 'SK Kenaikan Jabatan Terakhir perpanjangan', 'Surat Pengantar Perpanjangan');

        $idjenis1 = array('26', '27', '28', '30', '56', '57', '68');

        //$idjenis1 = array('26','27','28','54','60');
        $config['upload_path'] = './file/perpanjangan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $idnew = $id;
        $config['id_perpanjangan'] = $idnew;
        $nik = $this->session->userdata['NIK'];

        $j = 0;
        for ($i = 0; $i < 7; $i++) {

            if ($_FILES["file" . $i]["error"] != 4) {
                $nama = basename($_FILES['file' . $i]['name']);
                $size = $_FILES['file' . $i]['size'];
                $ext = pathinfo($nama, PATHINFO_EXTENSION);
                $new_name = $namafile[$i] . '_' . $nik . '_' . $idnew . '.' . $ext;
                $config['file_name'] = $new_name;
                $config['jenis_file'] = $idjenis1[$i];
                $config['file_size'] = $size;
                $config['file_type'] = $ext;
                $config['nama_file'] = $namafile[$i];

                $this->load->library('upload', $config);
                if (!empty($_FILES['file' . $i]['name'])) {
                    if (!move_uploaded_file($_FILES['file' . $i]["tmp_name"], "./file/perpanjangan/" . $new_name)) {
                        $this->upload->display_errors();
                    } else {
                        $upload = $this->upload->data();
                    }

                    $model->saveFilePanjangan($config);

                }
                $a++;
                $j++;
            } else {
                continue;
            }
        }

    }

    public function formPengaktifan()
    {
        $this->load->model('M_monitoring');
        $this->load->model('M_Tubel_Dosen');
        $data['monitor'] = $this->M_monitoring->cekMonitor();
        $data['tubel'] = $this->M_Tubel_Dosen->getData2();
        foreach ($data['tubel'] as $k) {
            $id = $k->ID_TUBEL;
            $un = $k->UNIT_KERJA;
            $status = $k->ID_STATUS_SL;
        }
        $fakultas = $this->M_Tubel_Dosen->getFak();
        $array = json_decode(json_encode($fakultas), true);
        $p = array();
        foreach ($array as $key) {
            array_push($p, $key['FAKULTAS']);
        }
        $un = $this->session->userdata('fak');

        foreach ($data['monitor'] as $key) {
            $semskrg = $key->SEMESTER_SEKARANG;
            $total = $key->TOTAL_SEMESTER;
        }

        $data['idtubel'] = $this->M_Tubel_Dosen->getIdTubel();
        $data['cekpeng'] = $this->M_Tubel_Dosen->cekPengaktifan($id);
        if ($data['monitor'] != null) {
            if ($semskrg <= $total || !empty($data['cekpeng'])) {
                $this->load->view('V_headerDosen');
                $this->load->view('V_tolakPengaktifan');
                $this->load->view('V_footerDosen');
            } else {
                if (in_array($un, $p)) {
                    $this->load->view('V_headerDosen');
                    $this->load->view('V_formPengaktifan', $data);
                    $this->load->view('V_footerDosen');
                } else {
                    $this->load->view('V_headerDosen');
                    $this->load->view('V_formPengaktifanNon', $data);
                    $this->load->view('V_footerDosen');
                }
            }
        } else {
            $this->load->view('V_headerDosen');
            $this->load->view('V_tolakPengaktifan');
            $this->load->view('V_footerDosen');
        }

    }

    public function savePengaktifan()
    {
        $this->load->model('M_pengaktifan');
        $save = $this->M_pengaktifan;

        $save->savePengaktifan();
        $data['id'] = $this->M_pengaktifan->getID();
        foreach ($data['id'] as $key) {
            $id = $key->id_pengaktifan;

        }
        if ($this->input->post('jenis') == 0) {
            $this->upload_Pengaktifan($id);
        } else {
            $this->upload_PengaktifanNon($id);
        }
        redirect('C_dosen');

    }

    public function upload_Pengaktifan($id = null)
    {
        $this->load->model('M_file_upload');
        $model = $this->M_file_upload;
        $idjenis = $this->M_file_upload->getJenis();
        $a = 1;

        $namafile = array('Ijazah_SKL', 'Penyetaraan Ijazah');

        $idjenis1 = array('33', '34');
        $config['upload_path'] = './file/pengaktifan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $idnew = $id;
        $config['id_pengaktifan'] = $idnew;
        $nik = $this->session->userdata['NIK'];

        // $j=0;
        // for ($i=0; $i < 2 ; $i++) {

        $nama = basename($_FILES['file0']['name']);
        $size = $_FILES['file0']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile[0] . '_' . $nik . '_' . $idnew . '.' . $ext;
        $config['file_name'] = $new_name;
        $config['jenis_file'] = '33';
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] = $namafile[0];

        $this->load->library('upload', $config);
        if (!empty($_FILES['file0']['name'])) {
            if (!move_uploaded_file($_FILES['file0']["tmp_name"], "./file/pengaktifan/" . $new_name)) {
                $this->upload->display_errors();
            } else {
                $upload = $this->upload->data();
            }

            $model->saveFilePengaktifan($config);

        }

    }

    public function upload_PengaktifanNon($id = null)
    {
        $this->load->model('M_file_upload');
        $model = $this->M_file_upload;
        $idjenis = $this->M_file_upload->getJenis();
        $a = 1;

        $namafile = array('Ijazah_SKL', 'Berita Acara Pemeriksaan', 'DP3 Tahun Terakhir', 'Surat Keterangan Melaksanakan Tugas dan Mata Kuliah Yang Dibina', 'Surat Pengantar Pengajuan Pengaktifan', 'SK Kenaikan Pangkat', 'SK Kenaikan Jabatan');

        $idjenis1 = array('33', '35', '66', '37', '69', '58', '59');
        $config['upload_path'] = './file/pengaktifan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6000000';
        $idnew = $id;
        $config['id_pengaktifan'] = $idnew;
        $nik = $this->session->userdata['NIK'];

        $j = 0;
        for ($i = 0; $i < 5; $i++) {

            $nama = basename($_FILES['file' . $i]['name']);
            $size = $_FILES['file' . $i]['size'];
            $ext = pathinfo($nama, PATHINFO_EXTENSION);
            $new_name = $namafile[$i] . '_' . $nik . '_' . $idnew . '.' . $ext;
            $config['file_name'] = $new_name;
            $config['jenis_file'] = $idjenis[$i];
            $config['file_size'] = $size;
            $config['file_type'] = $ext;
            $config['nama_file'] = $namafile[$i];

            $this->load->library('upload', $config);
            if (!empty($_FILES['file' . $i]['name'])) {
                if (!move_uploaded_file($_FILES['file' . $i]["tmp_name"], "./file/pengaktifan/" . $new_name)) {
                    $this->upload->display_errors();
                } else {
                    $upload = $this->upload->data();
                }

                $model->saveFilePengaktifan($config);

            }

        }

    }

    // ---------------------------------------MONITORING IBEL----------------------------------------------

    // BATAS FUNCTION MONITORING

    public function cekMonitoringIB()
    {
        $this->load->model('M_monitoringIB');
        $this->load->model('M_Ibel_Dosen');
        $cek = $this->M_monitoringIB->cekMonitor();
        foreach ($cek as $key) {
            $penasehat = $key->PENASEHAT_AKADEMIK;
        }
        $cek1 = $this->M_Ibel_Dosen->getIdMo();
        if (empty($cek1)) {
            redirect('C_dosen/BlockMonitoring');
        } elseif (empty($penasehat)) {
            redirect('C_dosen/targetMonitoringIB');
        } else {
            redirect('C_dosen/tabelMonitoringIBDosen');
        }
    }

    public function targetMonitoringIB()
    {
        $this->load->model('M_Ibel_Dosen');
        $this->load->model('M_monitoringIB');
        $data['tubel'] = $this->M_monitoringIB->getSemTubel();
        foreach ($data['tubel'] as $key) {
            $id = $key->id_ib;
        }
        $data['idmonitor'] = $this->M_monitoringIB->getIdMonitor($id);
        
        $id1=null;
        foreach ($data['idmonitor'] as $k) {
            $id1 = $k->ID_MONITORING_IB;
        }
        $this->session->set_userdata('IDMON', $id1);
        $this->load->view('V_headerDosen');
        $this->load->view('monitoringIB/V_FormAwalMonitoringIB');
        $this->load->view('V_footerDosen');
    }

    public function savePenasihatIB()
    {
        $this->load->model('M_monitoringIB');
        $save = $this->M_monitoringIB;

        $save->savePenasihat();
        redirect('C_dosen/tabelMonitoringIBDosen');
    }

    // public function tabelMonitoringIBDosen($semester=NULL)
    // {
    //     $this->load->model('M_Ibel_Dosen');
    //     $data['Biodata']= $this->M_Ibel_Dosen->getData();
    //     $this->load->model('M_monitoringIB');
    //     $data['tubel']=$this->M_monitoringIB->getSemTubel();
    //     $data['target']=$this->M_monitoringIB->getTarget();
    //     foreach ($data['tubel'] as $key) {
    //         $id=$key->id_ib;
    //     }
    //     $data['idmonitor']=$this->M_monitoringIB->getIdMonitor($id);

    //     foreach ($data['idmonitor'] as $k) {
    //         $id1=$k->ID_MONITORING_IB;
    //     }
    //     $this->session->set_userdata('IDMON',$id1);
    //     if ($semester==NULL) {
    //     $semester = $this->input->post('semester');
    //     }
    //     $this->session->set_userdata('sms',$semester);
    //     $data['aktifitas']=$this->M_monitoringIB->getAktifitas($semester,$id1);
    //     $data['publikasi']=$this->M_monitoringIB->getPublikasi($semester,$id1);
    //     $data['penghargaan']=$this->M_monitoringIB->getPenghargaan($semester,$id1);
    //     $data['seminar']=$this->M_monitoringIB->getSeminar($semester,$id1);

    //     $this->load->view('V_headerDosen');
    //     $this->load->view('V_monitoringIBDosen',$data);
    //     $this->load->view('V_footerDosen');
    // }

    public function tabelMonitoringIBDosen($semester = null)
    {
        $this->session->set_userdata('nav', 'monitor');
        $this->load->model('M_Ibel_Dosen');
        $data['Biodata'] = $this->M_Ibel_Dosen->getData();
        // echo "<pre>";
        // print_r($data['Biodata']);
        // die;
        $this->load->model('M_monitoringIB');
        $data['tubel'] = $this->M_monitoringIB->getSemIbel();
        //$data['target']=$this->M_monitoring->getTarget();
        foreach ($data['tubel'] as $key) {
            $id = $key->id_ib;
        }
        $data['idmonitor'] = $this->M_monitoringIB->getIdMonitor($id);

        $id1 = null;
        foreach ($data['idmonitor'] as $k) {
            $id1 = $k->ID_MONITORING_IB;
        }
        $this->session->set_userdata('IDMON', $id1);
        if ($semester == null) {
            $semester = $this->input->post('semester');
        }
        $this->session->set_userdata('sms', $semester);
        $data['aktifitas'] = $this->M_monitoringIB->getAktifitas($semester, $id1);
        $data['publikasi'] = $this->M_monitoringIB->getPublikasi($semester, $id1);
        $data['toef'] = $this->M_monitoringIB->getToefl($semester, $id1);
        $data['tugas'] = $this->M_monitoringIB->getTugasAkhir($semester, $id1);

        $this->load->view('V_headerDosen');
        $this->load->view('monitoringIB/V_monitoringIB_Dosen', $data);
        $this->load->view('V_footerDosen');
    }

    public function tambahAktifitasIB()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('monitoringIB/V_formAktivitasStudi');
        $this->load->view('V_footerDosen');
    }

    public function saveAktifitasIB()
    {
        $this->load->model('M_aktivitasIB');
        $post = $this->input->post();
        $save = $this->M_aktivitasIB;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        if (!empty($post)) {
            $save->saveAktivitas();
            //$save->updateSemester($post['idmonitor'],$this->session->userdata('sms')+1);
            //redirect('C_dosen/tabelMonitoringIBDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringIBDosen');
        }
    }

    public function editAktifitasIB($id = null)
    {
        $this->load->model('M_aktivitasIB');
        $post = $this->input->post();
        $save = $this->M_aktivitasIB;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        if (!empty($post)) {
            $save->upAktivitas($id);

            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringIBDosen');
        }

        $semester = $this->session->userdata('sms');
        $data['aktifitas'] = $this->M_aktivitasIB->getAktifitas($semester, $id);

        $this->load->view('V_headerDosen');
        $this->load->view('monitoringIB/V_formEditAktivitas', $data);
        $this->load->view('V_footerDosen');
    }

    public function tambahPublikasiIB()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('monitoringIB/V_formPublikasi');
        $this->load->view('V_footerDosen');
    }

    public function savePublikasiIB()
    {
        $this->load->model('M_publikasiIB');
        $post = $this->input->post();
        $save = $this->M_publikasiIB;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        // if($validasi->run()){
        $save->savePublikasi();
        //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
        redirect('C_dosen/tabelMonitoringIBDosen');
        //}
    }

    public function editPublikasiIB($id = null)
    {
        $this->load->model('M_publikasiIB');
        $post = $this->input->post();
        $save = $this->M_publikasiIB;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        // echo "<pre>";
        // print_r($_POST);
        // die;
        if (!empty($post)) {
            $save->upPublikasi($id);
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringIBDosen');

        }

        $semester = $this->session->userdata('sms');
        $data['publik'] = $this->M_publikasiIB->getPublikasi($semester, $id);

        $this->load->view('V_headerDosen');
        $this->load->view('monitoringIB/V_formEditPublikasi', $data);
        $this->load->view('V_footerDosen');
    }

    public function tambahToeflIB()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('monitoringIB/V_formToefl');
        $this->load->view('V_footerDosen');
    }

    public function saveToeflIB()
    {
        $this->load->model('M_toeflIB');
        $post = $this->input->post();
        $save = $this->M_toeflIB;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        if (!empty($post)) {
            $save->saveToefl();
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringIBDosen');

        } else {
            $this->load->view('V_headerDosen');
            $this->load->view('monitoring/V_formToefl');
            $this->load->view('V_footerDosen');
        }
    }

    public function editToeflIB($id = null)
    {
        $this->load->model('M_toeflIB');
        $post = $this->input->post();
        $save = $this->M_toeflIB;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());

        if (!empty($post)) {
            $save->upToefl($id);
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringIBDosen');
        }

        $semester = $this->session->userdata('sms');
        $data['toef'] = $this->M_toeflIB->getToefl($semester, $id);

        // echo "<pre>";
        // print_r($data['toef']);
        // die;
        $this->load->view('V_headerDosen');
        $this->load->view('monitoringIB/V_formEditToefl', $data);
        $this->load->view('V_footerDosen');
    }

    public function tambahTAIB()
    {
        $this->load->view('V_headerDosen');
        $this->load->view('monitoringIB/V_formTA');
        $this->load->view('V_footerDosen');
    }

    public function saveTAIB()
    {
        $this->load->model('M_tugasAkhirIB');
        $this->load->model('M_monitoringIB');
        $post = $this->input->post();
        $save = $this->M_tugasAkhirIB;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());
        // echo "<pre>";
        // print_r($post);
        // die;
        $data['idmonitor'] = $this->M_monitoringIB->getIdMon1($post['idmonitor']);
        $d = $data['idmonitor'][0];
        // echo "<pre>";
        // print_r($d->TOTAL_SEMESTER);
        // die;
        if (!empty($post)) {
            $save->saveTA();
            $save->updateSemester($post['idmonitor'], $this->session->userdata('sms') + 1);
            if ($d->SEMESTER_SEKARANG > $TOTAL_SEMESTER) {
                $save->updateTotalSemester($post['idmonitor'], $d->TOTAL_SEMESTER + 1);
            }
            redirect('C_dosen/tabelMonitoringIBDosen');
        }
    }

    public function editTAIB($id = null)
    {
        $this->load->model('M_tugasAkhirIB');
        $post = $this->input->post();
        $save = $this->M_tugasAkhirIB;
        // $validasi = $this->form_validation;
        // $validasi->set_rules($save->rules());
        // echo "<pre>";
        // print_r($_POST);
        // die;
        if (!empty($post)) {
            $save->upTA($id);
            //redirect('C_dosen/tabelMonitoringDosen/'.$post['semester']);
            redirect('C_dosen/tabelMonitoringIBDosen');
        }

        $semester = $this->session->userdata('sms');
        $data['tugas'] = $this->M_tugasAkhirIB->getTugas($semester, $id);

        $this->load->view('V_headerDosen');
        $this->load->view('monitoringIB/V_formEditTA', $data);
        $this->load->view('V_footerDosen');
    }

    //  // public function tambahPelatihan()
    //  // {
    //  //     $this->load->view('V_headerDosen');
    //  //     $this->load->view('V_formPelatihan');
    //  //     $this->load->view('V_footerDosen');
    //  // }

    //  public function formPerpanjangan(){
    //      $this->load->model('M_Tubel_Dosen');
    //      $data['tubel']=$this->M_Tubel_Dosen->getData();
    //      $this->load->view('V_headerDosen');
    //      $this->load->view('V_formPerpanjangan',$data);
    //      $this->load->view('V_footerDosen');
    //  }

    //  public function savePerpanjangan()
    //  {
    //      $this->load->model('M_perpanjangan');
    //      $save=$this->M_perpanjangan;

    //      $save->savePerpanjangan();
    //      $data['id']=$this->M_perpanjangan->getID();
    //      foreach ($data['id'] as $key) {
    //          $id = $key->id_perpanjangan;

    //      }
    //      $this->upload_Perpanjangan($id);
    //      redirect('C_dosen');

    //  }

    //  public function formLaporan(){
    //      $this->load->model('M_Ibel_Dosen');
    //      $data['ibel']=$this->M_Ibel_Dosen->getIdIbel();
    //      $this->load->view('V_headerDosen');
    //      $this->load->view('V_formLaporanIB',$data);
    //      $this->load->view('V_footerDosen');
    //  }

    //  public function saveLaporan()
    //  {
    //      $this->load->model('M_pengaktifanIB');
    //      $save=$this->M_pengaktifanIB;
    //      // print_r($this->input->post());
    //      // die;

    //      $save->saveLaporan();
    //      redirect('C_dosen');

    //  }

    // function upload_Perpanjangan($id = NULL){
    //      $this->load->model('M_file_upload');
    //      $model=$this->M_file_upload;
    //      $idjenis=$this->M_file_upload->getJenis();
    //      $a=1;

    //      $namafile = array('Surat Pernyataan Keterlambatan TB Bermaterai','Surat Rekomendasi dari Lembaga Pendidikan','Surat Keterangan Pembiayaan Perpanjangan','Progress Report','Surat Rekomendasi Perpanjangan dari Unit Kerja');

    //      $idjenis1 = array('26','27','28','54','60');
    //      $config['upload_path'] = './file/perpanjangan/'; //path folder
    //      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
    //      $config['max_size']  = '2000000';
    //      $idnew=$id;
    //      $config['id_perpanjangan'] = $idnew;
    //      $nik=$this->session->userdata['NIK'];

    //      $j=0;
    //      for ($i=0; $i < 5 ; $i++) {

    //      $nama = basename($_FILES['file'.$j]['name']);
    //      $size = $_FILES['file'.$j]['size'];
    //      $ext = pathinfo($nama, PATHINFO_EXTENSION);
    //      $new_name = $namafile[$j].'_'.$nik.'_'.$idnew.'.'.$ext;
    //      $config['file_name'] = $new_name;
    //      $config['jenis_file'] = $idjenis1[$j];
    //      $config['file_size'] = $size;
    //      $config['file_type'] = $ext;
    //      $config['nama_file'] =$namafile[$j];

    //      $this->load->library('upload',$config);
    //          if(!empty($_FILES['file'.$j]['name'])){
    //              if(!move_uploaded_file($_FILES['file'.$j]["tmp_name"], "./file/perpanjangan/" . $new_name)){
    //                  $this->upload->display_errors();
    //              }
    //              else
    //                  $upload=$this->upload->data();
    //                  $model->saveFilePanjangan($config);
    //                  // if ($i==5) {
    //                  // redirect('C_dosen/submitTB/');
    //                  // }

    //                  // echo "<pre>";
    //                  // print_r($config);
    //                  // echo "</pre>";

    //                  //echo "File berhasil di upload";
    //                  //print_r($_FILES) ;
    //          }
    //      $a++;
    //      $j++;
    //      }
    //      // die;
    //      //redirect('C_dosen/submitTB/');
    //  }

    //  public function formPengaktifan(){
    //      $this->load->model('M_monitoring');
    //      $this->load->model('M_Tubel_Dosen');
    //      $data['monitor']=$this->M_monitoring->cekMonitor();
    //      foreach ($data['monitor'] as $key) {
    //          $semskrg=$key->SEMESTER_SEKARANG;
    //          $total=$key->TOTAL_SEMESTER;
    //      }
    //      $data['idtubel']=$this->M_Tubel_Dosen->getIdTubel();
    //      if($data['monitor']!=NULL){
    //      if ($semskrg==$total) {
    //      $this->load->view('V_headerDosen');
    //      $this->load->view('V_tolakPengaktifan');
    //      $this->load->view('V_footerDosen');
    //      }else {
    //      $this->load->view('V_headerDosen');
    //      $this->load->view('V_formPengaktifan',$data);
    //      $this->load->view('V_footerDosen');
    //      }
    //      }else{
    //      $this->load->view('V_headerDosen');
    //      $this->load->view('V_tolakPengaktifan');
    //      $this->load->view('V_footerDosen');
    //      }

    //  }

    //  public function savePengaktifan()
    //  {
    //      $this->load->model('M_pengaktifan');
    //      $save=$this->M_pengaktifan;

    //      $save->savePengaktifan();
    //      $data['id']=$this->M_pengaktifan->getID();
    //      foreach ($data['id'] as $key) {
    //          $id = $key->id_pengaktifan;

    //      }
    //      $this->upload_Pengaktifan($id);
    //      redirect('C_dosen');

    //  }

    //  function upload_Pengaktifan($id = NULL){
    //      $this->load->model('M_file_upload');
    //      $model=$this->M_file_upload;
    //      $idjenis=$this->M_file_upload->getJenis();
    //      $a=1;

    //      $namafile = array('Ijazah_SKL','Penyetaraan Ijazah');

    //      $idjenis1 = array('33','34');
    //      $config['upload_path'] = './file/perpanjangan/'; //path folder
    //      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
    //      $config['max_size']  = '2000000';
    //      $idnew=$id;
    //      $config['id_pengaktifan'] = $idnew;
    //      $nik=$this->session->userdata['NIK'];

    //      $j=0;
    //      for ($i=0; $i < 2 ; $i++) {

    //      $nama = basename($_FILES['file'.$j]['name']);
    //      $size = $_FILES['file'.$j]['size'];
    //      $ext = pathinfo($nama, PATHINFO_EXTENSION);
    //      $new_name = $namafile[$j].'_'.$nik.'_'.$idnew.'.'.$ext;
    //      $config['file_name'] = $new_name;
    //      $config['jenis_file'] = $idjenis1[$j];
    //      $config['file_size'] = $size;
    //      $config['file_type'] = $ext;
    //      $config['nama_file'] =$namafile[$j];

    //      $this->load->library('upload',$config);
    //          if(!empty($_FILES['file'.$j]['name'])){
    //              if(!move_uploaded_file($_FILES['file'.$j]["tmp_name"], "./file/perpanjangan/" . $new_name)){
    //                  $this->upload->display_errors();
    //              }
    //              else
    //                  $upload=$this->upload->data();
    //                  $model->saveFilePengaktifan($config);
    //                  // if ($i==5) {
    //                  // redirect('C_dosen/submitTB/');
    //                  // }

    //                  // echo "<pre>";
    //                  // print_r($config);
    //                  // echo "</pre>";

    //                  //echo "File berhasil di upload";
    //                  //print_r($_FILES) ;
    //          }
    //      $a++;
    //      $j++;
    //      }
    //      // die;
    //      //redirect('C_dosen/submitTB/');
    //  }

}
