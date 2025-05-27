<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Kantor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Master Lokasi Absen</li>
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
                            <h3 class="card-title col-sm-10">Tabel Data Kantor</h3>
                            <a href="<?= base_url('admin/tambah-data-lokasi') ?>"><button type="button" class="btn btn-primary btn-sm col-sm-2"><span class="fas fa-plus"></span>
                                Tambah Data Lokasi</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th data-sortable="true">No</th>
                                        <th data-sortable="true">Nama Lokasi</th>
                                        <th data-sortable="true">Alamat Lokasi</th>
                                        <th data-sortable="true">Radius Absen</th>
                                        <th data-sortable="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        foreach ($data_lokasi as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $no=$no+1 ?></td>
                                        <td><?= $data['nama_lokasi']; ?></td>
                                        <td style="width: 400px;"><?= $data['alamat']; ?></td>
                                        <td><?= $data['radius']; ?> Meter</td>
                                        <td>
                                            <a href="<?= base_url('/admin/edit-data-lokasi')."/".sha1($data['id_lokasi']);?>"
                                                title="Edit Lokasi">
                                                <button type="button" class="btn btn-warning"><span
                                                        class="fas fa-edit"></span>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-danger" title="Hapus Lokasi"><span
                                                    class="fas fa-trash" data-toggle="modal"
                                                    data-target="#hapus-jadwal<?= $data['id_lokasi'];?>"></span>
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