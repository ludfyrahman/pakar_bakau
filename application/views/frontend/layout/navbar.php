<div>
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl  mt-3 mx-3 bg-primary" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <!-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Virtual Reality</li>
          </ol> -->
          <!-- <?php Response_Helper::part('breadcrumb') ?> -->
          <h6 class="font-weight-bolder text-white mb-0"><?= $title ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <!-- <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div> -->
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="<?= base_url('') ?>" class="nav-link text-white me-2 font-weight-bold px-0">
                <!-- <i class="fa fa-user me-sm-1"></i> -->
                <span class="d-sm-inline d-none">Home</span>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="<?= base_url('site/penyakit') ?>" class="nav-link text-white me-2 font-weight-bold px-0">
                <span class="d-sm-inline d-none">Penyakit</span>
              </a>
            </li>
            <!-- <li class="nav-item d-flex align-items-center">
              <a href="<?= base_url('site/pakar') ?>" class="nav-link text-white me-2 font-weight-bold px-0">
                <span class="d-sm-inline d-none">Pakar</span>
              </a>
            </li> -->
            <li class="nav-item d-flex align-items-center">
              <a href="<?= base_url('site/informasi') ?>" class="nav-link text-white me-2 font-weight-bold px-0">
                <span class="d-sm-inline d-none">About</span>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="<?= base_url('site/diagnosa') ?>" class="nav-link text-white me-2 font-weight-bold px-0">
                <span class="d-sm-inline d-none">Diagnosa</span>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="<?= base_url('site/login') ?>" class="nav-link text-white font-weight-bold px-0">
                <!-- <i class="fa fa-user me-sm-1"></i> -->
                <!-- <span class="d-sm-inline d-none">Login</span> -->
                <button class="btn bg-white d-sm-inline d-none m-auto">Login</button>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <!-- <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li> -->
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <!-- <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a> -->
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  </div>
  <style>
    .navbar-nav li{
      padding:0 12px;
    }
  </style>