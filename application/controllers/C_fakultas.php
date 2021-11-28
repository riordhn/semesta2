<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_fakultas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Tubel_Fakultas');
        $this->load->helper(array('form'));
        $this->load->library('session');
        if ($this->session->userdata('masuk') != true) {
            $url = base_url('C_loginStaff');
            redirect($url);
        }

    }

    public function index()
    {
        if ($this->session->userdata('akses') == '1') {

            $this->load->model('M_Tubel_Fakultas');
            $this->load->model('M_Ibel_Fakultas');
            $data['tubel'] = $this->M_Tubel_Fakultas->getTubelall();
            $data['tubel1'] = $this->M_Tubel_Fakultas->hitungDash('1');
            $data['tubel2'] = $this->M_Tubel_Fakultas->hitungDashSDM();
            $data['tubel3'] = $this->M_Tubel_Fakultas->hitungDash('5');
            $data['tubel4'] = $this->M_Tubel_Fakultas->hitungDash('7');
            $data['pp'] = $this->M_Tubel_Fakultas->hitungpp();
            $data['pk'] = $this->M_Tubel_Fakultas->hitungpk();
            $data['Ibelall'] = $this->M_Ibel_Fakultas->getIbel();
            $data['ibel1'] = $this->M_Ibel_Fakultas->hitungDashIB('1');
            $data['ibel2'] = $this->M_Ibel_Fakultas->hitungDashSDMIB();
            $data['ibel4'] = $this->M_Ibel_Fakultas->hitungDashIB('7');

            $data['tangguh'] = $this->M_Tubel_Fakultas->fileTubelditangguhkan();
            $data['tpan'] = $this->M_Tubel_Fakultas->filePanjangditangguhkan();
            $data['takt'] = $this->M_Tubel_Fakultas->fileAktifditangguhkan();
            $data['ibel'] = $this->M_Ibel_Fakultas->fileIbelditangguhkan();

            $this->load->view('V_headerFakultas');
            $this->load->view('V_riwayatFakultas', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function fileDitangguhkan()
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Tubel_Fakultas');
            $this->load->model('M_Ibel_Fakultas');
            $this->load->model('M_file_upload');
            // $this->load->model('M_file_upload_IB');
            // $this->load->model('M_perpanjangan');
            // $this->load->model('M_pengaktifan');
            $data['tubel'] = $this->M_Tubel_Fakultas->fileTubelditangguhkan();
            $data['tubel1'] = $this->M_Tubel_Fakultas->filePanjangditangguhkan();
            $data['takt'] = $this->M_Tubel_Fakultas->fileAktifditangguhkan();
            $data['ibel'] = $this->M_Ibel_Fakultas->fileIbelditangguhkan();

            // echo "<pre>";
            // print_r($data);
            // die;

            // if ($row==0) {
            //     $this->M_Tubel_Fakultas->updateStatusSL($id);
            //  }

            $this->load->view('V_headerFakultas');
            $this->load->view('V_ditangguhkanFak', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function usulanTBFakultas()
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Tubel_Fakultas');
            $data['tubel'] = $this->M_Tubel_Fakultas->getTubel();
            foreach ($data['tubel'] as $key) {
                $i = 1;
                $id = $key->ID_TUBEL;
                //$data['file']=$this->M_Tubel_Fakultas->fileTubelditangguhkan($id);
                // echo "<pre>";
                // print_r($data['file'.$i]);
                $i++;

            }

            $this->load->view('V_headerFakultas');
            $this->load->view('V_TabelTBFakultas', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function dataTubel($id)
    {
        $this->load->model('M_Tubel_Fakultas');
        $data['tubel'] = $this->M_Tubel_Fakultas->getTubel2($id);
        // echo "<pre>";
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_headerFakultas');
        $this->load->view('V_TabelDataTBFakultas', $data);
        $this->load->view('V_footerFakultas');
    }

    public function usulanLaporanIB()
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Ibel_Fakultas');
            $data['laporan'] = $this->M_Ibel_Fakultas->getLaporan();
            $this->load->view('V_headerFakultas');
            $this->load->view('V_usulanLaporanFakultas', $data);
            $this->load->view('V_footerFakultas');

        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function prosesTBFakultas($id = null)
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Tubel_Fakultas');
            $data['file'] = $this->M_Tubel_Fakultas->getFile($id);
            $this->load->view('V_headerFakultas');
            $this->load->view('V_prosesFakultas', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function lakukan_download($id = null)
    {
        $this->load->helper('download');
        force_download('file/tubel/' . $id, null);
    }

    public function outputPermohonanIB($id = null)
    {
        $this->load->model('M_Ibel_Dosen');
        $data['tubel'] = $this->M_Ibel_Dosen->getDataIbelDiriFak($id);
        // echo "<pre>";
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_PermohonanIB', $data);
    }

    public function outputPermohonanTB($id = null)
    {
        $this->load->model('M_Tubel_Dosen');
        $data['tubel'] = $this->M_Tubel_Dosen->getDataTubelDiriFak($id);
        // echo "<pre>";
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_PermohonanTB', $data);
    }

    public function outputSKPjg($id = null)
    {
        $this->load->model('M_Tubel_Dosen');
        $data['tubel'] = $this->M_Tubel_Dosen->getDataPjgDiriFak($id);
        // echo "<pre>";
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_SKPjg', $data);
    }

    public function outputSKAktif($id = null)
    {
        $this->load->model('M_Tubel_Dosen');
        $data['tubel'] = $this->M_Tubel_Dosen->getDataAktifDiriFak($id);
        // echo "<pre>";
        // print_r($data['tubel']);
        // die;
        $this->load->view('V_SKAktif', $data);
    }

    public function upload_fileTBulang($id = null)
    {
        $this->load->model('M_file_upload');
        $post = $this->input->post();
        $model = $this->M_file_upload;

        $idjenis = $this->input->post('idjenis');
        $namafile = $this->input->post('namajenis');
        // echo "<pre>";
        // print_r($post['kode']);
        // die;
        if ($post['kode'] == 1) {
            $config['nosurat'] = $this->input->post('NoSurat');
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = $this->input->post('JabAtasan');
        } elseif ($post['kode'] == 2) {
            $config['nosurat'] = $this->input->post('NoSurat');
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = '';
        } else {
            $config['nosurat'] = '';
            $config['tglsurat'] = '';
            $config['jabatan'] = '';
        }

        $config['upload_path'] = './file/tubel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2000000';
        $config['overwrite'] = true;

        $idnew = $id;
        $config['id_tubel'] = $idnew;
        $nik = $this->input->post('NIK');

        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile . '_' . $nik . '_' . $idnew . '.pdf';
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
            }

            $model->updateTB2($config);
            redirect('C_fakultas/fileDitangguhkan');

            // echo "<pre>";
            // print_r($config);
            // die;
            // echo "</pre>";

            //echo "File berhasil di upload";
            //print_r($_FILES) ;
        }

        // die;
        //redirect('C_dosen/submitTB/');
    }

    public function upload_filePanjangulang($id = null)
    {
        $this->load->model('M_file_upload');
        $post = $this->input->post();
        $model = $this->M_file_upload;

        $idjenis = $this->input->post('idjenis');
        $namafile = $this->input->post('namajenis');

        $config['upload_path'] = './file/perpanjangan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2000000';
        $config['overwrite'] = true;

        $idnew = $id;
        $config['id_tubel'] = $idnew;
        $nik = $this->input->post('NIK');

        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile . '_' . $nik . '_' . $idnew . '.pdf';
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] = $namafile;

        if ($post['kode'] == 1) {
            $config['nosurat'] = $this->input->post('NoSurat');
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = $this->input->post('JabAtasan');
        } elseif ($post['kode'] == 2) {
            $config['nosurat'] = $this->input->post('NoSurat');
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = '';
        } else {
            $config['nosurat'] = '';
            $config['tglsurat'] = '';
            $config['jabatan'] = '';
        }

        // echo "<pre>";
        // print_r($config);
        // die;

        $this->load->library('upload', $config);
        if (!empty($_FILES['file']['name'])) {
            if (!move_uploaded_file($_FILES['file']["tmp_name"], "./file/perpanjangan/" . $new_name)) {
                $this->upload->display_errors();
            } else {
                $upload = $this->upload->data();
            }

            $model->updatePerpanjangan($config);
            redirect('C_fakultas/fileDitangguhkan');

        }

    }

    public function upload_fileAktifulang($id = null)
    {
        $this->load->model('M_file_upload');
        $post = $this->input->post();
        $model = $this->M_file_upload;

        $idjenis = $this->input->post('idjenis');
        $namafile = $this->input->post('namajenis');

        $config['upload_path'] = './file/pengaktifan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2000000';
        $config['overwrite'] = true;

        $idnew = $id;
        $config['id_tubel'] = $idnew;
        $nik = $this->input->post('NIK');

        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile . '_' . $nik . '_' . $idnew . '.pdf';
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] = $namafile;

        // echo "<pre>";
        // print_r($config);
        // die;
        if ($post['kode'] == 1) {
            $config['nosurat'] = $this->input->post('NoSurat');
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = $this->input->post('JabAtasan');
        } elseif ($post['kode'] == 2) {
            $config['nosurat'] = $this->input->post('NoSurat');
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = null;
        } elseif ($post['kode'] == 3) {
            $config['nosurat'] = null;
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = null;
        } else {
            $config['nosurat'] = '';
            $config['tglsurat'] = '';
            $config['jabatan'] = '';
        }

        $this->load->library('upload', $config);
        if (!empty($_FILES['file']['name'])) {
            if (!move_uploaded_file($_FILES['file']["tmp_name"], "./file/pengaktifan/" . $new_name)) {
                $this->upload->display_errors();
            } else {
                $upload = $this->upload->data();
            }

            $model->updatePengaktifan($config);
            redirect('C_fakultas/fileDitangguhkan');

        }

    }

    public function uploadFileTBFakultas($id)
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Tubel_Fakultas');
            $data['nik'] = $this->M_Tubel_Fakultas->getNik($id);
            $this->load->view('V_headerFakultas');
            $this->load->view('V_UploadFileFakultas', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function upload_file($id = null)
    {
        $this->load->model('M_file_upload');
        $this->load->model('M_Tubel_Fakultas');
        $update = $this->M_Tubel_Fakultas;
        $data['nik'] = $this->M_Tubel_Fakultas->getNik($id);
        foreach ($data['nik'] as $ni) {
            $nik = $ni->NIK;
            $idtubel = $ni->id_tubel;
            //die;
        }
        $model = $this->M_file_upload;
        $idjenis = $this->M_file_upload->getJenis();
        $a = 1;

        $namafile = array('Surat Rekomendasi Pimpinan', 'SK Kenaikan Jabatan Terakhir', 'SK Kenaikan Pangkat Terakhir', 'SK PNS', 'SK CPNS', 'Surat Permohonan SK TB', 'Surat Keterangan Linier', 'Surat Pernyataan Bermaterai(9)', 'KARPEG', 'Konversi NIP', 'Surat Pengantar Pengajuan Tugas Belajar');
        $idfile = array('4', '15', '16', '17', '18', '19', '5', '7', '10', '65', '67');
        $config['upload_path'] = './file/tubel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2000000';
        $idnew = $idtubel;
        $config['id_tubel'] = $idnew;

        $j = 0;
        if (!empty($_FILES["file65"]["tmp_name"])) {
            $count = 11;
        } else {
            $count = 10;
        }
        for ($i = 0; $i < $count; $i++) {

            $nama = basename($_FILES['file' . $idfile[$i]]['name']);
            $size = $_FILES['file' . $idfile[$i]]['size'];
            $ext = pathinfo($nama, PATHINFO_EXTENSION);
            $new_name = $namafile[$i] . '_' . $nik . '_' . $idnew . '.' . $ext;
            $config['file_name'] = $new_name;
            $config['jenis_file'] = $idfile[$i];
            $config['file_size'] = $size;
            $config['file_type'] = $ext;
            $config['nama_file'] = $namafile[$i];
            if ($idfile[$i] == '4') {
                $config['tglsurat'] = $this->input->post('TglSuratRek');
                $config['nosurat'] = $this->input->post('NoSuratRek');
                $config['jabatan'] = $this->input->post('JabAtasanRek');
            } elseif ($idfile[$i] == '18') {
                $config['tglsurat'] = $this->input->post('TglSuratCPNS');
                $config['nosurat'] = $this->input->post('NoSuratCPNS');
                $config['jabatan'] = $this->input->post('JabAtasanCPNS');
            } elseif ($idfile[$i] == '19') {
                $config['tglsurat'] = $this->input->post('TglSuratPer');
                $config['nosurat'] = $this->input->post('NoSuratPer');
                $config['jabatan'] = $this->input->post('JabAtasanPer');
            } elseif ($idfile[$i] == '67') {
                $config['tglsurat'] = $this->input->post('TglSuratPeng');
                $config['nosurat'] = $this->input->post('NoSuratPeng');
            }

            $this->load->library('upload', $config);
            if (!empty($_FILES['file' . $idfile[$i]]['name'])) {
                if (!move_uploaded_file($_FILES['file' . $idfile[$i]]["tmp_name"], "./file/tubel/" . $new_name)) {
                    $this->upload->display_errors();
                } else {
                    $upload = $this->upload->data();
                }

                $model->save($config);
                //redirect('home/cindex');
                // echo "<pre>";
                // print_r($config);
                // echo "</pre>";

                //echo "File berhasil di upload";
                //print_r($_FILES) ;
            }
            $a++;
            $j++;
        }
        $update->update_status($idtubel);
        //die;
        redirect('C_fakultas/usulanTBFakultas/');
    }

    public function upload_fileIB($id = null)
    {
        $this->load->model('M_file_upload_IB');
        $this->load->model('M_Ibel_Fakultas');
        $update = $this->M_Ibel_Fakultas;
        $data['nik'] = $this->M_Ibel_Fakultas->getNik($id);
        foreach ($data['nik'] as $ni) {
            $nik = $ni->NIK;
            $idtubel = $ni->id_ib;
            //die;
        }
        $model = $this->M_file_upload_IB;
        $idjenis = $this->M_file_upload_IB->getJenis();
        $a = 1;

        $namafile = array('Surat Keterangan studi Linear dengan pekerjaan',
            'SK CPNS_Calon Pegawai tetap',
            'SK PNS_Pegawai Tetap',
            'SK Kenaikan Pangkat terakhir',
            'SK Kenaikan Jabatan Terakhir',
            'Surat Pengantar Pengajuan Izin Belajar',
        );
        $idf = array('46', '49', '50', '51', '52', '70');
        $config['upload_path'] = './file/ibel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2000000';
        $idnew = $idtubel;
        $config['id_ib'] = $idnew;

        $j = 0;
        for ($i = 0; $i < 6; $i++) {

            $nama = basename($_FILES['file' . $idf[$j]]['name']);
            $size = $_FILES['file' . $idf[$j]]['size'];
            $ext = pathinfo($nama, PATHINFO_EXTENSION);
            $new_name = $namafile[$j] . '_' . $nik . '_' . $idnew . '.' . $ext;
            $config['file_name'] = $new_name;
            $config['jenis_file'] = $idf[$j];
            $config['file_size'] = $size;
            $config['file_type'] = $ext;
            $config['nama_file'] = $namafile[$j];

            $this->load->library('upload', $config);
            if (!empty($_FILES['file' . $idf[$j]]['name'])) {
                if (!move_uploaded_file($_FILES['file' . $idf[$j]]["tmp_name"], "./file/ibel/" . $new_name)) {
                    $this->upload->display_errors();
                } else {
                    $upload = $this->upload->data();
                }

                $model->save($config);
                //redirect('home/cindex');
                // echo "<pre>";
                // print_r($config);
                // echo "</pre>";

                //echo "File berhasil di upload";
                //print_r($_FILES) ;
            }
            $a++;
            $j++;
        }
        $update->update_status($idtubel);
        //die;
        redirect('C_fakultas/usulanIBFakultas/');
    }

    public function upload_fileIbelulang($id = null)
    {
        $this->load->model('M_file_upload_IB');
        $post = $this->input->post();
        $model = $this->M_file_upload_IB;

        $idjenis = $this->input->post('idjenis');
        $namafile = $this->input->post('namajenis');

        $config['upload_path'] = './file/ibel/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2000000';
        $config['overwrite'] = true;

        $idnew = $id;
        $config['id_tubel'] = $idnew;
        $nik = $this->input->post('NIK');

        $nama = basename($_FILES['file']['name']);
        $size = $_FILES['file']['size'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $namafile . '_' . $nik . '_' . $idnew . '.pdf';
        $config['file_name'] = $new_name;
        $config['jenis_file'] = $idjenis;
        $config['file_size'] = $size;
        $config['file_type'] = $ext;
        $config['nama_file'] = $namafile;

        if ($post['kode'] == 1) {
            $config['nosurat'] = $this->input->post('NoSurat');
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = $this->input->post('JabAtasan');
        } elseif ($post['kode'] == 2) {
            $config['nosurat'] = $this->input->post('NoSurat');
            $config['tglsurat'] = $this->input->post('TglSurat');
            $config['jabatan'] = '';
        } else {
            $config['nosurat'] = '';
            $config['tglsurat'] = '';
            $config['jabatan'] = '';
        }

        // echo "<pre>";
        // print_r($config);
        // die;

        $this->load->library('upload', $config);
        if (!empty($_FILES['file']['name'])) {
            if (!move_uploaded_file($_FILES['file']["tmp_name"], "./file/ibel/" . $new_name)) {
                $this->upload->display_errors();
            } else {
                $upload = $this->upload->data();
            }

            $model->updateIbel($config);
            redirect('C_fakultas/fileDitangguhkan');

        }

    }

    public function usulanIBFakultas()
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Ibel_Fakultas');
            $data['ibel'] = $this->M_Ibel_Fakultas->getIbel();
            $this->load->view('V_headerFakultas');
            $this->load->view('V_tabelIBFakultas', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function prosesIBFakultas($id)
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->view('V_headerFakultas');
            $this->load->model('M_Ibel_Fakultas');
            $data['file'] = $this->M_Ibel_Fakultas->getFile($id);
            $this->load->view('V_prosesIBFakultas', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function uploadFileIBFakultas($id)
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->view('V_headerFakultas');
            $data['id'] = $id;
            $this->load->view('V_uploadFileIBFakultas', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function uploadOutputTB()
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->view('V_headerFakultas');
            $this->load->view('V_uploadOutputTB');
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function tabelMonitorFakultas()
    {
        $this->load->view('V_headerFakultas');
        $this->load->view('V_tabMonitorFakultas');
        $this->load->view('V_footerFakultas');
    }

    public function usulanPerpanjangan()
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Tubel_Fakultas');
            $data['panjang'] = $this->M_Tubel_Fakultas->getFilePerpanjangan();
            $this->load->view('V_headerFakultas');
            $this->load->view('V_usulanPerpanjanganFak', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function unduhperpanjangan($id)
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Tubel_Fakultas');
            $data['panjang'] = $this->M_Tubel_Fakultas->getFilePer($id);
            $this->load->view('V_headerFakultas');
            $this->load->view('V_unduhPerpanjanganFak', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function upload_perpanjangan($id = null)
    {
        $this->load->model('M_file_upload');
        $this->load->model('M_perpanjangan');
        $update = $this->M_perpanjangan;

        $model = $this->M_file_upload;
        $data['nik'] = $this->M_perpanjangan->getNik($id);
        foreach ($data['nik'] as $ni) {
            $nik = $ni->NIK;
        }
        $a = 30;

        $namafile = array('Surat Rekomendasi Perpanjangan Tubel dari pimpinan unit kerja',
            'SK Kenaikan Pangkat Terakhir perpanjangan',
            'SK Kenaikan Jabatan Terakhir perpanjangan', 'Surat Pengantar Perpanjangan',
        );
        $idfile = array('30', '56', '57', '68');
        $config['upload_path'] = './file/perpanjangan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2000000';
        $config['overwrite'] = true;
        $idnew = $id;
        $config['id_perpanjangan'] = $idnew;

        $j = 0;
        for ($i = 0; $i <= 3; $i++) {

            $nama = basename($_FILES['file' . $idfile[$j]]['name']);
            $size = $_FILES['file' . $idfile[$j]]['size'];
            $ext = pathinfo($nama, PATHINFO_EXTENSION);
            $new_name = $namafile[$j] . '_' . $nik . '_' . $idnew . '.' . $ext;
            $config['file_name'] = $new_name;
            $config['jenis_file'] = $idfile[$j];
            $config['file_size'] = $size;
            $config['file_type'] = $ext;
            $config['nama_file'] = $namafile[$j];

            $this->load->library('upload', $config);
            if (!empty($_FILES['file' . $idfile[$j]]['name'])) {
                if (!move_uploaded_file($_FILES['file' . $idfile[$j]]["tmp_name"], "./file/perpanjangan/" . $new_name)) {
                    $this->upload->display_errors();
                } else {
                    $upload = $this->upload->data();
                }

                $model->saveFilePanjangan($config);
                //redirect('home/cindex');
                // echo "<pre>";
                // print_r($config);
                // echo "</pre>";

                //echo "File berhasil di upload";
                //print_r($_FILES) ;
            }
            $j++;
        }

        $update->update_status($id);
        //die;
        redirect('C_fakultas/usulanPerpanjangan/');
    }

    public function usulanPengaktifan()
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Tubel_Fakultas');
            $data['pengak'] = $this->M_Tubel_Fakultas->getFilePengaktifan();
            $this->load->view('V_headerFakultas');
            $this->load->view('V_pengaktifanFak', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function unduhFak($id = null, $nik = null)
    {
        $data['fil'] = $id;
        $data['nik'] = $nik;
        $this->load->view('V_headerFakultas');
        $this->load->view('V_unduhFakultas', $data);
        $this->load->view('V_footerFakultas');
    }

    public function unduhFak2($id = null, $nik = null)
    {
        $data['fil'] = $id;
        $data['nik'] = $nik;
        $this->load->view('V_headerFakultas');
        $this->load->view('V_unduhFakultas1', $data);
        $this->load->view('V_footerFakultas');
    }

    public function unggahPengaktifan($id)
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->view('V_headerFakultas');
            $data['id'] = $id;
            $this->load->view('V_unggahpengaktifanFak', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function upload_pengaktifan($id = null)
    {
        $this->load->model('M_file_upload');
        $this->load->model('M_pengaktifan');
        $update = $this->M_pengaktifan;

        $model = $this->M_file_upload;
        $data['nik'] = $this->M_pengaktifan->getNik($id);
        foreach ($data['nik'] as $ni) {
            $nik = $ni->NIK;
        }
        $a = 30;

        $namafile = array(
            'Berita Acara Pemeriksaan', 'DP3 Tahun Terakhir', 'Surat Keterangan Melaksanakan Tugas dan Mata Kuliah Yang Dibina', 'Surat Pengantar Pengajuan Pengaktifan', 'SK Kenaikan Pangkat', 'SK Kenaikan Jabatan');
        $jenisfile1 = array('35', '66', '37', '69', '58', '59');
        $config['upload_path'] = './file/perpanjangan/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2000000';
        $config['overwrite'] = true;
        $idnew = $id;
        $config['id_pengaktifan'] = $idnew;

        $j = 0;
        for ($i = 0; $i < 6; $i++) {

            $nama = basename($_FILES['file' . $j]['name']);
            $size = $_FILES['file' . $j]['size'];
            $ext = pathinfo($nama, PATHINFO_EXTENSION);
            $new_name = $namafile[$j] . '_' . $nik . '_' . $idnew . '.' . $ext;
            $config['file_name'] = $new_name;
            $config['jenis_file'] = $jenisfile1[$j];
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

                $model->saveFilePengaktifan($config);
                //redirect('home/cindex');
                // echo "<pre>";
                // print_r($config);
                // echo "</pre>";

                //echo "File berhasil di upload";
                //print_r($_FILES) ;
            }
            $j++;
        }
        $update->saveSpmt($id);
        $update->update_status($id);
        //die;
        redirect('C_fakultas/usulanPerpanjangan/');
    }

    public function dokumenSetnegFak()
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->view('V_headerFakultas');
            $data['tubel'] = $this->M_Tubel_Fakultas->getSetneg();
            $this->load->view('V_dokumenSetnegFakultas', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function riwayatFakultas()
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Tubel_Fakultas');
            $data['tubel'] = $this->M_Tubel_Fakultas->getTubelall();
            $data['aktif'] = $this->M_Tubel_Fakultas->getPengaktifanall();
            $data['pjg'] = $this->M_Tubel_Fakultas->getPerpanjanganall();
            $this->load->view('V_headerFakultas');
            $this->load->view('V_riwayatFakultas2', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function riwayatFakultasIB()
    {
        if ($this->session->userdata('akses') == '1') {
            $this->load->model('M_Ibel_Fakultas');
            $data['tubel'] = $this->M_Ibel_Fakultas->getIbelAll();
            $this->load->view('V_headerFakultas');
            $this->load->view('V_riwayatFakultas3', $data);
            $this->load->view('V_footerFakultas');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

}
