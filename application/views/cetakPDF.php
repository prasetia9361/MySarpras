<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Ambil data dari GET
$mulai = isset($_GET['mulai_tanggal']) ? $_GET['mulai_tanggal'] : '';
$sampai = isset($_GET['sampai_tanggal']) ? $_GET['sampai_tanggal'] : '';

// Koneksi ke database (jika belum menggunakan CodeIgniter)
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'nama_database';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_laporan";
if (!empty($mulai) && !empty($sampai)) {
    $sql .= " WHERE tanggal BETWEEN '$mulai' AND '$sampai'";
}
$result = $conn->query($sql);

$html = '<h2 style="text-align:center">Laporan Data</h2>';
$html .= '<p>Periode: ' . $mulai . ' s/d ' . $sampai . '</p>';
$html .= '<table border="1" width="100%" cellspacing="0" cellpadding="5">
<thead>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>ID Barang</th>
    <th>Nama Barang</th>
    <th>Tanggal</th>
    <th>Keterangan</th>
    <th>Perizinan</th>
</tr>
</thead>
<tbody>';

$no = 1;
while ($row = $result->fetch_assoc()) {
    $html .= '<tr>';
    $html .= '<td>' . $no++ . '</td>';
    $html .= '<td>' . $row['nama'] . '</td>';
    $html .= '<td>' . $row['id_barang'] . '</td>';
    $html .= '<td>' . $row['nama_barang'] . '</td>';
    $html .= '<td>' . $row['tanggal'] . '</td>';
    $html .= '<td>' . $row['keterangan'] . '</td>';
    $html .= '<td>' . $row['perizinan'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>';

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("laporan.pdf", array("Attachment" => false));

exit();
