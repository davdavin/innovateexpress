<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Artikel'));
    }


    public function index()
    {
        $data['title'] = "Artikel";

        //PAGINATION
        $this->load->library('pagination');

        //config
        $config['base_url'] =  base_url() . 'Artikel/index';
        $config['total_rows'] = $this->db->query("SELECT * FROM artikel WHERE status_artikel = 'DITERBITKAN'")->num_rows();
        $config['per_page'] = 10; //10
        //  $config['num_links'] = 2;

        //styling
        $li_page_tag_open = '<li class="page-item">';

        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = $li_page_tag_open;
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = $li_page_tag_open;
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo'; //ini dari htmlnya jadi nampilin panahnya ada 2 //r = right
        $config['next_tag_open'] = $li_page_tag_open;
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo'; //ini dari htmlnya jadi nampilin panahnya ada 2 //l = left
        $config['prev_tag_open'] = $li_page_tag_open;
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">'; //cur = current page, yang lagi aktif
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = $li_page_tag_open; //digit
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['artikel'] = $this->M_Artikel->semua_artikel($config['per_page'], $data['start'])->result();
        $this->load->view('artikel/v_list_artikel.php', $data);
    }

    public function cari()
    {
        // $data = [];
        if (!isset($_POST['searchTerm'])) {
            $artikel = $this->db->query("SELECT * FROM artikel WHERE status_artikel = 'DITERBITKAN'")->result_array();
        } else {
            $search = strtolower($_POST['searchTerm']);
            $artikel = $this->db->query("SELECT id_artikel, judul_artikel FROM artikel WHERE status_artikel = 'DITERBITKAN' AND judul_artikel LIKE '%$search%'")->result_array();
        }

        $list = array();
        for ($i = 0; $i < count($artikel); $i++) {
            $list[$i]['id'] = $artikel[$i]['id_artikel'];
            $list[$i]['text'] = $artikel[$i]['judul_artikel'];
        }

        echo json_encode($list);
    }

    public function hasil_pencarian()
    {
        $id_artikel = $this->input->post('artikel');
        if ($id_artikel == null) {
            redirect('Artikel');
        } else {
            redirect('Artikel/baca_artikel/' . $id_artikel);
        }
    }

    public function baca_artikel($id_artikel)
    {
        $data['artikel'] = $this->M_Artikel->pilihan_artikel($id_artikel)->result();
        $this->load->view('artikel/v_baca_artikel.php', $data);

        // //cek menggunakan pdf atau tidak
        // $cek_artikel = $this->M_Artikel->cek_pdf($id_artikel)->row_array();

        // if ($cek_artikel['file'] != null) {
        //     //  $data['artikel'] = $this->M_Artikel->pilihan_artikel($id_artikel)->result();
        //     $data['artikel'] = $this->M_Artikel->pilihan_artikel($id_artikel)->row_array();
        //     $this->load->view('artikel/v_lihat_pdf.php', $data);
        // } else {
        //     $data['artikel'] = $this->M_Artikel->pilihan_artikel($id_artikel)->result();
        //     $this->load->view('artikel/v_baca_artikel.php', $data);
        // }
    }


    public function pdf($id_artikel)
    {
        $this->load->library('Pdf');
        $data['artikel'] = $this->M_Artikel->pilihan_artikel($id_artikel)->result();
        $html = $this->load->view('artikel/v_dompdf.php', $data, true);
        $this->pdf->createPDF($html, 'Artikel', false);
    }
}
