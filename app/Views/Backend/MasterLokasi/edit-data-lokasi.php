  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Edit Data Lokasi</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url()?>hr/master-data-lokasi">Kantor</a></li>
                          <li class="breadcrumb-item active">Edit Data Lokasi</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="col-md-12">
              <div class="card card-primary shadow-lg">
                  <div class="card-header">
                      <h3 class="card-title">Edit Data Kantor</h3>

                      <!-- <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                  class="fas fa-plus"></i>
                          </button>
                      </div> -->
                      <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <form action="<?= base_url('/hr/update-lokasi').'/'.$data_lokasi['id_lokasi']?>" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                          <div class="form-group">
                              <label>Nama Lokasi</label>
                              <input type="text" name="nama_lokasi" class="form-control" placeholder="Nama Lokasi"
                                value="<?= $data_lokasi['nama_lokasi']; ?>" required>
                          </div>
                          <div class="form-group">
                              <label>Alamat</label>
                              <input type="text" name="alamat" class="form-control" placeholder="Alamat"
                              value="<?= $data_lokasi['alamat']; ?>" required>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kordinat Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" placeholder="Kordinat Lokasi Absen"
                                      value="<?= $data_lokasi['lokasi']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Radius Absen</label>
                                    <div class="input-group">
                                      <span class="input-group-text" id="basic-addon1">Meter</span>
                                      <input type="number" name="radius" class="form-control" placeholder="Jarak Radius Absen"
                                          value="<?= $data_lokasi['radius']; ?>" required>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="map" style="width: 100%; height: 300px;"></div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer" style="text-align: center;">
                          <button type="submit" class="btn btn-primary btn-lg">Update</button>
                          <a href="<?php echo base_url('hr/master-data-lokasi');?>"
                                    class="btn btn-danger btn-lg">
                                    Batal
                          </a>
                      </div>
                  </form>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>

<script type="text/javascript">
    var map = L.map('map').setView([<?= $data_lokasi['lokasi']; ?>], 15);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([<?= $data_lokasi['lokasi']; ?>]).addTo(map)
        .bindPopup('<?= $data_lokasi['nama_lokasi']; ?>')
        .openPopup();
    L.circle([<?= $data_lokasi['lokasi']; ?>], {
        color: 'red',
        fillColor: 'blue',
        fillOpacity: 0.5,
        radius: <?= $data_lokasi['radius']; ?>
    }).addTo(map);
</script>