<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <form action="" method="post">
        <!-- <?= print_r($hasilpenelitian); ?> -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Hasil Penelitian</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nomor Permohonan/Surat</th>
                                <th scope="col">Tanggal Permohonan</th>
                                <th scope="col">Nama Pemohon</th>
                                <th scope="col">Judul Penelitian</th>
                                <th scope="col">Hasil Penelitian</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($penelitian as $row) :
                            ?>
                                <?php if ($row['nama_status'] == 'Disetujui' && $row['kategori_penelitian'] == 'penelitian' || $row['nama_status'] == 'Selesai'   && $row['kategori_penelitian'] == 'penelitian' || $row['nama_status'] == 'Perbaikan'  && $row['kategori_penelitian'] == 'penelitian') { ?>
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
                                        <td width="100">
                                            <a href="<?= base_url('admin/c_admin/datahasil/' . $row['id_penelitian']); ?>"><i class="fas fa-eye"></i> Lihat</a>
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
                                    </tr>
                                <?php } else { ?>
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
    foreach ($hasilpenelitian as $row) : $no++; ?>
        <div class="modal fade" id="detailModal1<?= $row['id_hasil_penelitian']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModal1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newModalLabel">Detail Hasil Penelitian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('peneliti/c_hasilpenelitian/detail') ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kategori Penelitian</label>
                            <input type="text" class="form-control" id="nama_kategori_hasil" name="nama_kategori_hasil" value="<?= $row['nama_kategori_hasil'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>File Lembaga</label>
                            <a href="<?= base_url('uploads/file_bapeda/' . $row['file_hasil']); ?>" class="btn btn-sm btn-primary"></i>Lihat</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <!-- <?= print_r($row) ?> -->
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
</div>