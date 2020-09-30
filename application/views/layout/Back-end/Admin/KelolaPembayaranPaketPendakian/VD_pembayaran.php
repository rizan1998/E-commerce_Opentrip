<!-- Content Wrapper -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class=" mb-lg-4 mb-2 row">
      <div class="col-sm-8">
      <h4 class="card-title"> Detail Data Pembayaran</h4>
      <p class="card-category"> </p>
      <hr>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $pembayaran['email']?>" name="">
                </div>
            </div>
            <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">nama pengirim</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $pembayaran['nama_pengirim']?>" name="">
                </div>
            </div>
            <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">Bank</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $pembayaran['bank']?>" name="">
                </div>
            </div>
             <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">nominal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $pembayaran['jumlah_nominal']?>" name="">
                </div>
            </div>
             
             <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">kode pembayaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $pembayaran['kode_pembayaran']?>" name="">
                </div>
            </div>
             <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">no rekening pengirim</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $pembayaran['no_rek_pengirim']?>" name="">
                </div>
            </div>
             <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">tanggal pembayaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $pembayaran['tanggal_pembayaran']?>" name="">
                </div>
            </div>
            <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">status pembayaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $pembayaran['status_pembayaran']?>" name="">
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
        <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">Destinasi</label>
                <div class="col-sm-10">
                    <img src="<?= base_url('assets/images/bukti_pembayaran/'.$pembayaran['gambar_bukti_pembayaran'])?>" alt="">
                </div>
            </div>
          <h5>Informasi Paket</h5>
          <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">Destinasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $gunung['nama_gunung']?>" name="">
                </div>
            </div>
            <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">kodepaket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $paket_pendakian['kodepaket']?>" name="">
                </div>
            </div>
            
            <div class="form-group  mb-3 row">
                <label for="" class="col-sm-2 col-form-label">harga paket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="" value="<?= $paket_pendakian['harga_paket']?>" name="">
                </div>
            </div>
            <div class="row">
              <div class="col-sm-12 text-right">
                <a class="btn" href="<?= base_url('Pembayaran/lihatStatusPembayaran')?>"> Kembali </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->