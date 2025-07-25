<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $akses = $this->session->userdata('akses'); ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url('assets/img/icp.png')?>"" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .950">
      <?php if ($akses === '0'): ?>
        <span class="brand-text font-weight-light">USER</span>
      <?php elseif ($akses === '1'): ?>
        <span class="brand-text font-weight-light">ADMIN</span>
      <?php elseif ($akses === '2'): ?>
          <span class="brand-text font-weight-light">WAKA Sarpras</span>
      <?php endif; ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('assets/img/user.png')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('nama');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU UTAMA</li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard')?>" class="nav-link">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php if ($akses === '1'): // ADMIN ?>
          <li class="nav-item">
            <a href="<?= base_url('dataSarpras')?>" class="nav-link">
              <i class="fas fa-scroll"></i>
              <p>Data Sarpras</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kelolaUser')?>" class="nav-link">
              <i class="fas fa-users"></i>
              <p>Kelola Data User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('laporan')?>" class="nav-link">
              <i class="fas fa-archive"></i>
              <p>Rekap Laporan</p>
            </a>
          </li>
          <?php elseif ($akses === '2'): // WAKA SARPRAS ?>
          <li class="nav-item">
            <a href="<?= base_url('acc')?>" class="nav-link">
              <i class="fas fa-handshake"></i>
              <p>Persetujuan Peminjaman</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('laporan')?>" class="nav-link">
              <i class="fas fa-archive"></i>
              <p>Rekap Laporan</p>
            </a>
          </li>
          <?php elseif ($akses === '0'): // USER ?>
          <li class="nav-item">
            <a href="<?= base_url('daftarSarpras')?>" class="nav-link">
              <i class="fas fa-tags"></i>
              <p>Daftar Sarpras</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('pengajuan')?>" class="nav-link">
              <i class="fas fa-cart-plus"></i>
              <p>Pengajuan Sarpras</p>
            </a>
          </li>
          <?php endif; ?>
          <!-- … menu-role based sebelumnya … -->
          <li class="nav-item">
            <a href="<?=base_url('logout')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">