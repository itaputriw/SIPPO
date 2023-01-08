            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dinas Kesehatan Surakarta <?= date('Y'); ?> </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

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
            <script scr="<?= base_url('assets/'); ?>select2/js/select2.min.js"></script>

            <!-- sweetalert -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
            <script scr="<?= base_url('assets/'); ?>dist/sweetalert2.all.min.js"></script>
            <!-- <script scr="<?= base_url('assets/'); ?>dist/sweetalert2.min.js"></script> -->
            <script scr="<?= base_url('assets/'); ?>dist/myscript.js"> </script>

            <!-- select2 -->
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



            <script src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.dataTable').DataTable();
                });
            </script>

            <script>
                $(document).ready(function() {
                    $('.peneliti').select2({
                        placeholder: "--Pilih Anggota--",
                    });
                });
            </script>

            <script>
                $(document).ready(function() {
                    $('.js-lokasi').select2({
                        placeholder: "--Pilih Lokasi--",
                    });
                });
            </script>

            <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
            <script>
                Pusher.logToConsole = true;

                var pusher = new Pusher('89ef41ddad13dfe8a398', {
                    cluster: 'ap1'
                });

                var channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(data) {
                    // alert(JSON.stringify(data));
                    xhr = $.ajax({
                        method: "POST",
                        url: "<?= base_url('c_notifikasi/list_notifikasi') ?>",
                        success: function(response) {
                            $('.list_notifikasi').html(response);
                        }
                    })
                });
            </script>
            <script>
                $('.tombol-hapus').on('click', function(e) {

                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Apakah anda yakin',
                        text: "akan menghapus data ini ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus Data'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                            Swal.fire(
                                'Dihapus!',
                                'Data berhasil dihapus',
                                'success'
                            )
                        }
                    })

                });
            </script>

            <script>
                const flashData = $('.flash-data').data('flashdata');
                if (flashData) {
                    Swal.fire({
                        title: 'Selamat',
                        text: flashData,
                        icon: 'success'
                    });
                }
            </script>

            <script>
                const flashData1 = $('.flash-data1').data('flashdata');
                // console.log(flashData);
                if (flashData1) {
                    Swal.fire({
                        title: 'Terjadi Kesalahan',
                        text: flashData1,
                        icon: 'error'
                    });
                }
            </script>

            <script>
                $('.tombol-terima').on('click', function(e) {

                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Apakah anda yakin',
                        text: "akan menyetujui pengajuan ini ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Setujui'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                            Swal.fire(
                                'Diverifikasi!',
                                'Pengajuan berhasil di verifikasi',
                                'success'
                            )
                        }
                    })

                });
            </script>

            <script>
                $('.tombol-tolak').on('click', function(e) {

                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Apakah anda yakin',
                        text: "akan menolak pengajuan ini ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Tolak'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                            Swal.fire(
                                'Berhasil',
                                'Pengajuan ditolak',
                                'danger'
                            )
                        }
                    })

                });
            </script>

            <script>
                $('.tombol-terima-hasil').on('click', function(e) {

                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Apakah anda yakin',
                        text: "akan memverifikasi hasil penelitian ini ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Setujui'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                            Swal.fire(
                                'Diverifikasi!',
                                'Hasil penelitian berhasil di verifikasi',
                                'success'
                            )
                        }
                    })

                });
            </script>

            <script>
                $('.tombol-perbaikan-hasil').on('click', function(e) {

                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Apakah anda yakin',
                        text: "hasil penelitian ini perlu perbaikan ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Perbaikan'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                            Swal.fire(
                                'Hasil Penelitian',
                                'Perlu perbaikan',
                                'danger'
                            )
                        }
                    })

                });
            </script>

            <script>
                $('.tombol-selesai').on('click', function(e) {

                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Apakah anda yakin',
                        text: "akan menutup percakapan ini ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Tutup'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                            Swal.fire(
                                'Berhasil!',
                                'Percakapan ditutup',
                                'success'
                            )
                        }
                    })

                });
            </script>

            <script>
                $('.tombol-tandai-selesai').on('click', function(e) {

                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Apakah anda yakin',
                        text: "data dan informasi telah diberikan ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sudah'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                            Swal.fire(
                                'Diverifikasi!',
                                'Data dan Informasi telah diberikan',
                                'success'
                            )
                        }
                    })


                });
            </script>

            <script>
                $('.tombol-non-aktif').on('click', function(e) {

                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Apakah anda yakin',
                        text: "akan menonaktifkan data ini ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                            Swal.fire(
                                'Non Aktif!',
                                'Data berhasil dinonaktifkan',
                                'success'
                            )
                        }
                    })

                });
            </script>

            <script type="text/javascript">
                $(document).ready(function(e) {
                    $("#kategori_penelitian").change(function() {
                        var type = $("#kategori_penelitian").val();

                        if (type == 'penelitian') {
                            $('#form').show();
                            $('#form_2').show();
                            $('#keperluan').show();
                            $('#lembaga').show();
                            $('#jurusan').show();
                            $('#alamat_lembaga').show();
                            $('#judul').show();
                            $('#tujuan').show();
                            $('#data_primer').show();
                            $('#data_sekunder').show();
                            $('#unit').show();
                            $('#waktu_mulai').show();
                            $('#waktu_selesai').show();
                            $('#file_bapeda').show();
                            $('#file_lembaga').show();
                        } else if (type == 'data dan informasi kesehatan') {
                            $('#form').show();
                            $('#form_2').show();
                            $('#keperluan').show();
                            $('#lembaga').show();
                            $('#jurusan').show();
                            $('#alamat_lembaga').show();
                            $('#judul').show();
                            $('#tujuan').show();
                            $('#data_primer').show();
                            $('#data_sekunder').show();
                            $('#unit').show();
                            $('#waktu_mulai').hide();
                            $('#waktu_selesai').hide();
                            $('#file_bapeda').hide();
                            $('#file_lembaga').show();
                        } else {
                            $('#form').hide();
                            $('#form_2').hide();
                        }
                    });

                });
            </script>

            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });

                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');


                    $.ajax({
                        url: "<?= base_url('admin/c_role/ubahakses'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/c_role/roleakses/'); ?>" + roleId; //redirect
                        }
                    });
                });
            </script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#provinsi').change(function() {
                        var id = $(this).val();
                        $.ajax({
                            url: "<?php echo site_url('admin/c_unit/get_kabupaten'); ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                var html = '';
                                var i;
                                for (i = 0; i < data.length; i++) {
                                    html += '<option value=' + data[i].id_kabupaten + '>' + data[i].nama_kabupaten + '</option>';
                                }
                                $('#kabupaten').html(html);
                            }
                        });
                        return false;
                    });
                });
            </script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#kabupaten').change(function() {
                        var id = $(this).val();
                        $.ajax({
                            url: "<?php echo site_url('admin/c_unit/get_kecamatan'); ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                var html = '';
                                var i;
                                for (i = 0; i < data.length; i++) {
                                    html += '<option value=' + data[i].id_kecamatan + '>' + data[i].nama_kecamatan + '</option>';
                                }
                                $('#kecamatan').html(html);
                            }
                        });
                        return false;
                    });
                });
            </script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#kecamatan').change(function() {
                        var id = $(this).val();
                        $.ajax({
                            url: "<?php echo site_url('admin/c_unit/get_kelurahan'); ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                var html = '';
                                var i;
                                for (i = 0; i < data.length; i++) {
                                    html += '<option value=' + data[i].id_kelurahan + '>' + data[i].nama_kelurahan + '</option>';
                                }
                                $('#kelurahan').html(html);
                            }
                        });
                        return false;
                    });
                });
            </script>
            </body>

            </html>