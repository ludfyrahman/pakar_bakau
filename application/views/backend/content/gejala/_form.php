<div class="container-fluid py-4">
  <div class="row">
    <div class="col-<?= $type == 'Tambah' ? '6' :'12' ?>">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0"><?= $this->uri->segment(2) ?></p>
            <!-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> -->
          </div>
        </div>
        <div class="card-body">
          <p class="text-uppercase text-sm">Form <?=$this->cap ?></p>
          <?php Response_Helper::part('alert') ?>
          <form action="" method="post">
            <div class="row">
              <div class="form-group col-md-12">
                  <label>Nama</label>
                  <input type="text" value='<?= Input_Helper::postOrOr('nama', isset($data['nama']) ? $data['nama'] : '') ?>' name="nama" class="form-control" placeholder="Masukkan nama gejala" required>
              </div>
              <div class="form-group col-md-12">
                  <label>Bobot</label>
                  <input type="number" value='<?= Input_Helper::postOrOr('bobot', isset($data['bobot']) ? $data['bobot'] : '') ?>' name="bobot" step="0.01" class="form-control" placeholder="Masukkan bobot" required>
              </div>
              
              <div class="col-md-12">
                <button class="btn btn-primary"><?= $type ?></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php 
    if($type == 'Tambah'){
    ?>
    <div class="col-6">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0"><?= $this->uri->segment(2) ?></p>
            <!-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> -->
          </div>
        </div>
        <div class="card-body">
          <p class="text-uppercase text-sm">Import <?=$this->cap ?></p>
          <?php Response_Helper::part('alert') ?>
          <form action="<?= base_url($this->low.'/import') ?>" enctype="multipart/form-data" method="post">
            <div class="row">
              <div class="form-group col-md-12">
                  <label>File Excel</label>
                  <input type="file" name="file" class="form-control" placeholder="Masukkan nama gejala" required>
              </div>
              
              <div class="col-md-12">
                <button class="btn btn-primary"><?= $type ?></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>