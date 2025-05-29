<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Absen <?= $data_absen['nama_karyawan'] ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Detail Data Karyawan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <a href="<?= base_url('admin/history-absensi'). '?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir ?>">
                            <button type="button" class="btn btn-danger btn-md col-sm-2">
                                <span class="fas fa-arrow-left mr-1"></span> Kembali
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Nama Karyawan</label>
                                            <input type="text" name="nama_karyawan" class="form-control bg-info"
                                                style="text-align: center;"
                                                value="<?= $data_absen['nama_karyawan'] ?> - (<?= $data_karyawan['nama_jabatan'] ?>)"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Tanggal Absen</label>
                                            <input type="text" name="nama_karyawan" class="form-control bg-info"
                                                style="text-align: center;"
                                                value="<?= date('d F Y', strtotime($data_absen['tanggal'])) ?>"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label>Jam Masuk Absen</label>
                                                <input type="text" name="nama_karyawan" class="form-control bg-success"
                                                    value="<?php echo $data_absen['jam_masuk_absen'] == '00:00:00' ? '--:--:--' : $data_absen['jam_masuk_absen'];?>"
                                                    disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Jam Keluar Absen</label>
                                                <input type="text" name="nama_karyawan" class="form-control bg-danger"
                                                    value="<?php echo $data_absen['jam_keluar_absen'] == '00:00:00' ? '--:--:--' : $data_absen['jam_keluar_absen'];?>"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label>Lokasi Karyawan Absen Masuk</label>
                                                <input type="text" name="jarak_masuk" class="form-control bg-success"
                                                    value="<?php 
                                                                if (strtolower($data_absen['status']) == 'alpha') {
                                                                    echo 'Tidak Melakukan Absen';
                                                                } else {
                                                                    if ($data_absen['jarak_masuk'] == null) {
                                                                        echo 'Absen Belum Dilakukan';
                                                                    } else {
                                                                        echo $data_absen['jarak_masuk']. ' Meter Dari Lokasi (' .$data_absen['nama_lokasi']. ')';
                                                                    }
                                                                }
                                                           ?>"
                                                    disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Lokasi Karyawan Absen Pulang</label>
                                                <input type="text" name="jarak_keluar" class="form-control bg-danger"
                                                    value="<?php 
                                                                if (strtolower($data_absen['status']) == 'alpha') {
                                                                    echo 'Tidak Melakukan Absen';
                                                                } else {
                                                                    if ($data_absen['jarak_keluar'] == null) {
                                                                        echo 'Absen Belum Dilakukan';
                                                                    } else {
                                                                        echo $data_absen['jarak_keluar']. ' Meter Dari Lokasi (' .$data_absen['nama_lokasi']. ')';
                                                                    }
                                                                }
                                                           ?>"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="image align-items-center text-center">
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
                                            </div>
                                            <div class="col-md-6">
                                                <div class="image align-items-center text-center">
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
                                                    <label>Foto Absen Keluar</label><br>
                                                    <img src="<?= $foto_keluar; ?>" class="img-fluid" width="300px"
                                                        alt="Karyawan Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div style="text-align: center;">
                                                    <Label>Lokasi Absen Masuk</Label>
                                                </div>
                                                <div id="masuk" style="width: 100%; height: 200px;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="text-align: center;">
                                                    <label style="text-align: center;">Lokasi Absen Keluar</label>
                                                </div>
                                                <div id="keluar" style="width: 100%; height: 200px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
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
