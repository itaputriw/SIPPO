<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Pendaftaran Akun</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url("auth/registration"); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_peneliti" name="nama_peneliti" placeholder="Nama Lengkap" value="<?= set_value('nama_peneliti'); ?>">
                                <?= form_error('nama_peneliti', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="no_identitas" name="no_identitas" placeholder="Nomor Identitas" value="<?= set_value('no_identitas'); ?>">
                                <?= form_error('no_identitas', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <hr>
                            <h6 class="ml-3">Jenis Kelamin</h6>
                            <div class="form-check ml-3 font-weight-lighter">
                                <input class="form-check-input" type="radio" name="jk" id="jk" value="laki-laki">
                                <label class="form-check-label" for="jk">
                                    Laki-laki
                                </label>
                                </br>
                                <input class="form-check-input" type="radio" name="jk" id="jk" value="perempuan">
                                <label class="form-check-label" for="jk">
                                    Perempuan
                                </label>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h6 class="ml-3">Tanggal Lahir</h6>
                                <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= set_value('tgl_lahir'); ?>">
                                <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Nomor HP" value="<?= set_value('no_hp'); ?>">
                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Akun
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Sudah Punya Akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>