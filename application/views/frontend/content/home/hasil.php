<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <div class="card p-5">
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
                        <td>Presentase</td><td><?= $prob / $total * 100 ?>%</td>
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
                        ?>
                        <tr class='<?= $index == 0 ? 'bg-success text-white' : '' ?>'>
                            <td><?= $index+1 ?></td>
                            <td><?= $d['penyakit'] ?></td>
                            <td><?= $d['v'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
