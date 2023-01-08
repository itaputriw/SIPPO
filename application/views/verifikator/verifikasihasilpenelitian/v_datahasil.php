<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1> -->
    <?= $this->session->flashdata('pesan'); ?>

    <form action="" method="post">
        <div class="d-sm-flex">
            <a href="<?= base_url('verifikator/c_verifikasihasil'); ?>" class="btn btn-md btn-circle btn-primary">
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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori Hasil</th>
                                <th scope="col">Link Publikasi/Hasil</th>
                                <th scope="col">Document</th>
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
                                        <?= $row['link']; ?>
                                    </td>
                                    <td width="200">
                                        <a href="<?= base_url('uploads/file_hasil/' . $row['file_hasil']); ?>" target="_blank" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i> Preview</a>
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