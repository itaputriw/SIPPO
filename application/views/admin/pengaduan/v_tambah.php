<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Hasil Penelitian</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/c_tanggapan/tambah/' .  $id) ?>" method="post">
                <div class="form-group cols-sm-6">
                    <input type="text" name="id_pegawai" value="<?= $getpegawai['id_pegawai']; ?>" class="form-control" hidden>
                </div>
                <div class="form-group cols-sm-6">
                    <label>Tanggal Tanggapan</label>
                    <input type="text" name="tgl_tanggapan" value="<?= date('d/m/Y'); ?>" class="form-control" readonly>
                </div>
                <div class="form-group cols-sm-6">
                    <label>Tulis Tanggapan</label>
                    <textarea name="tanggapan" class="form-control" rows="7"></textarea>
                    <!-- <?= form_error('tanggapan', '<small class="text-danger pl-3">', '</small>') ?> -->
                </div>
                <div class="form-group" col-sm-6>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                    <input type="reset" value="Reset" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>