<?php // File: application/views/laporan_pdf.php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; position: relative; }
        h2 { text-align: center; margin-top: 60px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 5px; text-align: left; }
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 80px;
        }
        .watermark {
            position: fixed;
            top: 40%;
            left: 20%;
            opacity: 0.1;
            font-size: 60px;
            transform: rotate(-30deg);
            z-index: -1;
        }
    </style>
</head>
<body>

<img src="<?= base_url('assets/img/logo.png') ?>" class="logo" alt="Logo">
<div class="watermark">MySarpras</div>

<h2>Laporan Data</h2>

<?php if ($mulai && $sampai): ?>
    <p>Periode: <?= $mulai ?> sampai <?= $sampai ?></p>
<?php endif; ?>

<table>
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
<?php if ($rekap): $no = 1; foreach ($rekap as $rkp): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $rkp->nama ?></td>
        <td><?= $rkp->id_barang ?></td>
        <td><?= $rkp->nama_barang ?></td>
        <td><?= $rkp->tanggal ?></td>
        <td><?= $rkp->keterangan ?></td>
        <td><?= $rkp->aksi ?></td>
    </tr>
<?php endforeach; else: ?>
    <tr><td colspan="4">Tidak ada data</td></tr>
<?php endif; ?>
    </tbody>
</table>
</body>
</html>
