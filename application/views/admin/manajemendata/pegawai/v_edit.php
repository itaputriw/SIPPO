<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <h1 class="h3 mt-2 text-gray-800"><?= $title; ?></h1> -->

    <div class="d-sm-flex  justify-content-between mb-0 ml-5">
        <div class="col-lg-8 mb-4">
            <div class="card border-bottom-primary shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Form Edit Pegawai</h6>
                </div>
                <?= form_open_multipart('admin/c_pegawai/edit/' . $pegawai['id_pegawai']); ?>
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="id_pegawai" class="form-control" id="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" name="id_user" class="form-control" id="id_user" value="<?= $pegawai['id_user']; ?>" hidden>
                        </div>
                        <div class="form-group"><label>Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $pegawai['email']; ?>" readonly>
                        </div>
                        <div class="form-group"><label>Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $pegawai['nama_pegawai']; ?>">
                        </div>
                        <div class="form-group"><label>Nomor Induk Pegawai</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="<?= $pegawai['nip']; ?>">
                        </div>
                        <div class="form-group"><label>Jenis Kelamin</label>

                            <div class="col-sm-12 d-flex">
                                <div class="custom-control custom-radio">
                                    <input class="form-check-input" type="radio" name="jk" id="jk" value="laki-laki" <?php if ($pegawai['jk'] == 'laki-laki') echo 'checked' ?>>
                                    <label class="form-check-label" for="jk">
                                        Laki-laki
                                    </label>
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="custom-control custom-radio">
                                    <input class="form-check-input" type="radio" name="jk" id="jk" value="perempuan" value="perempuan" <?php if ($pegawai['jk'] == 'perempuan') echo 'checked' ?>>
                                    <label class="form-check-label" for="jk">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label>Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $pegawai['tgl_lahir']; ?>">
                        </div>
                        <div class="form-group"><label>Nomor HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $pegawai['no_hp']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group"><label>Alamat</label>
                            <input type="text" class="form-control" id="alamat_pegawai" name="alamat_pegawai" value="<?= $pegawai['alamat_pegawai']; ?>">
                        </div>
                    </div>
                    <br>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Ubah</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>
        </div>
    </div>
    </form>
</div>
</div>