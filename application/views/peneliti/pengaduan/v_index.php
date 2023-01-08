<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <form action="<?= base_url('peneliti/c_pengaduan/tambah'); ?>" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengaduan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="form-group ">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pengaduan</button>
                        </div>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Pengaduan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul Pengaduan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            <?php
                            foreach ($pengaduan as $row) :
                            ?>
                                <tr>
                                    <td width="30">
                                        <?= $i++; ?>
                                    </td>
                                    <td width="80">
                                        <?= $row['tgl_pengaduan']; ?>
                                    </td>
                                    <td>
                                        <?= $peneliti['nama_peneliti']; ?>
                                    </td>
                                    <td>
                                        <?= $row['judul']; ?>
                                    </td>
                                    <td>
                                        <?php if ($row['status'] == 'proses') { ?>
                                            <a class="badge badge-pill badge-warning float"> <?= $row['status']; ?></a>
                                        <?php } else { ?>
                                            <a class="badge badge-pill badge-success float"> <?= $row['status']; ?></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('peneliti/c_pengaduan/detail/' . $row['id_pengaduan']) ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info"></i>
                                            </span>
                                            <span class="text">Detail</span>
                                        </a>
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