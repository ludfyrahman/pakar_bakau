<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <div class=" p-5">
            <img src="<?= base_url('assets/img/hen.png') ?>" class='rounded mx-auto d-block' style="width:300px" alt="">
            <i>Hasil penyakit yang ditampilkan sesuai dengan gejala yang dipilih</i>
            <div class="table-responsive">
                <table class="table table-striped mt-4">
                    <tr>
                        <td>Nama Penyakit</td><td><?= $data[0]['penyakit'] ?></td>
                    </tr>
                    <tr>
                        <td>Gejala</td><td>
                            <?php 
                            $total = count($gejala);
                            $prob = 0;
                            foreach ($gejala as $nomor => $g) {
                                echo ($nomor+1).". ".(in_array($g['id'], $input) ? '<b>' : '').$g['nama'].(in_array($g['id'], $input) ? '</b>' : '')."<br>";
                                if(in_array($g['id'], $input)){
                                    $prob++;
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Nilai Probabilitas</td><td><b><?= $data[0]['v'] ?></b></td>
                    </tr>
                    <tr>
                        <td>Presentase</td><td><?= number_format(($prob > 0 ? $prob / $total * 100 : 0), 2) ?>%</td>
                    </tr>
                    <tr>
                        <td>Solusi</td><td><?= str_replace(PHP_EOL, ' <br> ', $data[0]['solusi']) ?></td>
                    </tr>
                </table>
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <td>NO</td><td>Nama Penyakit</td><td>Nilai V</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($data as $index => $d) {
                            if($index < 4){
                        ?>
                        <tr class='<?= $index == 0 ? 'bg-success text-white' : '' ?>'>
                            <td class='<?= $index == 0 ? ' text-white' : '' ?>'><?= $index+1 ?></td>
                            <td class='<?= $index == 0 ? ' text-white' : '' ?>'><?= $d['penyakit'] ?></td>
                            <td class='<?= $index == 0 ? ' text-white' : '' ?>'><?= $d['v'] ?></td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
