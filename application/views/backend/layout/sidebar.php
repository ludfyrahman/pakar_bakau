<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?= base_url() ?>assets/images/logo/logo.png" alt="Logo" style="width:200px!important" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <!-- <li class="sidebar-title">Menu</li> -->

                        <li class="sidebar-item <?= (in_array($this->uri->segment(1), array('dashboard')) == true ? 'active' : '')?> ">
                            <a href="<?= base_url('dashboard') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- <li class="sidebar-title">Master</li> -->

                        <li class="sidebar-item  <?= (in_array($this->uri->segment(1), array('pengguna')) == true ? 'active' : '')?>">
                            <a href="<?= base_url('pengguna') ?>" class='sidebar-link'>
                                <i class="bi bi-chat-dots-fill"></i>
                                <span>Pengguna</span>
                            </a>
                        </li>
                        <li class="sidebar-item  <?= (in_array($this->uri->segment(1), array('training')) == true ? 'active' : '')?>">
                            <a href="<?= base_url('training') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Data Latih</span>
                            </a>
                        </li>
                        <li class="sidebar-item  <?= (in_array($this->uri->segment(1), array('testing')) == true ? 'active' : '')?>">
                            <a href="<?= base_url('testing/add') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Testing</span>
                            </a>
                        </li>
                        <li class="sidebar-item  <?= (in_array($this->uri->segment(1), array('uji')) == true ? 'active' : '')?>">
                            <a href="<?= base_url('uji') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Data Uji</span>
                            </a>
                        </li>
                        <!-- <li class="sidebar-item  <?= (in_array($this->uri->segment(1), array('training')) == true ? 'active' : '')?>">
                            <a href="<?= base_url('training') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Normalisasi</span>
                            </a>
                        </li>
                        <li class="sidebar-item  <?= (in_array($this->uri->segment(1), array('training')) == true ? 'active' : '')?>">
                            <a href="<?= base_url('training') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>StopWord</span>
                            </a>
                        </li> -->
                        <li class="sidebar-item ">
                            <a href="<?= base_url('site/logout') ?>" class='sidebar-link'>
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>