<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <?php echo $error; ?> -->
    <!-- <?php print_r($pengaduan); ?> -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url('admin/c_pengaduan'); ?>" class="btn btn-md btn-circle btn-primary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h3 mb-4 text-gray-800"> Pengaduan</h1>
        </div>
    </div>
    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-12 mb-4">
            <div class="card border-bottom-primary shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white"> <?= $pengaduan[0]['judul']; ?></h6>
                </div>
                <?php
                foreach ($pengaduan as $row) :
                ?>
                    <div class="card-body">
                        <table class="col-lg-12 mb-4" style=" text-align:center">
                            <thead>
                                <tr>
                                    <th style="background-color: grey" colspan="2">
                                        <font color="black"><?= $row['waktu']; ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($row['is_admin'] == 0) { ?>
                                    <tr>
                                        <td width="30">
                                            <img class="mt-2" style="border-radius: 50%;" src="https://www.pixsy.com/wp-content/uploads/2021/04/ben-sweet-2LowviVHZ-E-unsplash-1.jpeg" width="70" height="70" />
                                            <h5> <?= $row['nama_peneliti']; ?></h5>
                                        </td>
                                        <td> <?= $row['komen']; ?></td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td> <?= $row['komen']; ?></td>
                                        <td width="30">
                                            <img class="mt-2" style="border-radius: 50%;" src="https://www.pixsy.com/wp-content/uploads/2021/04/ben-sweet-2LowviVHZ-E-unsplash-1.jpeg" width="70" height="70" />
                                            <h5>Ita Putri Widyaningsih</h5>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <tr>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                <?php endforeach; ?>
            </div>
            <?php if ($pengaduan[0]['status'] == "proses") { ?>
                <?= form_open_multipart('admin/c_pengaduan/tambahkomen'); ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Komen</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-3">
                            <input type="text" name="id_pengaduan" class="form-control" id="id_pengaduan" value="<?= $pengaduan[0]['id_pengaduan']; ?>" hidden>
                        </div>
                        <div class="form-group cols-sm-6">
                            <textarea name="komen" class="form-control" rows="7"></textarea>
                            <!-- <?= form_error('komen', '<small class="text-danger pl-3">', '</small>') ?> -->
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary"></input>
                            <input type="reset" value="Reset" class="btn btn-warning">
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                </form>
            <?php } else { ?>
            <?php }  ?>

        </div>
        <!-- /.container-fluid -->

    </div>
</div>
</div>
<!-- End of Main Content -->