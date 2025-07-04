<!-- App Header -->
<div class="appHeader bg-secondary text-light">
    <div class="left">
        <a href="<?= base_url('/karyawan/home') ?>" class="headerButton goBack">
            <i class="fas fa-arrow-left fa-2x"></i>
        </a>
    </div>
    <div class="pageTitle"><?= $judul ?></div>
    <div class="right"></div>
</div>
<!-- * App Header -->
<div class="row" style="margin-top: 70px; margin-left: 5px; margin-right: 5px; margin-bottom: 65px;">
    <div class="col-sm-12 text-center">
        <i class="far fa-check-circle fa-7x text-success"></i>
    </div>
    <div class="col-sm-12 text-center">
        <h2>Anda Sudah Absen Hari Ini !</h2>
    </div>
    <div class="col-sm-12 text-center">
        <h3><?= date('d F Y', strtotime($data_absen['tanggal'])); ?></h3>
        <h3 class="text-success">Masuk : <?= $data_absen['jam_masuk_absen'] ?> WIB </h3>
        <h6 class="text-success">Lokasi Masuk : <?= $data_absen['jarak_masuk'] ?> Meter Dari Lokasi (<?= $data_absen['nama_lokasi'] ?>)</h6>
        <h3 class="text-danger">Pulang : <?= $data_absen['jam_keluar_absen'] ?> WIB</h3>
        <h6 class="text-danger">Lokasi Pulang : <?= $data_absen['jarak_keluar'] ?> Meter Dari Lokasi (<?= $data_absen['nama_lokasi'] ?>)</h6>
    </div>
    <div class="col-sm-12 text-center">
        <h2>Selamat Beristirahat !</h2>
    </div>
</div>