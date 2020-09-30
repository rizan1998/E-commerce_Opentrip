
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
                Beranda
                </a>
              </li>
              <li class="breadcrumb-item active">
                Detail Paket
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
            <?php foreach($fasilitas as $fls): ?>
            <div>
            <p style="black" ><b> <?= $fls->nama_fasilitas; ?></b></p>
            <p> <b> Keterangan :</b> <?= $fls->keterangan_fasilitas; ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card card-details card-right">
            <h2>Penyedia Paket</h2>
            <div class="designed-by mt-2">
              <div class="row">
                <div class="col-2" style="overflow:hidden; border-radius:100%; height:50px; width:50px; border: 1px solid black;">
                  <img src="<?= base_url('assets/images/foto_profil/' . $user['foto_profil'])?>" alt="" class="member-image img-fluid ">
                </div>
                <div class="col guide-info">
                  <h4><?= $user['nama_depan'];?> <?= $user['nama_belakang']?></h4>
                  <p><?= $detailPaket['email']; ?></p>
                </div>
              </div>
            </div>
            
            
            <hr>
            <h2 class="mb-2">Informasi paket</h2>
            <table class="trip-informations">
              <tr>
                <th width="50%">Kode Paket:</th>
                <td width=" 50%" class="text-right"><?= $detailPaket['kodepaket']; ?></td>
              </tr>
              <tr>
                <th width="50%">Tanggal Mulai:</th>
                <td width=" 50%" class="text-right">
                <?php echo date('d-m-Y', strtotime($detailPaket['tanggal_mulai']))?></td>
              </tr>
              <tr>
                <th width="50%">Tanggal Berakhir:</th>
                <td width=" 50%" class="text-right"> <?php echo date('d-m-Y', strtotime($detailPaket['tanggal_berakhir']))?></td>
              </tr>
              <tr>
                <th width="50%">Kouta:</th>
                <td width=" 50%" class="text-right"><?= $detailPaket['kouta_paket']; ?></td>
              </tr>
              <tr>
                <th width="50%">Harga:</th>
                <td width=" 50%" class="text-right"><?= $detailPaket['harga_paket']; ?></td>
              </tr>
            </table>
            <hr>
            <h5> Titik Kumpul:</h5>
            <p><?= $detailPaket['titik_kumpul']; ?></p>
            <hr>
            <h5> Perlengkapan Pribadi:</h5>
            <p><?= $detailPaket['perlengkapan_pribadi']; ?></p>
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

<!-- Modal -->
<div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Pemesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Pemesanan/pesanPaket'); ?>" method="post">
                <div class="modal-body">
                <?php if($this->session->userdata('email')): ?>
                  Tambah Paket Pendakian <b> <?= $detailPaket['nama_gunung'];?> </b> ke dengan harga <?= $detailPaket['harga_paket'] ?> keranjang?
                  <input type="hidden" name="nama_gunung" value="<?= $detailPaket['nama_gunung'];?>">
                <?php else: ?>
                  Login terlebih dahulu untuk memesan
                <?php endif; ?>
                </div>
                <input type="hidden" required name="kode_pemesanan" value="KDP<?php echo sprintf("%03s", $kode_pemesanan)?>">

                <?php if ($this->session->userdata('email')): ?>
                  <input type="hidden" required name="email" value="<?= $akun['email'];?>">
                  
                  <input type="hidden" name="harga_paket" value="<?= $detailPaket['harga_paket'];?>">
                  <input type="hidden" name="foto_pemesanan" value="<?= $detailPaket['gambar_lima'];?>">
                <?php else: ?> 
                  <input type="hidden" name="email" value="">
                <?php endif; ?>
                <input type="hidden" name="kode_paket" value="<?= $detailPaket['kodepaket'];?>">
                <div class="modal-footer">
                <?php if($this->session->userdata('email')): ?>
                <button type="submit" class="btn btn-warning">Tambah</button>
                <?php else: ?> 
                <a href="<?= base_url('Login')?>" class="btn btn-warning">Login</a>
                <?php endif; ?>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>