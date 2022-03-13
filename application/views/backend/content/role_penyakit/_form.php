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
          <p class="text-uppercase text-sm">Form <?=$this->cap ?></p>
          <?php Response_Helper::part('alert') ?>
          <form action="" method="post">
            <div class="row">
              <div class="form-group col-md-12">
                  <label>Gejala</label>
                  <?php $gej = Input_Helper::postOrOr('id_gejala', isset($data['id_gejala']) ? $data['id_gejala'] : '')?>
                  <select name="id_gejala" id="" class="form-control">
                    <option value="">Pilih Gejala</option>
                    <?php 
                    foreach ($gejala as $g) {
                    ?>
                    <option value="<?= $g['id'] ?>"><?= $g['nama'] ?></option>
                    <?php } ?>
                  </select>
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
  </div>
</div>