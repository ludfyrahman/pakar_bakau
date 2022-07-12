<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <div class=" p-5">
            <img src="<?= base_url('assets/img/logo.png') ?>" class='rounded mx-auto d-block' style="width:300px" alt="">
            <i>Hasil penyakit yang ditampilkan sesuai dengan gejala yang dipilih</i>
            <div class="table-responsive">
                <h4>Gejala yang dipilih</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th><th>Nama Gejala</th><th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($data[0] as $index => $d) {
                        ?>
                        <tr>
                            <td><?= $d['id'] ?></td><td><?= $d['nama'] ?></td><td><?= $d['bobot'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h4>Rule hasil Pemrosesan</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th><th>Rules</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($data[1] as $index => $d) {
                        ?>
                        <tr>
                            <td><?= $d['id'] ?></td><td><?= $d['rules'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h4>Rule dengan Pembobotan</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th><th>Rules</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($data[2] as $index => $d) {
                        ?>
                        <tr>
                            <td><?= $d['id'] ?></td><td><?= $d['rules'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h4>Rule dengan perkalian Cf Pakar</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th><th>Rules</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($data[3] as $index => $d) {
                        ?>
                        <tr>
                            <td><?= $d['id'] ?></td><td><?= $d['rules'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h4>Hasil Kali cf user dengan cf pakar</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th><th>Rules</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($data[4] as $index => $d) {
                        ?>
                        <tr>
                            <td><?= $d['id'] ?></td><td><?= $d['rules'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h4>Penghitungan Bobot</h4>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>ID</th><th>PENGHITUNGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($data[5] as $index => $d) {
                        ?>
                        <tr>
                            <td><?= $d['id'] ?></td><td><?= $d['penghitungan'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h4>Nilai tertinggi dari hasil penghitungan adalah <b><i><?= $data[7] ?></i></b></h4>
                <table class="table table-striped mt-4">
                    <tr>
                        <td>Nama Penyakit</td><td><?= $data[8]['nama'] ?></td>
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
                        <td>Nilai Presentase</td><td><b><?= $data[7] ?></b></td>
                    </tr>
                    
                    <tr>
                        <td>Solusi</td><td><?= str_replace(PHP_EOL, ' <br> ', $data[8]['solusi']) ?></td>
                    </tr>
                </table>
                
            </div>
        </div>
    </div>
</main>
