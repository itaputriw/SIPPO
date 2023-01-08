<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <h1 class="h3 mt-2 text-gray-800"><?= $title; ?></h1> -->
    <?= $this->session->flashdata('pesan'); ?>

    <div class="d-sm-flex  justify-content-between mb-0 ml-5">
        <div class="col-lg-8 mb-4">
            <div class="card border-bottom-primary shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Form Edit Profil</h6>
                </div>
                <form action="<?= base_url('peneliti/c_peneliti/edit'); ?>" name="myForm" method="POST" onsubmit="return validateForm()">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <input type="text" name="id_peneliti" class="form-control" id="id_peneliti" value="<?= $getpeneliti['id_peneliti']; ?>" hidden>
                            </div>
                            <div class="form-group row">
                                <input type="text" name="id_user" class="form-control" id="id_user" value="<?= $getpeneliti['id_user']; ?>" hidden>
                            </div>
                            <div class="form-group"><label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_peneliti" name="nama_peneliti" value="<?= $getpeneliti['nama_peneliti']; ?>">
                                <?= form_error('nama_peneliti', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group"><label>Nomor Identitas</label>
                                <input type="text" class="form-control" id="no_identitas" name="no_identitas" value="<?= $getpeneliti['no_identitas']; ?>">
                                <?= form_error('no_identitas', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group"><label>Jenis Kelamin</label>

                                <div class="col-sm-12 d-flex">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="jk" id="jk" value="laki-laki" <?php if ($getpeneliti['jk'] == 'laki-laki') echo 'checked' ?>>
                                        <label class="form-check-label" for="jk">
                                            Laki-laki
                                        </label>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="jk" id="jk" value="perempuan" <?php if ($getpeneliti['jk'] == 'perempuan') echo 'checked' ?>>
                                        <label class="form-check-label" for="jk">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"><label>Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $getpeneliti['tgl_lahir']; ?>">
                                <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group"><label>Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $getpeneliti['no_hp']; ?>">
                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-group"><label>Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $getpeneliti['alamat']; ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <br>
                    </div>
            </div>

            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>
        </div>
    </div>
    </form>
</div>
</div>