
  <section class=" camp  ">
    <div class="container-fluid">
      <h1 class=" primary-title-text">Let's Trip!</h1>
      <p class="mb-3 secondary-title-text ">
        Jelajahi Keindahan Gunung di Pulau Jawa
        <span>Dengan Guide Terpercaya</span>
      </p>
      <div class="mobile-mt">
        <div class="search_box m-auto">
          <!-- <form action="">
            <input type="text" placeholder="Cari Destinasi Gunung?">
            <i class="fa fa-search"></i>
          </form> -->
        </div>
      </div>
    </div>
  </section>

  <div class="row container justify-content-center text-center m-auto">
    <div class="section-stats col-lg-6 justify-content-center ">
      <div class="row justify-content-center text-center">
        <div class="col-3 col-md-2 stats-detail text-center">
          <h2><?= $totalpaket; ?></h2>
          <p>Paket</p>
        </div>
        <div class="col-3 col-md-2 stats-detail">
          <h2><?= $totalguide; ?></h2>
          <p>Guide</p>
        </div>
        <div class="col-3 col-md-2 stats-detail">
          <h2><?= $totalgunung; ?></h2>
          <p>Gunung</p>
        </div>
      </div>
    </div>
  </div>



  <!-- New Product -->
  <section class="newproduct  p-t-45 p-b-70">
    <div class="container">
      <div class="sec-title">
        <h2 class="t-center t-p-primary-text">
          Paket Pendakian
        </h2>
        <p class=" t-center secondary-text ">
          temukan Paket Pendakian yang diinginkan dengan lebih mudah dan cepat
        </p>
      </div>

      <!-- Slide2 -->
      <div class="wrap-slick2">
        <div class="slick2">
        <?php foreach($paket_pendakian as $pp): ?>
          <div class="item-slick2 p-l-15 p-r-15">
            <!-- Block2 -->
            <div class="block2">
              <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew" data-content="<?= $pp->kouta_paket;?>"
                data-toggle="popover-hover" data-img="https://mdbootstrap.com/img/logo/mdb192x192.jpg">
                <img src="<?= base_url('assets/images/gunung/');?><?= $pp->gambar_lima?>" alt="img-paket">

                <div class="block2-overlay trans-0-4">
                  <p class="block2-btn-addwishlist hov-pointer hv-primary-text trans-0-4">
                  <?php echo date('d-m-y', strtotime($paket_pendakian = $pp->tanggal_mulai))?>
                  </p>
                  <div class="block2-btn-addcart btn-cart-hv  trans-0-4">
                    <!-- Button -->
                    <a href="<?= base_url('HalUtama/lihatDetailPaket/'. $pp->kodepaket);?>">
                      <button class="flex-c-m bg4 bo-rad-23 hov1 hv-primary-text trans-0-4">
                        PESAN
                      </button>
                    </a>
                  </div>
                </div>
              </div>

              <div class="block2-txt p-t-5">
                <p class="block2-name dis-block paket-primary-text p-b-2">
                Gunung <?= $pp->nama_gunung; ?>
                </p>

                <span class="block2-price paket-secondary-text ">
                  RP. <?= $pp->harga_paket; ?>
                </span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
        
      </div>
      <!-- Slide2 -->
      <div class="wrap-slick4 mt-4 ">
        <div class="slick4">
          <?php foreach($paket_pendakian2 as $pp2): ?>
          <div class="item-slick2 p-l-15 p-r-15">
            <!-- Block2 -->
            <div class="block2">
              <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew" data-content="<?= $pp2->kouta_paket;?>"
                data-toggle="popover-hover" data-img="https://mdbootstrap.com/img/logo/mdb192x192.jpg">
                <img src="<?= base_url('assets/images/gunung/');?><?= $pp2->gambar_lima?>" alt="img-paket">

                <div class="block2-overlay trans-0-4">
                  <p class="block2-btn-addwishlist hov-pointer hv-primary-text trans-0-4">
                    <?php echo date('d-m-y', strtotime($paket_pendakian = $pp->tanggal_mulai))?>
                  </p>
                  <div class="block2-btn-addcart btn-cart-hv  trans-0-4">
                    <!-- Button -->
                    <a href="<?= base_url('HalUtama/lihatDetailPaket/'. $pp2->kodepaket);?>">
                      <button class="flex-c-m bg4 bo-rad-23 hov1 hv-primary-text trans-0-4">
                        PESAN
                      </button>
                    </a>
                  </div>
                </div>
              </div>

              <div class="block2-txt p-t-5">
                <p class="block2-name dis-block paket-primary-text p-b-2">
                Gunung <?= $pp2->nama_gunung; ?>
                </p>

                <span class="block2-price paket-secondary-text ">
                  RP. <?= $pp2->harga_paket; ?>
                </span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        </div>
      </div>
    </div>
  </section>

  <section class="camping-now-heading" id="campingNow">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>Tunggu Apa Lagi ? <br>Yuk Mulai Pesan Sekarang</h2>
          <p>Nikmati indahnya gunung dipulau jawa bersama kami</p>
          <a href="<?= base_url('assets/Template/view_Front-end/');?>#popular" class="btn btn-camping-now page-scroll
              ">Pesan Kearang</a>
        </div>
      </div>
    </div>
  </section>
  <div class="mt-5"></div>
  <!-- guide -->
  <section class="guide-beranda p-t-40 p-b-40 ">
    <div class="container">
      <div class="sec-title p-b-60 text-center">
        <h2 class=" guide-primary-text">
          Agency or Guide
        </h2>
        <p class="mt-2">
          Buat Pengamalaman mendakimu menyenangkan dengan guide terpercaya
        </p>
      </div>
      <div class=" wrap-slick5">
        <div class=" slick5 text-center">
        <?php foreach($guide as $gd): ?>
          <div class=" item-slick4 ">
            <div  class="img-guide-branda m-auto">
              <img style="height=40px;" src="<?= base_url('assets/images/foto_profil/'.$gd->foto_profil);?>" class="img-fluid" alt="guide img">
            </div>
            <h4 class="mt-2"><?= $gd->nama_depan?></h4>
            <p><?= $gd->email; ?></p>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
