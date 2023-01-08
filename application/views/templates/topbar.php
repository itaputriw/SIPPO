   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
       <div id="content">

           <!-- Topbar -->
           <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

               <!-- Sidebar Toggle (Topbar) -->
               <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                   <i class="fa fa-bars"></i>
               </button>

               <!-- Topbar Search -->
               <div class="text-sidebar"><b>
                       PERIZINAN ONLINE</b>
               </div>


               <!-- Topbar Navbar -->
               <ul class="navbar-nav ml-auto">

                   <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                   <li class="nav-item dropdown no-arrow d-sm-none">
                       <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-search fa-fw"></i>
                       </a>
                       <!-- Dropdown - Messages -->
                       <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                           <form class="form-inline mr-auto w-100 navbar-search">
                               <div class="input-group">
                                   <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                   <div class="input-group-append">
                                       <button class="btn btn-primary" type="button">
                                           <i class="fas fa-search fa-sm"></i>
                                       </button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </li>

                   <!-- Nav Item - Alerts -->
                   <li class="nav-item dropdown no-arrow mx-1 list_notifikasi">
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
                                    // $i = 1;
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
                           <?php } elseif ($user['role'] == 2) { ?>
                               <div class="text-center font-weight-bold mt-2">
                                   Tidak Ada Notifikasi
                               </div>
                               <a class="dropdown-item text-center small text-gray-500"></a>
                           <?php } ?>

                           </span>
                       </div>
                   </li>

                   <div class="topbar-divider d-none d-sm-block"></div>

                   <!-- Nav Item - User Information -->
                   <li class="nav-item dropdown no-arrow">
                       <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $getpemohon['nama']; ?> (<?= $user['role']; ?>)</span> -->
                           <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                               <?php if ($user['role'] == 1) { ?>
                                   <?= $getpegawai['nama_pegawai'] ?> (<?= $getpegawai['nama_role'] ?>)
                               <?php } elseif ($user['role'] == 4) { ?>
                                   <?= $getpeneliti['nama_peneliti'] ?> (<?= $getpeneliti['nama_role'] ?>)
                               <?php } elseif ($user['role'] == 3) { ?>
                                   <?= $getpegawai['nama_pegawai'] ?> (<?= $getpegawai['nama_role'] ?>)
                               <?php } else { ?>
                                   <?= $getpegawai['nama_pegawai'] ?> (<?= $getpegawai['nama_role'] ?>)
                               <?php } ?>
                           </span>
                           <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/default.jpg'); ?>">
                       </a>
                       <!-- Dropdown - User Information -->
                       <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                           <?php if ($user['role'] == 1) { ?>
                               <a class="dropdown-item" href="<?= base_url('admin/c_admin/profil'); ?>">
                                   <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Profile
                               </a>
                           <?php } elseif ($user['role'] == 4) { ?>
                               <a class="dropdown-item" href="<?= base_url('peneliti/c_peneliti/profil'); ?>">
                                   <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Profile
                               </a>
                           <?php } elseif ($user['role'] == 3) { ?>
                               <a class="dropdown-item" href="<?= base_url('verifikator/c_verifikator/profil'); ?>">
                                   <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Profile
                               </a>
                           <?php } else { ?>
                               <a class="dropdown-item" href="<?= base_url('adminunit/c_adminunit/profil'); ?>">
                                   <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Profile
                               </a>
                           <?php } ?>

                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                               Logout
                           </a>
                       </div>
                   </li>

               </ul>

           </nav>
           <!-- End of Topbar -->