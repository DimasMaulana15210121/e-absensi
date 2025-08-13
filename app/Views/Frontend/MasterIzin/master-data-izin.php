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
        <div class="col">
            <ul class="listview image-listview">
                <?php
                    $no = 0;
                    foreach($data_izin as $data) {
                ?>
                <li>
                    <div class="item">
                        <div class="in">
                            <div><?= $no=$no+1 ?></div>
                            <div><?php if($data['status_izin'] == 'Cuti'){
                                                   echo 'Cuti';
                                                } else{
                                                   echo 'Izin';
                                                } ?><br>
                                <b><?= date('d-m-Y', strtotime($data['tgl_mulai'])) ?> s/d <?= date('d-m-Y', strtotime($data['tgl_selesai'])) ?></b><br>
                                <span><?= $data['ket_izin'] ?></span>
                            </div>
                            <div>
                                <?php if($data['status_approved'] == '0'){
                                   echo '<span class="badge badge-warning text-dark">Dikirim</span>';
                                } elseif($data['status_approved'] == '1'){
                                   echo '<span class="badge badge-success">Diterima</span>';
                                } else{
                                   echo '<span class="badge badge-danger">Ditolak</span>';
                                } ?>
                            </div>
                            <?php if ($data['status_approved'] == '0') { ?>
                                <a href="<?= base_url('/karyawan/edit-data-izin').'/'.sha1($data['id_izin']);?>"
                                    title="Edit Data">
                                    <button type="button" class="btn btn-primary btn-sm" title="Edit Data">Edit</button>
                                </a>
                            <?php } else {?>
                                <a href="<?= base_url('/karyawan/detail-data-izin').'/'.sha1($data['id_izin']);?>"
                                    title="Edit Data">
                                    <button type="button" class="btn btn-info btn-sm" title="Edit Data">Detail</button>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="fab-button bottom-right" style="margin-bottom: 70px;">
        <a href="<?= base_url() ?>karyawan/pengajuan-izin" class="fab"><i class="fas fa-plus"></i></a>
    </div>
