<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Master Data Karyawan Dengan Jabatan <?= $data_jabatan['nama_jabatan']; ?></h1>
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
                            <a href="<?= base_url('admin/master-data-jabatan') ?>">
                                <button type="button" class="btn btn-danger btn-sm col-sm-2">
                                    <span class="fas fa-arrow-left mr-1"></span> Kembali
                                </button>
                            </a>
                            <!-- <h3 class="card-title col-sm-10">Tabel Data Karyawan</h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th data-sortable="true">No</th>
                                        <th data-sortable="true">Nama Karyawan</th>
                                        <th data-sortable="true">Nik Karyawan</th>
                                        <th data-sortable="true">Jabatan</th>
                                        <th data-sortable="true">No Handphone</th>
                                        <th data-sortable="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        foreach ($data_karyawan as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $no=$no+1 ?></td>
                                        <td><?= $data['nama_karyawan']; ?></td>
                                        <td><?= $data['nik_karyawan']; ?></td>
                                        <td><?= $data['nama_jabatan']; ?></td>
                                        <td><?= $data['no_hp']; ?></td>
                                        <td>
                                            <a href="<?= base_url('/admin/view-karyawan-perjabatan').'/'.sha1($data['id_jabatan']).'/'. sha1($data['id_karyawan']); ?>" title="View Karyawan">
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