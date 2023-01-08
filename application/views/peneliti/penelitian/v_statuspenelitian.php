<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <form action="<?= base_url('peneliti/c_penelitian'); ?>" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Status Penelitian</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nomor Pengajuan</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Nama Peneliti</th>
                                <th scope="col">Judul Penelitian</th>
                                <th scope="col">Status Penelitian</th>
                                <th scope="col">Surat Rekomendasi</th>
                                <th scope="col">Alasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            <?php
                            foreach ($penelitian as $row) :
                            ?>
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
                                        <?= $row['kategori_penelitian']; ?>
                                    </td>
                                    <td>
                                        <?= $row['nama_peneliti']; ?>
                                    </td>
                                    <td>
                                        <?= $row['judul']; ?>
                                    </td>
                                    <td>
                                        <?php if ($row['nama_status'] == 'Disetujui') { ?>
                                            <a class="badge badge-pill badge-primary float"> <?= $row['nama_status']; ?></a>
                                        <?php } else if ($row['nama_status'] == 'Selesai') { ?>
                                            <a class="badge badge-pill badge-success float"> <?= $row['nama_status']; ?></a>
                                        <?php } else if ($row['nama_status'] == 'Ditolak') { ?>
                                            <a class="badge badge-pill badge-danger float"> <?= $row['nama_status']; ?></a>
                                        <?php } else { ?>
                                            <a class="badge badge-pill badge-warning float"> <?= $row['nama_status']; ?></a>
                                        <?php } ?>
                                        <a href="<?= base_url('peneliti/c_penelitian/riwayat/' . $row['id_penelitian']) ?>" class="badge badge-pill badge-secondary float"><i class="fas fa-file"></i> Riwayat</a>
                                    </td>
                                    <td>
                                        <?php if ($row['nama_status'] == 'Disetujui' || $row['nama_status'] == 'Selesai' || $row['nama_status'] == 'Perbaikan') { ?>
                                            <a href="<?= base_url('peneliti/c_penelitian/suratrekomendasi/' . $row['id_penelitian']) ?>" target="_blank" class="btn btn-warning"><i class="fas fa-file"></i>Download</a>
                                        <?php } else if ($row['nama_status'] == 'Ditolak') { ?>
                                        <?php } else { ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?= $row['alasan']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php
                            foreach ($anggotapenelitian as $row1) :
                            ?>
                                <tr>
                                    <td width="50">
                                        <?= $i++; ?>
                                    </td>
                                    <td>
                                        <?= $row1['nomor_surat']; ?>
                                    </td>
                                    <td>
                                        <?= $row1['tgl_diajukan']; ?>
                                    </td>
                                    <td>
                                        <?= $row1['kategori_penelitian']; ?>
                                    </td>
                                    <td>
                                        <?= $row1['nama_peneliti']; ?>
                                    </td>
                                    <td>
                                        <?= $row1['judul']; ?>
                                    </td>
                                    <td>
                                        <?php if ($row1['id_status'] == '2') { ?>
                                            <a class="badge badge-pill badge-primary float"> <?= $row1['nama_status']; ?></a>
                                        <?php } else if ($row1['nama_status'] == 'Selesai') { ?>
                                            <a class="badge badge-pill badge-success float"> <?= $row1['nama_status']; ?></a>
                                        <?php } else if ($row1['nama_status'] == 'Ditolak') { ?>
                                            <a class="badge badge-pill badge-danger float"> <?= $row1['nama_status']; ?></a>
                                        <?php } else { ?>
                                            <a class="badge badge-pill badge-warning float"> <?= $row1['nama_status']; ?></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($row1['nama_status'] == 'Disetujui' || $row1['nama_status'] == 'Selesai') { ?>
                                            <a href="<?= base_url('peneliti/c_penelitian/suratrekomendasi/' . $row1['id_penelitian']) ?>" target="_blank" class="btn btn-warning"><i class="fas fa-file"></i>Download</a>
                                        <?php } else if ($row1['nama_status'] == 'Ditolak') { ?>
                                        <?php } else { ?>
                                        <?php } ?>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

</div>
</div>