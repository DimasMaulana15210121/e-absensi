<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Jadwal</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary shadow-lg">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Jadwal</h3>
                    </div>

                    <form action="<?= base_url('/hr/simpan-data-jadwal') ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            <div id="jadwal-container">
                                <div class="form-jadwal border p-3 mb-3"
                                    style="border-radius: 10px; border: 1px solid #ccc;">
                                    <div class="row border p-3 mb-3 bg-light rounded">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-6" style="text-align: center;">
                                                            <label>Keterangan</label>
                                                            <select class="form-control select2" name="keterangan">
                                                                <option value="masuk">Masuk</option>
                                                                <option value="libur">Libur</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-5">
                                                            <label>Tanggal Awal</label>
                                                            <input type="date" name="tanggal_mulai" class="form-control"
                                                                value="<?= date('Y-m-d') ?>">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label>Tanggal Akhir</label>
                                                            <input type="date" name="tanggal_akhir" class="form-control"
                                                                value="<?= date('Y-m-t') ?>">
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-4">
                                                            <label>Jam Masuk</label>
                                                            <input type="time" name="jam_masuk" class="form-control"
                                                                value="08:00">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Jam Keluar</label>
                                                            <input type="time" name="jam_keluar" class="form-control"
                                                                value="16:00">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label class="mr-1">Absen Dibuka</label>
                                                            <small class="text-danger">Berapa menit sebelum jam
                                                                masuk?</small>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Menit</span>
                                                                <input type="number" name="absen_dibuka"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="mr-1">Absen Telat</label>
                                                            <small class="text-danger">Berapa menit setelah jam
                                                                masuk?</small>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Menit</span>
                                                                <input type="number" name="absen_telat"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label class="mr-1">Absen Alpha</label>
                                                            <small class="text-danger">Berapa menit setelah jam
                                                                masuk?</small>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Menit</span>
                                                                <input type="number" name="absen_alpha"
                                                                    class="form-control" required>
                                                            </div>
                                                            <small class="text-danger">* Tidak boleh sama dengan absen
                                                                telat</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group col-md-4 d-flex align-items-end">
                                                    <button type="button" class="btn btn-danger btn-sm remove-form">Hapus Form Ini</button>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tombol simpan dan batal di form terakhir saja -->
                                    <div class="form-footer text-center">
                                        <button type="submit" id="submit-button"
                                            class="btn btn-primary btn-lg">Simpan</button>
                                        <a href="<?= base_url('hr/master-data-jadwal'); ?>"
                                            class="btn btn-danger btn-lg">Batal</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol tambah form -->
                            <!-- <div class="text-center mb-3">
                                <button type="button" id="add-form" class="btn btn-success">+ Tambah Form</button>
                            </div> -->
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>