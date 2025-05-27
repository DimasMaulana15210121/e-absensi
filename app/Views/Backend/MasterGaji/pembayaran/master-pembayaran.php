<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pembayaran Gaji Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Pembayaran Gaji Karyawan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title col-sm-10">Pembayaran Gaji Karyawan</h3>
                            <button type="button" class="btn btn-primary btn-sm col-sm-2" data-toggle="modal"
                                data-target="#modal-pembayaran"><span class="fas fa-plus"></span>
                                Buat Pembayaran</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th data-sortable="true">No</th>
                                        <th data-sortable="true">Nama Karyawan</th>
                                        <th data-sortable="true">Jabatan</th>
                                        <th data-sortable="true">Tanggal Pembayaran</th>
                                        <th data-sortable="true">Bonus Gaji Karyawan</th>
                                        <th data-sortable="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        foreach ($dataGajiKaryawan as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $no=$no+1 ?></td>
                                        <td><?= $data['nama_karyawan']; ?></td>
                                        <td><?= $data['nama_jabatan']; ?></td>
                                        <td><?= $data['tgl_gajian']; ?></td>
                                        <td>Rp <?= number_format($data['bonus_gajian'], 0, ".", ".")?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning"
                                                title="Edit Pembayaran Gaji"><span class="fas fa-edit"
                                                    data-toggle="modal"
                                                    data-target="#edit-pembayaran-gaji<?= $data['id_gaji_karyawan']; ?>"></span>
                                            </button>
                                            <button type="button" class="btn btn-danger"
                                                title="Hapus Pembayaran Gaji"><span class="fas fa-trash"
                                                    data-toggle="modal"
                                                    data-target="#hapus-pembayaran-gaji<?= $data['id_gaji_karyawan']; ?>"></span>
                                            </button>
                                            <a href="<?= base_url('/admin/cetak-pembayaran')."/".sha1($data['id_gaji_karyawan']).'/'.sha1($data['id_karyawan'])?>"
                                                title="Cetak Invoice">
                                                <button type="button" class="btn btn-info"><span
                                                        class="fas fa-file-invoice-dollar"></span></button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
</div>

<!-- Modal Tambah Jadwal -->
<div class="modal fade" id="modal-pembayaran">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/admin/simpan-pembayaran-gaji') ?>" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="row">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="form-label">Nama Karyawan</label>
                                    <select name="id_karyawan" class="form-control select2">
                                        <option value="">-- Pilih Nama Karyawan --</option>
                                        <?php 
                                            foreach ($data_karyawan as $data) { ?>
                                        <option value="<?= $data['id_karyawan']?>">
                                            <?= $data['nama_karyawan']?> - (
                                            <?php if($data['nama_jabatan'] == ''){echo '(belum ada)';}else{echo $data['nama_jabatan'];} ?>)
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Tanggal Gajian</label>
                                    <input type="date" name="tgl_gajian" class="form-control"
                                        value="<?= date('Y-m-t'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Bonus Gaji Karyawan</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" name="bonus_gajian" class="form-control" value="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Edit Gaji Karyawan -->
<?php 
    foreach ($dataGajiKaryawan as $data) {
?>
<div class="modal fade" id="edit-pembayaran-gaji<?= $data['id_gaji_karyawan']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Edit Tanggal Pembayaran Gaji</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/admin/update-pembayaran-gaji').'/'. $data['id_gaji_karyawan'] ?>" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" name="id_karyawan" class="form-control"
                            value="<?= $data['nama_karyawan'] ?> - (<?= $data['nama_jabatan']; ?>)" disabled>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Gajian</label>
                        <input type="date" name="edit_tgl_gajian" class="form-control"
                            value="<?= $data['tgl_gajian'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Bonus Gaji Karyawan</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="number" name="edit_bonus_gajian" class="form-control"
                                value="<?= $data['bonus_gajian'] ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

<?php
    foreach ($dataGajiKaryawan as $data) {
?>
<!-- Modal Hapus Daftar Gaji -->
<div class="modal fade" id="hapus-pembayaran-gaji<?= $data['id_gaji_karyawan']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Yakin Ingin Menghapus Data Ini ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/admin/hapus-pembayaran-gaji').'/'. $data['id_gaji_karyawan']; ?>" method="get"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Nama Karyawan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label><?= $data['nama_karyawan']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label><?= $data['nama_jabatan']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Tanggal Gajian</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label><?= $data['tgl_gajian']; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>