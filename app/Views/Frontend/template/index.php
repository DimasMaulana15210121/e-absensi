    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section bg-secondary" id="user-section">
            <div id="user-detail" class="d-flex justify-content-between align-items-center">
                <div class="avatar d-flex align-items-center">
                    <?php 
                        $cekFoto = file_exists('Assets/img/karyawan/'.$data_karyawan['foto_karyawan']);
                        if($cekFoto){
                           if ($data_karyawan['foto_karyawan'] == '-') {
                              $foto_karyawan = base_url().'Assets/img/default.png';
                           }else{
                           $foto_karyawan = base_url().'Assets/img/karyawan/'.$data_karyawan['foto_karyawan'];
                           }
                        }
                        elseif(!$cekFoto){
                           $foto_karyawan = base_url().'Assets/img/default.png';
                        }
                      ?>
                    <img src="<?= $foto_karyawan?>" alt="avatar" class="imaged w64 rounded" />
                    <div id="user-info">
                        <h2 id="user-name"><?= $data_karyawan['nama_karyawan']; ?></h2>
                        <span id="user-role"><?= $data_karyawan['nama_jabatan']; ?></span>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a href="<?= base_url()?>karyawan/profile" class="dropdown-item text-primary">
                            <i class="fas fa-user-tie mr-1"></i>Profile
                        </a>
                        <a class="dropdown-item text-danger" href="<?= base_url('/karyawan/logout') ?>">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section" id="menu-section">
            <div class="card">
                <div class="card-body text-center">
                    <?php
                        if ($data_absen['keterangan_absen'] == 'masuk') {
                            if ($data_absen['status'] == 'Cuti') {
                                echo '<marquee behavior="left" style="color: green;"><strong>Selamat Datang '.$data_karyawan['nama_karyawan'].' Anda Sedang Cuti Hari Ini Dan Tidak Bisa Melakukan Absen</strong></marquee>' ;
                            } elseif ($data_absen['status'] == 'Izin') {
                                echo '<marquee behavior="left" style="color: green;"><strong>Selamat Datang '.$data_karyawan['nama_karyawan'].' Anda Sedang Izin Hari Ini Dan Tidak Bisa Melakukan Absen</strong></marquee>' ;
                            } elseif ($data_absen['status'] == 'Alpha') {
                                echo '<marquee behavior="left" style="color: red;"><strong>Selamat Datang '.$data_karyawan['nama_karyawan'].' Anda Sudah Tercatat Alpha Hari Ini Dan Tidak Bisa Melakukan Absen</strong></marquee>' ;
                            } elseif ($data_absen['lokasi_masuk'] == null || $data_absen['jarak_masuk'] == null || $data_absen['foto_masuk'] == null || $data_absen['status'] == null) {
                                echo '<marquee behavior="left" style="color: #007bff;"><strong>Selamat Datang '.$data_karyawan['nama_karyawan'].' Silahkan Absen</strong></marquee>' ;
                            } elseif ($data_absen['lokasi_keluar'] == null || $data_absen['jarak_keluar'] == null || $data_absen['foto_keluar'] == null) {
                                echo '<marquee behavior="left" style="color: #007bff;"><strong>'.$data_karyawan['nama_karyawan'] .' Sudah Melakukan Absen Masuk Pukul: '
                                .$data_absen['jam_masuk_absen'].', Dan Lokasi Masuk Anda: '
                                .$data_absen['jarak_masuk'] .' Meter Dari Lokasi Absen</strong></marquee>' ;
                            } else {
                                echo '<marquee behavior="left" style="color: #007bff;"><strong>'.$data_karyawan['nama_karyawan'] .' Sudah Melakukan Absen Masuk Pukul: '
                                .$data_absen['jam_masuk_absen'].', Lokasi Masuk Anda: '
                                .$data_absen['jarak_masuk'] .' Meter Dari Lokasi Absen Dan Sudah Melakukan Absen Pulang: '.$data_absen['jam_keluar_absen'].', Lokasi Keluar Anda: '
                                .$data_absen['jarak_keluar'] .' Meter Dari Lokasi Absen. Terima Kasih, Selamat Beristirahat !</strong></marquee>' ;
                            }
                        } elseif ($data_absen['keterangan_absen'] == 'libur') {
                            echo '<marquee behavior="left" style="color: #007bff;"><strong>Selamat Datang '.$data_karyawan['nama_karyawan'].' Hari Ini Sedang Libur, Silahkan Menikmati Liburan Anda</strong></marquee>' ;
                        }  else {
                            echo '<marquee behavior="left" style="color: red;"><strong>Selamat Datang '.$data_karyawan['nama_karyawan'].'. Jadwal Absen Belum Dibuat,Silahkan Konfirmasi Admin</strong></marquee>' ;
                        }
                    ?>
                    <!-- <marquee behavior="left" style="color: blue;"><strong>Selamat Datang</strong></marquee> -->
                </div>
            </div>
        </div>
        <div class="section" id="menu-section">
            <div class="todaypresence">
                <div class="card">
                    <div class="card-header">
                        <div style="text-align: center;">
                            <h4>Jadwal Jam Masuk Hari Ini</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card bg-info">
                                            <div class="card-body">
                                                <div class="presencecontent">
                                                    <div class="iconpresence">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                    <div class="presencedetail">
                                                        <h4 class="presencetitle">Masuk</h4>
                                                        <span><?= $data_absen['jam_masuk'] == null ? '--:--' : $data_absen['jam_masuk'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card bg-info">
                                            <div class="card-body">
                                                <div class="presencecontent">
                                                    <div class="iconpresence">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                    <div class="presencedetail">
                                                        <h4 class="presencetitle">Pulang</h4>
                                                        <span><?= $data_absen['jam_keluar'] == null ? '--:--' : $data_absen['jam_keluar'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-secondary">
                    <div class="card-header">
                        <div style="text-align: center;">
                            <h4>Jam Masuk Anda</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card bg-success">
                                            <div class="card-body">
                                                <div class="presencecontent">
                                                    <div class="iconpresence">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                    <div class="presencedetail">
                                                        <h4 class="presencetitle">Masuk</h4>
                                                        <span><?= ($data_absen['jam_masuk_absen'] == null || $data_absen['jam_masuk_absen'] == '00:00:00')  ? '--:--:--' : $data_absen['jam_masuk_absen'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card bg-danger">
                                            <div class="card-body">
                                                <div class="presencecontent">
                                                    <div class="iconpresence">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                    <div class="presencedetail">
                                                        <h4 class="presencetitle">Pulang</h4>
                                                        <span><?= ($data_absen['jam_keluar_absen'] == null || $data_absen['jam_keluar_absen'] == '00:00:00') ? '--:--:--' : $data_absen['jam_keluar_absen'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rekappresence mt-1">
                    <div class="card bg-secondary">
                        <div class="card-header">
                            <div style="text-align: center;">
                                <h4>Data Absen Bulan <?= date('F') ?></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="presencecontent">
                                                        <div class="iconpresence primary">
                                                            <i class="fas fa-check"></i>
                                                        </div>
                                                        <div class="presencedetail">
                                                            <h4 class="rekappresencetitle">Hadir</h4>
                                                            <span
                                                                class="rekappresencedetail"><?= count($data_hadir); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="presencecontent">
                                                        <div class="iconpresence warning">
                                                            <i class="fa fa-clock"></i>
                                                        </div>
                                                        <div class="presencedetail">
                                                            <h4 class="rekappresencetitle">Terlambat</h4>
                                                            <span
                                                                class="rekappresencedetail"><?= count($data_terlambat); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="presencecontent">
                                                        <div class="iconpresence danger">
                                                            <i class="fas fa-calendar-times"></i>
                                                        </div>
                                                        <div class="presencedetail">
                                                            <h4 class="rekappresencetitle">Alpha</h4>
                                                            <span
                                                                class="rekappresencedetail"><?= count($data_alpha); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="presencecontent">
                                                        <div class="iconpresence primary">
                                                            <i class="fab fa-cuttlefish"></i>
                                                        </div>
                                                        <div class="presencedetail">
                                                            <h4 class="rekappresencetitle">Cuti</h4>
                                                            <span
                                                                class="rekappresencedetail"><?= count($data_cuti); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3"></div>
                                        <div class="col-6">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="presencecontent">
                                                        <div class="iconpresence green">
                                                            <i class="fas fa-info"></i>
                                                        </div>
                                                        <div class="presencedetail">
                                                            <h4 class="rekappresencetitle">Izin</h4>
                                                            <span
                                                                class="rekappresencedetail"><?= count($data_izin); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header" style="align-self: center;">
                                <h3 class="card-title">Data Absen Bulan Ini</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-resposive">
                                    <table id="table1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <!-- <th data-sortable="true">No</th> -->
                                                <th data-sortable="true">Tanggal Absen</th>
                                                <th class="text-success" data-sortable="true">Jam Masuk</th>
                                                <th class="text-danger" data-sortable="true">Jam Pulang</th>
                                                <th data-sortable="true">Status</th>
                                                <th data-sortable="true">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $no = 0;
                                        foreach($data_bulanan as $data){
                                    ?>
                                            <tr>
                                                <td style="font-size: 17px;"><?php echo $data['tanggal'];?></td>
                                                <td class="text-success" style="font-size: 17px;"><i
                                                        class="far fa-clock"></i>
                                                    <?php echo $data['jam_masuk_absen'] == '00:00:00' ? '--:--:--' : $data['jam_masuk_absen'];?>
                                                </td>
                                                <td class="text-danger" style="font-size: 17px;"> <i
                                                        class="far fa-clock"></i>
                                                    <?php echo $data['jam_keluar_absen'] == '00:00:00' ? '--:--:--' : $data['jam_keluar_absen'];?>
                                                </td>
                                                <td style="font-size: 17px;">
                                                    <?php if ($data['status'] == null) {
                                                    echo 'Belum Hadir';
                                                } else {
                                                    echo $data['status'];
                                                } ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('/karyawan/detail-absen-karyawan').'/'.sha1($data['id_absen']).'/'.sha1($data['id_karyawan'])?>"
                                                        title="Detail Karyawan">
                                                        <button type="button" class="btn btn-sm btn-primary"><span
                                                                class="fas fa-search mr-1"></span>Detail</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content mt-2" style="margin-bottom: 100px">
                    <div class="tab-content mt-2" style="margin-bottom: 100px">
                        <!-- <a href="<?= base_url('/karyawan/logout')?>" class="btn btn-danger btn-lg btn-block"><i
                            class="fas fa-sign-out-alt mr-1"></i>Logout</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->