<!-- Content Wrapper -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class=" mb-lg-4 mb-2 row">
      <div class="col-sm-8">
      <h4 class="card-title">Paket Pendakian <?= $pemesanan['nama_gunung']; ?></h4>
      <div>
      <img src="<?= base_url('assets/images/gunung/'.$pemesanan['gambar_satu'])?>" class="img-fluid" style="height:120px;" alt="">
    </div>
      <p class="card-category">
      </p>
      <hr>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
          <div class="form-group  mb-3 row">
                <label for="bank" class="col-sm-2 col-form-label">kode paket</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" readonly id="bank" name="bank" value="<?= $pemesanan['kodepaket']?>">
                   
                </div>
            </div>
            <div class="form-group  mb-3 row">
                <label for="bank" class="col-sm-2 col-form-label">Penyedia Paket</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" readonly id="bank" name="bank" value="<?= $pemesanan['nama_depan']?> <?= $pemesanan['nama_belakang']?>">
                   
                </div>
            </div>
            <div class="form-group  mb-3 row">
                <label for="nama_pengirim" class="col-sm-2 col-form-label">Sisa kouta</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" id="nama_pengirim" name="nama_pengirim" readonly value="<?= $pemesanan['kouta_paket']?>">
                    
                </div>
            </div>
            <div class="form-group  mb-3 row">
                <label for="bank" class="col-sm-2 col-form-label">Tanggal mulai</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" readonly id="bank" name="bank" value="<?= $pemesanan['tanggal_mulai']?>">
                </div>
            </div>
            <div class="form-group  mb-3 row">
                <label for="bank" class="col-sm-2 col-form-label">Tanggal berakhir</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" readonly id="bank" name="bank" value="<?= $pemesanan['tanggal_berakhir']?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="titik_kumpul">Titik kumpul</label>
                <div class="col-sm-10">
                    <textarea name="titik_kumpul" class="form-control" id="titik_kumpul" readonly placeholder="masukan keterangan titik_kumpul" ><?= $pemesanan['titik_kumpul']; ?></textarea>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="titik_kumpul">Perlengkapan Pribadi</label>
                <div class="col-sm-10">
                    <textarea readonly name="titik_kumpul" class="form-control" id="titik_kumpul" placeholder="masukan keterangan titik_kumpul" ><?= $pemesanan['perlengkapan_pribadi']; ?></textarea>
                </div>
            </div>
            <div class="form-group mt-5 mb-3 row">
                <div class="col-sm-12 text-right">
                    <a class="btn" href="<?= base_url('PaketPendakian')?>"> Kembali </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    
      <div class="col-lg-8">
      <h5>Data Peserta</h5>
      <hr>
         <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        no
                    </th>
                    <th>
                      foto
                    </th>
                      <th>
                        Nama
                      </th>
                      <th>
                        alamat
                      </th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                

                    <?php foreach ($datapesertapaket as $u) :  ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row">
                            <img class="user-table-item" src="<?= base_url('assets/images/foto_profil/').$u->foto_profil?>" alt="">
                            </td>
                            <td><?= $u->nama_depan?> </td>
                            <td><?= $u->alamat; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
      </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->