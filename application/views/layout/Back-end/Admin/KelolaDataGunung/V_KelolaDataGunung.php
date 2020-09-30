<div class="col-md-12">
            <div class="card card-plain">
              <?= $this->session->flashdata('notif'); ?>
              <div class="card-header">
                <h4 class="card-title"> Kelola Data Gunung</h4><a href="<?= base_url('Gunung/tambahDataGunung');?>" class="btn btn-success mb-3">Tambah Gunung</a>
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
                        Kode Gunung
                    </th>
                      <th>
                        Nama Gunung
                      </th>
                      <th>
                        Ketinggian
                      </th>
                      <th>
                        alamat
                      </th>
                      <th class="text-right">
                        action
                      </th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                

                    <?php foreach ($gunung as $g) :  ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $g['kode_gunung']; ?></td>
                            <td><?= $g['nama_gunung']; ?> </td>
                            <td><?= $g['ketinggian']; ?></td>
                            <td><?= $g['alamat']; ?></td>
                            <td class="text-right"><span>
                                <a href="<?= base_url('Gunung/lihatDetailDataGunung/'). $g['kode_gunung'];?>">
                                  <button class="badge badge-warning tombol" >
                                    Ubah</button></a>
                                <a  data-toggle="modal" data-target="#modal_hapus<?= $g['id_gunung'];?>">
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


    <?php 
        foreach($joinDataGunung1 as $gh):
            $id_gunung = $gh->id_gunung;
            $nama_gunung = $gh->nama_gunung;
            $id_jalur = $gh->id_jalur;
            $id_gambar = $gh->id_gambar;
            $kode_gunung = $gh->kode_gunung;
      ?>
    <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?= $id_gunung?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              
                <h5 class="modal-title" id="myModalLabel">Hapus Gunung</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'gunung/hapusDataGunung'?>">
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus Data Gunung<b><?= $nama_gunung; ?> Dengan kode Gunung<?= $kode_gunung; ?></b>?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_gunung" value="<?= $id_gunung;?>">
                    <input type="hidden" name="id_jalur" value="<?= $id_jalur;?>">
                    <input type="hidden" name="id_gambar" value="<?= $id_gambar;?>">
                    <input type="hidden" name="kode_gunung" value="<?= $kode_gunung;?>">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS BARANG-->