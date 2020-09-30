 <section class=" camp  ">
    <div class="container-fluid">
    </div>
  </section>


  <section class="section-details-content">
    <div class="container">
      <div class="row">
        <div class="col ">
          <nav class="pb-2">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                Kategori
              </li>
              <li class="breadcrumb-item active">
                Detail <?= $kateogri;?>
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 pl-lg-0">
          <div class="card card-details">
            <h3 class="mb-3">Kategori Safana</h3>
            <div class="row">
              <?php foreach($kategori as $pp): ?>
              <div class="col-lg-3 mt-3 col-6">
                <!-- Block2 -->
                <div class="block2">
                  <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew" data-content="<?= $pp->kouta_paket;?>"
                    data-toggle="popover-hover" data-img="https://mdbootstrap.com/img/logo/mdb192x192.jpg">
                    <img src="<?= base_url('assets/images/gunung/');?><?= $pp->gambar_lima?>">

                    <div class="block2-overlay trans-0-4">
                      <p class="block2-btn-addwishlist hov-pointer hv-primary-text trans-0-4">
                        <?php echo date('d-m-y', strtotime($kt = $pp->tanggal_mulai))?>
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
                      <?= $pp->nama_gunung; ?>
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
        </div>
      </div>
  </section>

