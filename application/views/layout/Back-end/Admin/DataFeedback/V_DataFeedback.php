<div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="card-title"> Kelola Data Feedback</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Nama Lengkap
                      </th>
                      <th>
                        email
                      </th>
                      <th>
                        Status Balasan
                      </th>
                      <th>
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                    <?php foreach ($feedback as $f) :  ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $f['nama_lengkap']?></td>
                            <td><?= $f['email']; ?> </td>
                            <td><?= $f['status_feedback']; ?> </td>
                            <td>
                                  <a href="<?= base_url('menu/lihatdetail/') . $f['id']; ?>" class="badge badge-success tombol">
                                    Ubah</a>
                                <a href="javascript:;" data-id="<?php echo $f['id'] ?>" data-title="<?php echo $f['nama_lengkap'] ?>" data-toggle="modal" data-target="#edit-data">
                                    <button data-toggle="modal" data-target="#ubah-data" class="badge badge-danger">Hapus</button>
                                </a>
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