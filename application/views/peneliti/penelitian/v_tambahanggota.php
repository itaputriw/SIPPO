<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<div class="container">

    <div class="col-lg-7 my-5 mx-auto">
        <!-- Illustrations -->
        <div class="card border-bottom-primary shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Form Anggota</h6>
            </div>
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Anggota Penelitian</h1>
                            </div>
                            <form method="post" action="<?= base_url('peneliti/c_penelitian/tambahanggota/' . $id) ?>">
                                <div class="form-group row">
                                    <input type="text" name="id_penelitian" class="form-control" id="id_penelitian" value="<?= $penelitian['id_penelitian'] ?>" hidden>
                                </div>
                                <div class="form-group row">
                                    <label>Pilih Anggota</label>
                                    <div class="col md-8">
                                        <select class="peneliti" name="peneliti[]" multiple="multiple">
                                            <?php foreach ($peneliti as $p) : ?>
                                                <option value="<?= $p['id_peneliti'] ?>"><?= $p['no_identitas'] ?> - <?= $p['nama_peneliti'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                </br>
                                </br>
                                <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                                    <span class="text text-white">Submit</span>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>