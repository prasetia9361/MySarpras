<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <a href="<?= base_url('dataSarpras/tambah')?>" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No.</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Status</th>
                <th>aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($sarpras): 
                        $no = 1; 
                        foreach ($sarpras as $sar): 
                            if ($sar->status == 0) {
                                $status = "tersedia";
                            }elseif ($sar->status == 1) {
                                $status = "digunakan";
                            }
                ?>
                <tr class"text-center">
                <td><?= $no++ ?></td>
                    <td><?= $sar->id_barang ?></td>
                    <td><?= $sar->nama_barang ?></td>
                    <td><?= $sar->jenis_barang ?></td>
                    <td><?= $status ?></td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
                </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="4">Tidak ada data</td></tr>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr>
                <th>No.</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Status</th>
                <th>aksi</th>
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
