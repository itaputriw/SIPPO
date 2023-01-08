        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="d-sm-flex">
                    <a href="<?= base_url('peneliti/c_penelitian/statuspenelitian'); ?>" class="btn btn-md btn-circle btn-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    &nbsp;
                    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?></h1>
                </div>
            </div>
            <!-- <?php print_r($penelitian) ?> -->
            <div class="d-sm-flex  justify-content-between mb-0">
                <div class="col-lg-8 mb-4">
                    <!-- Illustrations -->
                    <div class="card border-bottom-primary shadow mb-4">
                        <div class="card-header py-3 bg-primary">
                            <h6 class="m-0 font-weight-bold text-white">Riwayat Penelitian</h6>
                        </div>
                        <div class="card-body">
                            <center>
                                <h6 class="m-0 font-weight-bold"><?= $penelitian['judul']; ?></h6>
                            </center>
                            <br>
                            <br>
                            <center>
                                <div class="form-group">
                                    <?php
                                    $i = 1;
                                    foreach ($riwayatstatus as $row) :
                                    ?>
                                        <p class="card-text mt-0"><?= $i++; ?>. <?= $row['nama_status'] ?>.<?= $row['tgl_status'] ?>.<?= $row['alasan'] ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </center>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->