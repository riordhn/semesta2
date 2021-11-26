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
	$awal=$data->MULAI_TB;
	$akhir=$data->SELESAI_TB;
	$dana= $data->SUMBER_PEMBIAYAAN;
	$id_tub=$data->ID_TUBEL;

}
// echo $nik;
// echo $pangkat;
// echo $tempat;
// echo $awal;
// echo $dana;

$document = file_get_contents("file/template/Tubel/SURAT REKOMENDASI.rtf");

$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#NIK", $nik, $document);
$document = str_replace("#PANGKAT_GOLONGAN", $pangkat, $document);
$document = str_replace("#JABATAN", $jabatan, $document);
$document = str_replace("#UNIT_KERJA", $unit, $document);
$document = str_replace("#JENJANG", $jenjang, $document);
$document = str_replace("#BIDANG_PERGURUAN_TINGGI", $program, $document);
$document = str_replace("#PERGURUAN_TINGGI", $tempat, $document);
$document = str_replace("#MULAI_TUBEL", $awal, $document);
$document = str_replace("#SELESAI_TUBEL", $akhir, $document);
$document = str_replace("#SUMBER_PEMBIAYAAN", $dana, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=Surat Rekomendasi Pimpinan_".$nik."_".$id_tub.".doc");
header("Content-lenght:".strlen($document));
echo $document;

?>