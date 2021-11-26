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
 
	return $bulan[ (int)$pecahkan[1] ];
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

function tgl_indoori2($tanggal){
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

function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}     		
	return $hasil;
}

// echo $tubel;
// print_r($tubel);
foreach($tubel as $data){

    $nama				= $data->GELAR_DEPAN." ".$data->NAMA." ".$data->GELAR_BELAKANG;
    $jenjang			= $data->NAMA_JENJANG;
	$kd_jenjang			= $data->ID_JENJANG;
	$program			= $data->NAMA_BIDANG_PERGURUAN_TINGGI;
	$tempat				= $data->PERGURUAN_TINGGI_PENYELENGGARA;
	$tmtawalstudi		= tgl_indoori2($data->MULAI_TUBEL);

	$jabfung            = $data->NAMA_JABATAN;
	$tmtawalstudi2		= tgl_indoori($data->MULAI_TUBEL);

	$jabatan_pimpinan	= $data->JABATAN_PIMPINAN;
	$nomor_surat		= $data->NOMOR_SURAT;
	$unit				= $data->UNIT_KERJA;
	$tgl_surat			= tgl_indoori($data->TGL_SURAT);
	$tgl_spmt			= tgl_indoori($data->TANGGAL_SPMT);
	$negara             = $data->NAMA_NEGARA;
	$tgl_lulus          = tgl_indoori($data->TANGGAL_LULUS); 

	$nik                = $data->NIK;
    $tempatlahir        = $data->TEMPAT_LAHIR;
    $ttl                = $data->TGL_LAHIR;
    if($data->JENIS_KELAMIN==1)
        $jk='Laki-Laki';
    else
        $jk='Perempuan';
    $pangkat_gol        = $data->PANGKAT_GOLONGAN;
	$status_kepegawaian = $data->STATUS_PEGAWAI;
    $jenis_kepegawaian  = $data->JENIS_KEPEGAWAIAN;


	// $tmtakhirstudi= tgl_indo($data->SELESAI_PERPANJANGAN);
	// $beasiswa= $data->SUMBER_PEMBIAYAAN;

	

    $mulai_tubel        = date_create($data->MULAI_TUBEL);
	
	$tgl_lulus2			= date_create($data->TANGGAL_LULUS);

	// print_r($mulai_tubel);
	// print_r($tgl_lulus2);
	
    $diff               = date_diff($mulai_tubel, $tgl_lulus2);
	$diff				= $diff->y;


	// print_r($diff);
	
	$desimal = $diff - intval($diff);

	if($desimal >= 0.6){
		$desimal2 = round($desimal);

		if($negara == "indonesia"){
			$lama_ikatan_dinas  = (1*$desimal2)+1;
		}
		else{
			$lama_ikatan_dinas  = (2*$desimal2)+1;
		}
	}
	else {
		$desimal3 = floor($desimal);

		if($negara == "indonesia"){
			$lama_ikatan_dinas  = (1*$desimal3)+1;
		}
		else{
			$lama_ikatan_dinas  = (2*$desimal3)+1;
		}
	}

    

    
	$lama_ikatan_dinas_huruf	= terbilang($lama_ikatan_dinas);

	
	if($jabfung == "Asisten Ahli"){
 		$tunjangan_angka = 375000;
	}
	elseif($jabfung=="Lektor"){
		$tunjangan_angka = 700000;
	}
	else{
		$tunjangan_angka = 900000;
	}
	
	$tunjangan_huruf  = terbilang($tunjangan_angka);   
   

    $tgl_now            = tgl_indoori(date('Y-m-d'));

	$id_pengaktifan		= $data->ID_PENGAKTIFAN;


}

foreach($file as $data2){
	$jabatanpengaktifan		= $data2->JABATAN_PIMPINAN;
	// $unit_pengaktifan		= $data2->UNIT_KERJA;
	$nomor_pengaktifan		= $data2->NOMOR_SURAT;
	$tgl_pengaktifan		= $data2->TGL_SURAT;

}

$tgl =tgl_indoori(date('Y-m-d'));
// echo $nik;
// echo $pangkat;
// echo $tempat;
// echo $awal;
// echo $dana;

// foreach ($file as $key) {
// 	$nomor= $key->NOMOR_SURAT;
// 	$tgl_surat = tgl_indoori($key->TGL_SURAT);
// }

if($data->STATUS_PEGAWAI == "Dosen"){
	$document = file_get_contents("file/template/Baru/KEPUTUSAN REKTOR PENGAKTIFAN DOSEN.rtf");
}
else if($data->STATUS_PEGAWAI == "Tendik"){
	$document = file_get_contents("file/template/Baru/KEPUTUSAN REKTOR PENGAKTIFAN TENDIK.rtf");
}
else{
	echo "Status Pegawai Tidak Ditemukan";
}

$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#JS", $jenjang, $document);
$document = str_replace("#KODE_JS", $kd_jenjang, $document);
$document = str_replace("#PS", $program, $document);
$document = str_replace("#TS", $tempat, $document);
$document = str_replace("#BLN_AWAL_STUDI", $tmtawalstudi, $document);

$document = str_replace("#JT", $jabfung, $document);
$document = str_replace("#AWAL_STUDI", $tmtawalstudi2, $document);

$document = str_replace("#JABATAN_UNIT", $jabatan_pimpinan, $document);
$document = str_replace("#NOMOR_SURAT", $nomor_surat, $document);
$document = str_replace("#UNIT_KERJA", $unit, $document);
$document = str_replace("#TGL_SURAT", $tgl_surat, $document);
$document = str_replace("#TGL_SPMT", $tgl_spmt, $document);
$document = str_replace("#NEGARA", $negara, $document);
$document = str_replace("#TGL_LULUS", $tgl_lulus, $document);

$document = str_replace("#JABATAN_PENGAKTIFAN", $jabatanpengaktifan, $document);
$document = str_replace("#UNIT_PENGAKTIFAN", $unit, $document);
$document = str_replace("#NOMOR_PENGAKTIFAN", $nomor_pengaktifan, $document);
$document = str_replace("#TGL_PENGAKTIFAN", $tgl_pengaktifan, $document);
 
$document = str_replace("#TGL_SUBMIT_PK", $tgl_spmt, $document);

$document = str_replace("#TL", $tempatlahir, $document);
$document = str_replace("#TGL_LAHIR", $ttl, $document);
$document = str_replace("#JK", $jk, $document);
$document = str_replace("#PANGKAT", $pangkat_gol, $document);
$document = str_replace("#SPEGAWAI", $status_kepegawaian, $document);
$document = str_replace("#JPEGAWAI", $jenis_kepegawaian, $document);


$document = str_replace("#TUNJANGAN_ANGKA", number_format($tunjangan_angka,0,'','.'), $document);
$document = str_replace("#TUNJANGAN_HURUF", $tunjangan_huruf, $document);
$document = str_replace("#LAMA_IKATAN_DINAS", $lama_ikatan_dinas, $document);
$document = str_replace("#LAMA_HURUF", $lama_ikatan_dinas_huruf, $document);


$document = str_replace("#TGL_NOW", $tgl_now, $document);


$document = str_replace("#NIP", $nik, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=SK Pengaktifan Kembali_".$nik."_".$id_pengaktifan.".doc");
header("Content-lenght:".strlen($document));
echo $document;

?>