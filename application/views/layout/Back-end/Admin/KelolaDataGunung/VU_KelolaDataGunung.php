<!-- Content Wrapper -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class=" mb-lg-4 mb-2 row">
        <div class="col-sm-8">
            <h4 class="card-title"> Ubah Data Gunung</h4>
            <p class="card-category"> </p>
            <hr>
        </div>
    </div>
    
    <?= form_open_multipart('Gunung/ubahDataGunung'); ?>
    <?php foreach($gunung as $ddg) : ?>
    <div class="row">
        <div class="col-lg-6">
            <h5 class="mb-2" >Data Gunung</h5>
            <div class="form-group  mb-3 row">
                <label for="kode_gunung" class="col-sm-2 col-form-label">Kode Gunung</label>
                <div class="col-sm-10">
                    <input type="text" readonly value="<?= $ddg->kode_gunung;?>"  class="form-control" id="kode_gunung" name="kode_gunung">
                    <?= form_error('kode_gunung', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <input type="hidden" name="id_gunung" value="<?= $ddg->id_gunung?>">
            <div class="form-group mb-3 row">
                <label for="nama_gunung" class="col-sm-2 col-form-label">Nama gunung</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="masukan nama gunung" class="form-control" value="<?= $ddg->nama_gunung;?>" id="nama_gunung" name="nama_gunung">
                    <?= form_error('nama_gunung', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="ketinggian" class="col-sm-2 col-form-label">Ketiggian</label>
                <div class="col-sm-10">
                    <input type="number" placeholder="masukan ketinggian gunung" value="<?= $ddg->ketinggian;?>" class="form-control" id="ketinggian" name="ketinggian">
                    <?= form_error('ketinggian', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="rata_rata_suhu" class="col-sm-2 col-form-label">Rata - rata suhu</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?= $ddg->rata_rata_suhu;?>"id="rata_rata_suhu" placeholder="masukan rata-rata suhu" name="rata_rata_suhu">
                    <?= form_error('rata_rata_suhu', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                <div class="col-sm-10">
                    <textarea class="form-control " id="keterangan" name="keterangan" placeholder="masukan keterangan gunung" ><?= $ddg->keterangan;?></textarea>
                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
                
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="masukan keterangan alamat" ><?= $ddg->alamat; ?></textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
                        <h5 class="mb-2" >Jalur Pendakian</h5>
            <a href="#" data-toggle="modal" data-target="#newSubmenuModal">
            <button class="btn btn-primary"> Tambah Jalur pendakian</button>
            </a>
            <hr>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        no
                    </th>
                    <th>
                        nama jalur
                    </th>
                      <th>
                        jarak jalur
                      </th>
                      <th class="text-right">
                        action
                      </th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jalurpendakian as $jp) :  ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $jp->nama_jalur; ?></td>
                            <td><?= $jp->jarak_jalur; ?> </td>
                            <td class="text-right"><span>
                                <a data-toggle="modal" data-target="#modal_edit<?= $jp->id_jalur?>">
                                  <button class="badge badge-primary tombol" >
                                    Ubah</button></a>
                                <a  data-toggle="modal" data-target="#modal_hapus<?= $jp->id_jalur;?>">
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
        <div class="col-lg-6">
            <?php foreach($gallerygunung as $gg) :?>
            <h5 class="mb-2 mt-lg-2 ml-3 " >Galley gunung</h5>
            <div class="row mb-2">
              <div class="col-sm-4 mb-1">
                <img src="<?= base_url('assets/images/gunung/') . $gg->gambar_satu; ?>" class="img-thumbnail " alt="">
              </div>
              <div class="col-sm-10">
                  <div class=" custom-file">
                      <input type="file" class="custom-file-input" name="gambar_satu" value="<?= $gg->gambar_satu;?>" id="gambar_satu">
                      <label class="custom-file-label" for="gambar_satu">gambar satu</label>
                  </div>
                  <?= form_error('gambar_satu', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-4 mb-1">
                <img src="<?= base_url('assets/images/gunung/') . $gg->gambar_dua; ?>" class="img-thumbnail " alt="">
              </div>
              <div class="col-sm-10">
                  <div class=" custom-file">
                      <input type="file" class="custom-file-input" name="gambar_dua" value="<?= $gg->gambar_dua;?>" id="gambar_dua">
                      <label class="custom-file-label" for="gambar_dua">gambar dua</label>
                  </div>
                  <?= form_error('gambar_dua', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-4 mb-1">
                <img src="<?= base_url('assets/images/gunung/') . $gg->gambar_tiga; ?>" class="img-thumbnail " alt="">
              </div>
              <div class="col-sm-10">
                  <div class=" custom-file">
                      <input type="file" class="custom-file-input" name="gambar_tiga" value="<?= $gg->gambar_tiga;?>" id="gambar_tiga">
                      <label class="custom-file-label" for="gambar_tiga">gambar tiga</label>
                  </div>
                  <?= form_error('gambar_tiga', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-4 mb-1">
                <img src="<?= base_url('assets/images/gunung/') . $gg->gambar_empat; ?>"  class="img-thumbnail " alt="">
              </div>
              <div class="col-sm-10">
                  <div class=" custom-file">
                      <input type="file" class="custom-file-input" name="gambar_empat" value="<?= $gg->gambar_empat;?>" id="gambar_empat">
                      <label class="custom-file-label" for="gambar_empat">gambar empat</label>
                  </div>
                  <?= form_error('gambar_empat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-4 mb-1">
                <img src="<?= base_url('assets/images/gunung/') . $gg->gambar_lima; ?>"  class="img-thumbnail " alt="">
              </div>
              <div class="col-sm-10">
                  <div class=" custom-file">
                      <input type="file" class="custom-file-input" name="gambar_lima" value="<?= $gg->gambar_lima;?>" id="gambar_lima">
                      <label class="custom-file-label" for="gambar_lima">gambar lima</label>
                  </div>
                  <?= form_error('gambar_lima', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <input type="hidden" name="id_gambar" value="<?= $gg->id_gambar;?>">
        </div>
            <?php endforeach; ?>
    </div>
    <?php endforeach;?>
    <div class="row">
        <div class="col-lg-12">
        <div class="form-group mt-1 mb-3 row justify-content-end align-self-center">
                <div class="col-lg-12 ">
                    <button class="btn btn-primary" type="submit"> Tambah</button>
                    <a class="btn" href="<?= base_url('gunung')?>"> Kembali </a>
                </div>
            </div>
        </div>
    </div>
</form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

    <!-- ============ MODAL EDIT BARANG =============== -->
    <?php 
        foreach($jalurpendakian as $jp):
            $id_jalur = $jp->id_jalur;
            $nama_jalur = $jp->nama_jalur;
            $jumlah_pos = $jp->jumlah_pos;
            $jarak_jalur = $jp->jarak_jalur;
            $foto_jalur = $jp->foto_jalur;
            $gambar_basecamp = $jp->gambar_basecamp;
            $gambar_B = $jp->gambar_basecamp;
            $kode_gunung = $jp->kode_gunung;

      ?>
        <div class="modal fade" id="modal_edit<?php echo $id_jalur;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Ubah Data Gunung</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
             <?= form_open_multipart('Gunung/ubahJalurPendakian'); ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Jalur</label>
                        <div class="col-xs-8">
                            <input name="nama_jalur" value="<?php echo $nama_jalur;?>" class="form-control" type="text" placeholder="Kode Barang...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >jumlah Pos</label>
                        <div class="col-xs-8">
                            <input name="jumlah_pos" value="<?php echo $jumlah_pos;?>" class="form-control" type="text" placeholder="Kode Barang...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jarak Jalur</label>
                        <div class="col-xs-8">
                            <input name="jarak_jalur" value="<?php echo $jarak_jalur;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 mb-1">
                            <img src="<?= base_url('assets/images/gunung/') . $foto_jalur; ?>" class="img-thumbnail " alt="">
                        </div>
                        <div class="col-sm-10">
                            <div class=" custom-file">
                                <input type="file" class="custom-file-input" name="foto_jalur" id="foto_jalur">
                                <label class="custom-file-label" for="foto_jalur">foto jalur</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 mb-1">
                            <img src="<?= base_url('assets/images/gunung/') . $gambar_basecamp; ?>" class="img-thumbnail " alt="">
                        </div>
                        <div class="col-sm-10">
                            <div class=" custom-file">
                                <input type="file" class="custom-file-input" name="gambar_basecamp" id="gambar_basecamp">
                                <label class="custom-file-label" for="gambar_basecamp">gambar basecamp</label>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <input type="hidden" name="id_jalur" value="<?= $id_jalur;?>">
                <input type="hidden" name="kode_gunung" value="<?= $kode_gunung;?>">
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
        foreach($jalurpendakian as $jph):
            $id_jalur = $jph->id_jalur;
            $nama_jalur = $jph->nama_jalur;
            $kode_gunung = $jph->kode_gunung;
      ?>
    <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?= $id_jalur;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              
                <h5 class="modal-title" id="myModalLabel">Hapus Jalur Pendakian</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'gunung/hapusJalurPendakian'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?= $nama_jalur?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_jalur" value="<?= $id_jalur;?>">
                    <input type="hidden" name="kode_gunung" value="<?= $kode_gunung?>">
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
            <?= form_open_multipart('Gunung/tambahJalurPendakian'); ?>
                <?php foreach($gunung as $gn): ?>
                    <input type="hidden" name="kode_gunung" value="<?= $gn->kode_gunung;?>">
                    <?php endforeach; ?>
                    
                    <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_jalur" name="nama_jalur" placeholder="nama jalur">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="jumlah_pos" name="jumlah_pos" placeholder="jumlah pos">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="jarak_jalur" name="jarak_jalur" placeholder="Jarak jalur">
                    </div>
                    <div class="form-group">
                        <div class=" custom-file">
                            <input type="file" class="custom-file-input"  name="foto_jalur" id="foto_jalur">
                            <label class="custom-file-label" for="foto_jalur">foto jalur</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" custom-file">
                            <input  class="custom-file-input" name="gambar_basecamp" type="file" 
                            id="gambar_basecamp">
                            <label class="custom-file-label" for="gambar_basecamp">Gambar basecamp</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">tambah jalur</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
