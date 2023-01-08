<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<div class="container-fluid">
    <?= form_open_multipart('peneliti/c_penelitian/edit/' . $penelitian['id_penelitian']); ?>
    <div class="col-lg-8 mb-4">
        <div class="card border-bottom-primary shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Kategori</h6>
            </div>
            <div class="card-body">
                <input type="text" name="id_penelitian" id="id_penelitian" class="form-control" value="<?= $penelitian['id_penelitian']; ?>" hidden>
                <div class="form-group row">
                    <input type="text" name="id_peneliti" id="id_peneliti" class="form-control" value="<?= $peneliti['id_peneliti']; ?>" hidden>
                </div>
                <div class="form-group">
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" value="<?= $nomorsurat; ?>" hidden>
                </div>
                <div class="form-group" id="kategori_penelitian_edit"><label>Keperluan</label>
                    <input type="text" class="form-control" name="kategori_penelitian" value="<?= $penelitian['kategori_penelitian']; ?>" readonly></input>
                </div>
            </div>
        </div>
    </div>

    <!-- KATEGORI PENELITIAN -->
    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-8 mb-4">
            <div class="card border-bottom-primary shadow mb-4" id="form_edit">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Form Edit</h6>
                </div>
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="form-group" id="keperluan_edit"><label>Keperluan</label>
                            <textarea type="text" class="form-control" name="keperluan"><?= $penelitian['keperluan']; ?></textarea>
                        </div>
                        <div class="form-group" id="lembaga_edit"><label>Lembaga</label>
                            <input type="text" class="form-control" name="lembaga" value="<?= $penelitian['lembaga']; ?>">
                        </div>
                        <div class="form-group" id="jurusan_edit"><label>Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" value="<?= $penelitian['jurusan']; ?>">
                        </div>
                        <div class="form-group" id="alamat_lembaga_edit"><label>Alamat Lembaga</label>
                            <input type="text" class="form-control" name="alamat_lembaga" value="<?= $penelitian['alamat_lembaga']; ?>">
                        </div>
                        <div class="form-group" id="judul_edit"><label>Judul</label>
                            <input type="text" class="form-control" name="judul" value="<?= $penelitian['judul']; ?>">
                        </div>
                        <div class="form-group" id="tujuan_edit"><label>Tujuan</label>
                            <input type="text" class="form-control" name="tujuan" value="<?= $penelitian['tujuan']; ?>">
                        </div>
                        <div class="form-group" id="data_primer_edit"><label>Data Primer</label>
                            <textarea type="text" class="form-control" name="data_primer"><?= $penelitian['data_primer']; ?></textarea>
                            <i class="fas fa-fw fa-exclamation-circle"></i>
                            <font color="red">Data dari peneliti : quesioner atau gform</font>
                        </div>
                        <div class="form-group" id="data_sekunder_edit"><label>Data Sekunder</label>
                            <textarea type="text" class="form-control" name="data_sekunder"><?= $penelitian['data_sekunder']; ?></textarea>
                            <i class="fas fa-fw fa-exclamation-circle"></i>
                            <font color="red">Data yang diminta</font>
                        </div>
                        <div class="form-group row" id="unit_edit">
                            <label class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-10">
                                <select class="js-lokasi" name="unit">
                                    <option disabled selected>--Pilih Lokasi--</option>
                                    <?php foreach ($unit as $u) : ?>
                                        <option value="<?= $u['id_unit']  ?>" <?= $u['id_unit']  == $penelitian['id_unit'] ? 'selected' : '' ?>>
                                            <?= $u['nama_unit'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label></label>
                            <input type="hidden" class="form-control" name="lokasi_lain" placeholder="Jika Lokasi tidak terdaftar">
                        </div>
                        <?php if ($penelitian['kategori_penelitian'] == 'penelitian') { ?>
                            <div class="d-sm-flex align-items-center justify-content-between mb-0">
                                <div class="col-lg-6">
                                    <div class="form-group" id="waktu_mulai_edit"><label>Waktu Mulai</label>
                                        <input type="date" class="form-control" name="waktu_mulai" value="<?= $penelitian['waktu_mulai']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group" id="waktu_selesai_edit"><label>Waktu Selesai</label>
                                        <input type="date" class="form-control" name="waktu_selesai" value="<?= $penelitian['waktu_selesai']; ?>">
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                    <br>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4" id="form_2_edit">
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
                    <div class="form-group" id="file_lembaga_edit">
                        <label>File Lembaga</label>
                        <div class="form-group">
                            <input type="file" class="form-control" name="file_lembaga" accept=".pdf">File sebelumnya :
                            <input type="hidden" name="nm_file_lembaga" value="<?= $penelitian['file_lembaga']; ?>">
                            <a href="<?= base_url('uploads/file_penelitian/' . $penelitian['file_lembaga']); ?>" target="_blank"><?= $penelitian['file_lembaga']; ?></a>
                        </div>
                        <!-- </div> -->
                        <?php if ($penelitian['kategori_penelitian'] == 'penelitian') { ?>
                            <div class="form-group" id="file_bapeda_edit">
                                <label>File Bapeda</label>
                                <input type="file" class="form-control" name="file_bapeda" accept=".pdf">
                                <input type="hidden" name="nm_file_bapeda" value="<?= $penelitian['file_bapeda']; ?>">
                                <?php if ($penelitian['file_bapeda'] == null) { ?>
                                    <?php } else { ?>File sebelumnya :
                                    <a href="<?= base_url('uploads/file_penelitian/' . $penelitian['file_bapeda']); ?>" target="_blank"> <?= $penelitian['file_bapeda']; ?></a>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                    <span class="text text-white">Simpan</span>
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