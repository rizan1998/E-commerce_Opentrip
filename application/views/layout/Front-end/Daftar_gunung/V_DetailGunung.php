
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
                <a href="<?= base_url('HalUtama')?>" style="color: white;">
                Daftar Gunung
                </a>
              </li>
              <li class="breadcrumb-item active">
                Detail Data Gunung
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details">
            <h1>Gunung <?= $detailPaket['nama_gunung'];   ?></h1>
            <p><?= $detailPaket['alamat'];   ?></p>
            <div class="gallery">
              <div class="xzoom-container">
                <img src="<?=base_url('assets/images/gunung/'.$detailPaket['gambar_satu'])?>" alt="" class="xzoom" id="xzoom-default"
                  xoriginal="<?=base_url('assets/images/gunung/'.$detailPaket['gambar_satu'])?>">
              </div>
              <div class="xzoom-thumbs t-center">
                <a href="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_satu'];?>">
                  <img src="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_satu'];?>" class="xzoom-gallery" width="128"
                    xpreview="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_satu'];?>">
                </a>
                <a href="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_dua'];?>">
                  <img src="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_dua'];?>" class="xzoom-gallery" width="128"
                    xpreview="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_dua'];?>">
                </a>
                <a href="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_tiga'];?>">
                  <img src="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_tiga'];?>" class="xzoom-gallery" width="128"
                    xpreview="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_tiga'];?>">
                </a>
                <a href="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_empat'];?>">
                  <img src="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_empat'];?>" class="xzoom-gallery" width="128"
                    xpreview="<?=base_url('assets/images/gunung/')?><?=$detailPaket['gambar_empat'];?>">
                </a>
              </div>
            </div>
            <h2 class="">Tentang Lokasi</h2>
            <p class="">
              <?= $detailPaket['keterangan']; ?>
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt accusantium dicta delectus vel a
              optio
              nam exercitationem, rerum beatae iste rem eligendi est saepe atque praesentium accusamus perferendis
              deleniti culpa.</p>
              <hr>
              <h5>Fasilitas</h5>
           
          </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card card-details card-right">
            <h2>Penyedia Paket</h2>
            <div class="designed-by mt-2">
              <div class="row">
                <div class="col-2" style="overflow:hidden; border-radius:100%; height:50px; width:50px; border: 1px solid black;">
                  <img src="<?= base_url('assets/images/foto_profil/')?>" alt="" class="member-image img-fluid ">
                </div>
                <div class="col guide-info">
                  <h4></h4>
                  <p></p>
                </div>
              </div>
            </div>
            
            
            <hr>
            <h2 class="mb-2">Informasi paket</h2>
            
          </div>
          <div class="join-container">
             <?php if($this->session->userdata('email')): ?>
            <a href="checkout.html" data-toggle="modal" data-target="#newSubmenuModal" class="btn btn-block btn-join-now">Pesan Sekarang</a>
             <?php else: ?>
               <a href="<?= base_url('login')?>" class="btn btn-block btn-join-now">Pesan Sekarang</a>
             <?php endif; ?>
          </div>
        </div>

      </div>
    </div>
  </section>
