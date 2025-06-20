    <!-- App Bottom Menu -->
    <div class="appBottomMenu rounded"> 
        <a href="<?= base_url()?>karyawan/home" class="item <?= $menu == 'home' ? 'active' :''?>">
            <div class="col">
                <i class="fas fa-home fa-3x <?= $menu == 'home' ? '' :'text-light'?>"></i>
                <font size="3"><strong>Dashboard</strong></font>
            </div>
        </a>
        <a href="<?= base_url()?>karyawan/history-absen" class="item <?= $menu == 'history' ? 'active' :''?>">
            <div class="col">
                <i class="fas fa-history fa-3x <?= $menu == 'history' ? '' :'text-light'?> "></i>
                <font size="3"><strong>History</strong></font>
            </div>
        </a>
        <a href="<?= base_url()?>karyawan/presensi" class="item">
            <div class="col">
                <div class="action-button large text-dark">
                    <i class="fas fa-camera text-white fa-3x <?= $menu == 'presensi' ? 'text-light' :''?>"><font size="2"><strong>Absensi</strong></font></i>
                </div>
            </div>
        </a>
        <a href="<?= base_url()?>karyawan/master-data-izin" class="item <?= $menu == 'izin' ? 'active' :''?>">
            <div class="col">
                <i class="fas fa-calendar-check fa-3x <?= $menu == 'izin' ? '' :'text-light'?>"></i>
                <font size="3"><strong>Izin</strong></font>
            </div>
        </a>
        <a href="<?= base_url()?>karyawan/riwayat-pembayaran-gaji" class="item <?= $menu == 'riwayat-gaji' ? 'active' :''?>">
            <div class="col">
                <i class="fas fa-file-invoice-dollar fa-3x <?= $menu == 'riwayat-gaji' ? '' :'text-light'?>"></i>
                <font size="3"><strong>Payroll</strong></font>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->
         <!-- ///////////// Js Files ////////////////////  -->
    <!-- Bootstrap-->
    <script src="<?= base_url()?>Assets/Frontend/js/lib/popper.min.js"></script>
    <script src="<?= base_url()?>Assets/Frontend/js/lib/bootstrap.min.js"></script>
    <!-- Chart JS -->
    <script src="<?= base_url()?>Assets/Frontend/chart/dist/chart.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <!-- Owl Carousel -->
    <script src="<?= base_url()?>Assets/Frontend/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="<?= base_url()?>Assets/Frontend/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <!-- Base Js File -->
    <script src="<?= base_url()?>Assets/Frontend/js/base.js"></script>
     
    <!-- SweetAlert -->
    <script src="<?= base_url()?>Assets/Frontend/sweetalert2/sweetalert2.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="<?= base_url()?>Assets/Backend/dist/js/adminlte.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        }
    });
</script>

<script>
    $(function () {
        $('#table1').DataTable({
            "paging": true,
            // "scrollX": true,  
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
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
<?php if (session()->getFlashdata('top')) : ?>
<script type="text/javascript">
    $(document).ready(function () {
        Swal.fire({
          position: "top-end",
          icon: "info",
          title: "<?php echo $_SESSION['top']; ?>",
          showConfirmButton: false,
          timer: 3600
        })
    });
</script>
<?php endif; ?>
</body>

</html>