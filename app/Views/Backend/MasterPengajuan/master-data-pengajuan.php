<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Pengajuan Cuti/Izin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Master Pengajuan Cuti/Izin</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">Pending</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-one-profile" role="tab"
                                        aria-controls="custom-tabs-one-profile" aria-selected="false">Diterima</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                        href="#custom-tabs-one-messages" role="tab"
                                        aria-controls="custom-tabs-one-messages" aria-selected="false">Ditolak</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-home-tab">
                                    <table id="table1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th data-sortable="true">No</th>
                                                <th data-sortable="true">Nama Karyawan</th>
                                                <!-- <th data-sortable="true">Jabatan</th> -->
                                                <!-- <th data-sortable="true">No Handphone</th> -->
                                                <th data-sortable="true">Tanggal Mulai</th>
                                                <th data-sortable="true">Tanggal Selesai</th>
                                                <th data-sortable="true">Keterangan</th>
                                                <th data-sortable="true">Status</th>
                                                <th data-sortable="true">Status Approved</th>
                                                <th data-sortable="true">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 0;
                                                foreach ($data_pending as $data) {
                                            ?>
                                            <tr>
                                                <td><?= $no=$no+1 ?></td>
                                                <td><?= $data['nama_karyawan']; ?></td>
                                                <!-- <td><?= $data['no_hp']; ?></td> -->
                                                <td><?= $data['tgl_mulai']; ?></td>
                                                <td><?= $data['tgl_selesai']; ?></td>
                                                <td><?= $data['ket_izin']; ?></td>
                                                <td>
                                                    <?php if($data['status_izin'] == 'Cuti'){
                                                   echo 'Cuti';
                                                } elseif($data['status_izin'] == 'Izin'){
                                                   echo 'Izin';
                                                } else{
                                                   echo 'Sakit';
                                                } ?>
                                                </td>
                                                <td>
                                                    <?php if($data['status_approved'] == '0'){
                                                   echo '<span class="badge badge-warning text-dark">Pending</span>';
                                                } elseif($data['status_approved'] == '1'){
                                                   echo '<span class="badge badge-success">Diterima</span>';
                                                } else{
                                                   echo '<span class="badge badge-danger">Ditolak</span>';
                                                } ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#terima-pengajuan<?= $data['id_izin']; ?>">Terima</button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#tolak-pengajuan<?= $data['id_izin']; ?>">Tolak</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-profile-tab">
                                    <table id="table1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th data-sortable="true">No</th>
                                                <th data-sortable="true">Nama Karyawan</th>
                                                <!-- <th data-sortable="true">Jabatan</th> -->
                                                <!-- <th data-sortable="true">No Handphone</th> -->
                                                <th data-sortable="true">Tanggal Mulai</th>
                                                <th data-sortable="true">Tanggal Selesai</th>
                                                <th data-sortable="true">Keterangan</th>
                                                <th data-sortable="true">Status</th>
                                                <th data-sortable="true">Status Approved</th>
                                                <!-- <th data-sortable="true">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 0;
                                                foreach ($data_diterima as $data) {
                                            ?>
                                            <tr>
                                                <td><?= $no=$no+1 ?></td>
                                                <td><?= $data['nama_karyawan']; ?></td>
                                                <!-- <td><?= $data['no_hp']; ?></td> -->
                                                <td><?= $data['tgl_mulai']; ?></td>
                                                <td><?= $data['tgl_selesai']; ?></td>
                                                <td><?= $data['ket_izin']; ?></td>
                                                <td>
                                                    <?php if($data['status_izin'] == 'Cuti'){
                                                   echo 'Cuti';
                                                } elseif($data['status_izin'] == 'Izin'){
                                                   echo 'Izin';
                                                } else{
                                                   echo 'Sakit';
                                                } ?>
                                                </td>
                                                <td>
                                                    <?php if($data['status_approved'] == '0'){
                                                   echo '<span class="badge badge-warning text-dark">Pending</span>';
                                                } elseif($data['status_approved'] == '1'){
                                                   echo '<span class="badge badge-success">Diterima</span>';
                                                } else{
                                                   echo '<span class="badge badge-danger">Ditolak</span>';
                                                } ?>
                                                </td>
                                                <!-- <td>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#terima-pengajuan<?= $data['id_izin']; ?>">Terima</button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#tolak-pengajuan<?= $data['id_izin']; ?>">Tolak</button>
                                                </td> -->
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-messages-tab">
                                    <table id="table1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th data-sortable="true">No</th>
                                                <th data-sortable="true">Nama Karyawan</th>
                                                <!-- <th data-sortable="true">Jabatan</th> -->
                                                <!-- <th data-sortable="true">No Handphone</th> -->
                                                <th data-sortable="true">Tanggal Mulai</th>
                                                <th data-sortable="true">Tanggal Selesai</th>
                                                <th data-sortable="true">Keterangan</th>
                                                <th data-sortable="true">Status</th>
                                                <th data-sortable="true">Status Approved</th>
                                                <!-- <th data-sortable="true">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 0;
                                                foreach ($data_ditolak as $data) {
                                            ?>
                                            <tr>
                                                <td><?= $no=$no+1 ?></td>
                                                <td><?= $data['nama_karyawan']; ?></td>
                                                <!-- <td><?= $data['no_hp']; ?></td> -->
                                                <td><?= $data['tgl_mulai']; ?></td>
                                                <td><?= $data['tgl_selesai']; ?></td>
                                                <td><?= $data['ket_izin']; ?></td>
                                                <td>
                                                <?php if($data['status_izin'] == 'Cuti'){
                                                   echo 'Cuti';
                                                } elseif($data['status_izin'] == 'Izin'){
                                                   echo 'Izin';
                                                } else{
                                                   echo 'Sakit';
                                                } ?>
                                                </td>
                                                <td>
                                                <?php if($data['status_approved'] == '0'){
                                                   echo '<span class="badge badge-warning text-dark">Pending</span>';
                                                } elseif($data['status_approved'] == '1'){
                                                   echo '<span class="badge badge-success">Diterima</span>';
                                                } else{
                                                   echo '<span class="badge badge-danger">Ditolak</span>';
                                                } ?>
                                                </td>
                                                <!-- <td>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#terima-pengajuan<?= $data['id_izin']; ?>">Terima</button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#tolak-pengajuan<?= $data['id_izin']; ?>">Tolak</button>
                                                </td> -->
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
</div>

<?php
    foreach ($data_pending as $data) {
?>
<!-- Modal Terima Pengajuan -->
<div class="modal fade" id="terima-pengajuan<?= $data['id_izin'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Terima Pengajuan Cuti/Izin/Sakit ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/admin/terima-pengajuan').'/'. $data['id_izin'] .'/'.$data['id_karyawan'] ?>" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Nama Karyawan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['nama_karyawan']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['nama_jabatan']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Nik Karyawan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['nik_karyawan']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>No Handphone</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['no_hp']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Tanggal Mulai</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['tgl_mulai']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Tanggal Selesai</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['tgl_selesai']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['ket_izin']; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Terima</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>

<?php
    foreach ($data_pending as $data) {
?>
<!-- Modal Tolak Pengajuan -->
<div class="modal fade" id="tolak-pengajuan<?= $data['id_izin'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Tolak Pengajuan Cuti/Izin/Sakit ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/admin/tolak-pengajuan').'/'. $data['id_izin']; ?>" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Nama Karyawan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['nama_karyawan']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['nama_jabatan']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Nik Karyawan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['nik_karyawan']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>No Handphone</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['no_hp']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Tanggal mulai</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['tgl_mulai']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Tanggal Selesai</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['tgl_selesai']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label><?= $data['ket_izin']; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>