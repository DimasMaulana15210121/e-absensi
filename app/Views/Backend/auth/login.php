<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi | Login User</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/dist/css/adminlte.min.css?v=3.2.0">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url()?>Assets/Backend/dist/css/sweetalert2.min.css">
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

<body class="hold-transition login-page" style="background-color: #3498db;">
    <div id="particles-js"></div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <?php
                    use App\Models\M_Gambar;

                    $modelGambar = new M_Gambar;
                    // Mengambil data keseluruhan kategori dari table kategori di database
                    $dataGambar = $modelGambar->getDataGambar(['bagian' => '1'])->getRowArray();

                    if (!$dataGambar) {
                        $logo = base_url().'Assets/img/logo/default.png';
                        $namaPt = 'Nama Perusahaan';
                    } else {
                        $logo = base_url().'Assets/img/logo/'.$dataGambar['gambar'];
                        $namaPt = $dataGambar['nama_pt'];
                    }
                ?>
                <div>
                    <img src="<?= $logo ?>" style="width: 150px; height: 100%; text-align: center;" alt="AdminLTE">
                </div>
                <div>
                    <a href="#" class="h1"><b><?= $namaPt ?></b></a>
                </div>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Isi Form Login Admin !</p>

                <form action="<?= base_url('/hr/login-checker') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-badge"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                          <div class="icheck-primary">
                            <input type="checkbox" id="remember" onclick="showpassword()">
                            <label for="remember">
                              Show Password
                            </label>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url()?>Assets/Backend/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url()?>Assets/Backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url()?>Assets/Backend/dist/js/adminlte.min.js?v=3.2.0"></script>
    <!-- SweetAlert -->
    <script src="<?= base_url()?>Assets/Backend/dist/js/sweetalert2.min.js"></script>

    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"93c8143dec10e2fe","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.4.0-1-g37f21b1","token":"2437d112162f4ec4b63c3ca0eb38fb20"}'
        crossorigin="anonymous"></script>

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

    <script type="text/javascript">
        function showpassword() {
            var myinput = document.getElementById('password');
            if (myinput.type === "password") {
                myinput.type = "text";
            } else {
                myinput.type = "password";
            }
        }
    </script>

<?php if (session()->getFlashdata('success')) : ?>
    <script type="text/javascript">
      $(document).ready(function () {
        swal("Success!", "<?php echo $_SESSION['success'] ?>", "success");
      });
    </script>
<?php endif; ?>
<?php if (session()->getFlashdata('error')) : ?>
    <script type="text/javascript">
      $(document).ready(function () {
        swal("Sorry!", "<?php echo $_SESSION['error'] ?>", "error");
      });
    </script>
<?php endif; ?>
<?php if (session()->getFlashdata('warning')) : ?>
    <script type="text/javascript">
      $(document).ready(function () {
        swal("Warning!", "<?php echo $_SESSION['warning'] ?>", "warning");
      });
    </script>
<?php endif; ?>
<?php if (session()->getFlashdata('info')) : ?>
    <script type="text/javascript">
      $(document).ready(function () {
        swal("Info!", "<?php echo $_SESSION['info'] ?>", "info");
      });
    </script>
<?php endif; ?>
        
</body>

</html>