<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- Filter Laporan -->
                <div class="noprint">
                    <form method="get" action="<?= base_url('laporan') ?>">
                        
                        <div class="row">
                            <div class="col-lg-3 mb-4">
                                <div class="input-group">
                                    <input type="date" name="mulai_tanggal" id="datepicker1" autocomplete="off" placeholder="tanggal mulai"
                                        class="form-control border-1 small" value="<?= set_value('mulai_tanggal', $mulai ?? '') ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button" id="date1">
                                            <i class="fas fa-calendar fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 mb-4">
                                <div class="input-group">
                                    <input type="date" name="sampai_tanggal" id="datepicker2" autocomplete="off" placeholder="tanggal akhir"
                                        class="form-control border-1 small" value="<?= set_value('sampai_tanggal', $sampai ?? '') ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button" id="date2">
                                            <i class="fas fa-calendar fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <button type="submit" class="btn btn-md btn-primary btn-icon-split">
                                    <span class="text text-white">Tampilkan</span>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </button>

                                <?php if ($rekap): ?>

                                <a href="<?= base_url('laporan/cetak_pdf?mulai_tanggal=' . $mulai . '&sampai_tanggal=' . $sampai) ?>" 
                                target="_blank" 
                                class="btn btn-md btn-danger btn-icon-split">
                                    <span class="text text-white">Cetak PDF</span>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                </a>

                                <?php endif; ?>
                            </div>
                        </div>

                    </form>
                </div>
                
                <?php if ($mulai && $sampai): ?>
                    <p>Periode mulai  : <?= $mulai ?></p>
                    <p>Periode sampai : <?= $sampai ?></p>
                <?php endif; ?>

                <!-- Tabel Data -->
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Perizinan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($rekap): $no = 1; foreach ($rekap as $rkp): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $rkp->nama ?></td>
                                        <td><?= $rkp->id_barang ?></td>
                                        <td><?= $rkp->nama_barang ?></td>
                                        <td><?= $rkp->tanggal ?></td>
                                        <td><?= $rkp->keterangan ?></td>
                                        <td><?= $rkp->aksi ?></td>
                                    </tr>
                                <?php endforeach; else: ?>
                                    <tr><td colspan="4">Tidak ada data</td></tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Perizinan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- /.content -->
