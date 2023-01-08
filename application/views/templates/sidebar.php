<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/logo.png'); ?>" width="60%" height="60%" style="display: block; margin-top: 2rem; margin-left: 2rem;">
        </div>
        <div style="margin-top: 2rem; margin-right: 4rem;">SI PPO</div>
    </a>

    </br>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php
    $id_role = $this->session->userdata('role');
    $queryMenu = "SELECT *
                       FROM `tbl_user_menu` JOIN `tbl_user_akses_menu`
                       ON `tbl_user_menu`.`id_menu` = `tbl_user_akses_menu`.`id_menu`
                       WHERE `tbl_user_akses_menu`.`id_role` = $id_role
                       AND `tbl_user_menu`.`is_aktif_menu` = '1'
                       ORDER BY `tbl_user_akses_menu`.`id_user_akses_menu` ASC
                    --    ORDER BY `tbl_user_akses_menu`.`id_menu` ASC
                   ";

    $menu = $this->db->query($queryMenu)->result_array();
    // var_dump($menu);
    ?>



    <?php foreach ($menu as $m) : ?>
        <?php if ($judul == $m['nama_menu']) : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link pb-0" href="<?= base_url($m['url']); ?>">
                <i class="<?= $m['icon'] ?>"></i>
                <span><?= $m['nama_menu'] ?></span></a>
            </li>
        <?php endforeach; ?>



        <hr class="sidebar-divider mt-2">
        <!-- Nav Item - Charts -->
        <li class="nav-item pb-0">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->