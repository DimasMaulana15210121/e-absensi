    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section bg-dark"  id="user-section">
            <?php
                use App\Models\M_Karyawan;

                $modelKaryawan = new M_Karyawan;
                // Mengambil data keseluruhan kategori dari table kategori di database
                $dataKaryawan = $modelKaryawan->getDataKaryawan(['tbl_karyawan.id_karyawan' => session('ses_id')])->getResultArray();
            
                foreach($dataKaryawan as $data){
            ?>
            <div id="user-detail">
                <div class="avatar">
                      <?php 
                        $cekFoto = file_exists('Assets/img/karyawan/'.$data['foto_karyawan']);
                        if($cekFoto){
                           if ($data['foto_karyawan'] == '-') {
                              $foto_karyawan = base_url().'Assets/img/default.png';
                           }else{
                           $foto_karyawan = base_url().'Assets/img/karyawan/'.$data['foto_karyawan'];
                           }
                        }
                        elseif(!$cekFoto){
                           $foto_karyawan = base_url().'Assets/img/default.png';
                        }
                      ?>
                    <img src="<?= $foto_karyawan?>" alt="avatar"
                        class="imaged w64 rounded" />
                </div>
                <div id="user-info">
                    <h2 id="user-name"><?= $data['nama_karyawan']; ?></h2>
                    <span id="user-role"><?= $data['nama_jabatan']; ?></span>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="section" id="menu-section">
            <div class="card">
                <div class="card-body text-center">
                    <a href="<?= base_url()?>karyawan/riwayat-pembayaran-gaji">
                        <button class="btn btn-primary btn-lg btn-block">
                            <i class="fas fa-search-dollar mr-1"></i> Riwayat Pembayaran Gaji
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="section" id="presence-section">
            <div class="todaypresence">
                <div style="text-align: center;">
                    <h4>Jadwal Jam Masuk Hari Ini</h4>
                </div>
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
                                        <span><?= $data_absen == null ? '--:--' : $data_absen['jam_masuk'] ?></span>
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
                                        <span><?= $data_absen == null ? '--:--' : $data_absen['jam_keluar'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="rekappresence mt-1">
                <div class="col">
                    <canvas id="myChart"
                        style="min-height: 330px; height: 330px; max-height: 330px; max-width: 100%;"></canvas>
                </div>
            </div> -->

            <div class="rekappresence mt-1">

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence primary">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="rekappresencetitle">Hadir</h4>
                                        <span class="rekappresencedetail"><?= count($data_hadir); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence warning">
                                        <i class="fa fa-clock"></i>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="rekappresencetitle">Terlambat</h4>
                                        <span class="rekappresencedetail"><?= count($data_terlambat); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence danger">
                                        <i class="fas fa-calendar-times"></i>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="rekappresencetitle">Alpha</h4>
                                        <span class="rekappresencedetail"><?= count($data_alpha); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence primary">
                                        <i class="fab fa-cuttlefish"></i>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="rekappresencetitle">Cuti</h4>
                                        <span class="rekappresencedetail"><?= count($data_cuti); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence danger">
                                        <i class="fas fa-sad-tear"></i>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="rekappresencetitle">Sakit</h4>
                                        <span class="rekappresencedetail"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row mt-1">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence green">
                                        <i class="fas fa-info"></i>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="rekappresencetitle">Izin</h4>
                                        <span class="rekappresencedetail"><?= count($data_izin); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>

            <!-- <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                    <ul class="nav nav-tabs style1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                <h3>Data Absen Bulan Ini
                            </a>
                        </li>
                    </ul>
                </div> -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header" style="align-self: center;">
                            <h3 class="card-title" >Data Absen Bulan Ini</h3>
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
                    <a href="<?= base_url('/karyawan/logout')?>" class="btn btn-danger btn-lg btn-block"><i
                            class="fas fa-sign-out-alt mr-1"></i>Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->