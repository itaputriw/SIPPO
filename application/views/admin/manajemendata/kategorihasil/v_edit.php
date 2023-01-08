    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <form action="" method="POST">
            <div class="form-group mt-3">
                <input type="text" name="id_kategori_hasil" value="<?= $kategorihasil['id_kategori_hasil']; ?>" class="form-control" id="id_kategori_hasil" hidden>
            </div>
            <div class="form-group mt-3">
                <label for="nama_kategori_hasil">Nama Kategori Hasil</label>
                <input type="text" name="nama_kategori_hasil" value="<?= $kategorihasil['nama_kategori_hasil']; ?>" class="form-control" id="nama_kategori_hasil">
            </div>
            <button type="submit" class="btn btn-success mb-3">Edit</button>
        </form>
    </div>

    </div>
    <!-- /.container-fluid -->
    <!-- End of Main Content -->