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
	$nama= $data->gelar_depan." ".$data->nama." ".$data->gelar_belakang;
	$nik= $data->NIK;
	$pangkat= $data->pangkat_golongan;
	$unit=$data->unit_kerja;
	$jabatan=$data->nama_jabatan;
	$jenjang=$data->NAMA_JENJANG;
	$jenis_kep=$data->JENIS_KEPEGAWAIAN;
	$program= $data->NAMA_BIDANG_PERGURUAN_TINGGI;
	$tempat= $data->PERGURUAN_TINGGI_PENYELENGGARA;
	$dana= $data->SUMBER_PEMBIAYAAN;
	$awal=tgl_indo($data->MULAI_TUBEL);
	$akhir=tgl_indo($data->SELESAI_TUBEL);
	$id_tub=$data->ID_TUBEL;
	if($data->LOKASI_TUBEL==0)
		$lokasi='Dalam Negeri';
	else
		$lokasi='Luar Negeri';
	if($data->JENIS_KEPEGAWAIAN == 'Dosen')
		$para='tenaga pendidik (dosen)';
	else
		$para='tenaga kependidikan (pegawai)';
	if($data->status_pegawai == 'Dosen')
		$status_pegawai='dosen';
	else
		$status_pegawai='tenaga kependidikan';
}

$tgl =tgl_indoori(date('Y-m-d'));
// echo $nik;
// echo $pangkat;
// echo $tempat;
// echo $awal;
// echo $dana;

$document = file_get_contents("file/template/Baru/DRAFT MASTER PERJANJIAN.rtf");

$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#NIK", $nik, $document);
$document = str_replace("#JENJANG", $jenjang, $document);
$document = str_replace("#PANGKAT_GOLONGAN", $pangkat, $document);
$document = str_replace("#UNIT_KERJA", $unit, $document);
$document = str_replace("#JK", $jenis_kep, $document);
$document = str_replace("#PP", $para, $document);
$document = str_replace("#TGL", $tgl, $document);
$document = str_replace("#STATUS_PEGAWAI", $status_pegawai, $document);
$document = str_replace("#JB", $jabatan, $document);
$document = str_replace("#LOKASI", $lokasi, $document);
$document = str_replace("#ID_JENJANG", $jenjang, $document);
$document = str_replace("#BIDANG_PERGURUAN_TINGGI", $program, $document);
$document = str_replace("#PERGURUAN_TINGGI_PENYELENGGARA", $tempat, $document);
$document = str_replace("#SUMBER_PEMBIAYAAN", $dana, $document);
$document = str_replace("#MULAI_TUBEL", $awal, $document);
$document = str_replace("#SELESAI_TUBEL", $akhir, $document);
header("Content-type: application/msword");
header("Content-disposition: inline; filename=Surat Perjanjian_".$nik."_".$id_tub.".doc");
header("Content-lenght:".strlen($document));
echo $document;

?>