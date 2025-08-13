<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Absensi | PT. Kostzy</title>
    <meta name="description" content="HR-GeoAbsensi">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="<?= base_url()?>Assets/img/unnamed.png" sizes="32x32" />
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/css/inc/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/css/inc/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/css/inc/owl-carousel/owl.theme.default.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400,500,700&display=swap" />
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/css/style.css" />

    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url()?>Assets/Frontend/sweetalert2/sweetalert2.min.css">

    <style>
        #particles-js {
			    position: absolute;
			    width: 100%;
			    height: 100%;
			    background-image: url('');
			    background-size: cover;
			    background-position: 50% 50%;
			    background-repeat: no-repeat;
		    }
    </style>

</head>

<body class="bg-white">
  <div id="particles-js"></div>
    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">
        <div class="login-form mt-1">
              <?php
                    use App\Models\M_Gambar;

                    $modelGambar = new M_Gambar;
                    // Mengambil data keseluruhan kategori dari table kategori di database
                    $dataGambar = $modelGambar->getDataGambar(['bagian' => '2'])->getRowArray();

                    if (!$dataGambar) {
                        $logo = base_url().'Assets/img/logo/default.png';
                        $namaPt = 'Nama Perusahaan';
                    } else {
                        $logo = base_url().'Assets/img/logo/'.$dataGambar['gambar'];
                        $namaPt = $dataGambar['nama_pt'];
                    }
              ?>
            <div class="section">
                <img src="<?= $logo ?>" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1><?= $namaPt ?></h1>
                <h4>Silahkan Isi Form Login Ini !</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action="<?= base_url('/karyawan/login-checker') ?>" method="post">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" name="email_karyawan" class="form-control" placeholder="Email" required>
                            <i class="fas fa-times-circle clear-input"></i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <i class="fas fa-times-circle clear-input"></i>
                        </div>
                    </div>

                    <!-- <div class="form-links mt-2">
                        <div>
                            <a href="page-register.html">Register Now</a>
                        </div>
                        <div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                    </div> -->

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->



    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="<?= base_url()?>Assets/Frontend/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="<?= base_url()?>Assets/Frontend/js/lib/popper.min.js"></script>
    <script src="<?= base_url()?>Assets/Frontend/js/lib/bootstrap.min.js"></script>
    <!-- Owl Carousel -->
    <script src="<?= base_url()?>Assets/Frontend/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="<?= base_url()?>Assets/Frontend/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="<?= base_url()?>Assets/Frontend/js/base.js"></script>
    <!-- SweetAlert -->
    <script src="<?= base_url()?>Assets/Frontend/sweetalert2/sweetalert2.min.js"></script>

<!-- particles.js CDN -->
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<!-- Particles.js configuration -->
<script>
	document.addEventListener("DOMContentLoaded", function () {
	    particlesJS('particles-js', {
          "particles": {
            "number": {
              "value": 40,
              "density": {
                "enable": false,
                "value_area": 800
              }
            },
            "color": {
              "value": "#000000"
            },
            "shape": {
              "type": "circle",
              "stroke": {
                "width": 0,
                "color": "#000000"
              },
              "polygon": {
                "nb_sides": 5
              },
              "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100
              }
            },
            "opacity": {
              "value": 0.5,
              "random": false,
              "anim": {
                "enable": false,
                "speed": 1,
                "opacity_min": 0.1,
                "sync": false
              }
            },
            "size": {
              "value": 2,
              "random": false,
              "anim": {
                "enable": false,
                "speed": 40,
                "size_min": 20,
                "sync": false
              }
            },
            "line_linked": {
              "enable": true,
              "distance": 150,
              "color": "#000000",
              "opacity": 0.4,
              "width": 1
            },
            "move": {
              "enable": true,
              "speed": 4,
              "direction": "none",
              "random": true,
              "straight": false,
              "out_mode": "out",
              "bounce": false,
              "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 1200
              }
            }
          },
          "interactivity": {
            "detect_on": "canvas",
            "events": {
              "onhover": {
                "enable": true,
                "mode": "grab"
              },
              "onclick": {
                "enable": true,
                "mode": "push"
              },
              "resize": true
            },
            "modes": {
              "grab": {
                "distance": 150,
                "line_linked": {
                  "opacity": 0.5
                }
              },
              "bubble": {
                "distance": 400,
                "size": 40,
                "duration": 2,
                "opacity": 8,
                "speed": 3
              },
              "repulse": {
                "distance": 200,
                "duration": 0.4
              },
              "push": {
                "particles_nb": 2
              },
              "remove": {
                "particles_nb": 2
              }
            }
          },
          "retina_detect": true
        });
    });
</script>


<?php if (session()->getFlashdata('success')) : ?>
<script type="text/javascript">
    $(document).ready(function () {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?php echo $_SESSION['success']; ?>'
        })
    });
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
<script type="text/javascript">
    $(document).ready(function () {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '<?php echo $_SESSION['error']; ?>'
        })
    });
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('warning')) : ?>
<script type="text/javascript">
    $(document).ready(function () {
        Swal.fire({
            icon: 'warning',
            title: 'Warning!',
            text: '<?php echo $_SESSION['warning']; ?>'
        })
    });
</script>
<?php endif; ?>
<?php if (session()->getFlashdata('info')) : ?>
<script type="text/javascript">
    $(document).ready(function () {
        Swal.fire({
            icon: 'info',
            title: 'Info!',
            text: '<?php echo $_SESSION['info']; ?>'
        })
    });
</script>
<?php endif; ?>


</body>

</html>