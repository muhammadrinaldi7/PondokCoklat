<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="background-color:#876445;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?= base_url('/assets/img/cup.png')?>" height="50" width="35" alt="" srcset="">
                </div>
                <div class="sidebar-brand-text mx-1">Pondok Cokelat Hatta</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <?php if ($this->session->userdata('hak_akses')=='1'){?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data:</h6>
                        <a class="collapse-item" href="<?= base_url('bahan/bahan') ?>">Bahan Baku</a>
                        <a class="collapse-item" href="<?= base_url('supplier/supplier') ?>">Suppllier</a>
                        <a class="collapse-item" href="<?= base_url('outlet/outlet') ?>">Outlet</a>
                        <a class="collapse-item" href="<?= base_url('paket/paket') ?>">Paket</a>
                        <a class="collapse-item" href="<?= base_url('lokasi/lokasi') ?>">Lokasi</a>
                    </div>
                </div>
            </li>
            <?php } ?>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Transaksi</h6>
                        <?php if ($this->session->userdata('hak_akses')=='1'){?>
                        <a class="collapse-item" href="<?= base_url('transaksi/stoksupplier') ?>">Pembelian</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/orderan') ?>">Orderan</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/penjualan') ?>">Penjualan</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/kemitraan') ?>">Kemitraan</a>
                        <?php } ?>
                        <?php if ($this->session->userdata('hak_akses')=='2'){?>
                        <a class="collapse-item" href="<?= base_url('transaksi/penjualanc') ?>">Penjualan</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/penjualanc/detailpenjualan') ?>">Detail Pesanan</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/orderan') ?>">Order Bahan</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/seller') ?>">Rekap Penjulan Hari Ini</a>
                        <?php } ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                
            </div>
            <?php if ($this->session->userdata('hak_akses')=='1'){?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-scroll"></i>
                    <span>Report</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan : </h6>
                        <a class="collapse-item" href="<?= base_url('transaksi/Stoksupplier/cetakbahanmasuk') ?>">Data Barang Masuk</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/Stoksupplier/cetakbahankeluar') ?>">Data Barang Keluar</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/Seller/cetakseller') ?>">Penjualan Outlet</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/Stoksupplier/cetakMutasi') ?>">Mutasi Bahan</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/Labarugi/cetakMutasi') ?>">Laba Rugi</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/Analisa/CetakAnalisaProduk') ?>">Produk Terlaris</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/Kemitraan/LaporanKemitraan') ?>">Kemitraan</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/user') ?>">
                <i class="fas fa-fw fa-users"></i>
                    <span>Pengguna</span></a>
            </li>
            <?php }else{ ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-scroll"></i>
                    <span>Report</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan : </h6>
                        <a class="collapse-item" href="<?= base_url('transaksi/Seller/cetakseller') ?>">Laporan Penjualan Hari Ini</a>
                    </div>
                </div>
            </li>
            <?php } ?>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Login/logout') ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h2 style="font-family: Fantasy;margin-top:10px;color:#603601" >PONDOK COKELAT HATTA</h2>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username'); ?></span>
                                <i class="fas fa-user-circle"></i>
                            </a>
                        </li>

                    </ul>

                </nav>
              
                <!-- End of Topbar -->