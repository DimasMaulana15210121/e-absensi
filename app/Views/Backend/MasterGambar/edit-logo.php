  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Edit Logo Perusahaan</h1>
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
                          <h3 class="card-title">Edit Logo Perusahaan</h3>
                      </div>
                      <!-- /.card-header -->
                      <form action="<?= base_url('/hr/update-logo-perusahaan').'/'.$data_logo['id_gambar'] ?>"
                          method="post" enctype="multipart/form-data">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-4" style="margin-top: 15px;">
                                      <div class="image align-items-center text-center">
                                          <?php 
                                        $cekLogo = file_exists('Assets/img/logo/'.$data_logo['gambar']);
                                        if($cekLogo){
                                           if ($data_logo['gambar'] == '-') {
                                              $logo_perusahaan = base_url().'Assets/img/logo/default.png';
                                           }else{
                                           $logo_perusahaan = base_url().'Assets/img/logo/'.$data_logo['gambar'];
                                           }
                                        }
                                        elseif(!$cekLogo){
                                           $logo_perusahaan = base_url().'Assets/img/logo/default.png';
                                        }
                                        ?>
                                          <img src="<?= $logo_perusahaan; ?>" class="img-circle elevation-2"
                                              width="200px" alt="Karyawan Image"><br>
                                          <input type="hidden" name="gambar_old"
                                              value="<?php echo $data_logo['gambar']?>"><br>
                                          <div>
                                              <span>Ubah Logo</span>
                                              <input type="file" class="form-control" name="gambar"
                                                  accept="image/*,.jpg,.jpeg,.png"><br><br>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-8" style="padding-top: 30px;">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="form-group row">
                                                  <div class="col-md-3">
                                                      <label>Nama Perusahaan/Instansi</label>
                                                  </div>
                                                  <div class="col-md-1">
                                                      <label>:</label>
                                                  </div>
                                                  <div class="col-md-8">
                                                      <input type="text" name="nama_pt" class="form-control"
                                                          placeholder="Nama Perusahaan/Instansi" value="<?= $data_logo['nama_pt']; ?>">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-group row">
                                                  <div class="col-md-3">
                                                      <label>Untuk Bagian</label>
                                                  </div>
                                                  <div class="col-md-1">
                                                      <label>:</label>
                                                  </div>
                                                  <div class="col-md-8">
                                                      <select class="form-control"
                                                          name="bagian" rows="3">
                                                          <option value="0"
                                                              <?php if($data_logo['bagian']=='0'){echo "selected";} else echo "";?>>
                                                              Sidebar Admin
                                                          </option>
                                                          <option value="1"
                                                              <?php if($data_logo['bagian']=='1'){echo "selected";} else echo "";?>>
                                                              Login Admin</option>
                                                          <option value="2"
                                                              <?php if($data_logo['bagian']=='2'){echo "selected";} else echo "";?>>
                                                              Login Karyawan
                                                          </option>
                                                      </select>
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
                              <a href="<?php echo base_url('hr/logo-perusahaan');?>" class="btn btn-danger btn-lg">
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