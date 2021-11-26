<?php
function tgl_indoori($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tahun
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tanggal
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function tgl_tahun($tanggal){

	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tahun
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tanggal
 
	return $pecahkan[0];
}

// echo $tubel;
// print_r($tubel);
foreach($tubel as $data){

    $id_perpanjangan    = $data->ID_PERPANJANGAN;
    $nama               = $data->GELAR_DEPAN." ".$data->NAMA." ".$data->GELAR_BELAKANG;
    $nik                = $data->NIK;
    $pangkat            = $data->PANGKAT_GOLONGAN;
    $jabatan            = $data->NAMA_JABATAN;
    $fakultas           = $data->UNIT_KERJA;
    $status_peg         = $data->STATUS_PEGAWAI;
    $jenis_peg          = $data->JENIS_KEPEGAWAIAN;

    if($data->ID_JENJANG=='S2')
        $program='Program Megister';
    elseif($data->ID_JENJANG=='S3')
        $program='Program Doktoral';
    else
        $program='';

    $id_jenjang = $data->ID_JENJANG;

    if($data->LOKASI_TUBEL=='1')
        $lokasi_tubel='Luar Negeri';
    else
        $lokasi_tubel='Dalam Negeri';

    $bidang_ilmu= $data->NAMA_BIDANG_PERGURUAN_TINGGI;

    if($data->ID_JENJANG=='S2')
        $program2='Megister';
    elseif($data->ID_JENJANG=='S3')
        $program2='Doktoral';
    else
        $program2='';

    $tempat_studi   = $data->PERGURUAN_TINGGI_PENYELENGGARA;
    $mulai_tubel    = tgl_indoori($data->MULAI_TUBEL);
	$selesai_tubel  = tgl_indoori($data->SELESAI_TUBEL);
    $mulai_pnj      = tgl_indoori($data->MULAI_PERPANJANGAN);
	$selesai_pnj    = tgl_indoori($data->SELESAI_PERPANJANGAN);
    $semester       = $data->SEMESTER_SEKARANG;
    $thn_pembiayaan = $data->TAHUN_PEMBIAYAAN;
    $tmb_semester   = $data->TAMBAHAN_SEMESTER;
    
    if($data->TAMBAHAN_SEMESTER=='1')
        $huruf='Satu';
    elseif($data->TAMBAHAN_SEMESTER=='2')
        $huruf='Dua';
    elseif($data->TAMBAHAN_SEMESTER=='3')
        $huruf='Tiga';
    elseif($data->TAMBAHAN_SEMESTER=='4')
        $huruf='Empat';
    elseif($data->TAMBAHAN_SEMESTER=='5')
        $huruf='Lima';
    elseif($data->TAMBAHAN_SEMESTER=='6')
        $huruf='Enam';
    elseif($data->TAMBAHAN_SEMESTER=='7')
        $huruf='Tujuh';
    else
        $huruf='';

	$angkatan		= tgl_tahun($data->MULAI_TUBEL);
}

$tgl =tgl_indoori(date('Y-m-d'));
// echo $nik;
// echo $pangkat;
// echo $tempat;
// echo $awal;
// echo $dana;

foreach ($file as $key) {
	$nomor= $key->NOMOR_SURAT;
	$tgl_surat = tgl_indoori($key->TGL_SURAT);
}

$document = file_get_contents("file/template/Baru/PERJANJIAN PERPANJANGAN.rtf");

$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#NIK", $nik, $document);
$document = str_replace("#PANGKAT", $pangkat, $document);
$document = str_replace("#JABATAN", $jabatan, $document);
$document = str_replace("#FAK", $fakultas, $document);
$document = str_replace("#STATUS_PEG", $status_peg, $document);
$document = str_replace("#JENIS_PEG", $jenis_peg, $document);
$document = str_replace("#PROGRAM", $program, $document);
$document = str_replace("#ID_JENJANG", $id_jenjang, $document);
$document = str_replace("#LOK_TUBEL", $lokasi_tubel, $document);
$document = str_replace("#BIDANG_ILMU", $bidang_ilmu, $document);
$document = str_replace("#PROGRAM2", $program2, $document);
$document = str_replace("#TEMPAT_STUDI", $tempat_studi, $document);
$document = str_replace("#MULAI_TUBEL", $mulai_tubel, $document);
$document = str_replace("#SELESAI_TUBEL", $selesai_tubel, $document);
$document = str_replace("#MULAI_PNJ", $mulai_pnj, $document);
$document = str_replace("#SELESAI_PNJ", $selesai_pnj, $document);
$document = str_replace("#SEMESTER", $semester, $document);
$document = str_replace("#THN_PEMBIAYAAN", $thn_pembiayaan, $document);
$document = str_replace("#TAMBAHAN_SEMESTER", $tmb_semester, $document);
$document = str_replace("#HURUF", $huruf, $document);
$document = str_replace("#ANGKATAN", $angkatan, $document);
// $document = str_replace("#", $, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=Surat Perjanjian Perpanjangan_".$nik."_".$id_perpanjangan.".doc");
header("Content-lenght:".strlen($document));
echo $document;

?>