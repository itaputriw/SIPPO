<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= form_open_multipart('peneliti/c_hasilpenelitian/edit/' . $hasilpenelitian['id_hasil_penelitian']); ?>
    <div class="form-group mt-3">
        <input type="text" name="id_hasil_penelitian" class="form-control" id="id_hasil_penelitian" value="<?= $hasilpenelitian['id_hasil_penelitian']; ?>" hidden>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kategori Hasil Penelitian</label>
        <div class="col-sm-8">
            <select class="form-control" name="kategori_hasil">
                <option disabled selected>--Pilih Kategori Hasil--</option>
                <?php foreach ($kategorihasil as $kh) : ?>
                    <option value="<?= $kh['id_kategori_hasil'] ?>" <?= $kh['id_kategori_hasil'] == $hasilpenelitian['id_kategori_hasil'] ? 'selected' : '' ?>> <?= $kh['nama_kategori_hasil'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <?= form_error('kategori_hasil', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group row">
        <label for="file_hasil" class="col-sm-2 col-form-label">File Hasil Penelitian</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="file_hasil" name="file_hasil" accept=".pdf">
            <input type="hidden" name="nm_file_hasil" value="<?= $hasilpenelitian['file_hasil']; ?>">
            <a href="<?= base_url('uploads/file_hasil/' . $hasilpenelitian['file_hasil']); ?>" target="_blank"><?= $hasilpenelitian['file_hasil']; ?></a>
        </div>
        <?= form_error('file_hasil', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Link Publikasi/Hasil</label>
        <div class="col-sm-8">
            <input type="text" name="link" class="form-control" id="link" value="<?= $hasilpenelitian['link']; ?>">
        </div>
        <?= form_error('link', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?= form_close() ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->