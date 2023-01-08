<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('pesan') ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="id_unit" name="id_unit" hidden>
                </div>
                <div class="form-group">
                    <label for="nama_unit">Nama Lokasi</label>
                    <input type="text" class="form-control" id="nama_unit" name="nama_unit">
                    <?= form_error('nama_unit', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
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