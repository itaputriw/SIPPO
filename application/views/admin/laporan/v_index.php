<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <form action="" method="post">
        <!-- <?= print_r($penelitian); ?> -->
        <!-- <?= print_r($datapen); ?> -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Penelitian</h6>
            </div>
            <form action="<?php echo base_url(); ?>admin/c_laporan" method="post" enctype="multipart/form-data">
                <div class="col-lg-12" style="margin-left: -10px">
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class=" form-control-label">Bulan</label>
                                    <select name="bulan" class="form-control" value="<?php echo $_POST['bulan']; ?>">
                                        <?php
                                        $jan = 01;
                                        $feb = 02;
                                        $mar = 03;
                                        $apr = 04;
                                        $mei = 05;
                                        $jun = 06;
                                        $jul = 07;
                                        $agu = 8;
                                        $sep = 9;
                                        $okt = 10;
                                        $nov = 11;
                                        $des = 12;
                                        ?>

                                        <option value="">-Semua-</option>
                                        <?php if ($_POST['bulan'] == $jan) { ?>
                                            <option value="<?php echo $jan ?>" selected>Januari</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $jan ?>">Januari</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $feb) { ?>
                                            <option value="<?php echo $feb ?>" selected>Februari</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $feb ?>">Februari</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $mar) { ?>
                                            <option value="<?php echo $mar ?>" selected>Maret</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $mar ?>">Maret</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $apr) { ?>
                                            <option value="<?php echo $apr ?>" selected>April</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $apr ?>">April</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $mei) { ?>
                                            <option value="<?php echo $mei ?>" selected>Mei</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $mei ?>">Mei</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $jun) { ?>
                                            <option value="<?php echo $jun ?>" selected>Juni</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $jun ?>">Juni</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $jul) { ?>
                                            <option value="<?php echo $jul ?>" selected>Juli</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $jul ?>">Juli</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $agu) { ?>
                                            <option value="<?php echo $agu ?>" selected>Agustus</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $agu ?>">Agustus</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $sep) { ?>
                                            <option value="<?php echo $sep ?>" selected>September</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $sep ?>">September</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $okt) { ?>
                                            <option value="<?php echo $okt ?>" selected>Oktober</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $okt ?>">Oktober</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $nov) { ?>
                                            <option value="<?php echo $nov ?>" selected>November</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $nov ?>">November</option>
                                        <?php } ?>
                                        <?php if ($_POST['bulan'] == $des) { ?>
                                            <option value="<?php echo $des ?>" selected>Desember</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $des ?>">Desember</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tgl_diajukan" class="form-control" value="<?php echo $_POST['tgl_diajukan']; ?>">
                                        <?php
                                        $tahun1 = 2020;
                                        $tahun2 = 2021;
                                        $tahun3 = 2022;
                                        ?>
                                        <option value="">-Semua-</option>
                                        <?php if ($_POST['tgl_diajukan'] == $tahun1) { ?>
                                            <option value="<?php echo $tahun1 ?>" selected>2020</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $tahun1 ?>">2020</option>
                                        <?php } ?>
                                        <?php if ($_POST['tgl_diajukan'] == $tahun2) { ?>
                                            <option value="2021" selected>2021</option>
                                        <?php } else { ?>
                                            <option value="2021">2021</option>
                                        <?php } ?>
                                        <?php if ($_POST['tgl_diajukan'] == $tahun3) { ?>
                                            <option value="2022" selected>2022</option>
                                        <?php } else { ?>
                                            <option value="2022">2022</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori_penelitian" class="form-control" value="<?php echo $_POST['kategori_penelitian']; ?>">
                                        <?php
                                        $kat1 = "penelitian";
                                        $kat2 = "data dan informasi kesehatan";
                                        ?>
                                        <option value="">-Semua-</option>
                                        <?php if ($_POST['kategori_penelitian'] == $kat1) { ?>
                                            <option value="penelitian" selected>Penelitian</option>
                                        <?php } else { ?>
                                            <option value="penelitian">Penelitian</option>
                                        <?php } ?>
                                        <?php if ($_POST['kategori_penelitian'] == $kat2) { ?>
                                            <option value="data dan informasi kesehatan" selected>Data dan Informasi</option>
                                        <?php } else { ?>
                                            <option value="data dan informasi kesehatan">Data dan Informasi</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" value="<?php echo $_POST['status']; ?>">
                                        <option value="">-Semua-</option>
                                        <?php
                                        $menunggu = "Menunggu";
                                        $disetujui = "Disetujui";
                                        $ditolak = "Ditolak";
                                        $selesai = "Selesai";
                                        $perbaikan = "Perbaikan";
                                        ?>
                                        <?php if ($_POST['status'] == $menunggu) { ?>
                                            <option value="Menunggu" selected>Menunggu</option>
                                        <?php } else { ?>
                                            <option value="Menunggu">Menunggu</option>
                                        <?php } ?>
                                        <?php if ($_POST['status'] == $disetujui) { ?>
                                            <option value="Disetujui" selected>Disetujui</option>
                                        <?php } else { ?>
                                            <option value="Disetujui">Disetujui</option>
                                        <?php } ?>
                                        <?php if ($_POST['status'] == $ditolak) { ?>
                                            <option value="Ditolak" selected>Ditolak</option>
                                        <?php } else { ?>
                                            <option value="Ditolak">Ditolak</option>
                                        <?php } ?>
                                        <?php if ($_POST['status'] == $selesai) { ?>
                                            <option value="Selesai" selected>Selesai</option>
                                        <?php } else { ?>
                                            <option value="Selesai">Selesai</option>
                                        <?php } ?>
                                        <?php if ($_POST['status'] == $perbaikan) { ?>
                                            <option value="Perbaikan" selected>Perbaikan</option>
                                        <?php } else { ?>
                                            <option value="Perbaikan">Perbaikan</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group row">
                                    <div style="margin-top: 34px;">
                                        <!-- <div class="col-sm-10"> -->
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group row">
                                    <div style="margin-top: 34px;">
                                        <div class="dropdwon inline">
                                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="fa fa-download"></i> Export
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><button type="submit" formaction="<?= base_url('admin/c_laporan/cetaklaporan_pdf') ?>" formtarget="_blank">
                                                        <center>PDF</center>
                                                    </button></li>
                                                <li><button type="submit" formaction="<?= base_url('admin/c_laporan/cetaklaporan_excel') ?>">
                                                        <center>EXCEL</center>
                                                    </button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col-lg-1">
                                <div class="form-group row">
                                    <div style="margin-top: 34px;">
                                        <div class="form-group" style="margin-left: 12px">
                                            <button type="submit" class="btn btn-danger" formaction="<?= base_url('admin/c_laporan/cetaklaporan') ?>" formtarget="_blank"> <i class="fa fa-print"></i>Print
                                                <span class="caret"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </form>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Pengajuan Penelitian</th>
                                <th scope="col">Nama Pemohon</th>
                                <th scope="col">Judul Penelitian</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($hitpenelitian > 0) { ?>

                                <?php
                                $i = 1;
                                foreach ($datapen as $row) :
                                ?>
                                    <tr>
                                        <td width="50">
                                            <?= $i++; ?>
                                        </td>
                                        <td width="100">
                                            <?= $row->tgl_diajukan; ?>
                                        </td>
                                        <td>
                                            <?= $row->nama_peneliti; ?>
                                        </td>
                                        <td>
                                            <?= $row->judul; ?>
                                        </td>
                                        <td>
                                            <a href="#" class="badge badge-pill badge-secondary float" data-toggle="modal" data-target="#detailModal<?= $row->id_penelitian; ?>"><i class="fas fa-search"></i></a>
                                        </td>
                                        <td width="100">
                                            <?php if ($row->nama_status == 'Disetujui') { ?>
                                                <a class="badge badge-pill badge-primary float"> <?= $row->nama_status; ?></a>
                                            <?php } else if ($row->nama_status == 'Selesai') { ?>
                                                <a class="badge badge-pill badge-success float"> <?= $row->nama_status; ?></a>
                                            <?php } else if ($row->nama_status  == 'Ditolak') { ?>
                                                <a class="badge badge-pill badge-danger float"> <?= $row->nama_status; ?></a>
                                            <?php } else { ?>
                                                <a class="badge badge-pill badge-warning float"> <?= $row->nama_status; ?></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else {
                                echo '<tr><td colspan="6" align="center" style="color:red">Maaf Data Tidak ditemukan</td></tr>';
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <?php $no = 0;
    foreach ($penelitian as $row) : $no++; ?>
        <div class="modal fade bd-example-modal-lg" id="detailModal<?= $row['id_penelitian']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white font-weight-bold" id="newModalLabel">Detail Penelitian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('peneliti/c_penelitian/detail') ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_penelitian" name="id_penelitian" value="<?= $row['id_penelitian'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Peneliti</label>
                            <input type="text" class="form-control" id="nama_peneliti" name="nama_peneliti" value="<?= $row['nama_peneliti'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kategori Penelitian</label>
                            <input type="text" class="form-control" id="kategori_penelitian" name="kategori_penelitian" value="<?= $row['kategori_penelitian'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <?php if ($row['nama_unit'] != null) { ?>
                                <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= $row['nama_unit'] ?>" readonly>
                            <?php } else { ?>
                                <input type="text" class="form-control" id="lokasi_lain" name="lokasi_lain" value="<?= $row['lokasi_lain'] ?>" readonly>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>Nomor Pengajuan</label>
                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?= $row['nomor_surat'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Keperluan</label>
                            <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= $row['keperluan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Lembaga</label>
                            <input type="text" class="form-control" id="lembaga" name="lembaga" value="<?= $row['lembaga'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $row['jurusan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Alamat Lembaga</label>
                            <input type="text" class="form-control" id="alamat_lembaga" name="alamat_lembaga" value="<?= $row['alamat_lembaga'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $row['judul'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $row['tujuan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Data Primer</label>
                            <input type="text" class="form-control" id="data_primer" name="data_primer" value="<?= $row['data_primer'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Data Sekunder</label>
                            <input type="text" class="form-control" id="data_sekunder" name="data_sekunder" value="<?= $row['data_sekunder'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Waktu Mulai</label>
                            <input type="date" class="form-control" id="waktu_mulai" name="waktu_mulai" value="<?= $row['waktu_mulai'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Waktu Selesai</label>
                            <input type="date" class="form-control" id="waktu_selesai" name="waktu_selesai" value="<?= $row['waktu_selesai'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>File Lembaga</label>
                            <a href="<?= base_url('uploads/file_penelitian/' . $row['file_lembaga']); ?>" target="_blank" class="btn btn-sm btn-primary"></i>Lihat</a>
                        </div>
                        <div class="form-group">
                            <label>File Bapeda</label>
                            <?php if ($row['file_bapeda'] == null) { ?>
                            <?php } else { ?>
                                <a href="<?= base_url('uploads/file_penelitian/' . $row['file_bapeda']); ?>" target="_blank" class="btn btn-sm btn-primary"></i>Lihat</a>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pengajuan</label>
                            <input type="text" class="form-control" id="tgl_diajukan" name="tgl_diajukan" value="<?= $row['tgl_diajukan'] ?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
</div>