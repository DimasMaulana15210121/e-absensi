    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" id="keluar-back" onclick="back()" class="headerButton goBack">
                <i class="fas fa-arrow-left fa-2x"></i>
            </a>
        </div>
        <div class="pageTitle"><?= $judul ?></div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

<div class="row" style="margin-top: 70px;">
    <div class="col">
        <style>
            .my_camera,
            .my_camera video{
                display: inline-block;
                width: 100% !important;
                margin: auto;
                height: auto !important;
                border-radius: 15px;
            }
        </style>
        <div class="my_camera"></div>
        <button class="btn btn-danger btn-block" id="takeAbsen"><i class="fas fa-camera mr-1"></i>Absen Keluar</button>
        <input type="hidden" name="lokasi" id="lokasi">
        <div id="map" style="width: 100%; height: 400px;"></div>
    </div>
</div>

<script>
    Webcam.set({
        width: 420,
        height: 340,
        image_format: 'jpeg',
        jpeg_quality: 90,
    });

    Webcam.attach( '.my_camera' );
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        // Jika browser nya tidak support geolocation
            alert("Geolocation tidak support di browser ini.");
    }

    function toRad(x) {
        return x * Math.PI / 180;
    }

    // Fungsi menghitung jarak Haversine dalam meter
    function haversineDistance(lat1, lon1, lat2, lon2) {
        var R = 6371000; // Radius bumi dalam meter
        var dLat = toRad(lat2 - lat1);
        var dLon = toRad(lon2 - lon1);
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        return R * c;
    }
    
    function showPosition(position) {
        var x = document.getElementById("lokasi");
        x.value = position.coords.latitude + "," + position.coords.longitude;
        var lokasiUser = L.latLng(position.coords.latitude, position.coords.longitude);
        //Menampilkan map dan posisi karyawan
        var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 16);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([position.coords.latitude, position.coords.longitude]).addTo(map)
        //radius lokasi
        var circle = L.circle([<?= $data_karyawan['lokasi']; ?>], {
            color: 'red',
            fillColor: 'blue',
            fillOpacity: 0.5,
            radius: <?= $data_karyawan['radius']; ?> //radius meter
        }).addTo(map)
        //posisi lokasi
        var LokasiIcon = L.icon({
            iconUrl: '<?= base_url('Assets/lokasi.png') ?>',
            iconSize:     [38, 95], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        L.marker([<?= $data_karyawan['lokasi'] ?>], {
            icon: LokasiIcon
        }).addTo(map)
        .bindPopup("Lokasi Absen !")
        .openPopup();

        //validasi jarak user dan lokasi
        var distance = lokasiUser.distanceTo(circle.getLatLng());
        if (distance > circle.getRadius()) {
            Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Jarak Anda Terlalu Jauh, Anda Harus Berada Dalam <?= $data_karyawan['radius'] ?> Meter Dari Lokasi !!',
                    showConfirmButton: false,
                    footer: '<a class="btn btn-primary" href="<?= base_url('/karyawan/home') ?>">OK</a>'
                })
            document.getElementsByTagName("button")[0].disabled = true;
        } 
    }

    $('#takeAbsen').click(function (e) { 
        Webcam.snap( function(data_uri) {
            foto = data_uri;
        });
        var lokasi = $('#lokasi').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('karyawan/simpan-absen-pulang') ?>",
            data: {
                foto: foto,
                lokasi: lokasi,
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Terima Kasih, Hati-Hati Dijalan !',
                    showConfirmButton: false,
                    footer: '<a class="btn btn-primary" href="<?= base_url('/karyawan/home') ?>">OK</a>'
                })
            },
            error: function (xhr, status, error) {
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
</script>

<script>
    // document.getElementById("profile-back").addEventListener("click", function(event) {
    //     event.preventDefault(); // mencegah <a href="#"> melakukan reload halaman
    //     history.back(); // atau bisa juga pakai history.go(-1);
    // });
    var keluar = document.getElementById("keluar-back");

    function back(){
        keluar = history.go(-1);
    }
</script>