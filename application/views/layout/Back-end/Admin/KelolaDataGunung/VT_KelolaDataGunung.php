<!-- Content Wrapper -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class=" mb-lg-4 mb-2 row">
        <div class="col-sm-8">
            <h4 class="card-title"> Tambah Data Gunung</h4>
            <p class="card-category"> </p>
            <hr>
        </div>
    </div>
    <?= form_open_multipart('Gunung/tambahDataGunung'); ?>
    <div class="row">
        <div class="col-lg-6">
            <h5 class="mb-2" >Data Gunung</h5>
            <div class="form-group  mb-3 row">
                <label for="kode_gunung" class="col-sm-2 col-form-label">Kode Gunung</label>
                <div class="col-sm-10">
                    <input type="text" readonly value="DGN<?php echo sprintf("%03s", $kode_gunung) ?>"  class="form-control" id="kode_gunung" name="kode_gunung">
                    <?= form_error('kode_gunung', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="nama_gunung" class="col-sm-2 col-form-label">Nama gunung</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="masukan nama gunung" class="form-control" id="nama_gunung" name="nama_gunung">
                    <?= form_error('nama_gunung', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="ketinggian" class="col-sm-2 col-form-label">Ketiggian</label>
                <div class="col-sm-10">
                    <input type="number" placeholder="masukan ketinggian gunung" class="form-control" id="ketinggian" name="ketinggian">
                    <?= form_error('ketinggian', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="rata_rata_suhu" class="col-sm-2 col-form-label">Rata - rata suhu</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="rata_rata_suhu" placeholder="masukan rata-rata suhu" name="rata_rata_suhu">
                    <?= form_error('rata_rata_suhu', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                <div class="col-sm-10">
                    <textarea class="form-control " id="keterangan" name="keterangan" placeholder="masukan keterangan gunung" ></textarea>
                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
                
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="masukan keterangan alamat" ></textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            
        </div>
        <div class="col-lg-6">
            <h5 class="mb-2" >Jalur Pendakian</h5>
            <div class="form-group mb-3 row">
                <label for="nama_jalur" class="col-sm-2 col-form-label">Nama Jalur</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="masukan nama gunung" class="form-control" id="nama_jalur" name="nama_jalur">
                    <?= form_error('nama_jalur', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="jumlah_pos" class="col-sm-2 col-form-label">Jumlah Pos</label>
                <div class="col-sm-10">
                    <input type="number" placeholder="masukan jumlah_pos gunung" class="form-control" id="jumlah_pos" name="jumlah_pos">
                    <?= form_error('jumlah_pos', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="jarak_jalur" class="col-sm-2 col-form-label">Jarak Jalur</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="jarak_jalur" placeholder="masukan rata-rata suhu" name="jarak_jalur">
                    <?= form_error('jarak_jalur', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             <div class="form-group mb-3 row">
                <label for="foto_jalur" class="col-sm-2 col-form-label">Foto Jalur</label>
                <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto_jalur" id="foto_jalur">
                    <label class="custom-file-label" for="foto_jalur">Choose file</label>
                </div>
                <?= form_error('foto_jalur', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group mb-3 row">
                <label for="gambar_basecamp" class="col-sm-2 col-form-label">Gambar basecamp</label>
                <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar_basecamp" id="gambar_basecamp">
                    <label class="custom-file-label" for="gambar_basecamp">Choose file</label>
                </div>
                <?= form_error('gambar_basecamp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <h5 class="mb-2 mt-lg-2 ml-3 " >Galley gunung</h5>
            <div class="col-sm-10">
                <div class=" custom-file">
                    <input type="file" class="custom-file-input" name="gambar_satu" id="gambar_satu">
                    <label class="custom-file-label" for="gambar_satu">gambar 1</label>
                </div>
                <?= form_error('gambar_satu', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-sm-10">
                <div class=" custom-file">
                    <input type="file" class="custom-file-input" name="gambar_dua" id="gambar_dua">
                    <label class="custom-file-label" for="gambar_dua">gambar 2</label>
                </div>
                <?= form_error('gambar_dua', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-sm-10">
                <div class=" custom-file">
                    <input type="file" class="custom-file-input" name="gambar_tiga" id="gambar_tiga">
                    <label class="custom-file-label" for="gambar_tiga">gambar 3</label>
                </div>
                <?= form_error('gambar_tiga', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-sm-10">
                <div class=" custom-file">
                    <input type="file" class="custom-file-input" name="gambar_empat" id="gambar_empat">
                    <label class="custom-file-label" for="gambar_empat">gambar 4</label>
                </div>
                <?= form_error('gambar_empat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-sm-10">
                <div class=" custom-file">
                    <input type="file" class="custom-file-input" name="gambar_lima" id="gambar_lima">
                    <label class="custom-file-label" for="gambar_lima">gambar 5</label>
                </div>
                <?= form_error('gambar_lima', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
        <div class="form-group mt-1 mb-3 row justify-content-end align-self-center">
                <div class="col-lg-12 ">
                    <button class="btn btn-primary" type="submit"> Tambah</button>
                    <a class="btn" href="<?= base_url('Gunung')?>"> Kembali </a>
                </div>
            </div>
        </div>
    </div>
</form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->