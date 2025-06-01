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
    <div class="col-sm-12">
        <div class="form-group">
            <label>Bulan</label>
            <select class="custom-select" id="bulan" name="bulan" required>
                <option value="">-- Pilih Bulan --</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tahun</label>
            <select class="custom-select" id="tahun" name="tahun" required>
                <option value="">-- Pilih Tahun --</option>
                <?php 
                    $data_tahun = date('Y', strtotime($data_karyawan['created_at']));
                    for ($i = $data_tahun; $i <= date('Y'); $i++) { ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="viewHistory()">
            <i class="fas fa-search mr-1"></i>View
        </button>
        <hr>
        <div class="col">
            <div class="History">
            </div>
        </div>
    </div>
</div>

    <script>
        function viewHistory(){
            let bulan = $('#bulan').val();
            let tahun = $('#tahun').val();
            if (bulan == "") {
                swal.fire('Bulan Belum Di Pilih');
            } else if (tahun == "") {
                swal.fire('Tahun Belum Di Pilih');
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('karyawan/view-history') ?>",
                    data: {
                        bulan: bulan,
                        tahun: tahun,
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if (response.status === 'success') {
                        $('.History').html(response.data);
                        } 
                        else if (response.status === 'empty') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Tidak Ditemukan',
                                text: response.message,
                            });
                            $('.History').html(''); // Kosongkan tampilan jika tidak ada data
                        }
                    }
                });
            }
        }
    </script>