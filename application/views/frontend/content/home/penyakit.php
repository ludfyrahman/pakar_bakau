<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <!-- <div class="card p-5"> -->
            <img src="<?= base_url('assets/img/logo.png') ?>" class='rounded mx-auto d-block' style="width:300px" alt="">
            <!-- <div class="row">
                <div class="col-3">
                    <img src="<?= base_url('assets/img/penyakit1.jpeg') ?>" class='img-fluid' alt="">
                </div>
                <div class="col-9">
                    <h4>Flu Burung</h4>
                    <p>Pengobatan dengan preparat sulfa serta memberikan antibiotik seperti streptomisin, erytromisin, novobiosin, gentamisin.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-9">
                    <h4>Penyakit tetelo</h4>
                    <p>1. Vaksin <br>
                        2. Ambil daun pepaya yang sudah terlihat tua, namun belum menguning , letakkan pada wadah atau mangkok yang berisi air sebanyak 100 ml, peras daun pepaya yang sudah diberi air hingga berwarna hijau pekat, minumkan air ekstrak tersebut pada tembakau sebanyak dua sendok makan atau sekitar 5 ml secara rutin tiga kali sehari, pada hari ketiga dosis dikurangi menjadi dua kali sehari.</p>
                </div>
                <div class="col-3">
                    <img src="<?= base_url('assets/img/penyakit2.jpeg') ?>" class='img-fluid' alt="">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    <img src="<?= base_url('assets/img/penyakit3.jpeg') ?>" class='img-fluid' alt="">
                </div>
                <div class="col-9">
                    <h4>Marek</h4>
                    <p>1. Pemberian chlortetracyline atau oxytetracycline pada pakan.<br>
2. Pemberian obat 200mg streptomycin.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-9">
                    <h4>Kerabang telur lembek	</h4>
                    <p>1. Vaksin<br>
                    2. Gunakan kapas untuk melepaskan sumbatan pada saluran pernafasan.<br>
                    3. Berikan antibiotik seperti Neo Meditril atau Ampicol untuk mencegah infeksi sekunder, untuk membantu proses penyembuhan tembakau berikan vitamin seperti Fortevit.<br>
                    4. Memisahkan tembakau yang terlihat sakit agar tidak menulari tembakau yang sehat. Keluarkan tembakau yang mati dan kuburkan jauh dari area kandang.<br></p>
                </div>
                <div class="col-3">
                    <img src="<?= base_url('assets/img/penyakit4.jpeg') ?>" class='img-fluid' alt="">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    <img src="<?= base_url('assets/img/penyakit5.jpeg') ?>" class='img-fluid' alt="">
                </div>
                <div class="col-9">
                    <h4>Caplak Unggas	</h4>
                    <p>1. Pengobatan dilakukan dengan fumigasi atau pencelupan dengan insektisida klordan 2,5 %, piretrum 10% dan na-fluorida</p>
                </div>
            </div> -->
            <h3>Daftar Penyakit</h3>
            <form action="<?= base_url('site/hasil') ?>" method="post">
               <div class="table-responsive">
                <table class="table table-striped mt-4">
                        <tr>
                            <th >Nama Penyakit</th><th >Solusi</th>
                        </tr>
                        <?php foreach ($data as $g) {?>
                        <tr>
                            <td ><?= $g['nama'] ?></td><td ><?= str_replace(PHP_EOL, ' <br> ', $g['solusi']) ?></td>
                        </tr>
                        <?php } ?>
                    </table>
               </div>
            </form>
        <!-- </div> -->
    </div>
</main>
