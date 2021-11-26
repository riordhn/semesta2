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
 
	return $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
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

foreach($tubel as $data){
	$nama			= $data->gelar_depan." ".$data->nama." ".$data->gelar_belakang;
	$nik			= $data->NIK;
	$ttl			= $data->TEMPAT_LAHIR.', '.$data->TGL_LAHIR;
	$pangkat		= $data->pangkat_golongan;
	$nama_jab		= $data->nama_jabatan;
	$status_pegawai	= $data->status_pegawai;
	$jenis_kep		= $data->JENIS_KEPEGAWAIAN;
	$unit			= $data->unit_kerja;
	$jenjang		= $data->NAMA_JENJANG;
	$program		= $data->NAMA_BIDANG_PERGURUAN_TINGGI;
	$tempat			= $data->PERGURUAN_TINGGI_PENYELENGGARA;
	$awal			= tgl_indoori($data->MULAI_TUBEL);
	$akhir			= tgl_indoori($data->SELESAI_TUBEL);
	$dana			= $data->SUMBER_PEMBIAYAAN;
	$id_tub			= $data->ID_TUBEL;

}

foreach ($file as $f) {
	$nomor			= $f->NOMOR_SURAT;
	$tgl_surat 		= tgl_indoori($f->TGL_SURAT);
	$jabpim			= $f->JABATAN_PIMPINAN;
}

foreach ($loa as $l) {
	$nomorloa		= $l->NOMOR_SURAT;
	$tgl_suratloa 	= tgl_indoori($l->TGL_SURAT);
}


foreach ($setneg as $s) {
	$nomorsetneg		= $s->NOMOR_SURAT;
	$tgl_suratsetneg 	= tgl_indoori($s->TGL_SURAT);
}

$now= tgl_indoori(date('Y-m-d'));
// echo $nik;
// echo $pangkat;
// echo $tempat;
// echo $awal;
// echo $dana; 
if($data->status_pegawai == "Tendik"){
	$document = file_get_contents("file/template/Baru/KEPUTUSAN REKTOR TUBEL tendik.rtf");
}else{
	$document = file_get_contents("file/template/Baru/KEPUTUSAN REKTOR TUBEL dosen.rtf");
}

$document = str_replace("#NM", $nama, $document);
$document = str_replace("#MN", $nik, $document);
$document = str_replace("#M1", $pangkat, $document);
$document = str_replace("#L1", $nomorloa, $document);
$document = str_replace("#L2", $tgl_suratloa, $document);
$document = str_replace("#M2", $nama_jab, $document);
$document = str_replace("#JK", $jenis_kep, $document);
$document = str_replace("#TTL", $ttl, $document);
$document = str_replace("#STATUS_PEGAWAI", $status_pegawai, $document);
$document = str_replace("#UNIT_KERJA", $unit, $document);
$document = str_replace("#ID_JENJANG", $jenjang, $document);
$document = str_replace("#NAMA_BIDANG_PERGURUAN_TINGGI", $program, $document);
$document = str_replace("#NJ", $tempat, $document);
$document = str_replace("#SJ", $awal, $document);

$document = str_replace("#TP", $now, $document);

$document = str_replace("#KJ", $akhir, $document);
$document = str_replace("#I7", $dana, $document);
$document = str_replace("#JP", $jabpim, $document);
$document = str_replace("#NS", $nomor, $document);
$document = str_replace("#TS", $tgl_surat, $document);
$document = str_replace("#SX", $tgl_suratsetneg, $document);

$document = str_replace("#SZ", $nomorsetneg, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=SKTB_".$nik."_".$id_tub.".doc");
header("Content-lenght:".strlen($document));
echo $document;

?>