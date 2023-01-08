    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <form action="" method="POST">
            <div class="form-group mt-3">
                <input type="text" name="id_unit" value="<?= $unit['id_unit']; ?>" class="form-control" id="id_unit" hidden>
            </div>
            <div class="form-group mt-3">
                <label for="nama_unit">Nama Lokasi</label>
                <input type="text" name="nama_unit" value="<?= $unit['nama_unit']; ?>" class="form-control" id="nama_unit">
                <?= form_error('nama_unit', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group mt-3">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" value="<?= $unit['alamat']; ?>" class="form-control" id="alamat">
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <button type="submit" class="btn btn-success mb-3">Edit</button>
        </form>
    </div>

    </div>
    <!-- /.container-fluid -->
    <!-- End of Main Content -->