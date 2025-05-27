  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Edit Data Jadwal</h1>
                  </div>
                  <div class="col-sm-6">
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
                          <h3 class="card-title">Edit Data Jadwal</h3>
                      </div>
                      <!-- /.card-header -->
                      <form action="<?= base_url('/admin/update-data-jadwal').'/'.$data_jadwal['id_jadwal'] ?>"
                          method="post" enctype="multipart/form-data">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="form-group row">
                                                  <div class="col-md-4">
                                                      <label>Tanggal</label>
                                                      <input type="date" name="tanggal" class="form-control"
                                                          value="<?= $data_jadwal['tanggal']; ?>">
                                                  </div>
                                                  <div class="col-md-4">
                                                      <label>Keterangan</label>
                                                      <select class="form-control select2" name="keterangan">
                                                          <option value="masuk"
                                                              <?php if($data_jadwal['keterangan']=='masuk'){echo "selected";} else echo "";?>>
                                                              Masuk
                                                          </option>
                                                          <option value="libur"
                                                              <?php if($data_jadwal['keterangan']=='libur'){echo "selected";} else echo "";?>>
                                                              Libur
                                                          </option>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-group row">
                                                  <div class="col-md-4">
                                                      <label>Jam Masuk</label>
                                                      <input type="time" name="jam_masuk" class="form-control"
                                                          value="<?= $data_jadwal['jam_masuk']; ?>">
                                                  </div>
                                                  <div class="col-md-4">
                                                      <label>Jam Keluar</label>
                                                      <input type="time" name="jam_keluar" class="form-control"
                                                          value="<?= $data_jadwal['jam_keluar']; ?>">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-group row">
                                                  <div class="col-md-6">
                                                      <div>
                                                          <label class="mr-1">Absen Dibuka</label>
                                                          <small class="text-danger">absen di buka berapa menit sebelum
                                                              jam
                                                              masuk ?</small>
                                                      </div>
                                                      <div class="input-group">
                                                          <span class="input-group-text" id="basic-addon1">Menit</span>
                                                          <input type="number" name="absen_dibuka" class="form-control"
                                                              value="<?= $data_jadwal['absen_dibuka']; ?>">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div>
                                                          <label class="mr-1">Absen Telat</label>
                                                          <small class="text-danger">absen terhitung telat berapa menit
                                                              seduah jam masuk ?</small>
                                                      </div>
                                                      <div class="input-group">
                                                          <span class="input-group-text" id="basic-addon1">Menit</span>
                                                          <input type="number" name="absen_telat" class="form-control"
                                                              value="<?= $data_jadwal['absen_telat']; ?>">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <div class="col-md-6">
                                                      <div>
                                                          <label class="mr-1">Absen Alpha</label>
                                                          <small class="text-danger">absen terhitung alpha berapa menit
                                                              seduah jam masuk ?</small>
                                                      </div>
                                                      <div class="input-group">
                                                          <span class="input-group-text" id="basic-addon1">Menit</span>
                                                          <input type="number" name="absen_alpha" class="form-control"
                                                              value="<?= $data_jadwal['absen_alpha']; ?>">
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- </div> -->
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer" style="text-align: center;">
                                  <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                  <a href="<?php echo base_url('admin/master-data-jadwal');?>"
                                      class="btn btn-danger btn-lg">
                                      Batal
                                  </a>
                              </div>
                          </div>
                      </form>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>