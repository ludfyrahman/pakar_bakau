<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <div class="card p-5">
            <img src="<?= base_url('assets/img/hen.png') ?>" class='rounded mx-auto d-block' style="width:300px" alt="">
            <h3>Sistem Pakar penyakit ayam</h3>
            <p class='text-justify'>Sistem pakar adalah usaha yang menirukan seorang pakar. Biasanya sistem
pakar berupa perangkat lunak pengambil keputusan yang mampu mencapai tingkat
performa yang sebanding dengan seorang pakar dalam bidang masalah yang yang
khusus dan sempit. Ide dasarnya adalah kepakaran ditransfer dari seorang pakar
(atau sumber kepakaran yang lain) ke komputer.</p>
            <div class="row">
                <div class="col-3 nopadding m-auto">
                    <img src="<?= base_url('assets/img/pakar/pakar.jpeg') ?>" style='width:180px' class='m-auto' alt="">
                </div>
                <div class="col-9 nopadding">
                    <h3>Biodata Pakar</h3>
                    <table class='table table-striped mt-2'>
                        <tr>
                            <td>Nama</td><td>Andi Babasusalam, S.Pt.</td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal lahir</td><td>10 Oktober 1974 di Sumenep, Jawa Timur</td>
                        </tr>
                    </table>
                    <p><?= substr(pakar_description,0,90) ?>... <a href="<?= base_url('site/pakar') ?>" class='text-primary'>Selengkapnya</a></p>
                </div>
            </div>
            <div>
                <h3>Galeri Kandang</h3>
                <a href="<?= base_url('site/penyakit') ?>" class='text-primary float-end'>Selengkapnya</a>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/pakar/kandang1.jpeg') ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/pakar/kandang2.jpeg') ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/pakar/kandang3.jpeg') ?>" alt="" class="img-fluid">
                </div>
                <!-- <div class="col-md-6 mt-2">
                    <img src="<?= base_url('assets/img/pakar/kandang4.jpeg') ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 mt-2">
                    <img src="<?= base_url('assets/img/pakar/kandang5.jpeg') ?>" alt="" class="img-fluid">
                </div> -->
            </div>
            <h3>Tata cara penggunaan</h3>
            <ol>
                <li>Membuka halaman website pakar</li>
                <li>Menampilkan halaman home</li>
                <li>Menekan menu di sebelah kanan</li>
                <li>Menekan tombol konsultasi</li>
                <li>Memilih gejala minimal 4 gejala</li>
                <li>Menekan tombol proses untuk melihat hasil</li>
                <li>Menampilkan halaman hasil penyakit sesuai dengan gejala yang di inputkan</li>
            </ol>
            
        </div>
    </div>
</main>
