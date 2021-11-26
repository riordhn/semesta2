 <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=RekapMonitoringTubel.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
     <thead>
                    <tr>
                      <th rowspan="2">No.</th>
                      <th rowspan="2">Nama</th>
                      <th rowspan="2">Detail Pendidikan</th>
                      <th rowspan="2">Semester</th>
                      <th rowspan="2">Tanggal Mulai</th>
                      <th rowspan="2">Tanggal Selesai</th>
                      <th rowspan="2">Tanggal Mulai Perpanjangan</th>
                      <th rowspan="2">Tanggal Selesai Perpanjangan</th>
                      <th colspan="7">Aktivitas Studi</th>
                      <th colspan="12">Tugas Akhir</th>
                      <th colspan="7">Publikasi</th>
                    </tr>
                    <tr>
                      <th>Semester</th>
                      <th>Dosbing</th>
                      <th>Topik/Judul Disertasi</th>
                      <th>Presentase Disertasi</th>
                      <th>Presentase Kelulusan</th>
                      <th>Penjelasan Kemajuan Studi</th>
                      <th>Langkah Semester Depan</th>

                      <th>Semester</th>
                      <th>Ujian Proposal?</th>
                      <th>Tanggal Ujian</th>
                      <th>Rencana Ujian</th>
                      <th>Tes Plagiasi?</th>
                      <th>Tanggal Tes</th>
                      <th>Hasil</th>
                      <th>Rencana Tes</th>
                      <th>Seminar Akhir?</th>
                      <th>Kategori Seminar Akhir</th>
                      <th>Tanggal Seminar Akhir</th>
                      <th>Rencana Seminar Akhir</th>

                      <th>Semester</th>
                      <th>Publikasi?</th>
                      <th>Kategori Publikasi</th>
                      <th>Nama Publikasi</th>
                      <th>Tanggal Submit</th>
                      <th>Progress Jurnal</th>
                      <th>Rencana Publikasi</th>

                    </tr>
                  </thead> 
                  <tbody>
                    <?php $a=0; foreach ($rekap as $data){ $a++ ?>
                    <tr>
                      <td><?php echo $a.'.' ?></td>
                      <td><?php echo $data->NAMA ?></td>
                      <td><?php if($data->LOKASI_TUBEL==1) echo "Luar Negeri"; else echo "Dalam Negeri"; ?><br>
                      <?php echo $data->NAMA_NEGARA ?><br>
                      <?php echo $data->PERGURUAN_TINGGI_PENYELENGGARA ?></td>
                      <td><?php echo $data->SEMESTER_SEKARANG ?></td>
                      <td><?php echo $data->MULAI_TUBEL ?></td>
                      <td><?php echo $data->SELESAI_TUBEL ?></td>
                      <td><?php echo $data->MULAI_PERPANJANGAN ?></td>
                      <td><?php echo $data->SELESAI_PERPANJANGAN ?></td>
                      <td><?php echo $data->SMT_ST ?></td>
                      <td><?php echo $data->DOSBING_1."<br>".$data->DOSBING_2 ?></td>
                      <td><?php echo $data->TOPIK_JUDUL_DISERTASI ?></td>
                      <td><?php echo $data->PRESENTASE_DISERTASI ?></td>
                      <td><?php echo $data->PRESENTASE_KELULUSAN ?></td>
                      <td><?php echo $data->PENJELASAN_KEMAJUAN_STUDI ?></td>
                      <td><?php echo $data->LANGKAH_KONKRIT_SMT_DEPAN ?></td>
                      <td><?php echo $data->SMT_SA ?></td>
                      <td><?php if($data->UJIAN_PROPOSAL==1) echo "Sudah"; else echo "Belum" ?></td>
                      <td><?php echo $data->TGL_UJIAN_PROPOSAL ?></td>
                      <td><?php echo $data->TGL_RENCANA_UP ?></td>
                      <td><?php if($data->PENILAIAN_PLAGIASI==1) echo "Sudah"; else echo "Belum" ?></td>
                      <td><?php echo $data->TGL_TES ?></td>
                      <td><?php echo $data->HASIL ?></td>
                      <td><?php echo $data->TGL_RENCANA ?></td>
                      <td><?php if($data->SEMINAR_AKHIR==1) echo "Sudah"; else echo "Belum" ?></td>
                      <td><?php echo $data->KATEGORI_SA ?></td>
                      <td><?php echo $data->TGL_SA ?></td>
                      <td><?php echo $data->TGL_RENCANA_SA ?></td>
                      <td><?php echo $data->SMT_P ?></td>
                      <td><?php if($data->SUDAH_BELUM==1) echo "Sudah"; else echo "Belum" ?></td>
                      <td><?php echo $data->KATEGORI_PUBLIKASI ?></td>
                      <td><?php echo $data->NAMA_PUBLIKASI ?></td>
                      <td><?php echo $data->TGL_SUBMIT ?></td>
                      <td><?php echo $data->PROGRESS_JURNAL ?></td>
                      <td><?php echo $data->TGL_PUB ?></td>


                    </tr>
                     <?php } ?>
                    </tbody>
 
 </table>