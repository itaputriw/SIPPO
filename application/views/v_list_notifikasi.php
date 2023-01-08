<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell fa-fw"></i>
    <!-- Counter - Alerts -->
    <span class="badge badge-danger badge-counter"><?= $jumlahnotifikasi; ?></span>
</a>
<!-- Dropdown - Alerts -->
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header">
        Notifikasi
    </h6>
    <?php if ($user['role'] == 3) { ?>
        <?php if ($jumlahnotifikasi == 0) { ?>
            <div class="text-center font-weight-bold mt-2">
                Tidak Ada Notifikasi
            </div>
            <a class="dropdown-item text-center small text-gray-500"></a>
        <?php } else { ?>
            <?php
            foreach ($listnotifikasiverifikator as $row) :
            ?>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('verifikator/c_notifikasi/update_is_read/' . $row['id_notifikasi'])  ?>">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500"><?= $row['create_at'] ?> . <?= $row['nama_peneliti']; ?></div>
                        <span class="font-weight-bold"><?= $row['pesan']; ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
            <a class="dropdown-item text-center small text-gray-500" href="#">Lihat Semua Notifikasi</a>
        <?php } ?>
    <?php } elseif ($user['role'] == 4) { ?>
        <?php if ($jumlahnotifikasi == 0) { ?>
            <div class="text-center font-weight-bold mt-2">
                Tidak Ada Notifikasi
            </div>
            <a class="dropdown-item text-center small text-gray-500"></a>
        <?php } else { ?>
            <?php
            foreach ($listnotifikasipeneliti as $row) :
            ?>
                <?php if ($row['type'] == 1) { ?>
                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url('verifikator/c_notifikasi/update_is_read_peneliti/' . $row['id_notifikasi'])  ?>">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500"><?= $row['create_at'] ?> . <?= $row['nama_pegawai']; ?></div>
                            <span class="font-weight-bold"><?= $row['pesan']; ?></span>
                        </div>
                    </a>
                <?php } elseif ($row['type'] == 2) { ?>
                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url('verifikator/c_notifikasi/update_is_read_peneliti2/' . $row['id_notifikasi'])  ?>">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500"><?= $row['create_at'] ?> . <?= $row['nama_pegawai']; ?></div>
                            <span class="font-weight-bold"><?= $row['pesan']; ?></span>
                        </div>
                    </a>
                <?php } ?>
            <?php endforeach; ?>
            <a class="dropdown-item text-center small text-gray-500" href="#">Lihat Semua Notifikasi</a>
        <?php } ?>
    <?php } elseif ($user['role'] == 1) { ?>
        <div class="text-center font-weight-bold mt-2">
            Tidak Ada Notifikasi
        </div>
        <a class="dropdown-item text-center small text-gray-500"></a>
    <?php } ?>
    </span>
</div>