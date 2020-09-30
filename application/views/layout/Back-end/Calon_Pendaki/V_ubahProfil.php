 <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form action="<?= base_url('User/ubahProfil')?>" method="post">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" disabled="" placeholder="Company" value="<?= $akun['email']?>">
                      </div>
                    </div>
                   <input type="hidden" name="id" value="<?=$akun['id']?>">
                  </div>
                  <div class="row">
                  <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Nama Belakang</label>
                        <input type="text" class="form-control" name="nama_depan" placeholder="Last Name" value="<?= $akun['nama_depan']?>">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nama Belakang</label>
                        <input type="text" class="form-control" name="nama_belakang" placeholder="Company" value="<?= $akun['nama_belakang']?>">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Home Address" value="<?= $akun['alamat']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No Telepon</label>
                        <input type="number" class="form-control" name="no_telepon" placeholder="Home Address" value="<?= $akun['no_telepon']?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/images/foto_profil/') . $akun['foto_profil']; ?>" class="img-thumbnail " alt="">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" value="" class="custom-file-input" name="foto_profil" id="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/images/foto_profil/') . $akun['foto_sampul']; ?>" class="img-thumbnail " alt="">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" value="" class="custom-file-input" name="foto_sampul" id="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Ubah Profil</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>