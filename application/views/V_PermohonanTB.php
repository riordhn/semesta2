<?php
foreach($tubel as $data){
	$nama= $data->GELAR_DEPAN." ".$data->NAMA." ".$data->GELAR_BELAKANG;
	$nik= $data->NIK;
	$pangkat= $data->PANGKAT_GOLONGAN;
	$status_pegawai=$data->STATUS_PEGAWAI;
	$unit=$data->UNIT_KERJA;
	$jabatan=$data->NAMA_JABATAN;
	$jenjang=$data->ID_JENJANG;
	$program= $data->NAMA_BIDANG_PERGURUAN_TINGGI;
	$tempat= $data->PERGURUAN_TINGGI_PENYELENGGARA;
	$dana= $data->SUMBER_PEMBIAYAAN;
	$awal=$data->MULAI_TUBEL;
	$akhir=$data->SELESAI_TUBEL;
	$id_tub=$data->ID_TUBEL;

}
// echo $nik;
// echo $pangkat;
// echo $tempat;
// echo $awal;
// echo $dana;

$document = file_get_contents("file/template/fakultas/usulan sk tugas belajar.rtf");

$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#NIK", $nik, $document);
$document = str_replace("#JENJANG", $jenjang, $document);
$document = str_replace("#BIDANG_PERGURUAN_TINGGI", $program, $document);
$document = str_replace("#PERGURUAN_TINGGI_PENYELENGGARA", $tempat, $document);
$document = str_replace("#SUMBER_PEMBIAYAAN", $dana, $document);
$document = str_replace("#MULAI_TUBEL", $awal, $document);
$document = str_replace("#SELESAI_TUBEL", $akhir, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=Surat permohonan SK TB dari pimpinan unit kerja_".$nik."_".$id_tub.".doc");
header("Content-lenght:".strlen($document));
echo $document;

?>