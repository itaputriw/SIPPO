<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori Hasil</h6>
        </div>

        <div class="card-body">
            <a href="" data-toggle="modal" data-target="#form" class="btn btn-primary my-2"><i class="fas fa-plus"></i> Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori Hasil</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($kategorihasil as $row) :
                        ?>
                            <tr>
                                <td width="50">
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <?= $row['nama_kategori_hasil']; ?>
                                </td>
                                <td>
                                    <?php if ($row['keterangan'] == '') : ?>
                                        <i> (Tidak diisi) </i>
                                    <?php else : ?>
                                        <?= $row['keterangan']; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($row['is_aktif_hasil'] == 1) { ?>
                                        <a class="badge badge-pill badge-success float"> Aktif</a>
                                    <?php } else { ?>
                                        <a class="badge badge-pill badge-danger float"> Tidak Aktif</a>
                                    <?php } ?>
                                </td>
                                <td width="250">
                                    <!-- <a href="<?= base_url('admin/c_kategorihasil/edit/' . $row['id_kategori_hasil']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a> -->
                                    <?php if ($row['is_aktif_hasil'] == 1) { ?>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#formU<?= $row['id_kategori_hasil']; ?>"><i class="fas fa-edit"></i>Edit</button>
                                        <a href="<?= base_url('admin/c_kategorihasil/hapus/' . $row['id_kategori_hasil']) ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#formU<?= $row['id_kategori_hasil']; ?>" disabled><i class="fas fa-edit"></i>Edit</button>
                                        <button href="<?= base_url('admin/c_kategorihasil/hapus/' . $row['id_kategori_hasil']) ?>" class="btn btn-sm btn-danger tombol-hapus" disabled><i class="fas fa-trash"></i> Hapus</button>
                                    <?php } ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?php echo base_url('admin/c_kategorihasil/tambah') ?>" name="myForm" method="POST" onsubmit="return validateForm()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Tambah Kategori</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" id="id_kategori_hasil" name="id_kategori_hasil" hidden>
                    </div>
                    <div class="form-group">
                        <label for="nama_kategori_hasil">Nama Kategori Hasil</label>
                        <input type="text" required class="form-control" id="nama_kategori_hasil" name="nama_kategori_hasil">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text text-white">Simpan Data</span>
                    </button>
                    <button type="button" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
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

<?php $no = 0;
foreach ($kategorihasil as $row) : $no++; ?>
    <div class="modal fade" id="formU<?= $row['id_kategori_hasil']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="<?= base_url('admin/c_kategorihasil/edit/' . $row['id_kategori_hasil']) ?>" name="myFormUpdate" method="POST" onsubmit="return validateFormUpdate()">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Ubah Kategori Hasil</h5>
                        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-lg-12">
                        <br>
                        <div class="form-group">
                            <input type="hidden" name="id_kategori_hasil" class="form-control" value="<?= $row['id_kategori_hasil']; ?>">
                        </div>
                        <div class="form-group"><label>Nama Kategori Hasil</label>
                            <input class="form-control" required name="nama_kategori_hasil" id="nama_kategori_hasil" type="text" value="<?= $row['nama_kategori_hasil']; ?>">
                        </div>
                        <div class="form-group"><label>Keterangan</label>
                            <input class="form-control" name="keterangan" id="keterangan" type="text" value="<?= $row['keterangan']; ?>">
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