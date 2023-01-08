<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <h1 class="h3 mt-2 text-gray-800"><?= $title; ?></h1> -->

    <div class="d-sm-flex  justify-content-between mb-0 ml-5">
        <div class="col-lg-8 mb-4">
            <div class="card border-bottom-primary shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Form Edit Template</h6>
                </div>
                <?= form_open_multipart('admin/c_template/edit/' . $template['id_template']); ?>
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="id_template" class="form-control" id="id_template" value="<?= $template['id_template']; ?>" hidden>
                        </div>
                        <div class="form-group"><label>Judul Kop</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $template['judul']; ?>">
                        </div>
                        <div class="form-group"><label>Instansi</label>
                            <input type="text" class="form-control" id="instansi" name="instansi" value="<?= $template['instansi']; ?>">
                        </div>
                        <div class="form-group"><label>Alamat Instansi</label>
                            <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi" value="<?= $template['alamat_instansi']; ?>">
                        </div>
                        <div class="form-group"><label>Email Instansi</label>
                            <input type="text" class="form-control" id="email_instansi" name="email_instansi" value="<?= $template['email_instansi']; ?>">
                        </div>
                        <div class="form-group"><label>Telepon</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $template['telp']; ?>">
                        </div>
                        <div class="form-group"><label>Fax</label>
                            <input type="text" class="form-control" id="fax" name="fax" value="<?= $template['fax']; ?>">
                        </div>
                        <div class="form-group"><label>Kodepos</label>
                            <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?= $template['kodepos']; ?>">
                        </div>
                        <div class="form-group"><label>Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo" accept=".png">
                            <input type="hidden" name="nm_logo" value="<?= $template['logo']; ?>">
                            <a href="<?= base_url('assets/img/' . $template['logo']); ?>" target="_blank"><?= $template['logo']; ?></a>
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