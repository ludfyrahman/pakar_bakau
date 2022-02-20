<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Penghitungan dataset</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#dataset" type="button" role="tab" aria-controls="home" aria-selected="true">Dataset</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#linear" type="button" role="tab" aria-controls="profile" aria-selected="false">Trend Linier</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#kuadratis" type="button" role="tab" aria-controls="contact" aria-selected="false">Kuadratis</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#eksponensial" type="button" role="tab" aria-controls="contact" aria-selected="false">Eksponensial</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#kesalahan" type="button" role="tab" aria-controls="contact" aria-selected="false">Tingkat Kesalahan</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#hasil" type="button" role="tab" aria-controls="contact" aria-selected="false">Hasil Prediksi</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="dataset" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Penderita</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          foreach ($data as $d) {
                          ?>
                          <tr>
                          <td><?= $no ?></td>
                          <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['tahun'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['jumlah'] ?></p>
                            </td>
                          
                          </tr>
                          <?php $no++;} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="linear" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kasus TB (Y)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">XY</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X2</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          $jumlah = 0;
                          $x = 0;
                          $xy = 0;
                          $x2 = 0;
                          $linear = [];
                          foreach ($data as $d) {
                            $jumlah +=$d['jumlah'];
                            $x      +=$d['x'];
                            $xy     +=$d['x'] * $d['jumlah'];
                            $x2     +=pow($d['x'], 2);
                            $linear[] = ['tahun' => $d['tahun'], 'jumlah' => $d['jumlah'], 'x' => $d['x'], 'xy' => $d['x'] * $d['jumlah'], 'x2' => pow($d['x'], 2)];
                          ?>
                          <tr>
                            <td><?= $no ?></td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['tahun'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['jumlah'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['x'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['x'] * $d['jumlah'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= pow($d['x'], 2) ?></p>
                            </td>
                          </tr>
                          <?php $no++;} ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan='2'>Jumlah</td><td><?= $jumlah ?></td><td><?= $x ?></td><td><?= $xy ?></td><td><?= $x2 ?></td>
                          </tr>
                        </tfoot>
                      </table>
                      <?php 
                      $a = $jumlah / count($data);
                      $b = $xy / $x2;
                      $trend_linear = $a .($b < 0 ? $b : '+'.$b) ."X"
                      ?>
                      <b>Nilai a: <?= $a ?></b>
                      <b>Nilai b: <?= $b ?></b>
                      <p>persamaan <i>Trend Linear</i> <br>
                      Y' = a + bx<br>
                      Y' = <?= $trend_linear?>
                      </p>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="kuadratis" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kasus TB (Y)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">XY</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X2</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X2Y</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X4</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          $jumlahk = 0;
                          $xk = 0;
                          $xyk = 0;
                          $x2k = 0;
                          $x2y = 0;
                          $x4 = 0;
                          $kuadratis = [];
                          foreach ($linear as $d) {
                            $jumlahk +=$d['jumlah'];
                            $xk      +=$d['x'];
                            $xyk     +=$d['x'] * $d['jumlah'];
                            $x2k     +=pow($d['x'], 2);
                            $x2y     +=$d['x2'] * $d['jumlah'];
                            $x4      +=pow($d['x'], 4);
                            $kuadratis[] = ['tahun' => $d['tahun'], 'jumlah' => $d['jumlah'], 'x' => $d['x'], 'xy' => $d['x'] * $d['jumlah'], 'x2' => pow($d['x'], 2), 'x2y' => $d['x2'] * $d['jumlah'], 'x4' => pow($d['x'], 4)];
                          ?>
                          <tr>
                            <td><?= $no ?></td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['tahun'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['jumlah'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['x'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['xy'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['x2'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['x2'] * $d['jumlah'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= pow($d['x'], 4) ?></p>
                            </td>
                          </tr>
                          <?php $no++;} ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan='2'>Jumlah</td><td><?= $jumlahk ?></td><td><?= $xk ?></td><td><?= $xyk ?></td><td><?= $x2k ?></td><td><?= $x2y ?></td><td><?= $x4 ?></td>
                          </tr>
                        </tfoot>
                      </table>
                      <?php 
                      $ck = (count($data) * $x2y - $x2k * $jumlahk) / (count($data) * $x4 - pow($x2k, 2));
                      $ak = ($jumlahk - ($ck * $x2k)) / count($data);
                      $bk = $xyk / $x2k;
                      $trend_kuadratis = $ak . ($bk < 0 ? $bk : '+'.$bk) ."X".($ck < 0 ? $ck : '+'.$ck."X2");
                      ?>
                      <p>Y' = a + bX + cX²<br>
                      Maka nilai koefisien a, b, dan c dari trend kuadratis dapat dihitung sebagai berikut:<br>
                      <b>
                        a : <?= $ak ?><br>
                        b : <?= $bk ?><br>
                        c : <?= $ck ?><br>
                      </b>
                      Berdasarkan perhitungan di atas diperoleh persamaan trend kuadratis sebagai berikut:<br>
                      Y' = a + bX + cX²<br>
                      Y' = <?= $trend_kuadratis ?>
                      </p>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="eksponensial" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kasus TB (Y)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X2</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Log Y</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X Log Y</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          $jumlah = 0;
                          $xe = 0;
                          $x2e = 0;
                          $logye = 0;
                          $xlogy = 0;
                          // $linear = [];
                          foreach ($kuadratis as $d) {
                            $jumlah +=$d['jumlah'];
                            $xe      +=$d['x'];
                            $x2e     +=pow($d['x'], 2);
                            $logye   +=LOG($d['jumlah'], 10);
                            $xlogy   +=$d['x'] * LOG($d['jumlah'], 10);
                            // $linear[] = ['tahun' => $d['tahun'], 'jumlah' => $d['jumlah'], 'x' => $d['x'], 'xy' => $d['x'] * $d['jumlah'], 'x2' => pow($d['x'], 2)];
                          ?>
                          <tr>
                            <td><?= $no ?></td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['tahun'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['jumlah'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['x'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= pow($d['x'], 2) ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= LOG($d['jumlah'], 10) ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['x'] * LOG($d['jumlah'], 10) ?></p>
                            </td>
                          </tr>
                          <?php $no++;} ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan='2'>Jumlah</td><td><?= $jumlah ?></td><td><?= $xe ?></td><td><?= $x2e ?></td><td><?= $logye ?></td><td><?= $xlogy?></td>
                          </tr>
                        </tfoot>
                      </table>
                     <p>
                       <?php 
                       $loga = $logye / count($data);
                       $logb = $xlogy / 10;
                       $antilog_a = pow(10, $loga);
                       $antilog_b = pow(10, $logb);
                       $trend_eksponensial = $antilog_a  ."*". $antilog_b."ˣ";
                       ?>
                     Y' = abˣ<br>
                     Maka nilai koefisien a dan b trend eksponensial dapat dihitung sebagai berikut:<br>
                     log Y' = log a + X log b<br>
                     <ul>
                       <li>Log a: <?= $loga ?></li>
                       <li>Log b: <?= $logb ?></li>
                       <li>Anti log a: <?= $antilog_a?></li>
                       <li>Anti log b: <?= $antilog_b?></li>
                     </ul>
                     Berdasarkan perhitungan di atas diperoleh persamaan trend eksponensial sebagai berikut:<br>
                     log Y' = log a + X log b<br>
                     <b>log Y' = <?= $loga ?> <?= $logb < 0 ? $logb : "+".$logb ?>X</b><br>
                     Y' = abˣ<br>
                    <b>Y' = <?= $trend_eksponensial ?></b>
                     </p>
                     <table class="table">
                       <thead>
                         <tr>
                           <th>Model</th><th>Model Kasus TB Paru</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>Trend Linear</td><td><?= $trend_linear ?></td>
                         </tr>
                         <tr>
                           <td>Trend Kuadratis	</td><td><?= $trend_kuadratis ?></td>
                         </tr>
                         <tr>
                           <td>Trend Eksponential	</td><td><?= $trend_eksponensial ?></td>
                         </tr>
                       </tbody>
                     </table>
                    </div>
                  </div>
                  <div class="tab-pane fade show " id="kesalahan" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive p-0">
                      <h4>Mape Trend Linear</h4>
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kasus TB Paru Y</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ramalan TB Paru Y'</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">(Y - Y')/Y</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          $ramalanJumlah  = $yJumlah = 0;
                          foreach ($data as $d) {
                            $trend = str_replace('X', '', $trend_linear);
                            $st = '';
                            if(strpos($trend_linear,"-") !== false){
                              $trend = explode('-', $trend_linear);
                              $st = 'min';
                            }else if(strpos($trend_linear,"+") !== false){
                              $trend = explode('+', $trend_linear);
                              $st = 'plus';
                            }
                            
                            if($st == 'min'){
                              $ramalan = (double)$trend[0] - ((double)$trend[1] * $d['x']);
                            }else{
                              $ramalan = (double)$trend[0] + ((double)$trend[1] * $d['x']);
                            }
                            $ramalanJumlah +=$ramalan;
                            $yJumlah +=($d['jumlah'] - $ramalan) / $d['jumlah'];
                            
                          ?>
                          <tr>
                          <td><?= $no ?></td>
                          <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['tahun'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['jumlah'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['x'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $ramalan ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= ($d['jumlah'] - $ramalan) / $d['jumlah'] ?></p>
                            </td>
                          </tr>
                          <?php $no++;} ?>
                          <tfoot>
                          <tr>
                            <td colspan='2'>Jumlah</td><td><?= $jumlahk ?></td><td><?= $xk ?></td><td><?= $ramalanJumlah ?></td><td><?= $yJumlah ?></td>
                          </tr>
                        </tfoot>
                        </tbody>
                      </table>
                      <h4>MAPE Trend Kuadratis</h4>
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kasus TB Paru Y</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X2</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ramalan TB Paru Y'</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">(Y - Y')/Y</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          $ramalankuadratis  = $yjumlahkuadratis = 0;
                          
                          foreach ($data as $d) {
                            $trend = str_replace('X', '', $trend_kuadratis);
                            $st = '';
                            if(strpos($trend_kuadratis,"-") !== false){
                              $trend = explode('-', $trend_kuadratis);
                              $st = 'min';
                            }else if(strpos($trend_kuadratis,"+") !== false){
                              $trend = explode('+', $trend_kuadratis);
                              $st = 'plus';
                            }
                            
                            if($st == 'min'){
                              $ramalan = (double)$trend[0] - ((double)$trend[1] * $d['x']) - ((double)$trend[2] * pow($d['x'], 2));
                            }else{
                              $ramalan = (double)$trend[0] + ((double)$trend[1] * $d['x'])+ ((double)$trend[2] * pow($d['x'], 2));
                            }
                            $ramalankuadratis +=$ramalan;
                            $yjumlahkuadratis +=($d['jumlah'] - $ramalan) / $d['jumlah'];
                            
                          ?>
                          <tr>
                          <td><?= $no ?></td>
                          <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['tahun'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['jumlah'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['x'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= pow($d['x'], 2) ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $ramalan ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= ($d['jumlah'] - $ramalan) / $d['jumlah'] ?></p>
                            </td>
                          </tr>
                          <?php $no++;} ?>
                          <tfoot>
                          <tr>
                            <td colspan='2'>Jumlah</td><td><?= $jumlahk ?></td><td><?= $xk ?></td><td><?= $x2k ?></td><td><?= $ramalankuadratis ?></td><td><?= $yjumlahkuadratis ?></td>
                          </tr>
                        </tfoot>
                        </tbody>
                      </table>
                      <h4>MAPE Trend Eksponensial</h4>
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kasus TB Paru Y</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ramalan TB Paru Y'</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">(Y - Y')/Y</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          $ramalaneksponensial  = $yjumlaheksponensial = 0;
                          
                          foreach ($data as $d) {
                            $trend = str_replace('ˣ', '', $trend_eksponensial);
                            $trend = explode('*', $trend_eksponensial);
                            $ramalan = (double)$trend[0] * ( pow((double)$trend[1], $d['x']));
                            $ramalaneksponensial +=$ramalan;
                            $yjumlaheksponensial +=($d['jumlah'] - $ramalan) / $d['jumlah'];
                            
                          ?>
                          <tr>
                          <td><?= $no ?></td>
                          <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['tahun'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['jumlah'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $d['x'] ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $ramalan ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= ($d['jumlah'] - $ramalan) / $d['jumlah'] ?></p>
                            </td>
                          </tr>
                          <?php $no++;} ?>
                          <tfoot>
                          <tr>
                            <td colspan='2'>Jumlah</td><td><?= $jumlahk ?></td><td><?= $xk ?></td><td><?= $ramalaneksponensial ?></td><td><?= $yjumlaheksponensial ?></td>
                          </tr>
                        </tfoot>
                        </tbody>
                      </table>
                      <p>Perbandingan Nilai MSD Peramalan kasus DBD untuk Trend Linier, Trend Kuadratis, dan Trend Eksponensial</p>
                      <?php 
                     $metode_linear = abs($yJumlah/ count($data));
                     $metode_kuadratis = abs($yjumlahkuadratis / count($data));
                     $metode_eksponential = abs($yjumlaheksponensial / count($data));
                     $metode = "";
                     $metode_id = 1;
                     if($metode_linear < $metode_kuadratis && $metode_linear < $metode_eksponential){
                       $metode = "Metode Linear";
                       $metode_id =1;
                     }else if($metode_kuadratis < $metode_linear && $metode_kuadratis < $metode_eksponential){
                      $metode = "Metode Kuadratis";
                      $metode_id =2;
                    }else{
                      $metode = "Metode Eksponential";
                      $metode_id =3;
                    }
                     ?>
                      <table class="table">
                       <thead>
                         <tr>
                           <th>Model</th><th>MAPE</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>Trend Linear</td><td><?= $metode_linear ?></td>
                         </tr>
                         <tr>
                           <td>Trend Kuadratis	</td><td><?= $metode_kuadratis ?></td>
                         </tr>
                         <tr>
                           <td>Trend Eksponential	</td><td><?= $metode_eksponential ?></td>
                         </tr>
                       </tbody>
                     </table>
                    
                     <p>Jadi metode prediksi yang digunakan adalah metode <b> <?= $metode ?></b> karena memiliki nilai kesalahan paling kecil</p>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="hasil" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="table-responsive p-0">
                      <?php 
                      if($metode_id == 1){
                      ?>
                      <h4>Linear</h4>
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prediksi</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pembulatan</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          $hasil = max($data);
                          $tahun = 5;
                          $hasilLX = $hasilLPrediksi = $hasilLPembulatan = 0;
                          $median = 0 -($tahun - (round($tahun/2)));
                          for ($i = $hasil['tahun']+1; $i < $hasil['tahun']+($tahun +1);$i++) {
                            $trend = str_replace('X', '', $trend_linear);
                            $st = '';
                            if(strpos($trend_linear,"-") !== false){
                              $trend = explode('-', $trend_linear);
                              $st = 'min';
                            }else if(strpos($trend_linear,"+") !== false){
                              $trend = explode('+', $trend_linear);
                              $st = 'plus';
                            }
                            
                            if($st == 'min'){
                              $ramalan = (double)$trend[0] - ((double)$trend[1] * $median);
                            }else{
                              $ramalan = (double)$trend[0] + ((double)$trend[1] * $median);
                            }
                            $hasilLX +=$median;
                            $hasilLPrediksi +=$ramalan;
                            $hasilLPembulatan +=round($ramalan);
                          ?>
                          <tr>
                            <td><?= $no ?></td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $median ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $ramalan ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= round($ramalan)?></p>
                            </td>
                          </tr>
                          <?php $no++;$median++;} ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan='2'>Jumlah</td><td><?= $hasilLX ?></td><td><?= $hasilLPrediksi ?></td><td><?= $hasilLPembulatan ?></td>
                          </tr>
                        </tfoot>
                      </table>
                      <?php }else if($metode_id == 2){?>
                      <h4>Kuadratis</h4>
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X2</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prediksi</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pembulatan</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          $hasil = max($data);
                          $tahun = 5;
                          $hasilX = $hasilX2 = $hasilPrediksi = $hasilPembulatan = 0;
                          $median = 0 -($tahun - (round($tahun/2)));
                          for ($i = $hasil['tahun']+1; $i < $hasil['tahun']+($tahun +1);$i++) {
                            $trend = str_replace('X', '', $trend_kuadratis);
                            $st = '';
                            if(strpos($trend_kuadratis,"-") !== false){
                              $trend = explode('-', $trend_kuadratis);
                              $st = 'min';
                            }else if(strpos($trend_kuadratis,"+") !== false){
                              $trend = explode('+', $trend_kuadratis);
                              $st = 'plus';
                            }
                            
                            if($st == 'min'){
                              $ramalan = (double)$trend[0] - ((double)$trend[1] * $median) - ((double)$trend[2] * pow($median, 2));
                            }else{
                              $ramalan = (double)$trend[0] + ((double)$trend[1] * $median)+ ((double)$trend[2] * pow($median, 2));
                            }
                            $hasilX +=$median;
                            $hasilX2 +=pow($median, 2);
                            $hasilPrediksi +=$ramalan;
                            $hasilPembulatan +=round($ramalan);
                          ?>
                          <tr>
                            <td><?= $no ?></td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $median ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= pow($median, 2) ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $ramalan ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= round($ramalan)?></p>
                            </td>
                          </tr>
                          <?php $no++;$median++;} ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan='2'>Jumlah</td><td><?= $hasilX ?></td><td><?= $hasilX2 ?></td><td><?= $hasilPrediksi ?></td><td><?= $hasilPembulatan ?></td>
                          </tr>
                        </tfoot>
                      </table>
                      <?php }else{ ?>
                      <h4>Eksponential</h4>
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">X2</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prediksi</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pembulatan</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          $hasil = max($data);
                          $tahun = 5;
                          $hasilEX = $hasilEX2 = $hasilEPrediksi = $hasilEPembulatan = 0;
                          $median = 0 -($tahun - (round($tahun/2)));
                          for ($i = $hasil['tahun']+1; $i < $hasil['tahun']+($tahun +1);$i++) {
                            $trend = str_replace('ˣ', '', $trend_eksponensial);
                            $trend = explode('*', $trend_eksponensial);
                            
                            $ramalan = (double)$trend[0] * ( pow((double)$trend[1], $median));
                            $hasilEX +=$median;
                            $hasilEX2 +=pow($median, 2);
                            $hasilEPrediksi +=$ramalan;
                            $hasilEPembulatan +=round($ramalan);
                          ?>
                          <tr>
                            <td><?= $no ?></td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $median ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= pow($median, 2) ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= $ramalan ?></p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0"><?= round($ramalan)?></p>
                            </td>
                          </tr>
                          <?php $no++;$median++;} ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan='2'>Jumlah</td><td><?= $hasilEX ?></td><td><?= $hasilEX2?></td><td><?= $hasilEPrediksi ?></td><td><?= $hasilEPembulatan ?></td>
                          </tr>
                        </tfoot>
                      </table>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>