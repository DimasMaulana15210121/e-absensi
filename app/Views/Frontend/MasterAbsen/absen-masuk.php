<!-- App Header -->
<div class="appHeader bg-secondary text-light">
    <div class="left">
        <a href="<?= base_url('/karyawan/home') ?>" class="headerButton goBack">
            <i class="fas fa-arrow-left fa-2x"></i>
        </a>
    </div>
    <div class="pageTitle"><?= $judul ?></div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<div class="row" style="margin-top: 70px; margin-bottom: 65px;">
    <div class="col">
        <style>
            .my_camera,
            .my_camera video {
                display: block;
                width: 100% !important;
                height: auto !important;
                margin: auto;
                border-radius: 15px;
                max-width: 500px; 
            }
            #map {
                width: 100%;
                height: 400px;
                border-radius: 10px;
                }
            @media(min-width: 768px){
                #map { height: 400px; }
            }
        </style>
        <div class="section mt-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="my_camera mb-3"></div>
                        <button class="btn btn-primary btn-block rounded shadow-sm" id="takeAbsen" disabled>
                            <i class="fas fa-camera mr-1"></i>Absen Masuk
                        </button>
                        <input type="hidden" name="lokasi" id="lokasi">
                        <input type="hidden" name="jarak" id="jarak">
                        <div id="map" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90,
        constraints: {
            facingMode: "user" // kamera depan HP
        }
    });

    Webcam.attach('.my_camera');

    function toRad(x) {
        return x * Math.PI / 180;
    }

    let jarak = 0;
    let foto = '';

    function hitungJarak(lat1, lon1, lat2, lon2) {
        const R = 6371000;
        const dLat = toRad(lat2 - lat1);
        const dLon = toRad(lon2 - lon1);
        const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        return R * c;
    }

    const kantorLatLng = [<?= esc($data_karyawan['lokasi']) ?>];
    const radius = <?= esc($data_karyawan['radius']) ?>;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, function(error) {
            Swal.fire('Gagal Mendapatkan Lokasi: ' + error.message);
        });
    } else {
        alert("Geolocation tidak support di browser ini.");
    }

    function showPosition(position) {
        const latUser = position.coords.latitude;
        const lonUser = position.coords.longitude;        
        
        document.getElementById("takeAbsen").disabled = false;

        const lokasiUser = L.latLng(latUser, lonUser);
        const lokasiKantor = L.latLng(kantorLatLng[0], kantorLatLng[1]);

        document.getElementById("lokasi").value = latUser + "," + lonUser;

        const map = L.map('map').setView([latUser, lonUser], 18);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([latUser, lonUser]).addTo(map)
            .bindPopup("Posisi Anda").openPopup();

        //radius lokasi
        const circle = L.circle(lokasiKantor, {
            color: 'red',
            fillColor: 'blue',
            fillOpacity: 0.5,
            radius: radius
        }).addTo(map);

        //posisi lokasi
        const LokasiIcon = L.icon({
            iconUrl: '<?= base_url('Assets/lokasi.png') ?>',
            iconSize: [38, 95],
            shadowSize: [50, 64],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -76]
        });

        L.marker(lokasiKantor, { icon: LokasiIcon })
            .addTo(map)
            .bindPopup("<?= esc($data_karyawan['nama_lokasi']) ?>")
            .openPopup();

        //validasi jarak user dan lokasi
        jarak = hitungJarak(latUser, lonUser, kantorLatLng[0], kantorLatLng[1]);
        document.getElementById("jarak").value = jarak;

        if (jarak > radius) {
            let timerInterval;
            Swal.fire({
                icon: 'error',
                title: 'Diluar Radius!',
                html: `Jarak Anda Dari Lokasi Absen Adalah ${jarak.toFixed(2)} Meter.
                        <br>Batas Absen: ${radius} Meter Dari Lokasi Absen!<br>
                        <br>Anda Akan Dialihkan Ke Halaman Dashboard Dalam <b></b> Detik.`,
                timer: 3000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector('b');
                    timerInterval = setInterval(() => {
                        timer.textContent = Math.ceil(Swal.getTimerLeft() / 1000); 
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "<?= site_url('/karyawan/home') ?>";
                }
            });
        
            document.getElementById("takeAbsen").disabled = true;
        }
    }

    $('#takeAbsen').click(function(e) {
        Webcam.snap(function(data_uri) {
            foto = data_uri;

            const lokasi = $('#lokasi').val();
            const jarak_masuk = $('#jarak').val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('karyawan/simpan-absen-masuk') ?>",
                data: {
                    foto: foto,
                    lokasi: lokasi,
                    jarak: jarak_masuk
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Terima Kasih Sudah Absen Hari Ini, Selamat Bekerja',
                        showConfirmButton: false,
                        footer: '<a class="btn btn-primary" href="<?= base_url('/karyawan/home') ?>">OK</a>'
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Info!',
                        text: xhr.responseText || 'Terjadi kesalahan saat menyimpan absen',
                    }).then(() => {
                        window.location.href = "<?= base_url('/karyawan/home') ?>";
                    });
                }
            });
        });
    });
</script>
