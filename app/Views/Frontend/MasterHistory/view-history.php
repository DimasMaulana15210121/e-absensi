<ul class="listview image-listview">
    <li>
        <?php
            foreach ($data_history as $data) {
            
        ?>
        <div class="item">
            <div class="in mr-1" style="font-size: 17px;">
                <div><?= date('d-m-Y', strtotime($data['tanggal'])) ?><br>(
                    <?php if ($data['status'] == null) {
                         echo 'Belum Hadir';
                     } else {
                         echo $data['status'];
                     } ?>)
                </div>
                <span class="badge badge-success"
                    style="text-align: justify;"><?= $data['jam_masuk_absen'] == '00:00:00' ? '--:--:--' : $data['jam_masuk_absen'] ?></span>
                <span class="badge badge-danger"
                    style="text-align: justify;"><?= $data['jam_keluar_absen'] == '00:00:00' ? '--:--:--' : $data['jam_keluar_absen'] ?></span>
            </div>
            <div>
                <a href="<?= base_url('/karyawan/detail-history-absen').'/'.sha1($data['id_absen']).'/'.sha1($data['id_karyawan'])?>" title="Detail Karyawan">
                    <button type="button" class="btn btn-sm btn-primary"><span
                            class="fas fa-search mr-1"></span>Detail</button>
                </a>
            </div>
        </div>
        <?php } ?>
    </li>
</ul>