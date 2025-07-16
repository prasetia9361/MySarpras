<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">Tambah User</button> -->
            <a href="<?= base_url('kelolaUser/tambah')?>" class="btn btn-primary btn-sm">Tambah User</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Akses</th>
                <th>aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($user): 
                        $no = 1; 
                        foreach ($user as $us): 
                            if ($us->akses == 0) {
                                $akses = "User";
                            }elseif ($sar->akses == 1) {
                                $akses = "Admin";
                            }else {
                                $akses = "Waka Sarpras";
                            }
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $us->username ?></td>
                    <td><?= $us->nama ?></td>
                    <td><?= $us->gender ?></td>
                    <td><?= $us->no_hp ?></td>
                    <td><?= $us->alamat ?></td>
                    <td><?= $akses?></td>
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
                <th>Nama</th>
                <th>Gender</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Akses</th>
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
