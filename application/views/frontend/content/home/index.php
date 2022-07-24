<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <div class="card p-5">
            <img src="<?= base_url('assets/img/logo.png') ?>" class='rounded mx-auto d-block' style="width:300px" alt="">
            <h3>Sistem Pakar penyakit Tembakau</h3>
            <p class='text-justify'>Sistem pakar adalah usaha yang menirukan seorang pakar. Biasanya sistem
pakar berupa perangkat lunak pengambil keputusan yang mampu mencapai tingkat
performa yang sebanding dengan seorang pakar dalam bidang masalah yang yang
khusus dan sempit. Ide dasarnya adalah kepakaran ditransfer dari seorang pakar
(atau sumber kepakaran yang lain) ke komputer.</p>
            
            <div class='mt-2'>
                <h3>Galeri Penyakit</h3>
                <a href="<?= base_url('site/penyakit') ?>" class='text-primary float-end'>Selengkapnya</a>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/wereng.jpeg') ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/grayak.jpeg') ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/kutu.jpeg') ?>" alt="" class="img-fluid">
                </div>
                
            </div>
            <div class='mt-2'>
                <h3>Penyakit</h3>
            </div>
            <p><?= substr(penyakit_description,0,180) ?>... <a href="<?= base_url('site/penyakit') ?>" class='text-primary'>Selengkapnya</a></p>
            <div class='mt-2'>
                <h3>Diagnosa <a class='text-primary' href="<?= base_url('site/diagnosa') ?>">Sekarang</a></h3>
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
