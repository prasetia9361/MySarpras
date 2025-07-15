<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
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
                <th>Status</th>
                <th>aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($acc): $no = 1; 
                        foreach ($acc as $raw): 
                            if ($raw->aksi == 0) {
                                $status = "ditolak";
                            }elseif ($raw->aksi == 1) {
                                $status = "disetujui";
                            } else {
                                $status = "pengajuan";
                            }
                ?>
                <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $raw->nama ?></td>
                    <td><?= $raw->id_barang ?></td>
                    <td><?= $raw->nama_barang ?></td>
                    <td><?= $raw->tanggal ?></td>
                    <td>
                        <?= $raw->jenis_pengajuan == 0 ? "Peminjaman" : "Pengembalian"; ?>
                    </td>
                    <td><?= $raw->keterangan ?></td>
                    <td><?= $status ?></td>
                    <td>
                        <button 
                            class="btn btn-info btn-sm aksi-modal-btn" 
                            data-toggle="modal" 
                            data-target="#aksiModal"
                            data-id="<?= $raw->id_pengajuan ?>"
                            data-nama="<?= $raw->nama ?>"
                            data-id_barang="<?= $raw->id_barang ?>"
                            data-action="setujui"
                            data-aksi="disetujui"
                            >Disetujui</button>
                        <button 
                            class="btn btn-danger btn-sm aksi-modal-btn" 
                            data-toggle="modal" 
                            data-target="#aksiModal"
                            data-id="<?= $raw->id_pengajuan ?>"
                            data-nama="<?= $raw->nama ?>"
                            data-id_barang="<?= $raw->id_barang ?>"
                            data-action="tolak"
                            data-aksi="Ditolak"
                            >Ditolak</button>
                        <button 
                            class="btn btn-danger btn-sm aksi-modal-btn" 
                            data-toggle="modal" 
                            data-target="#aksiModal"
                            data-id="<?= $raw->id_pengajuan ?>"
                            data-action="hapus"
                            data-aksi="Hapus"
                            >Hapus</button>
                    </td>
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

<!-- Modal Aksi -->
<div class="modal fade" id="aksiModal" tabindex="-1" aria-labelledby="aksiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aksiModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="aksiModalBody">
        <!-- Isi konfirmasi akan diisi via JS -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="#" class="btn btn-primary" id="aksiModalYesBtn">Ya, Lanjutkan</a>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var aksiModal = document.getElementById('aksiModal');
    var aksiModalBody = document.getElementById('aksiModalBody');
    var aksiModalYesBtn = document.getElementById('aksiModalYesBtn');

    $('#aksiModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button yang diklik
        var id = button.data('id');
        var nama = button.data('nama');
        var id_barang = button.data('id_barang');
        var action = button.data('action');
        var aksi = button.data('aksi');

        // Debug: tampilkan nilai id di console
        console.log("DEBUG: Nilai kolom id yang diklik:", id);

        // Default pesan
        var pesan = "Apakah Anda yakin ingin melakukan aksi ini?";
        var url = "#";

        if(action === "setujui") {
            pesan = "Setujui pengajuan atas nama <b>" + nama + "</b>?";
            url = "<?= base_url('acc/setujui/') ?>" + id + "/" + id_barang;
        } else if(action === "tolak") {
            pesan = "Tolak pengajuan atas nama <b>" + nama + "</b>?";
            url = "<?= base_url('acc/tolak/') ?>" + id + "/" + id_barang;
        } else if(action === "hapus") {
            pesan = "Hapus pengajuan ini?";
            url = "<?= base_url('acc/hapus/') ?>" + id + "/" + id_barang;
        }

        aksiModalBody.innerHTML = pesan;
        aksiModalYesBtn.href = url;
    });
});
</script>
