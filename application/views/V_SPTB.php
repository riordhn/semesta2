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
 
	return intval($pecahkan[2]) . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function bulan_tahun_indo($tanggal) {
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
 
	return $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
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
foreach($perpanjangan as $data){

    $id_perpanjangan    = $data->ID_PERPANJANGAN;
    $nama               = $data->GELAR_DEPAN." ".$data->NAMA." ".$data->GELAR_BELAKANG;
    $nik                = $data->NIK;
    $pangkat            = $data->PANGKAT_GOLONGAN;
    $jabatan            = $data->NAMA_JABATAN;
    $fakultas           = $data->UNIT_KERJA;
    $status_peg         = $data->STATUS_PEGAWAI." ".$data->JENIS_KEPEGAWAIAN;
    $jenjang            = $data->NAMA_JENJANG;
    $bidang_ilmu    = $data->NAMA_BIDANG_PERGURUAN_TINGGI;
    $tempat_studi   = $data->PERGURUAN_TINGGI_PENYELENGGARA;
    $mulai_pnj      = bulan_tahun_indo($data->MULAI_TUBEL);
	  $selesai_pnj    = bulan_tahun_indo($data->SELESAI_TUBEL);
    $pembiayaan = ($data->JENIS_PEMBIAYAAN == 1) ? "beasiswa ".$data->SUMBER_PEMBIAYAAN : $data->SUMBER_PEMBIAYAAN;
	$tgl_now            = tgl_indoori(date('Y-m-d'));
}

$tgl =tgl_indoori(date('Y-m-d'));

foreach ($file as $key) {
	$nomor= $key->NOMOR_SURAT;
	$tgl_surat = tgl_indoori($key->TGL_SURAT);
  $pimpinan = $key->JABATAN_PIMPINAN;
}

$document = file_get_contents("file/template/Baru/SURAT TUGAS BELAJAR PERPANJANGAN.rtf");

$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#NIK", $nik, $document);
$document = str_replace("#PANGKAT", $pangkat, $document);
$document = str_replace("#JABATAN", $jabatan, $document);
$document = str_replace("#UNIT_KERJA", $fakultas, $document);
$document = str_replace("#JENIS_PEGAWAI", $status_peg, $document);
$document = str_replace("#JENJANG", $jenjang, $document);
$document = str_replace("#PROGRAM_STUDI", $bidang_ilmu, $document);
$document = str_replace("#TEMPAT_STUDI", $tempat_studi, $document);
$document = str_replace("#BULAN_AWAL", $mulai_pnj, $document);
$document = str_replace("#STUDI_AKHIR", $selesai_pnj, $document);
$document = str_replace("#PENDANAAN", $pembiayaan, $document);
$document = str_replace("#PIMPINAN_UNIT", $pimpinan, $document);
$document = str_replace("#NOMOR_SURAT", $nomor, $document);
$document = str_replace("#TANGGAL_SURAT", $tgl_surat, $document);
$document = str_replace("#TGL_NOW", $tgl_now, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=Surat Tugas Belajar Perpanjangan_".$nik."_".$id_perpanjangan.".doc");
header("Content-lenght:".strlen($document));
echo $document;
?>