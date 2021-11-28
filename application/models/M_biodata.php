<?php
class M_biodata extends CI_Model
{
    private $table = 'biodata';
    private $pk = 'NIK';
    public $nik;
    public $email;
    public $nama;
    public $foto;
    public $foto1;
    public $no_ktp;
    public $nidn;
    //public $jenis_kelamin;
    //public $status_menikah;
    public $tempat_lahir;
    public $tgl_lahir;
    public $alamat;
    //public $kota;
    //public $kode_pos;
    public $handphone;
    //public $status;
    public $id_unit_kerja;
    public $unit_kerja;
    //public $npwp;
    public $universitas;
    //public $prodi;
    // public $ipk;
    public $gelar_depan;
    public $gelar_belakang;
    //public $unit_kerja_fakultas;
    public $pangkat_golongan;
    public $tmt_pns;
    public $status_pegawai;
    public $jenis_kepegawaian;
    public $status_jabatan;
    public $nama_jabatan;

    public function rules()
    {
        return [
            //['field' => 'gelardepan',
            //         'label' => 'Gelar Depan',
            //         'rules' => 'required'],

            ['field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'],

            ['field' => 'gelarbelakang',
                'label' => 'Gelar Belakang',
                'rules' => 'required'],

            // ['field' => 'NIK',
            //     'label' => 'NIK',
            //     'rules' => 'required'],

            // ['field' => 'unitker',
            // 'label' => 'Unit Kerja',
            // 'rules' => 'required'],

            // ['field' => 'unitfak',
            //     'label' => 'Unit Kerja Fakultas',
            //     'rules' => 'required'],

            ['field' => 'tempatlahir',
                'label' => 'Tempat Lahir',
                'rules' => 'required'],

            // ['field' => 'NIP',
            //     'label' => 'No.KTP',
            //     'rules' => 'required'],

            ['field' => 'tgllahir',
                'label' => 'Tgl Lahir',
                'rules' => 'required'],

            ['field' => 'nomor',
                'label' => 'No.HP',
                'rules' => 'required'],

            ['field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'],

            ['field' => 'email',
                'label' => 'Email',
                'rules' => 'required'],

            ['field' => 'golongan',
                'label' => 'golongan',
                'rules' => 'required'],

            ['field' => 'TMT',
                'label' => 'TMT PNS',
                'rules' => 'required'],

            ['field' => 'StatusPeg',
                'label' => 'Status Pegawai',
                'rules' => 'required'],

            ['field' => 'StatusJab',
                'label' => 'Status Jabatan',
                'rules' => 'required'],

            ['field' => 'namaJab',
                'label' => 'Nama Jabatan',
                'rules' => 'required'],

        ];

    }

    public function saveBiodata()
    {
        $post = $this->input->post();

        // $this->nik = $post['NIK'];
        //$this->email = $post['email'];
        // $this->nama = $post['nama'];
        //$this->foto = $this->_uploadImage();
        if (!empty($_FILES["foto"]["tmp_name"])) {

            $this->foto1 = $this->_uploadImage();
        } else {
            $this->foto1 = $post['fotoname'];
        }

        // $this->no_ktp = $post['NIP'];
        // $this->nidn = $post['NIDN'];
        // $this->tempat_lahir = $post['tempatlahir'];
        // $this->tgl_lahir = $post['tgllahir'];
        $this->alamat = $post['alamat'];
        $this->handphone = $post['nomor'];
        // $this->email = $post['email'];
        // $this->gelar_depan = $post['gelardepan'];
        // $this->gelar_belakang = $post['gelarbelakang'];
        // $this->unit_kerja = $post['unitfak'];
        // $this->universitas = "UNAIR";
        // $this->pangkat_golongan = $post['golongan'];
        $this->tmt_pns = $post['TMT'];
        // $this->status_pegawai = $post['StatusPeg'];
        // $this->jenis_kepegawaian = $post['JenisPeg'];
        $this->status_jabatan = $post['StatusJab'];
        $this->nama_jabatan = $post['namaJab'];

        // echo '<pre>';
        // print_r($this);
        // die;

        $this->db->update($this->table, $this, array('NIP' => $post['NIP']));

    }

    public function insertDosen($data2, $datadiri)
    {
        $data = $data2[0];
        //echo "<pre>";
        //          print_r ($data2);
        //print_r ($datadiri['dosen']['NO_KTP']);
        //die;

        $this->nik = $data['NIP_DOSEN'];
        $this->email = $data['EMAIL_PENGGUNA'];
        $this->nama = $datadiri['name'];
        $this->foto = $data['FOTO'];
        $this->foto1 = $data['FOTO'];
        $this->no_ktp = $datadiri['dosen']['NO_KTP'];
        $this->nidn = $datadiri['dosen']['NIDN_DOSEN'];
        $this->jenis_kelamin = $datadiri['gender'];
        $this->status_menikah = 0;
        $this->tempat_lahir = $data['KOTA_LAHIR'];
        $this->tgl_lahir = $datadiri['birth_date'];
        $this->alamat = $data['ALAMAT_RUMAH_DOSEN'];
        $this->kota = '';
        if (!empty($datadiri['dosen']['KODE_POS'])) {
            $this->kode_pos = $datadiri['dosen']['KODE_POS'];
        } else {
            $this->kode_pos = 0000;
        }

        $this->handphone = $data['HP'];
        $this->status = $datadiri['dosen']['STATUS_DOSEN'];
        $this->npwp = $datadiri['dosen']['NPWP'];
        $this->prodi = $data['NM_PROGRAM_STUDI'];
        $this->ipk = null;
        $this->gelar_depan = $data['GELAR_DEPAN'];
        $this->gelar_belakang = $data['GELAR_BELAKANG'];
        $this->unit_kerja  = 'Fakultas '.$data['NM_FAKULTAS'];
        // $this->unit_kerja = null;
        $this->universitas = "Universitas Airlangga";
        $this->pangkat_golongan = $data['NM_GOLONGAN'];
        $this->tmt_pns = $data['TMT_PNS'];
        $this->status_pegawai = "Dosen";
        $this->jenis_kepegawaian = $datadiri['dosen']['STATUS_DOSEN'];
        $this->status_jabatan = null;
        $this->nama_jabatan = null;

        // echo '<pre>';
        // print_r($this);
        // die;

        $this->db->insert($this->table, $this);

    }

    public function updateDosen($data2, $datadiri)
    {
        $data = $data2[0];
        //echo "<pre>";
        //          print_r ($data2);
        //print_r ($datadiri['dosen']['NO_KTP']);
        //die;

        $this->nik = $data['NIP_DOSEN'];
        $this->email = $data['EMAIL_PENGGUNA'];
        $this->nama = $datadiri['name'];
        $this->foto = $data['FOTO'];
        $this->foto1 = $data['FOTO'];
        $this->no_ktp = $datadiri['dosen']['NO_KTP'];
        $this->nidn = $datadiri['dosen']['NIDN_DOSEN'];
        $this->jenis_kelamin = $datadiri['gender'];
        $this->status_menikah = 0;
        $this->tempat_lahir = $data['KOTA_LAHIR'];
        $this->tgl_lahir = $datadiri['birth_date'];
        $this->alamat = $data['ALAMAT_RUMAH_DOSEN'];
        $this->kota = '';
        if (!empty($datadiri['dosen']['KODE_POS'])) {
            $this->kode_pos = $datadiri['dosen']['KODE_POS'];
        } else {
            $this->kode_pos = 0000;
        }

        $this->handphone = $data['HP'];
        $this->status = $datadiri['dosen']['STATUS_DOSEN'];
        $this->npwp = $datadiri['dosen']['NPWP'];
        $this->prodi = $data['NM_PROGRAM_STUDI'];
        $this->ipk = null;
        $this->gelar_depan = $data['GELAR_DEPAN'];
        $this->gelar_belakang = $data['GELAR_BELAKANG'];
        $this->unit_kerja  = 'Fakultas '.$data['NM_FAKULTAS'];

        $fakultas = $this->getUnitKerjaByName($this->unit_kerja);
        if ($fakultas->num_rows() > 0) {
            $this->id_unit_kerja = $fakultas->row_array()['ID_UNIT_KERJA'];
        }else{
            $this->id_unit_kerja = 321;
        }
        $this->universitas = "Universitas Airlangga";
        $this->pangkat_golongan = $data['NM_GOLONGAN'];
        $this->tmt_pns = $data['TMT_PNS'];
        $this->status_pegawai = "Dosen";
        $this->jenis_kepegawaian = $datadiri['dosen']['STATUS_DOSEN'];
        $this->status_jabatan = null;
        $this->nama_jabatan = null;

        // echo '<pre>';
        // print_r($this);
        // die;

        $this->db->update($this->table, $this, array('NIK' => $this->nik));

    }

    public function insertTendik($data2, $datadiri)
    {
        $data = $data2[0];
        // echo "<pre>";
        //       print_r ($data);
        //       print_r ($datadiri);
        //       die;

        $this->nik = $data['NIP_PEGAWAI'];
        $this->email = $data['EMAIL_PENGGUNA'];
        $this->nama = $datadiri['name'];
        $this->foto = $data['FOTO'];
        $this->foto1 = $data['FOTO'];
        $this->no_ktp = $data['NIP_PEGAWAI'];
        $this->nidn = $datadiri['dosen']['NIDN_DOSEN'];
        $this->jenis_kelamin = $datadiri['gender'];
        if (!empty($datadiri['pegawai']['STATUS_NIKAH_PEGAWAI'])) {
            $this->status_menikah = $datadiri['pegawai']['STATUS_NIKAH_PEGAWAI'];
        } else {
            $this->status_menikah = 0;
        }
        $this->tempat_lahir = $data['KOTA_LAHIR'];
        $this->tgl_lahir = $datadiri['birth_date'];
        $this->alamat = $data['ALAMAT_PEGAWAI'];
        $this->kota = '';
        if (!empty($datadiri['dosen']['KODE_POS'])) {
            $this->kode_pos = $datadiri['dosen']['KODE_POS'];
        } else {
            $this->kode_pos = 0000;
        }

        $this->handphone = $data['HP'];
        $this->status = $datadiri['pegawai']['STATUS_PEGAWAI'];
        $this->npwp = $datadiri['pegawai']['NOMOR_NPWP'];
        $this->prodi = $data['NM_PROGRAM_STUDI'];
        $this->ipk = null;
        $this->gelar_depan = $data['GELAR_DEPAN'];
        $this->gelar_belakang = $data['GELAR_BELAKANG'];
        //$this->unit_kerja  = $data['NM_FAKULTAS'];
        $this->id_unit_kerja = $datadiri['pegawai']['ID_UNIT_KERJA'];
        $this->unit_kerja = null;
        $this->universitas = "Universitas Airlangga";
        $this->pangkat_golongan = $data['NM_GOLONGAN'];
        $this->tmt_pns = $data['TMT_PNS'];
        $this->status_pegawai = "Tendik";
        $this->jenis_kepegawaian = $datadiri['pegawai']['STATUS_PEGAWAI'];
        $this->status_jabatan = null;
        $this->nama_jabatan = null;

        // echo '<pre>';
        // print_r($this);
        // die;

        $this->db->insert($this->table, $this);

    }

    public function updateTendik($data2, $datadiri)
    {
        $data = $data2[0];
        // echo "<pre>";
        //       print_r ($data);
        //       print_r ($datadiri);
        //       die;

        $this->nik = $data['NIP_PEGAWAI'];
        $this->email = $data['EMAIL_PENGGUNA'];
        $this->nama = $datadiri['name'];
        $this->foto = $data['FOTO'];
        $this->foto1 = $data['FOTO'];
        $this->no_ktp = $data['NIP_PEGAWAI'];
        $this->nidn = $datadiri['dosen']['NIDN_DOSEN'];
        $this->jenis_kelamin = $datadiri['gender'];
        if (!empty($datadiri['pegawai']['STATUS_NIKAH_PEGAWAI'])) {
            $this->status_menikah = $datadiri['pegawai']['STATUS_NIKAH_PEGAWAI'];
        } else {
            $this->status_menikah = 0;
        }
        $this->tempat_lahir = $data['KOTA_LAHIR'];
        $this->tgl_lahir = $datadiri['birth_date'];
        $this->alamat = $data['ALAMAT_PEGAWAI'];
        $this->kota = '';
        if (!empty($datadiri['dosen']['KODE_POS'])) {
            $this->kode_pos = $datadiri['dosen']['KODE_POS'];
        } else {
            $this->kode_pos = 0000;
        }

        $this->handphone = $data['HP'];
        $this->status = $datadiri['pegawai']['STATUS_PEGAWAI'];
        $this->npwp = $datadiri['pegawai']['NOMOR_NPWP'];
        $this->prodi = $data['NM_PROGRAM_STUDI'];
        $this->ipk = null;
        $this->gelar_depan = $data['GELAR_DEPAN'];
        $this->gelar_belakang = $data['GELAR_BELAKANG'];
        //$this->unit_kerja  = $data['NM_FAKULTAS'];
        $this->id_unit_kerja = $datadiri['pegawai']['ID_UNIT_KERJA'];
        $this->unit_kerja = null;
        $this->universitas = "Universitas Airlangga";
        $this->pangkat_golongan = $data['NM_GOLONGAN'];
        $this->tmt_pns = $data['TMT_PNS'];
        $this->status_pegawai = "Tendik";
        $this->jenis_kepegawaian = $datadiri['pegawai']['STATUS_PEGAWAI'];
        $this->status_jabatan = null;
        $this->nama_jabatan = null;

        // echo '<pre>';
        // print_r($this);
        // die;

        $this->db->update($this->table, $this, array('NIK' => $this->nik));

    }

    public function getBiodata($id)
    {
        return $this->db->where('NIK=', $id)->get($this->table)->result();
    }

    private function _uploadImage()
    {
        $post = $this->input->post();
        $config['upload_path'] = './file/foto/';
        $config['allowed_types'] = 'jpg';

        $nama = basename($_FILES['foto']['name']);
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $new_name = $post['NIK'] . '_FOTO' . '.' . $ext;

        $config['file_name'] = $new_name;
        $config['overwrite'] = true;
        $config['max_size'] = 2000000; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        // if ($this->upload->do_upload('images')) {
        //     return $this->upload->data("file_name");
        // }
        // else{
        //  $this->upload->display_errors();
        // }

        if (!empty($_FILES['foto']['name'])) {
            if (!move_uploaded_file($_FILES['foto']["tmp_name"], "./file/foto/" . $config['file_name'])) {
                $this->upload->display_errors();
            } else {
                // $upload=$this->upload->data();
                // $model->save($config);
                return $config['file_name'];
            }
        } else {
            echo "gagal";

        }
        //return "default.jpg";
    }

    public function getUnitKerjaByName($name){  
		$query = $this->db->query("select * from fakultas where FAKULTAS = '$name'"); 
		return $query;
	}

}
