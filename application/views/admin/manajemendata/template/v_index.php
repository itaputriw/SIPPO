<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <form action="" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Template</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col" width="50">No</th>
                                <th scope="col">Instansi</th>
                                <th scope="col">Email Instansi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($template as $elements) :
                        ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $elements['instansi']; ?></td>
                                    <td><?= $elements['email_instansi']; ?></td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailModal<?= $elements['id_template']; ?>"><i class="fas fa-search"></i> Detail</a>
                                        <a type="button" class="btn btn-sm btn-warning" href="<?= site_url('admin/c_template/edit/' . $elements['id_template']); ?>"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <?php $no = 0;
    foreach ($template as $elements) : $no++; ?>
        <div class="modal fade" id="detailModal<?= $elements['id_template']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white font-weight-bold" id="newModalLabel">Detail Template</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_template" name="id_template" value="<?= $elements['id_template'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Judul Kop</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $elements['judul'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Instansi</label>
                            <input type="text" class="form-control" id="instansi" name="instansi" value="<?= $elements['instansi'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Alamat Instansi</label>
                            <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi" value="<?= $elements['alamat_instansi'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email Instansi</label>
                            <input type="text" class="form-control" id="email_instansi" name="email_instansi" value="<?= $elements['email_instansi'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $elements['telp'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Fax</label>
                            <input type="text" class="form-control" id="fax" name="fax" value="<?= $elements['fax'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kodepos</label>
                            <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?= $elements['kodepos'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            </br>
                            <img src="<?= base_url('assets/img/' . $elements['logo']); ?>">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->