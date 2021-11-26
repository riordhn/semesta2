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
	$nama= $data->gelar_depan." ".$data->nama." ".$data->gelar_belakang;
	$nik= $data->NIK;
	$pangkat= $data->pangkat_golongan;
	$nama_jab= $data->nama_jabatan;
	$status_pegawai=$data->status_pegawai;
	$jenis_kep=$data->JENIS_KEPEGAWAIAN;
	$jenis_kep = ($jenis_kep != "PNS" && $jenis_kep != "Pegawai Negeri Sipil") ? "Tetap Universitas" : $jenis_kep;
	$unit=$data->unit_kerja;
	$jenjang=$data->NAMA_JENJANG;
	$program= $data->NAMA_BIDANG_PERGURUAN_TINGGI;
	$tempat= $data->PERGURUAN_TINGGI_PENYELENGGARA;
	$awal=tgl_indo($data->MULAI_TUBEL);
	$akhir=tgl_indo($data->SELESAI_TUBEL);
	$dana= $data->SUMBER_PEMBIAYAAN;
	$id_tub=$data->ID_TUBEL;

}

foreach ($file as $key) {
	$nomor= $key->NOMOR_SURAT;
	$tgl_surat = tgl_indoori($key->TGL_SURAT);
	$jabpim= $key->JABATAN_PIMPINAN;
}
// echo $nik;
// echo $pangkat;
// echo $tempat;
// echo $awal;
// echo $dana; 

$document = file_get_contents("file/template/Baru/SURAT TUGAS BELAJAR PNS.rtf");

$document = str_replace("#NM", $nama, $document);
$document = str_replace("#MN", $nik, $document);
$document = str_replace("#M1", $pangkat, $document);
$document = str_replace("#M2", $nama_jab, $document);
$document = str_replace("#JK", $jenis_kep, $document);
$document = str_replace("#STATUS_PEGAWAI", $status_pegawai, $document);
$document = str_replace("#UNIT_KERJA", $unit, $document);
$document = str_replace("#ID_JENJANG", $jenjang, $document);
$document = str_replace("#NAMA_BIDANG_PERGURUAN_TINGGI", $program, $document);
$document = str_replace("#NJ", $tempat, $document);
$document = str_replace("#SJ", $awal, $document);

$document = str_replace("#KJ", $akhir, $document);
$document = str_replace("#I7", $dana, $document);
$document = str_replace("#JP", $jabpim, $document);
$document = str_replace("#NS", $nomor, $document);
$document = str_replace("#TS", $tgl_surat, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=STB_".$nik."_".$id_tub.".doc");
header("Content-lenght:".strlen($document));
echo $document;

?>