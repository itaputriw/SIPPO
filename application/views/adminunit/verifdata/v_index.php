<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?= $this->session->flashdata('pesan'); ?>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <form action="<?= base_url('verifikasipenelitian/index'); ?>" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Verifikasi Pengajuan Penelitian</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nomor Pengajuan</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Nama Peneliti</th>
                                <th scope="col">Judul Penelitian</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($penelitian as $row) :
                            ?>
                                <?php if ($getpegawai['unit_pegawai'] == $row['unit']) { ?>
                                    <?php if ($row['nama_status'] == 'Disetujui' && $row['kategori_penelitian'] == 'data dan informasi' || $row['nama_status'] == 'Selesai' && $row['kategori_penelitian'] == 'data dan informasi') { ?>
                                        <tr>
                                            <td width="50">
                                                <?= $i++; ?>
                                            </td>
                                            <td>
                                                <?= $row['nomor_surat']; ?>
                                            </td>
                                            <td>
                                                <?= $row['tgl_diajukan']; ?>
                                            </td>
                                            <td>
                                                <?= $row['nama_peneliti']; ?>
                                            </td>
                                            <td>
                                                <?= $row['judul']; ?>
                                            </td>
                                            <td>
                                                <a href="#" class="badge badge-pill badge-secondary float" data-toggle="modal" data-target="#detailModal<?= $row['id_penelitian']; ?>"><i class="fas fa-search"></i></a>
                                            </td>
                                            <td width="100">
                                                <?php if ($row['nama_status'] == 'Disetujui') { ?>
                                                    <a class="badge badge-pill badge-primary float"> <?= $row['nama_status']; ?></a>
                                                <?php } else if ($row['nama_status'] == 'Selesai') { ?>
                                                    <a class="badge badge-pill badge-success float"> <?= $row['nama_status']; ?></a>
                                                <?php } else if ($row['nama_status'] == 'Ditolak') { ?>
                                                    <a class="badge badge-pill badge-danger float"> <?= $row['nama_status']; ?></a>
                                                <?php } else { ?>
                                                    <a class="badge badge-pill badge-warning float"> <?= $row['nama_status']; ?></a>
                                                <?php } ?>
                                            </td>
                                            <td width="250">
                                                <?php if ($row['nama_status'] == 'Selesai') { ?>
                                                    <button href="<?= base_url('verifikator/c_verifikasihasil/disetujui/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-success" disabled><i class="fas fa-check"></i> Tandai Selesai</button>
                                                <?php } else if ($row['nama_status'] == 'Ditolak') { ?>
                                                <?php } else if ($row['nama_status'] == 'Dibatalkan') { ?>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('adminunit/c_verifikasiselesai/disetujui/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-success tombol-tandai-selesai"><i class="fas fa-check"></i> Tandai Selesai</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } else { ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <?php $no = 0;
    foreach ($penelitian as $row) : $no++; ?>
        <div class="modal fade bd-example-modal-lg" id="detailModal<?= $row['id_penelitian']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white font-weight-bold" id="newModalLabel">Detail Penelitian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('peneliti/c_penelitian/detail') ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_penelitian" name="id_penelitian" value="<?= $row['id_penelitian'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Nomor Pengajuan</label>
                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?= $row['nomor_surat'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Peneliti</label>
                            <input type="text" class="form-control" id="nama_peneliti" name="nama_peneliti" value="<?= $row['nama_peneliti'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kategori Penelitian</label>
                            <input type="text" class="form-control" id="kategori_penelitian" name="kategori_penelitian" value="<?= $row['kategori_penelitian'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <?php if ($row['nama_unit'] != null) { ?>
                                <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= $row['nama_unit'] ?>" readonly>
                            <?php } else { ?>
                                <input type="text" class="form-control" id="lokasi_lain" name="lokasi_lain" value="<?= $row['lokasi_lain'] ?>" readonly>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>Keperluan</label>
                            <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= $row['keperluan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Lembaga</label>
                            <input type="text" class="form-control" id="lembaga" name="lembaga" value="<?= $row['lembaga'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $row['jurusan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Alamat Lembaga</label>
                            <input type="text" class="form-control" id="alamat_lembaga" name="alamat_lembaga" value="<?= $row['alamat_lembaga'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $row['judul'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $row['tujuan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Data Primer</label>
                            <input type="text" class="form-control" id="data_primer" name="data_primer" value="<?= $row['data_primer'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Data Sekunder</label>
                            <input type="text" class="form-control" id="data_sekunder" name="data_sekunder" value="<?= $row['data_sekunder'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Waktu Mulai</label>
                            <input type="date" class="form-control" id="waktu_mulai" name="waktu_mulai" value="<?= $row['waktu_mulai'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Waktu Selesai</label>
                            <input type="date" class="form-control" id="waktu_selesai" name="waktu_selesai" value="<?= $row['waktu_selesai'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pengajuan</label>
                            <input type="text" class="form-control" id="tgl_diajukan" name="tgl_diajukan" value="<?= $row['tgl_diajukan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>File Lembaga</label>
                            <a href="<?= base_url('uploads/file_penelitian/' . $row['file_lembaga']); ?>" target="_blank" class="btn btn-sm btn-primary"></i>Lihat</a>
                        </div>
                        <div class="form-group">
                            <label>File Bapeda</label>
                            <?php if ($row['file_bapeda'] == null) { ?>
                                -
                            <?php } else { ?>
                                <a href="<?= base_url('uploads/file_penelitian/' . $row['file_bapeda']); ?>" target="_blank" class="btn btn-sm btn-primary"></i>Lihat</a>
                            <?php } ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>