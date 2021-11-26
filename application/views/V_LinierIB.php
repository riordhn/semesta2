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
	$awal=$data->MULAI_IB;
	$akhir=$data->SELESAI_IB;
	$id_tub=$data->ID_IB;

}
// echo $nik;
// echo $pangkat;
// echo $tempat;
// echo $awal;
// echo $dana;

$document = file_get_contents("file/template/Ibel/SURAT KETERANGAN linier.rtf");

$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#BIDANG_PERGURUAN_TINGGI", $program, $document);
$document = str_replace("#PERGURUAN_TINGGI_PENYELENGGARA", $tempat, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=Surat Keterangan Linier Ibel_".$nik."_".$id_tub.".doc");
header("Content-lenght:".strlen($document));
echo $document;

?>