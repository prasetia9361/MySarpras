<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                <th>No.</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Status</th>
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
                <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $sar->id_barang ?></td>
                    <td><?= $sar->nama_barang ?></td>
                    <td><?= $sar->jenis_barang ?></td>
                    <td><?= $status ?></td>

                </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="4">Tidak ada data</td></tr>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr class="text-center">
                <th>No.</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Status</th>
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