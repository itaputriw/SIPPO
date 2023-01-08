<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <?= form_open_multipart('peneliti/c_pengaduan/tambah'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Pengaduan</h6>
        </div>
        <div class="card-body">
            <div class="form-group mt-3">
                <input type="text" name="id_pengaduan" class="form-control" id="id_pengaduan" value="" hidden>
            </div>
            <div class="form-group cols-sm-6">
                <input type="text" name="id_peneliti" value="<?= $getpeneliti['id_peneliti']; ?>" class="form-control" hidden>
            </div>
            <div class="form-group cols-sm-6">
                <label>Tanggal Pengaduan</label>
                <input type="text" name="tgl_pengaduan" value="<?= date('d/m/Y'); ?>" class="form-control" readonly>
            </div>
            <div class="form-group cols-sm-6">
                <label>Nama Peneliti</label>
                <input type="text" name="nama_peneliti" value="<?= $getpeneliti['nama_peneliti']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group cols-sm-6">
                <label>Judul Pengaduan</label>
                <input type="text" name="judul" id="judul" class="form-control">
            </div>
            <div class="form-group cols-sm-6">
                <label>Tulis Laporan</label>
                <textarea name="komen" class="form-control" rows="7"></textarea>
                <!-- <?= form_error('komen', '<small class="text-danger pl-3">', '</small>') ?> -->
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary"></input>
                <input type="reset" value="Reset" class="btn btn-warning">
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    </form>