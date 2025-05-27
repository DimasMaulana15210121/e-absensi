<ul class="listview image-listview">
    <li>
        <?php
            foreach ($data_history as $data) {
            
        ?>
        <div class="item">
            <div class="icon-box bg-primary">
                <i class="fas fa-calendar"></i>
            </div>
            <div class="in" style="font-size: 18px;">
                <div><?= date('d-m-Y', strtotime($data['tanggal'])) ?><br>(
                     <?php if ($data['status'] == null) {
                         echo 'Belum Hadir';
                     } else {
                         echo $data['status'];
                     } ?>)
                </div>
                <span class="badge badge-success" style="text-align: justify;"><?= $data['jam_masuk_absen'] == '00:00:00' ? '--:--:--' : $data['jam_masuk_absen'] ?></span>
                <span class="badge badge-danger" style="text-align: justify;"><?= $data['jam_keluar_absen'] == '00:00:00' ? '--:--:--' : $data['jam_keluar_absen'] ?></span>
            </div>
        </div>
        <?php } ?>
    </li>
</ul>