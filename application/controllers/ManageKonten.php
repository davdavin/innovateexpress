<?php
defined('BASEPATH') || exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class ManageKonten extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_log') != "login") {
            redirect('login');
        }

        $this->load->model(array('M_Konten'));
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function manage_artikel()
    {
        $data['title'] = "Article";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/content/v_manage_article.php');
    }

    public function show_article()
    {
        $query = $this->M_Konten->lihat_artikel()->result();
        echo json_encode($query);
    }

    public function add_new_article()
    {
        $data['title'] = "Article";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/content/v_input_article.php', $data);
    }

    public function proses_tambah_artikel()
    {
        $title = $this->input->post('title');
        // $tipe_artikel = $this->input->post('tipe_artikel');
        $deskripsi_singkat = $this->input->post('deskripsi_singkat');
        $isi = $this->input->post('isi');

        $this->form_validation->set_rules('title', 'Title', 'trim|htmlspecialchars|required|is_unique[article.title]');
        // $this->form_validation->set_rules('tipe_artikel', 'Tipe', 'trim|required');
        $this->form_validation->set_rules('deskripsi_singkat', 'Deskripsi', 'trim|htmlspecialchars|required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');

        if (!$this->form_validation->run()) {
            $respon = array(
                'sukses' => false,
                'error_title' => form_error('title'),
                // 'error_tipe' => form_error('tipe_artikel'),
                'error_deskripsi' => form_error('deskripsi_singkat')
            );
            echo json_encode($respon);
        } else {
            $tanggal = date('Y-m-d H:i:s');

            $data = array(
                'title' => $title, 'deskripsi_singkat' => $deskripsi_singkat, 'isi' => $isi, 'status' => 'DITERBITKAN',
                'created_by' => $this->session->userdata('id'), 'created_at' => $tanggal
            );

            $this->M_Konten->insert_record($data, 'article');
            $respon['sukses'] = "Article successfully added";
            echo json_encode($respon);

            // if ($isi == "") {
            //     $config['upload_path'] = './wartaJemaat/';
            //     $config['allowed_types'] = 'pdf';
            //     $config['max_size'] = 5000; //5 MB
            //     $config['file_name'] = rand(10, 9999) . $_FILES['pdf']['name'];

            //     $this->load->library('upload', $config);

            //     if (!$this->upload->do_upload('pdf')) {
            //         $respon['sukses'] = false;
            //         $respon['error_file'] = "Tidak berhasil upload file. Format file hanya PDF dan ukuran file maksimal 5MB";
            //         echo json_encode($respon);
            //     } else {
            //         $file = $this->upload->data('file_name');

            //         $data = array(
            //             'title' => $title, 'tipe_artikel' => $tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat, 'file' => $file, 'status_artikel' => 'DITERBITKAN', 'id_user' => $this->session->userdata('id_user'), 'created_at' => $tanggal
            //         );

            //         $this->M_Artikel->insert_record($data, 'artikel');
            //         $respon['sukses'] = "Artikel berhasil ditambah";
            //         echo json_encode($respon);
            //     }
            // } elseif ($isi != "") {
            //     $data = array(
            //         'title' => $title, 'tipe_artikel' => $tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
            //         'isi' => $isi, 'status_artikel' => 'DITERBITKAN', 'id_user' => $this->session->userdata('id_user'), 'created_at' => $tanggal
            //     );
            //     $this->M_Artikel->insert_record($data, 'article');
            //     $respon['sukses'] = "Article successfully added";
            //     echo json_encode($respon);
            // }
        }
    }

    public function edit_artikel($id_artikel)
    {
        $data['title'] = "Artikel";
        $data['artikel_edit'] = $this->M_Konten->pilihan_artikel($id_artikel)->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/content/v_edit_artikel.php', $data);
    }

    public function proses_edit_artikel()
    {
        $id_artikel = $this->input->post('id');
        $judul_artikel = $this->input->post('judul_artikel');
        $deskripsi_singkat = $this->input->post('deskripsi_singkat');
        $isi = $this->input->post('isi');
        $status = $this->input->post('status');

        $where = array('id' => $id_artikel);

        //  $artikel_lama = $this->db->query("SELECT title, file FROM article WHERE id = '$id_artikel'")->row_array();

        $artikel_lama = $this->db->query("SELECT title FROM article WHERE id = '$id_artikel'")->row_array();

        if ($judul_artikel == $artikel_lama['title']) {
            $this->form_validation->set_rules('judul_artikel', 'Judul', 'required');
        } else {
            $this->form_validation->set_rules('judul_artikel', 'Judul', 'required|is_unique[article.title]');
        }
        $this->form_validation->set_rules('deskripsi_singkat', 'Deskripsi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');

        if (!$this->form_validation->run()) {
            $respon = array(
                'sukses' => false,
                'error_judul' => form_error('judul_artikel'),
                'error_deskripsi' => form_error('deskripsi_singkat'),
                'error_status' => form_error('status')
            );
            echo json_encode($respon);
        } else {
            $tanggal = date('Y-m-d H:i:s');

            $data = array(
                'title' => $judul_artikel, 'deskripsi_singkat' => $deskripsi_singkat,  'status' => $status,
                'isi' => $isi,  'updated_at' => $tanggal, 'updated_by' => $this->session->userdata('id')
            );

            $this->M_Konten->update_record($where, $data, 'article');
            $respon['sukses'] = "Artikel berhasil diupdate";
            echo json_encode($respon);

            //coment dlu//

            // if ($isi == "") {
            //     if ($_FILES['pdf']['name'] == "") {
            //         $data = array(
            //             'judul_artikel' => $judul_artikel, 'tipe_artikel' => $tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
            //             'isi' => NULL, 'file' => $artikel_lama['file'], 'status_artikel' => $status, 'id_user' => $this->session->userdata('id_user'), 'updated_at' => $tanggal
            //         );

            //         $this->M_Artikel->update_record($where, $data, 'artikel');
            //         $respon['sukses'] = "Artikel berhasil ditambah";
            //         echo json_encode($respon);
            //     } else {
            //         $config['upload_path'] = './wartaJemaat/';
            //         $config['allowed_types'] = 'pdf';
            //         $config['max_size'] = 5000; //5 MB
            //         $config['file_name'] = rand(10, 9999) . $_FILES['pdf']['name'];

            //         $this->load->library('upload', $config);

            //         if (!$this->upload->do_upload('pdf')) {
            //             $respon['sukses'] = false;
            //             $respon['error_file'] = "Tidak berhasil upload file. Format file hanya PDF dan ukuran file maksimal 5MB";
            //             echo json_encode($respon);
            //         } else {
            //             $file = $this->upload->data('file_name');

            //             $data = array(
            //                 'judul_artikel' => $judul_artikel, 'tipe_artikel' => $tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
            //                 'isi' => NULL, 'file' => $file, 'status_artikel' => $status, 'id_user' => $this->session->userdata('id_user'), 'updated_at' => $tanggal
            //             );

            //             @unlink('./wartaJemaat/' . $artikel_lama['file']);

            //             $this->M_Artikel->update_record($where, $data, 'artikel');
            //             $respon['sukses'] = "Artikel berhasil ditambah";
            //             echo json_encode($respon);
            //         }
            //     }
            // } else if ($isi != "") {
            //     $data = array(
            //         'judul_artikel' => $judul_artikel, 'tipe_artikel' => $tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
            //         'isi' => $isi, 'status_artikel' => $status, 'id_user' => $this->session->userdata('id_user'), 'updated_at' => $tanggal
            //     );
            //     $this->M_Artikel->update_record($where, $data, 'artikel');
            //     $respon['sukses'] = "Artikel berhasil diubah";
            //     echo json_encode($respon);
            // }


            //comment dulu///

        }
    }
}
