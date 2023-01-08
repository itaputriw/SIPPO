    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
    <div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- <?php print_r($ceklogin); ?> -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
        <form action="<?= base_url('peneliti/c_penelitian/tambah'); ?>" method="post">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Penelitian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Penelitian</th>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Nama Peneliti</th>
                                    <th scope="col">Judul Penelitian</th>
                                    <th scope="col">Aksi</th>
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
                                        <td width="250">
                                            <?php if ($row['nama_status'] == 'Disetujui' || $row['nama_status'] == 'Selesai') { ?>
                                                <a href="<?= base_url('peneliti/c_penelitian/detail/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-success"><i class="fas fa-search"></i>Detail</a>
                                                <button href="<?= base_url('peneliti/c_penelitian/edit/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-warning" disabled><i class="fas fa-edit"></i> Edit</button>
                                                <button href="<?= base_url('peneliti/c_penelitian/hapus/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-danger" disabled><i class="fas fa-trash"></i> Hapus</button>
                                            <?php } else if ($row['nama_status'] == 'Ditolak') { ?>
                                                <a href="<?= base_url('peneliti/c_penelitian/detail/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-success"><i class="fas fa-search"></i>Detail</a>
                                                <button href="<?= base_url('peneliti/c_penelitian/edit/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-warning" disabled><i class="fas fa-edit"></i> Edit</button>
                                                <button href="<?= base_url('peneliti/c_penelitian/hapus/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-danger" disabled><i class="fas fa-trash"></i> Hapus</button>
                                            <?php } else { ?>
                                                <a href="<?= base_url('peneliti/c_penelitian/detail/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-success"><i class="fas fa-search"></i>Detail</a>
                                                <a href="<?= base_url('peneliti/c_penelitian/edit/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="<?= base_url('peneliti/c_penelitian/hapus/' . $row['id_penelitian']) ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                            <?php } ?>
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
                                        <td width="250">
                                            <a href="<?= base_url('peneliti/c_penelitian/detail/' . $row1['id_penelitian']) ?>" class="btn btn-sm btn-success"><i class="fas fa-search"></i>Detail</a>
                                            <button href="<?= base_url('peneliti/c_penelitian/edit/' . $row1['id_penelitian']) ?>" class="btn btn-sm btn-warning" disabled><i class="fas fa-edit"></i> Edit</button>
                                            <button href="<?= base_url('peneliti/c_penelitian/hapus/' . $row1['id_penelitian']) ?>" class="btn btn-sm btn-danger" disabled><i class="fas fa-trash"></i> Hapus</button>
                                        </td>
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