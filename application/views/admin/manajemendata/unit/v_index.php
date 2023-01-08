<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Unit</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <a href="" data-toggle="modal" data-target="#form" class="btn btn-primary my-2"><i class="fas fa-plus"></i> Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Unit</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($unit as $row) :
                        ?>
                            <tr>
                                <td width="50">
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <?= $row['nama_unit']; ?>
                                </td>
                                <td>
                                    <?= $row['alamat']; ?>
                                </td>
                                <td>
                                    <?php if ($row['is_aktif_unit'] == 1) { ?>
                                        <a class="badge badge-pill badge-success float"> Aktif</a>
                                    <?php } else { ?>
                                        <a class="badge badge-pill badge-danger float"> Tidak Aktif</a>
                                    <?php } ?>
                                </td>
                                <td width="250">
                                    <?php if ($row['is_aktif_unit'] == 1) { ?>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#formU<?= $row['id_unit']; ?>"><i class="fas fa-edit"></i>Edit</button>
                                        <a href="<?= base_url('admin/c_unit/hapus/' . $row['id_unit']) ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#formU<?= $row['id_unit']; ?>" disabled><i class="fas fa-edit"></i>Edit</button>
                                        <button href="<?= base_url('admin/c_unit/hapus/' . $row['id_unit']) ?>" class="btn btn-sm btn-danger tombol-hapus" disabled><i class="fas fa-trash"></i> Hapus</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="<?php echo base_url('admin/c_unit/tambah') ?>" name="myForm" method="POST" onsubmit="return validateForm()">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Tambah Lokasi</h5>
                        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="col-lg-12">
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_unit" name="id_unit" hidden>
                        </div>
                        <div class="form-group">
                            <label for="nama_lokasi">Nama Lokasi</label>
                            <input type="text" required class="form-control" id="nama_unit" name="nama_unit">
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select class="js-lokasi" class="form-control" name="provinsi" id="provinsi" required>
                                <option value="">--Pilih Provinsi--</option>
                                <?php foreach ($provinsi as $p) : ?>
                                    <option value="<?= $p['id_provinsi'] ?>"><?= $p['nama_provinsi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kabupaten</label>
                            <select class="js-lokasi" class="form-control" name="kabupaten" id="kabupaten" required>
                                <option>--Pilih Kabupaten--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select class="js-lokasi" class="form-control" name="kecamatan" id="kecamatan" required>
                                <option>--Pilih Kecamatan--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelurahan</label>
                            <select class="js-lokasi" class="form-control" name="kelurahan" id="kelurahan" required>
                                <option>--Pilih Kelurahan--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <input type="text" required class="form-control" id="alamat" name="alamat">
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
    foreach ($unit as $row) : $no++; ?>
        <div class="modal fade" id="formU<?= $row['id_unit']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="<?= base_url('admin/c_unit/edit/' . $row['id_unit']) ?>" name="myFormUpdate" method="POST" onsubmit="return validateFormUpdate()">
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
                                <input type="hidden" name="id_unit" class="form-control" value="<?= $row['id_unit']; ?>">
                            </div>
                            <div class="form-group"><label>Nama Lokasi</label>
                                <input class="form-control" required name="nama_unit" id="nama_unit" type="text" value="<?= $row['nama_unit']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <div class="col-sm-10">
                                    <select class="js-lokasi" name="provinsi">
                                        <option disabled selected>--Pilih Provinsi--</option>
                                        <?php foreach ($provinsi as $p) : ?>
                                            <option value="<?= $p['id_provinsi']  ?>" <?= $p['id_provinsi']  == $row['id_provinsi'] ? 'selected' : '' ?>>
                                                <?= $p['nama_provinsi'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten</label>
                                <div class="col-sm-10">
                                    <select class="js-lokasi" name="kabupaten">
                                        <option disabled selected>--Pilih Kabupaten--</option>
                                        <?php foreach ($kabupaten as $k) : ?>
                                            <option value="<?= $k['id_kabupaten']  ?>" <?= $k['id_kabupaten']  == $row['id_kabupaten'] ? 'selected' : '' ?>>
                                                <?= $k['nama_kabupaten'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select class="js-lokasi" name="kecamatan">
                                        <option disabled selected>--Pilih Kecamatan--</option>
                                        <?php foreach ($kecamatan as $kc) : ?>
                                            <option value="<?= $kc['id_kecamatan']  ?>" <?= $kc['id_kecamatan']  == $row['id_kecamatan'] ? 'selected' : '' ?>>
                                                <?= $kc['nama_kecamatan'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label>Alamat Lengkap</label>
                                <input class="form-control" name="alamat" id="alamat" value="<?= $row['alamat']; ?>"></input>
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