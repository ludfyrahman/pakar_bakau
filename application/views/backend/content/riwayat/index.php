<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data <?= $this->low ?></h6>
              <!-- <a href="<?= base_url($this->low.'/add') ?>"><button class="btn btn-primary btn-sm ms-auto ">Tambah</button></a> -->

            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <?php Response_Helper::part('alert') ?>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gejala</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Penyakit</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td><td>27-02-2022</td><td>
                        1. ayam lemas karena nafsu makan turun<br>
                        2. pertumbuhan berat badan lambat,<br>
                        3. lehernya melintir (telo) atau spot merah di usus (pencernaan)n<br>
                      </td>
                      <td>Penyakit Tetelo</td>
                    </tr>
                  <?php 
                    $no = 1;
                    foreach ($data as $d) {
                    ?>
                    <tr>
                     <td class="text-xs font-weight-bold mb-0"><?= $no ?></td>
                     <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $d['nama'] ?></p>
                      </td>
                      
                      <td class="align-middle">
                        <a href="<?= base_url($this->low.'/edit/'.$d['id']) ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Ubah
                        </a>
                        | 
                        <a href="<?= base_url($this->low.'/delete/'.$d['id']) ?>" class="text-secondary font-weight-bold text-xs " onclick="return hapus()" data-toggle="tooltip" data-original-title="Hapus user">
                          Hapus
                        </a>
                      </td>
                    </tr>
                    <?php $no++;} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>