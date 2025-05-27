  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>View Data Karyawan <?= $data_karyawan['nama_jabatan'] ?></h1>
                  </div>
                  <!-- <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url()?>admin/master-data-karyawan">Karyawan</a>
                          </li>
                          <li class="breadcrumb-item active">Edit Data Karyawan</li>
                      </ol>
                  </div> -->
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="row">
              <div class="col-md-12">
                  <div class="card card-primary shadow-lg">
                      <div class="card-header">
                          <h3 class="card-title">View Data <?= $data_karyawan['nama_karyawan'] ?></h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-4" style="margin-top: 15px;">
                                  <div class="image align-items-center text-center">
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
                                      <img src="<?= $foto_karyawan; ?>" class="img-circle elevation-2" width="200px"
                                          alt="Karyawan Image"><br>
                                      <input type="hidden" name="foto_karyawan_old"
                                          value="<?php echo $data_karyawan['foto_karyawan']?>"><br>
                                      <!-- <input type="file" class="form-control" name="foto_karyawan"
                                          accept="image/*,.jpg,.jpeg,.png"> -->
                                  </div>
                              </div>
                              <div class="col-md-8">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group row">
                                              <div class="col-md-3">
                                                  <label>Nama Karyawan</label>
                                              </div>
                                              <div class="col-md-1">
                                                  <label>:</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <input type="text" name="nama_karyawan" class="form-control"
                                                      placeholder="Nama Karyawan"
                                                      value="<?= $data_karyawan['nama_karyawan']; ?>" disabled>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group row">
                                              <div class="col-md-3">
                                                  <label>Jabatan</label>
                                              </div>
                                              <div class="col-md-1">
                                                  <label>:</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <input type="text" name="id_jabatan" class="form-control"
                                                      placeholder="Nik Karyawan"
                                                      value="<?= $data_karyawan['nama_jabatan']; ?>" disabled>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group row">
                                          <div class="col-md-3">
                                              <label>Nik Karyawan</label>
                                          </div>
                                          <div class="col-md-1">
                                              <label>:</label>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="text" name="nik_karyawan" class="form-control"
                                                  placeholder="Nama Karyawan"
                                                  value="<?= $data_karyawan['nik_karyawan']; ?>" disabled>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group row">
                                          <div class="col-md-3">
                                              <label>No Handphone</label>
                                          </div>
                                          <div class="col-md-1">
                                              <label>:</label>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="text" name="no_hp" class="form-control"
                                                  placeholder="Nama Karyawan" value="<?= $data_karyawan['no_hp']; ?>"
                                                  disabled>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group row">
                                          <div class="col-md-3">
                                              <label>Username</label>
                                          </div>
                                          <div class="col-md-1">
                                              <label>:</label>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="text" name="username" class="form-control"
                                                  placeholder="Nama Karyawan" value="<?= $data_karyawan['username']; ?>"
                                                  disabled>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- <div class="col-md-12">
                                      <div class="form-group row">
                                          <div class="col-md-3">
                                              <label>password</label>
                                          </div>
                                          <div class="col-md-1">
                                              <label>:</label>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="password" name="password" class="form-control"
                                                  placeholder="Kosongkan jika tidak ganti password">
                                          </div>
                                      </div>
                                  </div> -->
                              </div>
                          </div>
                      </div>
                      <div class="card-footer" style="text-align: center;">
                          <a href="<?php echo base_url('admin/view-karyawan-perjabatan').'/'.sha1($data_karyawan['id_jabatan']);?>" class="btn btn-danger btn-lg">
                              Kembali
                          </a>
                      </div>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
  </div>
  </div>
  <!-- /.card -->

  </section>
  <!-- /.content -->
  </div>