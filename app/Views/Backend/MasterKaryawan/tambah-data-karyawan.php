  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Input Data Karyawan</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url()?>admin/master-data-karyawan">Karyawan</a>
                          </li>
                          <li class="breadcrumb-item active">Input Data Karyawan</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <section class="content">
          <div class="col-md-12">
              <center>
                  <div div class="text-danger"> Kata sandi karyawan akan dibuat
                      otomatis. default kata sandinya
                      yaitu : <strong>user123 !</strong>
              </center>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="card card-primary shadow-lg">
                      <div class="card-header">
                          <h3 class="card-title">Tambah Data Karyawan</h3>
                      </div>
                      <form action="<?= base_url('/hr/simpan-data-karyawan') ?>" method="post"
                          enctype="multipart/form-data">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Nama Karyawan</label>
                                          <input type="text" name="nama_karyawan" class="form-control"
                                              placeholder="Nama Karyawan" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Tanggal Lahir</label>
                                          <input type="date" name="tgl_lahir" class="form-control"
                                              placeholder="Tanggal Lahir" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Nik Karyawan</label>
                                          <input type="text" name="nik_karyawan" class="form-control"
                                              placeholder="Nik Karyawan" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>No Handphone</label>
                                          <input type="text" name="no_hp" class="form-control"
                                              placeholder="No Handphone" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>No Rekening</label>
                                          <input type="text" name="no_rek" class="form-control"
                                              placeholder="Nomor Rekening/Bisa Dikosongkan Agar Karyawan Yang Mengisi"
                                              required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Nama Bank</label>
                                          <input type="text" name="nama_bank" class="form-control"
                                              placeholder="Nama Bank/Bisa Dikosongkan Agar Karyawan Yang Mengisi"
                                              required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Atas Nama (Rekening)</label>
                                          <input type="text" name="atas_nama" class="form-control"
                                              placeholder="Atas Nama (Rekening)/Bisa Dikosongkan Agar Karyawan Yang Mengisi"
                                              required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Alamat Rumah</label>
                                          <textarea name="alamat_rumah" class="form-control" required></textarea>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Email Karyawan</label>
                                          <input type="email" name="email_karyawan" class="form-control"
                                              placeholder="Email Karyawan" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Jabatan</label>
                                          <select class="form-control select2" name="id_jabatan" style="width: 100%;">
                                              <option value="">-- Pilih Jabatan --</option>
                                              <?php
									                foreach($data_jabatan as $data){
									                ?>
                                              <option value="<?= $data["id_jabatan"] ?>"
                                                  <?php echo ($data_jabatan == $data["id_jabatan"]) ? 'selected' : '' ?>>
                                                  <?=$data['nama_jabatan']?> </option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Lokasi Penempatan</label>
                                          <select class="form-control select2" name="id_lokasi" style="width: 100%;">
                                              <option value="">-- Pilih Lokasi --</option>
                                              <?php
									                foreach($data_lokasi as $data){
									                ?>
                                              <option value="<?= $data["id_lokasi"] ?>"
                                                  <?php echo ($data_lokasi == $data["id_lokasi"]) ? 'selected' : '' ?>>
                                                  <?=$data['nama_lokasi']?> </option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-7">
                                      <div class="form-group">
                                          <label>Foto Karyawan</label>
                                          <input type="file" name="foto_karyawan" class="form-control"
                                              accept="image/*,.jpg,.jpeg,.png">
                                      </div>
                                  </div>
                              </div>
                          </div>   
                          <div class="card-footer" style="text-align: center;">
                              <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                              <a href="<?php echo base_url('hr/master-data-karyawan');?>" class="btn btn-danger btn-lg">
                                  Batal
                              </a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </section>
  </div>