<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4><i class="fas fa-file-alt"></i></i> Form Tambah Pengajuan</h4>
                    </div>
                    <div class="card-body">
                        <form id="formPengajuan" action="<?= base_url('pengajuan/simpan') ?>" method="post">
                            <div class="form-group mb-3">
                                <label for="nama"><i class="fa fa-user"></i> Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= set_value('nama') ?>" required>
                                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                            <label for="nama_barang"><i class="fa fa-box"></i> Nama Barang</label>
                                <select class="form-control" id="nama_barang" name="nama_barang" required>
                                    <option value="">-- Pilih Nama Barang --</option>
                                    <?php foreach ($options_barang as $o) : ?>
                                        <option value="<?= $o->nama_barang ?>" <?= set_select('nama_barang', $o->nama_barang); ?>><?= $o->nama_barang ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('nama_barang', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_barang"><i class="fa fa-barcode"></i> ID Barang</label>
                                <select class="form-control" id="id_barang" name="id_barang" required>
                                    <option value="">-- Pilih ID Barang --</option>
                                </select>
                                <?= form_error('id_barang', '<small class="text-danger pl-2">', '</small>'); ?>
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
    // Dependent dropdown
    $('#nama_barang').change(function(){
        var nama_barang = $(this).val();
        $('#id_barang').html('<option value="">-- Pilih ID Barang --</option>');
        if(nama_barang != ''){
            $.ajax({
                url: "<?= base_url('pengajuan/get_id_barang_by_nama') ?>",
                method: "POST",
                data: {nama_barang: nama_barang},
                dataType: "json",
                success: function(data){
                    $.each(data, function(i, id_barang){
                        $('#id_barang').append('<option value="'+id_barang+'">'+id_barang+'</option>');
                    });
                }
            });
        }
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
                    window.location.href = "<?= base_url('pengajuan') ?>";
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
