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
                    <form action="<?= base_url('/karyawan/update-data-izin').'/'.$data_izin['id_izin']; ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tgl_mulai" value="<?= $data_izin['tgl_mulai']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tgl_selesai" value="<?= $data_izin['tgl_selesai']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Status Izin</label>
                                <select class="custom-select" name="status_izin" required>
                                    <option value="Cuti"
                                        <?php if($data_izin['status_izin']=='Cuti'){echo "selected";} else echo "";?>>Cuti
                                    </option>
                                    <option value="Izin"
                                        <?php if($data_izin['status_izin']=='Izin'){echo "selected";} else echo "";?>>Izin
                                    </option>
                                    <!-- <option value="Sakit"
                                        <?php if($data_izin['status_izin']=='Sakit'){echo "selected";} else echo "";?>>Sakit
                                    </option> -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Izin</label>
                                <textarea class="form-control" name="ket_izin"><?= $data_izin['ket_izin']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="text-align: center;">Submit</button>
                            <a href="<?= base_url('karyawan/master-data-izin') ?>" class="btn btn-secondary btn-lg btn-block" style="text-align: center;"> Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>