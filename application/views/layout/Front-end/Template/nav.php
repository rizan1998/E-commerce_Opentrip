<!-- Header -->
  <header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">


      <div class="wrap_header">
        <!-- Logo -->
        <a href="<?= base_url('assets/Template/view_Front-end/');?>index.html" class="logo">
          <img src="<?= base_url('assets/Template/view_Front-end/');?>images/icons/OpenTripLogo.png" alt="IMG-LOGO">
        </a>

        <!-- Menu -->
        <div class="wrap_menu">
          <nav class="menu">
            <ul class="main_menu">
              <li class="<?php  
              if($navActive == 'Beranda') {
                echo 'sale-noti';
              } else {
                echo '';
              }
              ?>">
                <a href="<?= base_url('HalUtama');?>">Beranda</a>
              </li>

              <li class="<?php  
              if($navActive == 'Kategori') {
                echo 'sale-noti';
              } else {
                echo '';
              }
              ?>">
                <a href="<?= base_url('HalUtama/Kategori');?>">Kategori</a>
              </li>

              <li class="<?php  
              if($navActive == 'Gunung') {
                echo 'sale-noti';
              } else {
                echo '';
              }
              ?>">
                <a href="<?= base_url('HalUtama/daftar_Gunung');?>">Daftar Gunung</a>
              </li>

              <li class="<?php 
              if($navActive == 'Guide') {
                echo 'sale-noti';
              } else {
                echo '';
              }
              ?>">
                <a href="<?= base_url('HalUtama/daftar_Guide');?>">Guide</a>
              </li>

              <li class="<?php  
              if($navActive == 'Kontak') {
                echo 'sale-noti';
              } else {
                echo '';
              }
              ?>">
                <a href="<?= base_url('Feedback');?>">Kontak</a>
              </li>
            </ul>
          </nav>
        </div>

        <!-- Header Icon -->
        <div class="header-icons" style="z-index:5;">

          <div class="header-wrapicon2" >
          <?php if($this->session->userdata('email')): ?>
            <img src="<?= base_url('assets/Template/view_Front-end/');?>images/icons/icons8-shopping-cart-90.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">

            <?php  
            $email = $this->session->userdata('email');
            $this->db->where('email =', $email);
            $query = $this->db->get('pemesanan');
              if($query->num_rows()>0){       
                  echo $query->num_rows();
              }else{
                  echo 0;
              } 
              ?>
            </span>
          <?php else: ?>
          <?php endif; ?>
            <!-- Header cart noti -->
            <div class="header-cart header-dropdown" >
               <ul class="header-cart-wrapitem" >
          <?php if($this->session->userdata('email')): ?>
            <?php
              $email = $this->session->userdata('email');
              $this->db->where('email =', $email);
              $pemesanan = $this->db->get('pemesanan')->result_array();
            ?>
            <?php foreach($pemesanan as $ps): ?>
             
                <li class="header-cart-item">
                  <div class="header-cart-item-img">
                    <img src="<?= base_url('assets/images/gunung/'. $ps['foto_pemesanan']);?>" alt="IMG">
                  </div>
                  
                  <div class="header-cart-item-txt">
                    <a href="<?= base_url('assets/Template/view_Front-end/');?>#" class="header-cart-item-name">
                      <?= $ps['nama_gunung']; ?>
                    </a>

                    <span class="header-cart-item-info">
                      <?= $ps['harga_paket']; ?>
                    </span>
                  </div>
                </li>
             
            <?php endforeach; ?>
             </ul>
            <?php else: ?>
          <?php endif; ?>
              <div class="header-cart-buttons">

                <div class="header-cart-wrapbtn ml-auto">
                  <!-- Button -->
                  <a href="<?= base_url('Pembayaran');?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Lihat Detail
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php if($this->session->userdata('email')): ?>
          <span class="linedivide1"></span>
          <a href="<?= base_url('login');?>" class="header-wrapicon1 dis-block">
            <img src="<?= base_url('assets/Template/view_Front-end/');?>images/icons/icons8-male-user-90.png" class="header-icon1" alt="ICON">
          </a>
          <?php else: ?>
          <a href="<?= base_url('Login')?>">
              <button class="btn btn-block btn-warning">Login</button>
          </a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
      <!-- Logo moblie -->
      <a href="<?= base_url('assets/Template/view_Front-end/');?>index.html" class="logo-mobile">
        <img src="<?= base_url('assets/Template/view_Front-end/');?>images/icons/brandOpenTripMobile.png" alt="IMG-LOGO">
      </a>

      <!-- Button show menu -->
      <div class="btn-show-menu">
        <!-- Header Icon mobile -->
        <div class="header-icons-mobile">
          <!-- <a href="<?= base_url('assets/Template/view_Front-end/');?>#" class="header-wrapicon1 dis-block">
            <img src="<?= base_url('assets/Template/view_Front-end/');?>images/icons/account-icon.png" class="header-icon1" alt="ICON">
          </a> -->



          <div class="header-wrapicon2">
          <?php if($this->session->userdata('email')) :?>
            <img src="<?= base_url('assets/Template/view_Front-end/');?>images/icons/icons8-shopping-cart-90.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">
            
            <?php  
            $email = $this->session->userdata('email');
            $this->db->where('email =', $email);
            $query = $this->db->get('pemesanan');
              if($query->num_rows()>0){       
                  echo $query->num_rows();
              }else{
                  echo 0;
              } 
              ?>
            </span>
          <?php else: ?>
          <?php endif; ?>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
               <ul class="header-cart-wrapitem">
            <?php if($this->session->userdata('email')): ?>
                <?php
                  $email = $this->session->userdata('email');
                  $this->db->where('email =', $email);
                  $pemesanan2 = $this->db->get('pemesanan')->result_array();
                ?>
            <?php foreach($pemesanan2 as $ps1): ?>
             
                <li class="header-cart-item">
                
                  <div class="header-cart-item-img">
                    <img src="<?= base_url('assets/images/gunung/'. $ps1['foto_pemesanan']);?>" alt="IMG">
                  </div>

                  <div class="header-cart-item-txt">
                    <a href="<?= base_url('assets/Template/view_Front-end/');?>#" class="header-cart-item-name">
                      <?= $ps1['nama_gunung']; ?>
                    </a>

                    <span class="header-cart-item-info">
                      <?= $ps1['harga_paket']; ?>
                    </span>
                  </div>
                </li>
             
            <?php endforeach; ?>
             </ul>
            <?php else: ?>
            <?php endif; ?>
              <div class="header-cart-buttons">
                <div class="ml-auto header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="<?= base_url('Pembayaran');?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Lihat Detail
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </div>
      </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu">
      <nav class="side-menu">
        <ul class="main-menu">

          

          <li class="item-menu-mobile <?php  
              if($navActive == 'Beranda') {
                echo 'sale-noti';
              } else {
                echo '';
              }
              ?>">
            <a href="<?= base_url('HalUtama');?>">Beranda</a>
          </li>

          <li class="item-menu-mobile  <?php  
              if($navActive == 'Kategori') {
                echo 'sale-noti';
              } else {
                echo '';
              }
              ?>">
            <a href="<?= base_url('HalUtama/kategori');?>">Kategori</a>
          </li>

          <li class="item-menu-mobile  <?php  
              if($navActive == 'Gunung') {
                echo 'sale-noti';
              } else {
                echo '';
              }
              ?>">
            <a href="<?= base_url('HalUtama/daftar_Gunung');?>">Daftar Gunung</a>
          </li>

          <li class="item-menu-mobile  <?php  
              if($navActive == 'Guide') {
                echo 'sale-noti';
              } else {
                echo '';
              }
              ?>">
            <a href="<?= base_url('HalUtama/daftar_Guide');?>">Guide</a>
          </li>

          <li class="item-menu-mobile  <?php  
              if($navActive == 'Kontak') {
                echo 'sale-noti';
              } else {
                echo '';
              }
              ?>">
            <a href="<?= base_url('Feedback');?>">Kontak</a>
          </li>
          <li class="item-menu-mobile" style="background: #f99f00; color: black;" >
            <?php if($this->session->userdata('email')): ?>
              <a href="<?= base_url('User');?>">My Profil</a>
            <?php else: ?>
              <a href="<?= base_url('login');?>">Login</a>
            <?php endif; ?>
          </li>
        </ul>
      </nav>
    </div>
  </header>
