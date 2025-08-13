<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data Jadwal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Master Data Jadwal</li>
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
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <h3 class="card-title">Tabel Data Jadwal</h3>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="<?= base_url('hr/tambah-data-jadwal') ?>"><button type="button" class="btn btn-primary btn-sm"><span class="fas fa-plus"></span>
                                            Tambah Data Jadwal</button>
                                        </a>
                                    </div>
                                    <br><br>
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        <a href="<?= base_url('hr/update-data-libur') ?>"><button type="button" class="btn btn-warning btn-sm"><span class="fas fa-edit"></span>
                                            Update Data Libur</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th data-sortable="true">No</th>
                                        <th data-sortable="true">Tanggal</th>
                                        <th data-sortable="true">Keterangan</th>
                                        <th data-sortable="true">Jam Masuk</th>
                                        <th data-sortable="true">Jam Keluar</th>
                                        <!-- <th data-sortable="true">Absen Dibuka</th>
                                        <th data-sortable="true">Absen Telat</th>
                                        <th data-sortable="true">Absen Alpha</th> -->
                                        <th data-sortable="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        foreach ($data_jadwal as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $no=$no+1 ?></td>
                                        <td><?= $data['tanggal']; ?></td>
                                        <td><?= $data['keterangan']; ?></td>
                                        <td><?= $data['jam_masuk']; ?></td>
                                        <td><?= $data['jam_keluar']; ?></td>
                                        <!-- <td><?= $data['absen_dibuka']; ?> Menit</td>
                                        <td><?= $data['absen_telat']; ?> Menit</td>
                                        <td><?= $data['absen_alpha']; ?> Menit</td> -->
                                        <td>
                                            <a href="<?= base_url('/hr/edit-data-jadwal')."/".sha1($data['id_jadwal']);?>"
                                                title="Edit Jadwal">
                                                <button type="button" class="btn btn-warning"><span
                                                        class="fas fa-edit"></span>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-danger" title="Hapus Jadwal"><span
                                                    class="fas fa-trash" data-toggle="modal"
                                                    data-target="#hapus-jadwal<?= $data['id_jadwal'];?>"></span>
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

<?php
    foreach ($data_jadwal as $data) {
?>
<!-- Modal Hapus Karyawan -->
<div class="modal fade" id="hapus-jadwal<?= $data['id_jadwal'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Yakin Ingin Menghapus Data Ini ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/hr/hapus-data-jadwal').'/'. $data['id_jadwal']; ?>" method="get"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="jadwal-row row mb-2">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="jadwal-row row mb-2">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control"
                                value="<?= $data['keterangan'] ?>">
                        </div>
                    </div>
                    <div class="jadwal-row row mb-2">
                        <div class="col-md-6">
                            <label>Jam Masuk</label>
                            <input type="time" name="jam_masuk" class="form-control" value="<?= $data['jam_masuk'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Jam Keluar</label>
                            <input type="time" name="jam_keluar" class="form-control"
                                value="<?= $data['jam_keluar'] ?>">
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