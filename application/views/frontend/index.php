<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url() ?>assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />


  <!-- GIS -->
  
</head>
<style>
  .bg-primary,.btn-primary{
    background:#59781e!important;
  }
  .bg-gradient-primary {
    background-image: linear-gradient(310deg, #59781e 0%, #825ee4 100%);
}
</style>
<body class="hold-transition login-page">
    <?php
      
      $useragent=$_SERVER['HTTP_USER_AGENT'];

        include str_replace("system", "application/views/frontend/", BASEPATH)."/layout/navbar.php";

      include str_replace("system", "application/views/frontend/", BASEPATH)."/layout/content.php";
     ?>
     <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
          <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg">
          <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
              <h5 class="mt-3 mb-0">Menu</h5>
              <!-- <p>See our dashboard options.</p> -->
            </div>
            <div class="float-end mt-4">
              <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                <i class="fa fa-close"></i>
              </button>
            </div>
            <!-- End Toggle Button -->
          </div>
          <hr class="horizontal dark my-1">
          <div class="card-body pt-sm-3 pt-0 overflow-auto">
            <!-- <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a> -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('site/diagnosa') ?>">Diagnosa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('site/informasi') ?>">informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('site/penyakit') ?>">Penyakit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('site/prediksi') ?>">About</a>
                </li>
            </ul>
          </div>
        </div>
    </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="text-center">
            <!-- <div class="col-lg-6 mb-lg-0 mb-4"> -->
              <div class="copyright text-center text-sm text-muted ">
              © <?= date('Y') ?>,
              dibuat oleh <b>Ansori</b>
              </div>
            <!-- </div> -->
            
          </div>
        </div>
      </footer>
       <!--   Core JS Files   -->
  <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>assets/js/argon-dashboard.min.js?v=2.0.0"></script>
  <script src="<?= base_url() ?>assets/js/plugins/chartjs.min.js"></script>
  <script>
    function hapus(){
      return confirm("apakah anda yakin ingin menghapus data?");
    }
    
  </script>
  </body>
</html>
