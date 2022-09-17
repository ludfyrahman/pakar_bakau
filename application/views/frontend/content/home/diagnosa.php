<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <div class="card p-4">
            <img src="<?= base_url('assets/img/logo.png') ?>" class='rounded mx-auto d-block' style="width:300px" alt="">
            <i>Silahkan pilih gejala sesuai kondisi  yang ditemukan pada tembakau anda. sesuai dengan table dibawah ini.</i>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th><th>Keterangan</th><th>Nilai CF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach (BOBOT_DESC as $no=> $b) {
                    ?>
                    <tr>
                        <td><?= ($no+1) ?></td>
                        <td ><?= $b ?></td>
                        <td><?= BOBOT_CF[$no] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form action="<?= base_url('site/hasil') ?>" method="post">
               <div class="table-responsive">
               <table class="table table-striped mt-4">
                    <tr>
                        <th>Kode</th><th >Nama Gejala</th><th>Pilih kondisi</th>
                    </tr>
                    <?php $no = 1;foreach ($data as $index => $g) {?>
                    <tr>
                        <td><?= (strlen($no) > 1 ? 'G0' : 'G00').$no ?></td>
                        <td ><?= $g['nama'] ?></td>
                        <td>
                            <?php 
                                foreach (BOBOT_DESC as $indexR=> $b) {
                            ?>
                            <input type="radio" name="gejala[<?= $index ?>]" value="<?= BOBOT_CF[$indexR].','.$g['id'] ?>">  <?= $b ?>[<?= BOBOT_CF[$indexR] ?>]
                            <?php } ?>
                            
                        </td>
                    </tr>
                    <?php $no++;} ?>
                </table>
               </div>
                <button class="btn btn-primary" type="submit">Proses</button>
            </form>
        </div>
    </div>
</main>
