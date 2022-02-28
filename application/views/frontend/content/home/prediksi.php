<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <div class="card p-5">
            <h3>Prediksi Kasus Tuberkulosis Paru Kabupaten Banyuwangi</h3>
            <p class='text-justify'>Sistem informasi ini merupakan website yang memuat informasi tuberkulosis paru di wilayah Kabupaten Banyuwangi. Informasi tersebut antara lain informasi gambaran umum tuberkulosis paru, peta persebaran, jumlah kasus berdasarkan kecamatan, dan prediksi jumlah kasus tuberkulosis paru di Kabupaten Banyuwang</p>
            <table class='table'>
                <thead>
                    <tr>
                        <th>No</th><th>Tahun</th><th>Jumlah</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data as $r) {
                    ?>
                    <tr>
                        <td><?= $no ?></td><td><?= $r['tahun'] ?></td><td><?= $r['prediksi'] ?></td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
            <h3>Grafik Prediksi</h3>
            <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
            </div>
            <h4>Grafik prediksi jumlah tb tahun <?= $tahun[0] ?> - <?= $tahun[count($tahun) - 1] ?><br>
                Tabel hasil prediksi jumlah tb tahun <?= $tahun[0] ?> - <?= $tahun[count($tahun) - 1] ?></h4>
        </div>
    </div>
</main>
