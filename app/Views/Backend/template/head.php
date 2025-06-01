<?php
  if(session()->get('ses_id')=="" or session()->get('ses_user')==""){
	  session()->setFlashdata('error','Maaf Silahkan Login Terlebih Dahulu!')
	  ?>
<script>
  document.location = "<?= base_url('hr/login');?>";
</script>
<?php
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Absensi | PT. Kostzy</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="<?= base_url()?>Assets/Backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/dist/css/adminlte.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- SweetAlert -->
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/dist/css/sweetalert2.min.css">

  <!-- leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <span class="animation__shake">
        <span class="brand-text h1"><i class="fas fa-heartbeat"></i></span>
      </span>
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url('admin/dashboard');?>" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/hr/logout')?>" role="button">
            <i class="fas fa-sign-out-alt"> Logout</i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->