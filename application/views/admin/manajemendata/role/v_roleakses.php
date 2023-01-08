<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="d-sm-flex">
        <a href="<?= base_url('admin/c_role'); ?>" class="btn btn-md btn-circle btn-primary">
            <i class="fas fa-arrow-left"></i>
        </a>
        &nbsp;
        <h1 class="h3 mb-4 text-gray-800"> Role Akses</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <h5> Role : <?= $role['nama_role']; ?> </h5>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <td width="50">
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $m['nama_menu']; ?>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" <?= cek_akses($role['id_role'], $m['id_menu']); ?> data-role="<?= $role['id_role']; ?>" data-menu="<?= $m['id_menu']; ?>">
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->>