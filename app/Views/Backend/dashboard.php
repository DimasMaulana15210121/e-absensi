  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Dashboard</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">dashboard</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <div class="col-12">
              <div class="row">
                  <div class="col-3">
                      <div class="info-box mb-3">
                          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                          <div class="info-box-content">
                              <a href="<?= base_url('/hr/master-data-karyawan') ?>" class="text-dark">
                                  <span class="info-box-text">Total Karyawan</span>
                              </a>
                              <span class="info-box-number"><?= count($data_karyawan) ?></span>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="info-box mb-3">
                          <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users-cog"></i></span>

                          <div class="info-box-content">
                              <a href="<?= base_url('/hr/master-data-jabatan') ?>" class="text-dark">
                                  <span class="info-box-text">Total Jabatan</span>
                              </a>
                              <span class="info-box-number"><?= count($data_jabatan) ?></span>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hourglass-half"></i></span>
                            <div class="info-box-content">
                                <a href="<?= base_url('/hr/master-data-pengajuan') ?>" class="text-dark">
                                    <span class="info-box-text">Pengajuan Izin Pending</span>
                                </a>
                                <span class="info-box-number"><?= count($data_pending) ?></span>
                            </div>
                          <!-- /.info-box-content -->
                      </div>
                  </div>
              </div>
          </div>
          
          <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Absen Bulan <?= date('F') ?></h4>
            </div>
              <div class="col-12">
                  <div class="row">
                      <div class="col-4">
                          <div class="info-box mb-3">
                              <span class="info-box-icon bg-green elevation-1"><i class="fas fa-check"></i></span>
    
                              <div class="info-box-content">
                                  <span class="info-box-text">Total Kehadiran</span>
                                  <span class="info-box-number"><?= count($data_hadir) ?></span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="info-box mb-3">
                              <span class="info-box-icon bg-maroon elevation-1"><i class="fa fa-clock"></i></i></span>
    
                              <div class="info-box-content">
                                  <span class="info-box-text">Total Terlambat</span>
                                  <span class="info-box-number"><?= count($data_terlambat) ?></span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="info-box mb-3">
                              <span class="info-box-icon bg-red elevation-1"><i class="fas fa-calendar-times"></i></span>
    
                              <div class="info-box-content">
                                  <span class="info-box-text">Total Alpha</span>
                                  <span class="info-box-number"><?= count($data_alpha) ?></span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                      </div>
                      <!-- <div class="col-3"></div> -->
                      <div class="col-4">
                          <div class="info-box mb-3">
                              <span class="info-box-icon bg-lightblue elevation-1"><i class="fab fa-cuttlefish"></i></span>
    
                              <div class="info-box-content">
                                  <span class="info-box-text">Total Cuti</span>
                                  <span class="info-box-number"><?= count($data_cuti) ?></span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="info-box mb-3">
                              <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-info"></i></span>
    
                              <div class="info-box-content">
                                  <span class="info-box-text">Total Izin</span>
                                  <span class="info-box-number"><?= count($data_izin) ?></span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.col -->

          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Monitoring Absen Karyawan Hari Ini ( <?= date('d F Y') ?> )</h3>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            <a href="<?= base_url('/hr/cek-alpha')?>" title="Cek Status">
                                <button type="button" class="btn btn-warning"><span
                                        class="fas fa-search mr-1"></span>Cek Status</button>
                            </a>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="card-body">
                  <div class="card-body">
                      <table id="table1" class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th data-sortable="true">No</th>
                                  <th data-sortable="true">Nama Karyawan</th>
                                  <th data-sortable="true">Tanggal</th>
                                  <th data-sortable="true">Jam Masuk Absen</th>
                                  <th data-sortable="true">Jam Keluar Absen</th>
                                  <th data-sortable="true">Status Kehadiran</th>
                                  <th data-sortable="true">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $no = 0;
                                foreach ($data_absen as $data) {
                                    if ($data['keterangan_absen'] == 'masuk') {
                                    
                                ?>
                              <tr>
                                  <td><?= $no=$no+1 ?></td>
                                  <td><?= $data['nama_karyawan']; ?></td>
                                  <td><?= date('d-F-Y', strtotime($data['tanggal'])); ?></td>
                                  <td><?php echo $data['jam_masuk_absen'] == '00:00:00' ? '--:--:--' : $data['jam_masuk_absen'];?>
                                  </td>
                                  <td><?php echo $data['jam_keluar_absen'] == '00:00:00' ? '--:--:--' : $data['jam_keluar_absen'];?>
                                  </td>
                                  <td>
                                      <?php 
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
                                      <a href="<?= base_url('/hr/detail-absen-karyawan').'/'.sha1($data['id_absen']).'/'.sha1($data['id_karyawan'])?>"
                                          title="Detail Karyawan">
                                          <button type="button" class="btn btn-info"><span
                                                  class="fas fa-search mr-1"></span></button>
                                      </a>
                                  </td>
                              </tr>
                              <?php } ?>
                              <?php } ?>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>