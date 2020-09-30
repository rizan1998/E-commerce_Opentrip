
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<?= $this->session->flashdata('notif'); ?>
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1" >Gambar</th>
							<th >Paket Pendakian</th>
							<th >Harga</th>
							<th >Kode Paket</th>
							<th >Tgl Pemesanan</th>
							<th class="text-center" >Aksi</th>
						</tr>
						<?php foreach($datapemesanan as $dp): ?>
						<tr class="table-row">
							
							<td  class="column-1" >
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?= base_url('assets/images/gunung/'.$dp->gambar_lima)?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td ><?= $dp->nama_gunung ?></td>
							<td ><?= $dp->harga_paket; ?></td>
							<td ><?= $dp->kode_paket; ?></td>
							<td >
							<?php echo date('d-m-Y', strtotime($paket_pendakian = $dp->tanggal_pemesanan))?></td>
							<td >
							<?php 
							$date = date('Y-m-d');
							if($dp->tanggal_pemesanan < $date) :?>
								<a data-toggle="modal" data-target="#expired<?= $dp->id_pemesanan;?>">
                                <button class="badge badge-warning tombol" >
                                    Pesanan Expired</button>
								</a>
							<?php else: ?>

									<?php $t = 'terkirim';
									if($dp->sts_kirimPembayaran == $t) : ?>
												<a  data-toggle="modal" data-target="#modal_terkirim<?= $dp->id_pemesanan?>">
                                <button class="badge badge-light tombol" >Terkirim</button></a> 
									<?php else: ?>
												<span>
                                <a data-toggle="modal" data-target="#modal_edit<?= $dp->id_pemesanan?>">
                                <button class="badge badge-primary tombol" >
                                    Bayar</button></a>
                                <a  data-toggle="modal" data-target="#modal_hapus<?= $dp->id_pemesanan?>">
                                <button class="badge badge-danger tombol" >Hapus</button></a>
                          </span>
									<?php endif; ?>
									
							<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</section>

	 <!-- ============ MODAL EDIT fasilitas =============== -->
    <?php 
				foreach($datapemesanan as $jp):
					$id_pemesanan = $jp->id_pemesanan;
					$kode_paket = $jp->kode_paket;
					$kode_pemesanan = $jp->kode_pemesanan;
					$BRI = 'BRI';
					$BCA = 'BCA';
					$BNI = 'BNI';
					$MANDIRI = 'MANDIRI';
					$email = $jp->email;
					$harga_paket = $jp->harga_paket;
      ?>
        <div class="modal fade" id="modal_edit<?= $id_pemesanan?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Pilih Bank</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
                <div class="modal-body">
                    <div class="form-group">
												<div class="row">
														<div class="col-lg-9">
															<div class="row">
																	<div class="col-lg-4">
																		<img src="<?= base_url('assets/images/bank_logo/BCA_LOGO.jpg')?>" class="img-fluid" style="height:60px;" alt="">
																	</div>
																	<div class="col-lg-7">
																	<p>NO REK BANK BCA</p>
																	<p>5379-4130-2036-7675</p>
																</div>
															</div>
														</div>
														<div class="col-lg-2">
														<form method="post" action="<?= base_url('Pembayaran/halamanPembayaran')?>">
															<input type="hidden" name="kode_pemesanan" value="<?= $kode_pemesanan?>">
															<input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan?>">
															<input type="hidden" name="email" value="<?= $email?>">
															<input type="hidden" name="harga_paket" value="<?= $harga_paket?>">
															<input type="hidden" name="bank" value="<?= $BCA?>">
															<button class="btn btn-primary">PILIH</button>
														</form>
														</div>
												</div>	
                    </div>
										<div class="form-group">
												<div class="row">
														<div class="col-lg-9">
															<div class="row">
																	<div class="col-lg-4">
																		<img src="<?= base_url('assets/images/bank_logo/BNI_LOGO.jpg')?>" class="img-fluid" style="height:60px;" alt="">
																	</div>
																	<div class="col-lg-7">
																	<p>NO REK BANK BNI</p>
																	<p>	5379-4130-2036-7675</p>
																</div>
															</div>
														</div>
														<div class="col-lg-2">
														<form method="post" action="<?= base_url('Pembayaran/halamanPembayaran')?>">
															<input type="hidden" name="kode_pemesanan" value="<?= $kode_pemesanan?>">
															<input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan?>">
															<input type="hidden" name="email" value="<?= $email?>">
															<input type="hidden" name="harga_paket" value="<?= $harga_paket?>">
															<input type="hidden" name="bank" value="<?= $BNI?>">
															<button class="btn btn-primary">PILIH</button>
														</form>
														</div>
												</div>	
                    </div>
										<div class="form-group">
												<div class="row">
														<div class="col-lg-9">
															<div class="row">
																	<div class="col-lg-4">
																		<img src="<?= base_url('assets/images/bank_logo/BRI_LOGO.jpg')?>" class="img-fluid" style="height:60px;" alt="">
																	</div>
																	<div class="col-lg-7">
																	<p>NO REK BANK BRI</p>
																	<p>	5379-4130-2036-7675</p>
																</div>
															</div>
														</div>
														<div class="col-lg-2">
															<form method="post" action="<?= base_url('Pembayaran/halamanPembayaran')?>">
															<input type="hidden" name="kode_pemesanan" value="<?= $kode_pemesanan?>">
															<input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan?>">
															<input type="hidden" name="email" value="<?= $email?>">
															<input type="hidden" name="harga_paket" value="<?= $harga_paket?>">
															<input type="hidden" name="bank" value="<?= $BRI?>">
															<button class="btn btn-primary">PILIH</button>
														</form>
														</div>
												</div>	
                    </div>
										<div class="form-group">
												<div class="row">
														<div class="col-lg-9">
															<div class="row">
																	<div class="col-lg-4">
																		<img src="<?= base_url('assets/images/bank_logo/MANDIRI_LOGO.jpg')?>" class="img-fluid" style="height:60px;" alt="">
																	</div>
																	<div class="col-lg-7">
																	<p>NO REK BANK MANDIRI</p>
																	<p>5379-4130-2036-7675</p>
																</div>
															</div>
														</div>
														<div class="col-lg-2">
															<form method="post" action="<?= base_url('Pembayaran/halamanPembayaran')?>">
															<input type="hidden" name="kode_pemesanan" value="<?= $kode_pemesanan?>">
															<input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan?>">
															<input type="hidden" name="email" value="<?= $email?>">
															<input type="hidden" name="harga_paket" value="<?= $harga_paket?>">
															<input type="hidden" name="bank" value="<?= $MANDIRI?>">
															<button class="btn btn-primary">PILIH</button>
														</form>
														</div>
												</div>	
                    </div>
                </div>
                    
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    
                </div>
            </form>
            </div>
            </div>
        </div>

    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->

   	<?php 
				foreach($datapemesanan as $jph):
					$kode_paket = $jph->kode_paket;
					$nama_gunung = $jph->nama_gunung;
					$id_pemesanan = $jph->id_pemesanan;
					$email = $jph->email;
      ?>
    <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?= $id_pemesanan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Batal Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'Pemesanan/batalPesan'?>">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus paket <b><?= $nama_gunung;?></b> dari keranjang?</p>
                </div>
                <div class="modal-footer">
										<input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan?>">
										<input type="hidden" name="kode_paket" value="<?= $kode_paket?>">
                    <button class="btn btn-danger">Hapus</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
            </div>
            </div>
        </div>
		<?php endforeach;?>
		
		<?php 
				foreach($datapemesanan as $jph):
					$kode_paket = $jph->kode_paket;
					$nama_gunung = $jph->nama_gunung;
					$id_pemesanan = $jph->id_pemesanan;
      ?>
    <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="expired<?= $id_pemesanan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Pesanan Expired</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'Pemesanan/pesanPaketlain'?>">
                <div class="modal-body">
                    <p>Pemesanan <b><?= $nama_gunung; ?></b> sudah tidak berlaku karena melebihi batas waktu pembayaran</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="kode_paket" value="<?= $kode_paket?>">
                    <input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan; ?>">
                    <button type="submit" class="btn btn-danger">Pesan Paket lain</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>

	<?php 
				foreach($datapemesanan as $jph):
					$kode_paket = $jph->kode_paket;
					$nama_gunung = $jph->nama_gunung;
					$id_pemesanan = $jph->id_pemesanan;
      ?>
    <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_terkirim<?= $id_pemesanan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
           
                <div class="modal-body">
                    <p>Anda telah mengirim Bukti Pembayaran Paket Pendakian <b>Gunung <?= $nama_gunung; ?> </b>Silahkan tunggu hingga admin memverifikasi bukti pembayaran!</p>
                </div>
                <div class="modal-footer">
										<input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan?>">
										<input type="hidden" name="kode_paket" value="<?= $kode_paket?>">
                   
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
           
            </div>
            </div>
        </div>
		<?php endforeach;?>