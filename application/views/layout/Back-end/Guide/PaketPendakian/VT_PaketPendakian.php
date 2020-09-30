<!-- Content Wrapper -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class=" mb-lg-4 mb-2 row">
      <div class="col-sm-8">
      <h4 class="card-title"> Tambah Paket Pendakian</h4>
      <p class="card-category"> </p>
      <hr>
      </div>
    </div>

    <div class="row">
        
        <div class="col-lg-6">
        <?= form_open_multipart('paketpendakian/tambahPaketPendakian'); ?>
        <input type="hidden" name="kodepaket" value="PKT<?php echo sprintf("%03s", $kode_paket)?>">
            <div class="form-group mb-3 row">
                    <label for="user_aktif" class="col-sm-2 col-form-label">Destinasi</label>
                    <div class="form-group col-md-4">
                        <select id="user_aktif" name="kode_gunung" class="form-control">
                        <?php foreach ($gunung as $g ): ?>
                        <option value="<?= $g['kode_gunung'];?>">
                        <?= $g['nama_gunung']; ?>
                        </option>
                        <?php endforeach; ?>
                        </select>
                        <?= form_error('user_aktif', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
            <div class="form-group  mb-3 row">
                <label for="nama_depan" class="col-sm-2 col-form-label">Nama Guide</label>
                <div class="col-sm-10">
                    <input type="text" readonly value="<?= $akun['nama_depan'];?> <?=  $akun['nama_belakang'];?> " class="form-control" id="nama_depan" >
                    <?= form_error('nama_depan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly value="<?= $akun['email'];?>" class="form-control" id="name" name="email">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="harga_paket" class="col-sm-2 col-form-label">harga paket</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="name" name="harga_paket">
                    <?= form_error('harga_paket', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="no_rekening_admin" class="col-sm-2 col-form-label">No-rek</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="name" name="no_rekening_admin">
                    <?= form_error('no_rekening_admin', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal mulai</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                    <?= form_error('tanggal_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="tanggal_berakhir" class="col-sm-2 col-form-label">Tanggal berakhir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir">
                    <?= form_error('tanggal_berakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="kouta_paket" class="col-sm-2 col-form-label">Kouta Paket</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="kouta_paket" name="kouta_paket">
                    <?= form_error('kouta_paket', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="titik_kumpul">Titik kumpul</label>
                <div class="col-sm-10">
                    <textarea name="titik_kumpul" class="form-control" id="titik_kumpul" placeholder="masukan keterangan titik_kumpul" ></textarea>
                    <?= form_error('titik_kumpul', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="perlengkapan_pribadi">Perlengkapan Pribadi</label>
                <div class="col-sm-10">
                    <textarea name="perlengkapan_pribadi" class="form-control" id="perlengkapan_pribadi" placeholder="masukan keterangan perlengkapan_pribadi" ></textarea>
                    <?= form_error('perlengkapan_pribadi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <h4 class="card-title"> Masukan Fasilitas pertama</h4>
            <p>tambah fasilitas lainnya pada halaman ubah paket pendakian</p>
            <div class="form-group  mb-3 row">
                <label for="nama_depan" class="col-sm-2 col-form-label">Nama fasilitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas" >
                    <?= form_error('nama_depan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                    <label class="col-sm-2 col-form-label" for="titik_kumpul">Keterangan Fasilitas</label>
                    <div class="col-sm-10">
                        <textarea name="keterangan_fasilitas" class="form-control" id="keterangan_fasilitas" placeholder="masukan keterangan fasilitas" ></textarea>
                        <?= form_error('keterangan_fasilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group mt-1 mb-3 row justify-content-end">
                    <div class="col-sm-10">
                        <button class="btn btn-primary" type="submit"> Tambah</button>
                        <a class="btn" href="<?= base_url('PaketPendakian')?>"> Kembali </a>
                    </div>
            </div>
        </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->