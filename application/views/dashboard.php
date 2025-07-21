    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- Box Dashboard: Selalu tampil -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>1</h3>
                <p>Dashboard</p>
              </div>
              <div class="icon">
                <i class="fas fa-home"></i>
              </div>
              <a href="<?= base_url('dashboard')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ADMIN -->
          <?php if ($akses === '1'): ?>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>2</h3>
                  <p>Data Sarpras</p>
                </div>
                <div class="icon">
                  <i class="fas fa-scroll"></i>
                </div>
                <a href="<?= base_url('dataSarpras')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-indigo">
                <div class="inner">
                  <h3>3</h3>
                  <p>Kelola Data User</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="<?= base_url('kelolaUser')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>4</h3>
                  <p>Rekap Laporan</p>
                </div>
                <div class="icon">
                  <i class="fas fa-archive"></i>
                </div>
                <a href="<?= base_url('laporan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php elseif ($akses === '2'): ?>
            <!-- WAKA SARPRAS -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>2</h3>
                  <p>Persetujuan Peminjaman</p>
                </div>
                <div class="icon">
                  <i class="fas fa-handshake"></i>
                </div>
                <a href="<?= base_url('acc')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>3</h3>
                  <p>Rekap Laporan</p>
                </div>
                <div class="icon">
                  <i class="fas fa-archive"></i>
                </div>
                <a href="<?= base_url('laporan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php elseif ($akses === '0'): ?>
            <!-- USER -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-teal">
                <div class="inner">
                  <h3>2</h3>
                  <p>Daftar Sarpras</p>
                </div>
                <div class="icon">
                  <i class="fas fa-tags"></i>
                </div>
                <a href="<?= base_url('daftarSarpras')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>3</h3>
                  <p>Pengajuan Sarpras</p>
                </div>
                <div class="icon">
                  <i class="fas fa-cart-plus"></i>
                </div>
                <a href="<?= base_url('pengajuan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
