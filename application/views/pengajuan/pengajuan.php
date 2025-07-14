<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <a href="<?= base_url('pengajuan/tambah')?>" class="btn btn-primary btn-sm">Ajukan Permohonan</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Jenis Pengajuan</th>
                        <th>Keterangan</th>
                        <th>Setatus</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($rekap): 
                        $no = 1; 
                        foreach ($rekap as $rkp): 
                            if ($rkp->aksi == 0) {
                                $status = "ditolak";
                            }elseif ($rkp->aksi == 1) {
                                $status = "disetujui";
                            } else {
                                $status = "pengajuan";
                            }
                ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $rkp->nama ?></td>
                            <td><?= $rkp->id_barang ?></td>
                            <td><?= $rkp->nama_barang ?></td>
                            <td><?= $rkp->tanggal ?></td>
                            <td>
                                <?= $rkp->jenis_pengajuan == 0 ? "Peminjaman" : "Pengembalian"; ?>
                            </td>
                            <td><?= $rkp->keterangan ?></td>
                            <td><?= $status ?></td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Tidak ada data</td></tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Jenis Pengajuan</th>
                        <th>Keterangan</th>
                        <th>Setatus</th>
                    </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
