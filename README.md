#Sentimen Analisis

#login
#hapus idf+1 di testing v
#sorting belum menyesuaikan data testing v
#penghitungan data trainig masih keliru v
#stopword di testing sudah bener tetapi di training keliru v
#nilai 0 dihapus
#jumlah text di stopword dengan TF IDF beda harusnya sama v
#reload menggunakan ajax agar lebih cepat  v
#inpur file analisis atau testing
#data uji
#crud katadasar, stopword
<?php foreach ($sebaran as $d) {?>
    var marker = L.marker([<?= $d['latitude'] ?>, <?= $d['longitude'] ?>],{
        icon:blueIcons
    }).bindPopup('<b><?= $d['kecamatan'] ?>: <?= $d['jumlah'] ?> kasus</b><br>').addTo(map);
<?php }?>
 var blueIcons = new L.icon({
                        iconUrl:'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
                        iconSize:[25, 41],
                        iconAnchor:[12,41],
                        popupAnchor:[1,-34],
                        shadowSize:[41,41]
                    })