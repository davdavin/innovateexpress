<?php
defined('BASEPATH') || exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class ManageUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_log') != "login") {
            redirect('login');
        }

        $this->load->model(array('M_User'));
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "User";
        $data['user'] = $this->M_User->tampil()->result();
        $data['levelUser'] = $this->M_User->tampil_level()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/v_manage_user.php', $data);
    }

    public function tampil_user()
    {
        $query = $this->M_User->tampil()->result();
        echo json_encode($query);
    }

    public function tambah_user()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $level = $this->input->post('level');

        $this->form_validation->set_rules('username', 'Username', 'trim|htmlspecialchars|required|min_length[5]|max_length[15]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|htmlspecialchars|required|min_length[5]|max_length[15]');

        //$this->form_validation->set_rules('password', 'Password', 'htmlspecialchars|trim|required|min_length[5]|max_length[15]');

        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus valid');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_pilih' => form_error('pilih'),
                'error_username' => form_error('username'),
                'error_password' => form_error('password'),
                'error_level' => form_error('level')
            );
            echo json_encode($respon);
        } else {
            $tanggal = date('Y-m-d H:i:s');
            $data = array(
                'id_level_user' => $level, 'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT), 'status' => 1, 'created_at' => $tanggal
            );

            $this->M_User->insert_record($data, 'user');

            $respon['sukses'] = "Successfully created a new user";
            echo json_encode($respon);
        }
    }

    public function proses_edit_user()
    {
        $level = $this->input->post('level');
        $status =  $this->input->post('status');
        $tanggal = date('Y-m-d H:i:s');
        $where = array('id_user' => $this->input->post('id'));
        $data = array('id_level_user' => $level, 'status_user' => $status, 'updated_at' => $tanggal);
        $this->M_User->update_record($where, $data, 'user');
        $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        redirect('User');
    }
}
