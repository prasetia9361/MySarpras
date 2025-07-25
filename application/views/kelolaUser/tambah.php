<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4><i class="fas fa-user-plus"></i> Form Tambah User</h4>
                    </div>
                    <div class="card-body">
                        <form id="formPengajuan" action="<?= base_url('kelolaUser/simpan') ?>" method="post">
                            <div class="form-group mb-3">
                                <label for="username"><i class="fa fa-user"></i> Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?= set_value('username') ?>" required>
                                <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama"><i class="fa fa-id-card"></i> Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap"  value="<?= set_value('nama') ?>"required>
                                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password"><i class="fa fa-lock"></i> Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="<?= set_value('password') ?>"required>
                                <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender"><i class="fa fa-venus-mars"></i> Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="" disabled selected>Pilih Gender</option>
                                    <option value="0" <?= set_select('gender', '0'); ?> ><i class="fa fa-male"></i> Laki-laki</option>
                                    <option value="1" <?= set_select('gender', '1'); ?> ><i class="fa fa-female"></i> Perempuan</option>
                                </select>
                                <?= form_error('gender', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_hp"><i class="fa fa-phone"></i> No. HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP" value="<?= set_value('no_hp') ?>" required>
                                <?= form_error('no_hp', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat"><i class="fa fa-map-marker-alt"></i> Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan Alamat" value="<?= set_value('alamat') ?>" required></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-4">
                                <label for="akses"><i class="fa fa-key"></i> Akses</label>
                                <select class="form-control" id="akses" name="akses" required>
                                    <option value="" disabled selected>Pilih Akses</option>
                                    <option value="0" <?= set_select('akses', '0'); ?> ><i class="fa fa-user"></i> User</option>
                                    <option value="1" <?= set_select('akses', '1'); ?> ><i class="fa fa-user-shield"></i> Admin</option>
                                    <option value="2" <?= set_select('akses', '2'); ?> ><i class="fa fa-user-tie"></i> Waka Sarpras</option>
                                </select>
                                <?= form_error('akses', '<small class="text-danger pl-2">', '</small>'); ?>
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

<!-- Modal Success -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <div id="modal-loading">
        <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div class="mt-3">Menyimpan data...</div>
      </div>
      <div id="modal-success" style="display:none;">
        <i class="fa fa-check-circle text-success" style="font-size: 4rem;"></i>
        <div class="mt-3 h5">Data berhasil disimpan!</div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
        // AJAX submit form
        $('#formPengajuan').submit(function(e){
        e.preventDefault();
        // Tampilkan modal loading
        $('#modal-loading').show();
        $('#modal-success').hide();
        $('#successModal').modal('show');
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response){
                // Ganti loading dengan icon centang
                setTimeout(function(){
                    $('#modal-loading').hide();
                    $('#modal-success').show();
                }, 1000); // animasi loading 1 detik
                // Tutup modal setelah 2 detik
                setTimeout(function(){
                    $('#successModal').modal('hide');
                    // Redirect atau reset form jika perlu
                    window.location.href = "<?= base_url('kelolaUser') ?>";
                }, 2500);
            },
            error: function(){
                $('#successModal').modal('hide');
                alert('Terjadi kesalahan saat menyimpan data.');
            }
        });
    });
});
</script>
