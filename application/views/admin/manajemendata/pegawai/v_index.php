<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <form action="<?= base_url('admin/c_pegawai/tambah'); ?>" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Pegawai</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="form-group ">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pegawai</button>
                        </div>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col" width="50">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($pegawai as $elements) :
                        ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $elements['nama_pegawai']; ?></td>
                                    <td><?= $elements['nip']; ?></td>
                                    <td><?= $elements['nama_role']; ?></td>
                                    <td>
                                        <?php if ($elements['is_aktif'] == 1) { ?>
                                            <a class="badge badge-pill badge-success float"> Aktif</a>
                                        <?php } else { ?>
                                            <a class="badge badge-pill badge-danger float"> Tidak Aktif</a>
                                        <?php } ?>
                                    </td>
                                    <td width="250">
                                        <a href="<?= base_url('admin/c_pegawai/detail/' . $elements['id_pegawai']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"> </i> Detail</a>
                                        <a href="<?= base_url('admin/c_pegawai/edit/' . $elements['id_pegawai']); ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a>
                                        <?php if ($elements['role'] == 'Admin' || $elements['aktif'] == 0) { ?>
                                            <button href="<?= base_url('admin/c_pegawai/hapus/' . $elements['id_user']) ?>" class="btn btn-sm btn-danger" disabled><i class="fas fa-trash"></i> Non Aktif</button>
                                        <?php } else { ?>
                                            <a href="<?= base_url('admin/c_pegawai/hapus/' . $elements['id_user']) ?>" class="btn btn-sm btn-danger tombol-non-aktif"><i class="fas fa-trash"></i> Non Aktif</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->