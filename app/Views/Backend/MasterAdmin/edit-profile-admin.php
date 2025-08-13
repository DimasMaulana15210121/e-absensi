  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Edit Data Admin</h1>
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
                        <h3 class="card-title">Edit Data Admin</h3>
                    </div>
                    <!-- /.card-header -->
                    <form id="formEdit" action="<?= base_url('hr/simpan-profile-admin') ?>" method="post" 
                        enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4" style="margin-top: 15px;">
                                    <div class="image align-items-center text-center">
                                        <?php 
                                        $cekFoto = file_exists('Assets/img/user/'.$data_admin['foto_user']);
                                        if($cekFoto){
                                           if ($data_admin['foto_user'] == '-') {
                                              $foto_admin = base_url().'Assets/img/default.png';
                                           }else{
                                           $foto_admin = base_url().'Assets/img/user/'.$data_admin['foto_user'];
                                           }
                                        }
                                        elseif(!$cekFoto){
                                           $foto_admin = base_url().'Assets/img/default.png';
                                        }
                                        ?>
                                        <img src="<?= $foto_admin; ?>" class="img-circle elevation-2" width="200px"
                                            alt="Karyawan Image"><br>
                                        <input type="hidden" name="foto_user_old" value="<?php echo $data_admin['foto_user']?>"><br>
                                        <div id="ubahFoto" style="display: none;">
                                            <span>Ubah Foto</span>
                                            <input type="file" class="form-control" name="foto_user"
                                                accept="image/*,.jpg,.jpeg,.png"><br><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" style="padding-top: 30px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label>Nama Admin</label>
                                                </div>
                                                <div class="col-md-1">
                                                    <label>:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" name="nama_user" class="form-control"
                                                        placeholder="Nama Admin"
                                                        value="<?= $data_admin['nama_user']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-1">
                                                    <label>:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        placeholder="Example@gmail.com"
                                                        value="<?= $data_admin['email']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="passwordEdit" style="display: none;">
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
                        <div class="card-footer" style="text-align: center;" id="editButton">
                            <button type="button" class="btn btn-primary btn-lg" onclick="enableEdit()">
                                <i class="fas fa-edit mr-1"></i> Edit Profil
                            </button>
                        </div>
                        <div class="card-footer" style="text-align: center; display: none;" id="editActions">
                            <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                            <button type="button" class="btn btn-danger btn-lg" onclick="cancelEdit()">Batal</button>
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

<script>

    function enableEdit() {
        document.querySelectorAll('input.form-control').forEach(input => {
            input.removeAttribute('readonly');
            if (input.name === 'email') {
                input.setAttribute('required', true);
            }
        });
        document.getElementById("ubahFoto").style.display = "block";
        document.getElementById("passwordEdit").style.display = "block";
        document.getElementById("editButton").style.display = "none";
        document.getElementById("editActions").style.display = "block";
    }

    function cancelEdit() {
        document.querySelectorAll('input.form-control').forEach(input => {
            input.setAttribute('readonly', true);
            if (input.name === 'email') {
                input.removeAttribute('required');
            }
        });
        document.getElementById("ubahFoto").style.display = "none";
        document.getElementById("passwordEdit").style.display = "none";
        document.getElementById("editButton").style.display = "block";
        document.getElementById("editActions").style.display = "none";
    }
</script>