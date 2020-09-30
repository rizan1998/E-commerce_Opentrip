<!-- Content Wrapper -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class=" mb-lg-4 mb-2 row">
      <div class="col-sm-8">
      <h4 class="card-title"> Ubah Paket Pendakian</h4>
      <p class="card-category"> </p>
      <hr>
      </div>
    </div>
<?php foreach ($paket_pendakian as $pp) { ?>
    <div class="row">
        <div class="col-lg-6">
          <?= form_open_multipart('paketpendakian/ubahpaketpendakian'); ?>
          <div class="form-group mb-3 row">
                <label for="user_aktif" class="col-sm-2 col-form-label">Destinasi</label>
                <div class="form-group col-md-4">
                <select id="user_aktif" name="kode_gunung" class="form-control">
                <?php foreach ($gunung as $g ): ?>
                  <?php if($g['kode_gunung'] == $pp->kode_gunung) : ?>
                    <option selected value="<?= $pp->kode_gunung?>">
                    <?= $g['nama_gunung']; ?>
                    </option>
                  <?php else :?>
                    <option value="<?= $g['kode_gunung'];?>"> <?= $g['nama_gunung']; ?> </option>
                  <?php endif; ?>
                <?php endforeach; ?>
                </select>
                <?= form_error('user_aktif', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group  mb-3 row">
                <label for="nama_depan" class="col-sm-2 col-form-label">Nama Guide</label>
                <div class="col-sm-10">
                    <input type="text" readonly value="<?= $akun['nama_depan'];?> <?=  $akun['nama_belakang'];?> " class="form-control" id="nama_depan" >
                    <?= form_error('nama_depan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            
            <div class="form-group mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly value="<?= $pp->email; ?>" class="form-control" id="name" name="email">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $pp->id?>">
            <div class="form-group mb-3 row">
                <label for="harga_paket" class="col-sm-2 col-form-label">harga paket</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="name" value="<?= $pp->harga_paket; ?>"  name="harga_paket">
                    <?= form_error('harga_paket', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="no_rekening_admin" class="col-sm-2 col-form-label">No-rek</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?= $pp->no_rekening_admin; ?>" id="name" name="no_rekening_admin">
                    <?= form_error('no_rekening_admin', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal mulai</label>
                <div class="col-sm-10">
                    <input type="date" value="<?= $pp->tanggal_mulai; ?>" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                    <?= form_error('tanggal_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="tanggal_berakhir" class="col-sm-2 col-form-label">Tanggal berakhir</label>
                <div class="col-sm-10">
                    <input type="date" value="<?= $pp->tanggal_berakhir; ?>" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir">
                    <?= form_error('tanggal_berakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="kouta_paket" class="col-sm-2 col-form-label">Kouta Paket</label>
                <div class="col-sm-10">
                    <input type="number" value="<?= $pp->kouta_paket; ?>" class="form-control" id="kouta_paket" name="kouta_paket">
                    <?= form_error('kouta_paket', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="titik_kumpul">Titik kumpul</label>
                <div class="col-sm-10">
                    <textarea name="titik_kumpul" class="form-control" id="titik_kumpul" placeholder="masukan keterangan titik_kumpul" ><?= $pp->titik_kumpul; ?></textarea>
                    <?= form_error('titik_kumpul', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="perlengkapan_pribadi">Perlengkapan Pribadi</label>
                <div class="col-sm-10">
                    <textarea name="perlengkapan_pribadi" value="" class="form-control" id="perlengkapan_pribadi" placeholder="masukan keterangan perlengkapan_pribadi" > <?= $pp->perlengkapan_pribadi; ?></textarea>
                    <?= form_error('perlengkapan_pribadi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <input type="hidden" value="<?= $pp->kodepaket;?>" name="kodepaket" >

            <div class="form-group mt-1 mb-3 row justify-content-end">
                <div class="col-sm-10">
                    <button class="btn btn-primary" type="submit"> Ubah</button>
                    <a class="btn" href="<?= base_url('paketpendakian')?>"> Kembali </a>
                </div>
            </div>
            </form>
        </div>
        <div class="col-lg-6">
        <h4 class="card-title"> Ubah Paket Pendakian</h4>
            <a href="#" data-toggle="modal" data-target="#newSubmenuModal">
            <button class="btn btn-success"> Tambah fasilitas</button>
            </a>
            <div class="form-group  mb-3 row">
            <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        no
                    </th>
                    <th>
                        nama faslitas
                    </th>
                      <th>
                        keterangan
                      </th>
                      <th class="text-right">
                        action
                      </th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($fasilitas as $jp) :  ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $jp->nama_fasilitas; ?></td>
                            <td><?= $jp->keterangan_fasilitas; ?> </td>
                            <td class="text-right"><span>
                                <a data-toggle="modal" data-target="#modal_edit<?= $jp->id_fasilitas?>">
                                <button class="badge badge-warning tombol" >
                                    Ubah</button></a>
                                <a  data-toggle="modal" data-target="#modal_hapus<?= $jp->id_fasilitas;?>">
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
<?php } ?>


    <!-- ============ MODAL EDIT fasilitas =============== -->
    <?php 
        foreach($fasilitas as $jp):
            $id_fasilitas = $jp->id_fasilitas;
            $nama_fasilitas = $jp->nama_fasilitas;
            $keterangan_fasilitas = $jp->keterangan_fasilitas;
            $kode_paket = $jp->kode_paket;
      ?>
        <div class="modal fade" id="modal_edit<?php echo $id_fasilitas;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Ubah Data fasilitas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
             <?= form_open_multipart('PaketPendakian/ubahFasilitas'); ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama fasilitas</label>
                        <div class="col-xs-8">
                            <input name="nama_fasilitas" value="<?php echo $nama_fasilitas;?>" class="form-control" type="text" placeholder="Kode Barang...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Keterangan Fasilitas</label>
                        <div class="col-xs-8">
                        <textarea name="keterangan_fasilitas" value="" class="form-control" id="keterangan_fasilitas" placeholder="masukan keterangan keterangan_fasilitas" ><?= $keterangan_fasilitas; ?></textarea>
                        </div>
                    </div>
                <input type="hidden" name="kode_paket" value="<?= $kode_paket?>">
                <input type="hidden" name="id_fasilitas" value="<?= $id_fasilitas;?>">
                </div>
                    
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
        foreach($fasilitas as $jph):
            $id_fasilitas = $jph->id_fasilitas;
            $nama_fasilitas = $jph->nama_fasilitas;
            $kode_paket = $jph->kode_paket;
      ?>
    <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?= $id_fasilitas;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hapus Fasilitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'PaketPendakian/hapusFasilitas'?>">
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data fasilitas <b><?= $nama_fasilitas?></b>?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="kode_paket" value="<?= $kode_paket;?>">
                    <input type="hidden" name="id_fasilitas" value="<?= $id_fasilitas?>">
                    <button class="btn btn-danger">Hapus</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS BARANG-->

    <div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">tambah jalur baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('PaketPendakian/tambahFasilitas'); ?>
                <?php foreach($paket_pendakian as $pp): ?>
                    <input type="hidden" name="kode_paket" value="<?= $pp->kodepaket;?>">
                    <?php endforeach; ?>
                    <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Fasilitas</label>
                        <div class="col-xs-8">
                            <input name="nama_fasilitas" class="form-control" type="text" placeholder="Nama Fasilitas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Keterangan Fasilitas</label>
                        <div class="col-xs-8">
                        <textarea name="keterangan_fasilitas" value="" class="form-control" id="keterangan_fasilitas" placeholder="masukan keterangan keterangan fasilitas" ></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->