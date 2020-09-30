 <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Ubah Password</h5>
                 <?= $this->session->flashdata('message'); ?>
              </div>
              <div class="card-body">
                <form action="<?= base_url('User/ubahPassword')?>" method="post">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Masukan Password Lama</label>
                        <input type="password" id="current_password" class="form-control" name="current_password">
                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Masukan Password baru</label>
                        <input type="password" id="new_password1" class="form-control" name="new_password1"><?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Ulangi password baru </label>
                        <input id="new_password2" type="password" class="form-control" name="new_password2"><?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                  </div>
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Ubah Password</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>