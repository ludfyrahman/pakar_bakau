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
          <p class="text-uppercase text-sm">Form dataset</p>
          <?php Response_Helper::part('alert') ?>
          <form action="" method="post">
            <div class="row">
              <div class="form-group col-md-12">
                  <label>Tahun</label>
                  <input type="number" min="1" max="<?= date('Y') ?>" value='<?= Input_Helper::postOrOr('tahun', $data['tahun']) ?>' name="tahun" class="form-control" placeholder="Masukkan Tahun" required>
              </div>
              <!-- <div class="form-group col-md-6">
                  <label>Jumlah</label>
                  <input type="number" min='1' value='<?= Input_Helper::postOrOr('jumlah', $data['jumlah']) ?>' name="jumlah" class="form-control" placeholder="Masukkan Jumlah Penderita" required>
              </div>
              <div class="form-group col-md-6">
                  <label>X</label>
                  <input type="number" value='<?= Input_Helper::postOrOr('x', $data['x']) ?>' name="x" class="form-control" placeholder="Masukkan Nilai x" required>
              </div> -->
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