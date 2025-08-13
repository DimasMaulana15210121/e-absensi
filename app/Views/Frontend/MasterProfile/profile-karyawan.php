<!-- App Header -->
<div class="appHeader bg-secondary text-light">
    <div class="left">
        <a href="<?= base_url('karyawan/home') ?>" class="headerButton goBack">
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
                <form id="formEdit" action="<?= base_url('karyawan/simpan-profile') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="item">
                        <div class="in">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="avatar" style="text-align: center;">
                                            <?php 
                                              $cekFoto = file_exists('Assets/img/karyawan/'.$data_karyawan['foto_karyawan']);
                                              if($cekFoto){
                                                 if ($data_karyawan['foto_karyawan'] == '-') {
                                                    $foto_karyawan = base_url().'Assets/img/default.png';
                                                 }else{
                                                 $foto_karyawan = base_url().'Assets/img/karyawan/'.$data_karyawan['foto_karyawan'];
                                                 }
                                              }
                                              elseif(!$cekFoto){
                                                 $foto_karyawan = base_url().'Assets/img/default.png';
                                              }
                                              ?>
                                            <img src="<?= $foto_karyawan; ?>" alt="avatar"
                                                class="imaged w64 rounded" style="width: 100%; height: 100%;" />
                                            <input type="hidden" name="foto_karyawan_old" value="<?php echo $data_karyawan['foto_karyawan']?>"><br>
                                            <div id="ubahFoto" style="display: none;">
                                                <span>Ubah Foto</span>
                                                <input type="file" class="form-control" name="foto_karyawan"
                                                    accept="image/*,.jpg,.jpeg,.png"><br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div>
                                                <label>Nama</label>
                                                <input type="text" name="nama_karyawan" class="form-control"
                                                    placeholder="Nama Karyawan" value="<?= $data_karyawan['nama_karyawan']; ?>" readonly>
                                            </div><br>
                                            <div>
                                                <label>Alamat</label>
                                                <textarea name="alamat_rumah" class="form-control" readonly><?= $data_karyawan['alamat_rumah'] ?></textarea>
                                            </div><br>
                                            <div>
                                                <label>Tanggal Lahir</label>
                                                <input type="text" name="tgl_lahir" class="form-control"
                                                    placeholder="Tanggal Lahir" value="<?= $data_karyawan['tgl_lahir']; ?>" readonly>
                                            </div><br>
                                            <div>
                                                <label>Nik</label>
                                                <input type="text" name="nik_karyawan" class="form-control"
                                                    placeholder="Nama Karyawan" value="<?= $data_karyawan['nik_karyawan']; ?>" readonly>
                                            </div><br>
                                            <div>
                                                <label>No Handphone</label>
                                                <input type="text" name="no_hp" class="form-control"
                                                    placeholder="Nama Karyawan" value="<?= $data_karyawan['no_hp']; ?>" readonly>
                                            </div><br>
                                            <div>
                                                <label>Email</label>
                                                <input type="email" name="email_karyawan" class="form-control"
                                                    placeholder="Email" value="<?= $data_karyawan['email_karyawan']; ?>" readonly>
                                            </div><br>
                                            <div id="passwordEdit" style="display: none;">
                                                <label>Password :</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Kosongkan jika tidak ingin di ganti" readonly>
                                            </div><br>

                                            <button id="editButton" type="button"
                                                class="btn btn-primary btn-lg btn-block" onclick="enableEdit()">
                                                <i class="fas fa-edit mr-1"></i> Edit Data
                                            </button><br>

                                            <a href="<?= base_url('/karyawan/edit-data-rekening') ?>" id="rekeningButton">
                                                <button type="button"
                                                    class="btn btn-warning btn-lg btn-block">
                                                    <i class="fas fa-edit mr-1"></i> Edit Rekening
                                                </button>
                                            </a>

                                            <div id="editActions" style="display: none;">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                    <i class="fas fa-save mr-1"></i> Simpan
                                                </button><br>
                                                <button type="button" class="btn btn-secondary btn-lg btn-block"
                                                    onclick="cancelEdit()">
                                                    <i class="fas fa-times mr-1"></i> Batal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

        </ul>
    </div>
</div>


<script>

    function enableEdit() {
        // Aktifkan semua input yang readonly
        const input = document.querySelectorAll('input.form-control');
        const textarea = document.querySelectorAll('textarea.form-control');
        input.forEach(input => {
            input.removeAttribute('readonly');
            if (input.name === 'email') {
                input.setAttribute('required', true);
            }
        });
        textarea.forEach(textarea => textarea.removeAttribute('readonly'));

        // Tampilkan input file
        document.getElementById("ubahFoto").style.display = "block";
        //Tampilkan input password
        document.getElementById("passwordEdit").style.display = "block";
        // Tampilkan tombol Simpan & Batal, sembunyikan Edit
        document.getElementById("editButton").style.display = "none";
        document.getElementById("rekeningButton").style.display = "none";
        document.getElementById("editActions").style.display = "block";
    }

    function cancelEdit() {
        // Nonaktifkan semua input kembali
        const input = document.querySelectorAll('input.form-control');
        const textarea = document.querySelectorAll('textarea.form-control');
        input.forEach(input => {input.setAttribute('readonly', true);
        if (input.name === 'email') {
                input.removeAttribute('required');
            }
        });
        textarea.forEach(textarea => textarea.setAttribute('readonly', true));

        //Sembunyikan input file
        document.getElementById("ubahFoto").style.display = "none";
        //Sembunyikan input password
        document.getElementById("passwordEdit").style.display = "none";
        // Tampilkan kembali tombol Edit
        document.getElementById("editButton").style.display = "block";
        document.getElementById("rekeningButton").style.display = "block";
        document.getElementById("editActions").style.display = "none";
    }

    // function saveProfile() {
    //     // Ambil data dari form
    //     const form = document.getElementById('formEdit');
    //     const formData = new FormData(form);

    //     $.ajax({
    //         type: "POST",
    //         url: "<?= base_url('karyawan/simpan-profile') ?>",
    //         data: formData,
    //         contentType: false, 
    //         processData: false, 
    //         success: function (response) {
    //             window.location.href = "<?= base_url('karyawan/profile') ?>";
    //         }
    //     });

    //     cancelEdit();
    // }
</script>