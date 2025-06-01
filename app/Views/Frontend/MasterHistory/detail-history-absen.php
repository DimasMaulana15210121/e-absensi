    <!-- App Header -->
    <div class="appHeader bg-secondary text-light">
        <div class="left">
            <a href="<?= base_url('/karyawan/history-absen') ?>" class="headerButton goBack">
                <i class="fas fa-arrow-left fa-2x"></i>
            </a>
        </div>
        <div class="pageTitle"><?= $judul ?></div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <div class="page" style="margin-top: 70px; margin-left: 5px; margin-right: 5px; margin-bottom: 65px;">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                            <ul class="nav nav-tabs style1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                        Absen Masuk
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                        Absen Pulang
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content mt-2">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <ul class="listview image-listview">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Karyawan</label>
                                        <input type="text" class="form-control"
                                            value="<?= $data_absen['nama_karyawan'] ?> - (<?= $data_karyawan['nama_jabatan'] ?>)"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Absen</label>
                                        <input type="text" class="form-control"
                                            value="<?= date('d F Y', strtotime($data_absen['tanggal'])) ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jam Masuk Absen</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $data_absen['jam_masuk_absen'] == '00:00:00' ? '--:--:--' : $data_absen['jam_masuk_absen'];?>"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi Jarak Absen Masuk</label>
                                        <input type="text" class="form-control" value="<?php 
                                                        if (strtolower($data_absen['status']) == 'alpha') {
                                                            echo 'Tidak Melakukan Absen';
                                                        } else {
                                                            if ($data_absen['jarak_masuk'] == null) {
                                                                echo 'Absen Belum Dilakukan';
                                                            } else {
                                                                echo $data_absen['jarak_masuk']. ' Meter Dari Lokasi (' .$data_absen['nama_lokasi']. ')';
                                                            }
                                                        }
                                                    ?>" readonly>
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                        <?php 
                                          $cekFoto = file_exists('Assets/img/foto-absen/absen-masuk/'.$data_absen['foto_masuk']);
                                          if($cekFoto){
                                             if ($data_absen['foto_masuk'] == null) {
                                                $foto_masuk = base_url().'Assets/img/default2.png';
                                             }else{
                                             $foto_masuk = base_url().'Assets/img/foto-absen/absen-masuk/'.$data_absen['foto_masuk'];
                                             }
                                          }
                                          elseif(!$cekFoto){
                                             $foto_masuk = base_url().'Assets/img/default2.png';
                                          }
                                        ?>
                                        <label>Foto Absen Masuk</label><br>
                                        <img src="<?= $foto_masuk; ?>" class="img-fluid" width="300px"
                                        alt="Karyawan Image">
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                        <label>Lokasi Absen Masuk</label>
                                        <div id="masuk" style="width: 100%; height: 300px;"></div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <ul class="listview image-listview">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Karyawan</label>
                                        <input type="text" class="form-control"
                                            value="<?= $data_absen['nama_karyawan'] ?> - (<?= $data_karyawan['nama_jabatan'] ?>)"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Absen</label>
                                        <input type="text" class="form-control"
                                            value="<?= date('d F Y', strtotime($data_absen['tanggal'])) ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jam Pulang Absen</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $data_absen['jam_keluar_absen'] == '00:00:00' ? '--:--:--' : $data_absen['jam_keluar_absen'];?>"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi Jarak Absen Pulang</label>
                                        <input type="text" class="form-control" value="<?php 
                                                        if (strtolower($data_absen['status']) == 'alpha') {
                                                            echo 'Tidak Melakukan Absen';
                                                        } else {
                                                            if ($data_absen['jarak_keluar'] == null) {
                                                                echo 'Absen Belum Dilakukan';
                                                            } else {
                                                                echo $data_absen['jarak_keluar']. ' Meter Dari Lokasi (' .$data_absen['nama_lokasi']. ')';
                                                            }
                                                        }
                                                    ?>" readonly>
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                        <?php 
                                          $cekFoto = file_exists('Assets/img/foto-absen/absen-pulang/'.$data_absen['foto_keluar']);
                                          if($cekFoto){
                                             if ($data_absen['foto_keluar'] == null) {
                                                $foto_keluar = base_url().'Assets/img/default2.png';
                                             }else{
                                             $foto_keluar = base_url().'Assets/img/foto-absen/absen-pulang/'.$data_absen['foto_keluar'];
                                             }
                                          }
                                          elseif(!$cekFoto){
                                             $foto_keluar = base_url().'Assets/img/default2.png';
                                          }
                                        ?>
                                        <label>Foto Absen Pulang</label><br>
                                        <img src="<?= $foto_keluar; ?>" class="img-fluid" width="300px"
                                        alt="Karyawan Image">
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                        <label>Lokasi Absen Pulang</label>
                                        <div id="keluar" style="width: 100%; height: 300px;"></div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('/karyawan/history-absen') ?>" class="btn btn-secondary btn-lg btn-block"
                                style="text-align: center;"> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    // Validasi jika data lokasi tidak null atau kosong
    var lokasiAbsen = L.latLng(<?= $data_absen['lokasi']; ?>);
    var lokasiMasuk = L.latLng(<?= $data_absen['lokasi_masuk']; ?>);
    var lokasiKeluar = L.latLng(<?= $data_absen['lokasi_keluar']; ?>);

    var masuk = L.map('masuk').setView(lokasiAbsen, 18);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(masuk);

    var circle = L.circle(lokasiAbsen, {
        color: 'red',
        fillColor: 'blue',
        fillOpacity: 0.5,
        radius: <?= ($data_absen['radius']); ?>
    }).addTo(masuk);

    var LokasiIcon = L.icon({
        iconUrl: '<?= base_url('Assets/lokasi.png') ?>',
        iconSize:     [38, 65], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker(lokasiMasuk).addTo(masuk)
    .bindPopup('Lokasi Karyawan')
    .openPopup();
    L.marker(lokasiAbsen, {
        icon: LokasiIcon
    }).addTo(masuk)
        .bindPopup('Lokasi Absen: <?= $data_absen['nama_lokasi']; ?>')
        .openPopup();


    var keluar = L.map('keluar').setView(lokasiAbsen, 18);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(keluar);

    var circleKeluar = L.circle(lokasiAbsen, {
        color: 'red',
        fillColor: 'blue',
        fillOpacity: 0.5,
        radius: <?= ($data_absen['radius']); ?>
    }).addTo(keluar);

    L.marker(lokasiKeluar).addTo(keluar)
        .bindPopup('Lokasi Karyawan')
        .openPopup();
    L.marker(lokasiAbsen, {
        icon: LokasiIcon
    }).addTo(keluar)
        .bindPopup('Lokasi Absen: <?= $data_absen['nama_lokasi']; ?>')
        .openPopup();
</script>