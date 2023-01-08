<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <div class="row">
        <div class="col-md-3">
            <form action="<?= base_url('admin/c_admin/datapeneliti'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search keyword.." name="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form action="" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Peneliti</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nomor Identitas</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Waktu Daftar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($peneliti)) : ?>
                                <tr>
                                    <td colspan="8">
                                        <div class="alert alert-danger" role="alert">
                                            Data Tidak Ditemukan!
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php
                            foreach ($peneliti as $row) :
                            ?>
                                <tr>
                                    <td width="50">
                                        <?= ++$start; ?>
                                    </td>
                                    <td>
                                        <?= $row['nama_peneliti']; ?>
                                    </td>
                                    <td>
                                        <?= $row['no_identitas']; ?>
                                    </td>
                                    <td>
                                        <?= $row['tgl_lahir']; ?>
                                    </td>
                                    <td>
                                        <?= $row['create_date']; ?>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailModal<?= $row['id_peneliti']; ?>"><i class="fas fa-search"></i> Detail</a>
                                        <a type="button" class="btn btn-sm btn-warning" href="<?= site_url('admin/c_datapeneliti/edit/' . $row['id_peneliti']); ?>"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('admin/c_datapeneliti/hapus/' . $row['id_user']) ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <?php $no = 0;
    foreach ($peneliti as $row) : $no++; ?>
        <div class="modal fade" id="detailModal<?= $row['id_peneliti']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white font-weight-bold" id="newModalLabel">Detail Peneliti</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('peneliti/c_penelitian/detail') ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_peneliti" name="id_peneliti" value="<?= $row['id_peneliti'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Pemohon</label>
                            <input type="text" class="form-control" id="nama_peneliti" name="nama_peneliti" value="<?= $row['nama_peneliti'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nomor Identitas</label>
                            <input type="text" class="form-control" id="no_identitas" name="no_identitas" value="<?= $row['no_identitas'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jk" name="jk" value="<?= $row['jk'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $row['no_hp'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat'] ?>" readonly>
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