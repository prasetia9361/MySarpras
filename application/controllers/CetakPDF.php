<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Cetak_pdf extends CI_Controller {

    public function index() {
        $mulai = $this->input->get('mulai_tanggal');
        $sampai = $this->input->get('sampai_tanggal');

        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_laporan');

        if (!empty($mulai) && !empty($sampai)) {
            $this->db->where('tanggal >=', $mulai);
            $this->db->where('tanggal <=', $sampai);
        }

        $laporan = $this->db->get()->result();

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
        foreach ($laporan as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $no++ . '</td>';
            $html .= '<td>' . $row->nama . '</td>';
            $html .= '<td>' . $row->id_barang . '</td>';
            $html .= '<td>' . $row->nama_barang . '</td>';
            $html .= '<td>' . $row->tanggal . '</td>';
            $html .= '<td>' . $row->keterangan . '</td>';
            $html .= '<td>' . $row->perizinan . '</td>';
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
    }
}
