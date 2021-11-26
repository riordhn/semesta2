 <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=RegisterTubel.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
<table border="1" width="100%">
     <thead>
                    <tr>
                      <th>No.</th>
                      <th>Status Studi</th>
                      <th>Unit Kerja</th>
                      <th>Nama</th>
                      <th>Pangkat/Golongan</th>
                      <th>Jabatan</th>
                      <th>Status Studi Lanjut</th>
                      <th>Sumber Pendanaan</th>
                      <th>TMT Mulai</th>
                      <th>Bulan Ke-7</th>
                      <th>TMT Selesai Ontime</th>
                      <th>TMT Perpanjangan</th> 
                      <th>TMT Lulus</th>  
                      <th>Jenjang Studi</th>  
                      <th>Bidang Ilmu</th>
                      <th>Instansi</th> 
                      <th>Negara Studi Lanjut</th>  
                      <th>DN/LN</th>      
                    </tr>
                  </thead> 
                  <tbody>
                    <?php $a=0; foreach ($rekap as $data){ $a++ ?>
                    <tr>
                      <td><?php echo $a.'.' ?></td>
                      <td><?php if($data->MULAI_TUBEL<date('Y-m-d')){
                        if(date('Y-m-d')<$data->SELESAI_TUBEL){
                          echo "Aktif";
                        }else{
                          if($data->tanggal_lulus!=null){
                            echo "Selesai";
                          }else{
                            if($data->mulai_perpanjangan!=null){
                              echo "Perpanjangan";
                            }
                          }
                        }
                      } ?></td>
                      <td><?php echo $data->UNIT_KERJA ?></td>
                      <td><?php echo $data->NAMA ?></td>
                      <td><?php echo $data->PANGKAT_GOLONGAN ?></td>
                      <td><?php echo $data->NAMA_JABATAN ?></td>
                      <td>Tugas Belajar</td>
                      <td><?php echo $data->SUMBER_PEMBIAYAAN ?></td>
                      <td><?php echo date('d-m-Y',strtotime($data->MULAI_TUBEL)) ?></td>
                      <td><?php echo date('d-m-Y',strtotime('+7 month',strtotime($data->MULAI_TUBEL))) ?></td>
                      <td><?php echo date('d-m-Y',strtotime('+'.$data->lama_studi.'years',strtotime($data->MULAI_TUBEL))) ?></td>
                      <td><?php echo date('d-m-Y',strtotime($data->mulai_perpanjangan)) ?></td>
                      <td><?php if($data->tanggal_lulus!=null)echo date('d-m-Y',strtotime($data->tanggal_lulus)) ?></td>
                      <td><?php echo $data->ID_JENJANG ?></td>
                      <td><?php echo $data->NAMA_BIDANG_PERGURUAN_TINGGI ?></td>
                      <td><?php echo $data->PERGURUAN_TINGGI_PENYELENGGARA ?></td>
                      <td><?php echo $data->nama_negara ?></td>
                      <td><?php if($data->LOKASI_TUBEL==1) echo "Luar Negeri"; else echo "Dalam Negeri"; ?></td>
                    </tr>
                     <?php } ?>

                     <?php foreach ($rekapib as $data){ $a++ ?>
                    <tr>
                      <td><?php echo $a.'.' ?></td>
                      <td><?php if($data->MULAI_IB<date('Y-m-d')){
                        if(date('Y-m-d')<$data->SELESAI_IB){
                          echo "Aktif";
                        }else{
                          if($data->tanggal_lulus!=null){
                            echo "Selesai";
                          }
                        }
                      } ?></td>
                      <td><?php echo $data->UNIT_KERJA ?></td>
                      <td><?php echo $data->NAMA ?></td>
                      <td><?php echo $data->PANGKAT_GOLONGAN ?></td>
                      <td><?php echo $data->NAMA_JABATAN ?></td>
                      <td>Izin Belajar</td>
                      <td>Biaya Sendiri</td>
                      <td><?php echo date('d-m-Y',strtotime($data->MULAI_IB)) ?></td>
                      <td><?php echo date('d-m-Y',strtotime('+7 month',strtotime($data->MULAI_IB))) ?></td>
                      <td><?php echo date('d-m-Y',strtotime('+'.$data->lama_studi.'years',strtotime($data->MULAI_IB))) ?></td>
                      <td><?php echo date('d-m-Y',strtotime('+'.($data->lama_studi+1).'years',strtotime($data->MULAI_IB))) ?></td>
                      <td><?php if($data->tanggal_lulus!=null) echo date('d-m-Y',strtotime($data->tanggal_lulus)) ?></td>
                      <td><?php echo $data->ID_JENJANG ?></td>
                      <td><?php echo $data->NAMA_BIDANG_PERGURUAN_TINGGI ?></td>
                      <td><?php echo $data->PERGURUAN_TINGGI_PENYELENGGARA ?></td>
                      <td>Indonesia</td>
                      <td>Dalam Negeri</td>
                    </tr>
                     <?php } ?>
                    </tbody>
</table>