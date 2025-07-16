<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4><i class="fas fa-user-plus"></i> Form Tambah User</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('kelolaUser/simpan') ?>" method="post">
                            <div class="form-group mb-3">
                                <label for="username"><i class="fa fa-user"></i> Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama"><i class="fa fa-id-card"></i> Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password"><i class="fa fa-lock"></i> Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender"><i class="fa fa-venus-mars"></i> Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="" disabled selected>Pilih Gender</option>
                                    <option value="Laki-laki"><i class="fa fa-male"></i> Laki-laki</option>
                                    <option value="Perempuan"><i class="fa fa-female"></i> Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_hp"><i class="fa fa-phone"></i> No. HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat"><i class="fa fa-map-marker-alt"></i> Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan Alamat" required></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="akses"><i class="fa fa-key"></i> Akses</label>
                                <select class="form-control" id="akses" name="akses" required>
                                    <option value="" disabled selected>Pilih Akses</option>
                                    <option value="0"><i class="fa fa-user"></i> User</option>
                                    <option value="1"><i class="fa fa-user-shield"></i> Admin</option>
                                    <option value="2"><i class="fa fa-user-tie"></i> Waka Sarpras</option>
                                </select>
                                <small class="form-text text-muted">
                                    <i class="fa fa-info-circle"></i> 0 = User, 1 = Admin, 2 = Waka Sarpras
                                </small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                                <a href="<?= base_url('kelolaUser') ?>" class="btn btn-danger">
                                    <i class="fa fa-times"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
