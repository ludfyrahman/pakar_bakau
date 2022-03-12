<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <div class="card p-5">
            <img src="<?= base_url('assets/img/hen.png') ?>" class='rounded mx-auto d-block' style="width:300px" alt="">
            <i>Silahkan pilih gejala sesuai kondisi  yang ditemukan pada ayam anda</i>
            <table class="table table-striped mt-4">
                <tr>
                    <th>Nama Gejala</th><th>Pilih kondisi</th>
                </tr>
                <?php foreach ($data as $g) {?>
                <tr>
                    <td><?= $g['nama'] ?></td><td><input type="checkbox" name="" id=""></td>
                </tr>
                <?php } ?>
            </table>
            <a href="<?= base_url('site/hasil') ?>"><button class="btn btn-primary">Proses</button></a>
        </div>
    </div>
</main>
