<!-- Content Wrapper -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class=" mb-lg-4 mb-2 row">
      <div class="col-sm-8">
      <h4 class="card-title"> Tambah Calon Pendaki</h4>
      <p class="card-category"> </p>
      <hr>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
          <?= form_open_multipart('KelolaCalonPendaki/tambahCalonPendaki'); ?>
            <div class="form-group  mb-3 row">
                <label for="nama_depan" class="col-sm-2 col-form-label">Nama Depan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_depan" name="nama_depan">
                    <?= form_error('nama_depan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="email">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="password1" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="password2" class="col-sm-2 col-form-label">Ulangi password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password2" name="password2">
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="user_aktif" class="col-sm-2 col-form-label">User Aktif</label>
                <div class="form-group col-md-4">
                <select id="user_aktif" name="user_aktif" class="form-control">
                  <option selected value="1" > aktif</option>
                  <option valur="0" >Tidak Aktif</option>
                </select>
                <?= form_error('user_aktif', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group mt-1 mb-3 row justify-content-end">
                <div class="col-sm-10">
                    <button class="btn btn-primary" type="submit"> Tambah</button>
                    <a class="btn" href="<?= base_url('KelolaCalonPendaki')?>"> Kembali </a>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->