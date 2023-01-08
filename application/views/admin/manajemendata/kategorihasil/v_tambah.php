<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('pesan') ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="id_kategori_hasil" name="id_kategori_hasil" hidden>
                </div>
                <div class="form-group">
                    <label for="nama_kategori_hasil">Nama Kategori Hasil</label>
                    <input type="text" class="form-control" id="nama_kategori_hasil" name="nama_kategori_hasil">
                    <?= form_error('nama_kategori_hasil', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->