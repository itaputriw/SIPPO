<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <h1 class="h3 mt-2 text-gray-800"><?= $title; ?></h1> -->
    <?= $this->session->flashdata('pesan'); ?>

    <div class="d-sm-flex  justify-content-between mb-0 ml-5">
        <div class="col-lg-8 mb-4">
            <div class="card border-bottom-primary shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Form Tambah Data Pegawai</h6>
                </div>
                <form action="<?= base_url('admin/c_pegawai/action_tambah'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group"><label>Nama Lengkap</label>
                            <input type="text" class="form-control form-control-user" id="nama_pegawai" name="nama_pegawai">
                            <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group"><label>Nomor Induk Pegawai</label>
                            <input type="text" class="form-control form-control-user" id="nip" name="nip">
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group"><label>Jenis Kelamin</label>

                            <div class="col-sm-12 d-flex">
                                <div class="custom-control custom-radio">
                                    <input class="form-check-input" type="radio" name="jk" id="jk" value="laki-laki">
                                    <label class="form-check-label" for="jk">
                                        Laki-laki
                                    </label>
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="custom-control custom-radio">
                                    <input class="form-check-input" type="radio" name="jk" id="jk" value="perempuan">
                                    <label class="form-check-label" for="jk">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label>Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir">
                            <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group"><label>Nomor HP</label>
                            <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp">
                            <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group"><label>Alamat</label>
                            <input type="text" class="form-control form-control-user" id="alamat_pegawai" name="alamat_pegawai">
                            <?= form_error('alamat_pegawai', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group"><label>Email</label>
                            <input type="text" class="form-control form-control-user" id="email" name="email">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group"><label>Password</label>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label>Role</label>
                            <select name="role">
                                <option disabled selected>--Pilih Role--</option>
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r['id_role'] ?>"><?= $r['nama_role'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group"><label>Unit Kerja</label>
                            <select class="js-lokasi" name="unit">
                                <option disabled selected>--Pilih Unit Kerja--</option>
                                <?php foreach ($unit as $l) : ?>
                                    <option value="<?= $l['id_unit'] ?>"><?= $l['nama_unit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
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