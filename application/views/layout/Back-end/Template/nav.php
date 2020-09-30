    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?= base_url('assets/images/foto_profil/')?><?= $akun['foto_profil']; ?>">
          </div>
        </a>
        <a href="" class="simple-text logo-normal">
          <?= $akun['nama_depan']; ?>
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
            <?php
            $level_akses = $this->session->userdata('level_akses');
            
            $queryMenu = "SELECT `usermenu`.`id` , `menu` 
                            FROM `usermenu` JOIN `user_akses_menu`
                            ON `usermenu`.`id` = `user_akses_menu`.`menuakses`
                            WHERE `user_akses_menu`.`userakses` = $level_akses 
                            ORDER BY `user_akses_menu`.`menuakses` ASC
                            ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>
          <?php foreach ($menu as $m) : ?>
          <!-- menu header <?= $m['menu']; ?> -->
          <!-- sub menu looping -->
          <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT * 
                                    FROM `usersubmenu` JOIN `usermenu`
                                    ON `usersubmenu`.`menu_id` = `usermenu`.`id`
                                    WHERE `usersubmenu`.`menu_id` = $menuId 
                                    AND `usersubmenu`.`is_active` = 1
                                    ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
          <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($judul_halaman == $sm['title']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li class="">
                        <?php endif; ?>

                        <a class="nav-link pt-0" href="<?= base_url('') . $sm['url']; ?>">
                            <i class="nc-icon <?= $sm['icon']; ?>"></i>
                            <p><?= $sm['title']; ?></p>
                        </a>
                        </li>
                    <?php endforeach; ?>
                    <hr class="sidebar-divider">
                <?php endforeach; ?>
                  <li class="">
                  <a href="<?= base_url('HalUtama')?>" class="nav-link pt-0">
                <i class="nc-icon nc-shop" ></i>
                <p>Beranda</p>
                </a>
                </li>

                <li class="">
                  <a href="<?= base_url('login/logout')?>" class="nav-link pt-0">
                <i class="nc-icon nc-button-power" ></i>
                <p>Logout</p>
                </a>
                </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="#pablo">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="#pablo">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">
  -->
      <div class="content">