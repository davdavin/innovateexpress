<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Konten'));
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'InnovateXpress | Homepage';
        $data['article'] = $this->M_Konten->tampil()->result_array();
        $this->load->view('v_homepage.php', $data);
    }

    public function all_article()
    {
    }

    public function read_a_article()
    {
    }
}
