<div class="col-md-12">
            <div class="card card-plain">
              <?= $this->session->flashdata('notif'); ?>
              <div class="card-header">
                <h4 class="card-title"> Kelola Paket Pendakian</h4><a href="<?= base_url('PaketPendakian/tambahPaketPendakian');?>" class="btn btn-success mb-3">Tambah paket pendakian</a>
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
                        destinasi
                    </th>
                      <th>
                        harga paket
                      </th>
                      <th>
                        tanggal mulai
                      </th>
                      <th>
                        sisa kouta
                      </th>
                      <th class="text-right">
                        action
                      </th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($paket_pendakian as $pp) :  ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $pp->nama_gunung; ?> </td>
                            <td><?= $pp->harga_paket; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($paket_pendakian = $pp->tanggal_mulai))?></td>
                            <td class="text-center" ><?php echo $pp->kouta_paket?></td>
                            <td class="text-right"><span>
                            <a href="<?= base_url('Pemesanan/lihatDetailPemesananGuide/'.$pp->kodepaket)?>"><button class="badge badge-primary tombol" >Detail</button></a>
                            <a href="<?= base_url('paketpendakian/lihatdetailpaketpendakian/') . $pp->kodepaket; ?>"
                                  ><button class="badge badge-warning tombol">Ubah</button></a>
                              <a  data-toggle="modal" data-target="#modal_hapus<?= $pp->kodepaket;?>">
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
        foreach($paket_pendakian2 as $ppH):
            $kodepaket= $ppH->kodepaket;
            $email= $ppH->email;
            $namagunung = $ppH->nama_gunung;
          
      ?>
    <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?= $ppH->kodepaket;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              
                <h5 class="modal-title" id="myModalLabel">Hapus Paket Pendaki</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'paketpendakian/hapusPaketPendakian'?>">
                <div class="modal-body">
                    <p>Anda yakin Ingin menghapus paket pendakian <b><?= $ppH->nama_gunung;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="kodepaket" value="<?= $ppH->kodepaket;?>">
                    <button class="btn btn-danger">Hapus</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS BARANG-->