<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Laporan Absensi</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Laporan Data Absensi</li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title col-sm-10">Laporan Absensi</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form action="<?= base_url('/hr/laporan-absensi')?>" method="get" enctype="multipart/form-data">
                        <div class="col-12">
                           <div class="row">
                              <div class="col-4">
                                 <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Tgl Awal</span>
                                    <input type="date" class="form-control" name="tgl_awal" value="<?= $tgl_awal ?>">
                                 </div>
                              </div>
                              <div class="col-4">
                                 <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Tgl Akhir</span>
                                    <input type="date" class="form-control" name="tgl_akhir" value="<?= $tgl_akhir ?>">
                                 </div>
                              </div>
                              <div class="col-4">
                                  <button class="btn btn-primary">Filter Tanggal</button>
                                  <a href="<?= base_url('hr/laporan-absensi'); ?>"
                                     class="btn btn-danger">Reset Filter</a>
                              </div>
                           </div>
                        </div><br>
                     </form>
                     <table id="tableRekap" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th data-sortable="true">No</th>
                              <th data-sortable="true">Tanggal Absen</th>
                              <th data-sortable="true">Nama Karyawan</th>
                              <th data-sortable="true">Status Kehadiran</th>
                              <th data-sortable="true">Jam Masuk Absen</th>
                              <th data-sortable="true">Jam Keluar Absen</th>
                              <th data-sortable="true">Tempat Lokasi Absen</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 0;
                           foreach($data_absen as $data){
                           ?>
                           <tr>
                              <td><?php echo $no=$no+1;?></td>
                              <td><?php echo $data['tanggal'];?></td>
                              <td><?php echo $data['nama_karyawan'];?></td>
                              <td><?php 
                                        if ($data['status'] == null) {
                                            echo '<span class="badge bg-dark text-dark">Belum Hadir</span>';
                                        } else {
                                            switch ($data['status']) {
                                                case 'Hadir':
                                                    $color = 'badge bg-green text-green';
                                                    break;
                                                case 'Izin':
                                                    $color = 'badge bg-yellow text-yellow';
                                                    break;
                                                case 'Cuti':
                                                    $color = 'badge bg-lightblue text-lightblue';
                                                    break;
                                                case 'Alpha':
                                                    $color = 'badge bg-red text-red';
                                                    break;
                                                case 'Terlambat':
                                                    $color = 'badge bg-maroon text-maroon';
                                                    break;
                                                case 'Libur':
                                                    $color = 'badge bg-gray text-gray';
                                                    break;
                                                default:
                                                    $color = 'text-gray';
                                            }
                                            echo '<span class="' . $color . '">' . $data['status'] . '</span>';
                                        }
                                    ?>
                              </td>
                              <td>
                                 <?php echo $data['jam_masuk_absen'] == '00:00:00' ? '--:--:--' : $data['jam_masuk_absen'];?>
                              </td>
                              <td>
                                 <?php echo $data['jam_keluar_absen'] == '00:00:00' ? '--:--:--' : $data['jam_keluar_absen'];?>
                              </td>
                              <td><?= $data['nama_lokasi']; ?></td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
         </div>
      </div>
   </section>
</div>