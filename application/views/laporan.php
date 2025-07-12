<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- Filter Laporan -->
                <div class="card">
                    <div class="card-body">
                        <form method="GET" action="">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="mulaiTanggal">Mulai Tanggal</label>
                                    <input type="date" class="form-control" id="mulaiTanggal" name="mulai_tanggal" value="<?= isset($mulai) ? $mulai : '' ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="sampaiTanggal">Sampai Tanggal</label>
                                    <input type="date" class="form-control" id="sampaiTanggal" name="sampai_tanggal" value="<?= isset($sampai) ? $sampai : '' ?>">
                                </div>
                                <div class="form-group col-md-3 align-self-end">
                                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                                    <a href="<?= base_url('cetakPDF')?>?mulai_tanggal=<?= isset($mulai) ? $mulai : '' ?>&sampai_tanggal=<?= isset($sampai) ? $sampai : '' ?>" target="_blank" class="btn btn-danger">Cetak PDF</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

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
                                <?php $no = 1; foreach ($rekap as $rkp): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $rkp->nama ?></td>
                                        <td><?= $rkp->id_barang ?></td>
                                        <td><?= $rkp->nama_barang ?></td>
                                        <td><?= $rkp->tanggal ?></td>
                                        <td><?= $rkp->keterangan ?></td>
                                        <td><?= $rkp->aksi ?></td>
                                    </tr>
                                <?php endforeach; ?>
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
