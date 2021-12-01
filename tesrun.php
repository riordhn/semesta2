<!-- Direktorat Pendidikan
Direktorat Sistem Informasi
Direktorat Sumber Daya Manusia
Direktorat Keuangan
Direktorat Kemahasiswaan
Direktorat Sarana Prasarana dan Lingkungan
Sekolah Pasca Sarjana
Perpustakaan
Lembaga Penelitian dan Inovasi
Pusat Penerbitan dan Percetakan
Sekretaris Universitas
Badan Penjaminan Mutu
BPP
BPI
LPT
AIRLANGGA GLOBAL ENGAGEMENT ( AGE )
Rumah Sakit Univeritas Airlangga
PINLABS
PLK
PPMB
Asrama Mahasiswa UA
PIHM
Pusat Pembinaan Karir dan Kewirausahaan
Rumah Sakit Khusus Infeksi
Lembaga Pengembangan Bisnis dan Inkubasi
Program Studi diluar Domisili (Banyuwangi)
Institut Ilmu Kesehatan
Pusat Pengembangan Jurnal dan Publikasi Ilmiah
Lembaga Pengabdian Kepada Masyarakat
Pusat Penelitian dan Pengembangan Stem Cell
Rumah Sakit Hewan Pendidikan
Rumah Sakit Gigi dan Mulut Pendidikan
Pusat Inovasi Pembelajaran dan Sertifikasi
Pusat Pengelolaan Dana Sosial
Pusat Layanan Pengadaan Barang dan Jasa
Lembaga Sertifikasi Profesi
LEMBAGA PENGEMBANGAN DAN PELATIHAN TERPADU -->
<?php 

$num = array('Direktorat Pendidikan',
'Direktorat Sistem Informasi',
'Direktorat Sumber Daya Manusia',
'Direktorat Keuangan',
'Direktorat Kemahasiswaan',
'Direktorat Sarana Prasarana dan Lingkungan',
'Sekolah Pasca Sarjana',
'Perpustakaan',
'Lembaga Penelitian dan Inovasi',
'Pusat Penerbitan dan Percetakan',
'Sekretaris Universitas',
'Badan Penjaminan Mutu',
'BPP',
'BPI',
'LPT',
'AIRLANGGA GLOBAL ENGAGEMENT ( AGE )',
'Rumah Sakit Univeritas Airlangga',
'PINLABS',
'PLK',
'PPMB',
'Asrama Mahasiswa UA',
'PIHM',
'Pusat Pembinaan Karir dan Kewirausahaan',
'Rumah Sakit Khusus Infeksi',
'Lembaga Pengembangan Bisnis dan Inkubasi',
'Program Studi diluar Domisili (Banyuwangi)',
'Institut Ilmu Kesehatan',
'Pusat Pengembangan Jurnal dan Publikasi Ilmiah',
'Lembaga Pengabdian Kepada Masyarakat',
'Pusat Penelitian dan Pengembangan Stem Cell',
'Rumah Sakit Hewan Pendidikan',
'Rumah Sakit Gigi dan Mulut Pendidikan',
'Pusat Inovasi Pembelajaran dan Sertifikasi',
'Pusat Pengelolaan Dana Sosial',
'Pusat Layanan Pengadaan Barang dan Jasa',
'Lembaga Sertifikasi Profesi',
'LEMBAGA PENGEMBANGAN DAN PELATIHAN TERPADU');

for ($i=0; $i < 37; $i++) { 
	// echo "<option value="Fakultas Kedokteran">Fakultas Kedokteran</option>";
	echo "&lt",'option value="',$num[$i],'"&gt',$num[$i],"&lt/option&gt";
	echo "<br>";

}
?>