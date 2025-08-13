<?php
  if(session()->get('ses_id')=="" or session()->get('ses_karyawan')==""){
	  session()->setFlashdata('error','Maaf Silahkan Login Terlebih Dahulu!')
	  ?>
<script>
  document.location = "<?= base_url('/');?>";
</script>
<?php
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="theme-color" content="#000000" />
    <title>Absensi | PT. Kostzy</title>
    <meta name="description" content="HR-GeoAbsensi" />
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="<?= base_url()?>Assets/img/unnamed.png" sizes="32x32" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url()?>Assets/Frontend/img/icon/192x192.png" />
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/css/inc/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/css/inc/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/css/inc/owl-carousel/owl.theme.default.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400,500,700&display=swap" />
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/css/style.css" />

    <!-- SweetAlert -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/sweetalert2/sweetalert2.min.css">
    <!-- webcam -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js" integrity="sha512-AQMSn1qO6KN85GOfvH6BWJk46LhlvepblftLHzAv1cdIyTWPBKHX+r+NOXVVw6+XQpeW4LJk/GTmoP48FLvblQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- Jquery -->
    <script src="<?= base_url()?>Assets/Frontend/js/lib/jquery-3.4.1.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/dist/css/adminlte.min.css">
</head>

<body style="background-color: #e9ecef">
    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->