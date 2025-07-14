<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Accmodel');
        // $this->load->library('form_validation');
    }
    public function index()
    {
        $mulai = $this->input->get('mulai_tanggal');
        $sampai = $this->input->get('sampai_tanggal');
        $data['title'] = 'Rekap Laporan';
        $data['rekap'] = $this->Accmodel->get_laporan($mulai, $sampai)->result();
        $data['mulai'] = $mulai;
        $data['sampai'] = $sampai;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_pdf() {
        require_once FCPATH . 'vendor/autoload.php';

        $mulai = $this->input->get('mulai_tanggal');
        $sampai = $this->input->get('sampai_tanggal');

        $data['rekap'] = $this->Accmodel->get_laporan($mulai, $sampai)->result();
        $data['mulai'] = $mulai;
        $data['sampai'] = $sampai;
        $data['pdf_mode'] = true;

        // View khusus tanpa header/footer
        $html = $this->load->view('laporan_pdf', $data, true);

        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan.pdf", array("Attachment" => false));
    }
    
}