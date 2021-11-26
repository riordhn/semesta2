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
 
	return intval($pecahkan[2]) . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function bulantahun_indo($tanggal){
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
	
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

foreach($ibel as $data){
  $nama= $data->GELAR_DEPAN." ".$data->NAMA." ".$data->GELAR_BELAKANG.".";
  $jenjang=$data->NAMA_JENJANG;
  $program= $data->NAMA_BIDANG_PERGURUAN_TINGGI;
  $tempat= $data->PERGURUAN_TINGGI_PENYELENGGARA;
  $nik= $data->NIK;
  $tempatlahir= $data->TEMPAT_LAHIR;
  $ttl= $data->TGL_LAHIR;
  if($data->JENIS_KELAMIN==1){
    $jk='Laki-Laki';
  }
  else{
    $jk='Perempuan';
  }
  $pangkat= $data->PANGKAT_GOLONGAN;
  $unit=$data->UNIT_KERJA;
  $jabatan=$data->NAMA_JABATAN;
  $nomor_surat = $data->NOMOR_SURAT;
  $tgl_surat = tgl_indoori($data->TGL_SURAT);
  $jab_p = $data->JABATAN_PIMPINAN;
  $bulan_awal = bulantahun_indo($data->MULAI_IB);
}
$tgl = tgl_indoori(date('Y-m-d'));

if($data->STATUS_PEGAWAI == "Tendik"){
	$document = file_get_contents("file/template/Baru/IZIN BELAJAR TTD REKTOR tendik.rtf");
}
else if(strpos($data->PANGKAT_GOLONGAN,"Gol.III/")){
  $document = file_get_contents("file/template/Baru/IZIN BELAJAR TTD DIREKTUR.rtf");
}
else if(strpos($data->PANGKAT_GOLONGAN,"Gol.IV/a") || strpos($data->PANGKAT_GOLONGAN,"Gol.IV/b")){
  $document = file_get_contents("file/template/Baru/IZIN BELAJAR TTD WR II.rtf");
}
else {
  $document = file_get_contents("file/template/Baru/IZIN BELAJAR TTD REKTOR.rtf");
}

$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#UNIT_KERJA", $unit, $document);
$document = str_replace("#NOMOR_SURAT", $nomor_surat, $document);
$document = str_replace("#TSURAT", $tgl_surat, $document);
$document = str_replace("#NIP", $nik, $document);

$document = str_replace("#TEMPAT", $tempatlahir, $document);
$document = str_replace("#TLAHIR", $ttl, $document);
$document = str_replace("#PANGKAT", $pangkat, $document);
$document = str_replace("#JABFUNG", $jabatan, $document);

$document = str_replace("#JENJANG_STUDI", $jenjang, $document);
$document = str_replace("#PROGRAM_STUDI", $program, $document);
$document = str_replace("#TSTUDI", $tempat, $document);
$document = str_replace("#BULAN_AWAL", $bulan_awal, $document);
$document = str_replace("#PIMPINAN_UNIT", $jab_p, $document);
$document = str_replace("#TPENETAPAN", $tgl, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=SK Izin Belajar_".$data->NIK.".doc");
header("Content-length: ".strlen($document));
echo $document;

?>