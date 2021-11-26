<?php
function tgl_indo($tanggal){
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
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

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
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

// echo $tubel;
// print_r($tubel);
foreach($tubel as $data){
	$tmtawalstudi= tgl_indo($data->MULAI_PERPANJANGAN);
	$tmtakhirstudi= tgl_indo($data->SELESAI_PERPANJANGAN);
	$nama= $data->GELAR_DEPAN." ".$data->NAMA." ".$data->GELAR_BELAKANG;
	$jenjang=$data->NAMA_JENJANG;
	$program= $data->NAMA_BIDANG_PERGURUAN_TINGGI;
	$tempat= $data->PERGURUAN_TINGGI_PENYELENGGARA;
	$beasiswa= $data->SUMBER_PEMBIAYAAN;
	$nik= $data->NIK;
	$tempatlahir= $data->TEMPAT_LAHIR;
	$ttl= $data->TGL_LAHIR;
	if($data->JENIS_KELAMIN==1)
		$jk='Laki-Laki';
	else
		$jk='Perempuan';
	$pangkat= $data->PANGKAT_GOLONGAN;
	$unit=$data->UNIT_KERJA;
	$id_perpanjangan= $data->ID_PERPANJANGAN;
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

foreach ($setneg as $key) {
	$nomor_setneg= $key->NOMOR_SURAT;
	$tgl_setneg = tgl_indoori($key->TGL_SURAT);
}

foreach ($pengantar as $key) {
	$nomor_pengantar= $key->NOMOR_SURAT;
	$tgl_pengantar = tgl_indoori($key->TGL_SURAT);
	$pimpinan = $key->JABATAN_PIMPINAN;
}

$document = file_get_contents("file/template/Baru/PERPANJANGAN TUBEL.rtf");

$document = str_replace("#NOMOR", $nomor, $document);
$document = str_replace("#TGL", $tgl_surat, $document);
$document = str_replace("#TMTAWALSTUDI", $tmtawalstudi, $document);
$document = str_replace("#TMTAKHIRSTUDI", $tmtakhirstudi, $document);
$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#JENJANGSTUDI", $jenjang, $document);
$document = str_replace("#BIDANGILMU", $program, $document);
$document = str_replace("#TEMPATSTUDI", $tempat, $document);
$document = str_replace("#BEASISWA", $beasiswa, $document);
$document = str_replace("#NIK", $nik, $document);
$document = str_replace("#TEMPAT", $tempatlahir, $document);
$document = str_replace("#TTL", $ttl, $document);
$document = str_replace("#JK", $jk, $document);
$document = str_replace("#PANGKAT", $pangkat, $document);
$document = str_replace("#UNITKERJA", $unit, $document);
$document = str_replace("#NMRSETNEG", $nomor_setneg, $document);
$document = str_replace("#TSETNEG", $tgl_setneg, $document);
$document = str_replace("#NMSURAT", $nomor_pengantar, $document);
$document = str_replace("#TLSURAT", $tgl_pengantar, $document);
$document = str_replace("#TPENETAPAN", $tgl, $document);
$document = str_replace("#PIMPINANUNIT", $pimpinan, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=SK Perpanjangan Tubel_".$nik."_".$id_perpanjangan.".doc");
header("Content-lenght:".strlen($document));
echo $document;

?>