<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Gaji</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Daftar Gaji</li>
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
                            <h3 class="card-title col-sm-10">Daftar Gaji Tiap Jabatan</h3>
                            <button type="button" class="btn btn-primary btn-sm col-sm-2" data-toggle="modal"
                                data-target="#modal-jadwal"><span class="fas fa-plus"></span>
                                Tambah Data Gaji</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th data-sortable="true">No</th>
                                        <th data-sortable="true">Jabatan</th>
                                        <th data-sortable="true">Gaji</th>
                                        <th data-sortable="true">Uang Makan</th>
                                        <th data-sortable="true">Tj. Kesehatan</th>
                                        <th data-sortable="true">Tj. Transportasi</th>
                                        <!-- <th data-sortable="true">BPJS</th> -->
                                        <th data-sortable="true">Pajak</th>
                                        <!-- <th data-sortable="true">Potongan Tidak Hadir</th> -->
                                        <th data-sortable="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        foreach ($data_gaji as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $no=$no+1 ?></td>
                                        <td><?= $data['nama_jabatan']; ?></td>
                                        <td>Rp <?= number_format($data['gaji_pokok'], 0, ".", ".")?></td>
                                        <td>Rp <?= number_format($data['uang_makan'], 0, ".", ".")?></td>
                                        <td>Rp <?= number_format($data['tj_kesehatan'], 0, ".", ".")?></td>
                                        <td>Rp <?= number_format($data['tj_transportasi'], 0, ".", ".")?></td>
                                        <!-- <td>Rp. <?= $data['bpjs']; ?></td> -->
                                        <td><?= $data['pajak']; ?>%</td>
                                        <!-- <td>Rp. <?= $data['potong_gaji']; ?></td> -->
                                        <td style="width: 100px;">
                                            <a href="<?= base_url('/hr/edit-daftar-gaji').'/'.sha1($data['id_gaji'])?>"
                                                title="View Karyawan">
                                                <button type="button" class="btn btn-warning" title="Edit Daftar Gaji"><span
                                                        class="fas fa-edit"></span>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-danger" title="Hapus Daftar Gaji"><span class="fas fa-trash"
                                                    data-toggle="modal"
                                                    data-target="#hapus-daftar-gaji<?= $data['id_gaji']; ?>"></span>
                                            </button>
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
<div class="modal fade" id="modal-jadwal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Atur Gaji Tiap Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/hr/simpan-daftar-gaji') ?>" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="row">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="form-label">Pilih Jabatan</label>
                                    <select name="id_jabatan" class="form-control select2">
                                        <option value="">-</option>
                                        <?php 
                                            foreach ($data_jabatan as $data) { ?>
                                        <option value="<?= $data['id_jabatan']?>"><?= $data['nama_jabatan']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Gaji Pokok</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" name="gaji_pokok" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Uang Makan</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" name="uang_makan" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Tunjangan Kesehatan</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" name="tj_kesehatan" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Tunjangan Transportasi</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" name="tj_transportasi" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>BPJS</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" name="bpjs" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Pajak</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                        <input type="number" name="pajak" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8">
                                    <label>Potongan Gaji Tidak Hadir/Alpha</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" name="potong_gaji" class="form-control"
                                            required>
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

<?php
    foreach ($data_gaji as $data) {
?>
<!-- Modal Hapus Daftar Gaji -->
<div class="modal fade" id="hapus-daftar-gaji<?= $data['id_gaji']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Yakin Ingin Menghapus Data Ini ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/hr/hapus-daftar-gaji').'/'. $data['id_gaji']; ?>" method="get"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
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
                                        <label>Gaji Pokok</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label><?= $data['gaji_pokok']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Uang Makan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label><?= $data['uang_makan']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Tunjangan Kesehatan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label><?= $data['tj_kesehatan']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Tunjangan Transportasi</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label><?= $data['tj_transportasi']; ?></label>
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