  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Edit Daftar Gaji</h1>
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
                          <h3 class="card-title">Edit Gaji <?= $data_gaji['nama_jabatan']; ?></h3>
                      </div>
                      <!-- /.card-header -->
                      <form action="<?= base_url('/hr/update-daftar-gaji').'/'.$data_gaji['id_gaji']?>" method="post"
                          enctype="multipart/form-data">
                          <div class="card-body">
                              <!-- <div class="row"> -->
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group row">
                                              <div class="col-md-3"></div>
                                              <div class="col-md-6" style="text-align: center;">
                                                  <label>Jabatan</label>
                                                  <input type="text" name="id_jabatan" class="form-control"
                                                      value="<?= $data_gaji['nama_jabatan']; ?>" style="text-align: center;" disabled>
                                              </div>
                                              <div class="col-md-3"></div>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group row">
                                              <div class="col-md-6">
                                                  <label>Gaji Pokok</label>
                                                  <div class="input-group">
                                                      <span class="input-group-text" id="basic-addon1">Rp</span>
                                                      <input type="number" name="gaji_pokok" class="form-control"
                                                          value="<?= $data_gaji['gaji_pokok']; ?>" required>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <label class="form-label">Uang_makan</label>
                                                  <div class="input-group">
                                                      <span class="input-group-text" id="basic-addon1">Rp</span>
                                                      <input type="number" name="uang_makan" class="form-control"
                                                          value="<?= $data_gaji['uang_makan']; ?>" required>
                                                  </div>
                                              </div>
                                              <div class="col-md-6"><br>
                                                  <label class="form-label">Tunjangan Kesehatan</label>
                                                  <div class="input-group">
                                                      <span class="input-group-text" id="basic-addon1">Rp</span>
                                                      <input type="number" name="tj_kesehatan" class="form-control"
                                                          value="<?= $data_gaji['tj_kesehatan']; ?>" required>
                                                  </div>
                                              </div>
                                              <div class="col-md-6"><br>
                                                  <label class="form-label">Tunjangan Transportasi</label>
                                                  <div class="input-group">
                                                      <span class="input-group-text" id="basic-addon1">Rp</span>
                                                      <input type="number" name="tj_transportasi" class="form-control"
                                                          value="<?= $data_gaji['tj_transportasi']; ?>" required>
                                                  </div>
                                              </div>
                                              <div class="col-md-6"><br>
                                                  <label class="form-label">BPJS</label>
                                                  <div class="input-group">
                                                      <span class="input-group-text" id="basic-addon1">Rp</span>
                                                      <input type="number" name="bpjs" class="form-control"
                                                          value="<?= $data_gaji['bpjs']; ?>" required>
                                                  </div>
                                              </div>
                                              <div class="col-md-6"><br>
                                                  <label class="form-label">Pajak</label>
                                                  <div class="input-group">
                                                      <span class="input-group-text" id="basic-addon1">%</span>
                                                      <input type="number" name="pajak" class="form-control"
                                                          value="<?= $data_gaji['pajak']; ?>" required>
                                                  </div>    
                                              </div>
                                              <div class="col-md-6"><br>
                                                  <label class="form-label">Potongan Gaji Tidak Hadir/Alpha</label>
                                                  <div class="input-group">
                                                      <span class="input-group-text" id="basic-addon1">Rp</span>
                                                      <input type="number" name="potong_gaji" class="form-control"
                                                          value="<?= $data_gaji['potong_gaji']; ?>" required>
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
                              <a href="<?php echo base_url('hr/master-daftar-gaji');?>"
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
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>