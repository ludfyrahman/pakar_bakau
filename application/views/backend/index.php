<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
  
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/iconly/bold.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/simple-datatables/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css">
  <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.svg" type="image/x-icon">
  <script src="<?= base_url() ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
  <script>
    var total = '<?= $agama+$ras+$netral ?>';
      var agama = '<?= $agama ?>' / total * 100;
      var ras = '<?= $ras ?>' / total * 100;
      var netral = '<?= $netral ?>' / total * 100;
  </script>
  <script src="<?= base_url() ?>assets/vendors/apexcharts/apexcharts.js"></script>
  <script src="<?= base_url() ?>assets/vendors/simple-datatables/simple-datatables.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div id="app">
    
    <?php
      include str_replace("system", "application/views/backend/", BASEPATH)."/layout/sidebar.php";
     ?>
     <div id="main">
      <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
              <i class="bi bi-justify fs-3"></i>
          </a>
      </header>
      <?php 
        include str_replace("system", "application/views/backend/", BASEPATH)."/layout/content.php";
      ?>
      <footer>
          <div class="footer clearfix mb-0 text-muted">
              <div class="float-start">
                  <p>2021 &copy; Sisca</p>
              </div>
              <div class="float-end">
                  <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                          href="#">Sisca</a></p>
              </div>
          </div>
      </footer>
     </div>
  </div>
  
  <script>
      // Simple Datatable
      let table1 = document.querySelector('#table1');
      let tfIdf = document.querySelector('#tfIdf');
      let tf = document.querySelector('#tf');
      let tableCase = document.querySelector('#tableCase');
      let feature_selection = document.querySelector('#feature-selection');
      
      let dataTable = new simpleDatatables.DataTable(table1);
      let tfIdfTable = new simpleDatatables.DataTable(tfIdf);
      let tfTable = new simpleDatatables.DataTable(tf);
      let caseTable = new simpleDatatables.DataTable(tableCase);
      let feature_selectionTable = new simpleDatatables.DataTable(feature_selection);
      
      
      
  </script>
  <script src="<?= base_url() ?>assets/js/pages/dashboard.js"></script>

  <script src="<?= base_url() ?>assets/js/main.js"></script>
</body>
</html>
