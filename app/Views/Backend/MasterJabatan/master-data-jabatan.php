<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data Jabatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Master Data Jabatan</li>
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
                            <h3 class="card-title col-sm-10">Tabel Data Jabatan</h3>
                            <button type="button" class="btn btn-primary btn-sm col-sm-2" data-toggle="modal"
                                data-target="#modal-jabatan"><span class="fas fa-plus"></span>
                                Tambah Data Jabatan</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th data-sortable="true">No</th>
                                        <th data-sortable="true">Nama Jabatan</th>
                                        <th data-sortable="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                $no = 0;
                                foreach ($data_jabatan as $data) {
                            ?>
                                    <tr>
                                        <td><?= $no=$no+1 ?></td>
                                        <td><?= $data['nama_jabatan']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" title="Edit Jabatan"><span class="fas fa-edit"
                                                    data-toggle="modal" data-target="#modal-edit<?= $data['id_jabatan'] ?>"></span></button>
                                            <button type="button" class="btn btn-danger" title="Hapus Jabatan"><span
                                                    class="fas fa-trash" data-toggle="modal"
                                                    data-target="#hapus-jabatan<?= $data['id_jabatan']; ?>"></span></button>
                                            <a href="<?= base_url('/hr/view-karyawan-perjabatan').'/'.sha1($data['id_jabatan']);?>" title="View Karyawan">
                                                <button type="button" class="btn btn-primary"><span
                                                        class="fas fa-search"></span>
                                                </button>
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

<!-- Modal Tambah Jabatan -->
<div class="modal fade" id="modal-jabatan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/hr/simpan-data-jabatan') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan">
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

<!-- Modal Edit Jabatan -->
<?php 
    foreach ($data_jabatan as $data) {
?>
<div class="modal fade" id="modal-edit<?= $data['id_jabatan'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Edit Data Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/hr/update-data-jabatan/') . $data['id_jabatan'] ?>" 
                method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" name="edit_nama_jabatan" class="form-control" value="<?= $data['nama_jabatan'] ?>" placeholder="Nama Jabatan">
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
    foreach ($data_jabatan as $data) {
?>
<!-- Modal Hapus Karyawan -->
<div class="modal fade" id="hapus-jabatan<?= $data['id_jabatan'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Yakin Ingin Menghapus Data Ini ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/hr/hapus-data-jabatan').'/'. $data['id_jabatan']; ?>" method="get" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Nama Jabatan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['nama_jabatan']; ?></label>
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
