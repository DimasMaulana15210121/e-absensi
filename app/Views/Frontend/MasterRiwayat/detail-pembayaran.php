<!-- App Header -->
<div class="appHeader bg-secondary text-light">
    <div class="left">
        <a href="<?= base_url('/karyawan/riwayat-pembayaran-gaji') ?>" class="headerButton goBack">
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

            <li>
                <div class="item">
                    <div class="in">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div>
                                            <label>Nama</label>
                                            <input type="text" name="nama_karyawan" class="form-control"
                                                value="<?= $dataGajiKaryawan['nama_karyawan']; ?>" disabled>
                                        </div><br>
                                        <div>
                                            <label>Jabatan</label>
                                            <input name="nama_jabatan" class="form-control"
                                                value="<?= $dataGajiKaryawan['nama_jabatan']; ?>" disabled>
                                        </div><br>
                                        <div>
                                            <label>Tanggal Gajian</label>
                                            <input name="tgl_gajian" class="form-control" 
                                                value="<?= date('d F Y', strtotime($dataGajiKaryawan['tgl_gajian'])); ?>" disabled>
                                        </div><br>
                                        <div>
                                            <label>Gaji Pokok</label>
                                            <input name="gaji_pokok" class="form-control"
                                                value="Rp. <?= number_format($dataGajiKaryawan['gaji_pokok'], '0', '.', '.')?>" disabled>
                                        </div><br>
                                        <div>
                                            <label>Uang Makan</label>
                                            <input name="tj_pendidikan" class="form-control"
                                                value="Rp. <?= number_format($dataGajiKaryawan['uang_makan'], '0', '.', '.')?>" disabled>
                                        </div><br>
                                        <div>
                                            <label>Tunjangan Transportasi</label>
                                            <input name="tj_transportasi" class="form-control"
                                                value="Rp. <?= number_format($dataGajiKaryawan['tj_transportasi'], '0', '.', '.')?>" disabled>
                                        </div><br>
                                        <div>
                                            <label>Tunjangan Kesehatan</label>
                                            <input name="tj_kesehatan" class="form-control"
                                                value="Rp. <?= number_format($dataGajiKaryawan['tj_kesehatan'], '0', '.', '.')?>" disabled>
                                        </div><br>
                                        <div>
                                            <label>BPJS</label>
                                            <input name="bpjs" class="form-control"
                                                value="Rp. <?= number_format($dataGajiKaryawan['bpjs'], '0', '.', '.')?>" disabled>
                                        </div><br>
                                        <div>
                                            <?php    
                                                $total_pajak = $dataGajiKaryawan['gaji_pokok'] * ($dataGajiKaryawan['pajak']/100);
                                            ?>
                                            <label>Potongan Pajak</label>
                                            <input name="pajak" class="form-control"
                                                value="Rp. <?= number_format($total_pajak, '0', '.', '.')?>" disabled>
                                        </div><br>
                                        <div>
                                            <?php
                                                // $count = count($data_absen);
                                                $total_potongan = $dataGajiKaryawan['potong_gaji'] * $dataGajiKaryawan['total_alpha'];
                                            ?>
                                            <label>Potongan Tidak Hadir</label>
                                            <input name="potong_gaji" class="form-control"
                                                value="Rp. <?= number_format($total_potongan, '0', '.', '.')?>" disabled>
                                        </div><br>
                                        <a href="<?= base_url('/karyawan/riwayat-pembayaran-gaji') ?>">
                                            <button type="button" class="btn btn-secondary btn-lg btn-block"
                                                <i class="fas fa-edit mr-1"></i> Kembali
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</div>