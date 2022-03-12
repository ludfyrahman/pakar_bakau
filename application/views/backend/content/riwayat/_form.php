<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0"><?= $this->uri->segment(2) ?></p>
            <!-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> -->
          </div>
        </div>
        <div class="card-body">
          <p class="text-uppercase text-sm">Form Pengguna</p>
          <?php Response_Helper::part('alert') ?>
          <form action="" method="post">
            <div class="row">
              <div class="form-group col-md-12">
                  <label>Nama</label>
                  <input type="text" value='<?= Input_Helper::postOrOr('nama', $data['nama']) ?>' name="nama" class="form-control" placeholder="Masukkan nama anda" required>
              </div>
              
                <div class="col-md-12">
                  <button class="btn btn-primary"><?= $type ?></button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>