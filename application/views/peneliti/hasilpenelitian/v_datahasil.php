<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <form action="<?= base_url('peneliti/c_hasilpenelitian/tambahhasil/' . $id); ?>" method="post">
        <div class="d-sm-flex">
            <a href="<?= base_url('peneliti/c_hasilpenelitian'); ?>" class="btn btn-md btn-circle btn-primary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h3 mb-4 text-gray-800"> Hasil Penelitian</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hasil Penelitian</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="form-group ">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Hasil Penelitian</button>
                        </div>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori Hasil</th>
                                <th scope="col">Document</th>
                                <th scope="col">Link Hasil</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($hasilpenelitian as $row) :
                            ?>
                                <tr>
                                    <td width="50">
                                        <?= $i++; ?>
                                    </td>
                                    <td width="200">
                                        <?= $row['nama_kategori_hasil']; ?>
                                    </td>
                                    <td width="200">
                                        <a href="<?= base_url('uploads/file_hasil/' . $row['file_hasil']); ?>" target="_blank" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i> Preview</a>
                                    </td>
                                    <td width="200">
                                        <?php if ($row['link'] == null) { ?>
                                            (Tidak Ada)
                                        <?php } else { ?>
                                            <?= $row['link']; ?>
                                        <?php } ?>
                                    </td>
                                    <td width="250">
                                        <a href="<?= base_url('peneliti/c_hasilpenelitian/edit/' . $row['id_hasil_penelitian']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('peneliti/c_hasilpenelitian/hapus/' . $row['id_hasil_penelitian']) ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
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