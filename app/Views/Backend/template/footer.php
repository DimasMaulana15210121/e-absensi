  <footer class="main-footer">
      <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div> -->
    </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url()?>Assets/Backend/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url()?>Assets/Backend/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url()?>Assets/Backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url()?>Assets/Backend/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url()?>Assets/Backend/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url()?>Assets/Backend/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url()?>Assets/Backend/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url()?>Assets/Backend/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url()?>Assets/Backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="<?= base_url()?>Assets/Backend/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url()?>Assets/Backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url()?>Assets/Backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url()?>Assets/Backend/dist/js/adminlte.js"></script>
    <script src="<?= base_url()?>Assets/Backend/dist/js/sweetalert2.min.js"></script>
    <script>
      $(function () {
        $("#table1").DataTable({
          "responsive": true,
          "lengthChange": true,
          "autoWidth": WebTransportDatagramDuplexStream,
          "ordering": true,
          "paging": true,
          "info": true
        });

        $("#tableRekap").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#tableRekap_wrapper .col-md-6:eq(0)');
      });

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      });
      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'DD-MMMM-YYYY'
      });
    </script>
    <!-- Toggle Active -->
    <script>
      $(function () {
        bsCustomFileInput.init();
      });
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