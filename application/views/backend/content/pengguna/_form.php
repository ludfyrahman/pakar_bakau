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
              <div class="form-group col-md-6">
                  <label>Nama</label>
                  <input type="text" value='<?= Input_Helper::postOrOr('nama', $data['nama']) ?>' name="nama" class="form-control" placeholder="Masukkan nama anda" required>
              </div>
              <div class="form-group col-md-6">
                    <label>Username</label>
                    <input type="username" value='<?= Input_Helper::postOrOr('username', $data['username']) ?>' name="username" class="form-control" placeholder="Masukkan username anda" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" value='<?= Input_Helper::postOrOr('password') ?>' name="password" class="form-control" placeholder="Masukkan password anda" <?= ($type == 'Tambah' ? 'required' : '') ?>>
                </div>
                <div class="form-group col-md-6">
                    <label>Password Konfirmasi</label>
                    <input type="password" value='<?= Input_Helper::postOrOr('password_konfirmasi') ?>' name="password_konfirmasi" class="form-control" placeholder="Masukkan password konfirmasi anda" <?= ($type == 'Tambah' ? 'required' : '') ?>>
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