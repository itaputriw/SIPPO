<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">URL</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Aktif</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td>
                                    <?= $m['nama_menu']; ?>
                                </td>
                                <td>
                                    <?= $m['url']; ?>
                                </td>
                                <td>
                                    <?= $m['icon']; ?>
                                </td>
                                <td>
                                    <?= $m['is_aktif_menu']; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#formU<?= $m['id_menu']; ?>"><i class="fas fa-edit"></i>Edit</button>
                                    <button href="<?= base_url('admin/c_unit/hapus/' . $m['id_menu']) ?>" class="btn btn-sm btn-danger tombol-hapus" disabled><i class="fas fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <?php $no = 0;
    foreach ($menu as $row) : $no++; ?>
        <div class="modal fade" id="formU<?= $row['id_menu']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="<?= base_url('admin/c_menu/edit/' . $row['id_menu']) ?>" name="myFormUpdate" method="POST" onsubmit="return validateFormUpdate()">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Ubah Lokasi</h5>
                            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="col-lg-12">
                            <br>
                            <div class="form-group">
                                <input type="hidden" name="id_menu" class="form-control" value="<?= $row['id_menu']; ?>">
                            </div>
                            <div class="form-group"><label>Nama Menu</label>
                                <input class="form-control" required name="nama_menu" id="nama_menu" type="text" value="<?= $row['nama_menu']; ?>">
                            </div>
                            <div class="form-group"><label>URL</label>
                                <input class="form-control" name="url" id="url" value="<?= $row['url']; ?>"></input>
                            </div>
                            <div class="form-group"><label>Icon</label>
                                <input class="form-control" name="icon" id="icon" value="<?= $row['icon']; ?>"></input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text text-white">Simpan Perubahan</span>
                            </button>
                            <button type="button" class="btn btn-danger btn-icon-split" data-dismiss="modal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-times"></i>
                                </span>
                                <span class="text text-white">Batal</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->>