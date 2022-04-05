<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <form action="<?= base_url('penyakit/update_gejala/'.$id) ?>" method="post">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Data <?= $title ?></h6>
                <button class="btn btn-primary btn-sm ms-auto float-end" type="submit">Simpan</button>

              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <?php Response_Helper::part('alert') ?>
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                        <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bobot</th> -->
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi<br><i>Silahkan centang untuk menentukan gejala penyakit</i></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $no = 1;
                      foreach ($data as $d) {
                      ?>
                      <tr>
                      <td class="text-xs font-weight-bold mb-0"><?= $no ?></td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0"><?= (strlen($no) > 1 ? 'G' : 'G0').$no ?></p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0"><?= $d['nama'] ?></p>
                        </td>
                        <!-- <td>
                          <p class="text-xs font-weight-bold mb-0"><?= $d['bobot'] ?></p>
                        </td> -->
                        <td>
                          <input type="checkbox" name="gejala[]" <?= in_array($d['id'], $gejala) ? 'checked' : '' ?> id="" value="<?= $d['id'] ?>">
                        </td>
                      </tr>
                      <?php $no++;} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>