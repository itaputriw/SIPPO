<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<div class="container-fluid">
    <?= form_open_multipart('peneliti/c_penelitian'); ?>
    <div class="col-lg-8 mb-4">
        <div class="card border-bottom-primary shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Pilih Kategori</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <input type="text" name="id_peneliti" id="id_peneliti" class="form-control" value="<?= $peneliti['id_peneliti']; ?>" hidden>
                </div>
                <div class="form-group">
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" value="<?= $nomorsurat; ?>" hidden>
                </div>
                <div class="form-group"><label>Kategori Penelitian</label>
                    <select name="kategori_penelitian" id="kategori_penelitian" class="form-control">
                        <option disabled selected>--Pilih Kategori Penelitian--</option>
                        <option value="penelitian">Penelitian</option>
                        <option value="data dan informasi kesehatan">Data dan Informasi Kesehatan</option>
                    </select>
                    <?= form_error('kategori_penelitian', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
        </div>
    </div>

    <!-- KATEGORI PENELITIAN -->
    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-8 mb-4">
            <div class="card border-bottom-primary shadow mb-4" id="form" style="display:none;">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Form Penelitian</h6>
                </div>
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="form-group" id="keperluan" style="display:none;"><label>Keperluan</label>
                            <textarea type="text" class="form-control" name="keperluan"></textarea>
                        </div>
                        <div class="form-group" id="lembaga"><label>Lembaga</label>
                            <input type="text" class="form-control" name="lembaga">
                        </div>
                        <div class="form-group" style="display:none;" id="jurusan"><label>Jurusan</label>
                            <input type="text" class="form-control" name="jurusan">
                        </div>
                        <div class="form-group" style="display:none;" id="alamat_lembaga"><label>Alamat Lembaga</label>
                            <input type="text" class="form-control" name="alamat_lembaga">
                        </div>
                        <div class="form-group" style="display:none;" id="judul"><label>Judul</label>
                            <input type="text" class="form-control" name="judul">
                        </div>
                        <div class="form-group" style="display:none;" id="tujuan"><label>Tujuan</label>
                            <input type="text" class="form-control" name="tujuan">
                        </div>
                        <div class="form-group" style="display:none;" id="data_primer"><label>Data Primer</label>
                            <textarea type="text" class="form-control" name="data_primer"></textarea>
                            <i class="fas fa-fw fa-exclamation-circle"></i>
                            <font color="red">Data dari peneliti : quesioner atau gform</font>
                        </div>
                        <div class="form-group" style="display:none;" id="data_sekunder"><label>Data Sekunder</label>
                            <textarea type="text" class="form-control" name="data_sekunder"></textarea>
                            <i class="fas fa-fw fa-exclamation-circle"></i>
                            <font color="red">Data yang diminta</font>
                        </div>
                        <div class="form-group" style="display:none;" id="unit"><label>Lokasi</label>
                            <select class="js-lokasi" name="unit">
                                <option disabled selected>--Pilih Lokasi--</option>
                                <?php foreach ($unit as $l) : ?>
                                    <option value="<?= $l['id_unit'] ?>"><?= $l['nama_unit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group"><label></label>
                            <input type="hidden" class="form-control" name="lokasi_lain" placeholder="Jika Lokasi tidak terdaftar">
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <div class="col-lg-6">
                                <div class="form-group" style="display:none;" id="waktu_mulai"><label>Waktu Mulai</label>
                                    <input type="date" class="form-control" name="waktu_mulai">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" style="display:none;" id="waktu_selesai"><label>Waktu Selesai</label>
                                    <input type="date" class="form-control" name="waktu_selesai">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4" style="display:none;" id="form_2">
            <div class="card border-bottom-primary shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">File</h6>
                </div>
                <div class="card-body">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            Format
                            <div class="text-white-45 small">.pdf</div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group" style="display:none;" id="file_lembaga">
                        <label>File Lembaga</label>
                        <div class="form-group">
                            <input type="file" class="form-control" name="file_lembaga" accept=".pdf">
                        </div>
                        <div class="form-group" style="display:none;" id="file_bapeda">
                            <label>File Bapeda</label>
                            <input type="file" class="form-control" name="file_bapeda" accept=".pdf">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                    <span class="text text-white">Lanjut</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>


    <?= form_close() ?>
</div>
</div>
<!-- End of Main Content -->