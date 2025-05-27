  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Edit Data Karyawan</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url()?>admin/master-data-karyawan">Karyawan</a>
                          </li>
                          <li class="breadcrumb-item active">Edit Data Karyawan</li>
                      </ol>
                  </div>
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
                          <h3 class="card-title">Edit Data Karyawan</h3>
                      </div>
                      <!-- /.card-header -->
                      <form action="<?= base_url('/admin/update-data-karyawan').'/'.$data_karyawan['id_karyawan'] ?>" method="post"
                          enctype="multipart/form-data">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-4" style="margin-top: 20px;">
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
                                          <img src="<?= $foto_karyawan; ?>"
                                              class="img-circle elevation-2" width="200px" alt="Karyawan Image"><br>
                                          <input type="hidden" name="foto_karyawan_old" value="<?php echo $data_karyawan['foto_karyawan']?>"><br>
                                          <input type="file" class="form-control" name="foto_karyawan"
                                              accept="image/*,.jpg,.jpeg,.png">
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
                                                          value="<?= $data_karyawan['nama_karyawan']; ?>" required>
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
                                                      <select class="form-control select2" name="id_jabatan"
                                                          style="width: 100%;">
                                                          <?php
									                        foreach($data_jabatan as $data){
									                      ?>
                                                          <!-- <option>-- Pilih Jabatan --</option> -->
                                                          <option value="<?php echo $data["id_jabatan"] ?>"
                                                              <?php if($data_karyawan['id_jabatan'] == $data["id_jabatan"]){echo "selected";} else"";?>>
                                                              <?= $data['nama_jabatan']; ?>
                                                          </option>
                                                          <?php } ?>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-group row">
                                                  <div class="col-md-3">
                                                      <label>Lokasi Penempatan</label>
                                                  </div>
                                                  <div class="col-md-1">
                                                      <label>:</label>
                                                  </div>
                                                  <div class="col-md-8">
                                                      <select class="form-control select2" name="id_lokasi"
                                                          style="width: 100%;">
                                                          <?php
									                        foreach($data_lokasi as $data){
									                      ?>
                                                          <!-- <option>-- Pilih Jabatan --</option> -->
                                                          <option value="<?php echo $data["id_lokasi"] ?>"
                                                              <?php if($data_karyawan['id_lokasi'] == $data["id_lokasi"]){echo "selected";} else"";?>>
                                                              <?= $data['nama_lokasi']; ?>
                                                          </option>
                                                          <?php } ?>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-group row">
                                                  <div class="col-md-3">
                                                      <label>Alamat Rumah</label>
                                                  </div>
                                                  <div class="col-md-1">
                                                      <label>:</label>
                                                  </div>
                                                  <div class="col-md-8">
                                                      <textarea name="alamat_rumah" class="form-control"><?= $data_karyawan['alamat_rumah']; ?></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-group row">
                                                  <div class="col-md-3">
                                                      <label>Tanggal Lahir</label>
                                                  </div>
                                                  <div class="col-md-1">
                                                      <label>:</label>
                                                  </div>
                                                  <div class="col-md-8">
                                                      <input type="date" name="tgl_lahir" class="form-control"
                                                          placeholder="Nama Karyawan"
                                                          value="<?= $data_karyawan['tgl_lahir']; ?>" required>
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
                                                          value="<?= $data_karyawan['nik_karyawan']; ?>" required>
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
                                                          placeholder="Nama Karyawan"
                                                          value="<?= $data_karyawan['no_hp']; ?>" required>
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
                                                          placeholder="Nama Karyawan"
                                                          value="<?= $data_karyawan['username']; ?>" required>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
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
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer" style="text-align: center;">
                              <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                              <a href="<?php echo base_url('admin/master-data-karyawan');?>"
                                  class="btn btn-danger btn-lg">
                                  Batal
                              </a>
                          </div>
                      </form>
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