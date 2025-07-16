<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4><i class="fas fa-box"></i> Form Tambah Data Sarpras</h4>
                    </div>
                    <div class="card-body">
                        <form id="formPengajuan" action="<?= base_url('dataSarpras/simpan') ?>" method="post">
                            <div class="form-group mb-3">
                                <label for="jenis_barang"><i class="fa fa-tags"></i> Jenis Barang</label>
                                <select class="form-control" id="jenis_barang" name="jenis_barang" required>
                                    <option value="">-- Pilih Jenis Barang --</option>
                                    <?php foreach($jenis_barang_list as $jenis): ?>
                                        <option value="<?= $jenis ?>" <?= (isset($selected_jenis_barang) && $selected_jenis_barang == $jenis) ? 'selected' : '' ?>>
                                            <?= ucfirst($jenis) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('jenis_barang', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_barang"><i class="fa fa-barcode"></i> ID Barang</label>
                                <select class="form-control" id="id_barang" name="id_barang" required>
                                    <option value="">-- Pilih ID Barang --</option>
                                    <?php if(!empty($barang)): ?>
                                        <option value="<?= $barang ?>" selected><?= $barang ?></option>
                                    <?php endif; ?>
                                </select>
                                <?= form_error('id_barang', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_barang"><i class="fa fa-box-open"></i> Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" value="<?= set_value('nama_barang') ?>" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                                <a href="<?= base_url('dataSarpras') ?>" class="btn btn-danger">
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
    $('#jenis_barang').change(function(){
        // Submit form via POST untuk reload dengan jenis_barang terpilih
        var jenis = $(this).val();
        var form = $('<form action="<?= base_url('dataSarpras/tambah') ?>" method="post">' +
            '<input type="hidden" name="jenis_barang" value="'+jenis+'">' +
            '</form>');
        $('body').append(form);
        form.submit();
    });

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
                    window.location.href = "<?= base_url('dataSarpras') ?>";
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

