  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
        <?php
                use App\Models\M_Gambar;

                $modelGambar = new M_Gambar;
                // Mengambil data keseluruhan kategori dari table kategori di database
                $dataGambar = $modelGambar->getDataGambar(['bagian' => '0'])->getRowArray();

                if (!$dataGambar) {
                    $logo = base_url().'Assets/img/logo/default.png';
                    $namaPt = 'Nama Perusahaan';
                } else {
                    $logo = base_url().'Assets/img/logo/'.$dataGambar['gambar'];
                    $namaPt = $dataGambar['nama_pt'];
                }
         ?>
      <a href="#" class="brand-link">
          <img src="<?= $logo ?>" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><?= $namaPt ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <?php
                use App\Models\M_User;

                $modelUser = new M_User;
                // Mengambil data keseluruhan kategori dari table kategori di database
                $dataUser = $modelUser->getDataUser(['id_user' => session('ses_id')])->getResultArray();

                foreach($dataUser as $data){
                ?>
              <div class="image">
                  <img src="<?= base_url('Assets/img/user/'). $data['foto_user'];?>" class="img-circle elevation-2"
                      alt="User Image" style="height: 45px; width: 100%;">
              </div>
              <div class="info">
                  <a class="d-block"><?= $data['nama_user']; ?></a>
              </div>
              <?php } ?>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="<?= base_url() ?>hr/dashboard" class="nav-link <?php if($page == 'dashboard'){echo 'active';}?>">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('hr/profile-admin') ?>" class="nav-link <?php if($page == 'profile-admin'){echo 'active';}?>">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Profile
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('hr/logo-perusahaan') ?>" class="nav-link <?php if($page == 'logo-perusahaan'){echo 'active';}?>">
                          <i class="nav-icon fas fa-images"></i>
                          <p>
                              Logo Perusahaan
                          </p>
                      </a>
                  </li>
                  <li class="nav-header">MASTER DATA</li>
                  <li class="nav-item">
                      <a href="<?= base_url()?>hr/master-data-jabatan" class="nav-link <?php if($page == 'master-data-jabatan'){echo 'active';}?>">
                          <i class="nav-icon fas fa-users-cog"></i>
                          <p>
                              Jabatan
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url()?>hr/master-data-karyawan" class="nav-link <?php if($page == 'master-data-karyawan'){echo 'active';}?>">
                          <i class="nav-icon fas fa-user-tie"></i>
                          <p>
                              Karyawan
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url()?>hr/master-data-jadwal" class="nav-link <?php if($page == 'master-data-jadwal'){echo 'active';}?>">
                          <i class="nav-icon fas fa-calendar-alt"></i>
                          <p>
                              Jadwal
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url()?>hr/master-data-lokasi" class="nav-link <?php if($page == 'master-data-lokasi'){echo 'active';}?>">
                          <i class="nav-icon fas fa-map-marker-alt"></i>
                          <p>
                              Lokasi Absen
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url()?>hr/master-data-pengajuan" class="nav-link">
                          <i class="nav-icon fas fa-check-square"></i>
                          <p>
                              Pengajuan
                          </p>
                      </a>
                  </li>
                  <li class="nav-item <?php if($page == 'master-daftar-gaji' or $page == 'master-pembayaran-gaji'){echo 'menu-open';}?>">
                      <a href="#" class="nav-link <?php if($page == 'master-daftar-gaji' or $page == 'master-pembayaran-gaji'){echo 'active';}?>">
                          <i class="fas fa-money-bill"></i>
                          <p>
                              Penggajian
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?= base_url() ?>hr/master-daftar-gaji"
                                  class="nav-link <?php if($page == 'master-daftar-gaji'){echo 'active';}?>">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Daftar Gaji</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= base_url() ?>hr/master-pembayaran-gaji"
                                  class="nav-link <?php if($page == 'master-pembayaran-gaji'){echo 'active';}?>">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Pembayaran Gaji</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item <?php if($page == 'laporan-absensi' or $page == 'history-absensi'){echo 'menu-open';}?>">
                      <a href="#" class="nav-link <?php if($page == 'laporan-absensi' or $page == 'history-absensi'){echo 'active';}?>">
                          <i class="fas fa-history"></i>
                          <p>
                              History Absen
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?= base_url() ?>hr/laporan-absensi"
                                  class="nav-link <?php if($page == 'laporan-absensi'){echo 'active';}?>">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Laporan Absensi</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= base_url() ?>hr/history-absensi"
                                  class="nav-link <?php if($page == 'history-absensi'){echo 'active';}?>">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>History Absensi</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
  </aside>