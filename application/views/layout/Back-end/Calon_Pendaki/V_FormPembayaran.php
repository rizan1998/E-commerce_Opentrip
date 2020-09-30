<!-- Content Wrapper -->
<?php if($bank['bank']): ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class=" mb-lg-4 mb-2 row">
      <div class="col-sm-8">
      
    <div>
      <img src="<?= base_url('assets/images/bank_logo/'.$bank['bank'].'_LOGO.jpg')?>" class="img-fluid" style="height:60px;" alt="">
    </div>
      <h4 class="card-title"> Kirim Bukti Pembyaran</h4>
      <p class="card-category">
        Kirim bukti pembayaran memlalui bank <?= $bank['bank']; ?> Pastikan nominal pembayaran sesuai dengan Paket yang dipesan, karena jika tidak sesuai Pembayaran tidak akan di konfirmasi oleh pihak admin.
      </p>
      <hr>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
          <?= form_open_multipart('Pembayaran/kirimPembayaran'); ?>
            <div class="form-group  mb-3 row">
                <label for="bank" class="col-sm-2 col-form-label">Bank</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" readonly id="bank" name="bank" value="<?= $bank['bank'];?>">
                   
                </div>
            </div>
            <div class="form-group  mb-3 row">
                <label for="nama_pengirim" class="col-sm-2 col-form-label">Nama Pengirim</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" id="nama_pengirim" name="nama_pengirim" value="<?= $nama_pengirim['nama_depan'];?> <?= $nama_pengirim['nama_belakang']?>">
                    
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="no_rek_pengirim" class="col-sm-2 col-form-label">No Rek</label>
                <div class="col-sm-10">
                    <input type="number" required placeholder="Masukan nomor rekening pengirim" class="form-control" id="no_rek_pengirim" name="no_rek_pengirim">
                   
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="jumlah_nominal" class="col-sm-2 col-form-label">Jumlah Nominal</label>
                <div class="col-sm-10">
                    <input readonly required type="number" placeholder="Masukan nomor rekening pengirim" class="form-control" value="<?= $bank['harga_paket']?>" id="jumlah_nominal" name="jumlah_nominal">
                   
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="tanggal_pembayaran" class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                <div class="col-sm-10">
                    <input type="date" required placeholder="Masukan nomor rekening pengirim" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran">
                   
                </div>
            </div>
            <div class=" custom-file mt-3">
                    <input type="file" required class="custom-file-input" name="gambar_bukti_pembayaran" id="gambar_bukti_pembayaran">
                    <label class="custom-file-label" for="gambar_bukti_pembayaran">Gambar Bukti Pembayaran</label>
            </div>
            <input type="hidden" name="kode_pembayaran" value="PBN<?php echo sprintf("%03s", $kode_Pembayaran) ?>">
            <input type="hidden" name="kode_pemesanan" value="<?= $bank['kode_pemesanan']?>">
            <input type="hidden" name="email" value="<?= $bank['email']?>">
            <div class="form-group mt-5 mb-3 row">
                <div class="col-sm-12 text-right">
                    <button class="btn btn-primary" type="submit"> Kirim Bukti</button>
                    <a class="btn" href="<?= base_url('Pembayaran')?>"> Kembali </a>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php else:?>
  EROR
<?php endif; ?>
</div>
<!-- End of Main Content -->