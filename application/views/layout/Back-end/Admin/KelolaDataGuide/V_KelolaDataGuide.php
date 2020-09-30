<div class="col-md-12">
            <div class="card card-plain">
              <?= $this->session->flashdata('notif'); ?>
              <div class="card-header">
                <h4 class="card-title"> Kelola Data Guide</h4>
                <p class="card-category"> tersedia (20) calon pendaki yang terdaftar</p><a href="<?= base_url('kelolaGuide/tambahGuide');?>" class="btn btn-success mb-3">Tambah Guide</a>
              </div>
              <div>
              </div>
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
                        Name
                      </th>
                      <th>
                        user aktif
                      </th>
                      <th>
                        jumlah paket
                      </th>
                      <th class="text-right">
                        action
                      </th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                

                    <?php foreach ($user as $u) :  ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row">
                            <img class="user-table-item" src="<?= base_url('assets/images/foto_profil/').$u['foto_profil'];?>" alt="">
                            </td>
                            <td><?= $u['nama_depan']; ?> </td>
                            <td><?php if($u['user_aktif'] == 1): ?>
                                Aktif
                                <?php else: ?>
                                Nonaktif
                                <?php endif; ?>
                            </td>
                            <td>

                            </td>
                            <td class="text-right"><span>
                                <a data-toggle="modal" data-target="#modal_edit<?= $u['id'];?>">
                                  <button class="badge badge-warning tombol" >
                                    Ubah</button></a>
                                <a  data-toggle="modal" data-target="#modal_hapus<?= $u['id'];?>">
                                <button class="badge badge-danger tombol" >Hapus</button></a>
                                </span>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
<!-- Modal -->

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

            </div>
            <form class="form-horizontal" action="<?php echo base_url('KelolaCalonPendaki/hapusCalonPendaki') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="hidden" id="id" name="id" value="id">
                            <div style="display: inline-block;">apakah benar anda ingin menghapus data?</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit"> Hapus&nbsp;</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal Ubah -->

    <!-- ============ MODAL EDIT BARANG =============== -->
    <?php 
        foreach($user as $u):
            $user_id=$u['id'];
            $nama_depan=$u['nama_depan'];
            $foto_profil=$u['foto_profil'];
            $user_aktif=$u['user_aktif'];
      ?>
        <div class="modal fade" id="modal_edit<?php echo $user_id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Ubah Guide</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'KelolaGuide/ubahGuide'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-8">
                            <input name="kode_barang" value="<?php echo $nama_depan;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >User Aktif</label>
                        <div class="col-xs-8">
                              <select name="user_aktif" class="form-control" required>
                                <?php if($user_aktif==1) : ?>
                                <option  value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                                <?php else: ?>
                                <option  value="0">Nonaktif</option>
                                <option value="1">Aktif</option>
                                <?php endif; ?>
                              </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $user_id;?>">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Ubah</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    
                </div>
            </form>
            </div>
            </div>
        </div>

    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->

    <?php 
        foreach($user as $u):
            $user_id=$u['id'];
            $email=$u['email'];
            $password=$u['password'];
            $nama_depan=$u['nama_depan'];
            $nama_belakang=$u['nama_belakang'];
            $foto_profil=$u['foto_profil'];
            $foto_sampul=$u['foto_sampul'];
            $level_akses=$u['level_akses'];
            $user_aktif=$u['user_aktif'];
            $tanggal_R=$u['tanggal_registrasi'];
            $alamat=$u['alamat'];
            $no_T=$u['no_telepon'];
      ?>
    <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?= $u['id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              
                <h5 class="modal-title" id="myModalLabel">Hapus Calon Pendaki</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'KelolaCalonPendaki/hapusCalonPendaki'?>">
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus Data Guide <b><?= $u['nama_depan'];?> ?</b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $u['id'];?>">
                    <button class="btn btn-danger">Hapus</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS BARANG-->