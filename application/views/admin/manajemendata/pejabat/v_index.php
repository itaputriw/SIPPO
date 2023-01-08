<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Pejabat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pejabat</th>
                            <th>NIP</th>
                            <th>Pangkat</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pejabat as $row) :
                        ?>
                            <tr>
                                <td width="50">
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <?= $row['nama_pejabat']; ?>
                                </td>
                                <td>
                                    <?= $row['NIP']; ?>
                                </td>
                                <td>
                                    <?= $row['pangkat']; ?>
                                </td>
                                <td>
                                    <?= $row['golongan']; ?>
                                </td>
                                <td>
                                    <?= $row['jabatan']; ?>
                                </td>
                                <td width="250">
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#formU<?= $row['id_pejabat']; ?>"><i class="fas fa-edit"></i>Edit</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <?php $no = 0;
    foreach ($pejabat as $row) : $no++; ?>
        <div class="modal fade" id="formU<?= $row['id_pejabat']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="<?= base_url('admin/c_pejabat/edit/' . $row['id_pejabat']) ?>" name="myFormUpdate" method="POST" onsubmit="return validateFormUpdate()">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Ubah Data Pejabat</h5>
                            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="col-lg-12">
                            <br>
                            <div class="form-group">
                                <input type="hidden" name="id_pejabat" class="form-control" value="<?= $row['id_pejabat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama_pejabat">Nama Pejabat</label>
                                <input type="text" required class="form-control" id="nama_pejabat" name="nama_pejabat" value="<?= $row['nama_pejabat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="NIP">NIP</label>
                                <input type="text" required class="form-control" id="NIP" name="NIP" value="<?= $row['NIP']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pangkat">Pangkat</label>
                                <input type="text" required class="form-control" id="pangkat" name="pangkat" value="<?= $row['pangkat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="golongan">Golongan</label>
                                <input type="text" required class="form-control" id="golongan" name="golongan" value="<?= $row['golongan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" required class="form-control" id="jabatan" name="jabatan" value="<?= $row['jabatan']; ?>">
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
</div>