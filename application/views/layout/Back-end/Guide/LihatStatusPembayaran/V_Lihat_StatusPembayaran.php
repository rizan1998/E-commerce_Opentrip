
<div class="col-md-12">
            <div class="card card-plain">
              <?= $this->session->flashdata('notif'); ?>
              <div class="card-header">
                <h4 class="card-title"> Lihat Status Pembayaran</h4>
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
                            <td><?= $pm->kode_paket; ?> </td>
                            <td><?= $pm->jumlah_nominal ?> </td>
                            <td><?php if($pm->status_pembayaran == 0): ?>
                                belum Verify
                            <?php else: ?>
                                terverifikasi
                            <?php endif; ?>
                            </td>
                            <td class="text-right"><span>
                                <a href="<?= base_url('Pembayaran/lihatDetailStatusPembayaranGuide/'.$pm->id_pembayaran)?>"><button class="badge badge-primary tombol" >detail</button></a>
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




