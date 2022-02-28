<main class="main-content mt-1 border-radius-lg">
    <div class="container mt-4">
        <div class="card p-5">
            <!-- <img src="<?= base_url('assets/img/cough.png') ?>" class='rounded mx-auto d-block' style="width:300px" alt=""> -->
            <h3>Peta Persebaran</h3>
            <div id="map"></div>
            <b>Keterangan:</b>
            <ul>
                <li>Merah:Tinggi</li>
                <li>Kuning:Sedang</li>
                <li>Hijau: Rendah</li>
            </ul>
            <p>Keterangan  “Jumlah kasus pada peta persebaran adalah seluruh pasien tuberkulosis yang berada di wilayah kerja puskesmas pada kecamatan tersebut termasuk pasien yang ditemukan di RS, BBKPM/BPKPM/BP4, Lembaga Pemasyarakatan, Rumah Tahanan, Dokter Praktek Mandiri, Klinik dll.”
Jumlah penduduk per September 2020 1.708.114 jiwa</p>
                <style>
                    #map {
                        width: 100%;
                        height: 60vh;
                    }

                    .info {
                        padding: 6px 8px;
                        font: 12px/14px Arial, Helvetica, sans-serif;
                        background: white;
                        background: rgba(255, 255, 255, 0.8);
                        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                        border-radius: 5px;
                    }

                    .info h4 {
                        margin: 0 0 5px;
                        color: #777;
                    }

                    .legend {
                        text-align: left;
                        line-height: 18px;
                        color: #555;
                    }

                    .legend i {
                        width: 16px;
                        height: 16px;
                        float: left;
                        margin-right: 8px;
                        opacity: 0.7;
                    }
                </style>
                <script>
                    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        id: 'mapbox/streets-v11',
                        accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
                    });

                    var vector_kecamatan = L.layerGroup();

                    <?php 
                    foreach ($sebaran as $index => $data) {
                        $warna = ['#e20200', '#f2720d', '#f9eb00', '#03cc3d'];
                    ?>
                    
                        L.geoJSON(<?= $data['geojson'] ?>, {
                            style: {
                                color: 'black',
                                fillColor: '<?= $warna[$data['kategori']-1] ?>',
                                fillOpacity: 1.0,
                                weight: 1,
                                
                            }
                        }).bindTooltip('<?= $data['kecamatan']." Jumlah: ".$data['jumlah'] ?>', {
                            permanent: true,
                            direction: 'left'
                        }).addTo(vector_kecamatan);
                        // 
                    <?php } ?>
                    var blueIcons = new L.icon({
                        iconUrl:'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
                        iconSize:[25, 41],
                        iconAnchor:[12,41],
                        popupAnchor:[1,-34],
                        shadowSize:[41,41]
                    })
                    var map = L.map('map', {
                        center: [-8.2169235, 114.3311312],
                        zoom: 10,
                        layers: [peta1, vector_kecamatan],
                    });
                   
                    var baseMaps = {
                        "Map": peta1,
                    };
                    L.control.layers(baseMaps).addTo(map);
                </script>
        </div>
    </div>
</main>
