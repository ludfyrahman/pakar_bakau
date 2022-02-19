<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title ?></h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <?php Response_Helper::part('breadcrumb') ?>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <?= $title ?>
                <div class="float-end">
                  <a href="<?= base_url($this->low.'/add') ?>"><button class="btn btn-primary">Tambah</button></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Level</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data as $d) {
                    ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $d['nama'] ?></td>
                          <td><?= LEVEL[$d['level']] ?></td>
                          <td><?= STATUS_PENGGUNA[$d['status']] ?></td>
                          <td>
                              <a href="<?= base_url($this->low.'/delete/'.$d['id']) ?>" class="delete"><span class="badge bg-danger">Hapus</span></a>
                              <a href="<?= base_url($this->low.'/edit/'.$d['id']) ?>"><span class="badge bg-warning">Ubah</span></a>
                          </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>