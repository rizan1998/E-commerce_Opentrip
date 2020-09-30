<div class="col-md-12">
            <div class="card card-plain">
              <?= $this->session->flashdata('notif'); ?>
              <div class="card-header">
                <h4 class="card-title">Paket Saya</h4>
                <p class="card-category">saat ini kamu memiliki paket sebanyak (20)</p>
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
                        Destinasi
                      </th>
                      <th>
                        Tanggal Mulai
                      </th>
                      <th>
                        penyedia paket
                      </th>
                      <th class="text-right">
                        action
                      </th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                

                    <?php foreach ($datapemesanan as $u) :  ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row">
                            <img class="user-table-item" src="<?= base_url('assets/images/gunung/'.$u->gambar_lima)?>" alt="">
                            </td>
                            <td><?= $u->nama_gunung; ?> </td>
                            <td><?php echo date('d-m-Y', strtotime($paket_pendakian = $u->tanggal_mulai))?></td>
                            <td><?= $u->nama_depan; ?><?= $u->nama_belakang; ?></td>
                            <td class="text-right"><span>
                            <?php
                            $date = date('Y-m-d');
                            if($u->tanggal_berakhir < $date ) :?>
                            <a><button class="badge badge-success tombol" >Paket telah berakhir</button></a>
                                </span>
                            <?php else: ?>
                            <a href="<?= base_url('Pemesanan/lihatDetailPemesanan/'.$u->kode_paket)?>"><button class="badge badge-primary tombol" >lihat detail </button></a>
                            </span>
                            <?php endif; ?>
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
<!-- 
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
</div> -->
<!-- END Modal Ubah -->
