    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
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
        <div class="col">
            <ul class="listview image-listview">
                <?php
                    $no = 0;
                    foreach($dataGajiKaryawan as $data) {
                ?>
                <li>
                    <div class="item">
                        <div class="in">
                            <div><?= $no=$no+1 ?>.</div>
                            <div><?= $data['nama_karyawan'] ?></b><br>
                                <span>Tanggal Gajian :</span><br>
                                <span>(<?= $data['tgl_gajian'] ?>)</span>
                            </div>
                            <div>
                                <a href="<?= base_url('/karyawan/detail-gaji')."/".sha1($data['id_gaji_karyawan']).'/'.sha1($data['id_karyawan']); ?>"
                                    title="Cetak Invoice">
                                    <button type="button" class="btn btn-primary btn-sm btn-block" title="Detail Data">
                                        <i class="fas fa-search mr-1"></i>Detail Invoice
                                    </button>
                                </a><br>
                                <a href="<?= base_url('/admin/cetak-pembayaran')."/".sha1($data['id_gaji_karyawan']).'/'.sha1(session('ses_id')); ?>"
                                    title="Cetak Invoice">
                                    <button type="button" class="btn btn-info btn-sm btn-block" title="Edit Data">
                                        <i class="fas fa-print mr-1"></i>Cetak Invoice
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
               <?php } ?>
            </ul>
        </div>
    </div>