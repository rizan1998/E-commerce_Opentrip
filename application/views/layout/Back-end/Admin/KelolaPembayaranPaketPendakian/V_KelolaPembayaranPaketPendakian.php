<div class="col-md-12">
            <div class="card card-plain">
              <?= $this->session->flashdata('notif'); ?>
              <div class="card-header">
                <h4 class="card-title"> Kelola Pembayaran</h4>
                
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
                        nama pengirim
                      </th>
                      <th>
                        kode pembayaran
                      </th>
                      <th>
                        bank
                      </th>
                      <th>
                        nominal
                      </th>
                      <th>
                        status
                      </th>
                      <th class="text-right">
                        action
                      </th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                

                    <?php foreach ($pembayaran as $pm) :  ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $pm->nama_pengirim; ?> </td>
                            <td><?= $pm->kode_pembayaran ;?> </td>
                            <td><?= $pm->bank; ?> </td>
                            <td><?= $pm->jumlah_nominal ?> </td>
                            <td><?php if($pm->status_pembayaran == 0): ?>
                                belum Verify
                            <?php else: ?>
                                terverifikasi
                            <?php endif; ?>
                            </td>
                            <td class="text-right"><span>
                                <a href="<?= base_url('Pembayaran/lihatDetailStatusPembayaran/'.$pm->id_pembayaran)?>"><button class="badge badge-primary tombol" >detail</button></a>
                                <a data-toggle="modal" data-target="#modal_edit<?= $pm->id_pembayaran?>">
                                  <button class="badge badge-warning tombol" >
                                    Ubah</button></a>
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


    <!-- ============ MODAL EDIT BARANG =============== -->
    <?php 
        foreach($pembayaran as $u):
            $id_pembayaran = $u->id_pembayaran;
            $kode_pemesanan = $u->kode_pemesanan;
            $status_pembayaran = $u->status_pembayaran;
            $kode_pembayaran =  $u->kode_pembayaran;
      ?>
        <div class="modal fade" id="modal_edit<?= $id_pembayaran;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Ubah Status Pembayaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'Pembayaran/simpanUbahStatusPembayaran'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >kode pembayaran</label>
                        <div class="col-xs-8">
                            <input name="kode_pembayaran" value="<?php echo $kode_pembayaran;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >status pembayaran</label>
                        <div class="col-xs-8">
                              <select name="status_pembayaran" class="form-control" required>
                                <?php if($status_pembayaran==0) : ?>
                                <option selected value="0">Belum terverifikasi</option>
                                 <option   value="1">terverifikasi</option>
                                <option value="2">Verifikasi Failed</option>
                                <?php elseif($status_pembayaran==1) :?>
                                <option selected  value="1">terverifikasi</option>
                                <option value="0">Belum terverifikasi</option>
                                <option value="2">Verifikasi Failed</option>
                                <?php else: ?>
                                <option selected value="2">Verifikasi Failed</option>
                                <option  value="0">terverifikasi</option>
                                <option value="1">Belum terverifikasi</option>
                                <?php endif; ?>
                              </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="kode_pemesanan" value="<?= $kode_pemesanan?>">
                <input type="hidden" name="kode_pembayaran" value="<?= $kode_pembayaran?>">
                <input type="hidden" name="id_pembayaran" value="<?= $id_pembayaran?>">
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

  