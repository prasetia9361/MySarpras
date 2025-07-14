<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4><i class="fas fa-file-alt"></i></i> Form Tambah Pengajuan</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('pengajuan/simpan') ?>" method="post">
                            <div class="form-group mb-3">
                                <label for="nama"><i class="fa fa-user"></i> Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= set_value('nama') ?>" required>
                                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_barang"><i class="fa fa-barcode"></i> ID Barang</label>
                                <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="Masukkan ID Barang" value="<?= set_value('id_barang') ?>" required>
                                <?= form_error('id_barang', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_barang"><i class="fa fa-box"></i> Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" value="<?= set_value('nama_barang') ?>" required>
                                <?= form_error('nama_barang', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal"><i class="fa fa-calendar-alt"></i> Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= set_value('tanggal') ?>" required>
                                <?= form_error('tanggal', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="jenis_pengajuan"><i class="fa fa-exchange-alt"></i> Jenis Pengajuan</label>
                                <select class="form-control" id="jenis_pengajuan" name="jenis_pengajuan" required>
                                    <option value="">-- Pilih Jenis Pengajuan --</option>
                                    <option value="0" <?= set_select('jenis_pengajuan', '0'); ?>>Peminjaman</option>
                                    <option value="1" <?= set_select('jenis_pengajuan', '1'); ?>>Pengembalian</option>
                                </select>
                                <?= form_error('jenis_pengajuan', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-4">
                                <label for="keterangan"><i class="fa fa-info-circle"></i> Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan Keterangan"><?= set_value('keterangan') ?></textarea>
                                <?= form_error('keterangan', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                                <a href="<?= base_url('pengajuan') ?>" class="btn btn-danger">
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
