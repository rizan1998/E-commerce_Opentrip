  <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="image">
                <img src="<?= base_url('assets/Template/view_Back-end/')?>/assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="<?= base_url('assets/images/foto_profil/')?><?= $akun['foto_profil'];?> " alt="...">
                    <h5 class="title"><?= $akun['nama_depan']; ?> <?= $akun['nama_belakang']; ?></h5>
                  </a>
                  <p class="description">
                    <?= $akun['email']; ?>
                  </p>
                </div>
                <p class="description text-center">
                  Alamat:<?= $akun['alamat']; ?>
                </p>
                 <?= $this->session->flashdata('message'); ?>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row ">
                    <div class="col-12 text-center">
                    <a href="<?= base_url('User/ubahProfil')?>">
                      <button class="btn btn-primary"> Ubah Profil</button>
                    </a>
                    </div>
                  </div>
                </div>
                <div class="button-container">
                  <div class="row ">
                    <div class="col-12 text-center">
                      <a href="<?= base_url('User/ubahPassword')?>">
                      <button class="btn btn-warning"> Ubah Password</button>
                      </a>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>