<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <div class="card p-5">
            <h3>Kasus Tuberkulosis Paru Kabupaten Banyuwangi</h3>
            <p class='text-justify'>Sistem informasi ini merupakan website yang memuat informasi tuberkulosis paru di wilayah Kabupaten Banyuwangi. Informasi tersebut antara lain informasi gambaran umum tuberkulosis paru, peta persebaran, jumlah kasus berdasarkan kecamatan, dan prediksi jumlah kasus tuberkulosis paru di Kabupaten Banyuwang</p>
            <table class='table'>
                <thead>
                    <tr>
                        <th rowspan='2'>No</th><th rowspan='2'>Nama Kecamatan</th><th class='text-center' colspan='<?= count($tahun) ?>'>Tahun</th>
                    </tr>
                    <tr>
                        <?php 
                        foreach ($tahun as $t) {
                        ?>
                        <th><?= $t ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($result as $r) {
                    ?>
                    <tr>
                        <td><?= $no ?></td><td><?= $r['nama_kecamatan'] ?></td>
                        <?php 
                        foreach ($tahun as $t) {
                        ?>
                        <td class='text-end'><?= $r['data'][$t]['jumlah'] ?></td>
                        <?php } ?>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
            <h3>Grafik kasus paru</h3>
            <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
            </div>
        </div>
    </div>
</main>
