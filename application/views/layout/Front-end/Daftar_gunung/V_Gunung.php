
  <section class=" camp  ">
    <div class="container-fluid">
      <h1 class=" primary-title-text">Daftar Gunung</h1>
      <p class="mb-3 secondary-title-text ">
        Cari Informasi Gunung yang akan didaki dengan lebih mudah
      </p>
    </div>
  </section>


  <div class="container mb-5 text-center ">


    <!-- similar product -->
    <section class="category-opentrip ">
      <div class="row">
      <?php foreach($gunung as $pp): ?>
        <div class="col-md-4 mt-2 col-sm-6">
          <a href="<?= base_url('HalUtama/lihatDetialDataGunung/'.$pp->kode_gunung)?>">
          <figure class="figure">
              <div class="hgwd-img">
                <img src="<?= base_url('assets/images/gunung/'.$pp->gambar_satu)?>" class="figure-img img-fluid">
              </div>
              <figcaption class="figure-caption">
                <div class="row">
                  <div class="col text-left">
                    <h5 class="mt-2"><?= $pp->nama_gunung;?></h5>
                    <p><?= $pp->ketinggian; ?></p>
                  </div>
                  <!-- <div class="col align-items-center d-flex justify-content-end">

                </div> -->
                </div>
              </figcaption>
            </a>
          </figure>
        </div>
       <?php endforeach; ?>


      </div>
    </section>
    <!-- Akhir similar product -->
  </div>
  <!-- akhir container -->

