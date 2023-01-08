<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url('admin/c_pegawai'); ?>" class="btn btn-md btn-circle btn-primary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail Pegawai</h1>
        </div>
    </div>
    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-12 mb-4">
            <!-- buku -->
            <div class="card border-bottom-primary shadow mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3">
                        <img width="100%" style="border-radius: 10px;" src="<?= base_url('assets/img/profile/default.jpg'); ?>" class="circle" alt="">
                    </div>

                    <br>

                    <div class="col-lg-9">
                        <!-- ID Anggota -->
                        <div class="form-group"><label>Email</label>
                            <div class="h5 text-gray-800"><b><?= $pegawai['email']; ?></b></div>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Nama Lengkap -->
                        <div class="form-group"><label>Nama Lengkap</label>
                            <div class="h5 text-gray-800"><?= $pegawai['nama_pegawai']; ?></div>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Nama Lengkap -->
                        <div class="form-group"><label>Nomor Induk Pegawai</label>
                            <div class="h5 text-gray-800"><?= $pegawai['nip']; ?></div>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Jenis Kelamin -->
                        <div class="form-group"><label>Jenis Kelamin</label>
                            <div class="h5 text-gray-800"><?= $pegawai['jk']; ?></div>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- tgl Lahir -->
                        <div class="form-group"><label>Tanggal Lahir</label>
                            <div class="h5 text-gray-800"><?= $pegawai['tgl_lahir']; ?></div>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Alamat -->
                        <div class="form-group"><label>Alamat</label>
                            <div class="h5 text-gray-800"><?= $pegawai['alamat_pegawai']; ?></div>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- NoTelepon -->
                        <div class="form-group"><label>Nomor Telepon</label>
                            <div class="h5 text-gray-800"><?= $pegawai['no_hp']; ?></div>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- NoTelepon -->
                        <div class="form-group"><label>Unit Kerja</label>
                            <div class="h5 text-gray-800"><?= $pegawai['nama_unit']; ?></div>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">


                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->