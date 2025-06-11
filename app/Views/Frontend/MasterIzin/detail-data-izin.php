    <!-- App Header -->
    <div class="appHeader bg-secondary text-light">
        <div class="left">
            <a href="<?= base_url('/karyawan/master-data-izin') ?>" class="headerButton goBack">
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
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tgl_mulai" value="<?= $data_izin['tgl_mulai']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" value="<?= $data_izin['tgl_selesai']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Status Izin</label>
                            <input type="date" class="form-control" name="status_izin" value="<?= $data_izin['status_izin']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Keterangan Izin</label>
                            <textarea class="form-control" name="ket_izin" disabled><?= $data_izin['ket_izin']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Keterangan Pengajuan</label>
                            <textarea class="form-control" name="ket_pengajuan" disabled><?= $data_izin['ket_pengajuan']; ?></textarea>
                        </div>
                        <a href="<?= base_url('karyawan/master-data-izin') ?>" class="btn btn-secondary btn-lg btn-block" style="text-align: center;"> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>