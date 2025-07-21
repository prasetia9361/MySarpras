<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Daftar | Sarpras IC</title>
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/custom-login.css')?>">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="<?=base_url('assets/img/icp.png')?>" alt="Logo" style="max-width:150px">
      <b class="text-center">DAFTAR AKUN MYSARPRAS</b>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silakan isi form untuk daftar</p>
      <?php if(validation_errors()): ?>
        <div class="alert alert-warning"><?= validation_errors() ?></div>
      <?php endif; ?>
      <form action="<?=base_url('register')?>" method="post">
        <!-- Username -->
        <div class="input-group mb-3">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
          </div>
          <input type="text" name="username" class="form-control" placeholder="Username" value="<?=set_value('username')?>" required>
        </div>
        <!-- Nama Lengkap -->
        <div class="input-group mb-3">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
          </div>
          <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?=set_value('nama')?>" required>
        </div>
        <!-- Gender -->
        <div class="input-group mb-3">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-venus-mars"></i></span>
          </div>
          <select class="form-control" id="gender" name="gender" required>
            <option value="" disabled selected>Pilih Gender</option>
            <option value="0" <?= set_select('gender', '0'); ?>>Laki-laki</option>
            <option value="1" <?= set_select('gender', '1'); ?>>Perempuan</option>
          </select>
        </div>
        <!-- No HP -->
        <div class="input-group mb-3">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-phone"></i></span>
          </div>
          <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP" value="<?= set_value('no_hp') ?>" required>
        </div>
        <!-- Alamat -->
        <div class="input-group mb-3">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span>
          </div>
          <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan Alamat" required><?= set_value('alamat') ?></textarea>
        </div>
        <!-- Password -->
        <div class="input-group mb-3">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" name="password" class="form-control" placeholder="Password (min.6)" required>
        </div>
        <!-- Konfirmasi Password -->
        <div class="input-group mb-4">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" name="passconf" class="form-control" placeholder="Konfirmasi Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
      </form>
      <p class="mt-3 mb-1 text-center">
        Sudah punya akun? <a href="<?=base_url('login')?>" class="nav-link d-inline p-0">Login</a>
      </p>
    </div>
  </div>
  <footer class="footer">
    <p class="text-center">
      <strong>2024 - sistem Peminjaman Berbasis Web </strong> | design by Khoirul Adha
    </p>
  </footer>
  <!-- jQuery -->
  <script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>
</body>
</html>
