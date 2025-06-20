    <!-- App Header -->
    <div class="appHeader bg-secondary text-light">
        <div class="left">
            <a href="<?= base_url('karyawan/profile') ?>" class="headerButton goBack">
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
                    <form action="<?= base_url('/karyawan/update-data-rekening') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label>No Rekening</label>
                                <input type="text" class="form-control" name="no_rek" value="<?= $data_karyawan['no_rek'] ?>" placeholder="Nomor Rekening Anda">
                            </div>
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" class="form-control" name="nama_bank" value="<?= $data_karyawan['nama_bank'] ?>" placeholder="Nama Bank Nya">
                            </div>
                            <div class="form-group">
                                <label>Atas Nama</label>
                                <input type="text" class="form-control" name="atas_nama" value="<?= $data_karyawan['atas_nama'] ?>" placeholder="Atas Nama Nya">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="text-align: center;">Simpan</button>
                            <a href="<?= base_url('karyawan/profile') ?>" class="btn btn-secondary btn-lg btn-block" style="text-align: center;"> Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>