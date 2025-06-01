<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Logo Perusahaan</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Data Logo</li>
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
                     <h3 class="card-title col-sm-10">Data Logo</h3>
                     <a href="#">
                        <button type="button" class="btn btn-primary btn-sm col-sm-2" data-toggle="modal"
                           data-target="#modal-logo"><span class="fas fa-plus mr-1"></span>
                           Tambah Logo</button>
                     </a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="row">
                        <?php
                           foreach($data_gambar as $data)
                           {
                        ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                           <div class="card">
                              <span style="text-align: center"><?php echo $data['nama_pt'];?></span>
                              <span style="text-align: center">
                                 <?php if($data['bagian'] == '0'){
                                    echo 'Logo Sidebar Admin';
                                 } elseif ($data['bagian'] == '1') {
                                    echo 'Logo Login Admin';
                                 } else {
                                    echo 'Logo Login Karyawan';
                                 }?>
                              </span>
                              <img class="card-img" src="<?= base_url('Assets/img/logo/'). $data['gambar'];?>"
                                 alt="Logo" style="object-fit: cover;" /> <br>
                              <div class="row">
                                 <div class="col-12" style="align-items: center;">
                                    <a href="<?= base_url('/hr/edit-logo-perusahaan/'.sha1($data['id_gambar']))?>"
                                       title="Edit Data">
                                       <button type="button" class="btn btn-success btn-lg btn-block"><span
                                             class="fas fa-edit mr-1"></span>Edit</button>
                                    </a>
                                    <br>
                                    <a href="#" title="Hapus Data">
                                       <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal"
                                          data-target="#hapus-logo<?= $data['id_gambar'] ?>"><span
                                             class="fas fa-trash mr-1"></span>Hapus</button>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
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
<div class="modal fade" id="modal-logo">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Tambah Data Jabatan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('/hr/simpan-logo-perusahaan') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="form-group">
                  <label>Nama Perusahaan/Instansi</label>
                  <input type="text" name="nama_pt" class="form-control" placeholder="Nama Perusahaan/Instansi"
                     required>
               </div>
               <div class="form-group">
                  <label>Logo Perusahaan/Instansi</label>
                  <input type="file" name="gambar" class="form-control" accept="image/*,.jpg,.jpeg,.png">
               </div>
               <div class="form-group">
                  <label>Untuk Bagian</label>
                  <select name="bagian" class="form-control">
                     <option value="">-- Pilih Bagian --</option>
                     <option value="0">Sidebar Admin</option>
                     <option value="1">Login Admin</option>
                     <option value="2">Login Karyawan</option>
                  </select>
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
    foreach ($data_gambar as $data) {
?>
<!-- Modal Hapus Karyawan -->
<div class="modal fade" id="hapus-logo<?= $data['id_gambar'];?>">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-danger">
            <h4 class="modal-title">Yakin Ingin Menghapus Data Ini ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('/hr/hapus-logo-perusahaan').'/'. $data['id_gambar']; ?>" method="get"
            enctype="multipart/form-data">
            <div class="modal-body">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group row">
                           <div class="col-md-4">
                              <label>Nama Perusahaan</label>
                           </div>
                           <div class="col-md-1">
                              <label>:</label>
                           </div>
                           <div class="col-md-7">
                              <label><?= $data['nama_pt']; ?></label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group row">
                           <div class="col-md-4">
                              <label>Bagian</label>
                           </div>
                           <div class="col-md-1">
                              <label>:</label>
                           </div>
                           <div class="col-md-7">
                              <label><?php
                                       if ($data['bagian'] == '0') {
                                          echo 'Sidebar Admin' ;
                                       } elseif ($data['bagian'] == '1') {
                                          echo 'Login Admin' ;
                                       } else {
                                          echo 'Login Karyawan' ;
                                       }
                                     ?>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group row">
                           <div class="col-md-4">
                              <label>Logo Perusahaan</label>
                           </div>
                           <div class="col-md-1">
                              <label>:</label>
                           </div>
                           <div class="col-md-7">
                              <img class="card-img" src="<?= base_url('Assets/img/logo/'). $data['gambar'];?>"
                                 alt="Logo" style="object-fit: cover;" />
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