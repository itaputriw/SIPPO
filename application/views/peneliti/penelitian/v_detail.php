        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="d-sm-flex">
                    <a href="<?= base_url('peneliti/c_penelitian/datapenelitian'); ?>" class="btn btn-md btn-circle btn-primary">
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
                            <h6 class="m-0 font-weight-bold text-white">Data Penelitian</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="form-group"><label>Kategori Penelitian</label>
                                    <input class="form-control" type="text" value="<?= $penelitian['kategori_penelitian'] ?>" readonly>
                                </div>
                            </div>
                            <div class="d-sm-flex align-items-center justify-content-between mb-0">
                                <div class="col-lg-6">
                                    <div class="form-group"><label>Nomor Pengajuan</label>
                                        <input class="form-control" type="text" value="<?= $penelitian['nomor_surat'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><label>Tanggal Pengajuan</label>
                                        <input class="form-control" type="text" value="<?= $penelitian['tgl_diajukan'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group"><label>Ketua Penelitian</label>
                                    <input class="form-control" type="text" value="<?= $kpenelitian['nama_peneliti'] ?>" readonly>
                                </div>

                                <div class="form-group"><label>Lokasi</label>
                                    <input class="form-control" type="text" value="<?php if ($penelitian['nama_unit'] != null) { ?><?= $penelitian['nama_unit'] ?><?php } else { ?><?= $penelitian['lokasi_lain'] ?><?php } ?>" readonly>
                                </div>
                                <div class="form-group"><label>Keperluan</label>
                                    <textarea class="form-control" type="text" readonly><?= $penelitian['keperluan'] ?></textarea>
                                </div>
                                <div class="form-group"><label>Lembaga</label>
                                    <input class="form-control" type="text" value="<?= $penelitian['lembaga'] ?>" readonly>
                                </div>
                                <div class="form-group"><label>Jurusan</label>
                                    <input class="form-control" type="text" value="<?= $penelitian['jurusan'] ?>" readonly>
                                </div>
                                <div class="form-group"><label>Alamat Lembaga</label>
                                    <input class="form-control" type="text" value="<?= $penelitian['alamat_lembaga'] ?>" readonly>
                                </div>
                                <div class="form-group"><label>Judul</label>
                                    <input class="form-control" type="text" value="<?= $penelitian['judul'] ?>" readonly>
                                </div>
                                <div class="form-group"><label>Tujuan</label>
                                    <input class="form-control" type="text" value="<?= $penelitian['tujuan'] ?>" readonly>
                                </div>

                                <div class="form-group"><label>Data Primer</label>
                                    <textarea readonly class="form-control" type="text"> <?= $penelitian['data_primer'] ?></textarea>
                                </div>
                                <div class="form-group"><label>Data Sekunder</label>
                                    <textarea readonly class="form-control" type="text"><?= $penelitian['data_sekunder'] ?></textarea>
                                </div>
                            </div>
                            <?php if ($penelitian['kategori_penelitian'] == 'penelitian') { ?>
                                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                                    <div class="col-lg-6">
                                        <div class="form-group"><label>Waktu Mulai</label>
                                            <input class="form-control" type="text" value="<?= $penelitian['waktu_mulai'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group"><label>Waktu Selesai</label>
                                            <input class="form-control" type="text" value="<?= $penelitian['waktu_selesai'] ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                            <?php } ?>
                            <br>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 mb-4">
                    <!-- Illustrations -->
                    <div class="card border-bottom-primary shadow mb-4">
                        <div class="card-header py-3 bg-primary">
                            <h6 class="m-0 font-weight-bold text-white">File</h6>
                        </div>
                        <div class="card-body">
                            <div class="card bg-warning text-white shadow">
                                <div class="card-body">
                                    Format
                                    <div class="text-white-45 small">.pdf</div>
                                </div>
                            </div>
                            <br>
                            <center>
                                <?php if ($penelitian['kategori_penelitian'] == 'penelitian') { ?>
                                    <div class="form-group">
                                        <p class="card-text mt-0">File Bapeda : <?php if ($penelitian['file_bapeda'] == null) { ?>
                                                -
                                            <?php } else { ?>
                                                <a href="<?= base_url('uploads/file_penelitian/' . $penelitian['file_bapeda']); ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            <?php } ?>
                                        </p>
                                    </div>
                                <?php } else { ?>
                                <?php } ?>
                                <div class="form-group">
                                    <p class="card-text mt-0"> File Lembaga : <a href="<?= base_url('uploads/file_penelitian/' . $penelitian['file_lembaga']); ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a></p>
                                </div>
                            </center>
                            <br>
                        </div>
                    </div>

                    <div class="card border-bottom-primary shadow mb-4">
                        <div class="card-header py-3 bg-primary">
                            <h6 class="m-0 font-weight-bold text-white">Anggota Penelitian</h6>
                        </div>
                        <div class="card-body">
                            <br>
                            <center>
                                <div class="form-group">
                                    <?php
                                    $i = 1;
                                    foreach ($anggotapenelitian as $row) :
                                    ?>
                                        <p class="card-text mt-0"><?= $i++; ?>. <?= $row['nama_peneliti'] ?></p>
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