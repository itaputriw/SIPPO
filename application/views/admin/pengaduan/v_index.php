<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengirim</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Judul Pengaduan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pengaduan as $row) :
                        ?>
                            <tr>
                                <td width="20">
                                    <?= $i++; ?>
                                </td>
                                <td width="130">
                                    <?= $row['nama_peneliti']; ?>
                                </td>
                                <td width="80">
                                    <?= $row['tgl_pengaduan']; ?>
                                </td>
                                <td width="200">
                                    <?= $row['judul']; ?>
                                </td>
                                <td width="80">
                                    <?php if ($row['status'] == 'proses') { ?>
                                        <a class="badge badge-pill badge-warning float"> <?= $row['status']; ?></a>
                                    <?php } else { ?>
                                        <a class="badge badge-pill badge-success float"> <?= $row['status']; ?></a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/c_pengaduan/detailpengaduan/' . $row['id_pengaduan']) ?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-reply"></i>
                                        </span>
                                        <span class="text">Balas</span>
                                    </a>
                                    <?php if ($row['status'] == 'proses') { ?>
                                        <a href="<?= base_url('admin/c_pengaduan/selesai/' . $row['id_pengaduan']); ?>" class="btn btn-success btn-icon-split tombol-selesai">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-reply"></i>
                                            </span>
                                            <span class="text">Selesaikan</span>
                                        </a>
                                    <?php } else { ?>
                                        <button href="<?= base_url('admin/c_pengaduan/selesai/' . $row['id_pengaduan']); ?>" class="btn btn-success btn-icon-split" disabled>
                                            <span class="icon text-white-50">
                                                <i class="fas fa-reply"></i>
                                            </span>
                                            <span class="text">Selesaikan</span>
                                        </button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
</div>