<!DOCTYPE html>
<html>
<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/dist/css/adminlte.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/css/custom-login.css')?>">
    <title>Login | MySarpras IC</title>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
      <div class="login-logo">
        <img src="<?=base_url('assets/img/icp.png')?>" alt="Logo" style="max-width:150px">
        <br>
        <b class="text-center">SARPRAS MAN INSAN CENDEKIA PEKALONGAN </b>
      </div>
    <!-- <div class="card"> -->
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silakan login untuk masuk</p>
        <?php if($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><?= $this->session->flashdata('error')?></div>
        <?php endif; ?>
        <form action="<?=site_url('auth/login')?>" method="post">
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-user"></span></div>
            </div>
            <input type="text" name="username" class="form-control" placeholder="Username">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
          </div>
        </form>
        <p class="mt-3 mb-1 text-center">
          Belum punya akun? <a href="<?=base_url('register')?>">Daftar</a>
        </p>
      </div>
    <!-- </div> -->
  </div>

<!-- </div> -->
<!-- /.content-wrapper -->
  <footer class="footer">
    <p class="text-center">
    <strong>2024 - sistem Peminjaman Berbasis Web </strong> | design by Khoirul Adha
    </p>
    
  </footer>
  <!-- /.control-sidebar -->
<!-- </div> -->

<!-- jQuery -->
<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>

</body>
</html>
