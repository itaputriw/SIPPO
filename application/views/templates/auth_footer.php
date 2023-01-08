  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
  <script scr="<?= base_url('assets/'); ?>dist/sweetalert2.all.min.js"></script>
  <!-- <script scr="<?= base_url('assets/'); ?>dist/sweetalert2.min.js"></script> -->
  <script scr="<?= base_url('assets/'); ?>dist/myscript.js"> </script>


  </body>

  </html>

  <script>
    const flashData = $('.flash-data1').data('flashdata');
    // console.log(flashData);
    if (flashData) {
      Swal.fire({
        title: 'Terjadi Kesalahan',
        text: flashData,
        icon: 'error'
      });
    }
  </script>

  <script>
    const flashData1 = $('.flash-data').data('flashdata');
    // console.log(flashData);
    if (flashData1) {
      Swal.fire({
        title: 'Selamat',
        text: flashData1,
        icon: 'success'
      });
    }
  </script>